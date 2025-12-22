<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Scripts & Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/front-custom.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-cube"></i> Diginix<span>Hub</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mx-auto align-items-center">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('front_about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('services*') ? 'active' : '' }}" href="{{ route('front_services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('front_blog') }}">Blogs</a></li>
                   

                    <!-- <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('front_contact') }}">Contact</a></li> -->
                    
                    <li class="nav-item ms-2 d-none d-lg-block">
                         <a href="{{ route('front_contact') }}" class="btn btn-sm btn-primary rounded-pill px-3">Contact Now</a>
                    </li>
                     <!-- <li class="nav-item ms-2 d-none d-lg-block">
                         <a href="tel:+1234567890" class="btn btn-sm btn-outline-secondary rounded-pill px-3"><i class="fas fa-phone"></i></a>
                    </li> -->
                </ul>
                <div class="auth-buttons ms-3">
                    @guest
                        <a href="{{ route('login') }}" class="btn-auth-outline">Sign in</a>
                        <a href="{{ route('register') }}" class="btn-auth-primary">Register</a>
                    @else
                        <div class="dropdown">
                            <a class="btn-auth-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-user"></i> My Profile</a></li>
                                @if(Auth::user()->role == 1)
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Admin Panel</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div style="margin-top: 80px;">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                     <a class="footer-logo" href="#"><i class="fas fa-cube"></i>&nbsp;Diginix<span>Hub</span></a>
                     <p class="text-muted">Discover the achievements that set us apart.</p>
                </div>
                <div class="col-md-8 text-md-end">
                    <div class="footer-nav">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ route('front_about') }}">About</a>
                        <a href="{{ route('front_contact') }}">Contact</a>
                        <a href="{{ route('front_privacy') }}">Privacy Policy</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center copyright">
                    &copy; {{ date('Y') }} DiginixHub. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
