<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/auth-custom.css') }}" rel="stylesheet">
</head>
<body class="auth-body">
    <div class="auth-container">
        <!-- Left Side (Hidden on Mobile) -->
        <div class="auth-left d-none d-md-flex">
            <h1>DiginixHub</h1>
            <h3>Welcome Back!</h3>
            <p>Join our community to explore the future of digital innovation. We provide top-notch services and insights to help you grow.</p>
        </div>

        <!-- Right Side -->
        <div class="auth-right">
             <a href="{{ url('/') }}" class="auth-brand-link mb-3">
                <i class="fas fa-cube"></i> Diginix<span>Hub</span>
             </a>

             @yield('content')
        </div>
    </div>
</body>
</html>
