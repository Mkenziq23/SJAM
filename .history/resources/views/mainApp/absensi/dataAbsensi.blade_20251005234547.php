<div id="divDataAbsensi">
    <div style="margin-bottom:15px;">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle"></i> Rekap Absensi Hari Ini
        </a>
        <a href="javascript:void(0)" class="btn btn-lg btn-info btn-icon icon-left" @click="tambahAbsensiAtc()">
            <i class="fas fa-plus-circle"></i> Lihat seluruh rekap absensi
        </a>
    </div>
    <div class="row" style="padding-left:20px;margin-right:10px;">
        <div class="col-12 mt-3">
            <table id="tblAbsensi" class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Token</th>
                        <th>Nama Santri</th>
                        <th>Kafilah</th>
                        <th>Waktu Absen</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAbsensi as $absensi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ substr($absensi->token_absensi, 0, 7) }} ...</td>
                            <td>{{ $absensi->santriData->nama }}</td>
                            <td>{{ $absensi->getKafilahData($absensi->id_santri) }}</td>
                            <td>{{ Carbon\Carbon::parse($absensi->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td>
                                @if($absensi->active == '1')
                                    <span class="badge bg-success">Hadir</span>
                                @elseif($absensi->active == '2')
                                    <span class="badge bg-warning text-dark">Izin</span>
                                @else
                                    <span class="badge bg-danger">Alfa</span>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger"
                                   @click="hapusAbsensiAtc('{{ $absensi->token_absensi }}')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
