<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12 offset-lg-3 text-center">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-wallet"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Saldo Saat Ini</h4>
                </div>
                <div class="card-body">
                    Rp. {{ $saldoMasuk }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-money-check-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pengeluaran</h4>
                </div>
                <div class="card-body">
                    Rp. {{ $saldoKeluar }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Semua Donasi</h4>
                </div>
                <div class="card-body">
                    Rp. {{ number_format($tDonasi) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Donasi Bulan Ini</h4>
                </div>
                <div class="card-body">
                    Rp. {{ number_format($tDonasiBulanIni) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Donasi Tahun Ini</h4>
                </div>
                <div class="card-body">
                    Rp. {{ number_format($tDonasiTahunIni) }}
                </div>
            </div>
        </div>
    </div>
</div>
