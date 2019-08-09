<?php $__env->startSection('content'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                      <div class="col-md-8 heading">
                    <!--- <h2>News & eventi</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="<?php echo e(url('new-event-promoter')); ?>">News & eventi</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>

                 <hr/>

          <?php if(Session::has('success')): ?>
                 <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button> 
                          <strong><?php echo e(Session::get('success')); ?></strong>
                  </div>
             <?php endif; ?>
               
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary"> 
            <div class="panel-heading">
               <h3 class="panel-title">News & eventi</h3>
            </div>          
                        <div class="panel-body">
                           
                            <div class="table-responsive">
                                <table class="table user-data-table table-striped table-bordered table-hover table-green" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Titolo</th>
                                            <th>Descrizione</th>
                                             <th>Crea data</th> 
                                             
                                              
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i='1';?>
                                        <?php $__currentLoopData = $newsEvent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $des = substr($detail->description,0,200);?>
                                           
                                        <tr class="odd gradeX">
                                            <td><?php echo e($i); ?></td>
                                                                                           
                                            <td><a href="<?php echo e(url('news-detail/'.$detail->id)); ?>"><?php echo e($detail->title); ?></a></td>
                                             <td><?php echo e(strip_tags($des)); ?></td> 
                                             <td><label class="label label-warning"><?php echo e(date('d-m-Y',strtotime($detail->start_time))); ?></label></td>
                                           
                                          
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
</div>


            <!-- Modal -->
<div class="modal popup_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content"> 
    <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
        </div>   
      <div class="modal-body">
        <div class="user-avatar">
            <img src="<?php echo e(url('front/assets/img/find_user.png')); ?>" class="user-image">
        </div>
        <div class="profile-detail">
            <div class="row">
                <div class="col-xs-6">
                    <div class="label">
                        Nome
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="data name">
                        Mario
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="label">
                        Cognome
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="data surname">
                        Rossi
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="label">
                        Indirizzo
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="data address">
                        Via Gardone,8
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="label">
                        CAP
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="data post">
                       25125
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="label">
                        Codice referral
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="data refer">
                       021820
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6">
                    <div class="label">
                        Numero di telefono
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="data Phone">
                       33929252531
                    </div>
                </div>
            </div>
        </div>
      </div>      
    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).on('click','.chlid',function(){

    //alert();

  var id=$(this).attr('data-id');  

  $.ajax({    
    type:"GET",
    url:'child-detail/'+id,
    success:function(result) {
        
        if(result!='')
        {          
            console.log(result);
             $('.name').html(result.name);
             $('.surname').html(result.userName);
             $('.address').html(result.resiaddress);
             $('.Phone').html(result.telephoneNumber);
             $('.post').html(result.postalCode);
              $('.refer').html(result.referralCode);

             console.log(result.profileimage);
      
             if(result.profileimage!='' && result.profileimage!=null) {

               $('.user-image').html('<img src="images/profile_images/' + result.profileimage + '" />');

             }else{

                  $('.user-image').html('<img src="front/assets/img/find_user.png" />');
             }

             $('#myModal').toggle();

        } 
    }
 });
}); 

$(document).on('click','.close',function(){
 $('#myModal').toggle();
});

</script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>