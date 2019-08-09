<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista categoria</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Azienda</a></li>
                               
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
                 <?php if(Session::has('error')): ?>
                       <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('error')); ?></strong>
                        </div>
                <?php endif; ?>
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Elenco delle notizie</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
						<a href="<?php echo e(url('administrator/add-news')); ?>" class="btn btn-primary" style="display: inline-block;margin-bottom: 20px;">Elenco delle notizie</a>						
                       
						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
					  			  <th>Logo</th>
						  		  <th>Titolo</th>
						  	      <th>Azione</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		<?php $__currentLoopData = $getDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   		 <tr>
							       <th scope="row"><?php echo e($i); ?></th>
							       <td><div class="user-avatar">
				                        <a class="chlid">
				                               <?php if(!empty($Detail->image)): ?>
				                           <img src="<?php echo e(url('images/news/'.$Detail->image)); ?>"> 
				                           <?php else: ?>
				                           <img src="<?php echo e(url('front/assets/img/find_user.png')); ?>">
				                           <?php endif; ?>
				                           
				                          </a>
				                       </div></td>							     
							     					       
							       <td>	<?php echo e($Detail->title); ?></td>
							       
							        <td>						        
							        	

							       <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/edit-news/'.$Detail->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							      <a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/delete-news/'.$Detail->id)); ?>" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
		
		
<script>
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
</script>	<!--footer-->
		<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>