var rProsesDaftar = server + "auth/daftar/proses";
var rCheckDataSantri = server + "check-data-santri";
var rSubmitPembayaran = server + "submit-pembayaran";
var statusBtnSetor = true;
function checkDataSantriAtc() {
    let nHandphone = document.querySelector(
        "#txtNomorHandphoneSantriSetorSpp"
    ).value;

    if (nHandphone.length === 0) {
        pesanUmumApp("warning", "300", "Harap masukkan nomor handphone ...");
    } else {
        if (statusBtnSetor === true) {
            statusBtnSetor = false;
            pesanUmumApp(
                "info",
                "100",
                "Tunggu sebentar, sedang mencari data yang sesuai ..."
            );
            setTimeout(function () {
                let ds = { hp: nHandphone };
                axios.post(rCheckDataSantri, ds).then(function (res) {
                    if (res.data.success === true) {
                        pesanUmumApp("success", "400", "Data ditemukan!");
                        $("#divBothSantriData").show();
                        document.querySelector("#rNamaSantri").innerHTML =
                            res.data.id_santri;
                        document.querySelector("#rIdSantri").innerHTML =
                            res.data.nama_santri;
                        document.querySelector("#rNamaOrangTua").innerHTML =
                            res.data.nama_orang_tua;
                        document.querySelector("#rKelas").innerHTML =
                            res.data.kelas;
                    } else {
                        pesanUmumApp(
                            "error",
                            "200",
                            "Data santri tidak ditemukan!!!, periksa kembali nomor handphone atau hubungi pengurus tahfiz ..."
                        );
                        $("#divBothSantriData").hide();
                    }
                    statusBtnSetor = true;
                });
            }, 2000);
        } else {
            pesanUmumApp(
                "warning",
                "300",
                "Proses pengecekan sedang berlangsung, harap menunggu ..."
            );
        }
    }
}

function checkDataSantriAtc() {
    let nHandphone = document.querySelector("#txtNomorHandphoneSantriSetorSpp").value;

    if (nHandphone.trim() === "") {
        Swal.fire("Peringatan", "Harap masukkan nomor handphone!", "warning");
        return;
    }

    if (!statusBtnSetor) {
        Swal.fire("Tunggu Sebentar", "Proses sedang berlangsung...", "info");
        return;
    }

    statusBtnSetor = false;
    Swal.fire({
        title: "Mengecek Data...",
        text: "Harap tunggu sebentar.",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
    });

    axios.post(rCheckDataSantri, { hp: nHandphone })
        .then((res) => {
            Swal.close();
            if (res.data.success) {
                const s = res.data;

                if (s.status_bayar === "sudah") {
                    Swal.fire("Sudah Bayar", `Santri ${s.nama_santri} sudah membayar bulan ini 🎉`, "success");
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Belum Bayar",
                        html: `<b>${s.nama_santri}</b> belum membayar bulan ini.<br>Silakan upload bukti pembayaran.`,
                        showCancelButton: true,
                        confirmButtonText: "Upload Sekarang",
                        cancelButtonText: "Batal",
                    }).then((r) => {
                        if (r.isConfirmed) {
                            $("#divBothSantriData").show();
                            $("#rIdSantri").text(s.id_santri);
                            $("#rNamaSantri").text(s.nama_santri);
                            $("#rNamaOrangTua").text(s.nama_orang_tua);
                            $("#rKelas").text(s.kelas);
                            document.querySelector("#divBothSantriData").scrollIntoView({ behavior: "smooth" });
                        } else {
                            $("#divBothSantriData").hide();
                        }
                    });
                }
            } else {
                Swal.fire("Tidak Ditemukan", "Nomor handphone tidak terdaftar!", "error");
                $("#divBothSantriData").hide();
            }
        })
        .catch(() => Swal.fire("Error", "Gagal menghubungi server.", "error"))
        .finally(() => statusBtnSetor = true);
}

