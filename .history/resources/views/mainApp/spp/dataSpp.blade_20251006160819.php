<!-- ✅ Pembungkus Card -->
<div id="divDataSpp" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i> Data Pembayaran SPP</h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahPembayaranSppAtc()">
                <i class="fas fa-plus-circle me-2"></i> Tambah Pembayaran
            </a>
        </div>

        <div class="card-body p-4">
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
    /* ======Pembayaran Spp====
/* Card Styling */
.card {
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
}

/* Table Enhancements */
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
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}

.table td, .table th {
    vertical-align: middle;
}

/* Button Hover */
.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}

/* Badge Styling */
.badge {
    font-size: 0.85rem;
    padding: 6px 10px;
    border-radius: 12px;
}

/* Responsive Fix */
@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }

    .btn {
        font-size: 0.85rem;
        padding: 6px 10px;
    }
}

</style>
