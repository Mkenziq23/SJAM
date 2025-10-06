// route
var rProsesSplitPenggajian = server + "app/penggajian/split/proses";
var rProsesHapusPenggajian = server + "app/penggajian/hapus";

// Vue object
var appGaji = new Vue({
    el: "#divBuatSpill",
    data: {
        idPengurus: "",
    },
    methods: {
        // Tampilkan form buat spill
        buatSpillAtc: function () {
            $("#divDataPenggajian").hide();
            $("#divBuatSpill").show();
        },
        // Kembali ke halaman penggajian
        kembaliAtc: function () {
            $("#divBuatSpill").hide();
            load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
        },
        // Tampilkan modal pengurus
        showModalPengurus: function () {
            $("#modalPengurus").appendTo("body").modal("show");
        },
        // Pilih pengurus
        pilihPengurusAtc: function (dataPengurus) {
            let pengurusEx = dataPengurus.split("|");
            document.querySelector("#txtNamaPengurus").value = pengurusEx[1];
            appGaji.idPengurus = pengurusEx[0];
        },
        // Proses split penggajian
        prosesSplitBillAtc: function () {
            let tgl = document.querySelector("#txtTanggalPembayaran").value;
            let idPengurus = appGaji.idPengurus;
            let gp = document.querySelector("#txtGajiPokok").value;
            let tun = document.querySelector("#txtTunjangan").value;
            let pot = document.querySelector("#txtPotongan").value;
            let capTun = document.querySelector("#txtCapTunjangan").value;
            let capPot = document.querySelector("#txtCapPotongan").value;

            let ds = {
                idPengurus: idPengurus,
                tgl: tgl,
                gp: gp,
                tun: tun,
                pot: pot,
                capTun: capTun,
                capPot: capPot,
            };

            axios.post(rProsesSplitPenggajian, ds).then(function (res) {
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
        // Hapus penggajian
        hapusPenggajianAtc: function (token) {
            confirmQuest(
                "warning",
                "Konfirmasi ...",
                "Hapus penggajian? Menghapus penggajian akan menyebabkan kehilangan data secara permanen...",
                function (x) {
                    appGaji.prosesHapusPenggajian(token);
                }
            );
        },
        prosesHapusPenggajian: function (token) {
            axios.post(rProsesHapusPenggajian, { token: token })
                .then(function (res) {
                    Swal.fire({
                        icon: "success",
                        title: "Sukses",
                        text: "Penggajian berhasil dihapus.",
                    }).then(function () {
                        load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
                    });
                })
                .catch(function (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi kesalahan dalam menghapus penggajian. Silakan coba lagi nanti.",
                    });
                });
        },
        // Clear form
        clearFormAtc: function() {
            document.querySelector("#txtNamaPengurus").value = "";
            appGaji.idPengurus = "";
            document.querySelector("#txtTanggalPembayaran").value = "";
            document.querySelector("#txtGajiPokok").value = "";
            document.querySelector("#txtTunjangan").value = "";
            document.querySelector("#txtPotongan").value = "";
            document.querySelector("#txtCapTunjangan").value = "";
            document.querySelector("#txtCapPotongan").value = "";
        },
    },
});

// Event listener tombol Clear
document.querySelector("#btnClearForm").addEventListener("click", function() {
    appGaji.clearFormAtc();
});

// Fungsi cetak slip
function cetakSlipGaji(token) {
    let rCetak = server + "app/penggajian/" + token + "/cetak";
    window.open(rCetak);
}

// Inisialisasi datatable jika ada tabel
if ($("#tblPenggajian").length) {
    $("#tblPenggajian").DataTable();
}
if ($("#tblDataPengurus").length) {
    $("#tblDataPengurus").DataTable();
}
