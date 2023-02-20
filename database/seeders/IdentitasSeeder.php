<?php

namespace Database\Seeders;

use App\Models\Identitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Identitas::create([
            "nama_app" => "TenBrary",
            "alamat_app" => "Jl. Mayjen Sutoyo, Daerah Khusus Ibukota Jakarta 13630",
            "email_app" => "10brary@gmail.com",
            "nomor_hp" => "081252775954",
            "foto" => null
        ]);
    }
}
