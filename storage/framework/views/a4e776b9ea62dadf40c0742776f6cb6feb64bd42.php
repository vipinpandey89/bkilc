<?php $__env->startSection('title','UserList'); ?>

<?php $__env->startSection('content'); ?>

		<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">					

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

						<div class="form-title">

							<h4>Gestione del piano di abbonamento</h4>

						</div>

						<div class="form-body">

							<form method="post" id="demo-form" data-parsley-validate> 



							<div class="form-group <?php echo e($errors->has('subscription_name') ? ' has-error' : ''); ?>">

								 <label for="subscription_name">Nome dell'abbonamento</label> 

								 <input type="text" class="form-control" id="subscription_name" name="subscription_name" value="<?php echo e(!empty($planGetById)?$planGetById->subscription_name:old('subscription_name')); ?>" placeholder="Nome dell'abbonamento">

								   <?php if($errors->has('subscription_name')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('subscription_name')); ?></strong>

                                    </span>

                                <?php endif; ?>

							</div>





							<div class="form-group <?php echo e($errors->has('plan_type') ? ' has-error' : ''); ?>">

								 <label for="plan_type">Tipo di piano</label>

								 <select class="form-control" name="plan_type">

								 	<option value="">Seleziona il tipo di piano</option>
									
									<option value="1" <?php if($planGetById->plan_type==1){ echo 'selected'; }?>>Promotor</option>
									<option value="2" <?php if($planGetById->plan_type==2){ echo 'selected'; }?>>Affiliati</option>
									
									
									
									

								 </select> 

										



								  <?php if($errors->has('plan_type')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('plan_type')); ?></strong>

                                    </span>

                                <?php endif; ?>



							</div>
							
							<div class="form-group <?php echo e($errors->has('subscription_price') ? ' has-error' : ''); ?>">

								 <label for="subscription_price">Prezzo di abbonamento</label>
										
                                 <input type="text" class="form-control" id="subscription_price" name="subscription_price" value="<?php echo e(!empty($planGetById)?$planGetById->subscription_price:old('subscription_price')); ?>" placeholder="Prezzo di abbonamento">


								  <?php if($errors->has('subscription_price')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('subscription_price')); ?></strong>

                                    </span>

                                <?php endif; ?>



							</div>



								  <?php echo e(csrf_field()); ?>




							  <button type="submit" name="addbutton" class="btn btn-default">Sottoscrivi</button> 

							</form> 

						</div>

					</div>										

				</div>

			</div>

		</div>



<!--<script type="text/javascript">

$(function () {

  $('#demo-form').parsley().on('field:validated', function() {

    var ok = $('.parsley-error').length === 0;

    $('.bs-callout-info').toggleClass('hidden', !ok);

    $('.bs-callout-warning').toggleClass('hidden', ok);

  })



});



</script>	-->	

		<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>