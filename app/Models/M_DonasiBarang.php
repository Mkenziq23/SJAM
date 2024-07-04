<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_DonasiBarang extends Model
{
    use HasFactory;

     protected $table = "tbl_donasi_barang";

    protected $fillable = [
        'token',
        'nama_donatur',
        'detail',
        'tipe',
        'tanggal_donasi',
        'nominal',
        'active'
    ];
}
