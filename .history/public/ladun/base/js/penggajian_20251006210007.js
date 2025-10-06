// route
var rProsesSplitPenggajian = server + "app/penggajian/split/proses";
var rProsesHapusPenggajian = server + "app/penggajian/hapus";

// vue object
var appGaji = new Vue({
    el: "#divBuatSpill", // pastikan el mengacu ke div form
    data: {
        idPengurus: "",
    },
    methods: {
        buatSpillAtc: function () {
            $("#divDataPenggajian").hide();
            $("#divBuatSpill").show();
        },
        kembaliAtc: function () {
            $("#divBuatSpill").hide();
            load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
        },
        showModalPengurus: function () {
            $("#modalPengurus").appendTo("body").modal("show");
        },
        pilihPengurusAtc: function (dataPengurus) {
            let pengurusEx = dataPengurus.split("|");
            document.querySelector("#txtNamaPengurus").value = pengurusEx[1];
            this.idPengurus = pengurusEx[0];
        },
        prosesSplitBillAtc: function () {
            let tgl = document.querySelector("#txtTanggalPembayaran").value;
            let gp = document.querySelector("#txtGajiPokok").value;
            let tun = document.querySelector("#txtTunjangan").value;
            let pot = document.querySelector("#txtPotongan").value;
            let capTun = document.querySelector("#txtCapTunjangan").value;
            let capPot = document.querySelector("#txtCapPotongan").value;

            let ds = {
                idPengurus: this.idPengurus,
                tgl: tgl,
                gp: gp,
                tun: tun,
                pot: pot,
                capTun: capTun,
                capPot: capPot,
            };

            axios.post(rProsesSplitPenggajian, ds).then((res) => {
                let obj = res.data;
                let token = obj.token;
                confirmQuest(
                    "success",
                    "Sukses",
                    "Berhasil memproses spill penggajian, cetak slip gaji? ..",
                    function (x) {
                        cetakSlipGaji(token);
                    }
                );
                load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
            });
        },
        hapusPenggajianAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi ...",
                "Hapus penggajian? Menghapus penggajian akan menyebabkan kehilangan data secara permanen...",
                (x) => {
                    this.prosesHapusPenggajian(token);
                }
            );
        },
        prosesHapusPenggajian: function (token) {
            axios.post(rProsesHapusPenggajian, { token: token })
                .then((res) => {
                    Swal.fire({
                        icon: "success",
                        title: "Sukses",
                        text: "Penggajian berhasil dihapus.",
                    }).then(() => {
                        load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
                    });
                })
                .catch((error) => {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi kesalahan dalam menghapus penggajian. Silakan coba lagi nanti.",
                    });
                });
        },
        clearFormAtc: function () {
            // Reset semua field
            this.idPengurus = "";
            document.querySelector("#txtNamaPengurus").value = "";
            document.querySelector("#txtTanggalPembayaran").value = "";
            document.querySelector("#txtGajiPokok").value = "";
            document.querySelector("#txtTunjangan").value = "";
            document.querySelector("#txtPotongan").value = "";
            document.querySelector("#txtCapTunjangan").value = "";
            document.querySelector("#txtCapPotongan").value = "";
        }
    },
});

// Fungsi cetak slip
function cetakSlipGaji(token) {
    let rCetak = server + "app/penggajian/" + token + "/cetak";
    window.open(rCetak);
}

// Inisialisasi datatable
if ($("#tblPenggajian").length) $("#tblPenggajian").DataTable();
if ($("#tblDataPengurus").length) $("#tblDataPengurus").DataTable();
