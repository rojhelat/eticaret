<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function index(){

        $kategoriler = Kategori::all();

        return view('anasayfa',compact('kategoriler'));

    }
}
