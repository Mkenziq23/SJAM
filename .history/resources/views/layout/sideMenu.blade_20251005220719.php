@if (Auth::check())
<div class="main-sidebar shadow" id="divMenu">
    <aside id="sidebar-wrapper">
        <!-- Sidebar Brand -->
        <div class="sidebar-brand text-center py-3">
            <a href="javascript:void(0)">
                <img src="{{ asset('ladun/stisla/img/sjam.jpg') }}" class="img-fluid" style="max-width: 120px;">
            </a>
        </div>

        <ul class="sidebar-menu mt-4">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" @click="dashboardAtc()" href="javascript:void(0)">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>

            <!-- Absensi -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" @click="absensiAtc()" href="javascript:void(0)">
                    <i class="fas fa-calendar-check me-2"></i> Absensi Harian
                </a>
            </li>

            <!-- Pembayaran -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" @click="pembayaranSppAtc()" href="javascript:void(0)">
                    <i class="fas fa-credit-card me-2"></i> Pembayaran SPP
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" @click="buktiBayarAtc()" href="javascript:void(0)">
                    <i class="fas fa-receipt me-2"></i> Bukti Pembayaran
                </a>
            </li>

            <!-- Data Master -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#dataMasterMenu" role="button" aria-expanded="false" aria-controls="dataMasterMenu">
                    <span><i class="fas fa-database me-2"></i> Data Master</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="dataMasterMenu">
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="santriAtc()">Santri</a></li>
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="pendaftaranSantriAtc()">Pendaftaran Santri</a></li>
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="pengurusAtc()">Pengurus</a></li>
                </ul>
            </li>

            @if (Auth::user()->role != '2')
            <!-- Keuangan -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#keuanganMenu" role="button" aria-expanded="false" aria-controls="keuanganMenu">
                    <span><i class="fas fa-wallet me-2"></i> Keuangan</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="keuanganMenu">
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="saldoAtc()">Saldo</a></li>

                    <!-- Pengeluaran -->
                    <li>
                        <a class="nav-link d-flex justify-content-between align-items-center py-1" data-bs-toggle="collapse"
                            href="#pengeluaranMenu" role="button" aria-expanded="false" aria-controls="pengeluaranMenu">
                            Pengeluaran <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="collapse list-unstyled ps-3" id="pengeluaranMenu">
                            <li><a class="nav-link py-1" href="javascript:void(0)" @click="penggajianAtc()">Penggajian</a></li>
                            <li><a class="nav-link py-1" href="javascript:void(0)" @click="pengeluaranAtc()">Operasional</a></li>
                        </ul>
                    </li>

                    <!-- Pemasukkan Donasi/Infaq -->
                    <li>
                        <a class="nav-link d-flex justify-content-between align-items-center py-1" data-bs-toggle="collapse"
                            href="#donasiMenu" role="button" aria-expanded="false" aria-controls="donasiMenu">
                            Donasi/Infaq <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="collapse list-unstyled ps-3" id="donasiMenu">
                            <li><a class="nav-link py-1" href="javascript:void(0)" @click="donasiAtc()">Uang</a></li>
                            <li><a class="nav-link py-1" href="javascript:void(0)" @click="donasiBarangAtc()">Barang</a></li>
                        </ul>
                    </li>

                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="cashFlowAtc()">Cash Flow</a></li>
                </ul>
            </li>
            @endif

            <!-- Laporan & Statistik -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#laporanMenu" role="button" aria-expanded="false" aria-controls="laporanMenu">
                    <span><i class="fas fa-chart-line me-2"></i> Laporan & Statistik</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="laporanMenu">
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="laporanKeuanganAtc()">Laporan Keuangan</a></li>
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="rekapAbsensi()">Rekap Absensi</a></li>
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="penilaianMasyarakatAtc()">Penilaian Masyarakat</a></li>
                </ul>
            </li>

            <!-- Kegiatan -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                    href="#kegiatanMenu" role="button" aria-expanded="false" aria-controls="kegiatanMenu">
                    <span><i class="fas fa-users me-2"></i> Kegiatan</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <ul class="collapse list-unstyled ps-3" id="kegiatanMenu">
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="kegiatanAtc()"><i class="fas fa-images me-2"></i> Foto Kegiatan</a></li>
                    <li><a class="nav-link py-1" href="javascript:void(0)" @click="videoKegiatanAtc()"><i class="fas fa-video me-2"></i> Video Kegiatan</a></li>
                </ul>
            </li>

            <!-- Setting & Logout -->
            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="javascript:void(0)" @click="settingAtc()"><i class="fas fa-cog me-2"></i> Setting</a></li>
            <li class="nav-item"><a class="nav-link d-flex align-items-center" href="{{ url('/auth/logout') }}"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>

        </ul>
    </aside>
</div>
@endif
