<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0 rounded-lg h-100">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 rounded-circle p-3 text-white" style="background: linear-gradient(135deg, #6c5ce7, #a29bfe);">
                    <i class="far fa-user fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Santri</h6>
                    <h4 class="mb-0 font-weight-bold">{{ $tSantri }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0 rounded-lg h-100">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 rounded-circle p-3 text-white" style="background: linear-gradient(135deg, #d63031, #ff7675);">
                    <i class="far fa-newspaper fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Donasi</h6>
                    <h4 class="mb-0 font-weight-bold">Rp. {{ number_format($tDonasi) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0 rounded-lg h-100">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 rounded-circle p-3 text-white" style="background: linear-gradient(135deg, #fdcb6e, #ffeaa7);">
                    <i class="far fa-file fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Pengeluaran</h6>
                    <h4 class="mb-0 font-weight-bold">Rp. {{ number_format($tPengeluaran) }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
        <div class="card shadow-sm border-0 rounded-lg h-100">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3 rounded-circle p-3 text-white" style="background: linear-gradient(135deg, #00b894, #55efc4);">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Pengurus</h6>
                    <h4 class="mb-0 font-weight-bold">{{ $tPengurus }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
