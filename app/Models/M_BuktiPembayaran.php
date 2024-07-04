<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_BuktiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'tbl_bukti_pembayaran';

    protected $fillable = [
        'id_santri',
        'nama_santri',
        'nama_orang_tua',
        'kelas',
        'nomor_handphone',
        'bukti_pembayaran_path',
    ];
}
