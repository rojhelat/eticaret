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

        return view('kategori',compact('kategori','alt_kategoriler'));
    }
}
