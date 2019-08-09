<?php $__env->startSection('content'); ?>
 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Dettagli di pagamento</h2>   -->                  
                       
                    </div> 

                <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Dettagli di pagamento</a></li>
                               
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
							<h3 class="panel-title">Dettagli di pagamento</h3>
							</div>
                        <div class="panel-body">
                            

                            <div class="table-responsive">
                                <table class="table user-data-table table-green table-hover table-striped" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Nome</th>
                                            <th>IBAN</th>
                                            <th>Banca</th>                                             
                                            <th>PayPal Id</th>                                           
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                           
                                        ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo e($i); ?></td>
                                            <td><?php echo e(!empty($getUserDetail)?$getUserDetail->name:''); ?></td>
                                            <td><?php echo e(!empty($getUserDetail)?$getUserDetail->iban:''); ?></td>
                                             <td><?php echo e(!empty($getUserDetail)?$getUserDetail->bank:''); ?></td>
                                            <td><?php echo e(!empty($getUserDetail)?$getUserDetail->paypal:''); ?></td> 
                                          
                                        </tr>
                                        <?php 
                                            $i++;
                                        ?>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>

                    </div>
                </div>
            </div>
                            
        </div>
               
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.profile_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>