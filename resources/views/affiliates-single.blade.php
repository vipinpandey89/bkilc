@extends('website-layout.header')

@section('content')
@php
  //echo '<pre>'; print_r($getAffiliatesDetail); die;
  if(!empty($getAffiliatesDetail)){
  $fnames = $getAffiliatesDetail->filename;
  $arr = explode("$", $fnames);
  }else{
    $arr = array();
  }
  //echo '<pre>'; print_r($arr); die;
  $arc = count($arr);
@endphp
<?php
  if($arc > 1){
    $arc = 1;
  }
?>
@php $current_url = Request::url(); @endphp
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
 <style>
    .product-detail-content {
    width: 100%;
    display: block;
    background: #fff;
    margin-top: 30px;
    border: #ddd solid 1px;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 30px;
  }
  .product-detail-content.offer{
    overflow: hidden;
  }
  .product-detail-content.offer h4 {
    position: absolute;
    top: -84px;
    right: -70px;
    font-size: 13px;
    background: #ffa500;
    padding: 5px;
    transform: rotateZ(45deg);
    -webkit-transform: rotateZ(45deg);
    color: #fff;
    width: 130px;
    padding: 33px 0px 30px 10px;
    height: 70px;
    transform-origin: left center;
    -webkit-transform-origin: left center;
    text-align: center;
    font-size: 14px;
}
 </style>

<section>
  <div class="slider-section">
    <div class="owl-carousel owl-theme">

     @foreach($arr as $arrval)
       <div class="item">
        <?php if(!empty($arrval)){?>
        <img src="{{url('dealer_images/'.$arrval)}}" alt="">
      <?php }else{?>
           <img src="{{url('website/images/progetto.jpg')}}" alt="">
      <?php } ?>
      </div>
      
    @endforeach 
        
    </div>
  </div>
</section>

<div class="container">
<!-- Product details section start here -->
<div class="col-md-12">
<!--  <ol class="breadcrumb">
    <li><a href="{{url('/')}}">Home</a></li>
    <li class="active">Affiliati</li>
  </ol> -->
  
  <div class="col-md-12">
  <div class="product-detail-content offer">
  <div class="row">
    <div class="col-xs-8">
      <div class="category-tab-col">
     @foreach($getCategories as $cat)
                   
        @if($getAffiliatesDetail->category == $cat->id)<a href="#">{{$cat->title}}</a> @endif
       
     @endforeach
    </div>
      <div class="product-detail-title">{{$getAffiliatesDetail->business_name}} <!--<span>Other Info: <a href="#">Read More</a></span>--></div>
    </div>
    <div class="col-xs-4">
      <div class="product-detail-right-col">
        <ul>
          <li><!-- <a class="dic" href="#">sconto: {{$getAffiliatesDetail->discount_amount}}%</a> --> &nbsp;</li>
          
     <!--  @if(!empty($getAffiliatesDetail->postalCode))
      <li><a href="#">{{$getAffiliatesDetail->postalCode}}, {{$getAffiliatesDetail->street}},{{$getAffiliatesDetail->region}}, {{$getAffiliatesDetail->resiaddress}}</a></li>
      @endif -->
          @php $current_url = Request::url(); @endphp
          <li><a href="https://www.facebook.com/sharer/sharer.php?u={{$current_url}}" target="_blank" data-href="{{$current_url}}" data-layout="button_count" class="share-button">Condividi</a></li>

          <li><strong>{{!empty($getAffiliatesDetail->resiaddress)?$getAffiliatesDetail->resiaddress:''}}</strong></li>
    
        </ul>
        <h4>sconto<br> <span>{{$getAffiliatesDetail->discount_amount}}%</span></h4>
      </div>
    </div>
  </div>
  </div>
