<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm py-3">
    <div class="container">
        {{-- 🔹 Logo & Nama --}}
        <a class="navbar-brand d-flex align-items-center" href="#home">
            <img src="{{ asset('ladun/base/img/sjam-1.jpg') }}" 
                 alt="Logo SJAM" 
                 class="rounded-circle me-2" 
                 width="48" 
                 height="48">
            <span class="fw-bold fs-5">SJAM Rumah Tahfidz</span>
        </a>

        {{-- 🔹 Tombol Hamburger --}}
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- 🔹 Menu Navigasi --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#kelas">Kelas</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>

                {{-- Dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="kegiatanDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kegiatan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn" aria-labelledby="kegiatanDropdown">
                        <li><a class="dropdown-item" href="#foto-kegiatan">📸 Foto Kegiatan</a></li>
                        <li><a class="dropdown-item" href="#video-kegiatan">🎥 Video Kegiatan</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="#penilaian">Penilaian</a></li>
                <li class="nav-item"><a class="nav-link" href="#donasi">Donasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#pembayaran-spp">Pembayaran SPP</a></li>
                <li class="nav-item"><a class="nav-link" href="#pendaftaran">Pendaftaran</a></li>
            </ul>
        </div>
    </div>
</nav>
