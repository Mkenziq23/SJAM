<div id="divDataDonasiBarang" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-box me-2 fa-1x"></i> Data Donasi Barang
            </h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahDonasiBarangAtc()">
                <i class="fas fa-plus-circle me-1"></i> Tambah Donasi Barang
            </a>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblDonasiBarang" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Token</th>
                            <th>Nama Donatur</th>
                            <th>Nama Barang</th>
                            <th>Tipe</th>
                            <th>Jumlah Barang</th>
                            <th>Tanggal Donasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataDonasiBarang as $donasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-secondary">{{ substr($donasi->token, 0, 7) }}...</span></td>
                            <td><b>{{ $donasi->nama_donatur }}</b></td>
                            <td>{{ $donasi->nama_barang }}</td>
                            <td>{{ $donasi->tipe }}</td>
                            <td>{{ number_format($donasi->jumlah) }}</td>
                            <td>{{ \Carbon\Carbon::parse($donasi->tanggal_donasi)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ url('app/donasi-barang/' . $donasi->token . '/cetak') }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm me-1">
                                    <i class="fas fa-print me-1"></i> Cetak
                                </a>
                                <button class="btn btn-outline-danger btn-sm"
                                    @click="hapusAtc('{{ $donasi->token }}')">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                </button>
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
    /* Card Style */
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

/* Badge Styling */
.badge {
    font-size: 0.85rem;
    border-radius: 12px;
}

/* Buttons */
.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

/* Responsiveness */
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