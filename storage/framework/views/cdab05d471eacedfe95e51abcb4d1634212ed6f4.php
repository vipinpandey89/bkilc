<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista Piani di abbonamento</h2>-->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Affiliati</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Piano</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="tables">
			  <?php if(Session::has('success')): ?>
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('success')); ?></strong>
                        </div>
                <?php endif; ?>
                 <?php if(Session::has('error')): ?>
                       <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('error')); ?></strong>
                        </div>
                <?php endif; ?>
					<!--<a href="<?php echo e(url('administrator/addsubscriptionplan')); ?>" class="btn btn-primary">Aggiungi piano di abbonamento</a>-->
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Lista Piani di abbonamento</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
						<table class="table user-data-table table-striped table-hover table-green">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome dell'abbonamento</th>
								  <th>Durata (Mesi)</th>
						  		  <th>Prezzo di abbonamento</th>								 
								  <th>Azione</th>
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i='1';?>
						 		<?php $__currentLoopData = $SubscriptionPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 		<?php ?>
						   		 <tr>
							       <th scope="row"><?php echo e($i); ?></th>
							       <td><?php echo e($item->subscription_name); ?></td>
								   <td>12</td>
							       <td><?php echo e($item->subscription_price); ?></td> 							       
								  
								   <td>
								   <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/editsubscriptionplan/'.$item->plan_id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							      <!--<a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/deletesubscriptionplan/'.$item->plan_id)); ?>" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->

							       </td>
						   		</tr> 
						   		<?php $i++;?>
						   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						   		
                               
						 </tbody>
					 </table> 
				
					</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		
		

		<!--footer-->
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>