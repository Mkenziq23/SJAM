@if (Auth::check())
<div class="main-sidebar shadow" id="divMenu">
    <aside id="sidebar-wrapper">
        <!-- Logo -->
        <div class="sidebar-brand">
            <a href="javascript:void(0)">
                <img src="{{ asset('ladun/stisla/img/sjam.jpg') }}" alt="Logo"
                     style="width: 120px; margin: 20px auto; display: block;">
            </a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="javascript:void(0)">SJ</a>
        </div>

        <!-- Menu -->
        <ul class="sidebar-menu mt-4">
            <li class="nav-item">
                <a class="nav-link" @click="dashboardAtc()" href="javascript:void(0)">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click="absensiAtc()" href="javascript:void(0)">
                    <i class="fas fa-chart-bar"></i> <span>Absensi Harian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click="pembayaranSppAtc()" href="javascript:void(0)">
                    <i class="fas fa-money-bill-wave"></i> <span>Pembayaran SPP</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" @click="buktiBayarAtc()" href="javascript:void(0)">
                    <i class="fas fa-file-invoice"></i> <span>Bukti Pembayaran SPP</span>
                </a>
            </li>

            <!-- Data Master -->
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-database"></i> <span>Data Master</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="santriAtc()">Santri</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="pendaftaranSantriAtc()">Pendaftaran Santri</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="pengurusAtc()">Pengurus</a></li>
                </ul>
            </li>

            <!-- Keuangan -->
            @if (Auth::user()->role != '2')
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-wallet"></i> <span>Keuangan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="saldoAtc()">Saldo</a></li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Pengeluaran</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="penggajianAtc()">Penggajian</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0)" @click="pengeluaranAtc()">Operasional</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="javascript:void(0)">Pemasukkan Donasi/Infaq</a>
                        <ul class="dropdown-menu">
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
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-chart-line"></i> <span>Laporan & Statistik</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="laporanKeuanganAtc()">Laporan Keuangan</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="rekapAbsensi()">Rekap Absensi</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="penilaianMasyarakatAtc()">Penilaian Masyarakat</a></li>
                </ul>
            </li>

            <!-- Kegiatan -->
            <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-users"></i> <span>Kegiatan</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="kegiatanAtc()">Foto Kegiatan</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)" @click="videoKegiatanAtc()">Video Kegiatan</a></li>
                </ul>
            </li>

            <!-- Setting & Logout -->
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" @click="settingAtc()"><i class="fas fa-cog"></i> <span>Setting</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/auth/logout') }}"><i class="fas fa-sign-out-alt"></i> <span>Log Out</span></a>
            </li>
        </ul>
    </aside>
</div>

<!-- Tambahkan CSS untuk submenu dropdown -->
<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-left: 0.1rem;
        margin-right: 0.1rem;
    }

    .sidebar-menu .nav-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sidebar-menu .nav-link i {
        width: 25px;
    }
</style>

<!-- Tambahkan JS untuk dropdown submenu -->
<script>
    document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const submenu = this.nextElementSibling;
            if (submenu) submenu.classList.toggle('show');
        });
    });
</script>
@endif
