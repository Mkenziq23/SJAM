<!-- Div Tabel Data Pengeluaran -->
<div id="divDataPenggajian" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-money-bill-wave me-2 fa-1x"></i> Data Pengeluaran
            </h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahPengeluaranAtc()">
                <i class="fas fa-plus-circle me-1"></i> Tambah Pengeluaran
            </a>
        </div>

        <!-- Body -->
        <div class="card-body p-0">
            <div class="table-responsive p-3">
                <table id="tblPengeluaran" class="table table-hover table-bordered table-striped align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Token</th>
                            <th>Nama Pengeluaran</th>
                            <th>Detail</th>
                            <th>Nominal</th>
                            <th>Tanggal Pengeluaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPengeluaran as $expend)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ substr($expend->token, 0, 7) }} ...</td>
                                <td>{{ $expend->nama_pengeluaran }}</td>
                                <td>{{ $expend->detail }}</td>
                                <td><b>Rp. {{ number_format($expend->total) }}</b></td>
                                <td>{{ $expend->tanggalPengeluaran($expend->tanggal_pengeluaran) }}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm" 
                                       @click="hapusAtc('{{ $expend->token }}')">
                                       Hapus
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
    color: #fff;
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
    background-color: #f8f9fa !important;
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

/* Buttons */
.btn-warning {
    font-size: 0.85rem;
    padding: 5px 12px;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.btn-warning:hover {
    background-color: #e0a800;
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
