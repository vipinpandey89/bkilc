@extends('website-layout.header')

@section('content')
<div class="banner">
     <div class="container">
     </div>
</div>
<!---->
<div class="welcome">
     <div class="container">
         <div class="col-md-3 welcome-left">
             <h2>Benvenuti nel nostro sito</h2>
         </div>
         <div class="col-md-9 welcome-right">
             <h3>Proin ornare massa eu enim pretium efficitur.</h3>
             <p>Etiam fermentum consectetur nulla, sit amet dapibus orci sollicitudin vel.
             Nulla consequat turpis in molestie fermentum. In ornare, tellus non interdum ultricies, elit
             ex lobortis ex, aliquet accumsan arcu tortor in leo. Nullam molestie elit enim. Donec ac
             aliquam quam, ac iaculis diam. Donec finibus scelerisque erat, non convallis felis commodo ac.</p>
         </div>
     </div>
</div>
<!---->

<div class="map-section">
    <div class="container">
        <div class="row">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3040.0273024225535!2d18.174581015705055!3d40.36391896677303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13442eedbc2f2553%3A0x5564e58a61ad0a2a!2sVia+Giammatteo%2C+35%2C+73100+Lecce+LE%2C+Italy!5e0!3m2!1sen!2sin!4v1557831732773!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<div class="featured">
    <!--<div class="container">
        <div class="row">
            <div class="cart-section">
                <div class="col-md-4">
                    <div class="icon-box">
                        <a href="javascript:void(0)">
                            <div class="circle red">
                                <img src="{{url('website/images/red_icon.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="content-part">
                        <h3>Lorem Ipsum</h3>
                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <a href="javascript:void(0)">
                            <div class="circle yellow">
                                <img src="{{url('website/images/yellow_icon.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="content-part">
                        <h3>Lorem Ipsum</h3>
                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <a href="javascript:void(0)">
                            <div class="circle blue">
                                <img src="{{url('website/images/blue_icon.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="content-part">
                        <h3>Lorem Ipsum</h3>
                        <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
     <div class="container">
         <h3>prodotti sponsorizzati</h3>
        
         <div class="feature-grids">

          @foreach($getCard as $card)
             <div class="col-md-3 feature-grid jewel">
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

@endsection