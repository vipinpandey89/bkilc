<?php $__env->startSection('title','UserList'); ?>
<?php $__env->startSection('content'); ?>

<style>
  .switch {
  position: relative;
  display: inline-block;
  width: 70px;
  height: 33px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #cecece;
  -webkit-transition: .4s;
  transition: .4s;
   border-radius: 34px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(37px);
}

/*------ ADDED CSS ---------*/
.slider:after
{
 /*content:'OFF';*/
 color: white;
 display: block;
 position: absolute;
 transform: translate(-50%,-50%);
 top: 50%;
 left: 50%;
 font-size: 10px;
 font-family: Verdana, sans-serif;
}

input:checked + .slider:after
{  
  /*content:'ON';*/
}
</style>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
            <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista utenti</h2> -->                    
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

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
						<div class="panel-heading"><h3 class="panel-title">LISTA UTENTI</h3> </div>
						  <div class="panel-body">
						  <div class="table-responsive">
						

					<!--<a href="<?php echo e(url('administrator/adduser')); ?>" class="btn btn-primary" style="margin-left: 1427px;margin-bottom: 10px;">Add User</a>		-->			

						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  
                                  <th data-orderable="false">Foto</th>
						  		  <th>Nome</th>
						  		  <th>Cognome</th>
						  	 	  <th data-orderable="false">Codice di riferimento</th>
						  	  	  <th>Telefono</th>
						  	   	  <th>CAP</th>
                       <th>Tipologia</th>
						  	      <th>E-mail</th> 
                       <th data-orderable="false">Id</th>
						  	      <th>data</th> 
						  	       <th data-orderable="false">Azione</th> 
                       <th data-orderable="false">Founder</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		<?php $__currentLoopData = $userDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   		 <tr>
							       
                      <td><div class="user-avatar">
                        <a class="chlid" data-id="<?php echo e($user->id); ?>">
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
							       <td><?php echo e($user->referralCode); ?></td> 
							       <td><?php echo e($user->telephoneNumber); ?></td> 
							       <td><?php echo e($user->postalCode); ?></td> 
                     <td><?php echo e($user->user_as); ?></td> 
							       <td><?php echo e($user->email); ?></td> 
                     <td>
                       
                        <a class="chlid-document" data-id="<?php echo e($user->id); ?>">
                              ViewDocument
                           
                          </a>
                       
                     </td>
							       <td><?php echo e(date('d-m-Y',strtotime($user->created_at))); ?></td>
							        <td>
							        	<a class="btn btn-primary btn-sm" href="<?php echo e(url('administrator/userdetail/'.$user->id)); ?>" title="Rete"><i class="fa fa-eye" aria-hidden="true"></i></a>
							        	<a class="btn btn-info btn-sm" href="<?php echo e(url('administrator/edituser/'.$user->id)); ?>" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							        	<a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/deleteuser/'.$user->id)); ?>" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							        	<?php if($user->status=='0'): ?>
							        	<a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/blockuser/'.$user->id)); ?>" title="Sbloccare" onclick="return confirm('Sei sicuro di voler sbloccare questo utente')"><i class="fa fa-ban" aria-hidden="true"></i></a>
							        	<?php else: ?>
							        	<a class="btn btn-success btn-sm" href="<?php echo e(url('administrator/blockuser/'.$user->id)); ?>" title="Bloccare" onclick="return confirm('Sei sicuro di voler bloccare questo utente')"><i class="fa fa-ban" aria-hidden="true"></i></a>
							        	<?php endif; ?>
                                               
							        </td>
                      <td>
                        <label class="switch"><input type="checkbox" id="togBtn" data-id="<?php echo e($user->id); ?>" name="founder" value="" <?php echo e(($user->founder=='1')?'checked':''); ?>><div class="slider round"></div></label>

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


<!-- downoad image-->

<div class="modal popup_model" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content"> 
    <div class="modal-header">
             <button type="button" class="closedocument" data-dismiss="modal" aria-label="closedocument"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><strong>Id Documents</strong></h4>                
        </div>   
      <div class="modal-body">
        <div class="imagedocument">
           
        </div>
         </div>      
    </div>
  </div>
</div>
<!--end here-->



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


$(document).on('click','.chlid-document',function(){

  var id=$(this).attr('data-id');  
  var publicurl= "<?php  echo url('/');?>";  
  //alert(publicurl);

  $.ajax({    
    type:"GET",
    url:'getdocument-popup/'+id,
    success:function(result) {
        
        if(result!='')
        {          
            console.log(result); 

            var decodeData=  JSON.parse(result);     

            var i = '1';
            $('.imagedocument').empty();
             $.each(decodeData, function( key, value ) {

                $('.imagedocument').append('('+i+') <a href="'+ publicurl +'/images/profile_images/' + value.document + '" download>Download Id documents</a></br>');
                i++;
            });     
           $('#myModal1').toggle();  

        } 
    }
 });
}); 

$(document).on('click','.close1',function(){
 $('#myModal').toggle();
});

$(document).on('click','.closedocument',function(){
 $('#myModal1').toggle();
});

$(document).ready( function () {

$.fn.dataTableExt.oSort['time-date-sort-pre'] = function(value) {      
    return Date.parse(value);
};
$.fn.dataTableExt.oSort['time-date-sort-asc'] = function(a,b) {      
    return a-b;
};
$.fn.dataTableExt.oSort['time-date-sort-desc'] = function(a,b) {
    return b-a;
};


$('#myTable').DataTable({
  "language": {
    "search": "Cerca",
	"lengthMenu": "Mostra _MENU_ promoter",
	"infoEmpty": "Nessun record disponibile",
	"emptyTable": "Nessun dato disponibile nella tabella",
	"zeroRecords": "Nessuna corrispondenza trovata",
  "paginate": {
      "previous": "precedente",
      "next":'Successiva'
    }
  },
  "columnDefs" : [
        { type: 'time-date-sort', 
          targets: [8],
        }
    ],
   "order": [[ 8, "desc" ]]
});
});



  $('input[type="checkbox"]').click(function(){

    var id = $(this).attr('data-id'); 

    if($(this).prop("checked") == true){
               $(this).val('1'); 

              var founder = '1'; 
          }
         else if($(this).prop("checked") == false){
                 $(this).val('0'); 
             var founder = '0';
         }

          $.ajax({    
            type:"GET",
            url:'set-founder',
            data:{userid:id,founder:founder},
            success:function(result) {
                
            }
         });

    });

</script>


		<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>