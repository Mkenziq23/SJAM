<!-- ✅ Modal Edit Santri -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditSantri">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-user-edit me-2"></i> Edit Data Santri</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Note -->
                <div class="alert alert-info mb-4">
                    <strong>Note:</strong> Untuk menutup pemilihan, klik di luar pilihan.
                </div>

                <!-- Form Edit Santri -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">ID Santri</label>
                        <input type="text" class="form-control" id="txtIdSantriEdit" readonly placeholder="ID Santri">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" id="txtAlamatEdit" rows="3" style="resize: none;" placeholder="Alamat Santri"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nama Santri</label>
                        <input type="text" class="form-control" id="txtNamaSantriEdit" placeholder="Nama Santri">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="txtJkEdit">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="txtTglLahirEdit">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kelas</label>
                        <small class="text-muted d-block mb-1">(Leave blank if quota not set)</small>
                        <select class="form-control" id="txtKelasEdit">
                            <option value="DASAR">Dasar</option>
                            <option value="TAHFIZ">Tahfiz</option>
                            <option value="TAHSIN">Tahsin</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kafilah</label>
                        <select class="form-control" id="txtKafilahEdit">
                            @foreach ($dataKafilah as $kaf)
                                <option value="{{ $kaf->id_kafilah }}">{{ $kaf->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Button Update -->
                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-success btn-lg" @click="prosesUpdateDataSantri()">
                        <i class="fas fa-save me-1"></i> Update Data Santri
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Kustom CSS -->
<style>
.modal-content {
    border-radius: 16px;
    overflow: hidden;
}

.form-label {
    font-weight: 500;
}

.alert-info {
    font-size: 0.9rem;
}

@media (max-width: 768px) {
    .btn-lg {
        font-size: 0.9rem;
        padding: 8px 12px;
    }
}
</style>
