<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ env('APP_NAME') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.0.96/css/materialdesignicons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&display=swap" rel="stylesheet">

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

        .input-group-text {
            background: #6C63FF;
            color: #fff;
            border: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6C63FF;
        }

        .btn-login {
            background: #6C63FF;
            border: none;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #5848c2;
        }

        .brand-logo img {
            width: 120px;
            display: block;
            margin: 0 auto 15px;
        }

        .footer-text {
            text-align: center;
            font-size: 0.9rem;
            margin-top: 20px;
            color: #666;
        }

        .show-hide {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="brand-logo">
                <img src="{{ asset('/ladun/base/img/sjam.png') }}" alt="Logo">
            </div>
            <h2>Sistem Manajemen {{ $setting->namaTahfiz }}</h2>
            <p class="text-center text-muted mb-4">Silahkan masuk untuk melanjutkan.</p>

            <!-- Form login tanpa JS -->
            <form method="POST" action="{{ url('/auth/login/process') }}">
                @csrf

                <!-- Tampilkan error jika ada -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Username -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-login btn-lg text-light">Masuk</button>
                </div>
            </form>

            <div class="footer-text">
                &copy; {{ date('Y') }} {{ $setting->namaTahfiz }}. All rights reserved.
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
