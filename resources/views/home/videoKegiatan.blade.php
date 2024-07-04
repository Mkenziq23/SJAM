 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <title>{{ $setting->namaTahfiz }} - Video Kegiatan</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
     <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
     <meta content="Themesdesign" name="author" />
     <!-- favicon -->
     <link rel="shortcut icon" href="{{ asset('/ladun/neloz') }}/images/favicon.ico">

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

 </head>

 <body>

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
                         <a href="/" class="nav-link">Home</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#kelas" class="nav-link">Kelas</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#tentang" class="nav-link">Tentang</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#fotokegiatan" class="nav-link">Foto Kegiatan</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#videokegiatan" class="nav-link">Video Kegiatan</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#penilaian" class="nav-link">Penilaian Masyarakat</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#donasi" class="nav-link">Donasi</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#pembayaranspp" class="nav-link">Pembayaran SPP</a>
                     </li>
                     <li class="nav-item">
                         <a href="/#daftar" class="nav-link">Pendaftaran</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Navbar End -->


     <!-- Start Video Kegiatan-->
     <div class="container mt-5" style="padding-top: 200px;">
         <div class="row">
             @forelse ($dataVideoKegiatan as $vKegiatan)
                 <div class="col-md-4 mb-3">
                     <div class="card h-100 shadow">
                         <div class="card-body">
                             {{-- Video --}}
                             <div class="embed-responsive embed-responsive-16by9">
                                 <iframe class="embed-responsive-item" src="{{ $vKegiatan->link_video }}"
                                     allowfullscreen></iframe>
                             </div>
                             <h5 class="card-title text-center">{{ $vKegiatan->nama_kegiatan }}</h5>
                             <p class="card-text text-center">{{ $vKegiatan->tempat_kegiatan }}</p>
                             <p class="card-text text-center">{{ $vKegiatan->tanggal_kegiatan }}</p>
                         </div>
                     </div>
                 </div>
             @empty
                 <div class="col-12">
                     <p class="text-center fs-4">No post found.</p>
                 </div>
             @endforelse
         </div>
     </div>


     <div class="d-flex justify-content-center mb-3">
         {{ $dataVideoKegiatan->links() }}
     </div>

     <div class="d-flex justify-content-center mb-3">
         <a href="/" class="btn btn-primary"><i class="fas fa-hand-point-left"></i>
             << Kembali</a>
     </div>

     <!-- Footer Start -->
     <section class="footer">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 col-sm-6">
                     <!-- Logo Footer -->
                     <div class="mb-4">
                         <a href="{{ url('/') }}">
                             <img src="{{ asset('/ladun/base') }}/img/sjam-1.jpg" alt=""
                                 class="rounded-circle" height="150">
                         </a>
                     </div>
                     <p class="footer-desc f-15">{{ $setting->namaTahfiz }}, {{ $setting->motto }}.</p>
                 </div>
                 <div class="col-lg-7 offset-lg-1">
                     <div class="row">
                         <div class="col-md-4">
                             {{-- <h5 class="footer-list-title f-18 font-weight-normal mb-3">Mitra</h5>
                             <ul class="list-unstyled company-sub-menu">
                                 <li><a href="https://haura-grafika.com">Haura Grafika</a></li>
                            <li><a href="https://almira-tech.com">Almira Tech</a></li>
                             </ul> --}}
                         </div>
                         <div class="col-md-4">
                             <h5 class="footer-list-title f-18 font-weight-normal mb-3">{{ $setting->namaTahfiz }}
                             </h5>
                             <ul class="list-unstyled company-sub-menu">
                                 <li><a href="/#tentang">Tentang</a></li>
                                 <li><a href="/#fotokegiatan">Foto Kegiatan</a></li>
                                 <li><a href="/#videokegiatan">Video Kegiatan</a></li>
                                 <li><a href="/#donasi">Donasi</a></li>
                             </ul>
                         </div>

                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-12 mt-5">
                     <div class="text-center footer-alt my-3">
                         <p class="mb-0 f-15">{{ now()->year }} © {{ $setting->namaTahfiz }}</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- javascript -->
     <script src="{{ asset('/ladun/neloz') }}/js/jquery.min.js"></script>
     <script src="{{ asset('/ladun/neloz') }}/js/bootstrap.bundle.min.js"></script>
     <script src="{{ asset('/ladun/neloz') }}/js/scrollspy.min.js"></script>
     <script src="{{ asset('/ladun/neloz') }}/js/jquery.easing.min.js"></script>
     <!-- COUNTER -->
     <script src="{{ asset('/ladun/neloz') }}/js/counter.int.js"></script>
     <!-- carousel -->
     <script src="{{ asset('/ladun/neloz') }}/js/owl.carousel.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <!-- Main Js -->
     <script src="{{ asset('/ladun/neloz') }}/js/app.js"></script>

     <script>
         const server = "{{ url('') }}/";
     </script>
     <script src="{{ asset('/ladun/base/js/') }}/home.js"></script>

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

 </body>

 </html>
