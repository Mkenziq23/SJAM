<div id="divDataBuktiBayar" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i> Data Bukti Pembayaran</h5>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblBuktiBayar" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">No Induk</th>
                            <th scope="col">Nama Santri</th>
                            <th scope="col">Nama Orang Tua</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataBuktiBayar as $bukti)
                        <tr>
                            <td>{{ $bukti->id_santri }}</td>
                            <td>{{ $bukti->nama_santri }}</td>
                            <td>{{ $bukti->nama_orang_tua }}</td>
                            <td>{{ $bukti->kelas }}</td>
                            <td>{{ $bukti->nomor_handphone }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $bukti->bukti_pembayaran_path) }}" target="_blank"
                                   class="btn btn-sm btn-outline-primary">
                                   <i class="fas fa-eye me-1"></i> Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* ===== Tabel Bukti Pembayaran ===== */
    .card {
        border-radius: 16px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: none;
        background: linear-gradient(135deg, #17a2b8, #00c0ef);
    }

    .table {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .table thead th {
        vertical-align: middle;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .table tbody tr {
        background-color: #ffffff;
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f1faff;
        transform: scale(1.01);
    }

    .table td, .table th {
        vertical-align: middle;
    }

    .btn-outline-primary:hover {
        background-color: #17a2b8;
        color: #fff;
    }

    @media (max-width: 768px) {
        .card-header h5 {
            font-size: 1rem;
        }

        .btn {
            font-size: 0.85rem;
            padding: 6px 10px;
        }
    }
</style>

<script>
    // Inisialisasi DataTable
    $(document).ready(function() {
        $("#tblBuktiBayar").DataTable({
            "ordering": true,
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "responsive": true
        });
    });
</script>
