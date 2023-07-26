<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalPiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['tanggal' => '2023-06-20', 'piket' => 'A'],
            ['tanggal' => '2023-06-21', 'piket' => 'B'],
            ['tanggal' => '2023-06-22', 'piket' => 'C'],
            ['tanggal' => '2023-06-23', 'piket' => 'A'],
            ['tanggal' => '2023-06-24', 'piket' => 'B'],
        ];

        DB::table('jadwal_piket')->insert($data);
    }
}
