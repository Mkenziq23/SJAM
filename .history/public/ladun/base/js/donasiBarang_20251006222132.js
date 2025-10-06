// route
var rProsesTambahDonasiBarang = server + "app/donasi-barang/tambah";
var rProsesHapusDonasiBarang = server + "app/donasi-barang/hapus";
// vue object
var appDonasi = new Vue({
    el: "#divDonasiBarang",
    data: {},
    methods: {
        tambahDonasiBarangAtc: function () {
            $("#divDataDonasiBarang").hide();
            $("#divTambahDonasiBarang").show();
            document.querySelector("#txtNamaDonatur").focus();
        },
        kembaliAtc: function () {
            $("#divTambahDonasiBarang").hide();
            $("#divDataDonasiBarang").show();
        },

        prosesTambahDonasiBarangAtc: function () {
            let nama = document.querySelector("#txtNamaDonatur").value;
            let namabarang = document.querySelector("#txtNamaBarang").value;
            let tipe = document.querySelector("#txtTipe").value;
            let jumlah = document.querySelector("#txtJumlah").value;
            let tgl = document.querySelector("#txtTanggalDonasi").value;
            let ds = {
                nama: nama,
                namabarang: namabarang,
                tipe: tipe,
                jumlah: jumlah,
                tgl: tgl,
            };
            axios.post(rProsesTambahDonasiBarang, ds).then(function (res) {
                pesanUmumApp(
                    "success",
                    "Sukses",
                    "Berhasil menambahkan data donasi barang ..."
                );
                load_page(rDonasiBarang, "Barang");
            });
        },
        hapusAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi",
                "Hapus data donasi barang ...?",
                function (x) {
                    konfirmasiHapus(token);
                }
            );
        },
        clearForm: function () {
            document.querySelector("#txtNamaDonatur").value = "";
            document.querySelector("#txtNamaBarang").value = "";
            document.querySelector("#txtTipe").value = "";
            document.querySelector("#txtJumlah").value = "";
            document.querySelector("#txtTanggalDonasi").value = "";
        },
    },
    mounted: function() {
        $("#tblDonasiBarang").dataTable();

        // attach event input format nominal
        let nominalInput = document.querySelector("#txtNominal");
        if(nominalInput){
            nominalInput.addEventListener("input", this.formatNominalAtc);
        }
    },
});
// inisialisasi
$("#tblDonasiBarang").dataTable();

function konfirmasiHapus(token) {
    let ds = { token: token };
    axios.post(rProsesHapusDonasiBarang, ds).then(function (res) {
        pesanUmumApp("success", "Sukses", "Berhasil menghapus data donasi ...");
        load_page(rDonasiBarang, "Barang");
    });
}
