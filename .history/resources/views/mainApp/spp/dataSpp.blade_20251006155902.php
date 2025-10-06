<!-- Div Tabel SPP -->
<div id="divDataSpp" class="container-fluid mt-3">

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">
            <i class="fas fa-file-invoice-dollar me-2 text-primary"></i> Data Pembayaran SPP
        </h4>
        <a href="javascript:void(0)" class="btn btn-primary btn-lg shadow-sm" @click="tambahPembayaranSppAtc()">
            <i class="fas fa-plus-circle me-2"></i> Tambah Pembayaran
        </a>
    </div>

    <!-- Kartu Pembungkus -->
    <div class="card border-0 shadow-lg rounded-3">
        <div class="card-body p-4">

            <div class="table-responsive">
                <table id="tblSpp" class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Token</th>
                            <th>Nama Santri</th>
                            <th>Bulan / Tahun</th>
                            <th>Total Pembayaran</th>
                            <th>Waktu Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        @foreach($dataSpp as $spp)
                        @php
                            $monthNum = $spp->bulan;
                            $mn = date("F", mktime(0, 0, 0, $monthNum, 10));
                        @endphp
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration }}</td>
                            <td><span class="badge bg-light text-dark">{{ substr($spp->token_pembayaran, 0, 10) }}</span></td>
                            <td class="text-capitalize">{{ $spp->santriData->nama }}</td>
                            <td>{{ $mn }} / {{ $spp->tahun }}</td>
                            <td class="text-success fw-bold">Rp {{ number_format($spp->total) }}</td>
                            <td>
                                <i class="fas fa-clock me-1 text-secondary"></i>
                                {{ \Carbon\Carbon::parse($spp->created_at)->format('d M Y, H:i') }}
                            </td>
                            <td>
                                <a href="{{ url('app/pembayaran-spp/'.$spp->token_pembayaran.'/cetak') }}" target="_blank"
                                   class="btn btn-outline-primary btn-sm rounded-pill px-3 shadow-sm">
                                    <i class="fas fa-print me-1"></i> Cetak
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

