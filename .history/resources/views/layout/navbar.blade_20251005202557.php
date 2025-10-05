<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#home">
            <img src="{{ asset('ladun/base/img/sjam-1.jpg') }}" 
                 alt="Logo SJAM" 
                 class="rounded-circle me-2" 
                 width="48" 
                 height="48">
            <span class="fw-bold fs-5">SJAM Rumah Tahfidz</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#kelas">Kelas</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#kegiatan">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="#penilaian">Penilaian</a></li>
                <li class="nav-item"><a class="nav-link" href="#donasi">Donasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#pembayaran-spp">Pembayaran SPP</a></li>
                <li class="nav-item"><a class="nav-link" href="#daftar">Pendaftaran</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Script Navbar -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.querySelector(".navbar");
    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    const navbarCollapse = document.getElementById("navbarNav");

    // 1. Navbar change color on scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });

    // 2. Active link on scroll
    function setActiveLink() {
        let scrollY = window.pageYOffset;

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 80; // jarak untuk navbar fixed
            const sectionId = section.getAttribute("id");

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === "#" + sectionId) {
                        link.classList.add("active");
                    }
                });
            }
        });
    }
    window.addEventListener("scroll", setActiveLink);
    setActiveLink();

    // 3. Close navbar on link click (responsive)
    navLinks.forEach(link => {
        link.addEventListener("click", () => {
            if (navbarCollapse.classList.contains("show")) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse, {toggle: true});
                bsCollapse.hide();
            }
        });
    });
});
</script>