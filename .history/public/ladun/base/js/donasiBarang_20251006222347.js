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
            this.clearForm();
            document.querySelector("#txtNamaDonatur").focus();
        },
        kembaliAtc: function () {
            $("#divTambahDonasiBarang").hide();
            $("#divDataDonasiBarang").show();
        },
        prosesTambahDonasiBarangAtc: function () {
            let nama = document.querySelector("#txtNamaDonatur").value.trim();
            let namabarang = document.querySelector("#txtNamaBarang").value.trim();
            let tipe = document.querySelector("#txtTipe").value;
            let jumlah = document.querySelector("#txtJumlah").value.replace(/\D/g, '');
            let tgl = document.querySelector("#txtTanggalDonasi").value;

            if (!nama || !namabarang || !tipe || !jumlah || !tgl) {
                pesanUmumApp("warning", "Peringatan", "Semua field harus diisi");
                return;
            }

            let ds = { nama, namabarang, tipe, jumlah, tgl };
            axios.post(rProsesTambahDonasiBarang, ds).then(function (res) {
                pesanUmumApp("success", "Sukses", "Berhasil menambahkan data donasi barang ...");
                load_page(rDonasiBarang, "Barang");
            });
        },
        hapusAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi",
                "Hapus data donasi barang ...?",
                function () {
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
        formatNominalAtc: function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value === '') value = '0';
            e.target.value = new Intl.NumberFormat('id-ID').format(value);
        }
    },
    mounted: function() {
        $("#tblDonasiBarang").dataTable();

        // attach format jumlah otomatis
        let jumlahInput = document.querySelector("#txtJumlah");
        if (jumlahInput) {
            jumlahInput.addEventListener("input", this.formatNominalAtc);
        }
    },
});

// konfirmasi hapus
function konfirmasiHapus(token) {
    let ds = { token: token };
    axios.post(rProsesHapusDonasiBarang, ds).then(function (res) {
        pesanUmumApp("success", "Sukses", "Berhasil menghapus data donasi ...");
        load_page(rDonasiBarang, "Barang");
    });
}
