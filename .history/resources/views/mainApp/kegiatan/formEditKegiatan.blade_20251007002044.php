<!-- Div Form Edit Data Kegiatan -->
<div id="divEditKegiatan" class="container-fluid px-4 py-4" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <button class="btn btn-outline-secondary btn-lg fw-semibold px-4 py-2" @click="kembaliAtc()">
            <i class="fas fa-arrow-left me-2" style="font-size: 1.2rem;"></i> Kembali
        </button>
    </div>

    <div class="row g-4">
        <!-- Kolom Form Data -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Form Edit Kegiatan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="txtEditNamaKegiatan" placeholder="Masukkan Nama Kegiatan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="txtEditTanggalKegiatan" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="txtEditTempatKegiatan" placeholder="Masukkan Tempat Kegiatan" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Foto dan Submit -->
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-image me-2"></i> Foto Kegiatan</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <label class="form-label d-block mb-2">Preview Foto</label>
                        <img class="img-thumbnail img-fluid d-block mx-auto mb-3" 
                             id="editImagePreview" 
                             style="max-height:250px;" 
                             alt="Preview Foto Kegiatan" 
                             src="" />
                        <input type="file" class="form-control" id="txtEditFotoKegiatan" onchange="previewImage('edit')">
                    </div>
                    <button class="btn btn-primary btn-lg w-100 mt-3" @click="prosesEditKegiatanAtc()">
                        <i class="fas fa-save me-2"></i> Proses Edit Kegiatan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
}

.img-thumbnail {
    border-radius: 12px;
    object-fit: cover;
    transition: transform 0.2s ease;
}

.img-thumbnail:hover {
    transform: scale(1.05);
}

.btn-primary:hover {
    background-color: #0069d9;
    transform: scale(1.02);
}

.btn-outline-secondary {
    border-radius: 10px;
    transition: all 0.2s ease;
}
.btn-outline-secondary:hover {
    background-color: #f1f1f1;
    color: #333;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }
}
</style>
