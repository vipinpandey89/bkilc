<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Modifica la carta</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Utenti card</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                 <li><a href="<?php echo e(url('administrator/list-card')); ?>">carica la carta digitale</a></li>

                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica la carta</a></li>
                               
                            </ul>
                        </div>
                    </div>
         </div>
                 <!-- /. ROW  -->
            <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form  method="post" enctype="multipart/form-data" > 
                             <?php echo e(csrf_field()); ?>

							<div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
								 <label for="title">Titolo della carta</label> 
								 <input type="text" class="form-control" id="title" name="title" placeholder="Titolo della carta" value="<?php echo e(!empty($getCardDetail)?$getCardDetail->title:old('title')); ?>">
								 <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
								 <label for="image">Immagine</label> 
								 <input type="file" class="form-control" id="image" name="image" placeholder="Immagine" value="<?php echo e(!empty($getCardDetail->image)?$getCardDetail->image:''); ?>">

								  <input type="hidden" name="old_file" value="<?php echo e(!empty($getCardDetail->image)?$getCardDetail->image:''); ?>"> 
	                                <?php if(!empty($getCardDetail->image)): ?>
	                                <img src="<?php echo e(url('images/digital-card/'.$getCardDetail->image)); ?>" style="height: 82px;width: 89px;">
	                                <?php endif; ?>

								  <?php if($errors->has('image')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
								 <label for="amount">Importo della carta</label> 
								 <input type="text" class="form-control" id="amount" name="amount" placeholder="Importo della carta" value="<?php echo e(!empty($getCardDetail)?$getCardDetail->amount:old('amount')); ?>">
								 <?php if($errors->has('amount')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('amount')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<!-- <div class="form-group <?php echo e($errors->has('card_length') ? ' has-error' : ''); ?>">
								 <label for="card_length">lunghezza della carta (Mese)</label> 
								 <input type="text" class="form-control" id="card_length" name="card_length" placeholder="lunghezza della carta (Mese)" value="<?php echo e(!empty($getCardDetail)?$getCardDetail->card_length:old('card_length')); ?>">
								 <?php if($errors->has('card_length')): ?>
                                    <span class="help-block"> 
                                        <strong><?php echo e($errors->first('card_length')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>	

							 -->


							 <div class="form-group <?php echo e($errors->has('card_length') ? ' has-error' : ''); ?> monthclass">
								 <label for="card_length">lunghezza della carta (Mese)</label> <input type="checkbox" name="month"  id="monthid" <?php echo e(!empty($getCardDetail->card_length)?'checked':''); ?> >
								 <input type="number" class="form-control" id="card_length" name="card_length" style="display:none;" placeholder="lunghezza della carta (Mese)" value="<?php echo e(!empty($getCardDetail)?$getCardDetail->card_length:old('card_length')); ?>"  min="1" max="12">
								 <?php if($errors->has('card_length')): ?>
                                    <span class="help-block"> 
                                        <strong><?php echo e($errors->first('card_length')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>

							<div class="form-group <?php echo e($errors->has('card_length_days') ? ' has-error' : ''); ?> daysclass">
								 <label for="card_length_days">lunghezza della carta (giorni)</label> <input type="checkbox" name="days" id="daysid" <?php echo e(!empty($getCardDetail->card_length_days)?'checked':''); ?> > 
								 <input type="number" class="form-control" id="card_length_days" name="card_length_days" style="display:none;" placeholder="lunghezza della carta (giorni)" value="<?php echo e(!empty($getCardDetail)?$getCardDetail->card_length_days:old('card_length_days')); ?>"  min="1" max="29">
								 <?php if($errors->has('card_length_days')): ?>
                                    <span class="help-block"> 
                                        <strong><?php echo e($errors->first('card_length_days')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>



							<div class="form-group <?php echo e($errors->has('editor1') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Descrizione</label> 
								 <textarea class="form-control" name="editor1" placeholder="Descrizione"><?php echo e(!empty($getCardDetail)?$getCardDetail->description:old('editor1')); ?></textarea>

								   <?php if($errors->has('editor1')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('editor1')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>
							

							  <button type="submit" class="btn btn-default" name="addbutton">Sottoscrivi</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>
<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1' );
 </script>		


<script>

$(document).click('#monthid',function(){

	if($('input[name="month"]').is(':checked')){
		$('#card_length').show();
		$('.daysclass').hide();
	  
	}else{
	 	$('#card_length').hide();
	 	$('#card_length').val('');
	 	$('.daysclass').show();
	}

});  
$(document).click('#daysid',function(){
  if($('input[name="days"]').is(':checked')){
		$('#card_length_days').show();
		$('.monthclass').hide();	  
	}else{
	 	$('#card_length_days').hide();
	 	$('#card_length_days').val('');
	 	$('.monthclass').show();
	}
});

$(document).ready(function(){
	if($('input[name="month"]').is(':checked')){
		$('#card_length').show();
		$('.daysclass').hide();
	  
	}else{
	 	$('#card_length').hide();
	 	$('#card_length').val('');
	 	$('.daysclass').show();
	}
}); 

$(document).ready(function(){
	if($('input[name="days"]').is(':checked')){
		$('#card_length_days').show();
		$('.monthclass').hide();	  
	}else{
	 	$('#card_length_days').hide();
	 	$('#card_length_days').val('');
	 	$('.monthclass').show();
	}
});
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>