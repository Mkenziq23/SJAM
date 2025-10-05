<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ env('APP_NAME') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #6C63FF, #00C2FF);
            height: 100vh;
        }

        .login-container {
            max-width: 450px;
            margin: auto;
            padding: 40px 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            margin-top: 80px;
        }

        .login-container h2 {
            font-weight: 700;
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .btn-login {
            background: #6C63FF;
            border: none;
        }

        .btn-login:hover {
            background: #5848c2;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-container">
        <h2>Sistem Manajemen {{ $setting->namaTahfiz }}</h2>
        <p class="text-center text-muted mb-4">Silahkan masuk untuk melanjutkan.</p>

        <!-- Form login biasa -->
        <form method="POST" action="{{ url('/auth/login/process') }}">
            @csrf

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" 
                       id="username" name="username" value="{{ old('username') }}" required>
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       id="password" name="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- General error -->
            @if(session('error'))
                <div class="mb-3 text-danger">{{ session('error') }}</div>
            @endif

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-login btn-lg text-light">Masuk</button>
            </div>
        </form>

        <div class="text-center mt-3">
            &copy; {{ date('Y') }} {{ $setting->namaTahfiz }}. All rights reserved.
        </div>
    </div>
</div>
</body>
</html>
