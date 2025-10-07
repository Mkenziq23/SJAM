<!-- Div Tabel Data Setting -->
<div id="divDataSetting" class="container-fluid px-4 py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header -->
        <div
            class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4 rounded-top-4">
            <h5 class="mb-0">
                <i class="fas fa-cogs me-2"></i> Data Setting
            </h5>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblDataSetting" class="table table-striped table-hover align-middle text-center shadow-sm">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Setting</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSetting as $setting)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $setting->nama_setting }}</td>
                                <td>{{ $setting->value }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm mb-1 rounded-pill px-3"
                                        @click="editAtc('{{ $setting->id }}')">
                                        <i class="fas fa-edit me-1"></i> Edit
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

<!-- Div Edit Data Setting -->
<div id="divEditDataSetting" class="container-fluid px-4 py-4" style="display: none;">
    <div class="mb-4">
        <button class="btn btn-outline-secondary btn-lg fw-semibold px-4 py-2 rounded-pill" style="font-size: 1.1rem;"
            @click="kembaliAtc()">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </button>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12 mx-auto">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Setting</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label">Nama Setting</label>
                        <input type="text" class="form-control" id="txtNamaSetting" readonly
                            placeholder="Nama setting">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nilai</label>
                        <input type="text" class="form-control" id="txtNilaiSetting" placeholder="Nilai setting">
                    </div>
                    <div>
                        <button class="btn btn-primary btn-lg w-100 rounded-pill" onclick="updateProsesAtc()">
                            <i class="fas fa-save me-1"></i> Update Setting
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
/* Card */
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 25px;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}

/* Header */
.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
    font-weight: 600;
}

/* Table */
.table {
    border-collapse: separate;
    border-spacing: 0 8px;
    border-radius: 12px;
    overflow: hidden;
}

.table thead th {
    vertical-align: middle;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.table tbody tr {
    background-color: #ffffff;
    transition: all 0.3s ease;
    border-radius: 8px;
}

.table tbody tr:hover {
    background-color: #f4f8ff;
    transform: scale(1.02);
}

/* Buttons */
.btn-warning {
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-warning:hover {
    background-color: #ffc107;
    color: #000;
}

.btn-danger {
    border-radius: 8px;
    transition: all 0.2s ease;
}
.btn-danger:hover {
    background-color: #dc3545;
    color: #fff;
}

/* Back Button */
.btn-outline-secondary:hover {
    background-color: #f1f1f1 !important;
}

/* Responsiveness */
@media (max-width: 768px) {
    .card-header h5 {
        font-size: 1rem;
    }
    .table thead th {
        font-size: 0.8rem;
    }
    .btn {
        font-size: 0.8rem;
        padding: 4px 10px;
    }
}
</style>
