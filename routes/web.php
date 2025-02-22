<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PembelianController;
use App\Http\Middleware\Pegawai;
use App\Models\Pembelian;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| DATA MASTER MANAJEMEN DAN PEGAWAI
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth', 'role']], function () {

    Route::post('/addpegawai', [PegawaiController::class, 'store']);
    Route::post('/editpegawai', [PegawaiController::class, 'update']);
    Route::get('/pegawai', [PegawaiController::class, 'index']);
    Route::resource('user', PegawaiController::class);

    Route::get('/stokobat', [ObatController::class, 'index']);
    Route::post('/addobat', [ObatController::class, 'store']);
    Route::post('/editobat', [ObatController::class, 'update']);
    Route::post('/delete', [ObatController::class, 'destroy']);

    Route::get('/historichat', [PesanController::class, 'index']);
    // Route::get('/stokobat', function () {
    //     return view('datamaster/stokobat');
    // })->middleware('auth');

});

// Route::get('/pegawai', function () {
//     return view('datamaster/pegawai');
// });

// Route::get('/pasien', function () {
//     return view('datamaster/pasien');
// });

// Route::get('/obat', function () {
//     return view('datamaster/obat');
// });
Route::get('/obat', [PembelianController::class, 'index']);
Route::post('/addpembelian', [PembelianController::class, 'store']);
Route::post('/updatepembelian', [PembelianController::class, 'update']);
Route::get('/obat/{id}/stok', [PembelianController::class, 'getstok']);
Route::get('/historichatpegawai', [PesanController::class, 'indexpegawai']);



Route::get('/profile', function () {
    return view('profil/profile');
});

// Route::get('/pasien', [PasienController::class, 'index']);
Route::post('/editpasien', [PasienController::class, 'update']);
Route::resource('pasien', PasienController::class);

/*
|--------------------------------------------------------------------------
| LOGIN,REGISTER,FORGOT PASSWORD
|--------------------------------------------------------------------------
*/


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/forgot-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/reset-password', 'Auth\ResetPasswordController@reset')->name('password.update');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index']);
