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
        .login-container h2 { text-align:center; margin-bottom: 25px; }
        .btn-login { background:#6C63FF; color:#fff; }
        .btn-login:hover { background:#5848c2; }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Sistem Manajemen {{ $setting->namaTahfiz }}</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/auth/login/process') }}">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-login btn-lg">Masuk</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                &copy; {{ date('Y') }} {{ $setting->namaTahfiz }}. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
