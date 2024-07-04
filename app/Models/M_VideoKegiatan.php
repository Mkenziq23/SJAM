<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_VideoKegiatan extends Model
{
    use HasFactory;

    protected $table = 'tbl_video_kegiatan';

    protected $fillable = ['nama_kegiatan', 'tanggal_kegiatan', 'tempat_kegiatan', 'image', 'link_video'];
}

