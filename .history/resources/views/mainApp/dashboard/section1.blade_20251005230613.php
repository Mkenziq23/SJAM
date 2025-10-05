<div class="row g-4">

    {{-- Total Santri --}}
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 p-3 rounded-circle bg-primary text-white" style="font-size:24px;">
                    <i class="far fa-user"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Santri</h6>
                    <h4 class="mb-0">{{ $tSantri }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Donasi --}}
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 p-3 rounded-circle bg-danger text-white" style="font-size:24px;">
                    <i class="far fa-newspaper"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Donasi</h6>
                    <h4 class="mb-0">Rp. {{ number_format($tDonasi) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Pengeluaran --}}
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 p-3 rounded-circle bg-warning text-white" style="font-size:24px;">
                    <i class="far fa-file"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Pengeluaran</h6>
                    <h4 class="mb-0">Rp. {{ number_format($tPengeluaran) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Total Pengurus --}}
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body d-flex align-items-center">
                <div class="me-3 p-3 rounded-circle bg-success text-white" style="font-size:24px;">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1">Total Pengurus</h6>
                    <h4 class="mb-0">{{ $tPengurus }}</h4>
                </div>
            </div>
        </div>
    </div>

</div>
