<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pendaftaran;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_santri' => 'required|string|max:200',
            'tempat_lahir' => 'required|string|max:200',
            'tanggal_lahir' => 'required|date',
            'nama_ortu' => 'required|string|max:200',
            'email' => 'required|email|max:100',
            'no_hp' => 'required|string|max:50',
            'jk' => 'required|string|max:10',
            'alamat' => 'required|string|max:200',
            'kelas' => 'required|string|max:50',
        ]);

        $id_pendaftaran = 'PD-' . strtoupper(Str::random(8));

        $pendaftaran = M_Pendaftaran::create([
            'id_pendaftaran' => $id_pendaftaran,
            'nama_santri' => $request->nama_santri,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ortu' => $request->nama_ortu,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'harapan' => $request->harapan,
            'kelas' => $request->kelas,
            'status' => null,
            'active' => '1',
        ]);

        try {
            Mail::raw("Terima kasih telah mendaftar. ID Pendaftaran Anda: $id_pendaftaran", function($message) use ($request){
                $message->to($request->email)
                        ->subject('Konfirmasi Pendaftaran SJAM Rumah Tahfidz');
            });
        } catch (\Exception $e) {}

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil!.'
        ]);
    }
}
