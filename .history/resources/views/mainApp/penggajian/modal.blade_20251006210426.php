<!-- Modal Pengurus -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalPengurus">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-users"></i> Pilih Pengurus Tahfiz</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert alert-info m-3">
                <strong>Note:</strong> Klik tombol "Pilih" pada pengurus yang diinginkan untuk memilih.
            </div>

            <div class="modal-body p-3">
                <table class="table table-hover table-bordered table-striped" id="tblDataPengurus">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">ID Pengurus</th>
                            <th>Nama Pengurus</th>
                            <th>Jabatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPengurus as $pengurus)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $pengurus->id_pengurus }}</td>
                            <td><b>{{ $pengurus->nama }}</b></td>
                            <td>{{ $pengurus->jabatan }}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm"
                                   @click="pilihPengurusAtc('{{ $pengurus->id_pengurus }}|{{ $pengurus->nama }}')"
                                   data-bs-dismiss="modal">
                                   <i class="fas fa-check-circle"></i> Pilih
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
/* Table hover effect */
#tblDataPengurus tbody tr:hover {
    background-color: #f1f1f1;
    cursor: pointer;
}

/* Modal header icon */
.modal-header .fas {
    margin-right: 8px;
}

/* Scrollable modal body */
.modal-dialog-scrollable .modal-body {
    max-height: 400px;
    overflow-y: auto;
}
</style>
