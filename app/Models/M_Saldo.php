<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Saldo extends Model
{
    use HasFactory;

    protected $table = 'tbl_saldo';
    protected $fillable = ['saldo_masuk', 'saldo_keluar'];
}
