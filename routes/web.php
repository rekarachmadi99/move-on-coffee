<?php

use App\Http\Controllers\AkunPegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Middleware\CekUserLogin;
use App\Models\Barang;
use App\Models\Pegawai;
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

// Auth Controller
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login-post', [AuthController::class, 'login_post'])->name('login.post');
Route::get('/lupa-password', [AuthController::class, 'lupa_password'])->name('lupa.password.get');
Route::post('/lupa-password-post', [AuthController::class, 'lupa_password_post'])->name('lupa.password.post');
Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('reset.password.get');
Route::put('/reset-password-put', [AuthController::class, 'reset_password_put'])->name('reset.password.put');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['permissionRole:Admin']], function () {
        Route::get('/dashboard', function () {
            $user = Pegawai::where('nik', Auth::user()->nik)->first();
            return view('pages.dashboard', [
                'title' => 'Dashboard',
                'user' => $user,
                'totalPegawai' => Pegawai::count()
            ]);
        })->name('dashboard.index');

        // Akun Pegawai Controller
        Route::get('/akun-pegawai', [AkunPegawaiController::class, 'index'])->name('akun.pegawai.index');
        Route::post('/akun-pegawai', [AkunPegawaiController::class, 'store'])->name('akun.pegawai.store');
        Route::get('/akun-pegawai/{id}/edit', [AkunPegawaiController::class, 'edit'])->name('akun.pegawai.edit');
        Route::put('/akun-pegawai', [AkunPegawaiController::class, 'update'])->name('akun.pegawai.update');
        Route::delete('/akun-pegawai/{id}', [AkunPegawaiController::class, 'destroy'])->name('akun.pegawai.destroy');

        // Pegawai
        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::get('/pegawai/{id}/view', [PegawaiController::class, 'view'])->name('pegawai.view');
        Route::put('/pegawai', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

        // // Inventaris - Jenis Barang
        Route::get('/kategori', [BarangController::class, 'kategori_index'])->name('kategori.index');
        Route::post('/kategori', [BarangController::class, 'kategori_store'])->name('kategori.store');
        Route::delete('/kategori/{id}', [BarangController::class, 'kategori_destroy'])->name('kategori.destroy');
        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
        Route::put('/barang', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

        // // Inventaris - Barang
        // Route::get('/data-barang', [PegawaiController::class, 'data_barang'])->name('data.barang.get');
        // Route::post('/tambah-data-barang-post', [PegawaiController::class, 'tambah_barang_post'])->name('tambah.pegawai.post');
        // Route::get('/edit-data-barang/{id}', [PegawaiController::class, 'edit_barang'])->name('edit.data.pegawai.get');
        // Route::put('/update-pegawai', [PegawaiController::class, 'update_pegawai_put'])->name('update.pegawai.put');
        // Route::delete('/data-pegawai/{id}', [PegawaiController::class, 'data_pegawai_delete'])->name('destroy.pegawai.delete');
    });

    Route::group(['middleware' => ['permissionRole:Pegawai']], function () {
        Route::get('/coba3', function () {
            echo 'coba3';
        });
    });
});
