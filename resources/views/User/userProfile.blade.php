  @extends('layouts.profile_dashboard')

  @section('content')

  <div id="page-wrapper" >

    <div id="page-inner"> 


     <div class="row">
      <div class="col-md-8 heading">
       <h2> Dati Personali</h2>                     
       
     </div> 
     <div class="col-md-4 text-right">
      <div class="breadcumb">
        <ul>
          <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
          <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
          <li><a class="current" href="#">Dati Personali</a></li>
          
        </ul>
      </div>
    </div>
  </div>
  <hr/>

  <div class="row">



   @if (Session::has('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{Session::get('success') }}</strong>
  </div>
  @endif

  <div class="col-md-12">
      <h3 class="page-info page-info-title">Completa il tuo profilo per scaricare la lettera di incarico e il tuo tesserino</h3>
    <!-- Form Elements -->
    <div class="panel panel-primary">
	<div class="panel-heading">
    <h3 class="panel-title detail-heading">Dati personali</h3>
     </div>
     <div class="panel-body">
      <form role="form" method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="row">
        
        <div class="col-md-6">
         <div class="form-group">
          <label>ID Personale</label>
          <input id="name" type="text" class="form-control" value="{{ !empty($userProfile)?$userProfile->id:old('name') }}" required autofocus  readonly="">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group ">
          <label>Punteggio</label>
          <input id="name" type="text" class="form-control"  value="{{ !empty($userProfile)?'0':old('name') }}" required autofocus  readonly="">

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
       <div class="form-group">
        <label>Bilancio</label>
        <input id="name" type="text" class="form-control"  value="{{ !empty($userProfile)?'0':old('name') }}" required autofocus  readonly="">

      </div>
    </div>


    <div class="col-md-6">
      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label>Nome <span style="color: red;">*</span></label>
        <input id="name" type="text" class="form-control" name="name" value="{{ !empty($userProfile)?$userProfile->name:old('name') }}" required autofocus maxlength="30">

        @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">
      <div class="form-group form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
       <label for="userName">cognome <span style="color: red;">*</span></label>

       
       <input id="userName" type="text" class="form-control" name="userName" value="{{ !empty($userProfile->userName)?$userProfile->userName: old('userName') }}" required autofocus maxlength="30">

       @if ($errors->has('userName'))
       <span class="help-block">
        <strong>{{ $errors->first('userName') }}</strong>
      </span>
      @endif
    </div>


    <?php 
    $date= strtotime('+1 years',strtotime($userProfile->created_at));  ?>

  </div>
  <div class="col-md-6">
   <div class="form-group form-group">
     <label for="userName" >Data Registrazione</label>                            
     <input id="userName" type="text" class="form-control" value="{{ !empty($userProfile)?date('m-d-Y',strtotime($userProfile->created_at)): old('userName') }}" required autofocus readonly="">
     
   </div>
 </div>
</div>



<div class="row">
  <div class="col-md-6">
    <div class="form-group form-group">
     <label for="userName">Scadenza</label>
     
     <input id="userName" type="text" class="form-control" value="{{ !empty($userProfile)?date('m-d-Y',$date): old('userName') }}" required autofocus  readonly="">
     
   </div>
 </div>

 <div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('referralCode') ? ' has-error' : '' }}">
    <label for="referralCode">Codice di riferimento</label>
    
    <input id="referralCode" type="text" class="form-control" name="referralCode" value="{{!empty($userProfile)?$userProfile->referralCode:old('referralCode') }}" readonly=""  autofocus>

    @if ($errors->has('referralCode'))
    <span class="help-block">
      <strong>{{ $errors->first('referralCode') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>

<div class="row">
       
  <div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
    <label for="telephoneNumber">Telefono <span style="color: red;">*</span></label>

    
    <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber" value="{{ !empty($userProfile->telephoneNumber)?$userProfile->telephoneNumber: old('telephoneNumber') }}" required autofocus>

    @if ($errors->has('telephoneNumber'))
    <span class="help-block">
      <strong>{{ $errors->first('telephoneNumber') }}</strong>
    </span>
    @endif
  </div>
</div>


<div class="col-md-6">
 <div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  <label for="email">E-mail </label>

  
  <input id="email" type="email" class="form-control" name="email" value="{{ !empty($userProfile)?$userProfile->email: old('email') }}" readonly="" required>

  @if ($errors->has('email'))
  <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>
</div>
</div>


<div class="row">
  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
      <label for="dob">Nata/o a <span style="color: red;">*</span></label>
      
      <input id="dob" type="date" class="form-control" name="dob" value="{{ !empty($userProfile->dob)?$userProfile->dob: old('dob') }}" required>

      @if ($errors->has('dob'))
      <span class="help-block">
        <strong>{{ $errors->first('dob') }}</strong>
      </span>
      @endif
    </div>
  </div>


<div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('region') ? ' has-error' : '' }}">
    <label for="region">Regione <span style="color: red;">*</span></label>
    
    <input id="region" type="text" class="form-control" name="region" value="{{ !empty($userProfile->region)?$userProfile->region: old('region') }}" required>

    @if ($errors->has('region'))
    <span class="help-block">
      <strong>{{ $errors->first('region') }}</strong>
    </span>
    @endif
  </div>
