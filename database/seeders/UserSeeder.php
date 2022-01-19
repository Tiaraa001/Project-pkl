<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'izin admin',
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'izin pengguna',
        ]);

        $kasir = Role::create([
            'name' => 'kasir',
            'display_name' => 'izin kasir',
        ]);

        $UserAdmin = new User();
        $UserAdmin->name = 'Tiara Novita Sari';
        $UserAdmin->email = 'admin@gmail.com';
        $UserAdmin->password = Hash::make('rahasia');
        $UserAdmin->save();
        $UserAdmin->attachRole($admin);

        $UserPengguna = new User();
        $UserPengguna->name = 'Adya';
        $UserPengguna->email = 'adya@gmail.com';
        $UserPengguna->password = Hash::make('12345678');
        $UserPengguna->save();
        $UserPengguna->attachRole($pengguna);

    }
}
