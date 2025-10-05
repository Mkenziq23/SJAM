<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-lg border-0 card-statistic-hover">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon bg-gradient-primary text-white mr-3">
                    <i class="far fa-user fa-2x"></i>
                </div>
                <div class="card-wrap">
                    <h6 class="text-muted mb-1">Total Santri</h6>
                    <h3 class="mb-0">{{ $tSantri }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-lg border-0 card-statistic-hover">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon bg-gradient-danger text-white mr-3">
                    <i class="far fa-newspaper fa-2x"></i>
                </div>
                <div class="card-wrap">
                    <h6 class="text-muted mb-1">Total Donasi</h6>
                    <h3 class="mb-0">Rp. {{ number_format($tDonasi) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-lg border-0 card-statistic-hover">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon bg-gradient-warning text-white mr-3">
                    <i class="far fa-file fa-2x"></i>
                </div>
                <div class="card-wrap">
                    <h6 class="text-muted mb-1">Total Pengeluaran</h6>
                    <h3 class="mb-0">Rp. {{ number_format($tPengeluaran) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-lg border-0 card-statistic-hover">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon bg-gradient-success text-white mr-3">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div class="card-wrap">
                    <h6 class="text-muted mb-1">Total Pengurus</h6>
                    <h3 class="mb-0">{{ $tPengurus }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
