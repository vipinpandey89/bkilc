<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">



        <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>PV Conversioni</h2>-->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Conversioni pv</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <hr/>

        <div class="tables">
        <?php if(Session::has('success')): ?>
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong><?php echo e(Session::get('success')); ?></strong>
                        </div>
                <?php endif; ?>
        <!--  <a href="<?php echo e(url('administrator/addconvertion')); ?>" class="btn btn-primary" style="">Aggiungi conversione</a>-->  
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">PV Conversioni</h3>
			  </div>
			  <div class="panel-body">
				<div class="table-responsive">   
            <table class="table user-data-table table-striped table-hover table-green">
             <thead>
                 <tr> 
                    <th>S-No</th>                               
                    <th>Azione</th>
                     <th>PV generati</th>     
                  
                       <th>Azione</th> 
                 </tr>
            </thead>
              <tbody>
                <?php $i='1';?>
                  <?php $__currentLoopData = $getConvertion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                     <th scope="row"><?php echo e($i); ?></th>                     
                     <td><?php if($item->level=='BK2'){echo 'BK0-BK2';}elseif($item->level=='BK4'){echo 'BK2-BK4';}elseif($item->level=='BK6'){echo 'BK4-BK6';}elseif($item->level=='BK8'){echo 'BK6-BK8';}elseif($item->level=='BK10'){echo 'BK8-BK10';}elseif($item->level=='BK12'){echo 'BK10-BK12';}elseif($item->level=='P'){echo 'President';}elseif($item->level=='PT'){echo 'President Team';}elseif($item->level=='PE'){echo 'President Executive';}elseif($item->level=='AF'){echo 'Affiliazione';}elseif($item->level=='SC'){echo 'Vendita card';}?></td>
                      <td><?php echo e($item->point); ?></td>
                      <td> <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/edit-pv-generation/'.$item->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                  <?php $i++;?>
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