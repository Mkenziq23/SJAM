<div id="divTambahDonasi" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <!-- Header -->
                <div class="card-header bg-gradient-primary text-white d-flex align-items-center">
                    <i class="fas fa-donate fa-lg me-2"></i>
                    <h4 class="mb-0">Form Tambah Donasi</h4>
                </div>
                <!-- Body -->
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label for="txtNamaDonatur" class="form-label fw-semibold">Nama Donatur</label>
                        <input type="text" class="form-control" id="txtNamaDonatur" placeholder="Masukkan nama donatur" />
                    </div>
                    <div class="mb-3">
                        <label for="txtDetail" class="form-label fw-semibold">Detail Donasi</label>
                        <textarea class="form-control" id="txtDetail" style="resize:none;" placeholder="Keterangan donasi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="txtTipe" class="form-label fw-semibold">Tipe Donasi</label>
                        <select class="form-control" id="txtTipe">
                            <option value="" disabled selected class="text-muted">-- Pilih Tipe Donatur --</option>
                            <option value="PERSEORANGAN">Perseorangan</option>
                            <option value="INSTANSI">Instansi / Perusahaan</option>
                            <option value="UMKM">UMKM</option>
                            <option value="EVENT">Event / Acara</option>
                            <option value="LAIN_LAIN">Lain-lain</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtNominal" class="form-label fw-semibold">Nominal</label>
                        <input type="text" class="form-control" id="txtNominal" placeholder="Masukkan nominal donasi" />
                    </div>
                    <div class="mb-4">
                        <label for="txtTanggalDonasi" class="form-label fw-semibold">Tanggal Donasi</label>
                        <input type="date" class="form-control" id="txtTanggalDonasi" />
                    </div>
                    <!-- Buttons -->
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-primary btn-lg flex-grow-1" @click="prosesTambahDonasiAtc()">
                            <i class="fas fa-save me-1"></i> Proses Donasi
                        </button>
                        <button class="btn btn-outline-info btn-lg flex-grow-1" @click="clearForm()">
                            <i class="fas fa-i-cursor me-1"></i> Clear
                        </button>
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
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    font-weight: 600;
}

.form-control {
    border-radius: 8px;
    box-shadow: none;
    transition: all 0.2s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
}

.btn-lg {
    border-radius: 8px;
    font-weight: 600;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-outline-info:hover {
    background-color: #17a2b8;
    color: #fff;
}

@media (max-width: 768px) {
    .btn-lg {
        font-size: 0.9rem;
        padding: 8px 10px;
    }
}

</style>