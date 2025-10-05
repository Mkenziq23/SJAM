<!-- div form add absensi  -->
<div id="divTambahAbsensi" style="display: none;">
    <div class="mb-3">
        <button class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </button>
    </div>

    <div class="row">
        <div class="col-12 mt-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Tambah Absensi ({{ date('d-M-Y') }})</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle" id="tblDataSantri">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>ID Santri</th>
                                    <th>Nama</th>
                                    <th>Kafilah</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataSantri as $santri)
                                    @php
                                        $idSantri = $santri->id_santri;
                                        $cekAbsensi = $santri->getAbsensiData($idSantri);
                                        $status = $cekAbsensi > 0 ? $cekAbsensi->active : '';
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $santri->id_santri }}</td>
                                        <td>{{ $santri->nama }}</td>
                                        <td>{{ $santri->kafilahData->nama }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" 
                                                    name="status_{{ $santri->id_santri }}" value="1"
                                                    {{ $status == '1' ? 'checked' : '' }}
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|hadir')">
                                                <label class="form-check-label">Hadir</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" 
                                                    name="status_{{ $santri->id_santri }}" value="2"
                                                    {{ $status == '2' ? 'checked' : '' }}
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|izin')">
                                                <label class="form-check-label">Izin</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" 
                                                    name="status_{{ $santri->id_santri }}" value="0"
                                                    {{ $status == '0' ? 'checked' : '' }}
                                                    @click="setAbsensiAtc('{{ $santri->id_santri }}|alpha')">
                                                <label class="form-check-label">Alpha</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#tblDataSantri").dataTable({
        pageLength: 10,
        lengthChange: false,
        ordering: true,
        order: [[1, "asc"]],
        language: { search: "Cari Santri:" }
    });
</script>
