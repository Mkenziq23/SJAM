<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\M_Setting;

class S_Setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this -> addSetting("nama", "Rumah Tahfidz Qur'an Sjam");
        $this -> addSetting("pembina", "Luluk Handayani ");
        $this -> addSetting("email", "sjam@gmail.com");
        $this -> addSetting("hp", "085230002015");
        $this -> addSetting("alamat", "Darungan, Kemuning Lor, Kec. Arjasa, Kabupaten Jember, Jawa Timur 68191");
        $this -> addSetting("bank", "nama bank");
        $this -> addSetting("noRek", "08676539");
        $this -> addSetting("motto", "menciptakan generasi qur'ani yang berakhlakul karimah serta menjunjung tinggi nilai keislaman.");
    }

    function addSetting($nama, $value)
    {
        $ns = new M_Setting();
        $ns -> kd_setting = Str::uuid();
        $ns -> nama_setting = $nama;
        $ns -> value = $value;
        $ns -> save();
    }

}
