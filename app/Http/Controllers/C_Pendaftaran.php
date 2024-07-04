<?php

namespace App\Http\Controllers;

use App\Models\M_Santri;
use Illuminate\Http\Request;
use App\Models\M_Pendaftaran;
use App\Models\M_Kafilah;

class C_Pendaftaran extends Controller
{
    protected $helperCtr;
    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }

    public function pendaftaranPage()
    {
        $dataPendaftaran = M_Pendaftaran::all();
        $dr = ["dataPendaftaran"=>$dataPendaftaran, "dataKafilah"=>M_Kafilah::all()];
        return view("mainApp.pendaftaran.pendaftaranPage", $dr);
    }

    public function getDataPendaftaran(Request $request)
    {
        $fData = M_Pendaftaran::where("id_pendaftaran", $request->kd)->first();
        $dr = [
            "success"=>true,
            "data"=>$fData
        ];
         return response()->json($dr);
    }

public function actionPendaftaran(Request $request)
{
    $kdPendaftaran = $request->kd;
    $action = $request->action;

    if($action == 'approve') {
        // Ubah status pendaftaran menjadi 'DITERIMA'
        $pendaftaran = M_Pendaftaran::where('id_pendaftaran', $kdPendaftaran)->first();
        $pendaftaran->status = 'DITERIMA';
        $pendaftaran->save();

        $dataPendaftaran = M_Pendaftaran::where('id_pendaftaran', $kdPendaftaran)->first();

        $santri = new M_Santri();
        $santri->id_santri = $this->createIdSantri(); 
        $santri->nama = $dataPendaftaran->nama_santri;
        $santri->jk = $dataPendaftaran->jk;
        $santri->tanggal_lahir = $dataPendaftaran->tanggal_lahir;
        $santri->tempat_lahir = $dataPendaftaran->tempat_lahir;
        $santri->alamat = $dataPendaftaran->alamat;
        $santri->no_hp = $dataPendaftaran->no_hp;
        $santri->email = $dataPendaftaran->email;
        $santri->id_kafilah = $request->kafilah;
        $santri->kelas = $dataPendaftaran->kelas;
        $santri->status_ortu = 'LENGKAP'; 
        $santri->nama_ortu = $dataPendaftaran->nama_ortu;
        $santri->active = '1'; 
        $santri->save();

        $message = "Pendaftaran santri dengan kode $kdPendaftaran yang bernama $dataPendaftaran->nama_santri telah disetujui dan data santri telah ditambahkan.";
    } elseif($action == 'deny') {
        $pendaftaran = M_Pendaftaran::where('id_pendaftaran', $kdPendaftaran)->first();
        $santri = M_Santri::where('nama', $pendaftaran->nama_santri)->first();
        if($santri) {
            $santri->delete();
            $message = "Pendaftaran santri dengan kode **$kdPendaftaran** dengan nama **$pendaftaran->nama_santri** telah ditolak dan data santri telah dihapus.";
        } else {
            $message = "Data santri tidak ditemukan.";
        }

        $pendaftaran->status = 'TIDAK DITERIMA';
        $pendaftaran->save();
    } else {
        $message = "Aksi tidak valid.";
    }

    $dr = [
        "success" => true,
        "message" => $message,
        "status" => 'sukses'
    ];
    return response()->json($dr);
}



    function createIdSantri():string
    {
        $dSantri = M_Santri::orderBy("id", "DESC")->first();
        $lastIdSantri = $dSantri->id_santri;

        $exId = explode("-", $lastIdSantri);
        $numLast = intval($exId[1]) + 1;
        $huruf = "SN-";
        return $huruf . sprintf("%07s", $numLast);
    }
}
