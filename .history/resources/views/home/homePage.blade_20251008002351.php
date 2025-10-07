@extends('home.app')

@section('title', 'Home')

@section('content')



<!-- 🌅 Hero Section 1 -->
<section class="hero-section position-relative d-flex align-items-center justify-content-center" id="home">
    <div class="hero-overlay"></div>

    <div class="container position-relative z-2 text-center text-lg-start">
        <div class="row align-items-center">
            <!-- Hero Text -->
            <div class="col-lg-6 col-md-12">
                <p class="text-uppercase fw-semibold text-white small mb-3 fade-in">
                    {{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}
                </p>
                <h1 class="fw-bold mb-4 fade-in" style="color: #00e0ff;">
                    Menciptakan Generasi Qur’ani
                </h1>
                <p class="text-light mb-4 pb-2 fade-in" style="max-width: 480px;">
                    Bersama membangun generasi yang maju, berpendidikan Qur’ani, serta menjunjung tinggi nilai-nilai
                    keislaman dan akhlakul karimah.
                </p>
                <a href="#pendaftaran" class="btn btn-primary px-4 py-2 rounded-pill shadow fade-in">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Hero Image -->
            <div class="col-lg-6 col-md-12 text-center mt-5 mt-lg-0 fade-in">
                <img src="{{ asset('ladun/base/img/home/image.png') }}"
                    alt="Ilustrasi Rumah Tahfidz"
                    class="img-fluid hero-image mx-auto d-block rounded-4 shadow-lg border border-white">
            </div>

        </div>
    </div>
</section>
<!-- Donasi Section 1` end -->


<!-- Kelas Start -->
<section class="kelas-section py-5" id="kelas">
    <div class="container">
        <!-- Header -->
        <div class="row justify-content-center mb-5 text-center">
            <div class="col-lg-6 col-md-8">
                <h2 class="fw-bold mb-2">Mata Pelajaran</h2>
                <p class="text-muted f-15">
                    Berikut adalah mata pelajaran yang ada pada {{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}.
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Bahasa Arab -->
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-box p-4 text-center shadow hover-card">
                    <div class="service-icon mb-4">
                        <i class="fas fa-quran text-primary fa-3x"></i>
                    </div>
                    <h5 class="mb-3 fw-bold">Bahasa Arab</h5>
                    <p class="text-muted f-15">Kelas ini diperuntukkan untuk santri yang ingin menguasai bahasa Arab.</p>
                </div>
            </div>

            <!-- Tahfidz & Tahsin -->
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-box p-4 text-center shadow hover-card">
                    <div class="service-icon mb-4">
                        <i class="fas fa-quran text-success fa-3x"></i>
                    </div>
                    <h5 class="mb-3 fw-bold">Tahfidz & Tahsin</h5>
                    <p class="text-muted f-15">Kelas ini fokus menghafal Al-Qur'an dan memperbaiki tajwid.</p>
                </div>
            </div>

            <!-- Matematika -->
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-box p-4 text-center shadow hover-card">
                    <div class="service-icon mb-4">
                        <i class="fas fa-calculator text-danger fa-3x"></i>
                    </div>
                    <h5 class="mb-3 fw-bold">Matematika</h5>
                    <p class="text-muted f-15">Kelas ini membantu santri memahami logika dan perhitungan.</p>
                </div>
            </div>

            <!-- Bahasa Inggris -->
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-box p-4 text-center shadow hover-card">
                    <div class="service-icon mb-4">
                        <i class="fas fa-language text-warning fa-3x"></i>
                    </div>
                    <h5 class="mb-3 fw-bold">Bahasa Inggris</h5>
                    <p class="text-muted f-15">Belajar bahasa Inggris dengan mudah dan menyenangkan.</p>
                </div>
            </div>

            <!-- Komputer -->
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-box p-4 text-center shadow hover-card">
                    <div class="service-icon mb-4">
                        <i class="fas fa-laptop text-info fa-3x"></i>
                    </div>
                    <h5 class="mb-3 fw-bold">Komputer</h5>
                    <p class="text-muted f-15">Belajar dasar komputer dan teknologi digital.</p>
                </div>
            </div>

            <!-- Leadership & Entrepreneurship -->
            <div class="col-lg-4 col-md-6 fade-in">
                <div class="service-box p-4 text-center shadow hover-card">
                    <div class="service-icon mb-4">
                        <i class="fas fa-chalkboard-teacher text-secondary fa-3x"></i>
                    </div>
                    <h5 class="mb-3 fw-bold">Leadership & Entrepreneurship</h5>
                    <p class="text-muted f-15">Mengembangkan jiwa kepemimpinan dan wirausaha.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kelas End -->



<!-- Tentang Kami Start -->
<section class="tentang-section position-relative py-5" id="tentang">
    <div class="tentang-overlay"></div>

    <div class="container position-relative z-2 text-center text-lg-start">
        <!-- Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold text-white mb-3">Tentang Kami</h2>
                <p class="text-light f-15">
                    Rumah Tahfidz {{ $setting->namaTahfiz ?? 'SJAM' }} berkomitmen mencetak generasi Qur’ani yang berakhlak mulia, berwawasan luas, dan menjadi kebanggaan umat melalui pendidikan Al-Qur’an yang modern, menyenangkan, dan penuh keberkahan.
                </p>
            </div>
        </div>

        <!-- Konten Visi & Misi -->
        <div class="row justify-content-center">
            <div class="col-lg-8 fade-in">
                <div class="p-4 bg-white rounded-4 shadow-lg border-start border-4 border-primary position-relative z-2">
                    <h3 class="fw-bold mb-3 text-dark">Misi Kami</h3>
                    <p class="text-muted mb-4 f-15">
                        {{ $setting->kata_kata ?? 'Kami berkomitmen untuk mencetak generasi Qur’ani yang unggul, berakhlak mulia, dan berpengetahuan luas.' }}
                    </p>
                    <p class="mb-1 fw-semibold text-dark">{{ $setting->pembina ?? 'Nama Pembina' }}</p>
                    <small class="text-muted">Pendiri & Pembina {{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}</small>
                    <div class="mt-4 d-flex flex-wrap justify-content-center gap-2">
                        <a href="#pendaftaran" class="btn btn-outline-primary px-4 py-2 rounded-pill">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kepengurusan -->
    <div class="container mt-5">
        <h3 class="text-center fw-bold mb-4 text-white">Struktur Kepengurusan</h3>
        <div class="org-chart">
            <!-- Level 1 -->
            <div class="org-level">
                <div class="org-box">
                    <img src="{{ asset('img/default-image.png') }}"  alt="CEO">
                    <h5>CEO</h5>
                    <p>Memimpin dan mengawasi seluruh kegiatan organisasi.</p>
                </div>
            </div>

            <!-- Connector Vertikal -->
            <div class="org-connector-vertical"></div>

            <!-- Level 2 -->
            <div class="org-level">
                <div class="org-box">
                    <img src="{{ asset('img/default-image.png') }}" alt="COO">
                    <h5>COO</h5>
                    <p>Menangani operasional harian organisasi.</p>
                </div>
                <div class="org-box">
                    <img src="{{ asset('img/default-image.png') }}"  alt="CFO">
                    <h5>CFO</h5>
                    <p>Memanage keuangan dan anggaran organisasi.</p>
                </div>
            </div>

            <!-- Connector Vertikal -->
            <div class="org-connector-vertical"></div>

            <!-- Level 3 -->
            <div class="org-level">
                <div class="org-box">
                    <img src="{{ asset('img/default-image.png') }}"  alt="VP Teknologi">
                    <h5>VP Teknologi</h5>
                    <p>Menangani teknologi dan sistem IT.</p>
                </div>
                <div class="org-box">
                    <img src="{{ asset('img/default-image.png') }}"  alt="VP Pemasaran">
                    <h5>VP Pemasaran</h5>
                    <p>Memimpin strategi pemasaran dan promosi.</p>
                </div>
                <div class="org-box">
                    <img src="{{ asset('img/default-image.png') }}" alt="VP SDM">
                    <h5>VP SDM</h5>
                    <p>Menangani sumber daya manusia dan pelatihan.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tentang Kami End -->



<!-- Kegiatan Foto & Video Start -->
<section class="kegiatan-section py-5 bg-white" id="kegiatan">
    <div class="container">
        <!-- Header -->
        <div class="row justify-content-center mb-5 text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold text-dark mb-3">Kegiatan Santri</h2>
                <p class="text-muted f-15">
                    Berikut adalah beberapa kegiatan para santri dan pengurus di {{ $setting->namaTahfiz ?? 'SJAM' }} dalam bentuk foto dan video.
                </p>
            </div>
        </div>

        <!-- Foto Kegiatan -->
        <div class="row g-4 mb-5" id="foto-kegiatan">
            @forelse ($dataKegiatan as $kegiatan)
                <div class="col-md-4 fade-in">
                    <div class="card h-100 shadow-lg rounded-4 border-0 overflow-hidden hover-card">
                        @if ($kegiatan->image)
                            <a href="{{ asset('storage/' . $kegiatan->image) }}" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $kegiatan->id }}">
                                <img src="{{ asset('storage/' . $kegiatan->image) }}" class="img-fluid card-img-top hover-zoom" alt="{{ $kegiatan->nama_kegiatan }}">
                            </a>
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $kegiatan->nama_kegiatan }}</h5>
                            <p class="card-text">{{ $kegiatan->tempat_kegiatan }}</p>
                            <p class="card-text text-muted">{{ $kegiatan->tanggal_kegiatan }}</p>
                        </div>
                    </div>

                    <!-- Modal Foto -->
                    <div class="modal fade" id="modalFoto{{ $kegiatan->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-body p-0">
                                    <img src="{{ asset('storage/' . $kegiatan->image) }}" class="img-fluid w-100 rounded-top" alt="{{ $kegiatan->nama_kegiatan }}">
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center fs-4">Tidak ada kegiatan foto.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mb-5">
            <a href="/foto-kegiatan" class="btn btn-primary px-5 py-2 rounded-pill shadow-lg hover-btn">
                Lihat Semua Foto Kegiatan <i class="fas fa-arrow-right ms-2"></i>
            </a>

        </div>

        <!-- Video Kegiatan -->
        <div class="row g-4" id="video-kegiatan">
            @forelse ($dataVideoKegiatan as $vKegiatan)
                <div class="col-md-4 fade-in">
                    <div class="card h-100 shadow-lg rounded-4 border-0 overflow-hidden hover-card">
                        <a href="{{ $vKegiatan->link_video }}" target="_blank">
                            @if ($vKegiatan->image)
                                <!-- Tampilkan gambar thumbnail -->
                                <img src="{{ asset('storage/' . $vKegiatan->image) }}" class="card-img-top" alt="{{ $vKegiatan->nama_kegiatan }}">
                            @else
                                <!-- Jika tidak ada thumbnail, tetap tampilkan video embed sebagai fallback -->
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $vKegiatan->link_video }}" allowfullscreen class="rounded-top"></iframe>
                                </div>
                            @endif
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $vKegiatan->nama_kegiatan }}</h5>
                            <p class="card-text">{{ $vKegiatan->tempat_kegiatan }}</p>
                            <p class="card-text text-muted">{{ $vKegiatan->tanggal_kegiatan }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center fs-4">Tidak ada kegiatan video.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            <a href="/video-kegiatan" class="btn btn-primary px-5 py-2 rounded-pill shadow-lg hover-btn">Lihat Semua Video Kegiatan <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
<!-- Kegiatan Foto & Video End -->


<!-- Penilaian Masyarakat Start -->
<section class="penilaian-section py-5" id="penilaian">
    <!-- Overlay gradasi -->
    <div class="penilaian-overlay"></div>

    <div class="container">
        <!-- Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <h2 class="fw-bold mb-2">Penilaian Masyarakat</h2>
                <p class="text-light f-15">
                    Berikut adalah beberapa penilaian masyarakat terhadap 
                    <strong>{{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}</strong>.
                </p>
            </div>
        </div>

        <!-- Carousel Penilaian -->
        <div class="row">
            <div class="owl-carousel owl-theme">
                @forelse($penilaianMasyarakat as $penilaian)
                    <div class="item">
                        <div class="card penilaian-card text-center">
                            <div class="card-body">
                                <img src="{{ $penilaian->avatar ?? 'https://i.pravatar.cc/150?img=' . rand(1, 70) }}" 
                                    alt="{{ $penilaian->name }}" 
                                    class="user-img mb-3">
                                <h6 class="fw-bold mb-1">{{ $penilaian->name }}</h6>
                                <p class="text-muted small mb-2 text-truncate-3">{{ $penilaian->reason }}</p>
                                <div>
                                    @for ($i = 0; $i < $penilaian->stars; $i++)
                                        <i class="mdi mdi-star text-warning"></i>
                                    @endfor
                                    @for ($i = $penilaian->stars; $i < 5; $i++)
                                        <i class="mdi mdi-star-outline text-warning"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="fs-6 text-light">Belum ada penilaian dari masyarakat.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Button Tambah Penilaian -->
        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 text-center">
                <button class="btn btn-outline-light btn-lg rounded-pill" data-bs-toggle="modal" data-bs-target="#ratingModal">
                    Berikan Penilaian / Ulasan Anda
                </button>
            </div>
        </div>
    </div>
</section>
<!-- Penilaian Masyarakat End -->

<!-- Rating Modal -->
<!-- Rating Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="ratingModalLabel">Berikan Penilaian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('ratings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="ratingName" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="ratingName" name="name" placeholder="Masukkan nama anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="ratingReason" class="form-label">Alasan Penilaian</label>
                        <textarea class="form-control" id="ratingReason" name="reason" rows="3" placeholder="Masukkan ulasan anda" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bintang</label>
                        <select name="stars" class="form-select" required>
                            <option value="">Pilih Bintang</option>
                            <option value="1">⭐ (1)</option>
                            <option value="2">⭐⭐ (2)</option>
                            <option value="3">⭐⭐⭐ (3)</option>
                            <option value="4">⭐⭐⭐⭐ (4)</option>
                            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-pill">Kirim Penilaian</button>
                </form>
            </div>
        </div>
    </div>
</div>
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Mohon isi semua data dengan benar.',
        });
    </script>
@endif




<!-- Donasi Section Start -->
<section class="donasi-section py-5 position-relative" id="donasi" style="background: linear-gradient(135deg, #e8f9ff, #fdfdfd);">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Kolom Teks -->
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="p-3 p-lg-4 bg-white rounded-4 shadow-lg border-start border-4 border-primary fade-in">
                    <h6 class="text-uppercase fw-semibold text-primary mb-3">
                        Donasi untuk Pembangunan & Pengembangan
                    </h6>
                    <h3 class="fw-bold text-dark mb-4">
                        {{ $setting->namaTahfiz ?? 'SJAM' }}
                    </h3>
                    
                    <p class="text-muted lh-lg">
                        💐 <strong>Jazakumullah khair</strong> kepada para donatur yang telah memberikan kepercayaan dan dukungan untuk Rumah Tahfidz kami.<br><br>
                        🌹 Terima kasih atas donasi berupa <em>Al-Qur'an, materi, makanan</em>, dan dukungan moral yang diberikan kepada santri {{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}.<br><br>
                        <em class="text-primary">"InsyaAllah, menjadi amal jariyah yang tiada terputus dan pembuka keberkahan dunia akhirat."</em><br><br>
                        Dana akan digunakan untuk pembangunan, pengembangan fasilitas, kegiatan keagamaan (khataman, maulid nabi, dll), serta santunan anak yatim.
                    </p>

                    <hr class="my-4">

                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <h5 class="text-muted mb-1">Informasi Donasi</h5>
                            <h4 class="fw-bold text-primary">
                                {{ $setting->namaBank ?? '' }} - <span class="text-dark small">{{ $setting->noRekening ?? '123456789' }}</span>
                            </h4>
                        </div>

                        <a href="#kontak" class="btn btn-primary px-4 py-2 mt-3 mt-lg-0 rounded-pill shadow-lg">
                            Donasi Sekarang
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kolom Gambar (Carousel) -->
            <div class="col-lg-6">
                <div id="donasiCarousel" class="carousel slide rounded-4 overflow-hidden shadow-lg fade-in" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('ladun/base/img/home/hero-3-img.jpg') }}" 
                                alt="Kegiatan Santri" 
                                class="d-block w-100 img-fluid" 
                                style="object-fit: cover; height: 420px;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('ladun/base/img/home/donasi-2.jpg') }}" 
                                alt="Donasi Kegiatan" 
                                class="d-block w-100 img-fluid" 
                                style="object-fit: cover; height: 420px;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('ladun/base/img/home/donasi-3.jpg') }}" 
                                alt="Kegiatan Sosial" 
                                class="d-block w-100 img-fluid" 
                                style="object-fit: cover; height: 420px;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#donasiCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#donasiCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
<!--  Donasi Section End -->

<!-- Pembayaran SPP Section Start -->
<section class="pembayaran-section position-relative py-5" id="pembayaran-spp">
    <!-- Overlay gradasi -->
    <div class="pembayaran-overlay"></div>

    <div class="container position-relative z-2 text-center text-lg-start">
        <!-- Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold text-white mb-3">Pembayaran SPP</h2>
                <p class="text-light f-15">
                    Untuk melakukan pembayaran SPP santri, silahkan transfer ke rekening resmi 
                    <strong>{{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}</strong> berikut ini.
                </p>
            </div>
        </div>

        <!-- Konten Form Pembayaran -->
        <div class="row justify-content-center">
            <div class="col-lg-8 fade-in">
                <div class="p-4 bg-white rounded-4 shadow-lg border-start border-4 border-primary position-relative z-2">
                    <h4 class="fw-bold mb-2 text-dark">Rekening Pembayaran SPP</h4>
                    <p class="text-dark mb-2">{{ $setting->namaBank ?? 'Bank BSI' }}</p>
                    <p class="text-muted mb-4">{{ $setting->noRek ?? '123456789' }} a.n {{ $setting->namaTahfiz ?? 'Rumah Tahfidz SJAM' }}</p>

                    <p class="text-muted mb-4">
                        Setelah melakukan pembayaran, harap unggah bukti pembayaran melalui form di bawah ini.
                    </p>

                    <!-- Form Cek Data & Upload Bukti -->
                    <form id="buktiPembayaranForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="txtNomorHandphoneSantriSetorSpp" class="form-label">Nomor Handphone</label>
                            <small class="text-muted d-block mb-1"><i>Ini adalah nomor handphone pada saat mendaftar</i></small>
                            <input type="text" id="txtNomorHandphoneSantriSetorSpp" class="form-control mb-2" placeholder="Nomor handphone santri/orang tua" value="08">
                            <a href="javascript:void(0)" class="btn btn-primary w-100 mb-3" onclick="checkDataSantriAtc()">Check Data</a>
                        </div>

                        <div id="divBothSantriData" style="display: none;">
                            <h5 class="fw-bold mb-3">Data Santri</h5>
                            <table class="table table-bordered mb-3">
                                <tr><td>Id Santri</td><td>:</td><td><span id="rIdSantri"></span></td></tr>
                                <tr><td>Nama Santri</td><td>:</td><td><span id="rNamaSantri"></span></td></tr>
                                <tr><td>Nama Orang Tua</td><td>:</td><td><span id="rNamaOrangTua"></span></td></tr>
                                <tr><td>Kelas</td><td>:</td><td><span id="rKelas"></span></td></tr>
                                <tr>
                                    <td>Bukti Pembayaran</td>
                                    <td>:</td>
                                    <td><input type="file" id="txtFile" class="form-control"></td>
                                </tr>
                            </table>
                            <a href="javascript:void(0)" class="btn btn-success w-100" onclick="submitPembayaranAtc()">Submit Bukti Pembayaran</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Pembayaran SPP Section End -->

<!-- Pendaftaran Section Start -->
<section class="pendaftaran-section py-5" id="daftar">
    <div class="container">
        <!-- Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold mb-3">Pendaftaran Santri</h2>
                <p class="text-muted">
                    Silahkan isi form di bawah untuk mendaftar menjadi santri Tahfiz Al-Haziq.
                </p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg rounded-4 border-0">
                    <div class="card-body p-5">
                        <form id="formPendaftaran">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nama Lengkap</label>
                                    <input type="text" name="nama_santri" class="form-control" placeholder="Nama calon santri" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email calon santri/orang tua" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">No HP / WhatsApp</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="0812xxxx" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold d-flex align-items-center">
                                        <i class="bi bi-gender-ambiguous me-2"></i> Jenis Kelamin
                                    </label>
                                    <select class="form-select" name="jk" required>
                                        <option value="" disabled selected>Pilih jenis kelamin</option>
                                        <option value="L">👦 Laki-Laki</option>
                                        <option value="P">👧 Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Nama Orang Tua / Wali</label>
                                    <input type="text" name="nama_ortu" class="form-control" placeholder="Nama orang tua / wali" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Kelas</label>
                                    <select class="form-select" name="kelas" required>
                                        <option value="" disabled selected>--- Pilih kelas ---</option>
                                        <option value="DASAR">Bahasa Arab</option>
                                        <option value="TAHFIZ DAN TAHSIN">Tahfidz & Tahsin</option>
                                        <option value="MATEMATIKA">Matematika</option>
                                        <option value="BAHASA INGGRIS">Bahasa Inggris</option>
                                        <option value="KOMPUTER">Komputer</option>
                                        <option value="LEADERSHIP DAN INTERPRENEURSHIP">Leadership & Interpreneurship</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat lengkap" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Harapan & Capaian</label>
                                    <textarea name="harapan" class="form-control" rows="3" placeholder="Harapan dan capaian setelah belajar di Rumah Tahfiz Al-Haziq"></textarea>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                            <div id="simple-msg" class="mt-3 text-center"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pendaftaran Section End -->
@endsection
