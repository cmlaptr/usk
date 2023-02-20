<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peminjaman::create([
            "user_id" => "3",	
            "buku_id" => "1",	
            "tanggal_peminjaman" => "2023-01-20", 	
            "tanggal_pengembalian" => "2023-01-27",	
            "kondisi_buku_saat_dipinjam" => "Baik",	
            "kondisi_buku_saat_dikembalikan" => null, 	
            "denda" => null,
        ]);

        Peminjaman::create([
            "user_id" => "2",	
            "buku_id" => "2",	
            "tanggal_peminjaman" => "2023-01-10", 	
            "tanggal_pengembalian" => "2023-01-17",	
            "kondisi_buku_saat_dipinjam" => "Baik",	
            "kondisi_buku_saat_dikembalikan" => "Baik", 	
            "denda" => null,
        ]);

        Peminjaman::create([
            "user_id" => "1",	
            "buku_id" => "3",	
            "tanggal_peminjaman" => "2023-01-15", 	
            "tanggal_pengembalian" => "2023-01-22",	
            "kondisi_buku_saat_dipinjam" => "Baik",	
            "kondisi_buku_saat_dikembalikan" => "Rusak", 	
            "denda" => "20000",
        ]);
    }
}
