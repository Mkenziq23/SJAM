$(document).ready(function() {
    // Jika ada tabel saldo
    if ($("#tblSaldo").length) {
        $("#tblSaldo").DataTable({
            order: [[1, "desc"]],
            pageLength: 6,
            paging: true
        });
    }
});

// Fungsi reload data jika dibutuhkan
function saldoAtc() {
    $("#divSaldo").load("/app/saldo", function(response, status, xhr){
        if(status == "error") {
            console.error("Gagal load saldo: ", xhr.status, xhr.statusText);
        }
    });
}
