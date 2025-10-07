<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Beranda')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

     {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
    {{-- App JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    


    {{-- Custom CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- 🧭 Navbar --}}
    @include('home.navbar')

    {{-- 🔹 Konten Halaman --}}
    <main class="container" style="padding-top: 50px;">
        @yield('content')

    </main>

    {{-- 🔹 Footer --}}
    <footer class="footer mt-5 py-5">
        <div class="container text-center text-white">
            <!-- Logo / Nama -->
            <div class="mb-3">
                <img src="{{ asset('ladun/base/img/sjam-1.jpg') }}" alt="Logo SJAM" class="rounded-circle" width="60" height="60">
                <h5 class="mt-2 fw-bold">SJAM Rumah Tahfidz</h5>
            </div>

            <!-- Deskripsi -->
            <p class="mb-3 f-15 text-light">
                Mencetak generasi Qur’ani yang berakhlak mulia, berwawasan luas, dan penuh berkah.
            </p>

            <!-- Social Media -->
            <div class="social-icons mb-3">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-whatsapp"></i></a>
            </div>

            <!-- Hak cipta -->
            <p class="mb-0 small">
                © {{ date('Y') }} SJAM Rumah Tahfidz. All rights reserved.
            </p>
        </div>
    </footer>


    {{-- Bootstrap JS (Bundle sudah termasuk Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Script efek scroll navbar --}}
    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
    <!--  JS Section Rating -->
<script>
    const server = "{{ url('/') }}/";
    const rRatingsStore = "{{ route('ratings.store') }}";
</script>
<script src="{{ asset('ladun/base/js/home.js') }}"></script>
</body>
</html>
