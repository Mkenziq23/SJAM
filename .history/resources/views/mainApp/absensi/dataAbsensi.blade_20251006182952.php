<!-- ✅ Wrapper Div -->
<div id="divDataAbsensi" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header text-white py-3 px-4 rounded-top-4" style="background: linear-gradient(135deg, #007bff, #00bfff);">
            <h5 class="mb-0">
                <i class="fas fa-calendar-check me-2 fa-1x"></i> Rekapitulasi Absensi Santri
            </h5>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblAbsensi" class="table table-striped table-hover align-middle text-center">
                    <thead style="background-color: #cfe2ff;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Token</th>
                            <th scope="col">Nama Santri</th>
                            <th scope="col">Kafilah</th>
                            <th scope="col">Waktu Absen</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAbsensi as $absensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ substr($absensi->token_absensi,0,7) }}...</td>
                                <td>{{ $absensi->santriData->nama }}</td>
                                <td>{{ $absensi->getKafilahData($absensi->id_santri) }}</td>
                                <td>{{ Carbon\Carbon::parse($absensi->created_at)->format('d M Y - H:i') }}</td>
                                <td>
                                    @if($absensi->active == '1')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($absensi->active == '2')
                                        <span class="badge bg-warning text-dark">Izin</span>
                                    @else
                                        <span class="badge bg-danger">Alpha</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" 
                                            @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ✅ CSS -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
}

.table thead th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
}

.badge {
    font-size: 0.75rem;
    border-radius: 12px;
    padding: 0.35em 0.6em;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: #fff;
}
</style>

<!-- ✅ JS untuk DataTables -->
<script>
$(document).ready(function() {
    $('#tblAbsensi').DataTable({
        "lengthMenu": [5, 10, 25, 50],
        "pageLength": 10,
        "ordering": true,
        "autoWidth": false
    });
});
</script>
