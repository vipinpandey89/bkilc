<?php $__env->startSection('content'); ?>
<div class="contact affiliates-bg">
	<!-- <div class="container">
		<ol class="breadcrumb">
			<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
			<li class="active">Affiliati</li>
		</ol>
	</div> -->
		<!---start-contact---->
		<!-- <h3 style="margin-bottom:20px;">Affiliati</h3> -->
		<div class="google-maps" style="margin-bottom: 25px;">
			<iframe style="width:100%;height:450px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48647.502952760224!2d18.139274957415065!3d40.35412541916928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13442ee42f2d1109%3A0x9b5b5a4c6ab377f0!2s73100+Lecce%2C+Province+of+Lecce%2C+Italy!5e0!3m2!1sen!2sin!4v1558099082449!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="container">
		<div class="col-md-12 product-model-sec">
			<div class="row">
				<div class="col-md-12">
					<form role="form" method="post" action="" id="filter-form" data-parsley-validate enctype="multipart/form-data" class="affiliates-wrapper">
						<?php echo e(csrf_field()); ?>


						<h3><span>Tutti i risultati</span></h3>
						<div class="row">
							<div class="col-md-6"><select class="form-control affiliates-select" id="category" name="category" onchange="getsubcategory(this.value);">
								<option value="">Seleziona categoria</option>
								<?php if(!empty($getCategories)): ?>
								<?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($catval->parent_id == 0): ?>
								<option value="<?php echo e($catval->id); ?>"><?php echo e($catval->title); ?></option>
								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</select></div>
							<div class="col-md-6">
                                             <!--<select class="form-control affiliates-select" id="category" name="category" onchange="getsubcategory(this.value);">
												<option value="">Seleziona categoria</option>
												<?php if(!empty($getCategories)): ?>
													<?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($catval->parent_id == 0): ?>
															<option value="<?php echo e($catval->id); ?>"><?php echo e($catval->title); ?></option>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</select>-->
											<div id="subcat">
												<select class="form-control affiliates-select" id="subcategory" name="subcategory">
													<option value="">Seleziona sottocategoria</option>

												</select>
											</div>	

										</div>
									</div>

									<div class="affiliates-col">
										<div class="row">
											<div class="col-md-12">
												<label for="location" class="control-label form-label-text">Location</label>
												<input class="form-control form-input-field" type="text" name="location" id="location" value="" placeholder="Destination, Area, Street" />
											</div>
										</div>
									</div>

									<div class="affiliates-col">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6"><button type="submit" name="searchbutton" class="btn btn-default upload-button">Cerca</button></div>
													<!--<div class="col-md-6"><div class="filter-wrap"><a href="#">More Filter</a></div></div>-->
												</div>
											</div>
										</div>
									</div>



                                <!-- <div class="row">
									<div class="form-group<?php echo e($errors->has('category') ? ' has-error' : ''); ?> col-md-6">
										<label for="category" class="col-md-4 control-label">Categoria</label>

									   
											<select class="form-control" id="category" name="category" onchange="getsubcategory(this.value);">
												<option value="">Seleziona categoria</option>
												<?php if(!empty($getCategories)): ?>
													<?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($catval->parent_id == 0): ?>
															<option value="<?php echo e($catval->id); ?>"><?php echo e($catval->title); ?></option>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</select>

										   
										
									</div>
									
									<div class="form-group<?php echo e($errors->has('subcategory') ? ' has-error' : ''); ?> col-md-6">
										<label for="subcategory" class="col-md-4 control-label">Sottocategoria</label>

										<div id="subcat">
											<select class="form-control" id="subcategory" name="subcategory">
												<option value="">Seleziona sottocategoria</option>
												
											</select>
										</div>	

										
									</div> 
								</div> -->	

							</form>
						</div>
					</div>

					<div id="list">
						<?php $__currentLoopData = $getAffiliatesDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php						
							$fnames = $val->filename;
							$arr = explode("$", $fnames);

							$ratings = $val->ratings;
							$ratingsarr = explode("$", $ratings);
							$average = array_sum($ratingsarr)/count($ratingsarr);
							$totalaverage = (int)$average;
						if($val->is_deleted=='0' && $val->status=='1')
						{				
						?>
						<div class="product-grid love-grid colmd4"><div class="product-img-col">
							<a href="<?php echo e(url('affiliatese/single/'.$val->id)); ?>">
								<!-- <div class="more-product"><span> </span></div>						 -->
								<div class="product-img b-link-stripe b-animate-go  thickbox">
									<h4>sconto<br> <span><?php echo e($val->discount_amount); ?>%</span></h4>
									<?php if(!empty($val->logo)): ?> 
									<img src="<?php echo e(url('dealer_logos/'.$val->logo)); ?>" class="img-responsive" alt=""/>
									<?php else: ?>	
									<img src="<?php echo e(url('website/images/no-image.png')); ?>" class="img-responsive" alt=""/>
									<?php endif; ?>	
								</div>
								<div class="product-other-info">
									<div class="category-label-wrap"><span>Ristorante</span></div> 						
						<!-- <?php if(!empty($val->logo)): ?> 
							<img class="aff_logo" src="<?php echo e(url('dealer_logos/'.$val->logo)); ?>" class="img-responsive" alt=""/>
							<?php endif; ?>	 -->

						</div>
					</a>
				</div>						
				<div class="product-info simpleCart_shelfItem">
					<div class="product-info-cust prt_name">
						<div class="prod-dis">
							<h4><?php echo e($val->business_name); ?></h4>
						</div>
						<p class="prod-desc"><?php echo e(strip_tags(str_limit($val->description, $limit = 100, $end = '...'))); ?><p>
							<div class="reviewmain">
								<div class="reviews">
									<span class="fa fa-star <?php if($totalaverage >= 1): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
									<span class="fa fa-star <?php if($totalaverage >= 2): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
									<span class="fa fa-star <?php if($totalaverage >= 3): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
									<span class="fa fa-star <?php if($totalaverage >= 4): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
									<span class="fa fa-star <?php if($totalaverage >= 5): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
								</div>
								<div class="reviewtext">
									<span class="heading">Voto dell'utente</span>
								</div>
							</div>	
							<div class="addressmain">
								<div class="addressicon">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
								</div>
								<div class="addresstext">
									<span><?php echo e($val->region); ?></span>
								</div>
							</div>


							<div class="clearfix"> </div>
						</div>
					</div>
				</div>		
			<?php } ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</div>

		</div>
		<button type="button" name="viewmore" id="viewmore" class="btn btn-default">Visualizza altro</button>

	</div>
