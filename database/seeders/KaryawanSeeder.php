<?php

namespace Database\Seeders;

use App\Models\karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $karyawan = karyawan::create(['nama' => 'Adya Eka Amelia', 'alamat' => 'Cibedug', 'nik' => 20328901, 'no_telp' => 839210]);

    }
}
