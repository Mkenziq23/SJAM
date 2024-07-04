<!-- Hero Start -->
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Hero Start -->
<section class="hero-1-bg position-relative d-flex align-items-center"
    style="background: url({{ asset('/ladun/neloz') }}/images/hero-1-bg.png)" id="home">
    <div class="container mt-5" style="padding-top: 100px;">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-title">
                    <p class="text-uppercase hero-small-title title font-weight-bold f-14 mb-4">
                        {{ $setting->namaTahfiz }}</p>
                    <h1 class="font-weight-bold main-title mb-4" style="color: #08b7c5;">Menciptakan generasi qur'ani
                    </h1>
                    <p class="text-muted mb-4 pb-2">
                        Bersama membangun generasi yang maju, berpendidikan qur'ani, serta menjunjung tinggi nilai-nilai
                        keislaman.
                    </p>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="mt-5 mt-lg-0">
                    <img src="{{ asset('/ladun/base') }}/img/home/image.png"
                        style="border-radius: 12px; border:white 12px solid;" alt=""
                        class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
</section>
