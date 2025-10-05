<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Santri;
use App\Models\M_Absensi;

class C_Absensi extends Controller
{

    public function __construct()
    {
        $this->tanggal = date("d");
        $this->bulan = date("m");
        $this->tahun = date("Y");
    }

    public function absensiPage()
    {
        $dataSantri = M_Santri::all();
        $dataAbsensi = M_Absensi::whereRaw('MONTH(created_at)='.$this->bulan)->whereRaw('DAY(created_at)='.$this->tanggal)->whereRaw('YEAR(created_at)='.$this->tahun)->get();
        $dr = [
            'dataSantri' => $dataSantri,
            'dataAbsensi' => $dataAbsensi,
        ];
        return view('mainApp.absensi.absensiPage', $dr);
    }
public function prosesAbsensi(Request $request)
{
    $idSantri = $request->idSantri;
    $tipe = $request->tipe; // 'active', 'ijin', 'alpha'
    $nilai = $request->nilai; // 1 atau 0

    $absensi = M_Absensi::firstOrNew([
        'id_santri' => $idSantri,
        'tanggal' => $this->tanggal,
        'bulan' => $this->bulan,
        'tahun' => $this->tahun,
    ]);

    $absensi->$tipe = $nilai;
    if (!$absensi->exists) {
        $absensi->token_absensi = Str::uuid();
    }
    $absensi->save();

    return response()->json(['status' => 'sukses']);
}


    public function prosesHapusAbsensi(Request $request)
    {
        M_Absensi::where('token_absensi', $request->token)->delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
