<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\C_Helper;
use App\Models\M_Kegiatan;
use App\Models\M_PenilaianMasyarakat;
use App\Models\M_Santri;
use App\Models\M_VideoKegiatan;

class C_Home extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }

    public function homePage()
    {
        $tSantri = M_Santri::count();
        $tKegiatan = M_Kegiatan::count();
        $dataKegiatan = M_Kegiatan::paginate(3);
        $dataVideoKegiatan = M_VideoKegiatan::paginate(3);
        $penilaianMasyarakat = M_PenilaianMasyarakat::all();
        $dataSetting = $this->helperCtr->getSetting();
        $dr = ['setting' => $dataSetting, 'dataKegiatan' => $dataKegiatan, 'tSantri' => $tSantri,
         'tKegiatan' => $tKegiatan, 'dataVideoKegiatan' => $dataVideoKegiatan, 'penilaianMasyarakat' => $penilaianMasyarakat];
        return view('home.homePage', $dr);
    }

    public function fotoKegiatan(){
        $dataKegiatan = M_Kegiatan::paginate(6);
        $dataSetting = $this->helperCtr->getSetting();

        $dr = ['dataKegiatan' => $dataKegiatan, 'setting' => $dataSetting];
        return view('home.fotoKegiatan', $dr);
    }

    public function videoKegiatan(){
        $dataVideoKegiatan = M_VideoKegiatan::paginate(6);
        $dataSetting = $this->helperCtr->getSetting();

        $dr = ['dataVideoKegiatan' => $dataVideoKegiatan, 'setting' => $dataSetting];
        return view('home.videoKegiatan', $dr);
    }
}
