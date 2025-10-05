<div class="row">
    <!-- Kegiatan Tahfiz -->
    <div class="col-12 col-sm-6 col-lg-6 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-images mr-2"></i> Kegiatan Tahfiz</h5>
            </div>
            <div class="card-body p-0">
                <div id="carouselKegiatan" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($dataKegiatan as $index => $kegiatan)
                            <li data-target="#carouselKegiatan" data-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner rounded-bottom">
                        @foreach ($dataKegiatan as $index => $kegiatan)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="d-block w-100" 
                                     src="{{ asset('storage/' . $kegiatan->image) }}"
                                     alt="{{ $kegiatan->nama_kegiatan }}">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2 shadow">
                                    <h6 class="mb-0">{{ $kegiatan->nama_kegiatan }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselKegiatan" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselKegiatan" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- History Absensi -->
    <div class="col-12 col-sm-6 col-lg-6 mb-4">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-user-check mr-2"></i> History Absensi</h5>
            </div>
            <div class="card-body p-2">
                <ul class="list-unstyled mb-0">
                    @foreach ($hAbsen as $absen)
                        @php
                            $status = 'Hadir';
                            $badgeClass = 'badge-success';
                        @endphp
                        <li class="media align-items-center py-2 border-bottom hover-shadow p-2 rounded">
                            <img class="mr-3 rounded-circle" width="50"
                                src="https://demo.getstisla.com/assets/img/avatar/avatar-4.png" alt="avatar">
                            <div class="media-body">
                                <div class="badge badge-pill {{ $badgeClass }} mb-1 float-right">{{ $status }}</div>
                                <h6 class="media-title mb-0">
                                    <a href="javascript:void(0)" class="text-dark font-weight-bold">{{ $absen->santriData->nama }}</a>
                                </h6>
                                <div class="text-small text-muted">
                                    {{ $absen->getKafilahData($absen->id_santri) }}
                                    <span class="bullet mx-1">•</span>
                                    <span class="text-primary">{{ \Carbon\Carbon::parse($absen->created_at)->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CSS tambahan untuk efek hover -->
<style>
    .hover-shadow:hover {
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .carousel-inner img {
        max-height: 350px;
        object-fit: cover;
    }
</style>
