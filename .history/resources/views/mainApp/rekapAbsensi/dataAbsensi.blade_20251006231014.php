<!-- Div Tabel Rekap Absensi -->
<div id="divDataRekapAbsensi" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <!-- Header Filter -->
        <div class="card-header bg-primary text-white d-flex flex-wrap align-items-center justify-content-between py-3 px-4 rounded-top-4">
            <h5 class="mb-0"><i class="fas fa-calendar-alt me-2 fa-1x"></i> Filter Rekap Absensi</h5>
            <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
                <select class="form-select" id="txtTahun">
                    @for ($y = 2021; $y <= 2028; $y++)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endfor
                </select>

                <select class="form-select" id="txtBulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>

                <button class="btn btn-light btn-sm fw-semibold" @click="modalPilihWaktuAtc()">
                    <i class="fas fa-filter me-1"></i> Filter Waktu
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4" id="divRawAbsensi">
            <!-- Data rekapan akan di-load di sini -->
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
}
.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
}
.form-select {
    min-width: 100px;
}
.btn {
    min-width: 120px;
}
@media (max-width: 576px) {
    .card-header h5 {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    .form-select, .btn {
        width: 100%;
    }
    .d-flex.flex-wrap.gap-2 {
        flex-direction: column !important;
    }
}
</style>
