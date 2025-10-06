<!-- ✅ Div Tabel Data Pengurus -->
<div id="divDataPengurus">
    <!-- Tombol Tambah -->
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left" @click="tambahPengurusAtc()">
            <i class="fas fa-plus-circle me-1"></i> Tambah Pengurus
        </a>
    </div>

    <!-- Tabel Pengurus -->
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

<!-- ✅ CSS Kustom -->
<style>
/* Tabel */
.table thead th {
    vertical-align: middle;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.table tbody tr {
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}

/* Tombol */
.btn-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

/* Responsiveness */
@media (max-width: 768px) {
    .btn {
        font-size: 0.85rem;
        padding: 6px 10px;
    }
}
</style>
