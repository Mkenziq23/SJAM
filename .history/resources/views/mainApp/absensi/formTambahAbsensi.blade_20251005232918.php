<!-- div form add absensi -->
<div id="divTambahAbsensi" style="display: none;">
    <div class="mb-3">
        <button type="button" class="btn btn-primary btn-icon" @click="kembaliAtc()">
            <i class="fas fa-reply me-2"></i> Kembali
        </button>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Tambah Absensi ({{ date('d-M-Y') }})</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle" id="tblDataSantri">
                            <thead class="table-light text-center">
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
                                        $statusHadir = $cekAbsensi && $cekAbsensi->active == '1' ? 'checked' : '';
                                        $statusIzin = $cekAbsensi && $cekAbsensi->active == '2' ? 'checked' : '';
                                        $statusAlpha = $cekAbsensi && $cekAbsensi->active == '3' ? 'checked' : '';
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $santri->id_santri }}</td>
                                        <td>{{ $santri->nama }}</td>
                                        <td>{{ $santri->kafilahData->nama }}</td>

                                        <!-- Hadir -->
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    id="hadir_{{ $santri->id_santri }}"
                                                    <?= $statusHadir ?>
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|Hadir')">
                                            </div>
                                        </td>

                                        <!-- Izin -->
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    id="izin_{{ $santri->id_santri }}"
                                                    <?= $statusIzin ?>
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|Izin')">
                                            </div>
                                        </td>

                                        <!-- Alpha -->
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    id="alpha_{{ $santri->id_santri }}"
                                                    <?= $statusAlpha ?>
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|Alpha')">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted mt-2">Catatan: Pilih salah satu status untuk setiap santri.</p>
                </div>
            </div>
        </div>
    </div>
</div>
