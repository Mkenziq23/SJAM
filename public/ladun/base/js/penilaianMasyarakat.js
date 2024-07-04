var rProsesHapusPenilaianMasyarakat = server + "app/penilaian-masyarakat/hapus";
var appKegiatan = new Vue({
    el: "#divPenilaianMasyarakat",
    data: {},
    methods: {
        hapusAtc: function (id) {
            // Mengubah parameter dari 'token' menjadi 'id'
            confirmQuest(
                "warning",
                "Konfirmasi",
                "Hapus data penilaian ...?",
                function (x) {
                    konfirmasiHapus(id); // Mengirimkan id sebagai parameter
                }
            );
        },
    },
});

function konfirmasiHapus(id) {
    let ds = { token: id };
    axios
        .post(rProsesHapusPenilaianMasyarakat, ds)
        .then(function (res) {
            pesanUmumApp("success", "Sukses", "Berhasil menghapus penilaian");
            load_page(rPenilaianMasyarakat, "Penilaian Masyarakat");
        })
        .catch(function (error) {
            pesanUmumApp("error", "Error", "Gagal menghapus penilaian");
        });
}

$("#tblPenilaianMasyarakat").dataTable();
