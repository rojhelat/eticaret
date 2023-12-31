<?php

namespace App\Http\Controllers;

use App\Models\Sepet;
use App\Models\SepetUrun;
use App\Models\Urun;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SepetController extends Controller
{
    //

    public function index(){

        return view('sepet');
    }
    public function ekle(){
        //echo 'id  :'.request('urun_id');
        $urun=Urun::find(request('urun_id'));

       $cartItem= Cart::add($urun->id,$urun->urun_adi,1,$urun->fiyat,['slug'=>$urun->slug]);

       if(auth()->check()){

           $aktif_sepet_id = session('aktif_sepet_id');

           if(!isset($aktif_sepet_id)) {


               $aktif_sepet = Sepet::create([
                   'kullanici_id' => auth()->id(),
               ]);
               $aktif_sepet_id = $aktif_sepet->id;

               session()->put('aktif_sepet_id', $aktif_sepet_id);

           }
           SepetUrun::updateOrCreate(
               ['sepet_id'=>$aktif_sepet_id,'urun_id'=>$urun->id],
               ['adet'=>$cartItem->qty,'tutar'=>$urun->fiyat,'durum'=>'Beklemede']
           );

       }



        return redirect('sepet');

    }

    public function kaldir($rowid)
    {
        if (auth()->check()){
              $aktif_sepet_id = session('aktif_sepet_id');
              $cartItem = Cart::get($rowid);
              SepetUrun::where('sepet_id',$aktif_sepet_id)->where('urun_id',$cartItem->id)->delete();
        }

        Cart::remove($rowid);
        return redirect('sepet');
    }

    public function bosalt(){
        if (auth()->check()){
            $aktif_sepet_id = session('aktif_sepet_id');
            SepetUrun::where('sepet_id',$aktif_sepet_id)->delete();
        }
        Cart::destroy();
        return redirect()->route('sepet')->with('message','Sepet Boşaltıldı ')->with('message_tur','success');
    }


    public function guncelle($rowid)
    {

        if (auth()->check()){
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem = Cart::get($rowid);
            if(request('adet')==0)
                SepetUrun::where('sepet_id',$aktif_sepet_id)->where('urun_id',$cartItem->id)->delete();
            else
            SepetUrun::where('sepet_id',$aktif_sepet_id)->where('urun_id',$cartItem->id)
            ->update(['adet'=>request('adet')]);
        }

        Cart::update($rowid,request('adet'));
        return response()->json(['success',true]);

    }


}
