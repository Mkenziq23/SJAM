<!-- div tabel data absensi -->
<div id="divDataAbsensi" class="container-fluid mt-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <h4 class="mb-2">Rekap Absensi Santri</h4>
        <div class="btn-group mb-2" role="group" aria-label="Actions">
            <button type="button" class="btn btn-primary btn-lg" @click="tambahAbsensiAtc()">
                <i class="fas fa-plus-circle me-2"></i> Rekap Absensi Hari Ini
            </button>
            <button type="button" class="btn btn-info btn-lg" @click="tambahAbsensiAtc()">
                <i class="fas fa-eye me-2"></i> Lihat Seluruh Rekap
            </button>
        </div>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table id="tblAbsensi" class="table table-hover table-bordered align-middle mb-0">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Token</th>
                    <th>Nama Santri</th>
                    <th>Kafilah</th>
                    <th>Waktu Absen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataAbsensi as $absensi)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">
                            <span class="badge bg-secondary" data-bs-toggle="tooltip" title="{{ $absensi->token_absensi }}">
                                {{ substr($absensi->token_absensi, 0, 7) }}...
                            </span>
                        </td>
                        <td>{{ $absensi->santriData->nama }}</td>
                        <td>
                            <span class="badge bg-success">{{ $absensi->getKafilahData($absensi->id_santri) }}</span>
                        </td>
                        <td class="text-center">{{ Carbon\Carbon::parse($absensi->created_at)->format('d-m-Y H:i:s') }}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm" 
                                @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')" 
                                data-bs-toggle="tooltip" title="Hapus Absensi">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Inisialisasi tooltip Bootstrap
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
