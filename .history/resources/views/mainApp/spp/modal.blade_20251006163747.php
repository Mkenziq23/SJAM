<!-- Modal Pilih Santri -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalSantri">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content shadow-lg border-0 rounded-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-user-graduate mr-2"></i> Pilih Santri
                </h5>
            </div>

            <div class="alert alert-info m-3 d-flex align-items-start">
                <i class="fas fa-info-circle fa-lg mr-2 mt-1"></i>
                <div>
                    <strong>Catatan:</strong><br>
                    Untuk menutup pemilihan, klik di luar jendela modal.
                </div>
            </div>

            <div class="modal-body">
                <table class="table table-hover table-bordered table-striped align-middle" id="tblDataSantri">
                    <thead class="bg-light text-center">
                        <tr>
                            <th><i class="fas fa-list-ol"></i> No</th>
                            <th><i class="fas fa-id-card"></i> ID Santri</th>
                            <th><i class="fas fa-user"></i> Nama Santri</th>
                            <th><i class="fas fa-calendar-check"></i> Status SPP Bulan Ini</th>
                            <th><i class="fas fa-cogs"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSantri as $santri)
                            @php
                                $bulan = date('m');
                                $tahun = date('Y');
                                $qSpp = DB::table('tbl_spp')
                                    ->where('id_santri', $santri->id_santri)
                                    ->where('bulan', $bulan)
                                    ->where('tahun', $tahun)
                                    ->count();
                            @endphp
                            <tr class="{{ $qSpp > 0 ? 'table-success' : '' }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $santri->id_santri }}</td>
                                <td>{{ $santri->nama }}</td>

                                @if ($qSpp > 0)
                                    <td class="text-center text-success font-weight-bold">
                                        <i class="fas fa-check-circle"></i> Sudah Bayar
                                    </td>
                                    <td class="text-center text-muted">
                                        <i class="fas fa-lock"></i> -
                                    </td>
                                @else
                                    <td class="text-center text-danger font-weight-bold">
                                        <i class="fas fa-times-circle"></i> Belum Bayar
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-dismiss="modal" 
                                           class="btn btn-sm btn-primary shadow-sm"
                                           @click="pilihSantriAtc('{{ $santri->id_santri }}|{{ $santri->nama }}')">
                                            <i class="fas fa-hand-pointer"></i> Pilih
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal-footer bg-light border-top">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<style>
    #modalSantri .modal-content {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.2s ease-in-out;
}

#modalSantri .modal-content:hover {
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

#modalSantri table th, 
#modalSantri table td {
    vertical-align: middle !important;
}

#modalSantri .btn-primary {
    border-radius: 8px;
}

#modalSantri .table-success {
    background-color: #e9f9ee !important;
}

</style>