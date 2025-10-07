<!-- ✅ Tambahkan SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
var d = new Date();
var tahun = d.getFullYear();

// 📦 ROUTE ENDPOINTS
var rDashboard = server + "app/dashboard";
var rSantri = server + "app/santri";
var rPendaftaran = server + "app/pendaftaran";
var rPengurus = server + "app/pengurus";
var rPembayaranSpp = server + "app/pembayaran-spp";
var rBuktiBayar = server + "app/bukti-bayar";
var rAbsensi = server + "app/absensi";
var rSaldo = server + "app/saldo";
var rPenggajian = server + "app/penggajian";
var rPengeluaran = server + "app/pengeluaran";
var rDonasi = server + "app/donasi";
var rDonasiBarang = server + "app/donasi-barang";
var rCashFlow = server + "app/cash-flow";
var rLaporanKeuangan = server + "app/laporan-keuangan/" + tahun;
var rRekapAbsensi = server + "app/rekap-absensi";
var rPenilaianMasyarakat = server + "app/penilaian-masyarakat";
var rKegiatan = server + "app/kegiatan";
var rVideoKegiatan = server + "app/video-kegiatan";
var rSetting = server + "app/setting";

// 📘 VUE: Sidebar Menu
var menuApp = new Vue({
    el: "#divMenu",
    data: {
        activeMenu: "dashboard"
    },
    methods: {
        dashboardAtc() {
            this.activeMenu = "dashboard";
            load_page(rDashboard, "Dashboard");
        },
        santriAtc() {
            this.activeMenu = "santri";
            load_page(rSantri, "Santri");
        },
        pendaftaranSantriAtc() {
            this.activeMenu = "pendaftaran";
            load_page(rPendaftaran, "Pendaftaran Santri");
        },
        pengurusAtc() {
            this.activeMenu = "pengurus";
            load_page(rPengurus, "Pengurus");
        },
        pembayaranSppAtc() {
            this.activeMenu = "pembayaranSpp";
            load_page(rPembayaranSpp, "Pembayaran SPP");
        },
        buktiBayarAtc() {
            this.activeMenu = "buktiBayar";
            load_page(rBuktiBayar, "Bukti Pembayaran SPP");
        },
        absensiAtc() {
            this.activeMenu = "absensi";
            load_page(rAbsensi, "Absensi Santri");
        },
        saldoAtc() {
            this.activeMenu = "saldo";
            load_page(rSaldo, "Saldo");
        },
        penggajianAtc() {
            this.activeMenu = "penggajian";
            load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
        },
        pengeluaranAtc() {
            this.activeMenu = "pengeluaran";
            load_page(rPengeluaran, "Pengeluaran Operasional Tahfiz");
        },
        donasiAtc() {
            this.activeMenu = "donasi";
            load_page(rDonasi, "Uang");
        },
        donasiBarangAtc() {
            this.activeMenu = "donasiBarang";
            load_page(rDonasiBarang, "Barang");
        },
        cashFlowAtc() {
            this.activeMenu = "cashFlow";
            load_page(rCashFlow, "Cash Flow");
        },
        laporanKeuanganAtc() {
            this.activeMenu = "laporanKeuangan";
            load_page(rLaporanKeuangan, "Laporan Keuangan");
        },
        rekapAbsensi() {
            this.activeMenu = "rekapAbsensi";
            load_page(rRekapAbsensi, "Rekap Absensi");
        },
        penilaianMasyarakatAtc() {
            this.activeMenu = "penilaianMasyarakat";
            load_page(rPenilaianMasyarakat, "Penilaian Masyarakat");
        },
        kegiatanAtc() {
            this.activeMenu = "kegiatan";
            load_page(rKegiatan, "Foto Kegiatan");
        },
        videoKegiatanAtc() {
            this.activeMenu = "videoKegiatan";
            load_page(rVideoKegiatan, "Video Kegiatan");
        },
        settingAtc() {
            this.activeMenu = "setting";
            load_page(rSetting, "Setting");
        },
    },
});

// 📘 VUE: Main Layout
var mainApp = new Vue({
    el: "#divMain",
    data: {
        titleSection: "Dashboard",
    },
});

// 📥 Load Halaman Pertama
load_page(rDashboard, "Dashboard");

// 🔄 Fungsi Umum
async function load_page(page, page_title, el_div = "#divUtama") {
    NProgress.start();
    document.querySelector(el_div).innerHTML =
        "<div style='text-align:center;width:100%;margin-top:40px;font-size:20px;'>Loading page ...</div>";
    mainApp.titleSection = page_title;
    await tidur_bentar(1000);
    $(el_div).load(page);
    NProgress.done();
}

function tidur_bentar(ms) {
    return new Promise((resolve) => {
        setTimeout(resolve, ms);
    });
}

function pesanUmumApp(icon, title, text) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
    });
}

function confirmQuest(icon, title, text, x) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            x();
        }
    });
}

// 🚪 Logout SweetAlert
document.addEventListener('DOMContentLoaded', function() {
    var logoutBtn = document.getElementById('btnLogout');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Sesi Anda akan berakhir.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        });
    }
});
</script>
