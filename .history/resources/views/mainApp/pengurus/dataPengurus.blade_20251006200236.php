<div id="divDataPengurus" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0"><i class="fas fa-money-bill-wave me-2"></i> Data Pembayaran SPP</h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahPengurusAtc()">
                <i class="fas fa-plus-circle me-2"></i> Tambah Pengurus
            </a>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblSpp" class="table table-striped table-hover align-middle text-center">
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
                        <td><b>{{ $pengurus->nama }}</b></td>
                        @if ($pengurus->jk == 'L')
                            <td>Laki Laki</td>
                        @else
                            <td>Perempuan</td>
                        @endif
                        <td>{{ $pengurus->alamat }}</td>
                        <td>{{ $pengurus->jabatan }}</td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-sm btn-warning"
                                @click="hapusAtc('{{ $pengurus->id_pengurus }}')">
                                <i class="fas fa-trash-alt"></i> Hapus
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
