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
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.main-sidebar'); // pastikan class sidebar benar
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
