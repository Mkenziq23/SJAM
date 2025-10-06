<div class="row g-4">
    <!-- Total Saldo Saat Ini -->
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 offset-lg-3">
        <div class="card shadow-lg border-0 rounded-4 text-center h-100 card-hover">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center icon-gradient-success">
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
        <div class="card shadow-lg border-0 rounded-4 text-center h-100 card-hover">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center icon-gradient-danger">
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
        <div class="card shadow-lg border-0 rounded-4 text-center h-100 card-hover">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center icon-gradient-primary">
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
        <div class="card shadow-lg border-0 rounded-4 text-center h-100 card-hover">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center icon-gradient-primary">
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
        <div class="card shadow-lg border-0 rounded-4 text-center h-100 card-hover">
            <div class="card-body">
                <div class="mb-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center icon-gradient-primary">
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
/* Typography */
.card-body h6 {
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #6c757d;
}
.card-body h4 {
    font-size: 1.4rem;
    color: #333;
    margin-top: 0.25rem;
}

/* Card Hover Effect */
.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}

/* Icon Gradients */
.icon-gradient-success {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #28a745, #5cd65c);
}
.icon-gradient-danger {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #dc3545, #ff6b6b);
}
.icon-gradient-primary {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #007bff, #00bfff);
}
.icon-gradient-success, .icon-gradient-danger, .icon-gradient-primary {
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Responsive */
@media (max-width: 768px) {
    .card-body h4 {
        font-size: 1.15rem;
    }
    .card-body h6 {
        font-size: 0.8rem;
    }
}
</style>
