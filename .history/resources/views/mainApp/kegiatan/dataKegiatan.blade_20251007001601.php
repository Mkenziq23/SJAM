<!-- Div Tabel Data Kegiatan -->
<div id="divDataKegiatan" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-calendar-alt me-2"></i> Data Kegiatan
            </h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahKegiatanAtc()">
                <i class="fas fa-plus-circle me-1"></i> Tambah Kegiatan
            </a>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblKegiatan" class="table table-striped table-hover align-middle text-center shadow-sm">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Tempat Kegiatan</th>
                            <th>Foto Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataKegiatan as $kegiatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold">{{ $kegiatan->nama_kegiatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d-m-Y') }}</td>
                            <td class="fw-bold">{{ $kegiatan->tempat_kegiatan }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="Foto Kegiatan"
                                    class="img-thumbnail shadow-sm" style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm mb-1" @click="editKegiatanAtc('{{ $kegiatan->id }}')">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm" @click="hapusAtc('{{ $kegiatan->id }}')">
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

<!-- Custom CSS -->
<style>
/* Card */
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 25px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

/* Card Header */
.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    font-weight: 600;
}

/* Table */
.table {
    border-collapse: separate;
    border-spacing: 0 8px;
    border-radius: 12px;
    overflow: hidden;
}

.table thead th {
    vertical-align: middle;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.table tbody tr {
    background-color: #ffffff;
    transition: all 0.3s ease;
    border-radius: 8px;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.02);
}

/* Images */
.img-thumbnail {
    border-radius: 8px;
    object-fit: cover;
}

/* Buttons */
.btn-warning {
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-warning:hover {
    background-color: #ffc107;
    color: #000;
}

.btn-danger {
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

/* Responsiveness */
@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }
    .table thead th {
        font-size: 0.8rem;
    }
    .btn {
        font-size: 0.8rem;
        padding: 4px 10px;
    }
}
</style>
