@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Modifica azienda</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="{{url('administrator/userlist')}}">Lista</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica azienda</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data"> 

							

							<div class="form-group {{ $errors->has('businessname') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Nome della ditta</label> 
					<input type="text" class="form-control" id="exampleInputEmail1" name="businessname" value="{{ !empty($getEditDetail)?$getEditDetail->business_name:old('businessname')}}" placeholder="Nome della ditta
" maxlength="30">

								    @if ($errors->has('businessname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('businessname') }}</strong>
                                    </span>
                                @endif

							</div>

							

							<div class="form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Telefono</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" min="1" max="10" name="telephoneNumber"  value="{{ !empty($getEditDetail)?$getEditDetail->phone:old('telephoneNumber')}}" placeholder="Telephone Number">

								  @if ($errors->has('telephoneNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephoneNumber') }}</strong>
                                    </span>
                                @endif

							</div>



							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">E-mail</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{!empty($getEditDetail)?$getEditDetail->email:old('email')}}"  placeholder="E-Mail Address">

								  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
								 <label for="adr">Indirizzo</label> 
								 <input type="text" class="form-control" id="adr" name="address"  value="{{ !empty($getEditDetail)?$getEditDetail->regione:old('address')}}" placeholder="Indirizzo">

								  @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif

							</div>


							<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
								 <label for="city">Città</label> 
								 <input type="text" class="form-control" id="city" name="city"  value="{{ !empty($getEditDetail)?$getEditDetail->city:old('city')}}" placeholder="Città">

								  @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif

							</div>

							<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
								 <label for="state">Stato</label> 
								 <input type="text" class="form-control" id="state" name="state"  value="{{ !empty($getEditDetail)?$getEditDetail->state:old('state')}}" placeholder="Stato">

								  @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif

							</div>


							<div class="form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
								 <label for="postalCode">CAP</label> 
								 <input type="text" class="form-control" id="zip" name="postalCode" value="{{ !empty($getEditDetail)?$getEditDetail->postcode:old('postalCode')}}" placeholder="Postal Code">

								    @if ($errors->has('postalCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postalCode') }}</strong>
                                    </span>
                                @endif

							</div>

							<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
								 <label for="logo">Logo</label> 
								 <input type="file" class="form-control" id="logo" name="logo" value="{{ !empty($userProfile)?$userProfile->postalCode:old('logo')}}" placeholder="Logo Code">
                 <input type="hidden" name="logo_old" value="{{$getEditDetail->logo}}">

                 <?php if(!empty($getEditDetail->logo))
                 {?>

                    <img src="{{url('images/dealer_logos/'.$getEditDetail->logo)}}" style="height: 100px; width: 100px;">
                 <?php }?>

								    @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif

							</div>

							

								  {{ csrf_field() }}

							  <button type="submit" name="add" class="btn btn-default">Salva</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>


<script>

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