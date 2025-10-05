<div id="divDataAbsensi">
    <div class="mb-3 d-flex flex-wrap gap-2">
        <button class="btn btn-lg btn-primary btn-icon" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle"></i> Rekap Absensi Hari Ini
        </button>
        <button class="btn btn-lg btn-info btn-icon" @click="tambahAbsensiAtc()">
            <i class="fas fa-list"></i> Lihat Seluruh Rekap Absensi
        </button>
    </div>

    <div class="table-responsive mt-3">
        <table id="tblAbsensi" class="table table-hover table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Nama Santri</th>
                    <th>Kafilah</th>
                    <th>Waktu Absen</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $absensi)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ substr($absensi->token_absensi, 0, 7) }} ...</td>
                        <td>{{ $absensi->santriData->nama }}</td>
                        <td>{{ $absensi->getKafilahData($absensi->id_santri) }}</td>
                        <td>{{ Carbon\Carbon::parse($absensi->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td class="text-center">
                            @if($absensi->active == '1')
                                <span class="badge bg-success status-badge">Hadir</span>
                            @elseif($absensi->active == '2')
                                <span class="badge bg-warning text-dark status-badge">Izin</span>
                            @else
                                <span class="badge bg-danger status-badge">Alfa</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger" 
                                    @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
/* Badge lebih besar, persegi dengan sudut halus */
.status-badge {
    font-size: 1.1rem;
    padding: 0.5rem 1.3rem;
    border-radius: 0.35rem;
}

/* Hover efek lebih halus */
#tblAbsensi tbody tr:hover {
    background-color: #f2f2f2;
}

/* Tombol aksi lebih konsisten */
.btn-icon i {
    margin-right: 6px;
}

/* Responsive table */
.table-responsive {
    overflow-x: auto;
}
</style>
