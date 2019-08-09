<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Profilo</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="<?php echo e(url('administrator/userlist')); ?>">Lista</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica utente</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate> 

							<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Nome</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo e(!empty($userProfile)?$userProfile->name:old('name')); ?>" placeholder="Name" maxlength="30">
								   <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>


							<div class="form-group <?php echo e($errors->has('userName') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Cognome</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="userName" value="<?php echo e(!empty($userProfile)?$userProfile->userName:old('userName')); ?>" placeholder="Usre Name" maxlength="30">

								    <?php if($errors->has('userName')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('userName')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							

							<div class="form-group<?php echo e($errors->has('telephoneNumber') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">Telefono</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="telephoneNumber"  value="<?php echo e(!empty($userProfile)?$userProfile->telephoneNumber:old('telephoneNumber')); ?>" placeholder="Telephone Number">

								  <?php if($errors->has('telephoneNumber')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('telephoneNumber')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							<div class="form-group<?php echo e($errors->has('postalCode') ? ' has-error' : ''); ?>">
								 <label for="postalCode">CAP</label> 
								 <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?php echo e(!empty($userProfile)?$userProfile->postalCode:old('postalCode')); ?>" placeholder="Postal Code">

								    <?php if($errors->has('postalCode')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('postalCode')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>

							


							<div class="form-group<?php echo e($errors->has('iban') ? ' has-error' : ''); ?>">
								 <label for="iban">IBAN</label> 
								 <input type="text" class="form-control" id="iban" name="iban" value="<?php echo e(!empty($userProfile)?$userProfile->iban:old('iban')); ?>" placeholder="IBAN">

								    <?php if($errors->has('iban')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('iban')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>
							<div class="form-group<?php echo e($errors->has('paypal') ? ' has-error' : ''); ?>">
								 <label for="paypal">Paypal</label> 
								 <input type="text" class="form-control" id="paypal" name="paypal" value="<?php echo e(!empty($userProfile)?$userProfile->paypal:old('paypal')); ?>" placeholder="Paypal">

								    <?php if($errors->has('paypal')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('paypal')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>


							<div class="form-group<?php echo e($errors->has('bank') ? ' has-error' : ''); ?>">
								 <label for="bank">Banca </label> 
								 <input type="text" class="form-control" id="bank" name="bank" value="<?php echo e(!empty($userProfile)?$userProfile->bank:old('bank')); ?>" placeholder="Banca">

								    <?php if($errors->has('bank')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('bank')); ?></strong>
                                    </span>
                                <?php endif; ?>

							</div>


							<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								 <label for="exampleInputEmail1">E-mail</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo e(!empty($userProfile)?$userProfile->email:''); ?>"  placeholder="E-Mail Address">
							</div>
								  <?php echo e(csrf_field()); ?>


							  <button type="submit" name="editbutton" class="btn btn-default">Salva</button> </form> 
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