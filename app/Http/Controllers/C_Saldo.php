<?php
namespace App\Http\Controllers;

use App\Models\M_Donasi;
use App\Models\M_Saldo;
use App\Models\M_Setting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class C_Saldo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saldoPage()
    {

        
        $saldoData = M_Saldo::all();
        $tDonasi = M_Donasi::sum('nominal');

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        
        $dataTahfiz = M_Setting::where('nama_setting', 'nama')->first();

        $tDonasiBulanIni = M_Donasi::whereMonth('tanggal_donasi', $currentMonth)->whereYear('tanggal_donasi', $currentYear)->sum('nominal');
        $tDonasiTahunIni = M_Donasi::whereYear('tanggal_donasi', $currentYear)->sum('nominal');

        $lastUpdate = M_Saldo::max('updated_at');

        $saldoMasuk = M_Saldo::where('updated_at', '>=', $lastUpdate)->sum('saldo_masuk');

        $saldoKeluar = M_Saldo::where('updated_at', '>=', $lastUpdate)->sum('saldo_keluar');

        $dr = [
            'tDonasi' => $tDonasi,
            'tDonasiBulanIni' => $tDonasiBulanIni,
            'tDonasiTahunIni' => $tDonasiTahunIni,
            'namaTahfiz' => $dataTahfiz->value,
            'saldoMasuk' => $saldoMasuk,
            'saldoKeluar' => $saldoKeluar,
            'saldoData' => $saldoData
        ];

        return view('mainApp.saldo.saldoPage', $dr);
    }

}
