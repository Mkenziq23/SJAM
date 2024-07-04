<div id="divDataBuktiBayar">
    <div class="row" id="divTabelDataBuktiBayar"style="padding-left:20px;margin-right:10px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <table id="tblBuktiBayar" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>No Induk</th>
                        <th>Nama Santri</th>
                        <th>Nama Orang Tua</th>
                        <th>Kelas</th>
                        <th>Nomor Handphone</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataBuktiBayar as $bukti)
                        <tr>
                            <td>{{ $bukti->nama_santri }}</td>
                            <td>{{ $bukti->id_santri }}</td>
                            <td>{{ $bukti->nama_orang_tua }}</td>
                            <td>{{ $bukti->kelas }}</td>
                            <td>{{ $bukti->nomor_handphone }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $bukti->bukti_pembayaran_path) }}" target="_blank"
                                    class="btn btn-primary"><i class="fas fa-eye"></i> Lihat
                                    Bukti</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
