<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $setting->namaTahfiz }} - Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
    <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('/ladun/neloz') }}/images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!--Slider-->
    <link rel="stylesheet" href="{{ asset('/ladun/neloz') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('/ladun/neloz') }}/css/owl.theme.default.min.css" />

    <!-- css -->
    <link href="{{ asset('/ladun/neloz') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/ladun/neloz') }}/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/ladun/neloz') }}/css/style.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">

</head>

<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>
    </div>

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark navbar-light bg-light">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo" href="layout-one-1.html">
                <img src="{{ asset('/ladun/base') }}/img/sjam.png" alt="" class="" height="150">
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#kelas" class="nav-link">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tentang" class="nav-link">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="#fotokegiatan" class="nav-link">Foto Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#videokegiatan" class="nav-link">Video Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#penilaian" class="nav-link">Penilaian Masyarakat</a>
                    </li>
                    <li class="nav-item">
                        <a href="#donasi" class="nav-link">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pembayaranspp" class="nav-link">Pembayaran SPP</a>
                    </li>
                    <li class="nav-item">
                        <a href="#daftar" class="nav-link">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil semua item navigasi
            const navItems = document.querySelectorAll('.navbar-nav .nav-item');

            // Loop melalui setiap item navigasi
            navItems.forEach(function(item) {
                // Menambahkan event listener untuk setiap item
                item.addEventListener('click', function() {
                    // Menghapus kelas 'active' dari semua item navigasi
                    navItems.forEach(function(navItem) {
                        navItem.classList.remove('active');
                    });
                    // Menambahkan kelas 'active' ke item yang diklik
                    this.classList.add('active');
                });
            });
        });
    </script>
