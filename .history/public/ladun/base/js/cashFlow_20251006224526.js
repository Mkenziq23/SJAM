// vue object
var cf = new Vue({
    el : '#divCashFlow',
    data : {},
    methods : {}
});

// inisialisasi DataTable dengan tombol export
$(document).ready(function() {
    $("#tblCashFlow").DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-sm btn-outline-primary'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-sm btn-outline-success'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-sm btn-outline-danger'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-sm btn-outline-secondary'
            }
        ],
        responsive: true,
        paging: true,
        searching: true,
        order: [[0, 'asc']],
    });
});
