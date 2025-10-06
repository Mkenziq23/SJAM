// route
var rProsesTambahDonasi = server + "app/donasi/tambah";
var rProsesHapusDonasi = server + "app/donasi/hapus";

// vue object
var appDonasi = new Vue({
    el: "#divDonasi",
    data: {},
    methods: {
        // tampilkan form tambah donasi
        tambahDonasiAtc: function () {
            $("#divDataDonasi").hide();
            $("#divTambahDonasi").show();
            document.querySelector("#txtNamaDonatur").focus();
        },

        // kembali ke tabel donasi
        kembaliAtc: function () {
            $("#divTambahDonasi").hide();
            $("#divDataDonasi").show();
        },

        // format input nominal saat mengetik
        formatNominal: function (event) {
            let value = event.target.value;
            // hapus semua non-digit
            let numeric = value.replace(/\D/g, '');
            // format ribuan dengan titik
            event.target.value = numeric.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        },

        // proses tambah donasi
        prosesTambahDonasiAtc: function () {
            let nama = document.querySelector("#txtNamaDonatur").value;
            let detail = document.querySelector("#txtDetail").value;
            let tipe = document.querySelector("#txtTipe").value;
            let nominal = document.querySelector("#txtNominal").value;
            let tgl = document.querySelector("#txtTanggalDonasi").value;

            // hapus titik agar menjadi angka murni
            let nominalNumber = parseInt(nominal.replace(/\./g, ''));

            let ds = {
                nama: nama,
                detail: detail,
                tipe: tipe,
                nominal: nominalNumber,
                tgl: tgl,
            };

            axios.post(rProsesTambahDonasi, ds).then(function (res) {
                pesanUmumApp(
                    "success",
                    "Sukses",
                    "Berhasil menambahkan data donasi ..."
                );
                load_page(rDonasi, "Donasi");
            }).catch(function (err) {
                pesanUmumApp(
                    "error",
                    "Gagal",
                    "Terjadi kesalahan saat menambahkan donasi"
                );
            });
        },

        // hapus donasi
        hapusAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi",
                "Hapus data donasi ...?",
                function (x) {
                    konfirmasiHapus(token);
                }
            );
        },

        // clear form
        clearForm: function () {
            document.querySelector("#txtNamaDonatur").value = "";
            document.querySelector("#txtDetail").value = "";
            document.querySelector("#txtTipe").value = "PERSEORANGAN";
            document.querySelector("#txtNominal").value = "";
            document.querySelector("#txtTanggalDonasi").value = "";
        },
    },
});

// inisialisasi datatable
$("#tblDonasi").dataTable();

// fungsi konfirmasi hapus
function konfirmasiHapus(token) {
    let ds = { token: token };
    axios.post(rProsesHapusDonasi, ds).then(function (res) {
        pesanUmumApp("success", "Sukses", "Berhasil menghapus data donasi ...");
        load_page(rDonasi, "Donasi");
    }).catch(function (err) {
        pesanUmumApp("error", "Gagal", "Terjadi kesalahan saat menghapus donasi");
    });
}

// event listener input nominal
document.querySelector("#txtNominal").addEventListener("input", function(event){
    appDonasi.formatNominal(event);
});
