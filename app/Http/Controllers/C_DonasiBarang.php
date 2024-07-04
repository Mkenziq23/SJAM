<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\M_DonasiBarang;
use App\Http\Controllers\C_Helper;
use App\Models\M_Setting;
use PDF;


class C_DonasiBarang extends Controller
{

    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donasiBarangPage()
    {
        $dataDonasiBarang = M_DonasiBarang::all();
        $dr = ['dataDonasiBarang'=>$dataDonasiBarang];
        return view('mainApp.donasiBarang.donasiBarangPage', $dr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prosesTambahDonasiBarang(Request $request)
    {
       $token = Str::uuid();
        $donasibarang = new M_DonasiBarang();
        $donasibarang->token = $token;
        $donasibarang->nama_donatur = $request->nama;
        $donasibarang->nama_barang = $request->namabarang;
        $donasibarang->tipe = $request->tipe;
        $donasibarang->tanggal_donasi = $request->tgl;
        $donasibarang->jumlah = $request->jumlah;
        $donasibarang->active = "1";
        $donasibarang->save();

        $this->helperCtr->createCashFlow($token, "MASUK", "DONASI", $request->jumlah);
        return response()->json(['status' => 'sukses']);
    }

    public function prosesHapusDonasiBarang(Request $request)
    {
        $token = $request->token;
        M_DonasiBarang::where('token', $token)->delete();
        // hapus cash flow
        $this->helperCtr->deleteCashFlow($token);
        $dr = ['status'=>'sukses'];
          return Response()->json($dr);

    }

       public function cetakPenerimaanDonasiBarang(Request $request, $token)
    {
        $dataDonasi = M_DonasiBarang::where('token', $token)->first();
        $dataSetting = $this->helperCtr->getSetting();
         $dataTahfiz = M_Setting::where('nama_setting', 'nama')->first();
        $dr = [
            'judul'=>'Penerimaan Infaq',
            'dataDonasi'=>$dataDonasi,
            'dataSetting'=>$dataSetting,
            'namaTahfiz' => $dataTahfiz->value
            
        ];
        $pdf = PDF::loadview('mainApp.donasibarang.cetakBuktiDonasiBarang', $dr);
        $pdf->setPaper('A4', 'portait');
        return $pdf->stream();
    }
}
