@if (Auth::check())
<div class="main-sidebar shadow" id="divMenu">
    <aside id="sidebar-wrapper">
        <!-- Brand -->
        <div class="sidebar-brand text-center py-4">
            <a href="javascript:void(0)">
                <img src="{{ asset('ladun/stisla/img/sjam.jpg') }}" class="img-fluid" style="max-width: 120px;">
            </a>
        </div>

        <!-- Menu -->
        <ul class="sidebar-menu mt-3">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link" @click="dashboardAtc()" href="javascript:void(0)">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Absensi & Pembayaran -->
            <li class="nav-item">
                <a class="nav-link" @click="absensiAtc()" href="javascript:void(0)">
                    <i class="fas fa-calendar-check"></i>
                    <span>Absensi Harian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click="pembayaranSppAtc()" href="javascript:void(0)">
                    <i class="fas fa-credit-card"></i>
                    <span>Pembayaran SPP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click="buktiBayarAtc()" href="javascript:void(0)">
                    <i class="fas fa-receipt"></i>
                    <span>Bukti Pembayaran SPP</span>
                </a>
            </li>

            <!-- Data Master -->
            <li class="nav-item dropdown">
                <a class="nav-link has-dropdown" href="#" data-bs-toggle="collapse" data-bs-target="#dataMaster">
                    <i class="fas fa-database"></i>
                    <span>Data Master</span>
                    <i class="fas fa-chevron-down float-end"></i>
                </a>
                <ul class="collapse dropdown-menu" id="dataMaster">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="santriAtc()">Santri</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="pendaftaranSantriAtc()">Pendaftaran Santri</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="pengurusAtc()">Pengurus</a></li>
                </ul>
            </li>

            @if (Auth::user()->role != '2')
            <!-- Keuangan -->
            <li class="nav-item dropdown">
                <a class="nav-link has-dropdown" href="#" data-bs-toggle="collapse" data-bs-target="#keuanganMenu">
                    <i class="fas fa-wallet"></i>
                    <span>Keuangan</span>
                    <i class="fas fa-chevron-down float-end"></i>
                </a>
                <ul class="collapse dropdown-menu" id="keuanganMenu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="saldoAtc()">Saldo</a></li>

                    <!-- Pengeluaran -->
                    <li class="dropdown">
                        <a class="dropdown-item has-dropdown" href="#" data-bs-toggle="collapse" data-bs-target="#pengeluaranMenu">
                            Pengeluaran <i class="fas fa-chevron-down float-end"></i>
                        </a>
                        <ul class="collapse dropdown-menu" id="pengeluaranMenu">
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="penggajianAtc()">Penggajian</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="pengeluaranAtc()">Operasional</a></li>
                        </ul>
                    </li>

                    <!-- Donasi/Infaq -->
                    <li class="dropdown">
                        <a class="dropdown-item has-dropdown" href="#" data-bs-toggle="collapse" data-bs-target="#donasiMenu">
                            Pemasukkan Donasi/Infaq <i class="fas fa-chevron-down float-end"></i>
                        </a>
                        <ul class="collapse dropdown-menu" id="donasiMenu">
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="donasiAtc()">Uang</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="donasiBarangAtc()">Barang</a></li>
                        </ul>
                    </li>

                    <li><a class="dropdown-item" href="javascript:void(0)" @click="cashFlowAtc()">Cash Flow</a></li>
                </ul>
            </li>
            @endif

            <!-- Laporan & Statistik -->
            <li class="nav-item dropdown">
                <a class="nav-link has-dropdown" href="#" data-bs-toggle="collapse" data-bs-target="#laporanMenu">
                    <i class="fas fa-chart-line"></i>
                    <span>Laporan & Statistik</span>
                    <i class="fas fa-chevron-down float-end"></i>
                </a>
                <ul class="collapse dropdown-menu" id="laporanMenu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="laporanKeuanganAtc()">Laporan Keuangan</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="rekapAbsensi()">Rekap Absensi</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="penilaianMasyarakatAtc()">Penilaian Masyarakat</a></li>
                </ul>
            </li>

            <!-- Kegiatan -->
            <li class="nav-item dropdown">
                <a class="nav-link has-dropdown" href="#" data-bs-toggle="collapse" data-bs-target="#kegiatanMenu">
                    <i class="fas fa-users"></i>
                    <span>Kegiatan</span>
                    <i class="fas fa-chevron-down float-end"></i>
                </a>
                <ul class="collapse dropdown-menu" id="kegiatanMenu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="kegiatanAtc()"><i class="fas fa-images"></i> Foto Kegiatan</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="videoKegiatanAtc()"><i class="fas fa-video"></i> Video Kegiatan</a></li>
                </ul>
            </li>

            <!-- Setting & Logout -->
            <li class="nav-item"><a class="nav-link" href="javascript:void(0)" @click="settingAtc()"><i class="fas fa-cog"></i> Setting</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/auth/logout') }}"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
    </aside>
</div>
@endif
