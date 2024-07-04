<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\C_Helper;
use App\Models\M_Pengeluaran;
use App\Models\M_Saldo;

class C_Pengeluaran extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function pengeluaranPage()
    {
        $dataPengeluaran = M_Pengeluaran::all();
        $dr = ['dataPengeluaran' => $dataPengeluaran];
        return view('mainApp.pengeluaran.pengeluaranPage', $dr);
    }
    public function prosesTambahPengeluaran(Request $request)
    {
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
                        
        // {'nama':nama, 'deks':deks, 'kategori':kategori, 'nominal':nominal, 'tgl':tgl}
        $token = Str::uuid();
        $expend = new M_Pengeluaran();
        $expend -> token = $token;
        $expend -> nama_pengeluaran = $request -> nama;
        $expend -> detail = $request -> deks;
        $expend -> kategori = $request -> kategori;
        $expend -> total = $request -> nominal;
        $expend -> tanggal_pengeluaran = $request -> tgl;
        $expend -> active = "1";
        $expend -> save();

        // Perbarui saldo
        $saldo->saldo_masuk -= $expend->total;
        $saldo->saldo_keluar += $expend->total;
        $saldo->save();

        // simpan cash flow 

        $this -> helperCtr -> createCashFlow($token, "KELUAR", "PENGELUARAN", $request -> nominal);
        $dr = ['status' => 'sukses'];
        return response()->json($dr);
    }
      public function prosesHapusPengeluaran(Request $request)
    {
        try {
            $token = $request->token;
            $pengeluaran = M_Pengeluaran::where('token', $token)->first();

            if ($pengeluaran) {
                // Perbarui saldo sebelum menghapus pengeluaran
                $saldo = M_Saldo::whereMonth('created_at', date('m'))
                                ->whereYear('created_at', date('Y'))
                                ->first();

                if ($saldo) {
                    $saldo->saldo_masuk += $pengeluaran->total;
                    $saldo->saldo_keluar -= $pengeluaran->total;
                    $saldo->save();
                }

                // Hapus pengeluaran
                $pengeluaran->delete();

                // Hapus cash flow
                $this->helperCtr->deleteCashFlow($token);
            }

            $dr = ['status' => 'sukses'];
            return response()->json($dr);
        } catch (\Exception $e) {
            // Tambahkan log pesan kesalahan ke log aplikasi atau tampilkan di konsol
            \Log::error('Error in deleting pengeluaran: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan dalam menghapus pengeluaran.'], 500);
        }
    }
}
