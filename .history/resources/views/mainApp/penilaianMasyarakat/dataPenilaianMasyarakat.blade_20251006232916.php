<!-- Div Tabel Data Penilaian Masyarakat -->
<div id="divPenilaianMasyarakat" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-users me-2"></i> Penilaian Masyarakat
            </h5>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblPenilaianMasyarakat" class="table table-striped table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Penilaian / Ulasan</th>
                            <th>Bintang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaianMasyarakat as $penilaian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penilaian->name }}</td>
                            <td>{{ $penilaian->reason }}</td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $penilaian->stars }} <i class="fas fa-star"></i></span>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" @click="hapusAtc('{{ $penilaian->id }}')">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
}

.table thead th {
    vertical-align: middle;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.table tbody tr {
    background-color: #ffffff;
    transition: all 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.01);
}

.badge {
    font-size: 0.85rem;
    border-radius: 12px;
    padding: 0.35em 0.65em;
}

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }
    .table thead th {
        font-size: 0.8rem;
    }
}
</style>
