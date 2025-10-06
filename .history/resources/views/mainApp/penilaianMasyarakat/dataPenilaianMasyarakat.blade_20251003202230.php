<!-- div tabel data pengurus  -->
<div id="divPenilaianMasyarakat">
    <div class="row" id="divTabelDataPenilaianMasyarakat" style="padding-left:20px;margin-right:10px;">
        <table id="tblPenilaianMasyarakat" class="table table-hover table-bordered table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Penilaian / Ulasan</th>
                    <th>Bintang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaianMasyarakat as $penilaian)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penilaian->name }}</td>
                        <td>{{ $penilaian->reason }}</b></td>
                        <td>{{ $penilaian->stars }}</b></td>
                        <td>
                            <button class="btn btn-sm btn-danger" @click="hapusAtc('{{ $penilaian->id }}')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
