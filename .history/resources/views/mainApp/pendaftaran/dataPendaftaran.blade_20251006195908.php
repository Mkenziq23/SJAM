<!-- ✅ Div Tabel Data Pendaftaran Santri -->
<div id="divDataPendaftaran" class="container-fluid px-4 py-3">
    <!-- Note -->
    <div class="alert alert-info mb-3">
        <i class="fas fa-info-circle me-1"></i>
        Untuk menerima pendaftaran santri, klik "Detail" pada santri, kemudian pilih "Approve Pendaftaran".
    </div>

    <!-- Table -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table id="tblPendaftaran" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Pendaftar</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPendaftaran as $df)
                            @php
                                $status = $df->status;
                                $badgeClass = '';
                                if ($status == 'DITERIMA') {
                                    $badgeClass = 'bg-success text-white';
                                } elseif ($status == 'TIDAK DITERIMA') {
                                    $badgeClass = 'bg-danger text-white';
                                } else {
                                    $badgeClass = '';
                                }
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $df->nama_santri }}</td>
                                <td>{{ $df->ConvertJk($df->jk) }}</td>
                                <td>{{ $df->alamat }}</td>
                                <td>{{ $df->kelas }}</td>
                                <td>
                                    <span class="badge {{ $badgeClass }} px-3 py-2 rounded-pill">
                                        {{ $df->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary"
                                        onclick="editAtc('{{ $df->id_pendaftaran }}')">
                                        <i class="fas fa-exclamation-circle me-1"></i> Detail
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

<!-- ✅ Kustom CSS -->
<style>
.card {
    border-radius: 16px;
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

@media (max-width: 768px) {
    .btn-sm {
        font-size: 0.85rem;
        padding: 6px 10px;
    }
}
</style>

<script src="{{ asset('ladun/') }}/base/js/pendaftaran.js"></script>
