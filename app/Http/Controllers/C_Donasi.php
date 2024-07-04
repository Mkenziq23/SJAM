<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\C_Helper;
use App\Models\M_Donasi;
use App\Models\M_Saldo;
use App\Models\M_Setting;

class C_Donasi extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }

    public function donasiPage()
    {
        $dataDonasi = M_Donasi::all();
        $dr = ['dataDonasi' => $dataDonasi];
        return view('mainApp.donasi.donasiPage', $dr);
    }

    public function prosesTambahDonasi(Request $request)
    {
        // Ambil bulan dan tahun saat ini
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Cek apakah sudah ada entri saldo untuk bulan ini
        $saldo = M_Saldo::whereMonth('created_at', $currentMonth)
                        ->whereYear('created_at', $currentYear)
                        ->first();

        if (!$saldo) {
            // Jika belum ada entri saldo untuk bulan ini, buat entri baru
            $saldo = M_Saldo::create([
                'saldo_masuk' => $request->nominal,
                'saldo_keluar' => 0
            ]);
        } else {
            // Jika sudah ada entri saldo untuk bulan ini, tambahkan nominal baru ke saldo masuk yang ada
            $saldo->saldo_masuk += $request->nominal;
            $saldo->save();
        }

        // Buat transaksi donasi baru
        $token = Str::uuid();
        $donasi = new M_Donasi();
        $donasi->token = $token;
        $donasi->nama_donatur = $request->nama;
        $donasi->detail = $request->detail;
        $donasi->tipe = $request->tipe;
        $donasi->tanggal_donasi = $request->tgl;
        $donasi->nominal = $request->nominal;
        $donasi->active = "1";
        $donasi->save();

        // Buat cash flow
        $this->helperCtr->createCashFlow($token, "MASUK", "DONASI", $request->nominal);

        $dr = ['status' => 'sukses'];
        return response()->json($dr);
    }

    public function prosesHapusDonasi(Request $request)
    {
        try {
            $token = $request->token;
            $donasi = M_Donasi::where('token', $token)->first();

            if ($donasi) {
                // Perbarui saldo sebelum menghapus donasi
                $saldo = M_Saldo::whereMonth('created_at', date('m'))
                                ->whereYear('created_at', date('Y'))
                                ->first();

                if ($saldo) {
                    $saldo->saldo_masuk -= $donasi->nominal;
                    $saldo->save();
                }

                // Hapus donasi
                $donasi->delete();

                // Hapus cash flow
                $this->helperCtr->deleteCashFlow($token);
            }

            $dr = ['status' => 'sukses'];
            return response()->json($dr);
        } catch (\Exception $e) {
            // Tambahkan log pesan kesalahan ke log aplikasi atau tampilkan di konsol
            \Log::error('Error in deleting donasi: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan dalam menghapus donasi.'], 500);
        }
    }

    public function cetakPenerimaanDonasi(Request $request, $token)
    {
        $dataDonasi = M_Donasi::where('token', $token)->first();
        $dataSetting = $this->helperCtr->getSetting();
        $dataTahfiz = M_Setting::where('nama_setting', 'nama')->first();
        $dr = [
            'judul' => 'Penerimaan Donasi',
            'dataDonasi' => $dataDonasi,
            'dataSetting' => $dataSetting,
            'namaTahfiz' => $dataTahfiz->value
        ];
        $pdf = PDF::loadview('mainApp.donasi.cetakBuktiDonasi', $dr);
        $pdf->setPaper('A4', 'portait');
        return $pdf->stream();
    }
}
