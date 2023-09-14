@if(session()->has('message'))

    <div class="container" id="alert">
        <div class="alert alert-{{session('message_tur')}}"> {{session('message')}}</div>
    </div>

@endif
