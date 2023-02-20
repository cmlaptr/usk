<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            "judul"	=> "Hujan",
            "kategori_id" => "2",	
            "penerbit_id" => "3",	
            "pengarang"	=> "Tere Liye",
            "tahun_terbit" => "2016",	
            "isbn" => null,	
            "j_buku_baik" => "5",	
            "j_buku_rusak" => null,
            "foto" => 'hujan.jpg',
        ]);

        Buku::create([
            "judul"	=> "Timun Emas",
            "kategori_id" => "1",	
            "penerbit_id" => "2",	
            "pengarang"	=> "Najwa Aura",
            "tahun_terbit" => "2020",	
            "isbn" => null,	
            "j_buku_baik" => "15",	
            "j_buku_rusak" => "5",
        ]);

        Buku::create([
            "judul"	=> "Kumpulan Resep Sederhana",
            "kategori_id" => "3",	
            "penerbit_id" => "1",	
            "pengarang"	=> "Devinna Hermawan",
            "tahun_terbit" => "2022",	
            "isbn" => null,	
            "j_buku_baik" => "8",	
            "j_buku_rusak" => "2",
        ]);
    }
}
