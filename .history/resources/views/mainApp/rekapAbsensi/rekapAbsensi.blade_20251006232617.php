<div class="table-responsive">
    <table id="tblAbsensi" class="table table-hover align-middle">
        <thead>
            <tr style="background: linear-gradient(90deg, #007bff, #00bfff); color: #fff;">
                <th class="text-center">No</th>
                <th class="text-center">ID Santri</th>
                <th>Nama Santri</th>
                <th>Kafilah</th>
                <th class="text-center">Kehadiran</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSantri as $santri)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $santri->id_santri }}</td>
                    <td>{{ $santri->nama }}</td>
                    <td>{{ $santri->kafilahData->nama }}</td>
                    <td>{{ $santri->getKehadiranAbsensi($santri->id_santri, $bulan, $tahun) }}</td>
                    <td class="text-center">
                        <a href="{{ url('/app/rekap-absensi/' . $santri->id_santri . '/' . $bulan . '/' . $tahun . '/cetak') }}"
                            class="btn btn-sm btn-primary" target="_blank">
                            <i class="fas fa-print me-1"></i> Cetak
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    #tblAbsensi {
        font-size: 0.9rem;
    }
    #tblAbsensi tbody tr:nth-child(odd) {
        background-color: #f7f9fc;
    }
    #tblAbsensi tbody tr:hover {
        background-color: #d0ebff;
    }
    #tblAbsensi th, #tblAbsensi td {
        vertical-align: middle;
    }
    .badge {
        padding: 0.35em 0.6em;
        font-size: 0.85rem;
    }
    .btn-sm {
        padding: 0.35rem 0.6rem;
        font-size: 0.8rem;
    }
</style>

<script>
    $(document).ready(function() {
        $("#tblAbsensi").DataTable({
            responsive: true,
            pagin
