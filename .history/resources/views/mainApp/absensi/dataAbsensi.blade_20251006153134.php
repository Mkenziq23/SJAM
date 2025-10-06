<div id="divTambahAbsensi" style="display: none;">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-primary btn-icon" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Absensi ({{ date('d-M-Y') }})</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>ID Santri</th>
                                    <th>Nama</th>
                                    <th>Kafilah</th>
                                    <th class="text-center">
                                        Status<br>
                                        <div class="d-flex justify-content-center">
                                            <span class="px-2 border-end">Hadir</span>
                                            <span class="px-2 border-end">Izin</span>
                                            <span class="px-2">Alfa</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSantri as $santri)
                                    @php
                                        $idSantri = $santri->id_santri;
                                        // ambil status absensi hari ini dari database (misal: 1=hadir, 2=izin, 0=alfa, null jika belum absen)
                                        $cekAbsensi = $santri->getAbsensiData($idSantri);
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $santri->id_santri }}</td>
                                        <td class="text-start">{{ $santri->nama }}</td>
                                        <td class="text-start">{{ $santri->kafilahData->nama }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <!-- Hadir -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="status_{{ $idSantri }}"
                                                           id="hadir_{{ $idSantri }}"
                                                           value="1"
                                                           @if($cekAbsensi === 1) checked @endif
                                                           @click="setAbsensiAtc('{{ $idSantri }}', 1, '{{ $santri->nama }}')">
                                                </div>
                                                <!-- Izin -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="status_{{ $idSantri }}"
                                                           id="izin_{{ $idSantri }}"
                                                           value="2"
                                                           @if($cekAbsensi === 2) checked @endif
                                                           @click="setAbsensiAtc('{{ $idSantri }}', 2, '{{ $santri->nama }}')">
                                                </div>
                                                <!-- Alfa -->
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                           name="status_{{ $idSantri }}"
                                                           id="alfa_{{ $idSantri }}"
                                                           value="0"
                                                           @if($cekAbsensi === 0) checked @endif
                                                           @click="setAbsensiAtc('{{ $idSantri }}', 0, '{{ $santri->nama }}')">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>
</div>
