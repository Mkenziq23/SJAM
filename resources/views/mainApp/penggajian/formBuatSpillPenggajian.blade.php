<div id="divBuatSpill" style="display: none;">
    <div>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left shadow-lg" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h4 class="card-title">Form Penggajian Pengurus Tahfiz</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Pengurus <small>** Klik field untuk memilih pengurus</small></label>
                        <input type="text" class="form-control" @click="showModalPengurus()" id="txtNamaPengurus"
                            readonly placeholder="Pilih pengurus">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="txtTanggalPembayaran">
                    </div>
                    <div class="form-group">
                        <label>Gaji Pokok</label>
                        <input type="number" class="form-control" id="txtGajiPokok">
                    </div>
                    <div class="form-group">
                        <label>Tunjangan / Bonus</label>
                        <input type="number" class="form-control" id="txtTunjangan">
                    </div>
                    <div class="form-group">
                        <label>Potongan</label>
                        <input type="number" class="form-control" id="txtPotongan">
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left shadow-lg"
                            @click="prosesSplitBillAtc()">
                            <i class="fas fa-save"></i>Proses Penggajian Pengurus
                        </a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0)" class="btn btn-lg btn-info btn-icon icon-left shadow-lg"
                            id="btnClearForm">
                            <i class="fas fa-i-cursor"></i> Clear
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary shadow-lg">
                <div class="card-header">
                    <h4 class="card-title">Informasi Tambahan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Keterangan tunjangan</label>
                        <textarea class="form-control" id="txtCapTunjangan" placeholder="Penjelasan / item tunjangan" style="resize:none"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Keterangan potongan</label>
                        <textarea class="form-control" id="txtCapPotongan" placeholder="Penjelasan / item potongan" style="resize:none"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
