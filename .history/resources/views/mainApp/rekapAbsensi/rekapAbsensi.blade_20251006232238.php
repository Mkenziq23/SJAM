<h4 class="card-title mb-4 text-center">Rekap Absensi {{ $namaBulan }} - {{ $tahun }}</h4>

<div class="card shadow-sm mb-4">
    <div class="card-body p-3">
        <div class="table-responsive">
            <table id="tblAbsensi" class="table table-hover table-bordered align-middle">
                <thead class="table-primary text-center">
                    <tr>
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
                            <td class="text-center">{{ $santri->getKehadiranAbsensi($santri->id_santri, $bulan, $tahun) }}</td>
                            <td class="text-center">
                                <a href="{{ url('/app/rekap-absensi/' . $santri->id_santri . '/' . $bulan . '/' . $tahun . '/cetak') }}"
                                   class="btn btn-sm btn-success" target="_blank">
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

<style>
    Hover effect pada baris
    #tblAbsensi tbody tr:hover {
        background-color: #dfe6e9cc;
    }

    /* Table header */
    #tblAbsensi thead th {
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Table body font */
    #tblAbsensi tbody td {
        font-size: 0.88rem;
    }

    /* Tombol cetak */
    #tblAbsensi .btn-success {
        background-color: #28a745;
        border: none;
        transition: all 0.2s ease;
    }

    #tblAbsensi .btn-success:hover {
        background-color: #218838;
    }

    /* Responsive scroll */
    .table-responsive {
        overflow-x: auto;
    }
</style>

<script>
    $(document).ready(function() {
        $("#tblAbsensi").DataTable({
            responsive: true,
            paging: true,
            pageLength: 10,
            lengthChange: false,
            searching: true,
            ordering: true,
            order: [[0, "asc"]],
            columnDefs: [
                { orderable: false, targets: 5 } // Kolom aksi tidak bisa diurutkan
            ]
        });
    });
</script>