</div>

  <!-- <div class="product-detail-information">
    <ul>
      <li>
        <div class="circul-col"><img src="images/home-icon.png"></div>
        <div class="title">45</div>
        <p>loream Ipsum</p>
      </li>
      <li>
        <div class="circul-col"><img src="images/user-icon.png"></div>
        <div class="title">45</div>
        <p>loream Ipsum</p>
      </li>
      <li>
        <div class="circul-col"><img src="images/spoon-icon.png"></div>
        <div class="title">45</div>
        <p>loream Ipsum</p>
      </li>
    </ul>
  </div> -->
<div class="col-md-12">
  <div class="product-detail-content">
    <h3>A proposito di  Cartoleria Rossi</h3>
  <div class="more">
    <p>@php echo $getAffiliatesDetail->description; @endphp</p>
    <a href="javascript:void(0);" onclick="readless();" class="view-button">Mostra di più</a> 
  </div>
  
  <div class="less">
    <p>@php echo substr($getAffiliatesDetail->description,0, 300).'...'; @endphp</p>
    <a href="javascript:void(0);" onclick="readmore();" class="view-button">Mostra meno</a>
  </div>
  
  
  </div>
</div>
<div class="col-md-12">
  <div class="product-detail-content">
    <div class="sidebar-wrapper">
      <h3 style="margin-top: 21px;margin-bottom: 10.5px;">Orari di apertura:</h3>
      <div class="working-hours-col">
        <ul>
          <li>Lunedì <span>9 :00 - 18:00</span></li>
          <li>Martedì <span>9 :00 - 18:00</span></li>
          <li>Mercoledì <span>9 :00 - 18:00</span></li>
          <li>Giovedì <span>9 :00 - 18:00</span></li>
          <li>Venerdì <span>9 :00 - 18:00</span></li>
          <li>Sabato <span>9 :00 - 18:00</span></li>
        </ul>
      </div>

    

    </div>
  </div>
