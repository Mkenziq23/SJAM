<!-- ✅ Form Tambah Pengurus -->
<div id="divTambahPengurus" class="container-fluid px-4 py-4" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-secondary btn-icon" @click="kembaliAtc()">
            <i class="fas fa-reply me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-4">
        <!-- Form Kiri -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> Data Dasar Pengurus</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Pengurus <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtNamaPengurus" placeholder="Nama pengurus">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select" id="txtJk">
                            <option value="none" disabled selected>--- Pilih jenis kelamin ---</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="txtTanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtTempatLahir" placeholder="Tempat lahir">
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary btn-lg" @click="prosesTambahPengurusAtc()">
                            <i class="fas fa-save me-1"></i> Proses Tambah Pengurus
                        </button>
                        <button class="btn btn-outline-secondary btn-lg" @click="clearForm">
                            <i class="fas fa-i-cursor me-1"></i> Clear
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Kanan -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-address-card me-2"></i> Kontak & Jabatan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtAlamat" placeholder="Alamat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Hp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtHp" placeholder="Nomor Handphone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="txtEmail" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <select class="form-select" id="txtJabatan">
                            <option value="none" disabled selected>--- Pilih jabatan ---</option>
                            <option value="PEMBINA">Pembina</option>
                            <option value="PENGAJAR">Pengajar</option>
                            <option value="ADMINISTRASI">Administrasi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional CSS tambahan -->
<style>
.card-header {
    border-bottom: none;
    font-weight: 600;
}

.form-label span.text-danger {
    font-weight: bold;
}

.btn-lg i {
    vertical-align: middle;
}
</style>
