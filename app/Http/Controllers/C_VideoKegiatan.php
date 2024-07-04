<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_VideoKegiatan;
use Illuminate\Support\Facades\Storage;

class C_VideoKegiatan extends Controller
{
    public function videoKegiatanPage()
    {
        $dataVideoKegiatan = M_VideoKegiatan::all();
        $dr = ['dataVideoKegiatan' => $dataVideoKegiatan];
        return view('mainApp.videoKegiatan.videoKegiatanPage', $dr);
    }

    public function prosesTambahVideoKegiatan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tgl' => 'required|date',
            'tempat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'linkVideo' => 'required',
        ]);

        $videoKegiatan = new M_VideoKegiatan();
        $videoKegiatan->nama_kegiatan = $request->nama;
        $videoKegiatan->tanggal_kegiatan = $request->tgl;
        $videoKegiatan->tempat_kegiatan = $request->tempat;
        $videoKegiatan->link_video = $request->linkVideo;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('thumbnail-video-kegiatan');
            $videoKegiatan->image = $imageName;
        }

        $videoKegiatan->save();

        return response()->json(['message' => 'Video Kegiatan berhasil ditambahkan'], 200);
    }

    public function getVideoKegiatan($id)
    {
        $videoKegiatan = M_VideoKegiatan::find($id);
        if ($videoKegiatan) {
            return response()->json($videoKegiatan, 200);
        } else {
            return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
        }
    }

    public function prosesEditVideoKegiatan(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tgl' => 'required|date',
            'tempat' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'linkVideo' => 'required',
        ]);

        $videoKegiatan = M_VideoKegiatan::find($request->id);
        if (!$videoKegiatan) {
            return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
        }

        $videoKegiatan->nama_kegiatan = $request->nama;
        $videoKegiatan->tanggal_kegiatan = $request->tgl;
        $videoKegiatan->tempat_kegiatan = $request->tempat;
        $videoKegiatan->link_video = $request->linkVideo;

        if ($request->hasFile('image')) {
            if ($videoKegiatan->image) {
                Storage::delete($videoKegiatan->image);
            }
            $imageName = $request->file('image')->store('thumbnail-video-kegiatan');
            $videoKegiatan->image = $imageName;
        }

        $videoKegiatan->save();

        return response()->json(['message' => 'Video Kegiatan berhasil diupdate'], 200);
    }

    public function prosesHapusVideoKegiatan(Request $request)
    {
        $id = $request->id;
        $videoKegiatan = M_VideoKegiatan::find($id);
        if ($videoKegiatan) {
            Storage::delete($videoKegiatan->image);
            $videoKegiatan->delete();
            return response()->json(['message' => 'Kegiatan berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
        }
    }
}
