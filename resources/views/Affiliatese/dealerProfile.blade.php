@extends('Affiliatese.dashboard')

@section('content')

   <?php 
    $date= strtotime('+1 years',strtotime($userProfile->created_at));  ?>

 <div id="page-wrapper" >
            <div id="page-inner">
                
               
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-primary">
						<div class="panel-heading">
						<h3 class="panel-title">Profilo del rivenditore</h3>
					  </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">                                  
                                    
                             @if (Session::has('success'))
                               <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{Session::get('success') }}</strong>
                                </div>
                             @endif
                                    <form role="form" method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data">
                                         {{ csrf_field() }}

										<div class="form-horizontal">
										<div class="form-group">
										<div class="col-sm-6">
										<div class=" {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Nome <span style="color: red;">*</span></label>
                                           <input id="name" type="text" class="form-control" name="name" value="{{ !empty($userProfile->name)?$userProfile->name:old('name') }}" required autofocus maxlength="30">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										<div class="col-sm-6">
										<div class="{{ $errors->has('userName') ? ' has-error' : '' }}">
                                             <label for="userName">Cognome <span style="color: red;">*</span></label>

                            
                                            <input id="userName" type="text" class="form-control" name="userName" value="{{ !empty($userProfile->userName)?$userProfile->userName: old('userName') }}" required autofocus maxlength="30">

                                            @if ($errors->has('userName'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('userName') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										</div>
										<!---second row-->
										<div class="form-group">
										<div class="col-sm-6">
										<div class="{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
                                              <label for="telephoneNumber">Telefono <span style="color: red;">*</span></label>

                                
                                                <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber" value="{{ !empty($userProfile)?$userProfile->telephoneNumber: old('telephoneNumber') }}" required autofocus>

                                                @if ($errors->has('telephoneNumber'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('telephoneNumber') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
										</div>
										<div class="col-sm-6">
										<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email">E-mail <span style="color: red;">*</span></label>

                                      
                                            <input id="email" type="email" class="form-control" name="email" value="{{ !empty($userProfile)?$userProfile->email: old('email') }}" readonly="" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										</div>
										<!---3rd row-->
										<div class="form-group">
										<div class="col-sm-6">
										<div class="{{ $errors->has('resiaddress') ? ' has-error' : '' }}">
                                              <label for="resiaddress">Indirizzo <span style="color: red;">*</span></label>
                                      
                                            <input id="resiaddress" type="text" class="form-control" name="resiaddress" value="{{ !empty($userProfile)?$userProfile->resiaddress: old('resiaddress') }}" required>

                                            @if ($errors->has('resiaddress'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('resiaddress') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										<div class="col-sm-6">
										<div class="{{ $errors->has('region') ? ' has-error' : '' }}">
                                              <label for="region">Città <span style="color: red;">*</span></label>
                                      
                                            <input id="region" type="text" class="form-control" name="region" value="{{ !empty($userProfile)?$userProfile->region: old('region') }}" required>

                                            @if ($errors->has('region'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('region') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										</div>
										<!---4rd row-->
										<div class="form-group">
										<div class="col-sm-6">
										<div class="{{ $errors->has('postalCode') ? ' has-error' : '' }}">
                                             <label for="postalCode">Cap <span style="color: red;">*</span></label>

                                
                                            <input id="postalCode" type="text" class="form-control" name="postalCode" value="{{ !empty($userProfile)?$userProfile->postalCode:old('postalCode') }}" required autofocus>

                                            @if ($errors->has('postalCode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('postalCode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										<div class="col-sm-6">
										<div class="{{ $errors->has('pariva') ? ' has-error' : '' }}">
                                              <label for="pariva">Part. I.V.A <span style="color: red;">*</span></label>
                                      
                                            <input id="pariva" type="text" class="form-control" name="pariva" value="{{ !empty($userProfile)?$userProfile->pariva: old('pariva') }}" required>

                                            @if ($errors->has('pariva'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pariva') }}</strong>
                                                </span>
                                            @endif
                                        </div>
										</div>
										</div>
										<div class="form-group">
										<div class="col-xs-12"><button type="submit" name="updateprofile" class="btn btn-primary btn-custom">Conferma modifiche</button></div>
										</div>
										</div>
										
										</div>
                                    </form>
                                  
                                </div>
                            
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>              
    </div>
            
            </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })

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
        var input = document.getElementById('resiaddress');
        var options = {
          types: ["geocode"]
        };
        autocomplete = new google.maps.places.Autocomplete(input, options);

        addAutocompleteListener(autocomplete, "#resiaddress", true);
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
        jQuery("#region").val(city_name);
            }
      
      if (obj.types.indexOf("postal_code") != -1) {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              postal_code = obj.long_name;
        console.log(postal_code);
        jQuery("#postalCode").val(postal_code);
            }
      
            if (obj.types.indexOf("sublocality") != -1 && city_name == "") {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#region").val(city_name);
            }
            if (obj.types.indexOf("administrative_area_level_3") != -1 && city_name == "") {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#region").val(city_name);
            }
            // City
            if (obj.types.indexOf("locality") != -1 && city_name == "") {
              jQuery(elm).val(jQuery(elm).val() + obj.long_name + ", ");
              city_name = obj.long_name;
        jQuery("#region").val(city_name);
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
