<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDonasiBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_donasi_barang', function (Blueprint $table) {
            $table -> id();
            $table -> char('token', 50);
            $table -> char('nama_donatur', 200);
            $table -> string('nama_barang') -> nullable();
            $table -> char('tipe', 30);
            $table -> date('tanggal_donasi');
            $table -> integer('jumlah');
            $table -> timestamps(); 
            $table -> char('active', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_donasi_barang');
    }
}
