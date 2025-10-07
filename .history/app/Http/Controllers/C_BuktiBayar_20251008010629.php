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
        $hp = $request->hp;
        $santri = M_Santri::where('no_hp', $hp)->first();

        if (!$santri) {
            return response()->json(['success' => false]);
        }

        $bulan = now()->format('F');
        $tahun = now()->year;

        // Cek apakah sudah ada data pembayaran bulan ini
        $sudahBayar = DB::table('tbl_spp')
            ->where('id_santri', $santri->id)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->exists();

        // Jika belum, cek di tabel setor pembayaran
        if (!$sudahBayar) {
            $sudahBayar = DB::table('tbl_setor_pembayaran')
                ->where('nama_santri', 'like', "%{$santri->nama}%")
                ->whereMonth('created_at', now()->month)
                ->exists();
        }

        return response()->json([
            'success' => true,
            'id_santri' => $santri->id,
            'nama_santri' => $santri->nama,
            'nama_orang_tua' => $santri->nama_orang_tua,
            'kelas' => $santri->kelas,
            'status_bayar' => $sudahBayar ? 'sudah' : 'belum'
        ]);
    }

    public function submitPembayaranAtc(Request $request)
    {
        $request->validate([
            'id_santri' => 'required',
            'nama_santri' => 'required',
            'nama_orang_tua' => 'required',
            'kelas' => 'required',
            'nomor_handphone' => 'required',
            'bukti_pembayaran' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        $file = $request->file('bukti_pembayaran');
        $path = $file->store('bukti_pembayaran', 'public');

        M_BuktiPembayaran::create([
            'id_santri' => $request->id_santri,
            'nama_santri' => $request->nama_santri,
            'nama_orang_tua' => $request->nama_orang_tua,
            'kelas' => $request->kelas,
            'nomor_handphone' => $request->nomor_handphone,
            'bukti_pembayaran_path' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Bukti pembayaran berhasil diunggah.'
        ]);
    }


}
