<?php

namespace App\Http\Controllers;

use App\Models\M_Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class C_Kegiatan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kegiatanPage()
    {
        $dataKegiatan = M_Kegiatan::all();
        $dr = ['dataKegiatan'=>$dataKegiatan];
        return view('mainApp.kegiatan.kegiatanPage', $dr);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getKegiatan($id)
    {
        $kegiatan = M_Kegiatan::find($id);
        if ($kegiatan) {
            return response()->json($kegiatan, 200);
        } else {
            return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
        }
    }

    public function prosesTambahKegiatan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tgl' => 'required|date',
            'tempat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kegiatan = new M_Kegiatan();
        $kegiatan->nama_kegiatan = $request->nama;
        $kegiatan->tanggal_kegiatan = $request->tgl;
        $kegiatan->tempat_kegiatan = $request->tempat;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('kegiatan');
            $kegiatan->image = $imageName;
        }

        $kegiatan->active = 1; 
        $kegiatan->save();
        
        return response()->json(['message' => 'Kegiatan berhasil ditambahkan'], 200);
    }

   public function prosesEditKegiatan(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tgl' => 'required|date',
            'tempat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kegiatan = M_Kegiatan::find($request->id);
        if (!$kegiatan) {
            return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
        }

        $kegiatan->nama_kegiatan = $request->nama;
        $kegiatan->tanggal_kegiatan = $request->tgl;
        $kegiatan->tempat_kegiatan = $request->tempat;

        if ($request->hasFile('image')) {
            Storage::delete($kegiatan->image); // Delete the old image
            $imageName = $request->file('image')->store('kegiatan');
            $kegiatan->image = $imageName;
        }

        $kegiatan->save();

        return response()->json(['message' => 'Kegiatan berhasil diubah'], 200);
    }



    public function prosesHapusKegiatan(Request $request)
    {
        $id = $request->id;
    $kegiatan = M_Kegiatan::find($id);
    if ($kegiatan) {
        Storage::delete($kegiatan->image);

        $kegiatan->delete();

        return response()->json(['message' => 'Kegiatan berhasil dihapus'], 200);
    } else {
        return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
    }
    }

 
}