</div>

<script>
	$(function(){
		
		$("#filter-form").on("submit", function(event) {
			if($('select[name=category]').val() != '' || $('select[name=subcategory]').val() != '' || $('input[name=location]').val() != ''){
				event.preventDefault();

				var formData = {
					'_token': "<?php echo e(csrf_token()); ?>",
					'category': $('select[name=category]').val(),
					'subcategory': $('select[name=subcategory]').val(),
					'location': $('input[name=location]').val()
				};
				console.log(formData);

				$.ajax({
					url: "affiliates/search",
					type: "get",
					data: formData,
					success: function(d) {
					//$('#viewmore').show();
					$('#list').html(d);
				}
			});
			}else{
				return true;
			}
		});
		
		
		
	}); 
	
</script>
<script>
	$("#viewmore").on("click", function(event) {
		$.ajax({
			url: "affiliates/affiliates-search-next",
			type: "get",
			data: '',
			success: function(d) {
				$('#list').append(d);
			}
		});
	});


	function getsubcategory(catv){
		$.ajax({
			url: "get-affiliatese-sucat",
			type: "post",
			data: {'_token': "<?php echo e(csrf_token()); ?>",'catv': catv},
			success: function(d) {
				$('#subcat').html(d);
			}
		});
	}
	
	function activatePlacesSearch(){
	var input = document.getElementById('location');
	var autocomplete = new google.maps.places.Autocomplete(input);
}
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAThYtCdyyeiqogil0eUFqq2W8tNhyWTUU&libraries=places&callback=activatePlacesSearch"></script>
<style>
.reviewmain{border-bottom: 1px solid #e5e5e5;
	line-height: 40px;}
	.addressmain{line-height: 40px;}
	.reviews{width:30%;float:left}
	.reviewtext{width: 100%;
		display: block;
		text-align: left;}
		.addressicon{width:20px;float:left}
		.addresstext{width: 100%;
			display: block;
			text-align: left;}
			.aff_logo{border-radius: 50%;
				position: absolute;
				top: -5px;
				right: 46px;}
				.checked {
					color: orange;
				}
				.fa {
					font-size: 14px;
				}
				.product-info.simpleCart_shelfItem {
					min-height: 190px;
					padding-top: 20px;	
				}
				#viewmore{display:none;}
			</style>
			<?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>