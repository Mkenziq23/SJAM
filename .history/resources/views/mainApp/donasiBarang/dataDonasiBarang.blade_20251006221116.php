<div id="divDataDonasiBarang">
    <div class="mb-3">
        <a href="javascript:void(0)" class="btn btn-lg btn-primary btn-icon icon-left" @click="tambahDonasiBarangAtc">
            <i class="fas fa-plus-circle"></i> Tambah Data Donasi Barang
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded-4">
        <table id="tblDonasiBarang" class="table table-hover table-bordered table-striped mb-0">
            <thead class="table-primary text-center">
                <tr>
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
            <tbody class="text-center">
                @foreach ($dataDonasiBarang as $donasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($donasi->token, 0, 7) }} ...</td>
                        <td class="fw-bold">{{ $donasi->nama_donatur }}</td>
                        <td>{{ $donasi->nama_barang }}</td>
                        <td>{{ $donasi->tipe }}</td>
                        <td>{{ number_format($donasi->jumlah) }}</td>
                        <td>{{ $donasi->tanggal_donasi }}</td>
                        <td class="text-nowrap">
                            <a href="{{ url('app/donasi-barang/' . $donasi->token . '/cetak') }}" target="_blank" class="btn btn-sm btn-primary mb-1">
                                <i class="fas fa-print me-1"></i> Cetak
                            </a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-warning mb-1" @click="hapusAtc('{{ $donasi->token }}')">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
