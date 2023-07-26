<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Iman', 'jabatan' => 'Anggota', 'group_piket' => 'A'],
            ['nama' => 'Maulana', 'jabatan' => 'Anggota', 'group_piket' => 'B'],
            ['nama' => 'Agus', 'jabatan' => 'Anggota', 'group_piket' => 'C'],
            ['nama' => 'Adon', 'jabatan' => 'Anggota', 'group_piket' => 'A'],
            ['nama' => 'Adi', 'jabatan' => 'Anggota', 'group_piket' => 'B'],
            ['nama' => 'Zaki', 'jabatan' => 'Anggota', 'group_piket' => 'C'],
            ['nama' => 'Yoga', 'jabatan' => 'Anggota', 'group_piket' => 'A'],
            ['nama' => 'Budi', 'jabatan' => 'Anggota', 'group_piket' => 'B'],
            ['nama' => 'Yuda', 'jabatan' => 'Anggota', 'group_piket' => 'C'],
        ];

        DB::table('anggota')->insert($data);
    }
}
