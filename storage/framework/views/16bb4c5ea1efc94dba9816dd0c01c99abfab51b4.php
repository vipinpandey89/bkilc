<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2>Modifica del livello</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                             <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="<?php echo e(url('administrator/minimum-value-point')); ?>">Gestione Pv</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica del livello</a></li>
                               
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

							<div class="form-group <?php echo e($errors->has('level_name') ? ' has-error' : ''); ?>">
								 <label for="level_name">Livello</label> 
								 <input type="text" class="form-control" id="level_name" name="level_name" value="<?php echo e(!empty($levelDetail)?$levelDetail->step:old('level_name')); ?>" placeholder="Livello" readonly="">
								   <?php if($errors->has('level_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('level_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('percentage') ? ' has-error' : ''); ?>">
								 <label for="percentage">Generazione minima PV</label> 
										<input type="text" class="form-control" id="percentage" name="percentage" value="<?php echo e(!empty($levelDetail)?$levelDetail->point:old('percentage')); ?>" placeholder="Generazione minima PV">

								    <?php if($errors->has('percentage')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('percentage')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>


							<div class="form-group <?php echo e($errors->has('upgrade_point') ? ' has-error' : ''); ?>">
								 <label for="upgrade_point">Costo Upgrade(Euro)</label> 
										<input type="text" class="form-control" id="upgrade_point" name="upgrade_point" value="<?php echo e(!empty($levelDetail)?$levelDetail->level_upgrade_point:old('upgrade_point')); ?>" placeholder="Costo Upgrade(Euro)">

								    <?php if($errors->has('upgrade_point')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('upgrade_point')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

								<div class="form-group <?php echo e($errors->has('level_downling') ? ' has-error' : ''); ?>">
								 <label for="level_downling">Bkx In 1° linea per upgrade</label> 
										<input type="text" class="form-control" id="level_downling" name="level_downling" value="<?php echo e(!empty($levelDetail)?$levelDetail->level_downline:old('level_downling')); ?>" placeholder="Bkx In 1° linea per upgrade">

								    <?php if($errors->has('level_downling')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('level_downling')); ?></strong>
                                    </span>
                                <?php endif; ?>

							 </div>


                            <div class="form-group <?php echo e($errors->has('renuwal_point') ? ' has-error' : ''); ?>">
                                 <label for="renuwal_point">   Costo rinnovo  (dopo 12 Mesi)​</label> 
                                        <input type="text" class="form-control" id="renuwal_point" name="renuwal_point" value="<?php echo e(!empty($levelDetail)?$levelDetail->renuwal_account:old('renuwal_point')); ?>" placeholder="Costo rinnovo (After 12 Mesi)​">

                                    <?php if($errors->has('renuwal_point')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('renuwal_point')); ?></strong>
                                    </span>
                                <?php endif; ?>

                             </div>


                              <div class="form-group <?php echo e($errors->has('become_founder') ? ' has-error' : ''); ?>">
                                 <label for="become_founder">Founder Costo(Euro)</label> 
                                        <input type="text" class="form-control" id="become_founder" name="become_founder" value="<?php echo e(!empty($levelDetail)?$levelDetail->become_founder_euro:old('become_founder')); ?>" placeholder="Become a founder(Euro)">

                                    <?php if($errors->has('become_founder')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('become_founder')); ?></strong>
                                    </span>
                                <?php endif; ?>

                             </div>



								  <?php echo e(csrf_field()); ?>


							  <button type="submit" name="editbutton" class="btn btn-default">Salva</button> 
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