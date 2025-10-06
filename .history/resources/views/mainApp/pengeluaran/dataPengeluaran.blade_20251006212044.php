<!-- div tabel data pengeluaran  -->
<div id="divDataPenggajian" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-money-bill-wave me-2 fa-1x"></i> Data Pengeluaran
            </h5>
            <a href="javascript:void(0)" class="btn btn-light btn-sm fw-semibold" @click="tambahPengeluaranAtc()">
                <i class="fas fa-plus-circle me-1"></i> Tambah Pengeluaran
            </a>
        </div>
    <div class="row" style="padding-left:20px;margin-right:10px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <table id="tblPengeluaran" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Token</th>
                        <th>Nama Pengeluaran</th>
                        <th>Detail</th>
                        <th>Nominal</th>
                        <th>Tanggal Pengeluaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPengeluaran as $expend)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ substr($expend->token, 0, 7) }} ...</td>
                            <td>{{ $expend->nama_pengeluaran }}</td>
                            <td>{{ $expend->detail }}</td>
                            <td><b>Rp. {{ number_format($expend->total) }}</b></td>
                            <td>{{ $expend->tanggalPengeluaran($expend->tanggal_pengeluaran) }}</td>
                            <td>
                                {{-- <a href="javascript:void(0)" class="btn btn-primary">Cetak</a>&nbsp; --}}
                                <a href="javascript:void(0)" class="btn btn-warning"
                                    @click="hapusAtc('{{ $expend->token }}')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
