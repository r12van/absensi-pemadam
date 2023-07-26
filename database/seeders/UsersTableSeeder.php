<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Pemimpin Kelompok',
            'email' => 'pemimpin.kelompok@absensi-anggota.co.id',
            'username' => 'pemimpin.kelompok',
            'email_verified_at' => now(),
            'password' => Hash::make('pemimpin.kelompok'), // Ganti dengan password yang diinginkan
            'role' => 'kelompok',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat data dummy untuk user pemimpin.apel
        DB::table('users')->insert([
            'name' => 'Pemimpin Apel',
            'email' => 'pemimpin.apel@absensi-anggota.co.id',
            'username' => 'pemimpin.apel',
            'email_verified_at' => now(),
            'password' => Hash::make('pemimpin.apel'), // Ganti dengan password yang diinginkan
            'role' => 'apel',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
