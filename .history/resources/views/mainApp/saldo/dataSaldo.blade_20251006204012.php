<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-outline-primary fw-semibold" id="btnRefreshSaldo">
        <i class="fas fa-sync-alt me-2"></i> Refresh
    </button>
</div>

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
                <h4 class="fw-bold" id="saldoMasuk">Rp. {{ number_format($saldoMasuk) }}</h4>
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
                <h4 class="fw-bold" id="saldoKeluar">Rp. {{ number_format($saldoKeluar) }}</h4>
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
                <h4 class="fw-bold" id="totalDonasi">Rp. {{ number_format($tDonasi) }}</h4>
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
                <h4 class="fw-bold" id="donasiBulanIni">Rp. {{ number_format($tDonasiBulanIni) }}</h4>
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
                <h4 class="fw-bold" id="donasiTahunIni">Rp. {{ number_format($tDonasiTahunIni) }}</h4>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('btnRefreshSaldo').addEventListener('click', function() {
    fetch("{{ route('saldo.refresh') }}")
    .then(res => res.json())
    .then(data => {
        document.getElementById('saldoMasuk').innerText = 'Rp. ' + new Intl.NumberFormat().format(data.saldoMasuk);
        document.getElementById('saldoKeluar').innerText = 'Rp. ' + new Intl.NumberFormat().format(data.saldoKeluar);
        document.getElementById('totalDonasi').innerText = 'Rp. ' + new Intl.NumberFormat().format(data.tDonasi);
        document.getElementById('donasiBulanIni').innerText = 'Rp. ' + new Intl.NumberFormat().format(data.tDonasiBulanIni);
        document.getElementById('donasiTahunIni').innerText = 'Rp. ' + new Intl.NumberFormat().format(data.tDonasiTahunIni);
    })
    .catch(err => console.error(err));
});
</script>
