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
use \App\Mail\KullaniciKayitMail;
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
Route::get('/kategori/{slug_kategori}',[KategoriController::class,'index'])->name('kategori');
Route::get('/urun/{urun_slug}',[UrunController::class,'index'])->name('urun');
Route::post('/ara',[UrunController::class,'ara'])->name('urun_ara');
Route::get('/ara',[UrunController::class,'ara'])->name('urun_ara');
Route::get('/sepet',[SepetController::class,'index'])->name('sepet');

Route::group(['middleware'=>'auth'],function (){
    Route::get('/odeme',[OdemeController::class,'index'])->name('odeme');
    Route::get('/siparis',[SiparisController::class,'index'])->name('siparis');
    Route::get('/siparisler',[SiparislerController::class,'index'])->name('siparisler');
});



Route::group(['prefix'=>'kullanici'],function (){
    Route::get('/oturumac',[KullaniciController::class,'oturumac_form'])->name('kullanici.oturumac');
    Route::post('/oturumac',[KullaniciController::class,'oturumac']);
    Route::get('/kaydol',[KullaniciController::class,'kaydol_form'])->name('kullanici.kaydol');
    Route::post('/kaydol',[KullaniciController::class,'kaydol']);
    Route::get('/aktiflestir/{anahtar}',[KullaniciController::class,'aktiflestir'])->name('kullanici_aktiflestir');
    Route::post('/cikisyap',[KullaniciController::class,'cikisyap'])->name('kullanici.cikisyap');
});

