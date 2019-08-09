<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

		
		<div id="page-wrapper">
			<div class="main-page">

            <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Abbonamento affiliati</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Affiliati</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Sottoscrizioni</a></li>


                               
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
						<h3 class="panel-title">Abbonamento affiliati</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
					

					<!--<a href="<?php echo e(url('administrator/adduser')); ?>" class="btn btn-primary" style="margin-left: 1427px;margin-bottom: 10px;">Add User</a>		-->			

						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
                    <th>Name</th>
						  		  <th>Pagamento</th>
						  		  <th>Stato</th>
						  	 	  <th>Ammontare</th>
						  	  	<th>Promoter Name</th>
                    <th>data</th>
                    <th>Azione</th>
						  	       
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		<?php $__currentLoopData = $getAffiliatesSubscription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $getUser = Helper::getUserByUserId($user->parent_id);
                    $currentYear = date('Y');
                  if(!is_null($user->paymentDate)){ $paymentDate = date('Y',strtotime($user->paymentDate));}else{$paymentDate='';}
                    
                  if($currentYear == $paymentDate || empty($paymentDate))
                  {   
                 ?>
						   		 <tr>
							       <th scope="row"><?php echo e($i); ?></th>                     
							       <td><?php echo e($user->name); ?></td>
							       <td><?php echo e(($user->txn_id)?'Si':'No'); ?></td> 
							       <td><?php echo e(($user->paymentstatus)?$user->paymentstatus:'Gratis'); ?></td> 
                     <td><?php echo e(!empty($user->paidAmount)? '&euro;'.$user->paidAmount:'-'); ?></td> 
							       <td><?php echo e((!empty($getUser))?$getUser->name:''); ?></td> 
                     <td><?php echo e(!empty($user->paymentDate)?date('d-m-Y',strtotime($user->paymentDate)):'-'); ?></td>
					 <td>
					 <?php if(empty($user->isPromotor)): ?>
								   <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/editAff/'.$user->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
					<?php endif; ?>		      

							       </td>
						   		</tr> 
						   		<?php } $i++;	?>
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


<!-- Modal -->
<div class="modal popup_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content"> 
    <div class="modal-header">
             <button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
        </div>   
      <div class="modal-body">
        <div class="user-avatar responceimage">
           
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

  var id=$(this).attr('data-id');  
  var publicurl= "<?php  echo url('/');?>";  
  //alert(publicurl);

  $.ajax({    
    type:"GET",
    url:'getuser-popup/'+id,
    success:function(result) {
        
        if(result!='')
        {          
            //console.log(result);
             $('.name').html(result.name);
             $('.surname').html(result.userName);
             $('.address').html(result.resiaddress);
             $('.Phone').html(result.telephoneNumber);
             $('.post').html(result.postalCode);
              $('.refer').html(result.referralCode);

            
      
             if(result.profileimage!='' && result.profileimage!=null) {

               console.log(result.profileimage);
               $('.responceimage').html('<img src="'+ publicurl +'/images/profile_images/' + result.profileimage + '" />');

             }else{

                  $('.responceimage').html('<img src="<?php echo e(url("front/assets/img/find_user.png")); ?>" />');
             }

             $('#myModal').toggle();

        } 
    }
 });
}); 

$(document).on('click','.close1',function(){
 $('#myModal').toggle();
});


$(document).ready( function () {
           $('#myTable').DataTable({
  "language": {
    "search": "Cerca",
     "lengthMenu": "Mostra _MENU_ transazioni",
  "info": "Mostra transazioni _PAGE_ of _PAGES_",    
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