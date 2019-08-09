<?php $__env->startSection('content'); ?>
	<div id="page-wrapper">
			<div class="main-page">
			 <?php if(Session::has('success')): ?>
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('success')); ?></strong>
                        </div>
                <?php endif; ?>
				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
<!-- 						<div class="form-title">
							<h4>Aggiungi post</h4>
						</div> -->
						<div class="form-body">
						<div class="panel panel-primary">
						  <div class="panel-heading">
							<h3 class="panel-title">Informazioni sul rivenditore</h3>
						  </div>
						  <div class="panel-body">
						  <form method="post" enctype="multipart/form-data">
							<div class="form-horizontal">
							<div class="form-group">
								<div class="col-md-6">
									<div class=" <?php echo e($errors->has('Titolo') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Nome del titolare</label> 
								 <input type="text" class="form-control" name="Titolo" value="<?php echo e(!empty($getPostDetail)?$getPostDetail->title:old('Titolo')); ?>" id="exampleInputEmail1" placeholder="Nome del titolare">

								    <?php if($errors->has('Titolo')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Titolo')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
								</div>
								<div class="col-md-6">
									<div class=" <?php echo e($errors->has('business_name') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Ragione Sociale</label> 
								 <input type="text" class="form-control" name="business_name" value="<?php echo e(!empty($userProfile)?$userProfile->business_name:old('business_name')); ?>" id="exampleInputEmail1" placeholder="Ragione Sociale">

								    <?php if($errors->has('business_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('business_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<div class=" <?php echo e($errors->has('editor1') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">	Descrizione</label> 
								 <textarea class="form-control" name="editor1" placeholder="Descrizione"><?php echo e(!empty($getPostDetail)?$getPostDetail->description:old('description')); ?></textarea>

								   <?php if($errors->has('editor1')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('editor1')); ?></strong>
                                    </span>
                                <?php endif; ?>

								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="panel-heading">
									<h3 class="panel-title">Informazioni Commerciali:</h3>
								  </div>
								</div>
							</div>
							<div class="form-group">
							<div class="col-md-6">
								<div class=" <?php echo e($errors->has('iva') ? ' has-error' : ''); ?>">
							     
							    
								 <label for="exampleInputEmail1">IVA</label> 
								 <input type="text" class="form-control" name="iva" value="<?php echo e(!empty($getPostDetail)?$getPostDetail->iva:old('iva')); ?>" id="exampleInputEmail1" placeholder="IVA">
                                  
								    <?php if($errors->has('iva')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('iva')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                
							</div>
							</div>
							<div class="col-md-6">
								<div class=" <?php echo e($errors->has('discount_amount') ? ' has-error' : ''); ?>">
							     
							    
								 <label for="exampleInputEmail1">Ammontare di sconto</label> 
								 <input type="number" min="10" class="form-control" name="discount_amount" value="<?php echo e(!empty($getPostDetail)?$getPostDetail->discount_amount:old('discount_amount')); ?>" id="exampleInputEmail1" placeholder="Ammontare di sconto">
                                  
								    <?php if($errors->has('discount_amount')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('discount_amount')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                
							</div>
							</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
								<div class="<?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
								<label for="category" class="">Categoria</label>
								<select class="form-control" id="category" name="category" onchange="getsubcategory(this.value);">
									<option value="">Seleziona categoria</option>
									<?php if(!empty($getCategories)): ?>
										<?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($catval->parent_id == 0): ?>
												<option <?php if(!empty($userProfile)){ if($userProfile->category == $catval->id){ echo 'selected'; }} ?> value="<?php echo e($catval->id); ?>"><?php echo e($catval->title); ?></option>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
                                   
								</select>

                                <?php if($errors->has('category')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            
								</div>
								</div>
								<div class="col-md-6">
								<div class="<?php echo e($errors->has('subcategory') ? ' has-error' : ''); ?>">
									<label for="subcategory" class="">Sottocategoria</label>
									<div id="subcat">
										<select class="form-control" id="subcategory" name="subcategory">
											<option value="">Seleziona sottocategoria</option>
											<?php if(!empty($getCategories)): ?>
												<?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if($catval->parent_id == $userProfile->category): ?>
														<option <?php if(!empty($userProfile)){ if($userProfile->sub_category == $catval->id){ echo 'selected'; }} ?> value="<?php echo e($catval->id); ?>"><?php echo e($catval->title); ?></option>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											
										</select>
									</div>	

										<?php if($errors->has('subcategory')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('subcategory')); ?></strong>
											</span>
										<?php endif; ?>
									
								</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<div class="custom-file-type <?php echo e($errors->has('logoImage') ? ' has-error' : ''); ?>">

                                            <label for="pariva" class="">Carica logo</label>   

                                            <input id="profileImage" type="file" class="form-control custom-file-input" name="logoImage" >
											
                                             <input type="hidden" name="old_logo" value="<?php echo e(!empty($userProfile->logo)?$userProfile->logo:''); ?>">
											<div class="jumbotron">
											<div class="image-wrap">
											<?php if(!empty($userProfile->logo)): ?>
                                            <img src="<?php echo e(url('dealer_logos/'.$userProfile->logo)); ?>" style="height: 82px;width: 89px;">
                                            <?php endif; ?>
											</div>
                                            <?php if($errors->has('logoImage')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('logoImage')); ?></strong>
                                                </span>
                                            <?php endif; ?>
											</div>
                                            
                                        </div>
								</div>
								<div class="col-md-6">
									<div class=" custom-file-type <?php echo e($errors->has('video') ? ' has-error' : ''); ?>">

                                            <label for="pariva" class="">Carica video</label>   
											<div class="browse_file">
                                            <input id="profileVideo" type="file" class="form-control custom-file-input" name="video" >

                                             <input type="hidden" name="old_video" value="<?php echo e(!empty($userProfile->video)?$userProfile->video:''); ?>">
											 </div>
											<div class="jumbotron">
											<div class="image-wrap">
											<?php if(!empty($userProfile->video)): ?>
                                         <!--    <iframe src="<?php echo e(url('dealer_videos/'.$userProfile->video)); ?>" style="height: 82px;width: 89px;"></iframe> -->
                                             <video width="89" height="82" controls >
                                              <source src="<?php echo e(url('dealer_videos/'.$userProfile->video)); ?>" type="video/mp4">                                             
                                            </video>
                                            <?php endif; ?>
											</div>
                                            <?php if($errors->has('video')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('video')); ?></strong>
                                                </span>
                                            <?php endif; ?>
											</div>
                                            
                                        </div>
                                        
									<?php
									$fnames = $userProfile->filename;
									$arr = explode("$", $fnames);
									
									$file_ids = $userProfile->file_id;
									$idarr = explode("$", $file_ids);
									
									
									//echo '<pre>'; print_r($arr); die;
                                    //$someArray = json_decode($userProfile->filename, true); ?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="custom-file-type <?php echo e($errors->has('filename') ? ' has-error' : ''); ?>">    
                                    <div class="input-group control-group increment" >
                                        <input type="file" name="filename[]" class="form-control custom-file-input">
										<input type="hidden" name="old_filename" value="<?php echo e(!empty($arr[0])?$arr[0]:''); ?>">
                                        <div class="input-group-btn"> 
                                         <button class="btn btn-primary" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    <div class="clone hide custom-file-type">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" name="filename[]" class="form-control custom-file-input">
                                            <div class="input-group-btn"> 
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jumbotron">
									<?php if(count($arr) > 0): ?>
								     <div class="">
                                        <ul style="margin:0;padding:0;">		 
									 <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $arrval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php if(!empty($arrval)): ?>								 
                                      
                                          
                                              <li class="afimages">
											  <a class="afimgdelete" href="<?php echo e(url('deleteimage/'.$idarr[$k])); ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
											  <img src="<?php echo e(url('dealer_images/'.$arrval)); ?>" style="height: 82px;width: 89px;"></li>
                                        
                                      
									  <?php endif; ?>
									  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									    </ul>
                                      </div>
                                      <?php endif; ?>
									</div>
                                         <?php if($errors->has('filename')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('filename')); ?></strong>
                                                </span>
                                         <?php endif; ?>
                                     </div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<?php echo e(csrf_field()); ?>

							
                              <input type="hidden" class="form-control" name="id" value="<?php echo e(!empty($getPostDetail)?$getPostDetail->id:old('id')); ?>" id="exampleInputEmail1" >
							  <button type="submit" name="addbutton" class="btn btn-primary btn-custom">Salva</button>
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
 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
 </script>	
<style>
    fieldset {
    padding: .35em .625em .75em;
    margin: 0 2px;
    border: 1px solid #d1d1d1;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })

});

</script>
<script type="text/javascript">

    $(document).ready(function() { 

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
<script>

function getsubcategory(catv){
	$.ajax({
                url: "get-affiliatese-sucat1",
                type: "post",
                data: {'_token': "<?php echo e(csrf_token()); ?>",'catv': catv},
                success: function(d) {
					$('#subcat').html(d);
                }
            });
}
</script>
<style>
.afimages{
    width: 90px;
    display: inline-block;
}
.afimgdelete{
	position: absolute;
	width: 5px;
	color: red;
}

</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Affiliatese.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>