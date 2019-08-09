@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
			  @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
									
					<div class="table-responsive bs-example widget-shadow">
						<h4>Lista del wallet</h4>

					<!--<a href="{{url('administrator/adduser')}}" class="btn btn-primary" style="margin-left: 1427px;margin-bottom: 10px;">Add User</a>		-->			

						<table class="table user-data-table">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
                                 <th>Image</th>
						  		  <th>Nome E Cognome</th>
						  		  <th>Nome Utente</th>
						  		  <th>E-Mail</th>
						  		  <th>Telefono</th>
						  		   <th>Importo pagato</th>
						  	 	  <th>Txn Id</th>
						  	  	  <th>Data di pagamento</th>
						  	   	  
						  	 </tr>
						</thead>

						 	<tbody>

						 		<?php $i=1; ?>
						 		@foreach($walletDetail as $detail)

						   		 <tr>
							       <th scope="row">{{$i}}</th>
                        <td>
                        <div class="user-avatar"><a class="chlid" data-id="{{$detail->id}}">
                                                
                                  @if(!empty($detail->profileimage))
                                   <img src="{{url('images/profile_images/'.$detail->profileimage)}}"> 
                                   @else
                                   <img src="{{url('front/assets/img/find_user.png')}}">
                                   @endif
                                </a>
                              </div>
                          </td>
							       <td>{{$detail->name}}</td>
							       <td>{{$detail->userName}}</td> 
							       <td>{{$detail->email}}</td> 
							       <td>{{$detail->telephoneNumber}}</td> 
							       <td>&euro;{{$detail->paidAmount}}</td> 
							        <td>{{$detail->txn_id}}</td>
							      
							       <td>{{date('d-m-Y',strtotime($detail->paymentdate))}}</td>
							       
						   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach

						 </tbody>
					 </table> 
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
        
        console.log(result);
        if(result!='')
        {          
            
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

                  $('.responceimage').html('<img src="{{url("front/assets/img/find_user.png")}}" />');
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
		@endsection