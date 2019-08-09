<?php $__env->startSection('content'); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default user-reg">
                <div class="panel-heading"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Register</div>

                 <?php if(Session::has('success')): ?>
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('success')); ?></strong>
                        </div>
                        <?php elseif(Session::has('danger')): ?>

                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('danger')); ?></strong>
                        </div>
                <?php endif; ?>                

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="demo-form" enctype="multipart/form-data" data-parsley-validate >
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Nome <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('userName') ? ' has-error' : ''); ?>">
                            <label for="userName" class="col-md-4 control-label">Nome utente <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="userName" type="text" class="form-control" name="userName" value="<?php echo e(old('userName')); ?>" required autofocus>

                                <?php if($errors->has('userName')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('userName')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                         <div class="form-group<?php echo e($errors->has('referralCode') ? ' has-error' : ''); ?>">
                            <label for="referralCode" class="col-md-4 control-label">Codice di riferimento</label>

                            <div class="col-md-6">
                                <input id="referralCode" type="text" class="form-control" name="referralCode" value="<?php echo e(old('referralCode')); ?>"  autofocus>

                                <?php if($errors->has('referralCode')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('referralCode')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('telephoneNumber') ? ' has-error' : ''); ?>">
                            <label for="telephoneNumber" class="col-md-4 control-label">Telefono <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber" value="<?php echo e(old('telephoneNumber')); ?>" required autofocus>

                                <?php if($errors->has('telephoneNumber')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('telephoneNumber')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                         <div class="form-group<?php echo e($errors->has('postalCode') ? ' has-error' : ''); ?>">
                            <label for="postalCode" class="col-md-4 control-label">Cap <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="postalCode" type="text" class="form-control" name="postalCode" value="<?php echo e(old('postalCode')); ?>" required autofocus>

                                <?php if($errors->has('postalCode')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('postalCode')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						
						<div class="form-group<?php echo e($errors->has('iva') ? ' has-error' : ''); ?>">
                            <label for="iva" class="col-md-4 control-label">Partita Iva <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="iva" type="text" class="form-control" name="iva" value="<?php echo e(old('iva')); ?>" required autofocus>

                                <?php if($errors->has('iva')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('iva')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						
						<div class="form-group<?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                            <label for="category" class="col-md-4 control-label">Categoria </label>

                            <div class="col-md-6">
								<select class="form-control" id="category" name="category" onchange="getsubcategory(this.value);">
								<option value="">Seleziona categoria</option>
								<?php if(!empty($getCategories)): ?>
									<?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($catval->parent_id == 0): ?>
											<option value="<?php echo e($catval->id); ?>"><?php echo e($catval->title); ?></option>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
								</select>

                                <?php if($errors->has('category')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('category')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						
						<div class="form-group<?php echo e($errors->has('subcategory') ? ' has-error' : ''); ?>">
                            <label for="subcategory" class="col-md-4 control-label">Sottocategoria</label>

                            <div class="col-md-6" id="subcat">
								<select class="form-control" id="subcategory" name="subcategory">
									<option value="">Seleziona sottocategoria</option>
									
								</select>

                                <?php if($errors->has('subcategory')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('subcategory')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						
						<div class="form-group<?php echo e($errors->has('discount_amount') ? ' has-error' : ''); ?>">
                            <label for="discount_amount" class="col-md-4 control-label">Totale sconto <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="discount_amount" type="text" class="form-control" name="discount_amount" value="<?php echo e(old('discount_amount')); ?>" required autofocus>

                                <?php if($errors->has('discount_amount')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('discount_amount')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
						
				
						



                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-mail <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Conferma password <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> required> <a href="#"data-toggle="modal" data-target="#myModal">Ho letto e accetto i termini del servizio</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                            

                      <!-- <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                           <div class="col-md-6">
                            <div class="g-recaptcha" data-sitekey="6LfH15oUAAAAAKCICnt_VhfvfbsRlt8K9mlJUcn1"></div>

                           </div>
                         </div>   -->               
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="register" class="btn btn-outline-primary">
                                    REGISTRATI
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

function getsubcategory(catv){ 
	$.ajax({
                url: "get-affiliatese-sucat",
                type: "post",
                data: {'_token': "<?php echo e(csrf_token()); ?>",'catv': catv},
                success: function(d) {
					$('#subcat').html(d);
                }
            });
}
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>