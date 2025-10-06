<!-- Div Tabel Data Video Kegiatan -->
<div id="divDataVideoKegiatan" class="container-fluid px-4 py-4">
    <!-- Tombol Tambah -->
    <div class="mb-3">
        <button class="btn btn-primary btn-lg btn-icon icon-left" @click="tambahVideoKegiatanAtc()">
            <i class="fas fa-plus-circle me-1"></i> Tambah Data Video Kegiatan
        </button>
    </div>

    <!-- Tabel -->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="tblVideoKegiatan" class="table table-striped table-hover align-middle text-center">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Tempat Kegiatan</th>
                                    <th>Thumbnail Video</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataVideoKegiatan as $vKegiatan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><b>{{ $vKegiatan->nama_kegiatan }}</b></td>
                                    <td>{{ \Carbon\Carbon::parse($vKegiatan->tanggal_kegiatan)->format('d-m-Y') }}</td>
                                    <td><b>{{ $vKegiatan->tempat_kegiatan }}</b></td>
                                    <td>
                                        <img src="{{ asset('storage/' . $vKegiatan->image) }}" 
                                             alt="Thumbnail Kegiatan"
                                             class="img-thumbnail"
                                             style="max-width:120px; max-height:80px;">
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-sm mb-1" @click="editVideoKegiatanAtc('{{ $vKegiatan->id }}')">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" @click="hapusAtc('{{ $vKegiatan->id }}')">
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
    font-weight: 600;
}

.table thead th {
    text-transform: uppercase;
    font-weight: 600;
}

.table tbody tr {
    background-color: #fff;
    transition: all 0.2s ease;
}
.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}

.img-thumbnail {
    border-radius: 8px;
    object-fit: cover;
    transition: transform 0.2s ease;
}
.img-thumbnail:hover {
    transform: scale(1.05);
}

.btn-outline-warning:hover {
    background-color: #ffc107;
    color: #000;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

@media (max-width: 768px) {
    .table thead th {
        font-size: 0.8rem;
    }
    .btn {
        font-size: 0.85rem;
    }
}
</style>
