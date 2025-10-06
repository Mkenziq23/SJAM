<!-- div tabel data donasi  -->
<div id="divDataKegiatan">
    <div style="margin-bottom:15px;">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary  btn-icon icon-left" @click="tambahKegiatanAtc()">
            <i class="fas fa-plus-circle"></i> Tambah data kegiatan
        </a>
    </div>
    <div class="row" style="padding-left:20px;margin-right:10px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <table id="tblKegiatan" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Tempat Kegiatan</th>
                        <th>Foto Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKegiatan as $kegiatan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><b>{{ $kegiatan->nama_kegiatan }}</b></td>
                            <td>{{ $kegiatan->tanggal_kegiatan }}</td>
                            <td><b>{{ $kegiatan->tempat_kegiatan }}</b></td>
                            <td>
                                <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="Foto Kegiatan"
                                    style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-warning"
                                    @click="editKegiatanAtc('{{ $kegiatan->id }}')">Edit</a>
                                <a href="javascript:void(0)" class="btn btn-danger"
                                    @click="hapusAtc('{{ $kegiatan->id }}')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
