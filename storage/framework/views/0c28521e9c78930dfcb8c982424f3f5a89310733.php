<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">


        <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista utenti</h2>--->
                       
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
          <!--<a href="<?php echo e(url('administrator/addcardselleruser')); ?>" class="btn btn-primary" style="">Aggiungi utente</a>      -->
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">Lista utenti</h3>
			  </div>
			  <div class="panel-body">
				<div class="table-responsive">
			
            <table class="table user-data-table table-striped table-hover table-green" id="myTable">
             <thead>
                 <tr> 
                    <th>Numero di registrazione</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                   
                      <th>Telefono</th>
                      <th>CAP</th>
                      <th>E-mail</th> 
                      <th>data di acquisto</th> 
					 <!--  <th>data di scadenza</th>  -->
					  
					  
                       <!--<th>Azione</th> -->
                 </tr>
            </thead>

              <tbody>
                <?php $i=1; ?>
                <?php $__currentLoopData = $userDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                     <th scope="row"><?php echo e($i); ?></th>
                      <td>
                        <div class="user-avatar"><a class="chlid" data-id="<?php echo e($user->id); ?>">                                                
                             <?php if(!empty($user->profileimage)): ?>
                           <img src="<?php echo e(url('images/profile_images/'.$user->profileimage)); ?>"> 
                           <?php else: ?>
                           <img src="<?php echo e(url('front/assets/img/find_user.png')); ?>">
                           <?php endif; ?>
                         </a>
                       </div>
                     </td>
                     <td><?php echo e($user->name); ?></td>
                     <td><?php echo e($user->userName); ?></td>                  
                     <td><?php echo e($user->telephoneNumber); ?></td> 
                     <td><?php echo e($user->postalCode); ?></td> 
                     <td><?php echo e($user->email); ?></td> 
                     <td><?php echo e(date('d-m-Y',strtotime($user->created_at))); ?></td>
					<!--  <td><?php if(!empty($user->expiry_date)): ?><?php echo e(date('d-m-Y',strtotime($user->expiry_date))); ?><?php endif; ?></td> -->
                      <!-- <td>
                        
                        <a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/editcardselleruser/'.$user->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/deleteuser/'.$user->id)); ?>" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <?php if($user->status=='0'): ?>
                        <a class="btn btn-warning btn-sm" href="<?php echo e(url('administrator/blockuser/'.$user->id)); ?>" title="Sbloccare" onclick="return confirm('Sei sicuro di voler sbloccare questo utente')" style=" color: red;"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        <?php else: ?>
                        <a class="btn btn-warning btn-sm" href="<?php echo e(url('administrator/blockuser/'.$user->id)); ?>" title="Bloccare" onclick="return confirm('Sei sicuro di voler bloccare questo utente')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        <?php endif; ?>

                      </td> -->
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


<!-- Modal -->
<div class="modal popup_model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content"> 
    <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                
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

$(document).on('click','.close',function(){
 $('#myModal').toggle();
});


$(document).ready( function () {
       $('#myTable').DataTable({
  "language": {
    "search": "Cerca",
     "lengthMenu": "Mostra _MENU_  utenti", 
     "info": "Mostra  utenti _PAGE_ of _PAGES_", 
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