var rProsesAbsensi = server + "app/absensi/add";
var rProsesHapusAbsensi = server + "app/absensi/delete";
// vue object
var appAbsensi = new Vue({
    el: "#divAbsensi",
    data: {},
    methods: {
        tambahAbsensiAtc: function () {
            $("#divDataAbsensi").hide();
            $("#divTambahAbsensi").show();
        },
        setAbsensiAtc: function (idSantri, tipe, nilai) {
            let ds = { idSantri: idSantri, tipe: tipe, nilai: nilai ? 1 : 0 };
            axios.post(rProsesAbsensi, ds).then(function (res) {
                iziToast.success({
                    title: "Sukses",
                    message: "Status " + tipe + " berhasil diubah",
                    position: "topRight",
                });
            });
        },
        hapusAbsensiAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi ...",
                "Hapus absensi? menghapus absensi akan mengembalikan status ketidakhadiran santri ...",
                function (x) {
                    konfirmasiHapus(token);
                }
            );
        },
        kembaliAtc: function () {
            load_page(rAbsensi, "Absensi Santri");
        },
    },
});

$("#tblAbsensi").dataTable();
$("#tblDataSantri").dataTable();

function konfirmasiHapus(token) {
    let dr = { token: token };
    axios.post(rProsesHapusAbsensi, dr).then(function (res) {
        pesanUmumApp(
            "success",
            "Sukses",
            "Berhasil menghapus data absensi santri ..."
        );
        load_page(rAbsensi, "Absensi Santri");
    });
}
