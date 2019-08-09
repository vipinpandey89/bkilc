<?php $__env->startSection('content'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!---<h2> Utenti card</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="<?php echo e(url('card-users')); ?>">Utenti card</a></li>
                               
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
                           <h3 class="panel-title"> UTENTI CARD</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-green" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>                                            
                                            <th>Nome del carrello</th>
                                            <th>Prezzo carta</th>                                            
                                            <th>Data di acquisto della carta</th>
                                            <th>Data di scadenza della carta</th>
                                           

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                        ?>

                                        <?php $__currentLoopData = $cardUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                         
                                        <tr class="odd gradeX">
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e($detail->name); ?></td>
                                             <td><?php echo e($detail->email); ?></td>
                                             <td><?php echo e($detail->product_name); ?></td>
                                             <td>&euro;<?php echo e($detail->product_price); ?></td>
                                             <td><?php echo e(date('d-m-Y',strtotime($detail->orderCreate))); ?></td>
                                               <td><?php echo e(date('d-m-Y',strtotime($detail->orderCreate. " +1 month"))); ?></td>

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