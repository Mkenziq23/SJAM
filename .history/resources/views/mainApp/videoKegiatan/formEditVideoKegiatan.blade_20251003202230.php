<!-- Form to edit existing video activity -->
<div id="divEditVideoKegiatan" style="display: none;">
    <div>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Kegiatan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" id="txtEditNamaKegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="txtEditTanggalKegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="txtEditTempatKegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <img class="img-preview img-fluid d-block mb-3" id="imgEditThumbnail"
                            style="max-width: 100%; height: auto;">
                        <input class="form-control" type="file" id="txtEditThumbnailVideoKegiatan"
                            onchange="previewEditImage()">
                    </div>
                    <div class="form-group">
                        <label>Link Video YouTube</label>
                        <input type="text" class="form-control" id="txtEditLinkVideo"
                            placeholder="https://www.youtube.com/watch?v=your_video_id"
                            oninput="updateEditVideoPreview()" />
                    </div>
                    <div class="mt-2" id="editVideoPreview" style="display: none;">
                        <iframe id="editYoutubeIframe" width="100%" height="315" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left mt-4"
                            @click="prosesEditKegiatanAtc()">
                            <i class="fas fa-save"></i> Proses Edit Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
