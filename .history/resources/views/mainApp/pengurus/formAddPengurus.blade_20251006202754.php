<!-- ✅ Div Form Tambah Pengurus -->
<div id="divTambahPengurus" class="container-fluid px-4 py-4" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-4">
        <!-- Column Kiri -->
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> Form Tambah Pengurus</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label">Nama Pengurus <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtNamaPengurus" placeholder="Nama pengurus">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-select" id="txtJk">
                            <option value="none" disabled selected>--- Pilih jenis kelamin ---</option>
                            <option value="L">Laki Laki</option>
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

                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success btn-lg flex-fill" @click="prosesTambahPengurusAtc()">
                            <i class="fas fa-save me-1"></i> Simpan Pengurus
                        </button>
                        <button class="btn btn-secondary btn-lg flex-fill" @click="clearForm">
                            <i class="fas fa-i-cursor me-1"></i> Clear Form
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column Kanan -->
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white"></div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtAlamat" placeholder="Alamat lengkap">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Hp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="txtHp" placeholder="Nomor Handphone">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="txtEmail" placeholder="Email aktif">
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

<!-- ✅ CSS Tambahan -->
<style>
.card-header {
    font-weight: 600;
    font-size: 1rem;
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
}

.card-body input, 
.card-body select, 
.card-body textarea {
    border-radius: 8px;
}

.btn-success, .btn-secondary {
    border-radius: 8px;
    font-weight: 500;
    transition: 0.2s;
}

.btn-success:hover {
    background-color: #28a745cc;
}

.btn-secondary:hover {
    background-color: #6c757dcc;
}

@media (max-width: 768px) {
    .d-flex.gap-2 {
        flex-direction: column;
    }
}
</style>
