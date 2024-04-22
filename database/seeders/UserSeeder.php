<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'nrp' => '2272003',
            'name' => 'Ravel Setiady',
            'email' => '2272003@maranatha.ac.id',
            'password' => 'stdy',
            'id_prodi' =>  '72',
            'role' => 'admin',
        ]);
    }
}
