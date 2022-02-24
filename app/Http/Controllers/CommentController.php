<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::with("post")->paginate(10);
        return view("comment.index")->with("comment", $comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create([
            'post_id' => $request->get("post_id"),
            'author' => auth()->user()->id,
            'content' => $request->get("commentvalue")
        ]);
        return back()->with('commentinformation', "Comment was added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view("comment.show", $comment)->with(["comment" => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($comment)
    {
        $getcomment = Comment::where("id", $comment)->first();
        return view("comment.edit")->with("comment", $getcomment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'content' => $request->get("comment")
        ]);
        return  redirect()->route("post.show", $comment->post_id)->with("commentinformation", "Comment was edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route("post.show", $comment->post_id)->with("commentinformation", "Comment was delete");
    }
}
