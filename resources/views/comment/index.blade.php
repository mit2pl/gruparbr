@extends('layouts.app')
@section('content')
    @if (session('postinformation'))
        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-success">
                        {{ session('postinformation') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @forelse($comment as $comments)
        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">title</div>
                        <a href="{{ route("comment.show", $comments->id) }}">
                            <div class="card-body">
                                content
                            </div>
                        </a>
                        <div id="card text-right">
                            autor: author
                        </div>
                        <div id="card">
                            Comments: comment
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty

    @endforelse
    <div class="d-flex justify-content-center">
        {!! $comment->links() !!}
    </div>
@endsection
