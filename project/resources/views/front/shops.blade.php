@extends('layouts.front')
 
@section('content')
 
<section class="categori-item clothing-and-Apparel-Area">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 col-md-3 col-4 remove-padding">
                <div class="row ">

                    @foreach ($shops as $shop)
                    <div class="card" style="max-width:auto %;height: auto;  margin:2px;">
                        <img class="img-fluid card-img-top " style="height:250px ;" src="{{$shop->photo ? asset('assets/images/users/'.$shop->photo):asset('assets/images/noimage.png') }}" class="card-img-top" alt="...">
                        <div class="card-body card text-center">
                          <h5 class="card-title">{{$shop->shop_name}}</h5>
                          <a href="{{route('front.vendor',str_replace(' ', '-',$shop->shop_name))}}" class="sell-btn" style="color:white">{{ $langg->lang249 }}</a>
                        </div>
                      </div>
                    {{-- <a href="{{route('front.vendor',str_replace(' ', '-',$shop->shop_name))}}">{{$shop->shop_name}}</a>
                    <img src="{{asset('assets/images/users/'.$shop->photo) }}" alt=""> --}}
                    @endforeach
            </div>
        </div>
    </div>
    </div>
</section>
 
@endsection
 
@section('scripts')
   <script>
       $(window).on('load',function() {
 
           setTimeout(function(){
 
               $('#extraData').load('{{route('front.extraIndex')}}');
 
           }, 500);
       });
 
   </script>
@endsection
 
 

