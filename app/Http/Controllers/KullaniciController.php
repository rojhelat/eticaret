<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KullaniciController extends Controller
{
    //

    public function kayit(){

        return view('kullanici.kayit');
    }
    public function giris(){


        return view('kullanici.giris');
    }
}
