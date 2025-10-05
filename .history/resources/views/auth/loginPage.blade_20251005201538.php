<!-- resources/views/auth/loginPage.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - {{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" shrink-to-fit="no">
    <link rel="stylesheet" href="{{ asset('ladun') }}/stisla/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('ladun') }}/stisla/vendors/base/vendor.bundle.base.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@700&family=Nunito:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ladun') }}/stisla/css/style.css">
</head>

<body style="font-family: 'Nunito', sans-serif;">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel" id="appLogin">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5" id='login-app'>
                                <div class="brand-logo" style='text-align:center;'>
                                    <img src="{{ asset('/ladun/base') }}/img/sjam.png" alt="logo"
                                        style='width:150px; '>
                                    <h3 style="font-weight:bold;margin-top:40px;">Sistem Manajemen
                                        {{ $setting->namaTahfiz }}</h3>
                                </div>
                                <div style='text-align:center;'>
                                    <h6 class="font-weight-light">Harap masuk untuk melanjutkan.</h6>
                                    <form action="/auth/login/process" method="POST">
                                        @csrf
                                        <div class="pt-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username"
                                                    placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="Password" required>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="mt-3">
                                                <button type="submit"
                                                    class="btn w-100 btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                                            </div>
                                            <div class="mt-2">
                                                <div style="padding-top:12px;">
                                                    <h5 class="font-weight-light">Copyright @ {{ env('tahun') }} - <a
                                                            href="" target='blank'>{{ $setting->namaTahfiz }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id='divWorker'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('ladun') }}/stisla/vendors/base/vendor.bundle.base.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('ladun') }}/stisla/js/template.js"></script>
    <script>
        const server = "{{ url('/') }}/";
    </script>
    <script src="{{ asset('ladun') }}/base/js/login.js"></script>
</body>

</html>
