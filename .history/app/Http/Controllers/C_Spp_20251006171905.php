<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Controllers\C_Helper;
use App\Models\M_Santri;
use App\Models\M_Spp;
use App\Models\M_Pengurus;
use App\Models\M_Setting;


class C_Spp extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }

    public function pembayaranSppPage()
    {
        $dataSpp = M_Spp::all();
        $dataSantri = M_Santri::all();
        $dataPengurus = M_Pengurus::where("jabatan", "ADMINISTRASI")->get();
        $dr = [
            "dataSantri"=>$dataSantri,
            "dataSpp" => $dataSpp,
            "dataPengurus"=>$dataPengurus
        ];
        return view("mainApp.spp.pembayaranSpp", $dr);
    }
    public function prosesPembayaranSpp(Request $request)
    {

        $token = Str::uuid();
        $spp = new M_Spp();
        $spp->token_pembayaran = $token;
        $spp->id_santri = $request->idSantri;
        $spp->bulan = $request->bulan;
        $spp->tahun = $request->tahun;
        $spp->total = $request->total;
        $spp->id_pengurus = $request->petugas;
        $spp->active = "1";
        $spp->save();
        // simpan cash flow
        $this->helperCtr->createCashFlow($token, "MASUK", "PEMBAYARAN_SPP", $request->total);
        $dr = ["status" =>"sukses"];
       return response()->json($dr);
    }


    public function cetakPembayaranSpp(Request $request, $token)
    {
        $spp = M_Spp::where('token_pembayaran', $token)
            ->with(['santriData', 'pengurusData'])
            ->first();

        if (!$spp) {
            abort(404, 'Data tidak ditemukan');
        }

        // Ambil data setting lembaga
        $settings = M_Setting::pluck('value', 'kd_setting')->toArray();

        // Buat data untuk view PDF
        $data = [
            'spp' => $spp,
            'tanggal' => \Carbon\Carbon::parse($spp->created_at)->translatedFormat('d F Y'),
            'setting' => $settings
        ];

        $pdf = \PDF::loadView('mainApp.spp.cetakBuktiPembayaran', $data)
            ->setPaper('A5', 'portrait');

        return $pdf->stream('bukti_pembayaran_'.$spp->santriData->nama.'.pdf');
    }


}
