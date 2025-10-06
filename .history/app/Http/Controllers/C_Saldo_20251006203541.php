<?php

namespace App\Http\Controllers;

use App\Models\M_Donasi;
use App\Models\M_Saldo;
use App\Models\M_Setting;
use Illuminate\Http\Request;
use Carbon\Carbon;

class C_Saldo extends Controller
{
    public function saldoPage()
    {
        // Ambil semua data saldo
        $saldoData = M_Saldo::all();

        // Total donasi
        $tDonasi = M_Donasi::sum('nominal');

        // Bulan dan tahun sekarang
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Ambil nama tahfiz, jika tidak ada gunakan "-"
        $dataTahfiz = M_Setting::where('nama_setting', 'nama')->first();
        $namaTahfiz = $dataTahfiz ? $dataTahfiz->value : '-';

        // Total donasi bulan ini
        $tDonasiBulanIni = M_Donasi::whereMonth('tanggal_donasi', $currentMonth)
                            ->whereYear('tanggal_donasi', $currentYear)
                            ->sum('nominal');

        // Total donasi tahun ini
        $tDonasiTahunIni = M_Donasi::whereYear('tanggal_donasi', $currentYear)
                            ->sum('nominal');

        // Ambil saldo terbaru
        $lastUpdate = M_Saldo::max('updated_at');
        if ($lastUpdate) {
            $saldoMasuk = M_Saldo::where('updated_at', '>=', $lastUpdate)->sum('saldo_masuk');
            $saldoKeluar = M_Saldo::where('updated_at', '>=', $lastUpdate)->sum('saldo_keluar');
        } else {
            $saldoMasuk = 0;
            $saldoKeluar = 0;
        }

        // Kirim data ke view
        return view('mainApp.saldo.saldoPage', [
            'tDonasi' => $tDonasi,
            'tDonasiBulanIni' => $tDonasiBulanIni,
            'tDonasiTahunIni' => $tDonasiTahunIni,
            'namaTahfiz' => $namaTahfiz,
            'saldoMasuk' => $saldoMasuk,
            'saldoKeluar' => $saldoKeluar,
            'saldoData' => $saldoData
        ]);
    }
}
