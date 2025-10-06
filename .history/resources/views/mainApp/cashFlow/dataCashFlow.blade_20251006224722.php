<div id="divDataCashFlow" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-wallet me-2"></i> Data Cash Flow
            </h5>
            <div class="btn-group">
                <button class="btn btn-light btn-sm fw-semibold dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-file-export me-1"></i> Export
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="exportExcel" href="#">Excel</a></li>
                    <li><a class="dropdown-item" id="exportCSV" href="#">CSV</a></li>
                    <li><a class="dropdown-item" id="exportPDF" href="#">PDF</a></li>
                    <li><a class="dropdown-item" id="exportPrint" href="#">Print</a></li>
                </ul>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblCashFlow" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Token</th>
                            <th>Flow</th>
                            <th>Type</th>
                            <th>Detail</th>
                            <th>Nominal</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataCashFlow as $flow)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-secondary">{{ substr($flow->token_flow, 0, 7) }}...</span></td>
                            <td>{{ $flow->flow }}</td>
                            <td>{{ $flow->type }}</td>
                            <td>{{ $flow->setDetail($flow->type, $flow->id_event) }}</td>
                            <td><strong>Rp. {{ number_format($flow->total) }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($flow->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ======= CSS Kustom ======= -->
<style>
.card { border-radius: 16px; overflow: hidden; margin-bottom: 20px; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
.card-header { border-bottom: none; background: linear-gradient(135deg, #007bff, #00bfff); color: #fff; }
.table { border-collapse: separate; border-spacing: 0 8px; }
.table thead th { vertical-align: middle; font-weight: 600; text-transform: uppercase; font-size: 0.9rem; }
.table tbody tr { background-color: #ffffff; transition: all 0.2s ease; border-radius: 8px; }
.table tbody tr:hover { background-color: #f4f8ff; transform: scale(1.01); }
.badge { font-size: 0.85rem; border-radius: 12px; padding: 0.35em 0.65em; }
@media (max-width: 768px) { .card-header h5 { font-size: 1rem; } .table thead th { font-size: 0.8rem; } }
</style>

