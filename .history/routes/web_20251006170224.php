<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Main_App;
use App\Http\Controllers\C_Santri;
use App\Http\Controllers\C_Pengurus;
use App\Http\Controllers\C_Spp;
use App\Http\Controllers\C_Absensi;
use App\Http\Controllers\C_BuktiBayar;
use App\Http\Controllers\C_Penggajian;
use App\Http\Controllers\C_Pengeluaran;
use App\Http\Controllers\C_Donasi;
use App\Http\Controllers\C_DonasiBarang;
use App\Http\Controllers\C_Cash_Flow;
use App\Http\Controllers\C_Kegiatan;
use App\Http\Controllers\C_Laporan_Keuangan;
use App\Http\Controllers\C_Rekap_Absensi;
use App\Http\Controllers\C_Setting;
use App\Http\Controllers\C_Pendaftaran;
use App\Http\Controllers\C_Penilaian_Masyarakat;
use App\Http\Controllers\C_Saldo;
use App\Http\Controllers\C_VideoKegiatan;
use App\Http\Controllers\PendaftaranController;

Route::get('/', [C_Home::class, 'homePage']);
Route::get('/foto-kegiatan', [C_Home::class, 'fotoKegiatan']);
Route::get('/video-kegiatan', [C_Home::class, 'videoKegiatan']);
Route::post('/ratings', [C_Penilaian_Masyarakat::class, 'store'])->name('ratings.store');
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');


Route::post('/check-data-santri', [C_Santri::class, 'checkDataSantriSetorSpp']);
Route::post('submit-pembayaran', [C_Santri::class, 'submitPembayaranAtc']);


// auth group
Route::group(['prefix' => 'auth'], function (){
    // login
    Route::group(['prefix' => 'login'], function (){
        Route::get('', [C_Auth::class, 'loginPage']);
        Route::post('process', [C_Auth::class, 'loginProcess']);
    });
    // log out
    Route::get('logout', [C_Auth::class, 'logoutProcess']);
    // registrasi
    Route::group(['prefix' => 'daftar'], function (){
        Route::post('proses', [C_Auth::class, 'daftarProses']);
        Route::get('{token}/cetak', [C_Auth::class, 'cetakBuktiPendaftaran']);
    });
});

