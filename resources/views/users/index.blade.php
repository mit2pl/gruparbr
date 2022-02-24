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
                <a href="{{ route("users.create") }}"><button class="btn btn-primary">Create user</button></a>
            </div>
        </div>
    </div>
    @foreach($users as $user)
        <div class="container mb-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ $user->name }}</div>

                        <div class="card-body">
                            <p>Email: {{ $user->email }}</p>
                            <p>Registred: {{ $user->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>
@endsection
