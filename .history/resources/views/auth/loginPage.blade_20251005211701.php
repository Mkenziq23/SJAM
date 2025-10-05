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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
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

            <form id="loginForm" method="POST" action="{{ url('/auth/login/process') }}">
                @csrf
                <!-- Username -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="mdi mdi-account"></i>
                        </span>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="mdi mdi-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <span class="input-group-text show-hide" id="togglePassword">
                            <i class="mdi mdi-eye-off" id="eyeIcon"></i>
                        </span>
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

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.remove('mdi-eye-off');
                eyeIcon.classList.add('mdi-eye');
            } else {
                password.type = 'password';
                eyeIcon.classList.remove('mdi-eye');
                eyeIcon.classList.add('mdi-eye-off');
            }
        });

        // AJAX Login + SweetAlert2
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);

            const btn = form.querySelector('button[type="submit"]');
            btn.disabled = true;
            const originalText = btn.innerText;
            btn.innerText = 'Memproses...';

            axios.post(form.action, formData)
                .then(response => {
                    btn.disabled = false;
                    btn.innerText = originalText;

                    if (response.data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.data.message,
                            timer: 1500,
                            showConfirmButton: false,
                            willClose: () => {
                                // Redirect ke halaman mainAppPage
                                window.location.href = response.data.redirect;
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.data.message
                        });
                    }
                })
                .catch(error => {
                    btn.disabled = false;
                    btn.innerText = originalText;
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Silahkan cek kembali username dan password Anda.'
                    });
                    console.error(error);
                });
        });

    </script>
</body>

</html>
