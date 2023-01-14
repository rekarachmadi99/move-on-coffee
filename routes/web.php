<?php

use App\Http\Controllers\AkunPegawaiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Middleware\CekUserLogin;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login-post', [AuthController::class, 'login_post'])->name('login.post');

Route::get('/lupa-password', [AuthController::class, 'lupa_password'])->name('lupa.password.get');
Route::post('/lupa-password-post', [AuthController::class, 'lupa_password_post'])->name('lupa.password.post');

Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('reset.password.get');
Route::put('/reset-password-put', [AuthController::class, 'reset_password_put'])->name('reset.password.put');
Route::get('/logout', function () {
    Auth::logout();

    return redirect()->intended('/');
});
Route::get('/dashboard', function () {
    return view('pages.dashboard', [
        'title' => 'Dashboard',
        'totalPegawai' => Pegawai::count()
    ]);
})->name('dashboard.get')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['permissionRole:Admin']], function () {
        Route::get('/coba1', function () {
            echo 'coba1';
        });
    });

    Route::group(['middleware' => ['permissionRole:Owner']], function () {
        Route::get('/coba2', function () {
            echo 'coba2';
        });
    });

    Route::group(['middleware' => ['permissionRole:Pegawai']], function () {
        Route::get('/coba3', function () {
            echo 'coba3';
        });
    });
});
