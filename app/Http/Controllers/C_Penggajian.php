<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\C_Helper;
use App\Models\M_Pengurus;
use App\Models\M_Penggajian;
use App\Models\M_Saldo;
use App\Models\M_Setting;

class C_Penggajian extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }

    public function penggajianPage()
    {
        $dataPengurus = M_Pengurus::all();
        $dataPenggajian = M_Penggajian::all();
        $dr = ['dataPengurus' => $dataPengurus, 'dataPenggajian' => $dataPenggajian];
        return view('mainApp.penggajian.penggajianPage', $dr);
    }

    public function prosesSplitPenggajian(Request $request)
    {
        // Ambil bulan dan tahun saat ini
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Ambil entri saldo untuk bulan ini
        $saldo = M_Saldo::whereMonth('created_at', $currentMonth)
                        ->whereYear('created_at', $currentYear)
                        ->first();

        // Buat entri baru jika belum ada untuk bulan ini
        if (!$saldo) {
            // Ambil saldo masuk dari bulan sebelumnya jika ada
            $previousMonthSaldo = M_Saldo::orderBy('created_at', 'desc')
                                        ->whereMonth('created_at', '<', $currentMonth)
                                        ->first();

            if ($previousMonthSaldo) {
                // Jika ada saldo masuk dari bulan sebelumnya, gunakan saldo tersebut
                $saldo = M_Saldo::create([
                    'saldo_masuk' => $previousMonthSaldo->saldo_masuk,
                    'saldo_keluar' => 0
                ]);
            } else {
                // Jika tidak ada saldo masuk dari bulan sebelumnya, buat entri baru dengan saldo_masuk 0
                $saldo = M_Saldo::create([
                    'saldo_masuk' => 0,
                    'saldo_keluar' => 0
                ]);
            }
        }

        // Buat entri penggajian baru
        $token = Str::uuid();
        $split = new M_Penggajian();
        $split->token_penggajian = $token;
        $split->id_pengurus = $request->idPengurus;
        $split->tanggal_pembayaran = $request->tgl;
        $split->gaji_pokok = $request->gp;
        $split->tunjangan = $request->tun;
        $split->cap_tunjangan = $request->capTun;
        $split->potongan = $request->pot;
        $split->cap_potongan = $request->capPot;
        $split->total_gaji = $request->gp + $request->tun - $request->pot;
        $split->active = "1";
        $split->save(); 

        // Perbarui saldo
        $saldo->saldo_masuk -= $split->total_gaji;
        $saldo->saldo_keluar += $split->total_gaji;
        $saldo->save();

        // Simpan cash flow 
        $this->helperCtr->createCashFlow($token, "KELUAR", "PEMBAYARAN_GAJI", $split->total_gaji);

        // Kirim respons JSON
        $dr = ['status' => 'sukses', 'token' => $token];
        return response()->json($dr);
    }

    public function prosesHapusPenggajian(Request $request)
    {
        try {
            $token = $request->token;
            $penggajian = M_Penggajian::where('token_penggajian', $token)->first();

            if ($penggajian) {
                // Perbarui saldo sebelum menghapus penggajian
                $saldo = M_Saldo::whereMonth('created_at', date('m'))
                                ->whereYear('created_at', date('Y'))
                                ->first();

                if ($saldo) {
                    $saldo->saldo_masuk += $penggajian->total_gaji;
                    $saldo->saldo_keluar -= $penggajian->total_gaji;
                    $saldo->save();
                }

                // Hapus penggajian
                $penggajian->delete();
                 // Hapus cash flow
            $this->helperCtr->deleteCashFlow($token);
                
            }

            $dr = ['status' => 'sukses'];
            return response()->json($dr);
        } catch (\Exception $e) {
            // Tambahkan log pesan kesalahan ke log aplikasi atau tampilkan di konsol
            \Log::error('Error in deleting penggajian: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan dalam menghapus penggajian.'], 500);
        }
    }

    public function cetakSlipGaji(Request $request, $token)
    {
        $dataGaji = M_Penggajian::where('token_penggajian', $token)->first();
        $dataTahfiz = M_Setting::where('nama_setting', 'nama')->first();
        $dataSetting = $this->helperCtr->getSetting();
        $dr = ['judul' => 'Slip Gaji', 'dataGaji' => $dataGaji, 'namaTahfiz' => $dataTahfiz->value, 'dataSetting' => $dataSetting];
        $pdf = PDF::loadview('mainApp.penggajian.cetakSlipGaji', $dr);
        $pdf->setPaper('A4', 'portait');
        return $pdf->stream();
    }
}
