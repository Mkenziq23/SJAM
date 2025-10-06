<div id="divDataLapkeu" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-file-invoice-dollar me-2"></i> Laporan Keuangan Tahun {{ $tahun }}
            </h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="pilihTahunAtc()">
                <i class="fas fa-calendar-alt me-1"></i> Pilih Tahun
            </a>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblLapkeu" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Total Masuk</th>
                            <th>Total Keluar</th>
                            <th>Selisih</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataLaporan as $lap)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-info">{{ $lap['namaBulan'] }}</span></td>
                            <td><strong>Rp. {{ number_format($lap['flowMasuk']) }}</strong></td>
                            <td><strong>Rp. {{ number_format($lap['flowKeluar']) }}</strong></td>
                            <td><strong>Rp. {{ number_format($lap['selisih']) }}</strong></td>
                            <td>
                                <a href="{{ url('app/laporan-keuangan/'.$lap['bulan'].'/'.$tahun.'/cetak') }}" 
                                   class="btn btn-outline-primary btn-sm" target="_blank">
                                   <i class="fas fa-print me-1"></i> Cetak
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}
.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
}
.table {
    border-collapse: separate;
    border-spacing: 0 8px;
}
.table thead th {
    vertical-align: middle;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}
.table tbody tr {
    background-color: #ffffff;
    transition: all 0.2s ease;
    border-radius: 8px;
}
.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}
.badge {
    font-size: 0.85rem;
    border-radius: 12px;
    padding: 0.35em 0.65em;
}
.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}
@media (max-width: 768px) {
    .card-header h5 { font-size: 1rem; }
    .table thead th { font-size: 0.8rem; }
}
</style>
