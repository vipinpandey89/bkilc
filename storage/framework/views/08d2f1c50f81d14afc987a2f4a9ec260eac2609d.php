<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
			  <?php if(Session::has('success')): ?>
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('success')); ?></strong>
                        </div>
                <?php endif; ?>
					<a href="<?php echo e(url('administrator/elearningdocuments')); ?>" class="btn btn-primary"><-- Back</a>				
					<div class="table-responsive bs-example widget-shadow" style="text-align: center;">
						<h4>Visualizza documento</h4>

					<!--<a href="<?php echo e(url('administrator/adduser')); ?>" class="btn btn-primary" style="margin-left: 1427px;margin-bottom: 10px;">Add User</a>		-->			
                        <h3><?php echo e($docDetail['file_name']); ?></h3>
                        <?php if($docDetail['file_type'] == 'image'){ ?>
						<img style="width: 900px;" src="<?php echo url('/elearningdocs/'.$docDetail['file']);?>" title="<?php echo $docDetail['file_type']; ?>" />
						<?php }else{ ?>
						 <iframe style="width: 900px;height: 900px;" src="<?php echo url('/elearningdocs/'.$docDetail['file']);?>" />
						<?php } ?>
						<p style="height: 28px;"></p>
						 <p><?php echo e(strip_tags($docDetail['description'])); ?></p>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>