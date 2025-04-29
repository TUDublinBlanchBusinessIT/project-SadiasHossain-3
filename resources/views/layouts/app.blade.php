<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WorkPal</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>

    body {
        background-image: url('{{ asset('images/login-register-background.jpg') }}');
        background-size: cover;  /* Ensures the image covers the entire screen */
        background-position: center center;  /* Centers the image */
        background-repeat: no-repeat;  /* Prevents the image from repeating */
        height: 100vh;
        margin: 0;
    }


    h2 {
        font-weight: bold;
    }

    /* Style the Register here text */
    .register-link {
        color: #007bff; /* Change the color to blue */
        text-decoration: none;
        font-weight: normal;
    }

    .register-link:hover {
        color: #0056b3; /* Darker blue on hover */
        text-decoration: underline;
    }

    .logo-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px 0 -10px;
    }

    .logo-wrapper img {
        height: 300px;
        transition: transform 0.3s ease;
    }

    .logo-wrapper img:hover {
        transform: scale(1.05);
    }

    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(99vh - 490px);
        padding-top: 20px; /* Adds space above the form, bringing it down */
    }

    .auth-box {
        width: 100%;
        max-width: 500px;
        padding: 2rem;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .auth-box:hover {
        transform: translateY(-5px);
    }

    .form-control, .btn {
        border-radius: 8px;
        height: 45px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus, .btn:hover {
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        border-color: #0056b3;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .alert-danger {
        font-size: 14px;
    }
</style>

    </style>
</head>
<body>

    <!-- Navbar: only show if NOT on login/register -->
    @if (!in_array(Route::currentRouteName(), ['login', 'register']))
        @include('layouts.navigation')
    @endif

    <!-- Logo: only show on login/register -->
    @if (in_array(Route::currentRouteName(), ['login', 'register']))
        <div class="logo-wrapper">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/workpal-logo.png') }}" alt="WorkPal Logo">
            </a>
        </div>
    @endif

    <!-- Page Content -->
    <div class="main-content container {{ in_array(Route::currentRouteName(), ['login', 'register']) ? '' : 'pt-4' }}">
        <div class="{{ in_array(Route::currentRouteName(), ['login', 'register']) ? 'auth-box' : '' }}">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
