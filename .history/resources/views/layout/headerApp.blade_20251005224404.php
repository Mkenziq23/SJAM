<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard - {{ $namaTahfiz }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Stisla & library CSS -->
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/iziToast/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/datatables.min.css') }}">
</head>

<body style="font-family: 'Nunito Sans';">
    <div id="app">
        <div class="main-wrapper">

            <!-- Navbar Background -->
            <div class="navbar-bg" style="background-color:#0984e3;"></div>

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="container-fluid">
                    <!-- Sidebar Toggle -->
                    <button class="btn btn-primary me-2" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Right Menu -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img alt="avatar" src="{{ asset('ladun/dashboard/img/avatar-1.png') }}"
                                    class="rounded-circle me-2" width="30" height="30">
                                Hi, {{ Auth::user()->username }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ url('/auth/logout') }}">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Sidebar -->
            @include('layout.sideMenu')

            <!-- Main Footer -->
            <footer class="main-footer text-center mt-4" id="divFooter">
                Sistem Manajemen Rumah {{ $namaTahfiz }}
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/popper.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/moment.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/stisla.js') }}"></script>

    <!-- JS Libraries -->
    <script src="{{ asset('ladun/dashboard/stisla/js/datatables.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/iziToast.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://nos.jkt-1.neo.id/aditiastorage/asset/web_lib/owlcarousel2/owl.carousel.min.js"></script>

    <!-- Stisla & Page Scripts -->
    <script src="{{ asset('ladun/dashboard/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('ladun/base/js/mainApp.js') }}"></script>

    <script>
        const server = "{{ url('/') }}/";

        // Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.main-sidebar'); // pastikan class sidebar benar
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
