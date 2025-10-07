<?php

namespace App\Http\Controllers;

use App\Models\M_BuktiPembayaran;
use Illuminate\Http\Request;

class C_BuktiBayar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buktiBayarPage()
    {
        $dataBuktiBayar = M_BuktiPembayaran::all();

        return view('mainApp.buktiSpp.BuktiBayarPage', ['dataBuktiBayar' => $dataBuktiBayar]);

    }

    public function checkDataSantri(Request $request)
    {
        $santri = Santri::where('no_hp', $request->hp)->first();

        if (!$santri) {
            return response()->json(['success' => false]);
        }

        $sudahBayar = BuktiPembayaran::where('id_santri', $santri->id)
            ->whereMonth('created_at', now()->month)
            ->exists();

        return response()->json([
            'success' => true,
            'id_santri' => $santri->id,
            'nama_santri' => $santri->nama,
            'nama_orang_tua' => $santri->nama_orang_tua,
            'kelas' => $santri->kelas,
            'status_bayar' => $sudahBayar ? 'sudah' : 'belum'
        ]);
    }


}
