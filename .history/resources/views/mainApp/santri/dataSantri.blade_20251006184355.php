<!-- ✅ Wrapper Card -->
<div id="divDataSantri" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-user-graduate me-2"></i> Data Santri
            </h5>
            <div>
                <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahSantriAtc()">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Santri
                </a>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblSantri" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>No. Induk</th>
                            <th>Nama Santri</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>Kafilah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSantri as $santri)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $santri->id_santri }}</td>
                            <td><b>{{ $santri->nama }}</b></td>
                            <td>{{ $santri->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $santri->alamat }}</td>
                            <td>{{ $santri->getDataKafilah($santri->id_kafilah)->nama }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-sm btn-primary" @click="editAtc('{{ $santri->id_santri }}')">
                                    <i class="fas fa-exclamation-circle me-1"></i> Detail
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger" @click="hapusAtc('{{ $santri->id_santri }}')">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus
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

<!-- ✅ CSS Kustom -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
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
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}

.badge {
    font-size: 0.85rem;
    border-radius: 12px;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

.btn-outline-light:hover {
    background-color: #ffffff;
    color: #007bff;
}

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
