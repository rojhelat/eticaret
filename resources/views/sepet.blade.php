@extends('layaouts.master')
@section('title','Kategori')
@section('content')


    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @include('message.alert')

            @if(count(Cart::content())>0)
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2" >Ürün</th>
                    <th>Adet Fiyatı</th>
                    <th>Adet</th>
                    <th>Tutar</th>
                </tr>

                @foreach(Cart::content() as $urunCartItem)
                <tr>
                    <td> <img style="width: 200px; height: 200px" src="img/food1.jpg"> </td>
                    <td>
                        <a href="{{route('urun',$urunCartItem->options->slug)}}">
                        {{$urunCartItem->name}}
                        </a>

                        <form action="{{route('sepet.kaldir',$urunCartItem->rowId)}}" method="post">

                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="submit" value="Sepetten Kaldır" class="btn btn-danger btn-xs">

                        </form>

                    </td>
                    <td>{{$urunCartItem->price}}</td>
                    <td>
                        <a href="#" id="urun-adet-azalt" class="btn btn-xs btn-default urun-adet-azalt" data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty-1}}">-</a>
                        <span style="padding: 10px 20px">{{$urunCartItem->qty}}</span>
                        <a href="#" id="urun-adet-arttir" class="btn btn-xs btn-default urun-adet-arttir" data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty+1}}">+</a>
                    </td>
                    <td class="text-right">{{$urunCartItem->subtotal}}</td>

                </tr>

                @endforeach
                <tr>
                    <th colspan="4" class="text text-rigth">Alt Toplam</th>
                    <th>{{ Cart::subtotal() }} ₺</th>

                </tr>
                <tr>
                    <th colspan="4" class="text text-rigth">KDV</th>
                    <th>{{ Cart::tax() }} ₺</th>

                </tr>

                <tr>
                    <th colspan="4" class="">Genel Toplam</th>
                    <th>{{ Cart::total() }} ₺</th>

                </tr>
            </table>
            @else

                <p> Sepetinizide henüz ürün bulunmamaktadır </p>

            @endif
            <div>
                <form action="{{route('sepet.bosalt')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" value="Sepeti Boşalt" class="btn btn-info pull-left" >

                </form>

                <a href="#" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            </div>
        </div>
    </div>


@endsection

@section('footer')

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $('.urun-adet-arttir, .urun-adet-azalt').on('click',function (){

                var id=$(this).attr('data-id')
                var adet =  $(this).attr('data-adet')


                $.ajax({
                    type:'PATCH',
                    url:'{{url('sepet/guncelle')}}/'+id,
                    data:{adet:adet},
                    success:function (){

                        window.location.href ='/sepet'
                    }

                });


            })


    </script>

@endsection