</div>

</div>

<div class="row">
  
  <div class="col-md-6">
  <div class="form-group form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
   <label for="postalCode">Cap <span style="color: red;">*</span></label>

   
   <input id="postalCode" type="text" class="form-control" name="postalCode" value="{{ !empty($userProfile->postalCode)?$userProfile->postalCode:old('postalCode') }}" required autofocus>

   @if ($errors->has('postalCode'))
   <span class="help-block">
    <strong>{{ $errors->first('postalCode') }}</strong>
  </span>
  @endif
</div>
</div>

<div class="col-md-6">
  <div class="form-group form-group{{ $errors->has('Fcode') ? ' has-error' : '' }}">
    <label for="Fcode">Cod. Fiscale <!-- <span style="color: red;">*</span> --></label>
    
    <input id="Fcode" type="text" class="form-control" name="Fcode" value="{{ !empty($userProfile->fcode)?$userProfile->fcode: old('Fcode') }}" >

    @if ($errors->has('Fcode'))
    <span class="help-block">
      <strong>{{ $errors->first('Fcode') }}</strong>
    </span>
    @endif
  </div>
</div>


</div>

<div class="row">
  <!-- <div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('streat') ? ' has-error' : '' }}">
    <label for="streat">Via <span style="color: red;">*</span></label>
    
    <input id="streat" type="text" class="form-control" name="streat" value="{{ !empty($userProfile->streat)?$userProfile->streat: old('streat') }}" required>

    @if ($errors->has('streat'))
    <span class="help-block">
      <strong>{{ $errors->first('streat') }}</strong>
    </span>
    @endif
  </div>
</div> -->


<!--   <div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('resiaddress') ? ' has-error' : '' }}">
    <label for="resiaddress">Residente a <span style="color: red;">*</span></label>
    
    <input id="resiaddress" type="text" class="form-control" name="resiaddress" value="{{ !empty($userProfile->resiaddress)?$userProfile->resiaddress: old('resiaddress') }}" required>

    @if ($errors->has('resiaddress'))
    <span class="help-block">
      <strong>{{ $errors->first('resiaddress') }}</strong>
    </span>
    @endif
  </div>
</div> -->


</div>



<div class="row">
  <div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('pariva') ? ' has-error' : '' }}">
    <label for="pariva">Part. I.V.A</label>
    
    <input id="pariva" type="text" class="form-control" name="pariva" value="{{ !empty($userProfile->pariva)?$userProfile->pariva: old('pariva') }}" >

    @if ($errors->has('pariva'))
    <span class="help-block">
      <strong>{{ $errors->first('pariva') }}</strong>
    </span>
    @endif
  </div>
</div>  

