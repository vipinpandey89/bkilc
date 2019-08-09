<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

<!-- //header-ends -->
<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">


		<div class="row">
			<div class="col-md-8 heading">
				<!--<h2> lista dei fondatori</h2>--->                     

			</div> 
			<div class="col-md-4 text-right">
				<div class="breadcumb">
					<ul>
						<li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
						<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
						<li><a href="#">promoter</a></li>

						<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
						<li><a class="current" href="#">Lista</a></li>

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


            <?php if(Session::has('danger')): ?>
               <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e(Session::get('danger')); ?></strong>
                </div>
           <?php endif; ?>
           
			<form action="<?php echo e(url('administrator/add-founder-bonus')); ?>" method="post" enctype="multipart/form-data" >
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">lista dei fondatori</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">

					<a href="javascript:void(0)" onclick="addbonus();" class="btn btn-primary" style="display: inline-block;margin-bottom: 20px;">Aggiungi Bonus</a>			

					<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						<thead>
							<tr> 
								<th><input type="checkbox" id="checkall"></th>
								<th>Immagine</th>
								<th>Nome</th>

								<th>E-mail</th>
								<th>Bonus</th>


							</tr>
						</thead>
						<tbody>	
							<?php $i=1; ?>
							<?php $__currentLoopData = $founders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><input type="checkbox" value="<?php echo e($detail->id); ?>" class="foundercheck cb-element" name="foundercheck[]"></th>
								<?php if(!empty($detail->profileimage)): ?>
								<td><img style="width:50px" src="<?php echo e(url('/images/profile_images/'.$detail->profileimage)); ?>" /></td>
								<?php else: ?>
								<td><img style="width:50px" src="<?php echo e(url('front/assets/img/find_user.png')); ?>" /></td>
								<?php endif; ?>
								<td><?php echo e($detail->name); ?> <?php echo e($detail->userName); ?></td>
								<td><?php echo e($detail->email); ?></td> 
								<td><?php echo e($detail->founder_bonus_point_value); ?></td>							  
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
	<!--footer-->

	<div class="modal popup_model" id="addbonus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content"> 
				<div class="modal-header">
					<button style="float: right;" type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
					<h4 class="modal-title" id="mySmallModalLabel">Gestione dei bonus</h4>
				</div>   
				<div class="modal-body">

					<div class="">

						<div class="row">

							
							<?php echo e(csrf_field()); ?>

							<div class="col-xs-12" style="padding:10px">

								indennità
								<input type="number" min="1" required style="width:100%" name="bonus" id="bonus" />
								
							</div>
							<div class="col-xs-12" style="text-align:right">
								<div class="data name">
									<input class="btn btn-primary" type="submit" value="Inviare" name="send" />
								</div>
							</div>
						</form>	
						
					</div>

				</div>
			</div>      
		</div>
	</div>
</div>
<style>
.popup_model .modal-body {
	padding: 10px;
}
</style>
<script type="text/javascript">
	
	function addbonus(){
		$('#addbonus').toggle();
	}
	$(document).on('click','.close1',function(){
		$('#addbonus').toggle();
	});
	$(document).ready( function () {
		$('#myTable').DataTable({
			"language": { 	 	
				"search": "Cerca",
				"lengthMenu": "Mostra _MENU_ promoter",
				"info": "Mostra promoter _PAGE_ of _PAGES_",
				"infoEmpty": "Nessun record disponibile",
				"emptyTable": "Nessun dato disponibile nella tabella",
				"zeroRecords": "Nessuna corrispondenza trovata",
				"paginate": {
					"previous": "precedente",
					"next":'Successiva'
				}
			}
		});
	});

	function addbonuspv(bonusval, fid){
		$.ajax({    
			type:"GET",
			url:'set-founder-bonus',
			data:{userid:fid,founderbonus:bonusval},
			success:function(result) {

			}
		});
	}

$('#checkall').change(function () {
    $('.cb-element').prop('checked',this.checked);
});

$('.cb-element').change(function () {
 if ($('.cb-element:checked').length == $('.cb-element').length){
  $('#checkall').prop('checked',true);
 }
 else {
  $('#checkall').prop('checked',false);
 }
});


</script>		

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>