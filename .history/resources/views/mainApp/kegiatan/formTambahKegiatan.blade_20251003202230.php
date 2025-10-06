<!-- div form add data kegiatan  -->
<div id="divTambahKegiatan" style="display: none;">
    <div>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h4 class="card-title">Form tambah kegiatan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" id="txtNamaKegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" class="form-control" id="txtTanggalKegiatan" />
                    </div>
                    <div class="form-group">
                        <label>Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="txtTempatKegiatan" />
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Foto Kegiatan</label>
                        <img class="img-preview img-fluid d-block mb-3">
                        <input class="form-control" type="file" id="txtFotoKegiatan" onchange="previewImage()">
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left"
                            @click="prosesTambahKegiatanAtc()">
                            <i class="fas fa-save"></i>Proses Tambah Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
