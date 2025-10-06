$(document).ready(function(){
    // Inisialisasi DataTable dengan tombol
    var table = $("#tblCashFlow").DataTable({
        dom: 'Bfrtip',
        buttons: []
    });

    // Export CSV
    $('#btnExportCSV').on('click', function() {
        table.button().add(0, {
            extend: 'csvHtml5',
            title: 'DataCashFlow',
        }).trigger();
    });

    // Export Excel
    $('#btnExportExcel').on('click', function() {
        table.button().add(0, {
            extend: 'excelHtml5',
            title: 'DataCashFlow',
        }).trigger();
    });

    // Print
    $('#btnPrint').on('click', function() {
        table.button().add(0, {
            extend: 'print',
            title: 'Data Cash Flow',
        }).trigger();
    });
});