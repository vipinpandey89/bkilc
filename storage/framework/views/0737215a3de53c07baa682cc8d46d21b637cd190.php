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
                                <li><a class="current" href="<?php echo e(url('administrator/pv-generation-convertion')); ?>">Pv generation Conversioni</a></li>

                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" enctype="multipart/form-data" > 
                             <?php echo e(csrf_field()); ?>

		
							<div class="form-group <?php echo e($errors->has('point') ? ' has-error' : ''); ?>">
								 <label for="point">PV</label> 
								 <input type="text" class="form-control" id="point" name="point" value="<?php echo e(!empty($getConvertion)?$getConvertion->point:''); ?>" placeholder="PV">

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