@extends('layouts.auth')

@section('content')
    <h2>Sign Up</h2>
    <p class="subtitle">Create your account to get started</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-floating-custom">
            <input id="name" type="text" placeholder="Full Name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating-custom">
            <input id="email" type="email" placeholder="Email Address" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating-custom">
            <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating-custom">
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="" name="password_confirmation" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn-auth-submit mt-2">
            Register
        </button>

         <div class="text-center mt-4" style="font-size: 0.9rem; color: #666;">
            Already have an account? <a href="{{ route('login') }}" style="color: #007bff; font-weight: 600; text-decoration: none;">Sign In</a>
        </div>
    </form>
@endsection
