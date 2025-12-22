<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth-custom.css') }}" rel="stylesheet">
    <style>
        body { margin: 0; background: linear-gradient(135deg, #194fa0 0%, #143d7a 100%); height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Rubik', sans-serif; }
    </style>
</head>
<body>
    <div class="error-page-container">
        <div class="error-code">404</div>
        <h1 class="error-title">Page Not Found</h1>
        <p class="error-text">Oops! It seems you've ventured into uncharted digital territory. The page you are looking for is missing.</p>
        
        <a href="{{ url('/') }}" class="btn-auth-submit" style="display: inline-block; width: auto; padding: 12px 30px; text-decoration: none;">
            Return Home
        </a>
    </div>
</body>
</html>
