<!-- div form add absensi -->
<div id="divTambahAbsensi" style="display: none;">
    <div class="mb-3">
        <button class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply me-2"></i> Kembali
        </button>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Tambah Absensi ({{ date('d-M-Y') }})</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle" id="tblDataSantri">
                            <thead class="table-info text-center">
                                <tr>
                                    <th>No</th>
                                    <th>ID Santri</th>
                                    <th>Nama</th>
                                    <th>Kafilah</th>
                                    <th>Hadir</th>
                                    <th>Izin</th>
                                    <th>Alpha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSantri as $santri)
                                    @php
                                        $idSantri = $santri->id_santri;
                                        $cekAbsensi = $santri->getAbsensiData($idSantri);
                                    @endphp
                                    <?php
                                        $stCheck = $cekAbsensi < 1 ? '' : 'checked';
                                        $stIzin = ''; // default izin kosong
                                        $stAlpha = ''; // default alpha kosong
                                    ?>
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $santri->id_santri }}</td>
                                        <td>{{ $santri->nama }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success">{{ $santri->kafilahData->nama }}</span>
                                        </td>
                                        <td class="text-center">
                                            <label class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input"
                                                    id="ck_hadir_{{ $santri->id_santri }}"
                                                    <?= $stCheck ?>
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|{{ $santri->nama }}|hadir')">
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input"
                                                    id="ck_izin_{{ $santri->id_santri }}"
                                                    <?= $stIzin ?>
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|{{ $santri->nama }}|izin')">
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <label class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input"
                                                    id="ck_alpha_{{ $santri->id_santri }}"
                                                    <?= $stAlpha ?>
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|{{ $santri->nama }}|alpha')">
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
</div>
