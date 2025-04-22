@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input name="name" type="text" placeholder="Name"><br>
        <input name="email" type="email" placeholder="Email"><br>
        <input name="password" type="password" placeholder="Password"><br>
        <input name="password_confirmation" type="password" placeholder="Confirm Password"><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>
@endsection
