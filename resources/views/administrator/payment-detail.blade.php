@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
<div id="page-wrapper">
	<div class="main-page">

			<div class="row">
                    <div class="col-md-8 heading">
                     <!---<h2> Storico dei pagamenti</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Portafoglio</a></li>

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
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">Storico dei pagamenti</h3>
			  </div>
			  <div class="panel-body">
				<div class="table-responsive">
				<table class="table user-data-table table-striped table-hover table-green" id="myTable">
					<thead>
						<tr> 
							<th>S-No</th>
							<th>Nome</th>
							<th>Tipologia</th>						  	 	 
							<th>Scadenza</th>
							<th>Stato</th>
							<th>Ammontare</th>


						</tr>
					</thead>

					<tbody>
						<?php $i=1; ?>
						@foreach($PaymentDetail as $payDetail)
						<?php
						$currentYear = date('Y');
						if(!is_null($payDetail->paymentDate)){ $paymentDate = date('Y',strtotime($payDetail->paymentDate));}else{$paymentDate='';}

						if($currentYear == $paymentDate || empty($paymentDate))
						{		
							?>
							<tr>
								<th scope="row">{{$i}}</th>
								<td>{{$payDetail->name}}</td>
								<td><?php if($payDetail->payment_level=='A'){echo 'Affiliation';}elseif($payDetail->payment_level=='C'){echo 'Card Buyer';}elseif($payDetail->payment_level=='BK0' || $payDetail->payment_level=='BK2' ||$payDetail->payment_level=='BK4' ||  
								$payDetail->payment_level=='BK6' || $payDetail->payment_level=='BK8' || $payDetail->payment_level=='BK12'){echo 'Upgrade';}else{echo '-';}?></td>


								<td>
									<a href="#"  data-id="<?php echo $payDetail->id;?>" class="deadlindate" >
										<?php if(!empty($payDetail->renewal_date)){ echo date('d-m-Y',strtotime($payDetail->renewal_date)); }
									elseif(!empty($payDetail->txn_id)){echo date('d-m-Y',strtotime($payDetail->paymentDate." +1 Year"));}else{
									echo date('d-m-Y',strtotime($payDetail->created_at." +1 Year"));}?>

								</a>
							</td> 	

								<td><?php if(!empty($payDetail->txn_id)){ echo 'DONE';}else{ echo 'TO DO';}?> </td> 


								<td>{{($payDetail->paidAmount)?'&euro;'.$payDetail->paidAmount:'-'}}</td> 							        
							</tr> 
						<?php  } $i++;	?>
						@endforeach

					</tbody>
				</table> 
			</div>
			  </div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Chanage DeadLine</h4>
			</div>
			<div class="modal-body">         

				<form method="post" action="{{url('administrator/update-userprofile')}}" id="demo-form" data-parsley-validate> 
					<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">

						<label for="exampleInputEmail1">Data</label> 

						<input type="text" class="form-control dateTime" id="exampleInputEmail1" name="date" value="{{old('title')}}" readonly="" placeholder="Data" required>
						<input type="hidden" name="user_id" id="user_id" value="">

						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>

					{{ csrf_field() }}
					<button type="submit" name="addbutton" class="btn btn-default">Salva</button>
				</form>		


			</div>

		</div>

	</div>
</div>


<script type="text/javascript">
	
$(document).on('click','.deadlindate',function(){
	
	var id = $(this).attr('data-id');
	
	$('#user_id').val(id);
	  $("#myModal").modal();

});

$(document).ready( function () {
    $('#myTable').DataTable({
  "language": {
    "search": "Cerca",
     "lengthMenu": "Mostra _MENU_ ", 
     "info": "Mostra _PAGE_ of _PAGES_", 
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


<script>
$('.dateTime').datetimepicker({
ownerDocument: document,
contentWindow: window,
value: '',
rtl: false,
format: 'Y-m-d i',
formatTime: 'H:i',
formatDate: 'Y-m-d',
startDate:  false, 
step: 60,
monthChangeSpinner: true,
closeOnDateSelect: false,
closeOnTimeSelect: true,
closeOnWithoutClick: true,
closeOnInputClick: true,
openOnFocus: true,
timepicker: true,
datepicker: true,
weeks: false,
defaultTime: false, 
defaultDate: false, 
});

</script>
@endsection