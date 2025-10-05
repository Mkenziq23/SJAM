<div id="divDataAbsensi">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary me-2" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle"></i> Rekap Absensi Hari Ini
        </a>
        <a href="javascript:void(0)" class="btn btn-lg btn-info" @click="tambahAbsensiAtc()">
            <i class="fas fa-list"></i> Lihat Seluruh Rekap Absensi
        </a>
    </div>

    <div class="table-responsive">
        <table id="tblAbsensi" class="table table-hover table-bordered table-striped align-middle">
            <thead class="table-primary">
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
                                <span class="badge bg-success rounded-start fs-6 px-2 py-2">Hadir</span>
                            @elseif($absensi->active == '2')
                                <span class="badge bg-warning text-dark rounded-start fs-6 px-2 py-2">Izin</span>
                            @else
                                <span class="badge bg-danger rounded-start fs-6 px-2 py-2">Alfa</span>
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
