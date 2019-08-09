<?php $__env->startSection('title','UserList'); ?>



<?php $__env->startSection('content'); ?>



		<div id="page-wrapper">



			<div class="row">

                    <div class="col-md-8 heading">

                     <h2> Elenco di video</h2>                     

                       

                    </div> 

                    <div class="col-md-4 text-right">

                        <div class="breadcumb">

                            <ul>

                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>

                                <li><a href="#">News ed Eventi</a></li>



                               



                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>

                                <li><a class="current" href="#">Elenco di video</a></li>

                               

                               

                            </ul>

                        </div>

                    </div>

                </div>

                 <!-- /. ROW  -->

                 <hr/>



			<div class="main-page">



				<div class="forms">					



					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 





						<div class="form-body">



							<form method="post" id="demo-form" enctype="multipart/form-data" data-parsley-validate > 



							<div class="form-group <?php echo e($errors->has('type') ? ' has-error' : ''); ?>">



								 <label for="exampleInputEmail1">Tipo di video</label> 



								 <select class="form-control" id="exampleInputEmail1" name="type">

								 		<option value=' '>Seleziona tipo</option>

								 		<option value='1'>Affiliati gratis</option>

								 		<option value='2'>Lavora con noi</option>

								 		<option value='3'>Risparmia con la card</option>

								 </select>



								   <?php if($errors->has('type')): ?>



                                    <span class="help-block">



                                        <strong><?php echo e($errors->first('type')); ?></strong>



                                    </span>



                                <?php endif; ?>



						</div>





							<div class="form-group <?php echo e($errors->has('video') ? ' has-error' : ''); ?>">



								 <label for="exampleInputEmail1">Video</label>



								  <input id="video" type="file" class="form-control custom-file-input" name="video" >





								  <?php if($errors->has('video')): ?>



                                    <span class="help-block">



                                        <strong><?php echo e($errors->first('video')); ?></strong>



                                    </span>



                                <?php endif; ?>







							</div>







								  <?php echo e(csrf_field()); ?>








							  <button type="submit" name="addbutton" class="btn btn-default">Salva</button> 



							</form> 



						</div>



					</div>											



				</div>



			</div>



		</div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>