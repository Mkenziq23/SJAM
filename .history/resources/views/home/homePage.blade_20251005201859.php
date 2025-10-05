<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- 🧭 Navbar Bootstrap --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#home">
                <img src="{{ asset('ladun/base/img/sjam-1.jpg') }}" alt="Logo SJAM" width="40" height="40" class="rounded-circle me-2">
                <span class="fw-bold">SJAM Rumah Tahfidz</span>
            </a>

            {{-- Tombol Hamburger --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu Navigasi --}}
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kelas">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>

                    {{-- Dropdown Kegiatan --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kegiatan
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#foto-kegiatan">Foto Kegiatan</a></li>
                            <li><a class="dropdown-item" href="#video-kegiatan">Video Kegiatan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#penilaian">Penilaian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#donasi">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pembayaran-spp">Pembayaran SPP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pendaftaran">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- 🔹 Konten Halaman --}}
    <main class="container" style="padding-top: 100px;">
        @yield('content')
    </main>

    {{-- 🔹 Footer --}}
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">© {{ date('Y') }} SJAM Rumah Tahfidz. All rights reserved.</p>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
