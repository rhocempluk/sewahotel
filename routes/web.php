<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController; 
use App\Http\Controllers\FasilitasKamarController; 
use App\Http\Controllers\FasilitasHotelController; 
use App\Http\Controllers\ReservasiController; 
use App\Http\Controllers\UserViewController; 
use App\Http\Controllers\PesanController; 
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

Auth::routes();
Route::get('/',[UserViewController::class,'index']);


Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('kamar', KamarController::class)->middleware('role:admin');
    Route::resource('fasilitaskamar', FasilitasKamarController::class)->middleware('role:admin');
    Route::resource('fasilitashotel', FasilitasHotelController::class)->middleware('role:admin');
    Route::resource('reservasi', ReservasiController::class);  
});
Route::get('/pesan',[PesanController::class,'index'])->name('user.pesan')->middleware('role:user');

Auth::routes();
// Route::resource('userview', UserViewController::class); 
// Route::resource('', UserViewController::class); 
// Route::get('userview', [App\Http\Controllers\UserViewController::class, 'index'])->name('usrview');
