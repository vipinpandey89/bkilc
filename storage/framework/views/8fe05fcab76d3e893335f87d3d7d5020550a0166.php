<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!---<h2> Utente di conversione</h2>--->
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Conversion PV utente</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="tables">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Utente di conversione</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
                        <?php if(sizeof($userConversionPoint) != 0){ ?>
						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome</th>
						  		  <th>Telefono</th>
								  <th>CAP</th>
								  <th>Importo da pagare</th>
								  <th>PayPal</th>
								    <th>Banca</th>
								     <th>Iban</th>
								  <th>Azione</th>
						  	 </tr>
						</thead>
						 	<tbody>
						 		<?php $i=1; ?>
						 	
						 		<?php $__currentLoopData = $userConversionPoint; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
						   		 <tr>
							        <th scope="row"><?php echo e($i); ?></th>
							        <td><?php echo e($detail->name); ?></td>
							        <td><?php echo e($detail->telephoneNumber); ?></td>
							        <td><?php echo e($detail->postalCode); ?></td>
							        <td>&euro;<?php echo e($detail->amount); ?></td>

							        <td><?php echo e($detail->paypal); ?></td>	
							        <td><?php echo e($detail->bank); ?></td>	
							         <td><?php echo e($detail->iban); ?></td>						       
								   	<td>		
								   		<?php if($detail->paid_status=='1')
								   		{
								   		?>
								   			<a class="btn btn-success btn-sm"  title="vista">Pagato</a>
								   		<?php 		
								   			}else{?>				        	
							       		<a class="btn btn-warning btn-sm" href="<?php echo e(url('administrator/coversion-sendconfrimation/'.$detail->walletid)); ?>"  title="vista">in attesa di</a>
							       		<?php } ?>	
							        </td>
						   		</tr> 
						   		<?php $i++;	?>
						   		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </tbody>
					 </table> 
					 <?php }?>
					</div>
				  </div>
				</div>
					
				</div>
			</div>
		</div>
<script type="text/javascript">
	$(document).ready( function () {
       $('#myTable').DataTable({
  "language": {
    "search": "Cerca",
	"lengthMenu": "Mostra _MENU_ ",
	"info": "Mostra  _PAGE_ of _PAGES_",
	"infoEmpty": "Nessun record disponibile",
	"emptyTable": "Nessun dato disponibile nella tabella",
	"zeroRecords": "Nessuna corrispondenza trovata",
	 "paginate": {
      "previous": "precedente",
      "next":'Successiva'
    }
    
  }
});
} );
</script>		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>