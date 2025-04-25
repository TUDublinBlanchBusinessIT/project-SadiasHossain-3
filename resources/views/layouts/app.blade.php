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
            background-color: #ffffff;
        }
        .logo-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px 0 20px;
        }
        .logo-wrapper img {
            height: 120px;
        }
        .main-content {
            display: flex;
            justify-content: center;
            padding-bottom: 30px;
        }
        .auth-box {
            width: 100%;
            max-width: 500px;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        }
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