<div class="col-md-6">
 <div class="form-group form-group{{ $errors->has('business_name') ? ' has-error' : '' }}">
  <label for="business_name">Ragione Sociale<!--  <span style="color: red;">*</span> --></label>
  
  <input id="business_name" type="text" class="form-control" name="business_name" value="{{ !empty($userProfile->business_name)?$userProfile->business_name: old('business_name') }}">

  @if ($errors->has('business_name'))
  <span class="help-block">
    <strong>{{ $errors->first('business_name') }}</strong>
  </span>
  @endif
</div>  
</div>
</div>



<div class="row">
  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('Paypal') ? ' has-error' : '' }}">
      <label for="Paypal">Paypal <span style="color: red;">*</span></label>
      
      <input id="Paypal" type="text" class="form-control" name="Paypal" value="{{ !empty($userProfile->paypal)?$userProfile->paypal: old('Paypal') }}" required>

      @if ($errors->has('Paypal'))
      <span class="help-block">
        <strong>{{ $errors->first('Paypal') }}</strong>
      </span>
      @endif
    </div>  
  </div>


</div>   



<div class="row">

  <div class="col-md-6">

    <div class="form-group form-group{{ $errors->has('profileImage') ? ' has-error' : '' }}">

      <label for="pariva">Immagine del profilo</label>   

      <input id="profileImage" type="file" class="form-control custom-file-input" name="profileImage" >
      <div class="jumbotron">
       <div class="image-wrap">
      <input type="hidden" name="old_file" value="{{!empty($userProfile->profileimage)?$userProfile->profileimage:''}}"> 
      @if(!empty($userProfile->profileimage))
      <img src="{{url('images/profile_images/'.$userProfile->profileimage)}}" style="height: 82px;width: 89px;">
      @endif

      @if ($errors->has('profileImage'))
      <span class="help-block">
        <strong>{{ $errors->first('profileImage') }}</strong>
      </span>
      @endif
    </div>
    </div>
    </div>  
  </div>

  <div class="col-md-6">

    <div class="form-group form-group{{ $errors->has('photo_id_document') ? ' has-error' : '' }}">

      <label for="pariva">Documento di identità con foto</label>   

      <input id="photo_id_document" type="file" class="form-control custom-file-input" name="photo_id_document[]" multiple >
      <div class="jumbotron">
       <div class="image-wrap">
      <input type="hidden" name="photo_id_document_old" value="{{!empty($userProfile->photo_id_document)?$userProfile->photo_id_document:''}}"> 
      @if(!empty($multipleImage))
        @foreach($multipleImage as $image)
      <img src="{{url('images/profile_images/'.$image->document)}}" style="height: 82px;width: 89px;">
        @endforeach
      @endif

      @if ($errors->has('photo_id_document'))
      <span class="help-block">
        <strong>{{ $errors->first('photo_id_document') }}</strong>
      </span>
      @endif
    </div>
    </div>
    </div>  
  </div>

</div>   

<div class="row">
    <div class="col-md-6">

    <div class="form-group form-group{{ $errors->has('contract_letter') ? ' has-error' : '' }}">

      <label for="pariva">lettera di incarico</label>   

      <input id="contract_letter" type="file" class="form-control custom-file-input" name="contract_letter" >
      <div class="jumbotron">
       <div class="image-wrap">
      <input type="hidden" name="old_file_contract" value="{{!empty($userProfile->photo_id_document)?$userProfile->photo_id_document:''}}"> 
      @if(!empty($userProfile->photo_id_document))
   
      <object style="height: 82px;width: 89px;" data="{{url('images/profile_images/'.$userProfile->photo_id_document)}}"></object>
      @endif

      @if ($errors->has('contract_letter'))
      <span class="help-block">
        <strong>{{ $errors->first('contract_letter') }}</strong>
      </span>
      @endif
    </div>
    </div>
    </div>  
  </div>

</div>



