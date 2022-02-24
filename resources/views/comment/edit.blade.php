@extends('layouts.app')
@section('content')
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Comment</div>
                    <div class="card-body">
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end">Comment:</label>
                                <div class="col-md-5">
                                    <textarea id="comment" name="comment" rows="3" class="form-control" required autocomplete="content" autofocus>{{ $comment->content }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
