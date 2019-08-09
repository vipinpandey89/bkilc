<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> modificare conversione</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="<?php echo e(url('administrator/convertion')); ?>">Conversioni</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">modificare conversione</a></li>
                               
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

							<!--<div class="form-group <?php echo e($errors->has('pv_type') ? ' has-error' : ''); ?>">
								 <label for="pv_type">conversione</label>
								 <select class="form-control" name="pv_type">
								 	<option value="">Select Type</option>
								 	<option value="1" <?php echo e(($getConvertionById->convertion_title=='1')?'selected':''); ?>>Digital Card conversione</option>
								 	<option value="2" <?php echo e(($getConvertionById->convertion_title=='2')?'selected':''); ?>>Affiliate Shop conversione</option>
								 	<option value="3" <?php echo e(($getConvertionById->convertion_title=='3')?'selected':''); ?>>BK2 conversione</option>
								 	<option value="4" <?php echo e(($getConvertionById->convertion_title=='4')?'selected':''); ?>>BK4 conversione</option>
								 	<option value="5" <?php echo e(($getConvertionById->convertion_title=='5')?'selected':''); ?>>BK6 conversione</option>
								 	<option value="6" <?php echo e(($getConvertionById->convertion_title=='6')?'selected':''); ?>>BK8 conversione</option>
								 	<option value="7" <?php echo e(($getConvertionById->convertion_title=='7')?'selected':''); ?>>BK10 conversione</option>
								 	<option value="8" <?php echo e(($getConvertionById->convertion_title=='8')?'selected':''); ?>>BK12 conversione</option>

								 </select> 								
								 <?php if($errors->has('pv_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('pv_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>-->


							<div class="form-group <?php echo e($errors->has('euros') ? ' has-error' : ''); ?>">
								 <label for="euros">Euros</label> 
								 <input type="text" class="form-control" id="euros" disabled="" value="<?php echo e(!empty($getConvertionById)?$getConvertionById->convertion_euro:''); ?>" name="euros" placeholder="Euros">

								  <?php if($errors->has('euros')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('euros')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>

							<!--<div class="form-group">
								 <label for="refralcode">Codice Di Riferimento</label> 
								 <input type="text" class="form-control" id="refralcode" name="refralcode" placeholder="Codice Di Riferimento">
							</div>-->

							<div class="form-group <?php echo e($errors->has('point') ? ' has-error' : ''); ?>">
								 <label for="point">PV</label> 
								 <input type="text" class="form-control" id="point" name="point" value="<?php echo e(!empty($getConvertionById)?$getConvertionById->convertion_pv:''); ?>" placeholder="PV">

								 <?php if($errors->has('point')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('point')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>

							  <button type="submit" class="btn btn-default" name="addbutton">Sottoscrivi</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>