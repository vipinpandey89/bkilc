@extends('Affiliatese.dashboard')

@section('content')

 <div id="page-wrapper" >
            <div id="page-inner">  
            	 <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Le transazioni</h2>-->                   
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Le transazioni</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

               <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Le transazioni</h3>
					  </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">                                    
                                     @if (Session::has('success'))
                                       <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                                <strong>{{Session::get('success') }}</strong>
                                        </div>
                                     @endif
									
								<div class="table-responsive">
											<table class="table table-striped table-hover table-green table-bordered">
												 <thead>
													 <tr> 
														  <th style="border:none;">S-No</th>
														  <th style="border:none;">Nome</th>
														  <th style="border:none;">Cognome</th>
														  <th style="border:none;">Data</th>
														  <th style="border:none;">importo</th> 
													 </tr>
												</thead>

												<tbody>
													<?php $i=1; ?>
													@foreach($PaymentHistory as $Detail)
													 <tr>
													   <th scope="row">{{$i}}</th>
													   <td>{{$Detail->name}}</td>
													   <td>{{$Detail->userName}}</td>
													   <!--<td>{{$Detail->iva}}</td>
													   <td>{{$Detail->vat_code}}</td>
													   <td>{{$Detail->discount_amount}}</td>
													   <td>{{$Detail->category}}</td>
													   <td>{{$Detail->sub_category}}</td>-->
																			   
													   <td>{{$Detail->created_at}}</td>
													   <td>{{$Detail->paidAmount}}</td>
													</tr> 
													<?php $i++;	?>
													@endforeach

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })

});

function submitform(){
	var st = confirm("Vuoi pagare per estendere?");
	if(st){
		$('#demo-form').submit();
	}else{
		return false;
	}
}

function cancelpayment(){
	var st = confirm("do you want to cancel payment?");
	if(st){
		window.location.replace("cancelpayment");
	}else{
		return false;
	}
}


</script>
<style>
a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>

@endsection
