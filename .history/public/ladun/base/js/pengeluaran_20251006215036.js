// route
var rProsesPengeluaran = "app/pengeluaran/tambah";
var rProsesHapusPengeluaran = "app/pengeluaran/hapus";

var appExpend = new Vue({
    el: "#divPengeluaran",
    data: {
        form: {
            nama: "",
            deks: "",
            kategori: "",
            nominal: "",
            tgl: ""
        }
    },
    methods: {
        // membuka form tambah
        tambahPengeluaranAtc: function () {
            $("#divDataPengeluaran").hide();
            $("#divAddPengeluaran").show();
            this.clearForm();
        },

        // clear form
        clearForm: function () {
            this.form.nama = "";
            this.form.deks = "";
            this.form.kategori = "";
            this.form.nominal = "";
            this.form.tgl = "";
        },

        // format nominal input
        formatNominalAtc: function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value === '') value = 0;
            this.form.nominal = new Intl.NumberFormat('id-ID', { 
                style: 'currency', 
                currency: 'IDR', 
                minimumFractionDigits: 0 
            }).format(value);
        },

        // proses pengeluaran
        prosesPengeluaranAtc: function () {
            let { nama, deks, kategori, nominal, tgl } = this.form;
            nominal = nominal.replace(/\D/g, ''); // ambil angka saja

            if(!nama || !deks || !kategori || !nominal || !tgl){
                pesanUmumApp("warning", "Peringatan", "Semua field harus diisi");
                return;
            }

            axios.post(rProsesPengeluaran, { nama, deks, kategori, nominal, tgl })
                .then(res => {
                    pesanUmumApp("success", "Sukses", "Berhasil menambah pengeluaran");
                    load_page(rPengeluaran, "Pengeluaran Tahfiz");
                });
        },

        kembaliAtc: function () {
            load_page(rPengeluaran, "Pengeluaran Tahfiz");
        },

        hapusAtc: function (token) {
            confirmQuest("warning", "Konfirmasi", "Hapus data pengeluaran ...?", function (x) {
                konfirmasiHapus(token);
            });
        }
    },
    mounted: function () {
        $("#tblPengeluaran").dataTable();
    }
});

function konfirmasiHapus(token) {
    axios.post(rProsesHapusPengeluaran, { token: token })
        .then(res => {
            pesanUmumApp("success", "Sukses", "Berhasil menghapus pengeluaran");
            load_page(rPengeluaran, "Pengeluaran Tahfiz");
        });
}
