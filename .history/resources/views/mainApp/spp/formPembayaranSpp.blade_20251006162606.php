<div id="divAddPembayaran" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-4 text-left">
        <a href="javascript:void(0)" class="btn btn-outline-primary btn-icon icon-left shadow-sm" @click="kembaliAtc()">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <!-- FORM PEMBAYARAN -->
        <div class="col-xl-7 col-lg-8 col-md-10 col-sm-12 mb-4">
            <div class="card shadow-lg border-0 p-4" style="transform: scale(1.02);">
                <div class="card-header bg-primary text-white d-flex align-items-center py-3 rounded-top">
                    <i class="fas fa-money-check-alt mr-2 fa-lg"></i>
                    <h4 class="mb-0 font-weight-bold">Form Pembayaran SPP</h4>
                </div>
                <div class="card-body mt-3">
                    <div class="form-group mb-4">
                        <label><i class="fas fa-user-graduate"></i> Santri 
                            <small class="text-muted">(** Klik field untuk memilih santri)</small>
                        </label>
                        <input type="text" class="form-control form-control-lg" @click="showModalSantriAtc()" id="txtNamaSantri"
                            readonly placeholder="Pilih santri">
                    </div>

                    <div class="form-group mb-4">
                        <label><i class="fas fa-calendar-alt"></i> Tahun</label>
                        <select class="form-control form-control-lg" id="txtTahun">
                            @for ($i = 2022; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label><i class="fas fa-calendar"></i> Bulan</label>
                        <select class="form-control form-control-lg" id="txtBulan">
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

                    <div class="form-group mb-4">
                        <label><i class="fas fa-wallet"></i> Total Pembayaran</label>
                        <input type="text" class="form-control form-control-lg" id="txtTotalPembayaran" placeholder="Masukkan nominal pembayaran">
                    </div>

                    <div class="form-group mb-4">
                        <label><i class="fas fa-user-tie"></i> Petugas Administrasi</label>
                        <select class="form-control form-control-lg" id="txtPetugas">
                            @foreach ($dataPengurus as $pengurus)
                                <option value="{{ $pengurus->id_pengurus }}">{{ $pengurus->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="javascript:void(0)" class="btn btn-success btn-lg px-4 shadow-sm" @click="prosesPembayaranSppAtc()">
                            <i class="fas fa-check-circle"></i> Proses Pembayaran
                        </a>
                        <a href="javascript:void(0)" class="btn btn-secondary btn-lg px-4 shadow-sm ml-3" id="btnClearForm">
                            <i class="fas fa-eraser"></i> Bersihkan Form
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- INFORMASI -->
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mb-4">
            <div class="card shadow-lg border-0 p-3" style="transform: scale(1.02);">
                <div class="card-header bg-info text-white d-flex align-items-center py-3 rounded-top">
                    <i class="fas fa-info-circle mr-2 fa-lg"></i>
                    <h4 class="mb-0 font-weight-bold">Informasi Pembayaran SPP</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-exclamation-circle text-warning"></i> Pembayaran SPP hanya berlaku jika santri belum membayar pada bulan tersebut.</li>
                        <li class="mb-2"><i class="fas fa-clock text-primary"></i> Pastikan data santri dan periode pembayaran sudah benar sebelum diproses.</li>
                        <li><i class="fas fa-user-shield text-success"></i> Petugas administrasi bertanggung jawab terhadap data transaksi yang dilakukan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #divAddPembayaran .card {
    transition: all 0.3s ease;
    border-radius: 15px;
}

#divAddPembayaran .card:hover {
    transform: scale(1.025);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

#divAddPembayaran label {
    font-weight: 600;
    color: #333;
}

#divAddPembayaran .form-control-lg {
    padding: 0.8rem 1rem;
    font-size: 1.05rem;
    border-radius: 10px;
}

#divAddPembayaran .card-header h4 {
    font-size: 1.3rem;
}

</style>