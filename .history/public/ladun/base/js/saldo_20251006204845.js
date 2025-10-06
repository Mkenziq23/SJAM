$(document).ready(function() {
    // Jika ada tabel saldo
    if ($("#tblSaldo").length) {
        $("#tblSaldo").DataTable({
            order: [[1, "desc"]],
            pageLength: 6,
            paging: true
        });
    }

    // Tombol Refresh saldo
    $("#btnRefreshSaldo").click(function() {
        $(this).prop("disabled", true).html('<i class="fas fa-sync-alt fa-spin me-1"></i> Memuat...');
        $("#divSaldoCards").load("/app/saldo #divSaldoCards > *", function(response, status, xhr){
            if(status == "error") {
                console.error("Gagal load saldo: ", xhr.status, xhr.statusText);
            }
            $("#btnRefreshSaldo").prop("disabled", false).html('<i class="fas fa-sync-alt me-1"></i> Refresh');
        });
    });
});

// Fungsi reload data manual
function saldoAtc() {
    $("#divSaldoCards").load("/app/saldo #divSaldoCards > *", function(response, status, xhr){
        if(status == "error") {
            console.error("Gagal load saldo: ", xhr.status, xhr.statusText);
        }
    });
}