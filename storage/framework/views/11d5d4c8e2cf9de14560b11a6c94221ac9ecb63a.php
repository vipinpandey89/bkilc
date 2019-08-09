<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">


        <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Imposta promemoria</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Notifiche</a></li>
                              
                               
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
        <!--  <a href="<?php echo e(url('administrator/add-notification')); ?>" class="btn btn-primary" style="">Imposta promemoria</a>  -->
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">Imposta notifiche</h3>
			  </div>
			  <div class="panel-body">
				<div class="table-responsive">
            <table class="table user-data-table table-striped table-hover table-green">
             <thead>
                 <tr> 
                    <th>S-No</th>
                      <th>Elenco delle operazioni</th>
                        <th>30</th>
                     <th>20</th>                   
                      <th>10</th>
                      <th>5</th>
                      <th>4</th> 
                      <th>3</th> 
                      <th>2</th>
                      <th>1</th>
                      <th>Azione</th>
                 </tr>
            </thead>

              <tbody>
              <?php $i=1; ?>
                <?php $__currentLoopData = $getalldata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <?php $getdate= json_decode($user->reminder_date);?>
              
              <tr>

               <th scope="row"><?php echo e($i); ?></th>                     
              <td><?php if($user->reminder_type=='1'){echo 'Aggiornamento';}elseif($user->reminder_type=='2'){echo 'scadenza card';}?></td>
             <td><?php echo (in_array('30',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
             <td><?php echo (in_array('20',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
            <td><?php echo (in_array('10',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
             <td><?php echo (in_array('5',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
            <td><?php echo (in_array('4',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
            <td><?php echo (in_array('3',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
            <td><?php echo (in_array('2',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
            <td><?php echo (in_array('1',$getdate))?'<i class="fa fa-check" aria-hidden="true"></i>':'<i class="fa fa-times" aria-hidden="true"></i>';?></td>
            <td> <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/edit-notification/'.$user->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  
            </tr> 
             <?php $i++; ?>
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


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>