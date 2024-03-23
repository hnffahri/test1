<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('siswa')->insert([
            'nama' => 'Anis',
            'no_induk' => '3987123',
            'alamat' => 'Bantul',
            'created_at' => date('Y-m-d H:i:s'),
            'foto' => ''
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Bowo',
            'no_induk' => '3987124',
            'alamat' => 'Cirebon',
            'created_at' => date('Y-m-d H:i:s'),
            'foto' => ''
        ]);
        DB::table('siswa')->insert([
            'nama' => 'Ganjar',
            'no_induk' => '3987125',
            'alamat' => 'Pnd',
            'created_at' => date('Y-m-d H:i:s'),
            'foto' => ''
        ]);
    }
}
