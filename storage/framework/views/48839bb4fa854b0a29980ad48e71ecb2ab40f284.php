<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Imposta promemoria</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="<?php echo e(url('administrator/set-notification')); ?>">Notifiche</a></li>

                                 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Imposta promemoria</a></li>
                              
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
           <hr/>

           
				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form action="#" method="post" enctype="multipart/form-data" > 
                             <?php echo e(csrf_field()); ?>


                             	<?php $a= json_decode($getEditNotification->reminder_date);?>

							<div class="form-group <?php echo e($errors->has('type_notification') ? ' has-error' : ''); ?>">
								 <label for="type_notification">Tipo di notifica</label> 
								 <select class="form-control" id="type_notification" name="type_notification">
								 		<option value="">Selezionare</option>
								 		<option value="1"<?php echo e(($getEditNotification->reminder_type=='1')?'selected':''); ?>>Aggiornamento</option> 
								 		<option value="2" <?php echo e(($getEditNotification->reminder_type=='2')?'selected':''); ?>>scadenza card</option>							 		

								 </select>
								
								 <?php if($errors->has('type_notification')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('type_notification')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('date_of_month') ? ' has-error' : ''); ?>">
								 <label for="date_of_month">Data</label> 

								<!-- <div id="timeappend"></div>	
								 <input type="date" class="form-control" id="date" name="date" placeholder="Nome Utente">

								 <input type="hidden" name="notification_date[]" id="n_date" value="">-->
								  <select class="form-control" id="date_of_month" name="date_of_month[]"  multiple="multiple">
								 	
								 		<option value="30"<?php echo (in_array('30',$a))?'selected':'';?>>30</option>
								 		<option value="20"<?php echo (in_array('20',$a))?'selected':'';?>>20</option>
								 		<option value="10"<?php echo (in_array('10',$a))?'selected':'';?>>10</option>
								 		<option value="5"<?php echo (in_array('5',$a))?'selected':'';?>>5</option>
								 		<option value="4"<?php echo (in_array('4',$a))?'selected':'';?>>4</option>
								 		<option value="3"<?php echo (in_array('3',$a))?'selected':'';?>>3</option>
								 		<option value="2"<?php echo (in_array('2',$a))?'selected':'';?>>2</option>
								 		<option value="1"<?php echo (in_array('1',$a))?'selected':'';?>>1</option>
								 								 		

								 </select>


								  <?php if($errors->has('date_of_month')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('date_of_month')); ?></strong>
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