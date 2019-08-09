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
                                     



                                        <div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">Seleziona livello</label>
                                      
                                        <select class="form-control" name="level" id="level" required>
                                            <option value=''>Seleziona livello</option>
                                           
                                            <?php if($userProfile->user_as=='BK0'){?>
                                            <option value='BK2'<?php echo ($userProfile->user_as=='BK2')?'selected':'';?>>BK2</option> 
                                            <?php }elseif($userProfile->user_as=='BK2') {?>                                      

                                            <option value='BK4' <?php echo ($userProfile->user_as=='BK4')?'selected':'';?>>BK4</option>
                                          <?php }elseif($userProfile->user_as=='BK4'){?>
                                            <option value='BK6' <?php echo ($userProfile->user_as=='BK6')?'selected':'';?>>BK6</option>
                                          <?php }elseif($userProfile->user_as=='BK6') {?>
                                            <option value='BK8' <?php echo ($userProfile->user_as=='BK8')?'selected':'';?>>BK8</option>
                                          <?php }elseif($userProfile->user_as=='BK8') {?>
                                            <option value='BK10' <?php echo ($userProfile->user_as=='BK10')?'selected':'';?>>BK10</option>
                                          <?php }elseif($userProfile->user_as=='BK10') {?>
                                            <option value='BK12' <?php echo ($userProfile->user_as=='BK12')?'selected':'';?>>BK12</option>
                                          <?php }?>

                                        </select>
                                       
                                            @if ($errors->has('payamount'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('payamount') }}</strong>
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
                                        <input type="hidden" name="custom" id="custom" value="">                                        
                                        <input type='hidden' name='cancel_return' value='{{url('paypal/cancel')}}'>
                                        <input type='hidden' name='return' value='{{url('paypal/getupgradelevel')}}'> 
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

$('#level').change(function(){

  //alert($(this).val());
  $('#custom').val($(this).val());

});


</script>


@endsection
