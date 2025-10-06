<div class="row g-4">
    <!-- Total Saldo Saat Ini -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 offset-lg-3">
        <div class="card shadow-lg border-0 rounded-4 text-center h-100">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle bg-success d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                        <i class="fas fa-wallet fa-2x text-white"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-2">Total Saldo Saat Ini</h6>
                <h4 class="fw-bold">Rp. {{ number_format($saldoMasuk) }}</h4>
            </div>
        </div>
    </div>

    <!-- Total Pengeluaran -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card shadow-lg border-0 rounded-4 text-center h-100">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle bg-danger d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                        <i class="fas fa-money-check-alt fa-2x text-white"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-2">Total Pengeluaran</h6>
                <h4 class="fw-bold">Rp. {{ number_format($saldoKeluar) }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-3">
    <!-- Total Semua Donasi -->
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card shadow-lg border-0 rounded-4 text-center h-100">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                        <i class="fas fa-hand-holding-usd fa-2x text-white"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-2">Total Semua Donasi</h6>
                <h4 class="fw-bold">Rp. {{ number_format($tDonasi) }}</h4>
            </div>
        </div>
    </div>

    <!-- Total Donasi Bulan Ini -->
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card shadow-lg border-0 rounded-4 text-center h-100">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                        <i class="fas fa-hand-holding-usd fa-2x text-white"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-2">Total Donasi Bulan Ini</h6>
                <h4 class="fw-bold">Rp. {{ number_format($tDonasiBulanIni) }}</h4>
            </div>
        </div>
    </div>

    <!-- Total Donasi Tahun Ini -->
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card shadow-lg border-0 rounded-4 text-center h-100">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center" style="width:60px;height:60px;">
                        <i class="fas fa-hand-holding-usd fa-2x text-white"></i>
                    </div>
                </div>
                <h6 class="text-muted mb-2">Total Donasi Tahun Ini</h6>
                <h4 class="fw-bold">Rp. {{ number_format($tDonasiTahunIni) }}</h4>
            </div>
        </div>
    </div>
</div>

<style>
.card-body h6 {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.card-body h4 {
    font-size: 1.3rem;
    color: #333;
}

.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .card-body h4 {
        font-size: 1.1rem;
    }

    .card-body h6 {
        font-size: 0.85rem;
    }
}
</style>
