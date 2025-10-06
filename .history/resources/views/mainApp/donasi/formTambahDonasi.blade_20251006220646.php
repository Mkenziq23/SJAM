<div id="divTambahDonasi" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-secondary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-center">
                    <h4 class="card-title mb-0"><i class="fas fa-donate me-2"></i>Form Tambah Donasi</h4>
                </div>
                <div class="card-body p-4">
                    <div class="form-group mb-4">
                        <label class="fw-semibold">Nama Donatur</label>
                        <input type="text" class="form-control form-control-lg" id="txtNamaDonatur" placeholder="Masukkan nama donatur" />
                    </div>

                    <div class="form-group mb-4">
                        <label class="fw-semibold">Detail Donasi</label>
                        <textarea class="form-control form-control-lg" style="resize: none" id="txtDetail" placeholder="Keterangan donasi"></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label class="fw-semibold">Tipe Donasi</label>
                        <select class="form-control form-control-lg" id="txtTipe">
                            <option value="" disabled selected class="text-muted">-- Pilih Donatur --</option>
                            <option value="PERSEORANGAN">Perseorangan</option>
                            <option value="INSTANSI">Instansi / Perusahaan</option>
                            <option value="UMKM">UMKM</option>
                            <option value="EVENT">Event / Acara</option>
                            <option value="LAIN_LAIN">Lain-lain</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label class="fw-semibold">Nominal Donasi</label>
                        <input type="text" class="form-control form-control-lg" id="txtNominal" placeholder="Masukkan nominal (contoh: 1.000.000)" />
                        <small class="text-muted">Format otomatis: Rp. 1.000.000</small>
                    </div>

                    <div class="form-group mb-5">
                        <label class="fw-semibold">Tanggal Donasi</label>
                        <input type="date" class="form-control form-control-lg" id="txtTanggalDonasi" />
                    </div>

                    <div class="d-flex gap-3">
                        <a href="javascript:void(0)" class="btn btn-primary btn-lg btn-icon flex-grow-1"
                            @click="prosesTambahDonasiAtc()">
                            <i class="fas fa-save me-2"></i> Proses Tambah Donasi
                        </a>
                        <a href="javascript:void(0)" class="btn btn-outline-info btn-lg btn-icon flex-grow-1"
                            @click="clearForm()">
                            <i class="fas fa-i-cursor me-2"></i> Clear
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    font-weight: 600;
    text-align: center;
}

.form-control {
    border-radius: 8px;
    box-shadow: none;
    transition: all 0.2s;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.btn-icon i {
    margin-right: 8px;
}

.btn-primary {
    transition: all 0.2s;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-outline-info {
    transition: all 0.2s;
}

.btn-outline-info:hover {
    background-color: #17a2b8;
    color: #fff;
}

@media (max-width: 768px) {
    .btn-lg {
        font-size: 0.9rem;
        padding: 10px 15px;
    }
}
</style>
