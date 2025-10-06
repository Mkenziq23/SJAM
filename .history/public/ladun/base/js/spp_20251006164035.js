// route
var rProsesPembayaranSpp = server + "app/pembayaran-spp/proses";
// vue object
var appSpp = new Vue({
    el : '#divSpp',
    data : {
        idSantri : '',
        namaSantri : ''
    },
    methods : {
        tambahPembayaranSppAtc : function() {
            $("#divDataSpp").hide();
            $("#divAddPembayaran").show();
        },
        showModalSantriAtc : function() {
            $('#modalSantri').appendTo("body").modal('show');
        },
        pilihSantriAtc : function(dataSantri) {
            let santriEx = dataSantri.split("|");
            document.querySelector("#txtNamaSantri").value = santriEx[1];
            appSpp.idSantri = santriEx[0];
        },
        prosesPembayaranSppAtc : function() {
            let idSantri = appSpp.idSantri;
            let tahun = document.querySelector("#txtTahun").value;
            let bulan = document.querySelector("#txtBulan").value;
            let total = document.querySelector("#txtTotalPembayaran").value;
            let petugas = document.querySelector("#txtPetugas").value;
            let ds = {'idSantri':idSantri, 'tahun':tahun, 'bulan':bulan, 'total':total, 'petugas':petugas};
            
            if(idSantri === '' || total === ''){
                pesanUmumApp('warning', 'Gagal', 'Harap lengkapi semua field!');
            } else {
                // tampilkan loading
                Swal.fire({
                    title: 'Memproses...',
                    html: 'Sedang menyimpan data pembayaran.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                axios.post(rProsesPembayaranSpp, ds).then(function(res){
                    Swal.close();
                    pesanUmumApp('success', 'Sukses', 'Pembayaran SPP berhasil disimpan.');
                    load_page(rPembayaranSpp, "Pembayaran SPP");
                });
            }
        },
        clearFormAtc : function() {
            // Reset semua input form ke nilai awal
            appSpp.idSantri = '';
            document.querySelector("#txtNamaSantri").value = '';
            document.querySelector("#txtTahun").selectedIndex = 0;
            document.querySelector("#txtBulan").selectedIndex = 0;
            document.querySelector("#txtTotalPembayaran").value = '';
            document.querySelector("#txtPetugas").selectedIndex = 0;

            // Tampilkan notifikasi ringan
            Swal.fire({
                icon: 'info',
                title: 'Form Dikosongkan',
                text: 'Semua input telah dibersihkan.',
                showConfirmButton: false,
                timer: 1200
            });
        },
        kembaliAtc : function() {
            load_page(rPembayaranSpp, "Pembayaran SPP");
        }
    }
});

// inisialisasi
$("#tblSpp").dataTable();
$("#tblDataSantri").dataTable();
