<div id="divDataAbsensi">
    <div class="d-flex flex-wrap mb-3 gap-2">
        <button class="btn btn-lg btn-primary btn-icon" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle me-2"></i> Rekap Absensi Hari Ini
        </button>
        <button class="btn btn-lg btn-info btn-icon" @click="tambahAbsensiAtc()">
            <i class="fas fa-eye me-2"></i> Lihat Seluruh Rekap Absensi
        </button>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table id="tblAbsensi" class="table table-striped table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th style="width:5%;">No</th>
                    <th style="width:15%;">Token</th>
                    <th style="width:25%;">Nama Santri</th>
                    <th style="width:15%;">Kafilah</th>
                    <th style="width:20%;">Waktu Absen</th>
                    <th style="width:10%;">Status</th>
                    <th style="width:10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $absensi)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-truncate" style="max-width: 120px;">{{ substr($absensi->token_absensi, 0, 7) }} ...</td>
                        <td class="text-start">{{ $absensi->santriData->nama }}</td>
                        <td>{{ $absensi->getKafilahData($absensi->id_santri) }}</td>
                        <td>{{ Carbon\Carbon::parse($absensi->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td>
                            @if($absensi->active == '1')
                                <span class="badge bg-success rounded-pill px-2 py-2 fs-6">Hadir</span>
                            @elseif($absensi->active == '2')
                                <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fs-6">Izin</span>
                            @else
                                <span class="badge bg-danger rounded-pill px-3 py-2 fs-6">Alfa</span>
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

<!-- Inisialisasi DataTable -->
