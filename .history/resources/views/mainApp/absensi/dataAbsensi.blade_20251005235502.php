<div id="divDataAbsensi">
    <div class="mb-3 d-flex flex-wrap gap-2">
        <button class="btn btn-lg btn-primary btn-icon" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle me-2"></i> Rekap Absensi Hari Ini
        </button>
        <button class="btn btn-lg btn-info btn-icon" @click="tambahAbsensiAtc()">
            <i class="fas fa-list me-2"></i> Lihat Seluruh Rekap Absensi
        </button>
    </div>

    <div class="table-responsive mt-3">
        <table id="tblAbsensi" class="table table-hover table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
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
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($absensi->token_absensi, 0, 7) }} ...</td>
                        <td class="text-start">{{ $absensi->santriData->nama }}</td>
                        <td>{{ $absensi->getKafilahData($absensi->id_santri) }}</td>
                        <td>{{ Carbon\Carbon::parse($absensi->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td>
                            @if($absensi->active == '1')
                                <span class="badge bg-success badge-status">Hadir</span>
                            @elseif($absensi->active == '2')
                                <span class="badge bg-warning text-dark badge-status">Izin</span>
                            @else
                                <span class="badge bg-danger badge-status">Alfa</span>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger" @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Badge custom besar & rapi */
    .badge-status {
        font-size: 1.1rem;
        padding: 0.65rem 1.3rem;
        border-radius: 0.35rem; /* Bisa ubah sesuai selera */
        min-width: 90px;
        display: inline-block;
    }

    /* Hover row efek */
    #tblAbsensi tbody tr:hover {
        background-color: rgba(29, 132, 243, 0.05);
        transition: 0.3s;
    }

    /* Responsive button wrapper */
    .btn-icon i {
        vertical-align: middle;
    }
</style>
