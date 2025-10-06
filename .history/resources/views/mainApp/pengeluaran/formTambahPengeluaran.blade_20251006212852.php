<!-- ✅ Form Tambah Pengeluaran -->
<div id="divAddPengeluaran" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-8 col-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Tambah Pengeluaran</h4>
                </div>
                <div class="card-body p-4">
                    <div class="form-group mb-3">
                        <label>Nama Pengeluaran</label>
                        <input type="text" class="form-control" id="txtNama" placeholder="Masukkan nama pengeluaran" />
                    </div>
                    <div class="form-group mb-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" style="resize:none" id="txtDeks" placeholder="Masukkan deskripsi pengeluaran"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kategori</label>
                        <select class="form-control" id="txtKategori">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="LISTRIK">Listrik</option>
                            <option value="AIR">Air</option>
                            <option value="ATK">ATK</option>
                            <option value="PAJAK">Pajak</option>
                            <option value="KEBUTUHAN_TAHFIZ">Kebutuhan Tahfiz</option>
                            <option value="EVENT">Event</option>
                            <option value="LAIN_LAIN">Lain-lain</option>
                            <option value="TRANSPORTASI">Transportasi</option>
                            <option value="MAKANAN_MINUMAN">Makanan & Minuman</option>
                            <option value="PERBAIKAN">Perbaikan</option>
                            <option value="KESEHATAN">Kesehatan</option>
                            <option value="LAINNYA">Kategori Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nominal</label>
                        <input type="text" class="form-control" id="txtNominal" placeholder="Masukkan nominal" />
                        <small class="text-muted">Format otomatis: Rp. 0</small>
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Pengeluaran</label>
                        <input type="date" class="form-control" id="txtTanggalPengeluaran" />
                    </div>
                    <div class="mt-4">
                        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left me-2" @click="prosesPengeluaranAtc()">
                            <i class="fas fa-save"></i> Proses Pengeluaran
                        </a>
                        <a href="javascript:void(0)" class="btn btn-lg btn-info btn-icon icon-left" id="btnClearForm">
                            <i class="fas fa-i-cursor"></i> Clear
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======= CSS Kustom ======= -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
}

.form-control {
    border-radius: 8px;
    box-shadow: none;
}

.btn-lg {
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-info:hover {
    background-color: #17a2b8;
}

@media (max-width: 768px) {
    .btn-lg {
        font-size: 0.85rem;
        padding: 8px 12px;
    }
}
</style>


