<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "kode" => "4567",
            "nis" => "12069", 	
            "fullname" => "Dina Camelia",	
            "username" => "Dina",	
            "password" => bcrypt('password'),	
            "kelas" => "XII RPL", 	
            "alamat" => "Jl.Kober No.35", 	
            "verif" => "verified", 	
            "role" => "user",	
            "join_date" => "2023-01-01",	
            "terakhir_login" => null 
        ]);

        User::create([
            "kode" => "7654",
            "nis" => "12070", 	
            "fullname" => "Dwi Arya",	
            "username" => "Dwi",	
            "password" => bcrypt('password'),	
            "kelas" => "XI RPL", 	
            "alamat" => "Jl.Manunggal No.9", 	
            "verif" => "Unverified", 	
            "role" => "user",	
            "join_date" => "2023-01-15",	
            "terakhir_login" => null 
        ]);

        User::create([
            "kode" => "4657",
            "nis" => null, 	
            "fullname" => "Najwa Aura",	
            "username" => "Najwa",	
            "password" => bcrypt('password'),	
            "kelas" => null, 	
            "alamat" => "Jl. Baaburoyyan III No.32", 	
            "verif" => "verified", 	
            "role" => "admin",	
            "join_date" => "2022-12-01",	
            "terakhir_login" => null 
        ]);
    }
}
