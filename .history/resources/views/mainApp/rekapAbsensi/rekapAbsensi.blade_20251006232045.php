<div class="card shadow-sm rounded-4 mb-4">
    <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Rekap Absensi {{ $namaBulan }} - {{ $tahun }}</h4>
        <button class="btn btn-light btn-sm" onclick="window.print()">
            <i class="fas fa-print me-1"></i> Cetak Semua
        </button>
    </div>
    <div class="card-body p-3">
        <div class="table-responsive">
            <table id="tblAbsensi" class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>ID Santri</th>
                        <th>Nama Santri</th>
                        <th>Kafilah</th>
                        <th>Kehadiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSantri as $santri)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $santri->id_santri }}</td>
                            <td>{{ $santri->nama }}</td>
                            <td>{{ $santri->kafilahData->nama }}</td>
                            <td class="text-center">
                                @php
                                    $kehadiran = $santri->getKehadiranAbsensi($santri->id_santri, $bulan, $tahun);
                                @endphp
                                @if($kehadiran > 0)
                                    <span class="badge bg-success">Hadir</span>
                                @else
                                    <span class="badge bg-danger">Tidak Hadir</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ url('/app/rekap-absensi/' . $santri->id_santri . '/' . $bulan . '/' . $tahun . '/cetak') }}"
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-print me-1"></i> Cetak
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#tblAbsensi").DataTable({
            responsive: true,
            paging: true,
            pageLength: 10,
            searching: true,
            ordering: true,
            order: [[0, "asc"]],
            columnDefs: [
                { orderable: false, targets: 5 } // kolom aksi tidak bisa di-sort
            ]
        });
    });
</script>
