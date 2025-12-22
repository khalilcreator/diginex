@extends('layouts.auth')

@section('content')
    <h2>Reset Password</h2>
    <p class="subtitle">Enter your email to receive a reset link</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-floating-custom">
            <input id="email" type="email" placeholder="Email Address" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-auth-submit mt-2">
            Send Password Reset Link
        </button>

         <div class="text-center mt-4" style="font-size: 0.9rem; color: #666;">
            <a href="{{ route('login') }}" style="color: #007bff; font-weight: 600; text-decoration: none;">&larr; Back to Login</a>
        </div>
    </form>
@endsection
