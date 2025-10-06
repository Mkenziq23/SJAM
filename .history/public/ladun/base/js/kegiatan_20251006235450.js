// Routes
const rProsesTambahKegiatan = server + "app/kegiatan/tambah";
const rProsesEditKegiatan = server + "app/kegiatan/edit";
const rProsesHapusKegiatan = server + "app/kegiatan/hapus";

// Vue instance
const appKegiatan = new Vue({
    el: "#divKegiatan",
    data: {
        editId: null,
    },
    methods: {
        // Tampilkan form tambah
        tambahKegiatanAtc() {
            $("#divDataKegiatan").hide();
            $("#divTambahKegiatan").show();
            document.querySelector("#txtNamaKegiatan").focus();
            // Reset form tambah
            document.querySelector("#txtNamaKegiatan").value = "";
            document.querySelector("#txtTanggalKegiatan").value = "";
            document.querySelector("#txtTempatKegiatan").value = "";
            document.querySelector("#txtFotoKegiatan").value = "";
            document.querySelector("#addImagePreview").src = "";
        },

        // Kembali ke daftar
        kembaliAtc() {
            $("#divTambahKegiatan").hide();
            $("#divEditKegiatan").hide();
            $("#divDataKegiatan").show();
        },

        // Proses tambah kegiatan
        prosesTambahKegiatanAtc() {
            const nama = document.querySelector("#txtNamaKegiatan").value;
            const tgl = document.querySelector("#txtTanggalKegiatan").value;
            const tempat = document.querySelector("#txtTempatKegiatan").value;
            const image = document.querySelector("#txtFotoKegiatan").files[0];

            const formData = new FormData();
            formData.append("nama", nama);
            formData.append("tgl", tgl);
            formData.append("tempat", tempat);
            formData.append("image", image);

            axios.post(rProsesTambahKegiatan, formData, {
                headers: { "Content-Type": "multipart/form-data" },
            })
            .then(res => {
                pesanUmumApp("success", "Sukses", res.data.message);
                load_page(rKegiatan, "Kegiatan");
            })
            .catch(err => {
                pesanUmumApp("error", "Error", err.response?.data?.message || "Terjadi kesalahan");
            });
        },

        // Tampilkan form edit dan isi data
        editKegiatanAtc(id) {
            axios.get(`${server}app/kegiatan/${id}`).then(response => {
                const data = response.data;
                this.editId = id;

                document.querySelector("#txtEditNamaKegiatan").value = data.nama_kegiatan;
                document.querySelector("#txtEditTanggalKegiatan").value = data.tanggal_kegiatan;
                document.querySelector("#txtEditTempatKegiatan").value = data.tempat_kegiatan;

                // Preview gambar lama atau placeholder
                const imgPreview = document.querySelector("#editImagePreview");
                if (data.image && data.image !== "") {
                    imgPreview.src = server + "storage/" + data.image;
                } else {
                    imgPreview.src = "https://via.placeholder.com/200x150?text=No+Image";
                }

                // Reset input file
                document.querySelector("#txtEditFotoKegiatan").value = "";

                $("#divDataKegiatan").hide();
                $("#divEditKegiatan").show();
            });
        },

        // Proses edit kegiatan
        prosesEditKegiatanAtc() {
            const id = this.editId;
            const nama = document.querySelector("#txtEditNamaKegiatan").value;
            const tgl = document.querySelector("#txtEditTanggalKegiatan").value;
            const tempat = document.querySelector("#txtEditTempatKegiatan").value;
            const image = document.querySelector("#txtEditFotoKegiatan").files[0];

            const formData = new FormData();
            formData.append("id", id);
            formData.append("nama", nama);
            formData.append("tgl", tgl);
            formData.append("tempat", tempat);
            if (image) formData.append("image", image);

            axios.post(rProsesEditKegiatan, formData, {
                headers: { "Content-Type": "multipart/form-data" },
            })
            .then(res => {
                pesanUmumApp("success", "Sukses", res.data.message);
                load_page(rKegiatan, "Kegiatan");
            })
            .catch(err => {
                pesanUmumApp("error", "Error", err.response?.data?.message || "Terjadi kesalahan");
            });
        },

        // Hapus kegiatan
        hapusAtc(id) {
            confirmQuest("warning", "Konfirmasi", "Hapus data kegiatan ...?", () => {
                konfirmasiHapus(id);
            });
        }
    }
});

// Inisialisasi DataTable
$("#tblKegiatan").dataTable();

// Preview gambar
function previewImage(context) {
    let preview, file;

    if (context === "edit") {
        preview = document.querySelector("#editImagePreview");
        file = document.querySelector("#txtEditFotoKegiatan").files[0];
    } else {
        preview = document.querySelector("#addImagePreview");
        file = document.querySelector("#txtFotoKegiatan").files[0];
    }

    if (file) {
        const reader = new FileReader();
        reader.onloadend = () => preview.src = reader.result;
        reader.readAsDataURL(file);
    } else {
        if (context !== "edit") preview.src = "";
    }
}

// Konfirmasi hapus
function konfirmasiHapus(id) {
    axios.post(rProsesHapusKegiatan, { id }).then(() => {
        pesanUmumApp("success", "Sukses", "Berhasil menghapus data kegiatan");
        load_page(rKegiatan, "Kegiatan");
    });
}
