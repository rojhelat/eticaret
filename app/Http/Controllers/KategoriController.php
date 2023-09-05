<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slug_kategori){

        //$kategori = Kategori::where('slug');
        return view('kategori');
    }
}