<div class="row">
    <div class="col-lg-12">
        <div class="detail-heading marginTop">
          <h2>Banca</h2>
        </div>
      </div>
  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('IBAN') ? ' has-error' : '' }}">
      <label for="IBAN">IBAN <span style="color: red;">*</span></label>
      
      <input id="IBAN" type="text" class="form-control" name="IBAN" value="{{ !empty($userProfile->iban)?$userProfile->iban: old('IBAN') }}" required>

      @if ($errors->has('IBAN'))
      <span class="help-block">
        <strong>{{ $errors->first('IBAN') }}</strong>
      </span>
      @endif
    </div>
  </div>  

  <div class="col-md-6">
   <div class="form-group form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
    <label for="bank">Banca <span style="color: red;">*</span></label>
    
    <input id="bank" type="text" class="form-control" name="bank" value="{{ !empty($userProfile->bank)?$userProfile->bank: old('bank') }}" required>

    @if ($errors->has('bank'))
    <span class="help-block">
      <strong>{{ $errors->first('bank') }}</strong>
    </span>
    @endif
  </div> 
</div>
</div> 



<div class="row">
    <div class="col-lg-12">
        <div class="detail-heading marginTop">
          <h2>Social Network</h2>
        </div>
      </div>
  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
      <label for="facebook">facebook</label>
      
      <input id="facebook" type="text" class="form-control" name="facebook" value="{{ !empty($userProfile->facebook_url)?$userProfile->facebook_url: old('facebook') }}" >

      @if ($errors->has('facebook'))
      <span class="help-block">
        <strong>{{ $errors->first('facebook') }}</strong>
      </span>
      @endif
    </div>  
  </div>
  

  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
      <label for="twitter">Twitter</label>
      
      <input id="twitter" type="text" class="form-control" name="twitter" value="{{ !empty($userProfile->twitter_url)?$userProfile->twitter_url: old('twitter') }}" >

      @if ($errors->has('twitter'))
      <span class="help-block">
        <strong>{{ $errors->first('twitter') }}</strong>
      </span>
      @endif
    </div>  
  </div>
  
  
</div>  


<div class="row">
  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
      <label for="linkedin">Linkedin</label>
      
      <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ !empty($userProfile->linkedin_url)?$userProfile->linkedin_url: old('linkedin') }}" >

      @if ($errors->has('linkedin'))
      <span class="help-block">
        <strong>{{ $errors->first('linkedin') }}</strong>
      </span>
      @endif
    </div>  
  </div>
  

  <div class="col-md-6">
    <div class="form-group form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
      <label for="instagram">Instagram</label>
      
      <input id="instagram" type="text" class="form-control" name="instagram" value="{{ !empty($userProfile->instagram_url)?$userProfile->instagram_url: old('instagram') }}">

      @if ($errors->has('instagram'))
      <span class="help-block">
        <strong>{{ $errors->first('instagram') }}</strong>
      </span>
      @endif
    </div>  
  </div>
  
  
</div>  
                                


<button type="submit" name="updateprofile" class="btn btn-success btn-lg">Conferma</button>                                     
</form>

</div>
                                  <!-- <div class="col-md-6"> 

                                             
                                              @if(!empty($userProfile->qr_code))    
                                                    <img src="{{url('/'.$userProfile->qr_code)}}">
                                               @endif 
                                           
                                             </div> -->


                                   <!-- <div class="col-md-6"> 

                                    
                                       @if($userProfile->is_profile_complete =='1')    
                                          <a href="{{url('/images/bklic_card.pdf')}}" download title="Bklic Card">
                                              <img src="{{url('/images/bklic_card.jpg')}}" alt="W3Schools" style="width: 409px;  margin-left: 39px; height: 174px;  margin-top: 37px;">
                                           </a>
                                             @endif 
                                           </div> -->


                                  <!--  <div class="col-md-6"> 

                                      @if($userProfile->is_profile_complete =='1')    
                                        <a href="{{url('/images/bklic_letter.pdf')}}" download title="Comfirmation Letter">
                                           <img src="{{url('/images/bklic_letter.jpg')}}" alt="W3Schools" style="width: 308px;  margin-left: 39px; height: 174px;  margin-top: 37px;">
                                         </a>
                                        @endif 
                                      </div> -->
                                      
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
