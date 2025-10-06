$(document).ready(function() {
    var table = $('#tblCashFlow').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excel', title: 'Data Cash Flow', className: 'd-none', filename: 'CashFlow_Export' },
            { extend: 'csv', title: 'Data Cash Flow', className: 'd-none', filename: 'CashFlow_Export' },
            { extend: 'pdf', title: 'Data Cash Flow', className: 'd-none', filename: 'CashFlow_Export' },
            { extend: 'print', title: 'Data Cash Flow', className: 'd-none' }
        ]
    });

    // trigger export dari dropdown
    $('#exportExcel').on('click', function() { table.button(0).trigger(); });
    $('#exportCSV').on('click', function() { table.button(1).trigger(); });
    $('#exportPDF').on('click', function() { table.button(2).trigger(); });
    $('#exportPrint').on('click', function() { table.button(3).trigger(); });
});