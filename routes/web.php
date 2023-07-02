<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

/*
|--------------------------------------------------------------------------
| DATA MASTER MANAJEMEN DAN PEGAWAI
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>['manajemen','pegawai']], function(){

    Route::get('/admin', function () {
        return view('datamaster/admin');
    });

    Route::get('/pegawai', function () {
        return view('datamaster/pegawai');
    });

    Route::get('/pasien', function () {
        return view('datamaster/pasien');
    });

    Route::get('/obat', function () {
        return view('datamaster/obat');
    });

    Route::get('/profile', function () {
        return view('profil/profile');
    });

});

Route::get('/stokobat', function () {
    return view('datamaster/stokobat')->middleware('manajemen');
});

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