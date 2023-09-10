<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function index(){

        $kategoriler = Kategori::whereRaw('ust_id is null')->take(8)->get();
        $urunler_slider=UrunDetay::with('urun')->where('goster_slider',1)->take(5)->get();
        $urun_gunun_firsati = Urun::select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.goster_gunun_firsati',1)
            ->orderBy('urun.updated_at','desc')
            ->first();
        $urun_one_cikanlar=UrunDetay::with('urun')->where('goster_one_cikan',1)->take(4)->get();
        $urun_cok_satanlar=UrunDetay::with('urun')->where('goster_cok_satan',1)->take(4)->get();
        $urun_indirimliler=UrunDetay::with('urun')->where('goster_indirimli',1)->take(4)->get();


        return view('anasayfa',compact('kategoriler', 'urunler_slider','urun_gunun_firsati','urun_one_cikanlar','urun_cok_satanlar','urun_indirimliler'
        ));

    }
}
