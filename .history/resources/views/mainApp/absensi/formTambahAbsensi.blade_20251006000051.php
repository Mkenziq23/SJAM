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
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>ID Santri</th>
                                    <th>Nama</th>
                                    <th>Kafilah</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSantri as $santri)
                                    @php
                                        $idSantri = $santri->id_santri;
                                        $cekAbsensi = $santri->getAbsensiData($idSantri); // 0=Alfa, 1=Hadir, 2=Izin
                                        $status = $cekAbsensi ?? 0;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $santri->id_santri }}</td>
                                        <td>{{ $santri->nama }}</td>
                                        <td>{{ $santri->kafilahData->nama }}</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <input type="radio" class="btn-check" name="status_{{ $santri->id_santri }}" value="1"
                                                       id="hadir_{{ $santri->id_santri }}" @if($status==1) checked @endif
                                                       @click="setAbsensiAtc('{{ $santri->id_santri }}', 1, '{{ $santri->nama }}')">
                                                <label class="btn btn-success" for="hadir_{{ $santri->id_santri }}">Hadir</label>

                                                <input type="radio" class="btn-check" name="status_{{ $santri->id_santri }}" value="2"
                                                       id="izin_{{ $santri->id_santri }}" @if($status==2) checked @endif
                                                       @click="setAbsensiAtc('{{ $santri->id_santri }}', 2, '{{ $santri->nama }}')">
                                                <label class="btn btn-warning text-dark" for="izin_{{ $santri->id_santri }}">Izin</label>

                                                <input type="radio" class="btn-check" name="status_{{ $santri->id_santri }}" value="0"
                                                       id="alfa_{{ $santri->id_santri }}" @if($status==0) checked @endif
                                                       @click="setAbsensiAtc('{{ $santri->id_santri }}', 0, '{{ $santri->nama }}')">
                                                <label class="btn btn-danger" for="alfa_{{ $santri->id_santri }}">Alfa</label>
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
