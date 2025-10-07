@if (Auth::check())
<div class="main-sidebar shadow" id="divMenu">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="javascript:void(0)" style="height:30px;">
                <img src="{{ asset('ladun/stisla/img/sjam.jpg') }}" style="width: 100px; margin-top:20px; margin-bottom:50px;">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="javascript:void(0)"></a>
        </div>

        {{-- Sidebar Menu --}}
        <ul class="sidebar-menu mt-4">
            <li>
                <a class="nav-link" 
                   :class="{ active: activeMenu === 'dashboard' }" 
                   @click="dashboardAtc()" 
                   href="javascript:void(0)">
                   <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="nav-link" 
                   :class="{ active: activeMenu === 'absensi' }" 
                   @click="absensiAtc()" 
                   href="javascript:void(0)">
                   <i class="fas fa-chart-bar"></i> <span>Absensi Harian</span>
                </a>
            </li>
            <li>
                <a class="nav-link" 
                   :class="{ active: activeMenu === 'pembayaranSpp' }" 
                   @click="pembayaranSppAtc()" 
                   href="javascript:void(0)">
                   <i class="fas fa-chart-bar"></i> <span>Pembayaran SPP</span>
                </a>
            </li>
            <li>
                <a class="nav-link" 
                   :class="{ active: activeMenu === 'buktiBayar' }" 
                   @click="buktiBayarAtc()" 
                   href="javascript:void(0)">
                   <i class="fas fa-chart-bar"></i> <span>Bukti Pembayaran SPP</span>
                </a>
            </li>

            {{-- Data Master --}}
            <li class="dropdown">
                <a href="javascript:void(0)" 
                   class="nav-link has-dropdown" 
                   :class="{ active: activeMenu.startsWith('dataMaster') }"
                   data-toggle="dropdown">
                    <i class="fas fa-database"></i> <span>Data Master</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" :class="{ active: activeMenu === 'santri' }" href="javascript:void(0)" @click="santriAtc()">Santri</a></li>
                    <li><a class="nav-link" :class="{ active: activeMenu === 'pendaftaran' }" href="javascript:void(0)" @click="pendaftaranSantriAtc()">Pendaftaran Santri</a></li>
                    <li><a class="nav-link" :class="{ active: activeMenu === 'pengurus' }" href="javascript:void(0)" @click="pengurusAtc()">Pengurus</a></li>
                </ul>
            </li>

            {{-- Keuangan --}}
            @if (Auth::user()->role != '2')
            <li class="dropdown">
                <a href="javascript:void(0)" class="nav-link has-dropdown" :class="{ active: activeMenu.startsWith('keuangan') }" data-toggle="dropdown">
                    <i class="fas fa-newspaper"></i> <span>Keuangan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" :class="{ active: activeMenu === 'saldo' }" href="javascript:void(0)" @click="saldoAtc()">Saldo</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="nav-link has-dropdown">Pengeluaran</a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" :class="{ active: activeMenu === 'penggajian' }" href="javascript:void(0)" @click="penggajianAtc()">Penggajian</a></li>
                            <li><a class="nav-link" :class="{ active: activeMenu === 'pengeluaran' }" href="javascript:void(0)" @click="pengeluaranAtc()">Operasional</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="nav-link has-dropdown">Pemasukkan Donasi/Infaq</a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" :class="{ active: activeMenu === 'donasi' }" href="javascript:void(0)" @click="donasiAtc()">Uang</a></li>
                            <li><a class="nav-link" :class="{ active: activeMenu === 'donasiBarang' }" href="javascript:void(0)" @click="donasiBarangAtc()">Barang</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link" :class="{ active: activeMenu === 'cashFlow' }" href="javascript:void(0)" @click="cashFlowAtc()">Cash Flow</a></li>
                </ul>
            </li>
            @endif

            {{-- Laporan & Statistik --}}
            <li class="dropdown">
                <a href="javascript:void(0)" class="nav-link has-dropdown" :class="{ active: activeMenu.startsWith('laporan') }" data-toggle="dropdown">
                    <i class="fas fa-newspaper"></i> <span>Laporan & Statistik</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" :class="{ active: activeMenu === 'laporanKeuangan' }" href="javascript:void(0)" @click="laporanKeuanganAtc()">Laporan Keuangan</a></li>
                    <li><a class="nav-link" :class="{ active: activeMenu === 'rekapAbsensi' }" href="javascript:void(0)" @click="rekapAbsensi()">Rekap Absensi</a></li>
                    <li><a class="nav-link" :class="{ active: activeMenu === 'penilaianMasyarakat' }" href="javascript:void(0)" @click="penilaianMasyarakatAtc()">Penilaian Masyarakat</a></li>
                </ul>
            </li>

            {{-- Kegiatan --}}
            <li class="dropdown">
                <a href="javascript:void(0)" class="nav-link has-dropdown" :class="{ active: activeMenu.startsWith('kegiatan') }" data-toggle="dropdown">
                    <i class="fas fa-users"></i> <span>Kegiatan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" :class="{ active: activeMenu === 'kegiatan' }" href="javascript:void(0)" @click="kegiatanAtc()"><i class="fas fa-images"></i> Foto Kegiatan</a></li>
                    <li><a class="nav-link" :class="{ active: activeMenu === 'videoKegiatan' }" href="javascript:void(0)" @click="videoKegiatanAtc()"><i class="fas fa-video"></i> Video Kegiatan</a></li>
                </ul>
            </li>

            {{-- Setting --}}
            <li>
                <a class="nav-link" :class="{ active: activeMenu === 'setting' }" href="javascript:void(0)" @click="settingAtc()">
                    <i class="fas fa-cog"></i> <span>Setting</span>
                </a>
            </li>

            {{-- Logout --}}
            <li>
                <a class="nav-link" href="/logout" id="btnLogout">
    <i class="fas fa-sign-out-alt"></i> <span>Log Out</span>
</a>
            </li>
        </ul>
    </aside>
</div>
@endif
