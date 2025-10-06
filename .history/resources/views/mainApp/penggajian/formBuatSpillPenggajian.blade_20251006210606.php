<div id="divBuatSpill" style="display: none;">

    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left shadow-sm" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>

    <div class="row g-4">
        <!-- Form Penggajian -->
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Penggajian Pengurus Tahfiz</h4>
                </div>
                <div class="card-body">

                    <div class="form-group mb-3">
                        <label>Pengurus <small class="text-muted">** Klik field untuk memilih pengurus</small></label>
                        <div class="input-group">
                            <input type="text" class="form-control" @click="showModalPengurus()" id="txtNamaPengurus"
                                readonly placeholder="Pilih pengurus">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="txtTanggalPembayaran">
                    </div>

                    <div class="form-group mb-3">
                        <label>Gaji Pokok</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">Rp</span>
                            <input type="number" class="form-control" id="txtGajiPokok" placeholder="0">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Tunjangan / Bonus</label>
                        <div class="input-group">
                            <span class="input-group-text bg-info text-white">Rp</span>
                            <input type="number" class="form-control" id="txtTunjangan" placeholder="0">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Potongan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-danger text-white">Rp</span>
                            <input type="number" class="form-control" id="txtPotongan" placeholder="0">
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="javascript:void(0)" class="btn btn-primary btn-lg flex-fill" @click="prosesSplitBillAtc()">
                            <i class="fas fa-save"></i> Proses Penggajian
                        </a>
                        <a href="javascript:void(0)" class="btn btn-info btn-lg flex-fill" @click="clearFormAtc()">
                            <i class="fas fa-i-cursor"></i> Clear
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Informasi Tambahan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Keterangan Tunjangan</label>
                        <textarea class="form-control" id="txtCapTunjangan" placeholder="Penjelasan / item tunjangan" style="resize:none"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Keterangan Potongan</label>
                        <textarea class="form-control" id="txtCapPotongan" placeholder="Penjelasan / item potongan" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
/* Card Hover Effect */
.card:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

/* Input Group */
.input-group-text {
    width: 45px;
    justify-content: center;
    font-weight: bold;
}

/* Responsive Textarea */
textarea.form-control {
    min-height: 120px;
}

/* Buttons */
.btn-lg {
    font-size: 1rem;
    font-weight: 500;
}

/* Label small */
label small {
    font-size: 0.75rem;
}
</style>
