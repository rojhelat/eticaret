@extends('layaouts.master')
@section('title','Kategori')
@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{route('anasayfa')}}">Anasayfa</a></li>

        <li class="active">Arama Sonucu</li>
    </ol>


    <div class="products">
        <div class="panel panel-theme">
            <div class="panel-heading">Arama Sonuçları</div>
            <div class="panel-body">
                <div class="row">
                    @foreach($aranan_urunler as $urun)
                        <div class="col-md-3 product">
                            <a href="{{route('urun',$urun->slug)}}"><img src="img/food2.jpg"></a>
                            <p><a href="{{route('urun',$urun->slug)}}">{{$urun->urun_adi}}</a></p>
                            <p class="price">{{$urun->fiyat}} ₺</p>
                        </div>
                    @endforeach
                </div>
                {{$aranan_urunler->appends(['arana'=>old('aranan')])->links()}}
            </div>
        </div>
    </div>


</div>
@endsection

