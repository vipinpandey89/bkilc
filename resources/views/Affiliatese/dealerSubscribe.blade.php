@extends('Affiliatese.dashboard')

@section('content')
<?php
$BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';
$paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';
?>
 <div id="page-wrapper" >
            <div id="page-inner">  
               <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Abbonamento al rivenditore</h3>
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
									<div class="form-group form-group">
                                    <form role="form" method="post" action="{{$paypalUrl}}"  id="demo-form" data-parsley-validate>
                                         {{ csrf_field() }}          

											<?php // $a= Helper::dealerRenew($userid='43',$amount='10',$paid='50');?>
                                     
										@php 
										    $st = '';
										    if(empty($PaymentHistory->created_at))
												$dateString = $userProfile->created_at;
										    else
												$dateString = $PaymentHistory->created_at;

											
											$dt = new DateTime($dateString);
											$dt->modify('1 years');
										    $deadline = $dt->format('Y-m-d h:i:s');
											$dt1 = new DateTime($deadline);
											$dt1->modify('-27 days');
										    $deadline1 = $dt1->format('Y-m-d h:i:s');
										    $currentdate = date('Y-m-d h:i:s'); 
										@endphp
                                        <table class="table table-striped table-hover table-green table-bordered">
												 <thead>
													 <tr> 
														  <th style="border:none;">Data di iscrizione</th>
														  <th style="border:none;">Rinnova</th>
														  <th style="border:none;">Scadenza</th>
													 </tr>
												</thead>

												<tbody>
												
													 <tr>
													  
													@if($deadline1 >= $currentdate)
													
	                                                @if($userProfile->payment_status == 1)
													@php
														$st = 'enabled';
													@endphp	
													@else
													@php	
														$st = 'disabled';
													@endphp		
													@endif
													
													  
													@endif 
													   <td><span class="label label-info">{{!empty($dateString)? date('d-m-Y',strtotime($dateString)):''}}</span></td>
													   <td><span style="font-size: 24px;font-weight: bold;" class="superscript text-success">&euro;</span>
													<span style="font-size: 24px;font-weight: bold;" class="text-success">{{!empty($planGetById)?$planGetById->subscription_price:old('subscription_price')}}</span></td>
													   <td><span class="label label-danger">@if(!empty($deadline)){{date('d-m-Y', strtotime($deadline))}} @endif</span></td>
													</tr> 
													
											 </tbody>
										</table> 
										

                                        <input type="hidden" name="business" value="{{$BusinessEmail}}">  
                                        <input type="hidden" name="cmd" value="_xclick"> 
                                        <input type="hidden" name="item_name" value="{{ !empty($userProfile)?$userProfile->name:'' }}">
                                        <input type="hidden" name="item_number" value="{{ !empty($userProfile)?$userProfile->id:'' }}">
                                        <input type="hidden" id="amount" name="amount" value="{{!empty($planGetById)?$planGetById->subscription_price:old('subscription_price')}}">
                                        <input type="hidden" name="currency_code" value="EUR">    
                                        <input type="hidden" name="custom" id="custom" value="">                                        
                                        <input type='hidden' name='cancel_return' value='{{url('paypal/dealer-cancel')}}'>
                                        <input type='hidden' name='return' value='{{url('paypal/dealer-getupgradecommission')}}'> 
                                       <!-- <input type='hidden' name='notify_url' value='{{url('paypal/ipnstatus')}}'> -->
                                        <input type='hidden' name='notify_url' value='https://www.komete.it'>
										
                                        <button type="submit" name="updateprofile" class="btn btn-primary btn-custom">rinnova</button>  

                                    </form>                                  
                                </div>
								<div class="form-group info-txt">
								<!--<h4>Elenco dei proprietari di carte</h4>-->
								<h3><span class="">Totale utenti card nella tua zona: <span class="label label-success"><?php echo count($cardowners); ?></span></h3>
											<?php /* <table class="table table-bordered">
												 <thead>
													 <tr> 
														  <th>S-No</th>
														  <th>Nome</th>
														  <th>E-mail identificativo utente</th>
														  <th>Azione</th> 
													 </tr>
												</thead>

												<tbody>
													<?php $i=1; ?>
													@foreach($cardowners as $Detail)
													 <tr>
													   <th scope="row">{{$i}}</th>
													   <td>{{$Detail->name}}</td>
													   <!--<td>{{$Detail->iva}}</td>
													   <td>{{$Detail->vat_code}}</td>
													   <td>{{$Detail->discount_amount}}</td>
													   <td>{{$Detail->category}}</td>
													   <td>{{$Detail->sub_category}}</td>-->
																			   
													   <td>{{$Detail->email}}</td>
														<td>
														<a href="{{url('viewcardowner/'.$Detail->id)}}"  title="vista"><i class="fa fa-eye" aria-hidden="true"></i></a>
									

														</td>
													</tr> 
													<?php $i++;	?>
													@endforeach

											 </tbody>
								 </table> */ ?>
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
	var st = confirm("vuoi annullare il pagamento?");
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
  filter: grayscale(100%) !important;
}
</style>

@endsection
