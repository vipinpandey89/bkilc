<?php $__env->startSection('content'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>Commissione del venditore</h2>-->                     
                       
                    </div> 
                     <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Commission del venditore</a></li>
                               
                            </ul>
                        </div>
                    </div>

                </div>
                 <!-- /. ROW  -->
                 <hr/>

                    <?php if(Session::has('success')): ?>
                           <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong><?php echo e(Session::get('success')); ?></strong>
                            </div>
                       <?php endif; ?>
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                         
							<h3 class="panel-title">Commissione del venditore</h3>
						   
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-green" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Nome</th>
                                             <th>E-mail</th>                                            
                                            <th>P.V. della commissione</th>
                                            <th>Livello della Commissione</th>
                                            <th>Data della Commissione</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                        ?>

                                        <?php $__currentLoopData = $CommissionUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                         
                                        <tr class="odd gradeX">
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e($detail->name); ?></td>
                                             <td><?php echo e($detail->email); ?></td>
                                             <td><?php echo e($detail->commission_point); ?></td>
                                             <td><?php echo e(!empty($detail->commission_level) ? 'Livello '.$detail->commission_level:'level upgrade '); ?></td>
                                             <td><?php echo e(date('d-m-Y',strtotime($detail->commissioncreate))); ?></td>
                                        </tr>
                                        <?php 
                                            $i++;
                                        ?>
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
             <!-- /. PAGE INNER  -->
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>