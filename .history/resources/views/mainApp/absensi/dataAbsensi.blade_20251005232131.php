<!-- Div Tabel Data Absensi -->
<div id="divDataAbsensi" class="p-3">

    <!-- Tombol Aksi -->
    <div class="d-flex mb-3 gap-2 flex-wrap">
        <button class="btn btn-primary btn-lg d-flex align-items-center" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle me-2"></i> Rekap Absensi Hari Ini
        </button>
        <button class="btn btn-info btn-lg d-flex align-items-center text-white" @click="tambahAbsensiAtc()">
            <i class="fas fa-list me-2"></i> Lihat Seluruh Rekap Absensi
        </button>
    </div>

    <!-- Tabel Absensi -->
    <div class="table-responsive shadow-sm rounded">
        <table id="tblAbsensi" class="table table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Token</th>
                    <th scope="col">Nama Santri</th>
                    <th scope="col">Kafilah</th>
                    <th scope="col">Waktu Absen</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $absensi)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <span class="badge bg-secondary">{{ substr($absensi->token_absensi, 0, 7) }} ...</span>
                        </td>
                        <td>{{ $absensi->santriData->nama }}</td>
                        <td>
                            <span class="badge bg-primary">{{ $absensi->getKafilahData($absensi->id_santri) }}</span>
                        </td>
                        <td class="text-center">{{ Carbon\Carbon::parse($absensi->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-sm" @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
