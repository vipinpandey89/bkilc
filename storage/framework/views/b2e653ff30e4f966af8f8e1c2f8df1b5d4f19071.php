<?php $__env->startSection('title','UserList'); ?>

<?php $__env->startSection('content'); ?>

		<div id="page-wrapper">

			<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Gestione delle categorie</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Affiliati</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="<?php echo e(url('administrator/category-management')); ?>">Categoria</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Gestione delle categorie</a></li>
                               
                               
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

							<form method="post" id="demo-form" data-parsley-validate> 



							<div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">

								 <label for="exampleInputEmail1">Titolo</label> 

								 <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php echo e(old('title')); ?>" placeholder="nome categoria">

								   <?php if($errors->has('title')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('title')); ?></strong>

                                    </span>

                                <?php endif; ?>

							</div>





							<div class="form-group <?php echo e($errors->has('category') ? ' has-error' : ''); ?>">

								 <label for="exampleInputEmail1">Seleziona categoria</label>

								 <select class="form-control" name="category">

								 	<option value="">Seleziona titolo</option>

								 	<option value="0">Categoria madre</option>

								 	<?php if(!empty($category)): ?>

								 	<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

								 			<option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>	

								 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								 	<?php endif; ?>

								 	

								 </select> 

										



								  <?php if($errors->has('category')): ?>

                                    <span class="help-block">

                                        <strong><?php echo e($errors->first('category')); ?></strong>

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