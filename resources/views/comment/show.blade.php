@extends('layouts.app')
@section('content')
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Comment id: {{ $comment->id }}</div>
                    <div class="card-body">
                        <p>Post name: <a href="{{ route("post.show", $comment->post_id) }}"> {{ $comment->post->title }}</a></p>
                        <p>Comment: {{ $comment->content }}</p>
                        <p>Autor: {{ $comment->user->name }}

                        </p>
                        <p>Date Add: </p>
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
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
