@extends('website-layout.header')

@section('content')
<?php
$BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';
$paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.chk-out .form-control {
    padding: 6px 12px;
    border: 1px solid #000;
    border-radius: 0;
  }

.chk-out label{
  font-size: 18px;
    color: #000;
    margin-bottom: 10px;
}
h2{
  font-size: 26px;
    font-weight: 600;
    color: #000!important;
    margin: 10px 0 15px;
}
h3{
  font-size: 20px;
    font-weight: 600;
    color: #000!important;
    margin: 10px 0 15px;
}
.billing-sddress{
  padding: 30px;
  border: 1px solid #000;
  margin-bottom: 20px;
}

.cart-summary{
  background: #f1f1f1;
  padding: 30px;
  margin-bottom: 20px;
}

.cart-summary .btn-outline-primary {
    border: 1px solid #3097D1;
    font-weight: 600;
    background: #fff;
    color: #3097D1;
}
.cart-summary .btn-outline-primary:hover {
    border: 1px solid #3097D1;
    color: #fff;
    background: #3097D1;
}

</style>


<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <!-- <h2><a href="{{url('/')}}">Home</a></h2> -->
      <h2> Checkout</h2>
    </div>
    <div class="col-md-8">
      <div class="chk-out billing-sddress">

      <h3>Billing Address</h3>

     <form role="form" method="post" action="{{$paypalUrl}}"  id="demo-form" data-parsley-validate>
      
            
            <div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="fname"><i class="fa fa-user"></i> Nome e cognome</label>
              <input type="text" class="form-control" id="fname" name="firstname" placeholder="John M. Doe" maxlength="30">
            </div>
          </div>
          </div>

<div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="john@example.com" maxlength="40">
            </div>
</div>
</div>

<div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="telephone"><i class="fa fa-envelope"></i>Telefono</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telefono" maxlength="10">
            </div>
</div>
</div>

           
            
       
            
            <div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="adr"><i class="fa fa-address-card-o"></i> Indirizzo</label>
              <input type="text" id="adr" class="form-control" name="address" placeholder="542 W. 15th Street" maxlength="100">
            </div>
</div>
</div>
          
            

            <div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="city"><i class="fa fa-institution"></i> Città</label>
              <input type="text" id="city" class="form-control" name="city" placeholder="New York" maxlength="30">
            </div>
</div>
</div>
         
            
          
            
     <div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="state">Stato</label>
              <input type="text" id="state" class="form-control" name="state" placeholder="NY" maxlength="20">
            </div>
</div>
</div>
            
           
            
          <div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="zip">CAP</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="10001" maxlength="10">
            </div>
</div>
</div>

               <div class="row">
              <div class="col-md-12">
            <div class="form-group">
              <label for="zip">Codice di riferimento</label>
              <input type="text"  class="form-control" id="zip" name="refferal"  >
            </div>
</div>
</div>
              
              </div>

                
                
                
             
             

                
                
                
             
      
          
         {{csrf_field()}}

        </div>
    

  <div class="col-md-4">
   
    <div class="cart-summary">
      <h4>Carrello <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{count($cartDetail)}}</b></span></h4>

     @php $total='0';
          $arrId = array();
     @endphp
      @foreach($cartDetail as $detail)
      @php $total = $total+ $detail->price;
                array_push($arrId,$detail->id);
      @endphp
           <p><a href="{{url('card-detail/'.$detail->id)}}">{{$detail->name}}</a> <span class="price">&euro;{{$detail->price}}</span></p>
      @endforeach
    
 
      <hr>
      <p>Totale <span class="price" style="color:black"><b>&euro;{{$total}}</b></span></p>

                 
            <input type="hidden" name="business" value="{{$BusinessEmail}}">  
            <input type="hidden" name="cmd" value="_xclick">            
            <input type="hidden" name="item_number" value="20">
            <input type="hidden" name="item_name" value="">
            <input type="hidden" id="amount" name="amount" value="{{ !empty($cartDetail)?$total:'' }}">
            <input type="hidden" name="currency_code" value="EUR">    
            <input type="hidden" name="custom" id="custom" value="">                                        
            <input type='hidden' name='cancel_return' value='{{url('paypal/cancel')}}'>
            <input type='hidden' name='return' value='{{url('paypal/getCheckoutDetail')}}'> 
           <!-- <input type='hidden' name='notify_url' value='{{url('paypal/ipnstatus')}}'> -->
        
     
        <button type="submit" value="Continue to checkout" class="btn btn-outline-primary">Vai al checkout</button>
     
      </form>

