<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBuktiPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bukti_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_santri');
            $table->string('nama_santri');
            $table->string('nama_orang_tua');
            $table->string('kelas');
            $table->string('nomor_handphone');
            $table->string('bukti_pembayaran_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_bukti_pembayaran');
    }
}
