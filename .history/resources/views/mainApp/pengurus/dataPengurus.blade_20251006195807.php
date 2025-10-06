<!-- ✅ Div Tabel Data Pengurus -->
<div id="divDataPengurus" class="container-fluid px-4 py-3">
    <!-- Tombol Tambah -->
    <div class="mb-3">
        <button class="btn btn-primary btn-lg btn-icon" @click="tambahPengurusAtc()">
            <i class="fas fa-plus-circle me-1"></i> Tambah Pengurus
        </button>
    </div>

    <!-- Tabel Data Pengurus -->
    <div class="table-responsive">
        <table id="tblPengurus" class="table table-hover table-bordered table-striped align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>No. Induk</th>
                    <th>Nama Pengurus</th>
                    <th>JK</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPengurus as $pengurus)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengurus->id_pengurus }}</td>
                        <td class="fw-semibold">{{ $pengurus->nama }}</td>
                        <td>{{ $pengurus->jk == 'L' ? 'Laki Laki' : 'Perempuan' }}</td>
                        <td>{{ $pengurus->alamat }}</td>
                        <td>{{ $pengurus->jabatan }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" @click="hapusAtc('{{ $pengurus->id_pengurus }}')">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- ✅ Kustom CSS -->
<style>
.table thead th {
    vertical-align: middle;
    font-weight: 600;
    text-transform: uppercase;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
    transition: all 0.2s ease;
}

.btn-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

@media (max-width: 768px) {
    .btn-lg {
        font-size: 0.85rem;
        padding: 6px 10px;
    }
}
</style>
