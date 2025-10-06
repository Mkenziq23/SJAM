<?php

namespace App\Http\Controllers;

use App\Models\M_Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class C_Kegiatan extends Controller
{
    /**
     * Menampilkan halaman kegiatan
     */
    public function kegiatanPage()
    {
        $dataKegiatan = M_Kegiatan::all();
        $dr = ['dataKegiatan' => $dataKegiatan];
        return view('mainApp.kegiatan.kegiatanPage', $dr);
    }

    /**
     * Mengambil data kegiatan berdasarkan ID
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

    /**
     * Proses tambah kegiatan
     */
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
            // Simpan di storage/app/public/foto_kegiatan
            $imageName = $request->file('image')->store('public/foto_kegiatan');
            // Hapus prefix 'public/' untuk dipakai di URL
            $kegiatan->image = str_replace('public/', '', $imageName);
        }

        $kegiatan->active = 1; 
        $kegiatan->save();
        
        return response()->json(['message' => 'Kegiatan berhasil ditambahkan'], 200);
    }

    /**
     * Proses edit kegiatan
     */
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
            // Hapus file lama jika ada
            if ($kegiatan->image && Storage::exists('public/' . $kegiatan->image)) {
                Storage::delete('public/' . $kegiatan->image);
            }
            // Simpan file baru
            $imageName = $request->file('image')->store('foto_kegiatan');
            $kegiatan->image = str_replace('public/', '', $imageName);
        }

        $kegiatan->save();

        return response()->json(['message' => 'Kegiatan berhasil diubah'], 200);
    }

    /**
     * Proses hapus kegiatan
     */
    public function prosesHapusKegiatan(Request $request)
    {
        $id = $request->id;
        $kegiatan = M_Kegiatan::find($id);
        if ($kegiatan) {
            // Hapus file gambar jika ada
            if ($kegiatan->image && Storage::exists('public/' . $kegiatan->image)) {
                Storage::delete('public/' . $kegiatan->image);
            }
            $kegiatan->delete();

            return response()->json(['message' => 'Kegiatan berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Kegiatan tidak ditemukan'], 404);
        }
    }
}
