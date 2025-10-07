var d = new Date();
var tahun = d.getFullYear();

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

// vue object
var menuApp = new Vue({
    el: "#divMenu",
    data: {
        activeMenu: "dashboard" // default aktif Dashboard
    },
    methods: {
        dashboardAtc: function () {
            this.activeMenu = "dashboard";
            load_page(rDashboard, "Dashboard");
        },
        santriAtc: function () {
            this.activeMenu = "santri";
            load_page(rSantri, "Santri");
        },
        pendaftaranSantriAtc: function () {
            this.activeMenu = "pendaftaran";
            load_page(rPendaftaran, "Pendaftaran Santri");
        },
        pengurusAtc: function () {
            this.activeMenu = "pengurus";
            load_page(rPengurus, "Pengurus");
        },
        pembayaranSppAtc: function () {
            this.activeMenu = "pembayaranSpp";
            load_page(rPembayaranSpp, "Pembayaran SPP");
        },
        buktiBayarAtc: function () {
            this.activeMenu = "buktiBayar";
            load_page(rBuktiBayar, "Bukti Pembayaran SPP");
        },
        absensiAtc: function () {
            this.activeMenu = "absensi";
            load_page(rAbsensi, "Absensi Santri");
        },
        saldoAtc: function () {
            this.activeMenu = "saldo";
            load_page(rSaldo, "Saldo");
        },
        penggajianAtc: function () {
            this.activeMenu = "penggajian";
            load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
        },
        pengeluaranAtc: function () {
            this.activeMenu = "pengeluaran";
            load_page(rPengeluaran, "Pengeluaran Operasional Tahfiz");
        },
        donasiAtc: function () {
            this.activeMenu = "donasi";
            load_page(rDonasi, "Uang");
        },
        donasiBarangAtc: function () {
            this.activeMenu = "donasiBarang";
            load_page(rDonasiBarang, "Barang");
        },
        cashFlowAtc: function () {
            this.activeMenu = "cashFlow";
            load_page(rCashFlow, "Cash Flow");
        },
        laporanKeuanganAtc: function () {
            this.activeMenu = "laporanKeuangan";
            load_page(rLaporanKeuangan, "Laporan Keuangan");
        },
        rekapAbsensi: function () {
            this.activeMenu = "rekapAbsensi";
            load_page(rRekapAbsensi, "Rekap Absensi");
        },
        penilaianMasyarakatAtc: function () {
            this.activeMenu = "penilaianMasyarakat";
            load_page(rPenilaianMasyarakat, "Penilaian Masyarakat");
        },
        kegiatanAtc: function () {
            this.activeMenu = "kegiatan";
            load_page(rKegiatan, "Foto Kegiatan");
        },
        videoKegiatanAtc: function () {
            this.activeMenu = "videoKegiatan";
            load_page(rVideoKegiatan, "Video Kegiatan");
        },
        settingAtc: function () {
            this.activeMenu = "setting";
            load_page(rSetting, "Setting");
        },
    },
});

var mainApp = new Vue({
    el: "#divMain",
    data: {
        titleSection: "Dashboard",
    },
});
// inisialisasi
load_page(rDashboard, "Dashboard");

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

Swal.fire({
    icon: 'success',
    title: 'Logout Berhasil',
    text: '{{ session("success") }}',
    showConfirmButton: false,
    timer: 2000
});
