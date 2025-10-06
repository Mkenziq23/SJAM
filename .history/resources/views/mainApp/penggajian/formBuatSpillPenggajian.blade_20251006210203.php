<div id="divBuatSpill" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon icon-left shadow-sm" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>

    <div class="row">
        <!-- Form Penggajian -->
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Penggajian Pengurus Tahfiz</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Pengurus <small class="text-muted">** Klik field untuk memilih pengurus</small></label>
                        <input type="text" class="form-control form-control-lg" @click="showModalPengurus()" id="txtNamaPengurus" readonly placeholder="Pilih pengurus">
                    </div>
                    <div class="form-group mb-3">
                        <label>Tanggal Pembayaran</label>
                        <input type="date" class="form-control form-control-lg" id="txtTanggalPembayaran">
                    </div>
                    <div class="form-group mb-3">
                        <label>Gaji Pokok</label>
                        <input type="number" class="form-control form-control-lg" id="txtGajiPokok" placeholder="Rp. 0">
                    </div>
                    <div class="form-group mb-3">
                        <label>Tunjangan / Bonus</label>
                        <input type="number" class="form-control form-control-lg" id="txtTunjangan" placeholder="Rp. 0">
                    </div>
                    <div class="form-group mb-3">
                        <label>Potongan</label>
                        <input type="number" class="form-control form-control-lg" id="txtPotongan" placeholder="Rp. 0">
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="javascript:void(0)" class="btn btn-gradient-primary btn-lg flex-fill" @click="prosesSplitBillAtc()">
                            <i class="fas fa-save me-2"></i> Proses
                        </a>
                        <a href="javascript:void(0)" class="btn btn-outline-info btn-lg flex-fill" @click="clearFormAtc()">
                            <i class="fas fa-i-cursor me-2"></i> Clear
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-info text-white">
                    <h4 class="card-title mb-0">Informasi Tambahan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Keterangan Tunjangan</label>
                        <textarea class="form-control form-control-lg" id="txtCapTunjangan" placeholder="Penjelasan / item tunjangan" style="resize:none"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Keterangan Potongan</label>
                        <textarea class="form-control form-control-lg" id="txtCapPotongan" placeholder="Penjelasan / item potongan" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Tombol gradient */
.btn-gradient-primary {
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.btn-gradient-primary:hover {
    background: linear-gradient(135deg, #0056b3, #0099ff);
}

/* Card hover effect */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    transition: all 0.3s ease;
}

/* Input focus effect */
.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

/* Responsive */
@media (max-width: 768px) {
    .d-flex.gap-2 {
        flex-direction: column;
    }
}

</style>