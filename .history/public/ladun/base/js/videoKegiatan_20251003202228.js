var rProsesTambahVideoKegiatan = server + "app/video-kegiatan/tambah";
var rProsesEditVideoKegiatan = server + "app/video-kegiatan/edit";
var rProsesHapusVideoKegiatan = server + "app/video-kegiatan/hapus";

var appKegiatan = new Vue({
    el: "#divVideoKegiatan",
    data: {
        videoPreview: "",
        editId: null,
    },
    methods: {
        tambahVideoKegiatanAtc: function () {
            $("#divDataVideoKegiatan").hide();
            $("#divTambahVideoKegiatan").show();
            document.querySelector("#txtNamaKegiatan").focus();
        },
        editVideoKegiatanAtc: function (id) {
            axios
                .get(`${server}app/video-kegiatan/${id}`)
                .then((response) => {
                    const data = response.data;
                    this.editId = id;
                    document.querySelector("#txtEditNamaKegiatan").value =
                        data.nama_kegiatan;
                    document.querySelector("#txtEditTanggalKegiatan").value =
                        data.tanggal_kegiatan;
                    document.querySelector("#txtEditTempatKegiatan").value =
                        data.tempat_kegiatan;
                    document.querySelector(
                        "#imgEditThumbnail"
                    ).src = `${server}storage/${data.image}`;
                    document.querySelector("#txtEditLinkVideo").value =
                        data.link_video;
                    updateEditVideoPreview();
                    $("#divDataVideoKegiatan").hide();
                    $("#divEditVideoKegiatan").show();
                })
                .catch((error) => {
                    console.error(error);
                    pesanUmumApp(
                        "error",
                        "Error",
                        "Gagal mengambil data kegiatan."
                    );
                });
        },
        kembaliAtc: function () {
            $("#divTambahVideoKegiatan").hide();
            $("#divEditVideoKegiatan").hide();
            $("#divDataVideoKegiatan").show();
        },
        prosesTambahKegiatanAtc: function () {
            let nama = document.querySelector("#txtNamaKegiatan").value;
            let tgl = document.querySelector("#txtTanggalKegiatan").value;
            let tempat = document.querySelector("#txtTempatKegiatan").value;
            let image = document.querySelector("#txtThumbnailVideoKegiatan")
                .files[0];
            let linkVideo = document.querySelector("#txtLinkVideo").value;

            let formData = new FormData();
            formData.append("nama", nama);
            formData.append("tgl", tgl);
            formData.append("tempat", tempat);
            formData.append("image", image);
            formData.append("linkVideo", linkVideo);

            axios
                .post(rProsesTambahVideoKegiatan, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(function (res) {
                    pesanUmumApp("success", "Sukses", res.data.message);
                    load_page(rVideoKegiatan, "Video Kegiatan");
                })
                .catch(function (error) {
                    pesanUmumApp("error", "Error", error.response.data.message);
                });
        },
        prosesEditKegiatanAtc: function () {
            let id = this.editId;
            let nama = document.querySelector("#txtEditNamaKegiatan").value;
            let tgl = document.querySelector("#txtEditTanggalKegiatan").value;
            let tempat = document.querySelector("#txtEditTempatKegiatan").value;
            let image = document.querySelector("#txtEditThumbnailVideoKegiatan")
                .files[0];
            let linkVideo = document.querySelector("#txtEditLinkVideo").value;

            let formData = new FormData();
            formData.append("id", id);
            formData.append("nama", nama);
            formData.append("tgl", tgl);
            formData.append("tempat", tempat);
            formData.append("linkVideo", linkVideo);
            if (image) {
                formData.append("image", image);
            }

            axios
                .post(rProsesEditVideoKegiatan, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(function (res) {
                    pesanUmumApp("success", "Sukses", res.data.message);
                    load_page(rVideoKegiatan, "Video Kegiatan");
                })
                .catch(function (error) {
                    pesanUmumApp("error", "Error", error.response.data.message);
                });
        },
        hapusAtc: function (id) {
            confirmQuest(
                "warning",
                "Konfirmasi",
                "Hapus data kegiatan ...?",
                function (x) {
                    konfirmasiHapus(id);
                }
            );
        },
    },
});

function previewImage() {
    var preview = document.querySelector(".img-preview");
    var file = document.querySelector("#txtThumbnailVideoKegiatan").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function previewEditImage() {
    var preview = document.querySelector("#imgEditThumbnail");
    var file = document.querySelector("#txtEditThumbnailVideoKegiatan")
        .files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function updateEditVideoPreview() {
    const videoInput = document.getElementById("txtEditLinkVideo").value;
    const videoPreview = document.getElementById("editVideoPreview");
    const youtubeIframe = document.getElementById("editYoutubeIframe");
    const youtubeURL = extractYouTubeVideoID(videoInput);

    if (youtubeURL) {
        youtubeIframe.src = `https://www.youtube.com/embed/${youtubeURL}`;
        videoPreview.style.display = "block";
    } else {
        videoPreview.style.display = "none";
    }
}

function updateVideoPreview() {
    const videoInput = document.getElementById("txtLinkVideo").value;
    const videoPreview = document.getElementById("videoPreview");
    const youtubeIframe = document.getElementById("youtubeIframe");
    const youtubeURL = extractYouTubeVideoID(videoInput);

    if (youtubeURL) {
        youtubeIframe.src = `https://www.youtube.com/embed/${youtubeURL}`;
        videoPreview.style.display = "block";
    } else {
        videoPreview.style.display = "none";
    }
}

function extractYouTubeVideoID(url) {
    const regex =
        /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    const match = url.match(regex);
    return match ? match[1] : null;
}

function konfirmasiHapus(id) {
    let ds = { id: id };
    axios.post(rProsesHapusVideoKegiatan, ds).then(function (res) {
        pesanUmumApp(
            "success",
            "Sukses",
            "Berhasil menghapus data video kegiatan"
        );
        load_page(rVideoKegiatan, "Video Kegiatan");
    });
}
