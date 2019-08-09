@extends('layouts.dashboard')

@section('content')
<?php
$BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';
$paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';
?>
 <div id="page-wrapper" >
            <div id="page-inner">  
               <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">                                    
                                     @if (Session::has('success'))
                                       <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                                <strong>{{Session::get('success') }}</strong>
                                        </div>
                                     @endif
                                    <form role="form" method="post" action="{{$paypalUrl}}"  id="demo-form" data-parsley-validate>
                                         {{ csrf_field() }}
                                         
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Nome e cognome</label>

                                           <input id="name" type="text" class="form-control" name="name" value="{{ !empty($userProfile)?$userProfile->name:old('name') }}" readonly="" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif

                                        </div>

                                        <div class="form-group form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
                                             <label for="userName" class="col-md-4 control-label">Nome utente</label>
                            
                                            <input id="userName" type="text" class="form-control" name="userName" value="{{ !empty($userProfile)?$userProfile->userName: old('userName') }}" required autofocus readonly="">

                                            @if ($errors->has('userName'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('userName') }}</strong>
                                                </span>
                                            @endif

                                        </div>

                                         <div class="form-group form-group{{ $errors->has('referralCode') ? ' has-error' : '' }}">
                                            <label for="referralCode" class="col-md-4 control-label">Codice di riferimento</label>
                                       
                                              <input id="referralCode" type="text" class="form-control" name="referralCode" value="{{!empty($userProfile)?$userProfile->referralCode:old('referralCode') }}" readonly=""  autofocus>

                                            @if ($errors->has('referralCode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('referralCode') }}</strong>
                                                </span>
                                            @endif

                                        </div>                                         


                                         <div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">Telefono</label>
                                      
                                            <input id="email" type="email" class="form-control" name="email" value="{{ !empty($userProfile)?$userProfile->email: old('email') }}" readonly="" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif

                                        </div>



                                         <div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">Importo Paga</label>
                                      
                                            <input id="payamount" type="text" class="form-control" name="payamount" value="{{ old('payamount') }}" placeholder="&euro;"  required>

                                            @if ($errors->has('payamount'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('payamount') }}</strong>
                                                </span>
                                            @endif

                                        </div>   

                                    

                                         <!--<div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">Commento</label>

                                      
                                            <textarea id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}" ></textarea>

                                        </div> -->

                                        <input type="hidden" name="business" value="{{$BusinessEmail}}">  
                                        <input type="hidden" name="cmd" value="_xclick"> 
                                        <input type="hidden" name="item_name" value="{{ !empty($userProfile)?$userProfile->name:'' }}">
                                        <input type="hidden" name="item_number" value="{{ !empty($userProfile)?$userProfile->id:'' }}">
                                        <input type="hidden" id="amount" name="amount" value="">
                                        <input type="hidden" name="currency_code" value="EUR"> 
                                        <input type="hidden" id="description" name="description" value="">                                              
                                        <input type='hidden' name='cancel_return' value='{{url('paypal/cancel')}}'>
                                        <input type='hidden' name='return' value='{{url('paypal/getresponse')}}'> 
                                       <!-- <input type='hidden' name='notify_url' value='{{url('paypal/ipnstatus')}}'> -->
                                        <input type='hidden' name='notify_url' value='https://www.komete.it'>
                                        <button type="submit" name="updateprofile" class="btn btn-default">Conferma modifiche</button>    

                                    </form>                                  
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

$('#payamount').keyup(function(){
    
   $('#amount').val($(this).val());
   
});


</script>


@endsection
