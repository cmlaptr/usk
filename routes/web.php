<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\User\PengembalianController;
use App\Http\Controllers\User\PesanController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Admin\AdministratorController as AdminAdministratorController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\PenerbitController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DatabukuController;
use App\Http\Controllers\Admin\IdentitasController;
use App\Http\Controllers\Admin\PesanController as AdminPesanController;
use App\Http\Middleware\role;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('/admin')->group(function(){
    // DASHBOARD
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    //             MASTER DATA
    //Administrator
    Route::get('/administrator', [AdminAdministratorController::class, 'indexAdministrator'])->name('admin.administrator');
    Route::post('/create-admin',[AdminAdministratorController::class, 'storeAdministrator'])->name('admin.tambah_admin');
    Route::put('/update-admin/{id}', [AdminAdministratorController::class, 'updateAdmin'])->name('admin.update_admin');
    Route::delete('/delete-admin', [AdminAdministratorController::class, 'deleteAdmin']);

    //Penerbit
    Route::get('/penerbit', [PenerbitController::class, 'indexPenerbit'])->name('admin.penerbit');
    Route::post('/tambah-penerbit', [PenerbitController::class, 'storePenerbit'])->name('admin.tambah_penerbit');
    Route::put('/edit/penerbit/{id}', [PenerbitController::class, 'updatePenerbit'])->name('admin.update_penerbit');
    Route::post('/update_status/{id}', [PenerbitController::class, 'updateStatus'])->name('admin.update_status_penerbit');
    Route::delete('/hapus/penerbit/{id}', [PenerbitController::class, 'deletePenerbit']);

    //Anggota
    Route::get('/anggota', [AnggotaController::class, 'indexAnggota'])->name('admin.anggota');
    Route::post('/tambah-anggota', [AnggotaController::class, 'storeAnggota'])->name('admin.tambah_anggota');
    Route::put('/edit/anggota/{id}', [AnggotaController::class, 'updateAnggota'])->name('admin.update.anggota');
    Route::delete('/hapus/anggota/{id}', [AnggotaController::class, 'deleteAnggota']);
    Route::put('/update_status/{id}', [AnggotaController::class, 'updateStatus'])->name('admin.update_status');

    //Data Peminjaman
    Route::get('/data-peminjaman', [AdminPeminjamanController::class, 'indexPeminjaman'])->name('admin.peminjaman');

    //                KATALOG BUKU  
    //Data Buku 
    Route::get('/buku', [DatabukuController::class, 'indexBuku'])->name('admin.buku');
    Route::post('/tambah-buku', [DatabukuController::class, 'storeBuku'])->name('admin.tambah_buku');
    Route::put('/edit/buku/{id}', [DatabukuController::class, 'updateBuku'])->name('admin.update.buku');
    Route::delete('/hapus/buku/{id}', [DatabukuController::class, 'deleteBuku']);
    
    //Kategori
    Route::get('/kategori', [KategoriController::class, 'indexKategori'])->name('admin.kategori');
    Route::post('/tambah-kategori', [KategoriController::class, 'storeKategori'])->name('admin.tambah_kategori');
    Route::put('/edit/kategori/{id}', [KategoriController::class, 'updateKategori'])->name('admin.update_kategori');
    Route::delete('/hapus/kategori/{id}', [KategoriController::class, 'deleteKategori']);

    //                 CETAK LAPORAN
    //Laporan PDF
    Route::get('/index', [LaporanController::class, 'index'])->name('admin.index');
    Route::post('/laporan-pdf', [LaporanController::class, 'laporan_pdf'])->name('admin.lap_pdf');

    Route::post('/peminjaman', [LaporanController::class, 'laporan_pdf'])->name('admin.laporan_peminjaman');
    Route::post('/pengembalian', [LaporanController::class, 'laporan_pdf'])->name('admin.laporan_pengembalian');
    Route::post('/laporan_user', [LaporanController::class, 'laporan_pdf'])->name('admin.laporan_user');

    //            IDENTITAS
    Route::get('/indexIdentitas', [IdentitasController::class, 'indexIdentitas'])->name('admin.identitas');
    Route::put('/edit/identitas', [IdentitasController::class, 'updateIdentitas'])->name('admin.update_identitas');

    //              PESAN
    Route::get('/pesan-masuk', [AdminPesanController::class, 'pesanMasuk'])->name('admin.pesan_masuk');
    Route::post('/admin-status', [AdminPesanController::class, 'admin_status'])->name('admin.ubah_status');

    Route::get('/pesan-terkirim', [AdminPesanController::class, 'pesanTerkirim'])->name('admin.pesan_terkirim');
    Route::post('/kirim-pesan', [AdminPesanController::class, 'kirimPesan'])->name('admin.kirim_pesan');
});

Route::middleware(['auth', 'role:user'])->prefix('/user')->group(function(){
    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    // PEMINJAMAN
    Route::get('/riwayat-peminjaman', [PeminjamanController::class, 'riwayatPeminjaman'])->name('user.riwayat_peminjaman');
    Route::get('/form-peminjaman', [PeminjamanController::class, 'formPeminjaman'])->name('user.form_peminjaman');
    Route::post('/form-peminjaman-dashboard', [PeminjamanController::class, 'formDashboard'])->name('user.form_dashboard');
    Route::post('/submit-form', [PeminjamanController::class, 'submit'])->name('user.submit_peminjaman');

    //PENGEMBALIAN
    Route::get('/form-pengembalian', [PengembalianController::class, 'formPengembalian'])->name('user.form_pengembalian');
    Route::get('/riwayat-pengembalian', [PengembalianController::class, 'riwayatPengembalian'])->name('user.riwayat_pengembalian');
    Route::post('/submit-form', [PengembalianController::class, 'submit'])->name('user.submit_pengembalian');

    //PESAN
    Route::get('/pesan-terkirim', [PesanController::class, 'pesanTerkirim'])->name('user.pesan_terkirim');
    Route::post('/kirim-pesan', [PesanController::class, 'kirimPesan'])->name('user.kirim_pesan');
    Route::get('/pesan-masuk', [PesanController::class, 'pesanMasuk'])->name('user.pesan_masuk');
    Route::post('/ubah-status', [PesanController::class, 'ubahStatus'])->name('user.ubah_status');
    
    //PROFILE
    Route::get('profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::put('gambar', [ProfileController::class, 'gambar'])->name('user.gambar');
});