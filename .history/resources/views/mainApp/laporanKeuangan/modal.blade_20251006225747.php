<!-- Modal Pilih Tahun -->
<div class="modal fade" tabindex="-1" id="modalTahun" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-calendar-alt me-2"></i> Pilih Tahun</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="alert alert-info py-2 mb-3">
                    Note: Klik di luar pilihan untuk menutup modal jika ingin membatalkan.
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle text-center" id="tblDataPengurus">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahunList as $tahun)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><span class="badge bg-info">{{ $tahun }}</span></td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        data-bs-dismiss="modal"
                                        @click="pilihTahunModalAtc('{{ $tahun }}')">
                                        Pilih
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
</div>

<!-- Custom CSS -->
<style>
.modal-content {
    border-radius: 16px;
    overflow: hidden;
}
.modal-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
}
.table tbody tr {
    transition: all 0.2s ease;
}
.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}
.badge {
    font-size: 0.85rem;
    border-radius: 12px;
    padding: 0.35em 0.65em;
}
.alert {
    font-size: 0.85rem;
    margin-bottom: 1rem;
}
@media (max-width: 768px) {
    .modal-header h5 {
        font-size: 1rem;
    }
    .table thead th, .table tbody td {
        font-size: 0.8rem;
    }
}
</style>
