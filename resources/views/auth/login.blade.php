@extends('layouts.auth')

@section('content')
    <h2>Sign in</h2>
    <p class="subtitle">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-floating-custom">
            <input id="email" type="email" placeholder="User Name" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating-custom">
            <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
             @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="auth-links">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn-auth-submit mt-4">
            Sign in
        </button>

         <div class="text-center mt-4" style="font-size: 0.9rem; color: #666;">
            Don't have an account? <a href="{{ route('register') }}" style="color: #007bff; font-weight: 600; text-decoration: none;">Sign Up</a>
        </div>
    </form>
@endsection
