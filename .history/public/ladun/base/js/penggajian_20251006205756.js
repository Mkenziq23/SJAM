// route
var rProsesSplitPenggajian = server + "app/penggajian/split/proses";
var rProsesHapusPenggajian = server + "app/penggajian/hapus";
// vue object
var appGaji = new Vue({
    el: "#divPenggajian",
    data: {
        idPengurus: "",
        // // gajiPokok: 0,
        // // tunjangan: 0,
        // // potongan: 0,
        // totalDibayar: 0,
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
            appGaji.idPengurus = pengurusEx[0];
        },
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
            axios
                .post(rProsesHapusPenggajian, { token: token })
                .then(function (res) {
                    // Tambahkan logika apabila penghapusan berhasil
                    console.log("Penggajian berhasil dihapus");
                    // Tampilkan alert
                    Swal.fire({
                        icon: "success",
                        title: "Sukses",
                        text: "Penggajian berhasil dihapus.",
                    }).then(function () {
                        // Memuat ulang data setelah alert ditutup
                        load_page(rPenggajian, "Penggajian Pengurus Tahfiz");
                    });
                })
                .catch(function (error) {
                    // Tambahkan logika apabila terjadi kesalahan
                    console.error(
                        "Terjadi kesalahan dalam menghapus penggajian:",
                        error.response.data.error
                    );
                    // Tampilkan alert jika terjadi kesalahan
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi kesalahan dalam menghapus penggajian. Silakan coba lagi nanti.",
                    });
                });
        },
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
// inisialisasi
$("#tblPenggajian").dataTable();
$("#tblDataPengurus").dataTable();

function cetakSlipGaji(token) {
    let rCetak = server + "app/penggajian/" + token + "/cetak";
    window.open(rCetak);
}

// function setGaji() {
//     gp = appGaji.gajiPokok;
//     tun = appGaji.tunjangan;
//     pot = appGaji.potongan;
//     let totalDibayar = parseInt(gp) + parseInt(tun) - parseInt(pot);
//     appGaji.totalDibayar = totalDibayar;
// }
