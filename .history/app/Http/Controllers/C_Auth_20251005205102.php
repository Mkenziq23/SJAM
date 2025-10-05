<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\M_User;
use App\Models\M_Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\M_Pendaftaran;
use App\Http\Controllers\C_Helper;
use Illuminate\Support\Facades\Auth;

class C_Auth extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this->helperCtr = $helperCtr;
    }

    public function loginPage()
    {
          $dataSetting = $this->helperCtr->getSetting();
        $dr = ['setting'=>$dataSetting,
        ];
        return view('auth.loginPage', $dr);
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect ke view mainAppPage
            $redirectUrl = route('mainAppPage'); // gunakan route named jika ada
            $message = 'Login berhasil.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'redirect' => $redirectUrl,
                ]);
            }

            return redirect()->intended($redirectUrl);
        } else {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Username atau password salah',
                ]);
            }
            return back()->withErrors(['username' => 'Username atau password salah']);
        }
    }



    public function logoutProcess()
    {
            Auth::logout();
    return redirect('/auth/login');
    }

    public function daftarProses(Request $request)
    {
        $token = Str::uuid();
        $daftar = new M_Pendaftaran();
        $daftar->id_pendaftaran = $token;
        $daftar->nama_santri = $request -> nama;
        $daftar->email = $request -> email;
        $daftar->no_hp = $request -> hp;
        $daftar->jk = $request -> jk;
        $daftar->alamat = $request -> alamat;
        $daftar->harapan = $request -> harapan;
        $daftar->kelas = $request -> kelas;
        $daftar->active = "1";
        $daftar->tempat_lahir = $request -> tmpt;
        $daftar->tanggal_lahir = $request -> tgl;
        $daftar->nama_ortu = $request -> ortu;
        $daftar->save();
        $dr = [
            'status'=>'success',
            'token'=>$token
        ];
        return Response()->json($dr);
    }

    public function cetakBuktiPendaftaran(Request $request, $token)
    {
        $dataSetting = $this->helperCtr->getSetting();
        $dPendaftaran = M_Pendaftaran::where('id_pendaftaran', $token)->first();
        $dataTahfiz = M_Setting::where('nama_setting', 'nama')->first();
        $dr = [
            'judul'=>'Bukti Pendaftaran',
            'dp'=>$dPendaftaran,
            'dataSetting'=>$dataSetting,
            'namaTahfiz' => $dataTahfiz->value, 
        ];
        $pdf = PDF::loadview('auth.cetakBuktiPendaftaran', $dr);
        $pdf->setPaper('A4', 'portait');
        return $pdf->stream();
    }
    

}
