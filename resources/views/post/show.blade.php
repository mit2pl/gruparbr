@extends('layouts.app')
@section('content')
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Title: {{ $showpost->title }}</div>
                    <div class="card-body">
                        {{ $showpost->content }}
                    </div>
                    <div id="card text-right">
                        autor: {{ $showpost->user->name }}
                        <p>Date Add: {{ $showpost->created_at }}</p>
                    </div>
                    <div class="px-2">
                        <form method="post" action="{{ route("Comment.store") }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $showpost->id }}">
                            <div><textarea class="form-control ml-1 shadow-none textarea" name="commentvalue" placeholder="Put your comment here"></textarea></div>
                            <div class="mt-2 text-center"><button class="btn btn-primary">Add comment</button></div>
                        </form>
                        @if(session()->get('msg'))
                            <div class="alert alert-success mt-2" role="alert">
                                Your comment was added
                            </div>
                        @endisset
                    </div>
                    @forelse($getcomment as $comment)
                        <div class="dropdown-divider"></div>
                        <p>Comment: {{ $comment->content }}</p>
                        <p>Author: {{ $comment->user->name }}</p>
                        <p>Date Add: {{ $comment->created_at }}</p>
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
