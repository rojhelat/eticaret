<?php

namespace App\Http\Controllers;

use App\Mail\KullaniciKayitMail;
use App\Models\Kullanici;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class KullaniciController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('guest')->except('cikisyap');
    }


    public function kaydol_form(){

        return view('kullanici.kaydol');
    }

    public function kaydol(){


        $this->validate(request(),[
            'adsoyad'=>'required|min:5|max:60',
            'email'=>'required|email|unique:kullanici|min:10|max:60',
            'sifre'=>'required|confirmed|min:6|max:15'

        ]);

        $kullanici= Kullanici::create([
            'adsoyad'=>request('adsoyad'),
            'email'=>request('email'),
            'sifre'=>Hash::make(request('sifre')),
            'aktivasyon_anahtari'=>Str::random(60),
            'aktif_mi'=>0,
        ]);


        Mail::to('omercicek@hakkari.edu.tr')->send(new KullaniciKayitMail($kullanici));
        auth()->login($kullanici);
        return redirect()->route('anasayfa');

    }
    public function oturumac_form(){

        return view('kullanici.oturumac');
    }
    public function oturumac(){

        $this->validate(request(),[
            'email'=>'required|email',
            'sifre'=>'required',
        ]);

        if (auth()->attempt(['email'=>request('email'),'password'=>request('sifre')],request()->has('benihatirla'))){

            request()->session()->regenerate();
            return redirect()->intended('/');
        }else{
            $errors=['email' =>'Hatalı Giriş'];
            return redirect()->back()->withErrors($errors);
        }

    }


    public function aktiflestir($anahtar){

        $kullanici=Kullanici::where('aktivasyon_anahtari',$anahtar)->first();

        if (!is_null($kullanici)){
           $kullanici->aktivasyon_anahtari=null;
           $kullanici->aktif_mi=1;
           $kullanici->save();
           return redirect()->to('/')
               ->with('message','Kaydınız aktifleştirilmiştir ')
               ->with('message_tur','success');
        }else{
            return redirect('404');
        }


    }

    public function cikisyap(){

        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('anasayfa');

    }

}
