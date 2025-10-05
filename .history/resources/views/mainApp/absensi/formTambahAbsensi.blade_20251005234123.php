<!-- div form add absensi  -->
<div id="divTambahAbsensi" style="display: none;">
    <div class="mb-3">
        <button type="button" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </button>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Form Tambah Absensi ({{ date('d-M-Y') }})</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered align-middle" id="tblDataSantri">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th>No</th>
                                <th>ID Santri</th>
                                <th>Nama</th>
                                <th>Kafilah</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Alfa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSantri as $santri)
                                @php
                                    $cekAbsensi = $santri->getAbsensiData($santri->id_santri);
                                    $status = $cekAbsensi->active ?? null; // null jika belum ada
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $santri->id_santri }}</td>
                                    <td>{{ $santri->nama }}</td>
                                    <td>{{ $santri->kafilahData->nama }}</td>
                                    <!-- Checkbox status -->
                                    <td class="text-center">
                                        <input type="radio" name="status_{{ $santri->id_santri }}" value="1"
                                            @if($status=='1') checked @endif
                                            @click="setAbsensiAtc('{{ $santri->id_santri }}', 1, '{{ $santri->nama }}')">
                                    </td>
                                    <td class="text-center">
                                        <input type="radio" name="status_{{ $santri->id_santri }}" value="2"
                                            @if($status=='2') checked @endif
                                            @click="setAbsensiAtc('{{ $santri->id_santri }}', 2, '{{ $santri->nama }}')">
                                    </td>
                                    <td class="text-center">
                                        <input type="radio" name="status_{{ $santri->id_santri }}" value="0"
                                            @if($status=='0' || is_null($status)) checked @endif
                                            @click="setAbsensiAtc('{{ $santri->id_santri }}', 0, '{{ $santri->nama }}')">
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
