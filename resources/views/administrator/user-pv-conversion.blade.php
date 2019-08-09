@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!---<h2> Utente di conversione</h2>--->
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Conversion PV utente</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="tables">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Utente di conversione</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
                        <?php if(sizeof($userConversionPoint) != 0){ ?>
						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome</th>
						  		  <th>Telefono</th>
								  <th>CAP</th>
								  <th>Importo da pagare</th>
								  <th>PayPal</th>
								    <th>Banca</th>
								     <th>Iban</th>
								  <th>Azione</th>
						  	 </tr>
						</thead>
						 	<tbody>
						 		<?php $i=1; ?>
						 	
						 		@foreach($userConversionPoint as $detail)
								
						   		 <tr>
							        <th scope="row">{{$i}}</th>
							        <td>{{$detail->name}}</td>
							        <td>{{$detail->telephoneNumber}}</td>
							        <td>{{$detail->postalCode}}</td>
							        <td>&euro;{{$detail->amount}}</td>

							        <td>{{$detail->paypal}}</td>	
							        <td>{{$detail->bank}}</td>	
							         <td>{{$detail->iban}}</td>						       
								   	<td>		
								   		<?php if($detail->paid_status=='1')
								   		{
								   		?>
								   			<a class="btn btn-success btn-sm"  title="vista">Pagato</a>
								   		<?php 		
								   			}else{?>				        	
							       		<a class="btn btn-warning btn-sm" href="{{url('administrator/coversion-sendconfrimation/'.$detail->walletid)}}"  title="vista">in attesa di</a>
							       		<?php } ?>	
							        </td>
						   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach
						 </tbody>
					 </table> 
					 <?php }?>
					</div>
				  </div>
				</div>
					
				</div>
			</div>
		</div>
<script type="text/javascript">
	$(document).ready( function () {
       $('#myTable').DataTable({
  "language": {
    "search": "Cerca",
	"lengthMenu": "Mostra _MENU_ ",
	"info": "Mostra  _PAGE_ of _PAGES_",
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