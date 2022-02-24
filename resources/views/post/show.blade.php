@extends('layouts.app')
@section('content')
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Title: {{ $showpost->title }}</div>
                    <div class="card-body">
                        <p>{{ $showpost->content }}</p>
                        <p>Autor:
                            {{ $showpost->user->name }}
                        </p>
                        <p>Date Add: {{ $showpost->created_at }}</p>
                        <p>
                            <a href="{{ route("post.edit", $showpost->id) }}"><button class="btn btn-primary">Edit Post</button></a>
                        </p>
                        <p>
                        <form method="POST" action="{{ route("post.destroy", $showpost->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete Post</button>
                            </a>
                        </form>
                        </p>
                    </div>
                    <div class="px-2">
                        <form method="post" action="{{ route("comment.store") }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $showpost->id }}">
                            <div><textarea class="form-control ml-1 shadow-none textarea" name="commentvalue" placeholder="Put your comment here"></textarea></div>
                            <div class="mt-2 text-center"><button class="btn btn-primary">Add comment</button></div>
                        </form>
                        @if(session()->get('commentinformation'))
                            <div class="alert alert-success mt-2" role="alert">
                                {{ session()->get('commentinformation')}}
                            </div>
                        @endisset
                    </div>
                    @forelse($getcomment as $comment)
                        <div class="card-body">
                            <div class="dropdown-divider"></div>
                            <p>Comment: {{ $comment->content }}</p>
                            <p>Author: {{ $comment->user->name }}</p>
                            <p>Date Add: {{ $comment->created_at }}</p>
                            <p>
                                <a href="{{ route("comment.edit", $comment->id) }}"><button class="btn btn-primary">Edit Comment</button></a>
                            </p>
                            <p>
                            <form method="POST" action="{{ route("comment.destroy", $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete Comment</button>
                                </a>
                            </form>
                        </div>
                    @empty
                        <div class="dropdown-divider"></div>
                        <div class="mt-2 mb-2 text-center">No Comments</div>
                    @endforelse

                </div>
                <div class="d-flex justify-content-center">
                    {!! $getcomment->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
