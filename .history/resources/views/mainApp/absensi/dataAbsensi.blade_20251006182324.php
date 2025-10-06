<!-- ✅ Wrapper Div -->
<div id="divDataAbsensi" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-calendar-check me-2 fa-1x"></i> Rekapitulasi Absensi Santri
            </h5>
            <div>
                <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold me-2" @click="tambahAbsensiAtc()">
                    <i class="fas fa-plus-circle me-1"></i> Rekap Hari Ini
                </a>
                <a href="javascript:void(0)" class="btn btn-outline-light btn-sm fw-semibold" @click="tambahAbsensiAtc()">
                    <i class="fas fa-list me-1"></i> Lihat Seluruh Rekap
                </a>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblAbsensi" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Token</th>
                            <th scope="col">Nama Santri</th>
                            <th scope="col">Kafilah</th>
                            <th scope="col">Waktu Absen</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAbsensi as $absensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge bg-secondary">{{ substr($absensi->token_absensi, 0, 7) }}...</span></td>
                                <td>{{ $absensi->santriData->nama }}</td>
                                <td>{{ $absensi->getKafilahData($absensi->id_santri) }}</td>
                                <td>{{ Carbon\Carbon::parse($absensi->created_at)->format('d M Y - H:i') }}</td>
                                <td class="text-center">
                                    @if($absensi->active == '1')
                                        <span class="badge bg-success fs-6 px-3 py-2 rounded-pill">
                                            <i class="fas fa-check-circle me-1"></i> Hadir
                                        </span>
                                    @elseif($absensi->active == '2')
                                        <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill">
                                            <i class="fas fa-user-clock me-1"></i> Izin
                                        </span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill">
                                            <i class="fas fa-times-circle me-1"></i> Alpha
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger btn-sm" 
                                            @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
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

<!-- ✅ CSS Kustom -->
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

.btn-outline-light:hover {
    background-color: #ffffff;
    color: #007bff;
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
