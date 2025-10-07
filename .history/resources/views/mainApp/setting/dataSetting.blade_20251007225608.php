<!-- ✅ Data Setting -->
<div id="divDataSetting" class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary"><i class="fas fa-cogs me-2"></i> Data Setting</h4>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tblDataSetting" class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Setting</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataSetting as $setting)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><b>{{ $setting->nama_setting }}</b></td>
                                <td>{{ $setting->value }}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3"
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

<!-- ✅ Edit Setting -->
<div id="divEditDataSetting" class="container-fluid px-4 py-4" style="display: none;">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <button class="btn btn-outline-secondary btn-lg fw-semibold px-4 py-2" style="font-size: 1.1rem;"
            @click="kembaliAtc()">
            <i class="fas fa-arrow-left me-2"></i> Kembali
        </button>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 mt-3">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Setting</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Setting</label>
                        <input type="text" class="form-control" id="txtNamaSetting" readonly
                            placeholder="Nama setting">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai</label>
                        <input type="text" class="form-control" id="txtNilaiSetting" placeholder="Nilai setting">
                    </div>
                    <div>
                        <button class="btn btn-primary btn-lg w-100 rounded-pill fw-semibold" onclick="updateProsesAtc()">
                            <i class="fas fa-save me-2"></i> Update Setting
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Custom CSS -->
<style>
.card {
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 0.75rem 1.25rem rgba(0, 0, 0, 0.1);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #007bff, #00bfff);
    color: #fff;
}

.table thead {
    font-weight: bold;
    background-color: #e9f3ff !important;
}

.table tbody tr:hover {
    background-color: #f5faff;
    transition: 0.2s;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: white;
}
</style>
