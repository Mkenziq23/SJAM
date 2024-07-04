<!-- Start Foto Kegiatan-->
<div class="container mb-5" id="fotokegiatan">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="text-center mb-5">
                <h4 class="text-uppercase mb-0"> Foto Kegiatan</h4>
                <p class="text-muted f-14">Berikut adalah beberapa foto dari kegiatan para santri dan pengurus yang ada
                    pada {{ $setting->namaTahfiz }}.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse ($dataKegiatan as $kegiatan)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow">
                        @if ($kegiatan->image)
                            <img src="{{ asset('storage/' . $kegiatan->image) }}" class="img-fluid"
                                style="border-radius: 12px; border:white 12px solid;"
                                alt="Image of {{ $kegiatan->nama_kegiatan }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $kegiatan->nama_kegiatan }}</h5>
                            <p class="card-text text-center">{{ $kegiatan->tempat_kegiatan }}</p>
                            <p class="card-text text-center">{{ $kegiatan->tanggal_kegiatan }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center fs-4">No post found.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mb-3">
            <a href="/foto-kegiatan" class="btn btn-primary">Lihat Semua Foto Kegiatan >></a>
        </div>
    </div>
</div>
<!-- Kegiatan Foto End -->

<!-- Start Video Kegiatan-->
<div class="container mb-3 mt-5" id="videokegiatan">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="text-center mb-5">
                <h4 class="text-uppercase mb-0">Video Kegiatan</h4>
                <p class="text-muted f-14">Berikut adalah beberapa Video dari kegiatan para santri dan pengurus yang ada
                    pada {{ $setting->namaTahfiz }}.</p>
            </div>
        </div>
    </div>
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

    <div class="d-flex justify-content-center mb-3">
        <a href="/video-kegiatan" class="btn btn-primary">Lihat Semua Video Kegiatan >></a>
    </div>
</div>
<!-- Kegiatan Video End -->
