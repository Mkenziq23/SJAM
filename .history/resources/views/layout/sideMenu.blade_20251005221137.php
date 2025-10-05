@if (Auth::check())
    <div class="main-sidebar shadow" id="divMenu">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="javascript:void(0)" style="height:30px;">
                    <img src="{{ asset('ladun') }}/stisla/img/sjam.jpg"
                        style="width: 100px;margin-top:20px; margin-bottom:20px;">
                </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="javascript:void(0)"></a>
            </div>
            <ul class="sidebar-menu" style="margin-top:20px;">
                <li><a class="nav-link" @click="dashboardAtc()" href="javascript:void(0)"><i
                            class="fas fa-home"></i><span>Dashboard</span></a></li>
                <li><a class="nav-link" @click="absensiAtc()" href="javascript:void(0)"><i
                            class="fas fa-chart-bar"></i><span>Absensi Harian</span></a></li>
                <li><a class="nav-link" @click="pembayaranSppAtc()" href="javascript:void(0)"><i
                            class="fas fa-chart-bar"></i><span>Pembayaran SPP</span></a></li>
                <li><a class="nav-link" @click="buktiBayarAtc()" href="javascript:void(0)"><i
                            class="fas fa-chart-bar"></i><span>Bukti Pembayaran SPP</span></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Data Master</span> <span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="javascript:void(0)" @click="santriAtc()">Santri</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" @click="pendaftaranSantriAtc()">Pendaftaran
                                Santri</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" @click="pengurusAtc()">Pengurus</a></li>
                    </ul>
                </li>
                @if (Auth::user()->role != '2')
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                class="fas fa-newspaper"></i> <span>Keuangan</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="javascript:void(0)" @click="saldoAtc()">Saldo</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="nav-link has-dropdown"
                                    data-toggle="dropdown">Pengeluaran</a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="javascript:void(0)"
                                            @click="penggajianAtc()">Penggajian</a></li>
                                    <li><a class="nav-link" href="javascript:void(0)"
                                            @click="pengeluaranAtc()">Operasional</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="nav-link has-dropdown"
                                    data-toggle="dropdown">Pemasukkan Donasi/Infaq</a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="javascript:void(0)" @click="donasiAtc()">Uang</a></li>
                                    <li><a class="nav-link" href="javascript:void(0)"
                                            @click="donasiBarangAtc()">Barang</a></li>
                                </ul>
                            </li>
                            <li><a class="nav-link" href="javascript:void(0)" @click="cashFlowAtc()">Cash Flow</a></li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-newspaper"></i> <span>Laporan & Statistik</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="javascript:void(0)" @click="laporanKeuanganAtc()">Laporan
                                Keuangan</a>
                        <li><a class="nav-link" href="javascript:void(0)" @click="rekapAbsensi()">Rekap Absensi</a></li>
                        <li><a class="nav-link" href="javascript:void(0)" @click="penilaianMasyarakatAtc()">Penilaian
                                Masyarakat</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-users"></i <span>Kegiatan</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="javascript:void(0)" @click="kegiatanAtc()"><i
                                    class="fas fa-images"></i> <span>Foto
                                    Kegiatan</span></a></li>
                        <li><a class="nav-link" href="javascript:void(0)" @click="videoKegiatanAtc()"><i
                                    class="fas fa-video"></i> <span>Video Kegiatan</span></a></li>
                    </ul>
                </li>

                <li><a class="nav-link" href="javascript:void(0)" @click="settingAtc()"><i
                            class="fas fa-cog"></i><span>Setting</span></a></li>
                <li><a class="nav-link" href="{{ url('/auth/logout') }}"><i class="fas fa-sign-out-alt"></i><span>Log
                            Out</span></a></li>
            </ul>
        </aside>
    </div>
@endif
