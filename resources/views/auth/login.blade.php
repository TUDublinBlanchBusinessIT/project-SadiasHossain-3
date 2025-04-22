@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-4">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        </div>

        <div class="mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        Don't have an account? <a href="{{ route('register') }}">Register here</a>
    </div>
@endsection