Route::group(['prefix' => 'app', 'middleware' => 'auth'], function (){

    Route::get('/unauthorized', function () {
    return response()->view('errors.unauthorized', [], 403);
});


    Route::get('', [C_Main_App::class, 'mainAppPage']);
    Route::get('dashboard', [C_Main_App::class, 'dashboardPage']);
    // data santri
    Route::group(['prefix' => 'santri'], function (){
        Route::get('', [C_Santri::class, 'santriPage']);
        Route::post('add', [C_Santri::class, 'processAddSantri']);
        Route::post('delete', [C_Santri::class, 'processDeleteSantri']);
        Route::post('update', [C_Santri::class, 'processUpdateSantri']);
        Route::post('get-data', [C_Santri::class, 'restDataEdit']);
    });
    // data pengurus
   Route::group(['prefix' => 'pengurus'], function (){
    Route::get('', [C_Pengurus::class, 'pengurusPage']);
    Route::post('add', [C_Pengurus::class, 'processAddPengurus']);
    Route::post('delete', [C_Pengurus::class, 'processDeletePengurus']); 
});

    // pembayaran spp
    Route::group(['prefix' => 'pembayaran-spp'], function(){
        Route::get('', [C_Spp::class, 'pembayaranSppPage']);
        Route::post('proses', [C_Spp::class, 'prosesPembayaranSpp']);
        Route::get('cetak/{token}', [C_Spp::class, 'cetakPembayaranSpp'])->name('spp.cetak');
    });

    // bukti pembayaran spp
    Route::group(['prefix' => 'bukti-bayar'], function(){
       Route::get('', [C_BuktiBayar::class, 'buktiBayarPage']);

    });


    // absensi
    Route::group(['prefix' => 'absensi'], function (){
        Route::get('', [C_Absensi::class, 'absensiPage']);
        Route::post('add', [C_Absensi::class, 'prosesAbsensi']);
        Route::post('delete', [C_Absensi::class, 'prosesHapusAbsensi']);
    });
    // setting
    Route::group(['prefix' => 'setting'], function (){
        Route::get('', [C_Setting::class, 'settingPage']);
        Route::post('get-data', [C_Setting::class, 'getDataSetting']);
        Route::post('update', [C_Setting::class, 'prosesUpdateSetting']);
    });
    // saldo
    Route::group(['prefix' => 'saldo', 'middleware' => 'checkUserRole:1'], function (){
        Route::get('', [C_Saldo::class, 'saldoPage']);
    });
    
    // penggajian
    Route::group(['prefix' => 'penggajian', 'middleware' => 'checkUserRole:1'], function (){
        Route::get('', [C_Penggajian::class, 'penggajianPage']);
        Route::get('{id}', [C_Penggajian::class, 'getPenggajian']);
        Route::group(['prefix' => 'split'], function (){
            Route::post('proses', [C_Penggajian::class, 'prosesSplitPenggajian']);
        });
        Route::get('{token}/cetak', [C_Penggajian::class, 'cetakSlipGaji']);
    });

    // pengeluaran
    Route::group(['prefix' => 'pengeluaran', 'middleware' => 'checkUserRole:1' ], function (){
        Route::get('', [C_Pengeluaran::class, 'pengeluaranPage']);
        Route::post('tambah', [C_Pengeluaran::class, 'prosesTambahPengeluaran']);
        Route::post('hapus', [C_Pengeluaran::class, 'prosesHapusPengeluaran']);
    });
    // donasi uang
    Route::group(['prefix' => 'donasi', 'middleware' => 'checkUserRole:1'], function (){
        Route::get('', [C_Donasi::class, 'donasiPage']);
        Route::post('tambah', [C_Donasi::class, 'prosesTambahDonasi']);
        Route::post('hapus', [C_Donasi::class, 'prosesHapusDonasi']);
        Route::get('{token}/cetak', [C_Donasi::class, 'cetakPenerimaanDonasi']);
    });
    // donasi barang
    Route::group(['prefix' => 'donasi-barang', 'middleware' => 'checkUserRole:1'], function (){
        Route::get('', [C_DonasiBarang::class, 'donasiBarangPage']);
        Route::post('tambah', [C_DonasiBarang::class, 'prosesTambahDonasiBarang']); 
        Route::post('hapus', [C_DonasiBarang::class, 'prosesHapusDonasiBarang']); 
        Route::get('{token}/cetak', [C_DonasiBarang::class, 'cetakPenerimaanDonasiBarang']);
    });


    // cash flow
    Route::group(['prefix' => 'cash-flow', 'middleware' => 'checkUserRole:1'], function (){
        Route::get('', [C_Cash_Flow::class, 'cashFlow']);
    });
    // laporan keuangan
    Route::group(['prefix' => 'laporan-keuangan'], function (){
        Route::get('{tahun}', [C_Laporan_Keuangan::class, 'laporanKeuanganPage']);
        Route::get('{bulan}/{tahun}/cetak', [C_Laporan_Keuangan::class, 'cetakLaporanBulanan']);
    });
    // rekap absensi
    Route::group(['prefix' => 'rekap-absensi'], function (){
        Route::get('', [C_Rekap_Absensi::class, 'rekapAbsensiPage']);
        Route::get('set-rekap/{bulan}/{tahun}', [C_Rekap_Absensi::class, 'setRekapAbsensi']);
        Route::get('{id_santri}/{bulan}/{tahun}/cetak', [C_Rekap_Absensi::class, 'cetakRekapAbsensi']);
    });
    // penilaian masyarakat
    Route::group(['prefix' => 'penilaian-masyarakat'], function (){
        Route::get('', [C_Penilaian_Masyarakat::class, 'penilaianMasyarakatPage']);
        Route::post('hapus', [C_Penilaian_Masyarakat::class, 'prosesHapusPenilaian']);
    });

    // pendaftaran santri
    Route::group(['prefix' => 'pendaftaran'], function (){
       Route::get('', [C_Pendaftaran::class, 'pendaftaranPage']);
       Route::post('/get-data', [C_Pendaftaran::class, 'getDataPendaftaran']);
       Route::post('/action', [C_Pendaftaran::class, 'actionPendaftaran']);
    });
// routes/web.php
    Route::group(['prefix' => 'kegiatan'], function () {
        Route::get('', [C_Kegiatan::class, 'kegiatanPage']);
        Route::post('tambah', [C_Kegiatan::class, 'prosesTambahKegiatan']);
        Route::post('edit', [C_Kegiatan::class, 'prosesEditKegiatan']);
        Route::post('hapus', [C_Kegiatan::class, 'prosesHapusKegiatan']);
        Route::get('{id}', [C_Kegiatan::class, 'getKegiatan']);
    });

    // Video Kegiatan 
     Route::group(['prefix' => 'video-kegiatan'], function (){
    Route::get('', [C_VideoKegiatan::class, 'videoKegiatanPage']);
    Route::post('tambah', [C_VideoKegiatan::class, 'prosesTambahVideoKegiatan']);
    Route::get('{id}', [C_VideoKegiatan::class, 'getVideoKegiatan']);
    Route::post('edit', [C_VideoKegiatan::class, 'prosesEditVideoKegiatan']);
    Route::post('hapus', [C_VideoKegiatan::class, 'prosesHapusVideoKegiatan']);
});

});


