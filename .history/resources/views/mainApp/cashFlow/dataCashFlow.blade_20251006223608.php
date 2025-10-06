<div id="divDataCashFlow" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-wallet me-2"></i> Data Cash Flow
            </h5>
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
