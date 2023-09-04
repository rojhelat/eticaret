<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnasayfaController;
use App\Http\Controllers\KategoriController;
use  App\Http\Controllers\UrunController;
use \App\Http\Controllers\SepetController;
use \App\Http\Controllers\KullaniciController;
use \App\Http\Controllers\SiparisController;
use \App\Http\Controllers\SiparislerController;
use \App\Http\Controllers\OdemeController;
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

Route::get('/',[AnasayfaController::class,'index'])->name('anasayfa');
Route::get('/kategori',[KategoriController::class,'index'])->name('kategori');
Route::get('/urun',[UrunController::class,'index'])->name('urun');
Route::get('/sepet',[SepetController::class,'index'])->name('sepet');
Route::get('/odeme',[OdemeController::class,'index'])->name('odeme');
Route::get('/siparis',[SiparisController::class,'index'])->name('siparis');
Route::get('/siparisler',[SiparislerController::class,'index'])->name('siparisler');
Route::get('/kullanici/giris',[KullaniciController::class,'giris'])->name('kullanici_giris');
Route::get('/kullanici/kayit',[KullaniciController::class,'kayit'])->name('kullanici_kayit');

