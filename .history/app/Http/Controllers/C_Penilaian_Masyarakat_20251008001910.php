<?php

namespace App\Http\Controllers;

use App\Models\M_PenilaianMasyarakat;
use Illuminate\Http\Request;

class C_Penilaian_Masyarakat extends Controller
{

    public function penilaianMasyarakatPage(){
        $penilaianMasyarakat = M_PenilaianMasyarakat::all();
        $dr = ['penilaianMasyarakat' => $penilaianMasyarakat];
        return view('mainApp.penilaianMasyarakat.penilaianMasyarakatPage', $dr);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'reason' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
        ]);

        M_PenilaianMasyarakat::create([
            'name' => $request->name,
            'reason' => $request->reason,
            'stars' => $request->stars,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas penilaian Anda!');
    }


    public function prosesHapusPenilaian(Request $request)
    {
        $token = $request->token;
        M_PenilaianMasyarakat::where('id', $token)->delete(); 
        // hapus cash flow
        $dr = ['status'=>'sukses'];
        return Response()->json($dr);
    }

}
