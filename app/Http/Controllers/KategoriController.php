<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slug_kategori){

        //$kategori = Kategori::where(['slug'=>$slug_kategori])->get();

        $kategori = Kategori::where(['slug'=>$slug_kategori])->firstOrFail();
        $alt_kategoriler = Kategori::where(['ust_id'=>$kategori->id])->get();
        $order = request()->input('order');

        switch ($order){
            case 'coksatanlar':
                $urunler = $kategori->urunler()
                    ->distinct()
                    ->join('urun_detay','urun_detay.urun_id','urun.id')
                    ->where('urun_detay.goster_cok_satan',1)
                    ->orderBy('urun_detay.updated_at','desc')
                    ->paginate(2);
            break;
            case 'yeni':
                $urunler = $kategori->urunler()
                    ->distinct()
                    ->join('urun_detay','urun_detay.urun_id','urun.id')
                    ->orderBy('urun_detay.created_at','desc')
                    ->paginate(2);
            break;
            default:
                $urunler = $kategori->urunler()->paginate(2);
            break;
        }



        $urunler = $kategori->urunler()->paginate(2);
        return view('kategori',compact('kategori','alt_kategoriler','urunler'));
    }
}
