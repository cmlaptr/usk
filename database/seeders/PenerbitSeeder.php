<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penerbit::create([
            "kode" => "7890",
            "nama" => "Erlangga",
            "verif" => "verified"
        ]);

        Penerbit::create([
            "kode" => "0987",
            "nama" => "Charissa Publisher",
            "verif" => "verified"
        ]);

        Penerbit::create([
            "kode" => "7980",
            "nama" => "Gramedia",
            "verif" => "verified"
        ]);
    }
}
