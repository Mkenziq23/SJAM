<div class="row">
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Kegiatan Tahfiz</h4>
            </div>
            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($dataKegiatan as $index => $kegiatan)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}"
                                {{ $index == 0 ? 'class="active"' : '' }}></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($dataKegiatan as $index => $kegiatan)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ asset('storage/' . $kegiatan->image) }}"
                                    alt="{{ $kegiatan->nama_kegiatan }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>History Absensi</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    @foreach ($hAbsen as $absen)
                        <li class="media">
                            <img class="mr-3 rounded-circle" width="50"
                                src="https://demo.getstisla.com/assets/img/avatar/avatar-4.png" alt="avatar">
                            <div class="media-body">
                                <div class="badge badge-pill badge-success mb-1 float-right">Hadir</div>
                                <h6 class="media-title"><a href="javascript:void(0)">{{ $absen->santriData->nama }}</a>
                                </h6>
                                <div class="text-small text-muted">{{ $absen->getKafilahData($absen->id_santri) }}
                                    <div class="bullet"></div>
                                    <span class="text-primary">{{ $absen->created_at }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
