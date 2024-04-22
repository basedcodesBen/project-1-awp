<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            'kode_matkul' => "IN240",
            'tahun_kurikulum' => '2020',
            'nama_matkul' => 'Pemrograman Web Lanjut',
            'jumlah_sks' => '4'
         ]);
    }
}