function submitPembayaranAtc() {
    let idSantri = $("#rIdSantri").text();
    let namaSantri = $("#rNamaSantri").text();
    let namaOrangTua = $("#rNamaOrangTua").text();
    let kelas = $("#rKelas").text();
    let nomorHandphone = $("#txtNomorHandphoneSantriSetorSpp").val();
    let file = $("#txtFile")[0].files[0];

    if (!file) {
        Swal.fire("Peringatan", "Silakan pilih file bukti pembayaran!", "warning");
        return;
    }

    let formData = new FormData();
    formData.append("id_santri", idSantri);
    formData.append("nama_santri", namaSantri);
    formData.append("nama_orang_tua", namaOrangTua);
    formData.append("kelas", kelas);
    formData.append("nomor_handphone", nomorHandphone);
    formData.append("bukti_pembayaran", file);

    Swal.fire({
        title: "Mengunggah Bukti...",
        text: "Harap tunggu sebentar.",
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
    });

    axios.post(rSubmitPembayaran, formData, {
        headers: { "Content-Type": "multipart/form-data" },
    })
        .then((res) => {
            Swal.close();
            if (res.data.success) {
                Swal.fire("Berhasil", res.data.message, "success");
                $("#divBothSantriData").hide();
                $("#buktiPembayaranForm")[0].reset();
            } else {
                Swal.fire("Gagal", "Upload gagal, coba lagi.", "error");
            }
        })
        .catch(() => Swal.fire("Error", "Terjadi kesalahan pada server.", "error"));
}


function prosesPendaftaran() {
    let isiForm = document.getElementsByClassName("form-control");
    let statusForm = true;

    for (let i = 0; i < isiForm.length; i++) {
        let valForm = isiForm[i].value;
        if (valForm === "") {
            statusForm = false;
        }
    }

    if (statusForm === false) {
        pesanUmumApp("warning", "Lengkapi form", "Harap lengkapi form");
    } else {
        Swal.fire({
            title: "Konfirmasi",
            text: "Proses pendaftaran santri?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
        }).then((result) => {
            if (result.value) {
                let nama = document.querySelector("#txtNama").value;
                let email = document.querySelector("#txtEmail").value;
                let hp = document.querySelector("#txtHp").value;
                let jk = document.querySelector("#txtJk").value;
                let kelas = document.querySelector("#txtKelas").value;
                let alamat = document.querySelector("#txtAlamat").value;
                let harapan = document.querySelector("#txtHarapan").value;
                let tgl = document.querySelector("#txtTgl").value;
                let tmpt = document.querySelector("#txtTmpt").value;
                let ortu = document.querySelector("#txtOrangTua").value;
                let ds = {
                    nama: nama,
                    email: email,
                    hp: hp,
                    jk: jk,
                    kelas: kelas,
                    alamat: alamat,
                    harapan: harapan,
                    tgl: tgl,
                    tmpt: tmpt,
                    ortu: ortu,
                };
                document.querySelector("#btnProses").innerHTML =
                    "Memproses pendaftaran ...<i class='mdi mdi-telegram ml-2'></i>";
                document.querySelector("#btnProses").classList.add("disabled");
                setTimeout(function () {
                    axios.post(rProsesDaftar, ds).then(function (res) {
                        let obj = res.data;
                        let token = obj.token;
                        pesanUmumApp(
                            "success",
                            "Sukses",
                            "Pendaftaran berhasil, anda akan diarahkan ke halaman bukti pendaftaran dalam beberapa saat, jangan tutup halaman ini .."
                        );
                        setTimeout(function () {
                            let rCetakBukti =
                                server + "auth/daftar/" + token + "/cetak";
                            window.open(rCetakBukti);
                            window.location.assign(server);
                        }, 2000);
                    });
                }, 1000);
            }
        });
    }
}

function pesanUmumApp(icon, title, text) {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
    });
}

$(document).ready(function(){
    $("#carouselPenilaian").owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        dots: true,
        nav: false,
        responsive:{
            0:{ items:1 },
            576:{ items:2 },
            992:{ items:3 },
            1200:{ items:4 } // tampil 4 kartu di layar besar
        }
    });
});