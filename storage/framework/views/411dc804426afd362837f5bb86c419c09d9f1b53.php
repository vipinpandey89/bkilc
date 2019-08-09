<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

				 <div class="row">
                    <div class="col-md-8 heading">
                     <h2>Modifica percentuale</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Portafoglio</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="<?php echo e(url('administrator/bonus-management')); ?>">Gestione Bonus</a></li>

                                 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica percentuale</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>



				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate> 

							<div class="form-group <?php echo e($errors->has('percentage') ? ' has-error' : ''); ?>">
								 <label for="percentage">Percentuale di profitto</label> 
								 <input type="text" class="form-control" id="percentage" name="percentage" value="<?php echo e(!empty($bonus)?$bonus->promoter_percentage:old('percentage')); ?>" placeholder="Percentuale di profitto" maxlength="30">
								   <?php if($errors->has('percentage')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('percentage')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
								 <label for="amount">Quantità</label> 
								 <input type="text" class="form-control" id="amount" name="amount" value="<?php echo e(!empty($bonus)?$bonus->bklic_profit:old('amount')); ?>" placeholder="Quantità" maxlength="30">

								    <?php if($errors->has('amount')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('amount')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

								 <?php echo e(csrf_field()); ?>


							  <button type="submit" name="editbutton" class="btn btn-default">Salva</button> </form> 
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