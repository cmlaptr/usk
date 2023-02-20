<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    //RIWAYAT PEMINJAMAN
    public function riwayatPeminjaman()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)->get();

        return view('user.peminjaman.riwayat', compact('peminjaman'));
    }

    // FORMULIR PEMINJAMAN
    public function formPeminjaman()
    {
        $buku = Buku::all();

        return view('user.peminjaman.form', compact('buku'));
    }

    public function formDashboard(Request $request)
    {
        $buku = Buku::all();
        $buku_id = $request->buku_id;

        return view('user.peminjaman.form', compact('buku', 'buku_id'));    
    }

    // SUBMIT PEMINJAMAN
    public function submit(Request $request)
    {
        $peminjaman = Peminjaman::create($request->all());

        $buku = Buku::where('id', $request->buku_id)->first();

        if ($request->kondisi_buku_saat_dipinjam == 'baik') {
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik - 1 
            ]);
        }

        if ($request->kondisi_buku_saat_dipinjam == 'rusak') {
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak - 1
            ]);
        }

        //NOTIFIKASI PEMBERITAHUAN
        Pemberitahuan::create([
        "isi" => Auth::user()->username ."meminjam buku". $buku->judul,
        "status" => "peminjaman"
        ]);

        if ($peminjaman) {
            return redirect()->route('user.riwayat_peminjaman')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->back()
            ->with('status', 'danger')
            ->with('message', 'Gagal Menambah Data!');
    }

    


}