</div> 

  @if(!empty($getAffiliatesDetail->video))
  <div class="col-md-12">
    <div class="product-detail-content video-section">
   <h3>Video</h3>
   <div class="video-wrpper">
  <video width="100%" height="350" controls>
    <source src="{{url('dealer_videos/'.$getAffiliatesDetail->video)}}" type="video/mp4">
  </video> 
   </div>
   </div>
 </div>
   @endif
   <div class="col-md-12">
  <div class="product-detail-content review-section">
  @if(!empty($ratingsdetail))
  <h3>Recensioni</h3> 
      @foreach($ratingsdetail as $userRatingsDetailsVal)
    <div class="review-row">
      <div class="review-img">
        <span>
    @if(!empty($userRatingsDetailsVal->profileimage))
          <img src="{{url('images/profile_images/'.$userRatingsDetailsVal->profileimage)}}" alt="">
    @else
      <img src="{{url('website/images/no-image.png')}}" alt="">
    @endif
        </span>
      </div>
      <div class="review-content">
    
    
        <div class="heading-part">
        <h4>{{$userRatingsDetailsVal->headline}}</h4>
        <div class="starts">
      <span class="fa fa-star @if($userRatingsDetailsVal->rate >= 1){{'checked'}} @endif"></span>
      <span class="fa fa-star @if($userRatingsDetailsVal->rate >= 2){{'checked'}} @endif"></span>
      <span class="fa fa-star @if($userRatingsDetailsVal->rate >= 3){{'checked'}} @endif"></span>
      <span class="fa fa-star @if($userRatingsDetailsVal->rate >= 4){{'checked'}} @endif"></span>
      <span class="fa fa-star @if($userRatingsDetailsVal->rate >= 5){{'checked'}} @endif"></span>
        </div>
      </div>
        <p>
         {{$userRatingsDetailsVal->review}}
        </p>
        <p class="date"><i class="fa fa-calendar"></i> {{date('m/d/Y',strtotime($userRatingsDetailsVal->created_at))}} </p>
    
      </div>
    
    </div>
    @endforeach 
  @endif
    
    <div class="form-section">
  @if(Auth::user())
    @if(Auth::user()->role_type==3)
      <h3 style="margin: revert;font-size: x-large;">Contact Form</h3>
      <div class="starts">
        <span class="content">Review</span>
        <div id="rateit7">
    </div>
      </div>
    
    
    
      <div class="form-part">
      <div class="row">
        <form role="form" method="post" action="{{url('affiliates-review/'.$getAffiliatesDetail->id)}}" id="filter-form" data-parsley-validate enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('rate') ? ' has-error' : '' }}  col-md-12">   
    <input type="hidden" id="rate_id" name="rate_id" value="@if(!empty($userRatingsDetails->id)){{$userRatingsDetails->id}}@endif">
    <input type="hidden" id="rate" name="rate" value="@if(!empty($userRatingsDetails->rate)){{$userRatingsDetails->rate}}@endif">
    
    <input type="hidden" id="userid" name="userid" value="@if(!empty(Auth::user()->id)){{Auth::user()->id}}@endif">
    
    <input type="hidden" id="affid" name="affid" value="@if(!empty($getAffiliatesDetail->id)){{$getAffiliatesDetail->id}}@endif">
    
    
    
       @if ($errors->has('rate'))
      <span class="help-block">
        <strong>{{ $errors->first('rate') }}</strong>
      </span>
       @endif
    
    </div>
    
        <div class="col-md-6">
          <div class="form-group {{ $errors->has('headline') ? ' has-error' : '' }}">

         
          <input class="form-control" type="text" name="headline" id="headline" readonly value="@if(!empty(Auth::user()->name)){{Auth::user()->name}}@endif" />
          @if ($errors->has('headline'))
          <span class="help-block">
            <strong>{{ $errors->first('headline') }}</strong>
          </span>
           @endif

           
        
      </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <input type="email" readonly class="form-control" id="email" placeholder="Email" value="@if(!empty(Auth::user()->email)){{Auth::user()->email}}@endif">
            </div>
        </div>
        <div class="col-md-12">
      <div class="form-group {{ $errors->has('review') ? ' has-error' : '' }}">
        <textarea class="form-control" name="review" id="review">@if(!empty($userRatingsDetails->review)){{$userRatingsDetails->review}}@endif</textarea>
        @if ($errors->has('review'))
        <span class="help-block">
        <strong>{{ $errors->first('review') }}</strong>
        </span>
        @endif
      </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <button type="submit" name="reviewbutton" value="1">Submit</button>
            </div>
        </div>
        </form>
      </div>
    </div>
   @endif
   @else
     <a href="{{url('affiliates-review/'.$getAffiliatesDetail->id)}}" class="btn btn-default">Scrivere una recensione</a>
  @endif
    </div>
  </div>
</div>
</div>
<!-- Product details section start end -->


<!-- sidebar section start here -->
<!-- sidebar section start end -->
</div>
      
    </div>   
</div>


 
<script type="text/javascript">
    $(function () { $('#rateit7').rateit({ max: 5, step: 1, backingfld: '#rate' }); });
</script>
<style>
textarea.form-control {
    height: 200px;
}
.form-control, input {
    border-width: 2px;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.single-bottom1 h6 {
    background: #F3F3F3;
    padding: 10px;
    color: #333;
    font-size: 1.35em;
    margin-top: 0.2em;
    font-family: 'JosefinSans-Bold';
}
.checked {
    color: orange;
}
.fa {
    font-size: 14px;
}

</style>


<script type="text/javascript">
$(document).ready(function(){
  $('.more').hide();
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
    //autoHeight:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:{{$arc}}
          },
          1000:{
              items:{{$arc}}
          }
      }
  });

  $( ".owl-prev").html('<i class="fa fa-angle-left"></i>');
  $( ".owl-next").html('<i class="fa fa-angle-right"></i>');
  
});

 function readmore(){
  $('.more').show();
  $('.less').hide();
  }
  
  function readless(){
  $('.more').hide();
  $('.less').show();
  }
</script>
 

 @endsection
 
