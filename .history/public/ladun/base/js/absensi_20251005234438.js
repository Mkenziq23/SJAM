var rProsesAbsensi = server + "app/absensi/add";
var rProsesHapusAbsensi = server + "app/absensi/delete";

var appAbsensi = new Vue({
    el: "#divAbsensi",
    data: {},
    methods: {
        tambahAbsensiAtc: function () {
            $("#divDataAbsensi").hide();
            $("#divTambahAbsensi").show();
        },
        setAbsensiAtc: function (idSantri, status, namaSantri) {
            let ds = { idSantri: idSantri, active: status };
            axios.post(rProsesAbsensi, ds).then(function (res) {
                let obj = res.data;
                let msg = (obj.status=="INSERT") ?
                    "Berhasil menambahkan absensi santri ("+namaSantri+")" :
                    "Berhasil mengubah absensi santri ("+namaSantri+")";
                iziToast.success({ title: "Sukses", message: msg, position: "topRight" });
            });
        },
        hapusAbsensiAtc: function (token) {
            if(confirm("Hapus absensi? Status santri akan kembali Alfa.")) {
                konfirmasiHapus(token);
            }
        },
        kembaliAtc: function () {
            $("#divTambahAbsensi").hide();
            $("#divDataAbsensi").show();
        },
    }
});

$("#tblAbsensi, #tblDataSantri").dataTable();

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
