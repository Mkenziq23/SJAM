<div id="divDataAbsensi">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left me-2" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle"></i> Rekap Absensi Hari Ini
        </a>
        <a href="javascript:void(0)" class="btn btn-lg btn-info btn-icon icon-left" @click="tambahAbsensiAtc()">
            <i class="fas fa-list"></i> Lihat Seluruh Rekap Absensi
        </a>
    </div>

    <div class="table-responsive">
        <table id="tblAbsensi" class="table table-hover table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Nama Santri</th>
                    <th>Kafilah</th>
                    <th>Waktu Absen</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $absensi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
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
                            <button class="btn btn-danger btn-sm" @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- CSS tambahan -->
<style>
    .status-badge {
        font-size: 1.1rem;
        padding: 0.5rem 1rem;
        border-radius: 0.4rem; /* kotak tumpul */
        display: inline-block;
        min-width: 70px;
        text-align: center;
    }

    #tblAbsensi th, #tblAbsensi td {
        vertical-align: middle;
    }

    #tblAbsensi tbody tr:hover {
        background-color: #f1f3f5;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
