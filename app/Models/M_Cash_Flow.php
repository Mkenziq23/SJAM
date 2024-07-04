<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\Models\M_Donasi;
use App\Models\M_Spp;
use App\Models\M_Pengeluaran;
use App\Models\M_Penggajian;

class M_Cash_Flow extends Model
{

    protected $table = "tbl_cash_flow";

    protected $fillable = [
        'token_flow',
        'flow',
        'id_event',
        'type',
        'total',
        'active'
    ];

    public function setDetail($type, $token)
{
    switch($type){
        case "DONASI":
            $d = M_Donasi::where('token', $token)->first();
            if ($d) {
                return "Donasi dari " . $d->nama_donatur;
            } else {
                return "Donasi tidak ditemukan";
            }
        case "PENGELUARAN":
            $d = M_Pengeluaran::where('token', $token)->first();
            if ($d) {
                return "Pembelian " . $d->nama_pengeluaran;
            } else {
                return "Pengeluaran tidak ditemukan";
            }
        case "PEMBAYARAN_SPP":
            $d = M_Spp::where('token_pembayaran', $token)->first();
            if ($d && $d->santriData) {
                return "Pembayaran spp santri " . $d->santriData->nama;
            } else {
                return "Pembayaran SPP tidak ditemukan";
            }
        case "PEMBAYARAN_GAJI":
            $d = M_Penggajian::where('token_penggajian', $token)->first();
            if ($d && $d->pengurusData) {
                return "Pembayaran gaji " . $d->pengurusData->nama;
            } else {
                return "Pembayaran gaji tidak ditemukan";
            }
        default:
            return "Tipe tidak valid";
    }
}


    public function setTanggal($tanggal)
    {
        return Carbon::parse($tanggal) -> format('d-m-Y');
    }

}
