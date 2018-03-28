@extends('layouts.default')

@section('content')
    <div class="container">

        <section class="section-index">

            <div class="jumbotron">
                <h1 class="display-4">Welcome to Tasks.app!</h1>
                <p class="lead">You can use this random email address to login: <strong>{{ $user->email }}</strong></p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
                </p>
            </div>

        </section>
    </div>
@endsection