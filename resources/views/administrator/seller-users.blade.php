@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

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
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
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
        @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
          <!--<a href="{{url('administrator/addcardselleruser')}}" class="btn btn-primary" style="">Aggiungi utente</a>      -->
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
                @foreach($userDetail as $user)
                   <tr>
                     <th scope="row">{{$i}}</th>
                      <td>
                        <div class="user-avatar"><a class="chlid" data-id="{{$user->id}}">                                                
                             @if(!empty($user->profileimage))
                           <img src="{{url('images/profile_images/'.$user->profileimage)}}"> 
                           @else
                           <img src="{{url('front/assets/img/find_user.png')}}">
                           @endif
                         </a>
                       </div>
                     </td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->userName}}</td>                  
                     <td>{{$user->telephoneNumber}}</td> 
                     <td>{{$user->postalCode}}</td> 
                     <td>{{$user->email}}</td> 
                     <td>{{date('d-m-Y',strtotime($user->created_at))}}</td>
					<!--  <td>@if(!empty($user->expiry_date)){{date('d-m-Y',strtotime($user->expiry_date))}}@endif</td> -->
                      <!-- <td>
                        
                        <a class="btn btn-info btn-sm" href="{{url('administrator/editcardselleruser/'.$user->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <a class="btn btn-danger btn-sm" href="{{url('administrator/deleteuser/'.$user->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        @if($user->status=='0')
                        <a class="btn btn-warning btn-sm" href="{{url('administrator/blockuser/'.$user->id)}}" title="Sbloccare" onclick="return confirm('Sei sicuro di voler sbloccare questo utente')" style=" color: red;"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        @else
                        <a class="btn btn-warning btn-sm" href="{{url('administrator/blockuser/'.$user->id)}}" title="Bloccare" onclick="return confirm('Sei sicuro di voler bloccare questo utente')"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        @endif

                      </td> -->
                  </tr> 
                  <?php $i++; ?>
                  @endforeach

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
    @endsection