<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Aggiungi documento</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="<?php echo e(url('administrator/elearningdocuments')); ?>">Formazione</a></li>


                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Aggiungi documento</a></li>
                               
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="forms">	
				<?php  $type = session('type', 'default'); ?>
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
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
					
						
						<div class="form-body">
						 <form action="<?php echo e(url('administrator/addElearningdocs')); ?>" method="post" enctype="multipart/form-data"> 
						 <?php echo e(csrf_field()); ?>

							<div class="form-group <?php echo e($errors->has('filename') ? ' has-error' : ''); ?>">
								 <label for="filename">Nome del file</label> 
								 <input type="text" title="Nome del file" class="form-control" id="filename" name="filename" placeholder="Nome del file" value="<?php echo e(Session::get('name')); ?>">
								  <?php if($errors->has('filename')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('filename')); ?></strong>
                                    </span>
                                   <?php endif; ?>
							</div>
							
							<div class="form-group <?php echo e($errors->has('editor1') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">	Descrizione</label> 
								 <textarea class="form-control" name="editor1" placeholder="Descrizione"><?php echo e(old('editor1')); ?></textarea>

								   <?php if($errors->has('editor1')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('editor1')); ?></strong>
                                    </span>
                                   <?php endif; ?>

							</div>
							<div class="form-group <?php echo e($errors->has('point_value') ? ' has-error' : ''); ?>">
								 <label for="point_value">Punto Valore</label> 
								 <input type="text" title="Punto Valore" class="form-control" id="point_value" name="point_value" placeholder="Eg. 23" value="<?php echo e(Session::get('point_value')); ?>">
								  <?php if($errors->has('point_value')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('point_value')); ?></strong>
                                    </span>
                                   <?php endif; ?>
							</div>
							
							<div class="form-group <?php echo e($errors->has('filetype') ? ' has-error' : ''); ?>">
								  <label for="filetype">Seleziona Tipo:</label>
								  <select class="form-control" id="filetype" name="filetype" title="Seleziona Tipo">
								    <option value="">Seleziona Tipo</option>
								    <option value="image" <?php if($type == 'image'){ echo 'selected';} ?>>Immagine</option>
									<option value="video" <?php if($type == 'video'){ echo 'selected';} ?>>Video</option>
									<option value="document" <?php if($type == 'document'){ echo 'selected';} ?>>Documento</option>
									
								  </select>
								  <?php if($errors->has('filetype')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('filetype')); ?></strong>
                                    </span>
                                   <?php endif; ?>
							</div>
							
							<div class="form-group <?php echo e($errors->has('file') ? ' has-error' : ''); ?>">
								 <label for="file">Caricare</label> 
								 <input type="file" title="Nessun file scelto" class="form-control" id="file" name="file">
								 <?php if($errors->has('file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('file')); ?></strong>
                                    </span>
                                   <?php endif; ?>
							</div>

							

							  <button type="submit" class="btn btn-default" name="elearning_submit">Sottoscrivi</button 
							  
						  </form> 
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