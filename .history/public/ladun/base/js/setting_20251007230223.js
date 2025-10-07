// route
var rGetDataSetting = server + "app/setting/get-data";
var rProsesUpdateSetting = server + "app/setting/update";

// vue object
var appSetting = new Vue({
    el: "#divDataSetting",
    data: {},
    methods: {
        // Fungsi edit
        editAtc: function (id) {
            let ds = { id: id };
            axios.post(rGetDataSetting, ds).then(function (res) {
                document.querySelector("#txtNamaSetting").value = res.data.dataSetting.nama_setting;
                document.querySelector("#txtNilaiSetting").value = res.data.dataSetting.value;

                // Transisi halus ke tampilan edit
                $("#divDataSetting").fadeOut(300, function () {
                    $("#divEditDataSetting").fadeIn(400);
                    document.querySelector("#txtNilaiSetting").focus();
                });
            });
        },

        // Fungsi kembali
        kembaliAtc: function () {
            $("#divEditDataSetting").fadeOut(300, function () {
                $("#divDataSetting").fadeIn(400);
            });
        },
    },
});

// Inisialisasi datatable
$("#tblDataSetting").dataTable();

// Fungsi update setting
function updateProsesAtc() {
    let nama = document.querySelector("#txtNamaSetting").value;
    let nilai = document.querySelector("#txtNilaiSetting").value;

    if (nama === "" || nilai === "") {
        pesanUmumApp("warning", "Isi field !!!", "Harap isi semua field !!!");
    } else {
        let ds = { nama: nama, nilai: nilai };
        confirmQuest("info", "Konfirmasi", "Edit setting data website ...?", function (x) {
            updateConfirm(ds);
        });
    }
}

function updateConfirm(ds) {
    axios.post(rProsesUpdateSetting, ds).then(function (res) {
        pesanUmumApp("success", "Sukses", "Berhasil mengupdate data setting");
        load_page(rSetting, "Setting");
    });
}
