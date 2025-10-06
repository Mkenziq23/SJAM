// route
var rProsesTambahKegiatan = server + "app/kegiatan/tambah";
var rProsesEditKegiatan = server + "app/kegiatan/edit";
var rProsesHapusKegiatan = server + "app/kegiatan/hapus";

// vue object
var appKegiatan = new Vue({
    el: "#divKegiatan",
    data: {
        editId: null,
    },
    methods: {
        tambahKegiatanAtc: function () {
            $("#divDataKegiatan").hide();
            $("#divTambahKegiatan").show();
            document.querySelector("#txtNamaKegiatan").focus();
            // Reset preview image
            document.querySelector("#addImagePreview").src = "";
            document.querySelector("#txtFotoKegiatan").value = "";
        },
        kembaliAtc: function () {
            $("#divTambahKegiatan").hide();
            $("#divEditKegiatan").hide();
            $("#divDataKegiatan").show();
        },
        prosesTambahKegiatanAtc: function () {
            let nama = document.querySelector("#txtNamaKegiatan").value;
            let tgl = document.querySelector("#txtTanggalKegiatan").value;
            let tempat = document.querySelector("#txtTempatKegiatan").value;
            let image = document.querySelector("#txtFotoKegiatan").files[0];

            let formData = new FormData();
            formData.append("nama", nama);
            formData.append("tgl", tgl);
            formData.append("tempat", tempat);
            formData.append("image", image);

            axios
                .post(rProsesTambahKegiatan, formData, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then(function (res) {
                    pesanUmumApp("success", "Sukses", res.data.message);
                    load_page(rKegiatan, "Kegiatan");
                })
                .catch(function (error) {
                    pesanUmumApp("error", "Error", error.response.data.message);
                });
        },
        editKegiatanAtc: function (id) {
            axios.get(`${server}app/kegiatan/${id}`).then((response) => {
                const data = response.data;
                this.editId = id;

                document.querySelector("#txtEditNamaKegiatan").value = data.nama_kegiatan;
                document.querySelector("#txtEditTanggalKegiatan").value = data.tanggal_kegiatan;
                document.querySelector("#txtEditTempatKegiatan").value = data.tempat_kegiatan;

                // Preview image
                let imgPreview = document.querySelector("#editImagePreview");
                if (data.image) {
                    imgPreview.src = `${server}storage/${data.image}`;
                } else {
                    imgPreview.src = ""; // kosongkan jika tidak ada image
                }

                // Reset input file
                document.querySelector("#txtEditFotoKegiatan").value = "";

                $("#divDataKegiatan").hide();
                $("#divEditKegiatan").show();
            });
        },
        prosesEditKegiatanAtc: function () {
            let id = this.editId;
            let nama = document.querySelector("#txtEditNamaKegiatan").value;
            let tgl = document.querySelector("#txtEditTanggalKegiatan").value;
            let tempat = document.querySelector("#txtEditTempatKegiatan").value;
            let image = document.querySelector("#txtEditFotoKegiatan").files[0];

            let formData = new FormData();
            formData.append("id", id);
            formData.append("nama", nama);
            formData.append("tgl", tgl);
            formData.append("tempat", tempat);
            if (image) {
                formData.append("image", image);
            }

            axios
                .post(rProsesEditKegiatan, formData, {
                    headers: { "Content-Type": "multipart/form-data" },
                })
                .then(function (res) {
                    pesanUmumApp("success", "Sukses", res.data.message);
                    load_page(rKegiatan, "Kegiatan");
                })
                .catch(function (error) {
                    pesanUmumApp("error", "Error", error.response.data.message);
                });
        },
        hapusAtc: function (id) {
            confirmQuest("warning", "Konfirmasi", "Hapus data kegiatan ...?", function () {
                konfirmasiHapus(id);
            });
        },
    },
});

// inisialisasi
$("#tblKegiatan").dataTable();

// preview image function
function previewImage(context) {
    var preview;
    var file;
    if (context === "edit") {
        preview = document.querySelector("#editImagePreview");
        file = document.querySelector("#txtEditFotoKegiatan").files[0];
    } else {
        preview = document.querySelector("#addImagePreview");
        file = document.querySelector("#txtFotoKegiatan").files[0];
    }

    if (file) {
        var reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
        };
        reader.readAsDataURL(file);
    } else {
        // Jangan kosongkan preview saat edit jika belum memilih file baru
        if (context !== "edit") {
            preview.src = "";
        }
    }
}

function konfirmasiHapus(id) {
    let ds = { id: id };
    axios.post(rProsesHapusKegiatan, ds).then(function () {
        pesanUmumApp("success", "Sukses", "Berhasil menghapus data kegiatan");
        load_page(rKegiatan, "Kegiatan");
    });
}
