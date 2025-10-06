<div id="divAddPembayaran" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon icon-left shadow-sm" @click="kembaliAtc()">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">
        <!-- FORM PEMBAYARAN -->
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <i class="fas fa-money-check-alt mr-2 fa-1x"></i>
                    <h5 class="mb-0">Form Pembayaran SPP</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><i class="fas fa-user-graduate"></i> Santri 
                            <small class="text-muted">(** Klik field untuk memilih santri)</small>
                        </label>
                        <input type="text" class="form-control" @click="showModalSantriAtc()" id="txtNamaSantri"
                            readonly placeholder="Pilih santri">
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-calendar-alt"></i> Tahun</label>
                        <select class="form-control" id="txtTahun">
                            @for ($i = 2020; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>


                    <div class="form-group">
                        <label><i class="fas fa-calendar"></i> Bulan</label>
                        <select class="form-control" id="txtBulan">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-wallet"></i> Total Pembayaran</label>
                        <input type="text" class="form-control" id="txtTotalPembayaran" placeholder="Masukkan nominal pembayaran">
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-user-tie"></i> Petugas Administrasi</label>
                        <select class="form-control" id="txtPetugas">
                            @foreach ($dataPengurus as $pengurus)
                                <option value="{{ $pengurus->id_pengurus }}">{{ $pengurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="javascript:void(0)" class="btn btn-success btn-lg shadow-sm" @click="prosesPembayaranSppAtc()">
                            <i class="fas fa-check-circle"></i> Proses Pembayaran
                        </a>
                       <a href="javascript:void(0)" class="btn btn-lg btn-info btn-icon icon-left" 
                        @click="clearFormAtc">
                        <i class="fas fa-eraser"></i> Bersihkan Form
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFORMASI -->
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
            <div class="card shadow border-0">
                <div class="card-header bg-info text-white d-flex align-items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <h5 class="mb-0">Informasi Pembayaran SPP</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-exclamation-circle text-warning"></i> Pembayaran SPP hanya berlaku jika santri belum membayar pada bulan yang dipilih.</li>
                        <li><i class="fas fa-clock text-primary"></i> Pastikan data santri dan periode pembayaran sudah benar sebelum diproses.</li>
                        <li><i class="fas fa-user-shield text-success"></i> Petugas administrasi bertanggung jawab terhadap data transaksi.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-header i {
    margin-right: 8px;
}

.btn-icon i {
    margin-right: 6px;
}

#divAddPembayaran .card {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

#divAddPembayaran .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

</style>