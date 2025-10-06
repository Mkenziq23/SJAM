<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\M_Kafilah;
use App\Models\M_Santri;
use App\Models\M_Pengurus;

class M_Spp extends Model
{
    protected $table = "tbl_spp";

    protected $fillable = [
        'token_pembayaran',
        'id_santri',
        'bulan',
        'tahun',        // ✅ tambahkan
        'total',
        'id_pengurus',
        'active'
    ];

    public function santriData()
    {
        return $this->belongsTo(M_Santri::class, 'id_santri');
    }

    public function pengurusData()
    {
        return $this->belongsTo(M_Pengurus::class, 'id_pengurus');
    }

    public function tanggalPembayaran($tanggal)
    {
        if (!$tanggal) return '-';
        return Carbon::parse($tanggal)->format('d-m-Y');
    }

    public function kafilahData()
    {
        // ✅ akses langsung dari relasi santri
        return M_Kafilah::find($this->santriData->id_kafilah ?? null);
    }
}
