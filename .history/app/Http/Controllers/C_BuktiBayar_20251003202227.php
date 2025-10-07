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

}
