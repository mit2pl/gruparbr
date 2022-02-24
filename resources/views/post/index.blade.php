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
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <a href="{{ route("post.create") }}"><button class="btn btn-primary">Create Post</button></a>
            </div>
        </div>
    </div>
    @foreach($post as $posts)
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $posts->title }}</div>
                    <a href="{{ route("post.show", $posts->id) }}">
                        <div class="card-body">
                            {{ $posts->content }}
                        </div>
                    </a>
                    <div id="card text-right">
                        autor: {{ $posts->user->name }}
                    </div>
                    <div id="card">
                       Comments: {{ $posts->comments_count }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $post->links() !!}
    </div>
@endsection
