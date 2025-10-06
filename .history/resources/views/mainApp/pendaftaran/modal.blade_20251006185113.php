<!-- ✅ Modal Detail Pendaftaran Santri -->
<div class="modal fade" id="modalDetailPendaftaranSantri" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-user-check me-2"></i>Detail Pendaftaran Santri</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Note -->
            <div class="alert alert-info m-3">
                <i class="fas fa-info-circle me-1"></i> Untuk menutup pemilihan klik di luar area dropdown/kontrol.
            </div>

            <!-- Body -->
            <div class="modal-body">
                <div class="row g-3">
                    <!-- Kode Pendaftaran & Alamat -->
                    <div class="col-md-6">
                        <label class="form-label">Kode Pendaftaran</label>
                        <div><span id="txtKdPendaftaran" class="fw-semibold"></span></div>
                        <input type="hidden" id="txtKodePendaftaranHidden">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Alamat</label>
                        <div><span id="txtAlamat"></span></div>
                    </div>

                    <!-- Nama & Jenis Kelamin -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Santri</label>
                        <div><span id="txtNamaSantri" class="fw-semibold"></span></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <div><span id="txtJenisKelamin"></span></div>
                    </div>

                    <!-- Nama Orang Tua & No HP -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Orang Tua</label>
                        <div><span id="txtNamaOrangtua"></span></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Handphone</label>
                        <div><span id="txtNomorHandphone"></span></div>
                    </div>

                    <!-- Tanggal Lahir & Kelas -->
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <div><span id="txtTanggalLahir"></span></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kelas</label>
                        <div><small id="txtKelas"></small></div>
                    </div>

                    <!-- Kafilah -->
                    <div class="col-md-12">
                        <label class="form-label">Kafilah yang akan diterima</label>
                        <select class="form-select" id="txtKafilah">
                            @foreach ($dataKafilah as $kaf)
                                <option value="{{ $kaf->id_kafilah }}">{{ $kaf->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Harapan belajar -->
                    <div class="col-md-12 text-center">
                        <label class="form-label">Harapan belajar di Tahfiz Qur'an</label>
                        <blockquote id="txtHarapan" class="blockquote text-muted"></blockquote>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-4">
                    <button class="btn btn-success me-2" onclick="submitAction('approve')">
                        <i class="fas fa-check-circle me-1"></i> Setujui Pendaftaran
                    </button>
                    <button class="btn btn-danger" onclick="submitAction('deny')">
                        <i class="fas fa-times-circle me-1"></i> Tolak Pendaftaran
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Kustom CSS -->
<style>
.modal-body .form-label {
    font-weight: 600;
}

.blockquote {
    font-size: 0.95rem;
    background-color: #f8f9fa;
    padding: 10px 15px;
    border-left: 5px solid #007bff;
    border-radius: 5px;
}

.btn-success, .btn-danger {
    min-width: 180px;
}

@media (max-width: 576px) {
    .btn-success, .btn-danger {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>
