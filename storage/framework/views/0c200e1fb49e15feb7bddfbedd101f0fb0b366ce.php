<?php $__env->startSection('content'); ?>

 <div id="page-wrapper" >
            <div id="page-inner">  
            	 <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Le transazioni</h2>-->                   
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Le transazioni</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

               <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Le transazioni</h3>
					  </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">                                    
                                     <?php if(Session::has('success')): ?>
                                       <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                                <strong><?php echo e(Session::get('success')); ?></strong>
                                        </div>
                                     <?php endif; ?>
									
								<div class="table-responsive">
											<table class="table table-striped table-hover table-green table-bordered">
												 <thead>
													 <tr> 
														  <th style="border:none;">S-No</th>
														  <th style="border:none;">Nome</th>
														  <th style="border:none;">Cognome</th>
														  <th style="border:none;">Data</th>
														  <th style="border:none;">importo</th> 
													 </tr>
												</thead>

												<tbody>
													<?php $i=1; ?>
													<?php $__currentLoopData = $PaymentHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													 <tr>
													   <th scope="row"><?php echo e($i); ?></th>
													   <td><?php echo e($Detail->name); ?></td>
													   <td><?php echo e($Detail->userName); ?></td>
													   <!--<td><?php echo e($Detail->iva); ?></td>
													   <td><?php echo e($Detail->vat_code); ?></td>
													   <td><?php echo e($Detail->discount_amount); ?></td>
													   <td><?php echo e($Detail->category); ?></td>
													   <td><?php echo e($Detail->sub_category); ?></td>-->
																			   
													   <td><?php echo e($Detail->created_at); ?></td>
													   <td><?php echo e($Detail->paidAmount); ?></td>
													</tr> 
													<?php $i++;	?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											 </tbody>
								 </table> 
								</div>
								
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>              
         </div>            
      </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })

});

function submitform(){
	var st = confirm("Vuoi pagare per estendere?");
	if(st){
		$('#demo-form').submit();
	}else{
		return false;
	}
}

function cancelpayment(){
	var st = confirm("do you want to cancel payment?");
	if(st){
		window.location.replace("cancelpayment");
	}else{
		return false;
	}
}


</script>
<style>
a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Affiliatese.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>