</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$('form').submit(function(){

 var custome = [];

    if( $.trim($('input[name="firstname"]').val()) == '' ){  // alert();
     
      $('input[name="firstname"]').focus();
      return false;
    }else{
      var name= $('input[name="firstname"]').val();
      custome.push({name:name});
      $('#custom').val(JSON.stringify(custome));
      $('input[name="item_name"]').val(name);
    }


    

    if( $.trim($('input[name="email"]').val()) == '' ){  // alert();
     
      $('input[name="email"]').focus();
      return false;
    }else{
      var email= $('input[name="email"]').val();
      custome.push({email:email});
       $('#custom').val(JSON.stringify(custome));
    }


  if( $.trim($('input[name="telephone"]').val()) == '' ){  // alert();
     
      $('input[name="telephone"]').focus();
      return false;
    }else{
      var telephone= $('input[name="telephone"]').val();
      custome.push({telephone:telephone});
       $('#custom').val(JSON.stringify(custome));
    }

    if( $.trim($('input[name="address"]').val()) == '' ){  // alert();
    
      $('input[name="address"]').focus();
        return false;
    }else{
      var address= $('input[name="address"]').val();
      custome.push({address:address});
       $('#custom').val(JSON.stringify(custome));
    }



    if( $.trim($('input[name="city"]').val()) == '' ){  // alert();
     
      $('input[name="city"]').focus();
      return false;
    }else{
      var city= $('input[name="city"]').val();
      custome.push({city:city});
        $('#custom').val(JSON.stringify(custome));
      
    }

   if( $.trim($('input[name="state"]').val()) == '' ){  // alert();
  
      $('input[name="state"]').focus();
        return false;
    }else{
      var state= $('input[name="state"]').val();
      custome.push({state:state});
      $('#custom').val(JSON.stringify(custome));
    }

  if( $.trim($('input[name="zip"]').val()) == '' ){  // alert();
    
      $('input[name="zip"]').focus();
       return false;
    }else{

      var zip= $('input[name="zip"]').val();
      custome.push({zip:zip});
      $('#custom').val(JSON.stringify(custome));
    }

    if( $.trim($('input[name="refferal"]').val() !=''))
    {
       var refferal= $('input[name="refferal"]').val();
      custome.push({refferal:refferal});
      $('#custom').val(JSON.stringify(custome));

    }


});

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

      /**
       * Google Places auto-complete
       */
      function initMap() {
        var input = document.getElementById('adr');
        var options = {
          types: ["geocode"]
        };
        autocomplete = new google.maps.places.Autocomplete(input, options);

        addAutocompleteListener(autocomplete, "#adr", true);
      }

      function addAutocompleteListener(autocomplete, elm, target) {
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          var address = "";
           console.log(place.address_components);
          var city_name = country_code = territory_code = postal_code = "" ;
          var country_name = territory_name = "";
          place.address_components.forEach(function(obj) {
            // Sublocality
            if (obj.types.indexOf("neighborhood") != -1) {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#city").val(city_name);
            }
      
      if (obj.types.indexOf("postal_code") != -1) {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              postal_code = obj.long_name;
        console.log(postal_code);
        jQuery("#zip").val(postal_code);
            }
      
            if (obj.types.indexOf("sublocality") != -1 && city_name == "") {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#city").val(city_name);
            }
            if (obj.types.indexOf("administrative_area_level_3") != -1 && city_name == "") {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#city").val(city_name);
            }
            // City
            if (obj.types.indexOf("locality") != -1 && city_name == "") {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#city").val(city_name);
            }
            // Territory
            if (obj.types.indexOf("administrative_area_level_1") != -1 ) {
              jQuery(elm).val(jQuery(elm).val() + obj.short_name + ", ");
              territory_code = obj.short_name;
              territory_name = obj.long_name;
            }
            // Country
            if (obj.types.indexOf("country") != -1) {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name);
              country_code = obj.short_name;
              country_name = obj.long_name;
			   jQuery("#state").val(country_name);
            }
          })
          if (target)
          {
            //target_google_ville(city_name, territory_code, country_code, territory_name, country_name);
          }
          // jQuery("#shipping_form_street_address").val(address);
        });
      }

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAThYtCdyyeiqogil0eUFqq2W8tNhyWTUU&libraries=places&callback=initMap"></script>
@endsection
