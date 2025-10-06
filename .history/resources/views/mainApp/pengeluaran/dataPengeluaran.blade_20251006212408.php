<!-- ✅ Wrapper Div Data Pengeluaran -->
<div id="divDataPengeluaran" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-wallet me-2 fa-1x"></i> Data Pengeluaran
            </h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahPengeluaranAtc()">
                <i class="fas fa-plus-circle me-1"></i> Tambah Pengeluaran
            </a>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblPengeluaran" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Token</th>
                            <th scope="col">Nama Pengeluaran</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Tanggal Pengeluaran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPengeluaran as $expend)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-secondary">{{ substr($expend->token, 0, 7) }}...</span></td>
                            <td>{{ $expend->nama_pengeluaran }}</td>
                            <td>{{ $expend->detail }}</td>
                            <td><strong>Rp. {{ number_format($expend->total) }}</strong></td>
                            <td>{{ $expend->tanggalPengeluaran($expend->tanggal_pengeluaran) }}</td>
                            <td>
                                {{-- Tombol Hapus --}}
                                <button class="btn btn-outline-danger btn-sm"
                                    @click="hapusAtc('{{ $expend->token }}')">
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

<!-- ======= CSS Kustom ======= -->
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
    table thead th, table tbody td {
        font-size: 0.85rem;
    }
}
</style>
