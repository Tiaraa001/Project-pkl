<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obat = obat::create(['kode' => 'B001', 'nama' => 'Oskadon', 'harga' => 5000, 'stok' => 100, 'satuan' => 'kaplet'] );
        $obat1 = obat::create(['kode' => 'B002', 'nama' => 'Paramex', 'harga' => 5000, 'stok' => 100, 'satuan' => 'kaplet']);
        $obat2 = obat::create(['kode' => 'B003', 'nama' => 'Insana', 'harga' => 5000, 'stok' => 100, 'satuan' => 'kaplet']);
        $obat3 = obat::create(['kode' => 'B004', 'nama' => 'Bodrex', 'harga' => 5000, 'stok' => 100, 'satuan' => 'kaplet']);
        $obat4 = obat::create(['kode' => 'BOO5', 'nama' => 'Osagi', 'harga' => 5000, 'stok' => 100, 'satuan' => 'kaplet']);



    }
}
