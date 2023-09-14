<!DOCTYPE html>
<html lang={{config('app.local')}}>

<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    @include('layaouts.partiasl.head')
    @yield('head')
</head>

<body id="commerce">
@include('layaouts.partiasl.navbar')
@yield('content')
@include('layaouts.partiasl.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function (){

        setTimeout(function (){
                $("#alert").slideUp(1000);
        },4000)


    })

</script>


@yield('footer')
</body>

</html>
