<!-- ✅ Pembungkus Card -->
<div id="divDataSpp" class="container-fluid px-5 py-5">
    <div class="card shadow-xl border-0 rounded-4 p-3 big-card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-4 px-5 rounded-top-4">
            <h4 class="mb-0 fw-bold"><i class="fas fa-money-bill-wave me-2"></i> Data Pembayaran SPP</h4>
            <a href="javascript:void(0)" class="btn btn-light btn-md fw-semibold shadow-sm" @click="tambahPembayaranSppAtc()">
                <i class="fas fa-plus-circle me-2"></i> Tambah Pembayaran
            </a>
        </div>

        <div class="card-body p-5">
            <div class="table-responsive">
                <table id="tblSpp" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Token</th>
                            <th scope="col">Nama Santri</th>
                            <th scope="col">Bulan / Tahun</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Waktu Pembayaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSpp as $spp)
                        @php
                            $monthNum = $spp->bulan;
                            $mn = date("F", mktime(0, 0, 0, $monthNum, 10));
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-secondary">{{ substr($spp->token_pembayaran, 0, 10) }}</span></td>
                            <td>{{ $spp->santriData->nama }}</td>
                            <td>{{ $mn }} / {{ $spp->tahun }}</td>
                            <td><strong>Rp {{ number_format($spp->total, 0, ',', '.') }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($spp->created_at)->format('d M Y - H:i') }}</td>
                            <td>
                                <a href="{{ url('app/pembayaran-spp/'.$spp->token_pembayaran.'/cetak') }}" target="_blank" 
                                   class="btn btn-sm btn-outline-primary">
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

<style>
/* ====== CARD STYLING UPGRADE ====== */
.big-card {
    max-width: 95%;                /* buat lebih besar dari container default */
    margin: 0 auto;                /* biar center */
    border-radius: 20px;
    background-color: #fff;
    box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.big-card:hover {
    transform: scale(1.01);
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
}

.card-header h4 {
    font-size: 1.5rem;
    letter-spacing: 0.5px;
}

.table {
    border-collapse: separate;
    border-spacing: 0 10px;
}

.table thead th {
    vertical-align: middle;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.95rem;
    background-color: #e3f2fd !important;
}

.table tbody tr {
    background-color: #ffffff;
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}

.table td, .table th {
    vertical-align: middle;
    padding: 1rem;
}

/* Tombol */
.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}

/* Badge */
.badge {
    font-size: 0.9rem;
    padding: 7px 12px;
    border-radius: 12px;
}

/* Responsive */
@media (max-width: 768px) {
    .big-card {
        padding: 1rem;
    }
    .card-header h4 {
        font-size: 1.1rem;
    }
    .btn {
        font-size: 0.9rem;
        padding: 8px 10px;
    }
}
</style>
