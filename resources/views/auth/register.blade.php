@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 450px;">
        <h2 class="text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="mb-4">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            Already have an account? <a href="{{ route('login') }}" class="text-primary">Login here</a>
        </div>
    </div>
</div>
@endsection
