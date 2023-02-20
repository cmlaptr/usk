<?php

namespace Database\Seeders;

use App\Models\Pemberitahuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemberitahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemberitahuan::create([
            "isi" => "Segera Kembalikan Buku Anda",
            "level_user" => null, 	
            "status" => "nonaktif"
        ]);

        Pemberitahuan::create([
            "isi" => "Selamat Datang Di TenBrary",
            "level_user" => null, 	
            "status" => "nonaktif"
        ]);
    }
}
