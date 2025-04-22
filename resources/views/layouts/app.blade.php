<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JobApp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('layouts.navigation') <!-- if you still want the nav -->
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
