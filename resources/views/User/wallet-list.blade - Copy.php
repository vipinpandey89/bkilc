@extends('layouts.dashboard')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dettagli del wallet</h2>                     
                       
                    </div> 
                </div>
                 <!-- /. ROW  -->
                 <hr/>

                    @if (Session::has('success'))
                           <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{Session::get('success') }}</strong>
                            </div>
                       @endif
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="add-wallet text-right">

                                <a href="{{url('user-wallet-add')}}" class="btn btn-primary btn-lg">Carica denaro</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                            </div>

                            <div class="table-responsive">
                                <table class="table user-data-table" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Image</th>
                                            <th>Nome E Cognome</th>
                                             <th>E-mail</th>
                                            <th>Txn Id</th>
                                            <th>Importo pagato</th>
                                            <th>Data di pagamento</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                            $paidAmount=0;
                                        ?>

                                        @foreach($walletDetail as $detail)
                                            <?php $paidAmount= $paidAmount+$detail->paidAmount;?>
                                        <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td><div class="user-avatar"><a class="chlid" data-id="{{$detail->id}}">
                                                <?php  if(!empty($detail->profileimage)){?>
                                               <img src="{{url('images/profile_images/'.$detail->profileimage)}}">
                                                      <?php }else{?>
                                                   <img src="{{url('front/assets/img/find_user.png')}}">
                                                 <?php } ?>
                                                   

                                              </a></div> </td>
                                            <td>{{$detail->name}}</td>
                                             <td>{{$detail->email}}</td>
                                            <td>{{$detail->txn_id}}</td>
                                            <td class="center">&euro;{{$detail->paidAmount}}</td>
                                           <td>{{date('d-m-Y',strtotime($detail->created_at))}}</td>
                                          
                                        </tr>
                                        <?php 
                                            $i++;
                                        ?>
                                       @endforeach
                                       
                                      
                                    </tbody>
                                </table>
                            </div>                            
                        </div>

                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <strong>Importo totale del portafoglio-: &euro;{{$paidAmount}}</strong>
                        </div>
                    </div>

                    
                </div>
            </div>
                            
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
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
            <img src="{{url('front/assets/img/find_user.png')}}" class="user-image">
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


@endsection



