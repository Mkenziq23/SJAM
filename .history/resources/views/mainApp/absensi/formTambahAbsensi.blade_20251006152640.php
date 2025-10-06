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
                                    @endphp
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $santri->id_santri }}</td>
                                        <td class="text-start">{{ $santri->nama }}</td>
                                        <td class="text-start">{{ $santri->kafilahData->nama }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_{{ $santri->id_santri }}"
                                                           id="hadir_{{ $santri->id_santri }}" value="1"
                                                           @click="setAbsensiAtc('{{ $santri->id_santri }}', 1, '{{ $santri->nama }}')">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_{{ $santri->id_santri }}"
                                                           id="izin_{{ $santri->id_santri }}" value="2"
                                                           @click="setAbsensiAtc('{{ $santri->id_santri }}', 2, '{{ $santri->nama }}')">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status_{{ $santri->id_santri }}"
                                                           id="alfa_{{ $santri->id_santri }}" value="0"
                                                           @click="setAbsensiAtc('{{ $santri->id_santri }}', 0, '{{ $santri->nama }}')">
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
