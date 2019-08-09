@extends('website-layout.header')

@section('content')

<div id="Banner_wrapper" class="bg-parallax banner_wrapper" style="background-image:url({{url('website/images/home-page.jpg')}});">
 
  <div class="tp-shape">
 <div class="banner_title">
  <h1>Bklic</h1>
  <h2>Il nuovo Business Intelligente</h2>
  <div class="banner_btn">
  <a href="#" class="cta_btn">Scopri di Più </a>
  </div>
  </div>
  </div>
  <div id="banner_shape"></div>
 </div>

    <div id="Content">

  
  
  
  <div class="featured">
  <div id="service_section" class="section">
       <div class="container">
         <h3>prodotti sponsorizzati</h3>
        
         <div class="feature-grids">

          @foreach($getCard as $card)
             <div class="col-md-4 jewel">
                 <a href="{{url('card-detail/'.$card->id)}}"><img src="{{url('images/digital-card/'.$card->image)}}" alt=""/>   
                     <div class="arrival-info">
                         <h4>{{$card->title}}</h4>
                         <p>&euro;{{$card->amount}}</p>
                         <span class="pric1"><del> &euro;{{$card->amount}}</del></span>
                       
                     </div>
                     <div class="viw">
                        <a href="{{url('card-detail/'.$card->id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                     </div>
                     <div class="shrt">
                        <a href="{{url('card-detail/'.$card->id)}}"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Shortlist</a>
                     </div></a>
             </div>
                @endforeach


         </div>
     </div> 
</div>
 </div>

  


  
  
   <!--- Who we are / Home  --->
   
  
 

</div>


@endsection