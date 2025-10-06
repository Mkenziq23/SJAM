// route
var rProsesPengeluaran = "app/pengeluaran/tambah";
var rProsesHapusPengeluaran = "app/pengeluaran/hapus";

// vue object
var appExpend = new Vue({
    el: "#divPengeluaran",
    data: {},
    methods: {
        clearForm: function () {
        document.querySelector("#txtNama").value = "";
        document.querySelector("#txtDeks").value = "";
        document.querySelector("#txtKategori").value = "";
        document.querySelector("#txtNominal").value = "";
        document.querySelector("#txtTanggalPengeluaran").value = "";
        },
        tambahPengeluaranAtc: function () {
            $("#divDataPengeluaran").hide();
            $("#divAddPengeluaran").show();

            // reset form
            document.querySelector("#txtNama").value = "";
            document.querySelector("#txtDeks").value = "";
            document.querySelector("#txtKategori").value = "";
            document.querySelector("#txtNominal").value = "";
            document.querySelector("#txtTanggalPengeluaran").value = "";
        },
        prosesPengeluaranAtc: function () {
            let nama = document.querySelector("#txtNama").value;
            let deks = document.querySelector("#txtDeks").value;
            let kategori = document.querySelector("#txtKategori").value;
            let nominal = document.querySelector("#txtNominal").value.replace(/\D/g, '');
            let tgl = document.querySelector("#txtTanggalPengeluaran").value;

            if(!nama || !deks || !kategori || !nominal || !tgl){
                pesanUmumApp("warning", "Peringatan", "Semua field harus diisi");
                return;
            }

            let ds = {
                nama: nama,
                deks: deks,
                kategori: kategori,
                nominal: nominal,
                tgl: tgl,
            };
            axios.post(rProsesPengeluaran, ds).then(function (res) {
                pesanUmumApp("success", "Sukses", "Berhasil menambah pengeluaran");
                load_page(rPengeluaran, "Pengeluaran Tahfiz");
            });
        },
        kembaliAtc: function () {
            load_page(rPengeluaran, "Pengeluaran Tahfiz");
        },
        hapusAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi",
                "Hapus data pengeluaran ...?",
                function (x) {
                    konfirmasiHapus(token);
                }
            );
        },
        formatNominalAtc: function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if(value === '') value = 0;
            e.target.value = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(value);
        }
    },
    mounted: function () {
        // inisialisasi DataTable
        $("#tblPengeluaran").dataTable();

        // attach format Rupiah
        let nominalInput = document.querySelector("#txtNominal");
        if(nominalInput){
            nominalInput.addEventListener("input", this.formatNominalAtc);
        }
    }
});

function konfirmasiHapus(token) {
    let ds = { token: token };
    axios.post(rProsesHapusPengeluaran, ds).then(function (res) {
        pesanUmumApp("success", "Sukses", "Berhasil menghapus pengeluaran");
        load_page(rPengeluaran, "Pengeluaran Tahfiz");
    });
}
