<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard - {{ $namaTahfiz }}</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Additional CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="https://nos.jkt-1.neo.id/aditiastorage/asset/web_lib/owlcarousel2/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/iziToast/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('ladun/dashboard/nProg/nprogress.css') }}" />

    <!-- Google Charts & NProgress -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body style="font-family: 'Nunito Sans';">
    <div id="app">
        <div class="main-wrapper">
            <!-- Navbar -->
            <div class="navbar-bg" style="background-color:#0984e3;"></div>
            <nav class="navbar navbar-expand-lg main-navbar" id="divNavbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown mr-4">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('ladun/dashboard/img/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('/auth/logout') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Sidebar -->
            @if (Auth::check())
            <div class="main-sidebar shadow" id="divMenu">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand text-center py-3">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('ladun/stisla/img/sjam.jpg') }}" class="img-fluid" style="max-width: 120px;">
                        </a>
                    </div>

                    <ul class="sidebar-menu mt-3">
                        <li class="nav-item"><a class="nav-link" @click="dashboardAtc()" href="javascript:void(0)"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" @click="absensiAtc()" href="javascript:void(0)"><i class="fas fa-chart-bar"></i> Absensi Harian</a></li>
                        <li class="nav-item"><a class="nav-link" @click="pembayaranSppAtc()" href="javascript:void(0)"><i class="fas fa-credit-card"></i> Pembayaran SPP</a></li>
                        <li class="nav-item"><a class="nav-link" @click="buktiBayarAtc()" href="javascript:void(0)"><i class="fas fa-receipt"></i> Bukti Pembayaran SPP</a></li>

                        <!-- Data Master -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="collapse" data-target="#dataMaster">
                                <i class="fas fa-database"></i> Data Master <i class="fas fa-chevron-down float-right"></i>
                            </a>
                            <ul id="dataMaster" class="collapse dropdown-menu">
                                <li><a class="nav-link" href="javascript:void(0)" @click="santriAtc()">Santri</a></li>
                                <li><a class="nav-link" href="javascript:void(0)" @click="pendaftaranSantriAtc()">Pendaftaran Santri</a></li>
                                <li><a class="nav-link" href="javascript:void(0)" @click="pengurusAtc()">Pengurus</a></li>
                            </ul>
                        </li>

                        @if (Auth::user()->role != '2')
                        <!-- Keuangan -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="collapse" data-target="#keuanganMenu">
                                <i class="fas fa-wallet"></i> Keuangan <i class="fas fa-chevron-down float-right"></i>
                            </a>
                            <ul id="keuanganMenu" class="collapse dropdown-menu">
                                <li><a class="nav-link" href="javascript:void(0)" @click="saldoAtc()">Saldo</a></li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link has-dropdown" data-toggle="collapse" data-target="#pengeluaranMenu">Pengeluaran <i class="fas fa-chevron-down float-right"></i></a>
                                    <ul id="pengeluaranMenu" class="collapse dropdown-menu">
                                        <li><a class="nav-link" href="javascript:void(0)" @click="penggajianAtc()">Penggajian</a></li>
                                        <li><a class="nav-link" href="javascript:void(0)" @click="pengeluaranAtc()">Operasional</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link has-dropdown" data-toggle="collapse" data-target="#donasiMenu">Pemasukkan Donasi/Infaq <i class="fas fa-chevron-down float-right"></i></a>
                                    <ul id="donasiMenu" class="collapse dropdown-menu">
                                        <li><a class="nav-link" href="javascript:void(0)" @click="donasiAtc()">Uang</a></li>
                                        <li><a class="nav-link" href="javascript:void(0)" @click="donasiBarangAtc()">Barang</a></li>
                                    </ul>
                                </li>

                                <li><a class="nav-link" href="javascript:void(0)" @click="cashFlowAtc()">Cash Flow</a></li>
                            </ul>
                        </li>
                        @endif

                        <!-- Laporan & Statistik -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="collapse" data-target="#laporanMenu">
                                <i class="fas fa-chart-line"></i> Laporan & Statistik <i class="fas fa-chevron-down float-right"></i>
                            </a>
                            <ul id="laporanMenu" class="collapse dropdown-menu">
                                <li><a class="nav-link" href="javascript:void(0)" @click="laporanKeuanganAtc()">Laporan Keuangan</a></li>
                                <li><a class="nav-link" href="javascript:void(0)" @click="rekapAbsensi()">Rekap Absensi</a></li>
                                <li><a class="nav-link" href="javascript:void(0)" @click="penilaianMasyarakatAtc()">Penilaian Masyarakat</a></li>
                            </ul>
                        </li>

                        <!-- Kegiatan -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="collapse" data-target="#kegiatanMenu">
                                <i class="fas fa-users"></i> Kegiatan <i class="fas fa-chevron-down float-right"></i>
                            </a>
                            <ul id="kegiatanMenu" class="collapse dropdown-menu">
                                <li><a class="nav-link" href="javascript:void(0)" @click="kegiatanAtc()"><i class="fas fa-images"></i> Foto Kegiatan</a></li>
                                <li><a class="nav-link" href="javascript:void(0)" @click="videoKegiatanAtc()"><i class="fas fa-video"></i> Video Kegiatan</a></li>
                            </ul>
                        </li>

                        <!-- Setting & Logout -->
                        <li class="nav-item"><a class="nav-link" href="javascript:void(0)" @click="settingAtc()"><i class="fas fa-cog"></i> Setting</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/auth/logout') }}"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                    </ul>
                </aside>
            </div>
            @endif

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="main-footer" id="divFooter">Sistem Manajemen Rumah {{ $namaTahfiz }}</footer>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/popper.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/moment.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/datatables.min.js') }}"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/iziToast.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('ladun/dashboard/stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('ladun/base/js/mainApp.js') }}"></script>

    <script>
        const server = "{{ url('/') }}/";
    </script>
</body>

</html>
