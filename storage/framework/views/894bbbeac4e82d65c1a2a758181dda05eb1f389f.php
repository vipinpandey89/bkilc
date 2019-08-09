<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Modifica azienda</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="<?php echo e(url('administrator/userlist')); ?>">Lista</a></li>

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

							

							<div class="form-group <?php echo e($errors->has('businessname') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Nome della ditta</label> 
					<input type="text" class="form-control" id="exampleInputEmail1" name="businessname" value="<?php echo e(!empty($getEditDetail)?$getEditDetail->business_name:old('businessname')); ?>" placeholder="Nome della ditta
" maxlength="30">

								    <?php if($errors->has('businessname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('businessname')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							

							<div class="form-group<?php echo e($errors->has('telephoneNumber') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Telefono</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" min="1" max="10" name="telephoneNumber"  value="<?php echo e(!empty($getEditDetail)?$getEditDetail->phone:old('telephoneNumber')); ?>" placeholder="Telephone Number">

								  <?php if($errors->has('telephoneNumber')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('telephoneNumber')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>



							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">E-mail</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo e(!empty($getEditDetail)?$getEditDetail->email:old('email')); ?>"  placeholder="E-Mail Address">

								  <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
								 <label for="adr">Indirizzo</label> 
								 <input type="text" class="form-control" id="adr" name="address"  value="<?php echo e(!empty($getEditDetail)?$getEditDetail->regione:old('address')); ?>" placeholder="Indirizzo">

								  <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>


							<div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
								 <label for="city">Città</label> 
								 <input type="text" class="form-control" id="city" name="city"  value="<?php echo e(!empty($getEditDetail)?$getEditDetail->city:old('city')); ?>" placeholder="Città">

								  <?php if($errors->has('city')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('city')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							<div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
								 <label for="state">Stato</label> 
								 <input type="text" class="form-control" id="state" name="state"  value="<?php echo e(!empty($getEditDetail)?$getEditDetail->state:old('state')); ?>" placeholder="Stato">

								  <?php if($errors->has('state')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('state')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>


							<div class="form-group<?php echo e($errors->has('postalCode') ? ' has-error' : ''); ?>">
								 <label for="postalCode">CAP</label> 
								 <input type="text" class="form-control" id="zip" name="postalCode" value="<?php echo e(!empty($getEditDetail)?$getEditDetail->postcode:old('postalCode')); ?>" placeholder="Postal Code">

								    <?php if($errors->has('postalCode')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('postalCode')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							<div class="form-group<?php echo e($errors->has('logo') ? ' has-error' : ''); ?>">
								 <label for="logo">Logo</label> 
								 <input type="file" class="form-control" id="logo" name="logo" value="<?php echo e(!empty($userProfile)?$userProfile->postalCode:old('logo')); ?>" placeholder="Logo Code">
                 <input type="hidden" name="logo_old" value="<?php echo e($getEditDetail->logo); ?>">

                 <?php if(!empty($getEditDetail->logo))
                 {?>

                    <img src="<?php echo e(url('images/dealer_logos/'.$getEditDetail->logo)); ?>" style="height: 100px; width: 100px;">
                 <?php }?>

								    <?php if($errors->has('logo')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('logo')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							

								  <?php echo e(csrf_field()); ?>


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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>