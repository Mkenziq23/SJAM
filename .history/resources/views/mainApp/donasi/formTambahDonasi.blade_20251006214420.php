<div id="divTambahDonasi" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Tambah Donasi</h4>
                </div>
                <div class="card-body p-4">
                    <div class="form-group mb-3">
                        <label>Nama Donatur</label>
                        <input type="text" class="form-control" id="txtNamaDonatur" placeholder="Masukkan nama donatur" />
                    </div>
                    <div class="form-group mb-3">
                        <label>Detail</label>
                        <textarea class="form-control" style="resize: none" id="txtDetail" placeholder="Keterangan donasi"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tipe Donasi</label>
                        <select class="form-control" id="txtTipe">
                            <option value="PERSEORANGAN">Perseorangan</option>
                            <option value="INSTANSI">Instansi / Perusahaan</option>
                            <option value="UMKM">UMKM</option>
                            <option value="EVENT">Event / Acara</option>
                            <option value="LAIN_LAIN">Lain-lain</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nominal</label>
                        <input type="text" class="form-control" id="txtNominal" placeholder="1.000.000" />
                    </div>
                    <div class="form-group mb-4">
                        <label>Tanggal Donasi</label>
                        <input type="date" class="form-control" id="txtTanggalDonasi" />
                    </div>
                    <div class="d-flex gap-2">
                        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left flex-grow-1"
                            @click="prosesTambahDonasiAtc()">
                            <i class="fas fa-save"></i> Proses Tambah Donasi
                        </a>
                        <a href="javascript:void(0)" class="btn btn-lg btn-info btn-icon icon-left flex-grow-1"
                            @click="clearForm()">
                            <i class="fas fa-i-cursor"></i> Clear
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ======= CSS Tambahan ======= -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.btn-icon i {
    margin-right: 5px;
}
</style>
