<div id="divTambahAbsensi" style="display: none;">
    <div>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </a>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-primary shadow">
                <div class="card-header">
                    <h4 class="card-title">Form Absensi ({{ date('d-M-Y') }})</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="tblDataSantri">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Santri</th>
                                <th>Nama</th>
                                <th>Kafilah</th>
                                <th>Status</th>
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
                                    <td>
                                        <div class="btn-group" role="group">
                                            <input type="radio" name="status_{{ $santri->id_santri }}" value="1"
                                                   id="hadir_{{ $santri->id_santri }}" @if($status==1) checked @endif
                                                   @click="setAbsensiAtc('{{ $santri->id_santri }}', 1, '{{ $santri->nama }}')">
                                            <label for="hadir_{{ $santri->id_santri }}" class="btn btn-success btn-sm">Hadir</label>

                                            <input type="radio" name="status_{{ $santri->id_santri }}" value="2"
                                                   id="izin_{{ $santri->id_santri }}" @if($status==2) checked @endif
                                                   @click="setAbsensiAtc('{{ $santri->id_santri }}', 2, '{{ $santri->nama }}')">
                                            <label for="izin_{{ $santri->id_santri }}" class="btn btn-warning btn-sm">Izin</label>

                                            <input type="radio" name="status_{{ $santri->id_santri }}" value="0"
                                                   id="alfa_{{ $santri->id_santri }}" @if($status==0) checked @endif
                                                   @click="setAbsensiAtc('{{ $santri->id_santri }}', 0, '{{ $santri->nama }}')">
                                            <label for="alfa_{{ $santri->id_santri }}" class="btn btn-danger btn-sm">Alfa</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
