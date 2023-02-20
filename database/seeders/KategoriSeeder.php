<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            "kode" => "1234",
            "nama" => "Dongeng"
        ]);

        Kategori::create([
            "kode" => "2134",
            "nama" => "Fiksi"
        ]);

        Kategori::create([
            "kode" => "4321",
            "nama" => "Umum"
        ]);
    }
}
