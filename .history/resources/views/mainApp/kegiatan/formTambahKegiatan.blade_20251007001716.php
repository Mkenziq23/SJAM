<!-- Div Form Tambah Data Kegiatan -->
<div id="divTambahKegiatan" class="container-fluid px-4 py-4" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="kembaliAtc()">
            <i class="fas fa-reply me-1"></i> Kembali
        </a>
    </div>

    <div class="row">
        <!-- Kolom Form Data -->
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Form Tambah Kegiatan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="txtNamaKegiatan" placeholder="Masukkan nama kegiatan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="txtTanggalKegiatan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="txtTempatKegiatan" placeholder="Masukkan lokasi kegiatan" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Foto dan Submit -->
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-image me-2"></i> Foto Kegiatan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Preview Foto</label>
                        <img class="img-thumbnail img-fluid d-block mb-3" id="addImagePreview" style="max-height:200px;" alt="Preview Foto">
                        <input type="file" class="form-control" id="txtFotoKegiatan" onchange="previewImage('add')">
                    </div>
                    <div>
                        <button class="btn btn-primary btn-lg w-100 fw-semibold" @click="prosesTambahKegiatanAtc()">
                            <i class="fas fa-save me-1"></i> Proses Tambah Kegiatan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
/* Card */
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

/* Card Header */
.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    font-weight: 600;
}

/* Image Preview */
.img-thumbnail {
    border-radius: 8px;
    object-fit: cover;
    transition: transform 0.2s ease;
}
.img-thumbnail:hover {
    transform: scale(1.05);
}

/* Button Hover */
.btn-primary {
    transition: all 0.2s ease;
}
.btn-primary:hover {
    background-color: #0069d9;
    color: #fff;
}

/* Responsive */
@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }
    .btn {
        font-size: 0.9rem;
    }
}
</style>
