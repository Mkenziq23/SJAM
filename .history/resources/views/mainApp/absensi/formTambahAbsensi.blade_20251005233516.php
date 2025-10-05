<!-- div form add absensi -->
<div id="divTambahAbsensi" style="display: none;">
    <div class="mb-3">
        <button class="btn btn-secondary btn-icon" @click="kembaliAtc()">
            <i class="fas fa-reply"></i> Kembali
        </button>
    </div>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Form Tambah Absensi ({{ date('d-M-Y') }})</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle" id="tblDataSantri">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>ID Santri</th>
                            <th>Nama</th>
                            <th>Khafilah</th>
                            <th>Hadir</th>
                            <th>Ijin</th>
                            <th>Alpha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSantri as $santri)
                            @php
                                $idSantri = $santri->id_santri;
                                $cekAbsensi = $santri->getAbsensiData($idSantri);
                                $hadir = $cekAbsensi->active ?? 0;
                                $ijin = $cekAbsensi->ijin ?? 0;
                                $alpha = $cekAbsensi->alpha ?? 0;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $santri->id_santri }}</td>
                                <td>{{ $santri->nama }}</td>
                                <td class="text-center">
                                    <span class="badge bg-success">{{ $santri->kafilahData->nama }}</span>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" 
                                        @click="setAbsensiAtc('{{ $santri->id_santri }}','active', $event.target.checked)" 
                                        {{ $hadir == 1 ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" 
                                        @click="setAbsensiAtc('{{ $santri->id_santri }}','ijin', $event.target.checked)" 
                                        {{ $ijin == 1 ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" 
                                        @click="setAbsensiAtc('{{ $santri->id_santri }}','alpha', $event.target.checked)" 
                                        {{ $alpha == 1 ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
