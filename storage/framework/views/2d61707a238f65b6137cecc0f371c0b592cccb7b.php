<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">


        <div class="row">
                    <div class="col-md-8 heading">
                     <!---<h2> lista delle carte</h2>--->                    
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Utenti card</a></li>

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
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
						<a href="<?php echo e(url('administrator/add-card')); ?>" class="btn btn-primary" style="display:inline-block;margin-bottom:20px;">Aggiungi carta</a>
						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Titolo della carta</th>
						  		  <th>Immagine</th>
						  	 	 
						  	  	  <th>Importo della carta</th>
								  <th>lunghezza della carta (Mese)</th>
								   <th>lunghezza della carta (giorni)</th>
								  
						  	   	 
						  	      <!--<th>Crea data</th> -->
						  	       <th>Azione</th> 
						  	 </tr>
						</thead>
						 	<tbody>
						 			

						 		<?php $i=1; ?>
						 		<?php $__currentLoopData = $getCardDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   		 <tr>
							       <th scope="row"><?php echo e($i); ?></th>
							       <td><?php echo e($detail->title); ?></td>
							       <td><img src="<?php echo e(url('images/digital-card/'.$detail->image)); ?>" style="width: 93px;height: 67px;"></td> 
							   
							       <td>&euro;<?php echo e($detail->amount); ?></td> 
									<td><?php if(!empty($detail->card_length)): ?><?php echo e($detail->card_length); ?><?php endif; ?></td>

									<td><?php if(!empty($detail->card_length_days)): ?><?php echo e($detail->card_length_days); ?><?php endif; ?></td>
							      <!-- <td><?php echo e(date('d-m-Y',strtotime($detail->created_at))); ?></td>-->
							        <td>
							        	
							      <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/edit-card/'.$detail->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							      <a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/delete-card/'.$detail->id)); ?>" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							        	
							        </td>
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
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({
  "language": {
    "search": "Cerca", 
     "lengthMenu": "Mostra _MENU_ ", 
      "info": "Mostra _PAGE_ of _PAGES_", 
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