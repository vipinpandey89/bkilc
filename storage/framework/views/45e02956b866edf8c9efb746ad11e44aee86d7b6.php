<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Aggiungi notizia</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News & Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="<?php echo e(url('administrator/userlist')); ?>">Lista</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Aggiungi notizia</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data"> 

							

							<div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Title</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="<?php echo e(!empty($userProfile)?$userProfile->userName:old('title')); ?>" placeholder="Nome della ditta" maxlength="30">

								    <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							

							
              <div class="form-group ">
                <label for="editor1">Descrizione</label> 
                <textarea class="form-control" name="editor1" placeholder="Descrizione"><?php echo e(old('editor1')); ?></textarea>
                <?php if($errors->has('editor1')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('editor1')); ?></strong>
                                    </span>
                                <?php endif; ?>

              </div>  


              <div class="form-group <?php echo e($errors->has('file') ? ' has-error' : ''); ?>">
                 <label for="exampleInputEmail1">File</label> 
                 <input type="file" class="form-control" id="exampleInputEmail1" name="file" value="<?php echo e(!empty($userProfile)?$userProfile->userName:old('file')); ?>" placeholder="Nome della ditta" maxlength="30">

                    <?php if($errors->has('file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('file')); ?></strong>
                                    </span>
                                <?php endif; ?>

              </div>
							 

							

								  <?php echo e(csrf_field()); ?>


							  <button type="submit" name="add" class="btn btn-default">Salva</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>


 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


<script>
  CKEDITOR.replace( 'editor1' );
 </script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>