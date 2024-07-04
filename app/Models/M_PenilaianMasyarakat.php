<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_PenilaianMasyarakat extends Model
{
    use HasFactory;

    protected $table = 'tbl_penilaian_masyarakat';

    protected $fillable = [
        'name',
        'reason',
        'stars',
    ];
}
