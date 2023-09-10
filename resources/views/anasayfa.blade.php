@extends('layaouts.master')
@section('title','Anasayfa')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Kategoriler</div>
                    <div class="list-group categories">

                        @foreach($kategoriler as $kategori)
                        <a href="{{route('kategori',$kategori->slug)}}" class="list-group-item"><i class="fa fa-arrow-circle-o-right"></i> {{$kategori->kategori_adi}}</a>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i=0;$i<count($urunler_slider);$i++)
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="{{$i==0 ? 'active':''}}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">

                        @foreach($urunler_slider as $index=>$urun_detay)
                        <div class="item {{$index ==0 ? 'active':''}}">
                            <img src="img/food1.jpg" alt="...">
                            <div class="carousel-caption">
                                {{$urun_detay->urun->urun_adi}}
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" id="sidebar-product">
                    <div class="panel-heading">Günün Fırsatı</div>
                    <div class="panel-body">
                        <a href=" {{route('urun',$urun_gunun_firsati->slug)}}">
                            <img src="img/food1.jpg" class="img-responsive">
                            {{$urun_gunun_firsati->urun_adi}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Öne Çıkan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($urun_one_cikanlar as $urun_one_cikan)
                        <div class="col-md-3 product">
                            <a href="{{route('urun',$urun_one_cikan->urun->slug)}}"><img src="img/food1.jpg"></a>
                            <p><a href="{{route('urun',$urun_one_cikan->urun->slug)}}">{{$urun_one_cikan->urun->urun_adi}}</a></p>
                            <p class="price">{{$urun_one_cikan->urun->fiyat}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">Çok Satan Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($urun_cok_satanlar as $urun_cok_satan)
                        <div class="col-md-3 product">
                            <a href="{{route('urun',$urun_cok_satan->urun->slug)}}"><img src="img/food1.jpg"></a>
                            <p><a href="{{route('urun',$urun_cok_satan->urun->slug)}}">{{$urun_cok_satan->urun->urun_adi}}</a></p>
                            <p class="price">{{$urun_cok_satan->urun->fiyat}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div class="panel panel-theme">
                <div class="panel-heading">İndirimli Ürünler</div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($urun_indirimliler as $urun_indirimli)
                        <div class="col-md-3 product">
                            <a href="{{route('urun',$urun_indirimli->urun->slug)}}"><img src="img/food1.jpg"></a>
                            <p><a href="{{route('urun',$urun_indirimli->urun->slug)}}">{{$urun_indirimli->urun->urun_adi}}</a></p>
                            <p class="price">{{$urun_indirimli->urun->fiyat}} ₺</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

