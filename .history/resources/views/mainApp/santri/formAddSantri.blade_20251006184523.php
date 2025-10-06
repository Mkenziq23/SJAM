<!-- ✅ Form Tambah Santri -->
<div id="divTambahSantri" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>

    <div class="row">
        <!-- Form Kiri -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> Form Tambah Santri</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Santri <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtNamaSantri" placeholder="Nama santri">
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control" id="txtJk">
                            <option value="none" disabled selected>--- Pilih jenis kelamin ---</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="txtTanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="txtTempatLahir" placeholder="Tempat lahir">
                    </div>
                    <div class="mb-3">
                        <label>Status Orang Tua <span class="text-danger">*</span></label>
                        <select class="form-control" id="txtStatusOrtu">
                            <option value="LENGKAP">Lengkap</option>
                            <option value="YATIM">Yatim (tidak ada ayah)</option>
                            <option value="PIATU">Piatu (tidak ada ibu)</option>
                            <option value="YATIM PIATU">Yatim Piatu (tidak ada ayah & ibu)</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="javascript:void(0)" class="btn btn-success btn-lg btn-icon icon-left" @click="prosesTambahSantriAtc()">
                            <i class="fas fa-save"></i> Simpan
                        </a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-lg btn-icon icon-left" @click="clearForm()">
                            <i class="fas fa-i-cursor"></i> Clear
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Kanan -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-address-card me-2"></i> Informasi Tambahan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtAlamat" placeholder="Alamat santri">
                    </div>
                    <div class="mb-3">
                        <label>No. HP (Orang Tua)</label>
                        <input type="text" class="form-control" id="txtNoHp" placeholder="Nomor handphone">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" id="txtEmail" placeholder="Email santri/orang tua">
                    </div>
                    <div class="mb-3">
                        <label>Nama Orang Tua</label>
                        <input type="text" class="form-control" id="txtNamaOrangTua" placeholder="Nama orang tua">
                    </div>
                    <div class="mb-3">
                        <label>Kelas <span class="text-danger">*</span></label>
                        <select class="form-control" id="txtKelas">
                            <option value="none" disabled selected>--- Pilih kelas ---</option>
                            <option value="DASAR">Bahasa Arab</option>
                            <option value="TAHFIZ DAN TAHSIN">Tahfidz & Tahsin</option>
                            <option value="MATEMATIKA">Matematika</option>
                            <option value="BAHASA INGGRIS">Bahasa Inggris</option>
                            <option value="KOMPUTER">Komputer</option>
                            <option value="LEADERSHIP DAN INTERPRENEURSHIP">Leadership & Entrepreneurship</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Kafilah <span class="text-danger">*</span></label>
                        <select class="form-control" id="txtKafilah">
                            <option value="none" disabled selected>--- Pilih kafilah ---</option>
                            @foreach ($dataKafilah as $kafilah)
                                <option value="{{ $kafilah->id_kafilah }}">{{ $kafilah->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ CSS Kustom (jika diperlukan) -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
}

.btn-icon i {
    margin-right: 5px;
}

.mb-3 {
    margin-bottom: 1rem !important;
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
