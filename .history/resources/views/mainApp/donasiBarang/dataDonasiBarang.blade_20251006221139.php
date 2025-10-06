<!-- div tabel data donasi  -->
<div id="divDataDonasiBarang">
    <div style="margin-bottom:15px;">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary  btn-icon icon-left" @click="tambahDonasiBarangAtc">
            <i class="fas fa-plus-circle"></i> Tambah data donasi barang
        </a>

    </div>
    <div class="row" style="padding-left:20px;margin-right:10px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <table id="tblDonasiBarang" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Token</th>
                        <th>Nama Donatur</th>
                        <th>Nama Barang</th>
                        <th>Tipe</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Donasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataDonasiBarang as $donasi)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ substr($donasi->token, 0, 7) }} ...</td>
                            <td><b>{{ $donasi->nama_donatur }}</b></td>
                            <td>{{ $donasi->nama_barang }}</td>
                            <td>{{ $donasi->tipe }}</td>
                            <td>{{ number_format($donasi->jumlah) }}</td>
                            <td>{{ $donasi->tanggal_donasi }}</td>
                            <td>
                                <a href="{{ url('app/donasi-barang/' . $donasi->token . '/cetak') }}" target="new"
                                    class="btn btn-primary">Cetak</a>&nbsp;
                                <a href="javascript:void(0)" class="btn btn-warning"
                                    @click="hapusAtc('{{ $donasi->token }}')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
