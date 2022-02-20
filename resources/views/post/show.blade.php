@extends('layouts.app')
@section('content')
    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $showpost->title }}</div>
                    <div class="card-body">
                        {{ $showpost->content }}
                    </div>
                    <div id="card text-right">
                        autor: {{ $showpost->user->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
