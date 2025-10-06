<!-- Form to Add New Video Activity -->
<div id="divTambahVideoKegiatan" class="container-fluid px-4 py-4" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <button class="btn btn-outline-secondary btn-sm fw-semibold" @click="kembaliAtc()">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </button>
    </div>

    <div class="row g-4">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-video me-2"></i> Form Tambah Video Kegiatan</h5>
                </div>
                <div class="card-body">
                    <!-- Nama Kegiatan -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="txtNamaKegiatan" placeholder="Masukkan nama kegiatan" />
                    </div>

                    <!-- Tanggal Kegiatan -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="txtTanggalKegiatan" />
                    </div>

                    <!-- Tempat Kegiatan -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="txtTempatKegiatan" placeholder="Masukkan lokasi kegiatan" />
                    </div>

                    <!-- Thumbnail -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thumbnail</label>
                        <img class="img-thumbnail img-fluid d-block mb-3" id="videoThumbnailPreview" style="max-height:200px;" alt="Preview Thumbnail" />
                        <input type="file" class="form-control" id="txtThumbnailVideoKegiatan" onchange="previewImage('thumbnail')" />
                    </div>

                    <!-- Link Video YouTube -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Link Video YouTube</label>
                        <input type="text" class="form-control" id="txtLinkVideo"
                            placeholder="https://www.youtube.com/watch?v=your_video_id"
                            oninput="updateVideoPreview()" />
                    </div>

                    <!-- Video Preview -->
                    <div class="mb-3 text-center" id="videoPreview" style="display: none;">
                        <iframe id="youtubeIframe" width="100%" height="315" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button class="btn btn-primary btn-lg w-100 fw-semibold mt-3" @click="prosesTambahKegiatanAtc()">
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
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.1);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    font-weight: 600;
}

.img-thumbnail {
    border-radius: 12px;
    object-fit: cover;
    transition: transform 0.2s ease;
}
.img-thumbnail:hover {
    transform: scale(1.05);
}

.btn-outline-secondary {
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-outline-secondary:hover {
    background-color: #f1f1f1;
    color: #333;
}

.btn-primary {
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-primary:hover {
    background-color: #0069d9;
}

@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }
    .btn {
        font-size: 0.9rem;
    }
    #youtubeIframe {
        height: 200px;
    }
}
</style>

