<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class UrunController extends Controller
{
    public function index($urun_slug){

        $urun = Urun::where(['slug'=>$urun_slug])->firstOrFail();
        return view('urun',compact('urun'));
    }

    public function ara(){
        $aranan = request()->input('aranan');
        $aranan_urunler= Urun::where('urun_adi','like',"%$aranan%")
            ->orWhere('aciklama','like',"%$aranan%")
            ->orWhere('fiyat','like',"%$aranan%")->paginate(2);
        request()->flash();
        return view('arama',compact('aranan_urunler'));
    }
}
