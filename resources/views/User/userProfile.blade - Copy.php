@extends('layouts.dashboard')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                
               
               <div class="row">
               
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                      <div class="">
                          <div class="col-md-12">
                       <h3>Completa il tuo profilo per ottenere la carta Bklic e la lettera di conferma</h3>
                    </div>
                  </div>
                        <div class="panel-body">
                                                           
                                    
                             @if (Session::has('success'))
                               <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                        <strong>{{Session::get('success') }}</strong>
                                </div>
                             @endif



                                    <form role="form" method="post" id="demo-form" data-parsley-validate enctype="multipart/form-data">
                                         {{ csrf_field() }}
                                         <div class="row">
                                          <div class="col-md-6">
                                         <div class="form-group">
                                            <label>ID Personale</label>
                                           <input id="name" type="text" class="form-control" value="{{ !empty($userProfile)?$userProfile->id:old('name') }}" required autofocus  readonly="">
                                         </div>
                                        </div>

                                        <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Punteggio</label>
                                           <input id="name" type="text" class="form-control"  value="{{ !empty($userProfile)?'0':old('name') }}" required autofocus  readonly="">

                                           </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-6">
                                         <div class="form-group">
                                            <label>Bilancio</label>
                                           <input id="name" type="text" class="form-control"  value="{{ !empty($userProfile)?'0':old('name') }}" required autofocus  readonly="">

                                          </div>
                                        </div>


                                        <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label>Nome</label>
                                           <input id="name" type="text" class="form-control" name="name" value="{{ !empty($userProfile)?$userProfile->name:old('name') }}" required autofocus maxlength="30">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        </div>
                                        </div>


                                        <div class="row">
                                          <div class="col-md-6">
                                        <div class="form-group form-group{{ $errors->has('userName') ? ' has-error' : '' }}">
                                             <label for="userName" class="col-md-4 control-label">cognome</label>

                            
                                            <input id="userName" type="text" class="form-control" name="userName" value="{{ !empty($userProfile)?$userProfile->userName: old('userName') }}" required autofocus maxlength="30">

                                            @if ($errors->has('userName'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('userName') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                        <?php 
                                         $date= strtotime('+1 years',strtotime($userProfile->created_at));  ?>

                                       </div>
                                       <div class="col-md-6">
                                         <div class="form-group form-group">
                                             <label for="userName" class="col-md-4 control-label">Data Registrazione</label>                            
                                            <input id="userName" type="text" class="form-control" value="{{ !empty($userProfile)?date('m-d-Y',strtotime($userProfile->created_at)): old('userName') }}" required autofocus readonly="">
                                          
                                        </div>
                                      </div>
                                    </div>



                                      <div class="row">
                                          <div class="col-md-6">
                                        <div class="form-group form-group">
                                             <label for="userName" class="col-md-4 control-label">Scadenza</label>
                            
                                            <input id="userName" type="text" class="form-control" value="{{ !empty($userProfile)?date('m-d-Y',$date): old('userName') }}" required autofocus  readonly="">
                                          
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('referralCode') ? ' has-error' : '' }}">
                                            <label for="referralCode" class="col-md-4 control-label">Codice di riferimento</label>
                                       
                                              <input id="referralCode" type="text" class="form-control" name="referralCode" value="{{!empty($userProfile)?$userProfile->referralCode:old('referralCode') }}" readonly=""  autofocus>

                                            @if ($errors->has('referralCode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('referralCode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
                                              <label for="telephoneNumber" class="col-md-4 control-label">Telefono</label>

                                
                                                <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber" value="{{ !empty($userProfile)?$userProfile->telephoneNumber: old('telephoneNumber') }}" required autofocus>

                                                @if ($errors->has('telephoneNumber'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('telephoneNumber') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                      </div>
                                       

                                      <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">E-mail</label>

                                      
                                            <input id="email" type="email" class="form-control" name="email" value="{{ !empty($userProfile)?$userProfile->email: old('email') }}" readonly="" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                    </div>


                                    <div class="row">
                                          <div class="col-md-6">
                                        <div class="form-group form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                              <label for="dob" class="col-md-4 control-label">Nata/o a</label>
                                      
                                            <input id="dob" type="date" class="form-control" name="dob" value="{{ !empty($userProfile)?$userProfile->dob: old('dob') }}" required>

                                            @if ($errors->has('dob'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('resiaddress') ? ' has-error' : '' }}">
                                              <label for="resiaddress" class="col-md-4 control-label">Residente a</label>
                                      
                                            <input id="resiaddress" type="text" class="form-control" name="resiaddress" value="{{ !empty($userProfile)?$userProfile->resiaddress: old('resiaddress') }}" required>

                                            @if ($errors->has('resiaddress'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('resiaddress') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                                              <label for="region" class="col-md-4 control-label">Regione</label>
                                      
                                            <input id="region" type="text" class="form-control" name="region" value="{{ !empty($userProfile)?$userProfile->region: old('region') }}" required>

                                            @if ($errors->has('region'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('region') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
                                             <label for="postalCode" class="col-md-4 control-label">CAP</label>

                                
                                            <input id="postalCode" type="text" class="form-control" name="postalCode" value="{{ !empty($userProfile)?$userProfile->postalCode:old('postalCode') }}" required autofocus>

                                            @if ($errors->has('postalCode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('postalCode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('streat') ? ' has-error' : '' }}">
                                              <label for="streat" class="col-md-4 control-label">Via</label>
                                      
                                            <input id="streat" type="text" class="form-control" name="streat" value="{{ !empty($userProfile)?$userProfile->streat: old('streat') }}" required>

                                            @if ($errors->has('streat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('streat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group form-group{{ $errors->has('Fcode') ? ' has-error' : '' }}">
                                              <label for="Fcode" class="col-md-4 control-label">Cod. Fiscale</label>
                                      
                                            <input id="Fcode" type="text" class="form-control" name="Fcode" value="{{ !empty($userProfile)?$userProfile->fcode: old('Fcode') }}" required>

                                            @if ($errors->has('Fcode'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('Fcode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('pariva') ? ' has-error' : '' }}">
                                              <label for="pariva" class="col-md-4 control-label">Part. I.V.A</label>
                                      
                                            <input id="pariva" type="text" class="form-control" name="pariva" value="{{ !empty($userProfile)?$userProfile->pariva: old('pariva') }}" required>

                                            @if ($errors->has('pariva'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('pariva') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        </div>  

                                        <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('business_name') ? ' has-error' : '' }}">
                                              <label for="business_name" class="col-md-4 control-label">Ragione Sociale</label>
                                      
                                            <input id="business_name" type="text" class="form-control" name="business_name" value="{{ !empty($userProfile)?$userProfile->business_name: old('business_name') }}" required>

                                            @if ($errors->has('business_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('business_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>  
                                      </div>
                                    </div>

                                    <div class="row">
                                          <div class="col-md-6">
                                          <div class="form-group form-group{{ $errors->has('IBAN') ? ' has-error' : '' }}">
                                              <label for="IBAN" class="col-md-4 control-label">IBAN</label>
                                      
                                            <input id="IBAN" type="text" class="form-control" name="IBAN" value="{{ !empty($userProfile)?$userProfile->iban: old('IBAN') }}" required>

                                            @if ($errors->has('IBAN'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('IBAN') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        </div>  

                                        <div class="col-md-6">
                                         <div class="form-group form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                              <label for="bank" class="col-md-4 control-label">Banca</label>
                                      
                                            <input id="bank" type="text" class="form-control" name="bank" value="{{ !empty($userProfile)?$userProfile->bank: old('bank') }}" required>

                                            @if ($errors->has('bank'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('bank') }}</strong>
                                                </span>
                                            @endif
                                        </div> 
                                        </div>
                                        </div> 

                                        <div class="row">
                                          <div class="col-md-6">
                                          <div class="form-group form-group{{ $errors->has('Paypal') ? ' has-error' : '' }}">
                                              <label for="Paypal" class="col-md-4 control-label">Paypal</label>
                                      
                                            <input id="Paypal" type="text" class="form-control" name="Paypal" value="{{ !empty($userProfile)?$userProfile->paypal: old('Paypal') }}" required>

                                            @if ($errors->has('Paypal'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('Paypal') }}</strong>
                                                </span>
                                            @endif
                                        </div>  
                                      </div>
                                        

                                      <div class="col-md-6">

                                        <div class="form-group form-group{{ $errors->has('profileImage') ? ' has-error' : '' }}">

                                              <label for="pariva" class="col-md-4 control-label">Immagine del profilo</label>   

                                            <input id="profileImage" type="file" class="form-control" name="profileImage" >

                                             <input type="hidden" name="old_file" value="{{!empty($userProfile->profileimage)?$userProfile->profileimage:''}}"> 
                                            @if(!empty($userProfile->profileimage))
                                            <img src="{{url('images/profile_images/'.$userProfile->profileimage)}}" style="height: 82px;width: 89px;">
                                            @endif

                                            @if ($errors->has('profileImage'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('profileImage') }}</strong>
                                                </span>
                                            @endif
                                        </div>  
                                        </div>
                                      </div>                                   

                                        
                                        <button type="submit" name="updateprofile" class="btn btn-primary btn-lg">Conferma</button>                                     
                                    </form>
                                  
                                </div>
                                <!-- <div class="col-md-6"> 

                                           
                                            @if(!empty($userProfile->qr_code))    
                                                  <img src="{{url('/'.$userProfile->qr_code)}}">
                                             @endif 
                                         
                                </div> -->


                                 <!-- <div class="col-md-6"> 

                                  
                                     @if($userProfile->is_profile_complete =='1')    
                                        <a href="{{url('/images/bklic_card.pdf')}}" download title="Bklic Card">
                                            <img src="{{url('/images/bklic_card.jpg')}}" alt="W3Schools" style="width: 409px;  margin-left: 39px; height: 174px;  margin-top: 37px;">
                                         </a>
                                           @endif 
                                </div> -->


                                <!--  <div class="col-md-6"> 

                                    @if($userProfile->is_profile_complete =='1')    
                                      <a href="{{url('/images/bklic_letter.pdf')}}" download title="Comfirmation Letter">
                                         <img src="{{url('/images/bklic_letter.jpg')}}" alt="W3Schools" style="width: 308px;  margin-left: 39px; height: 174px;  margin-top: 37px;">
                                       </a>
                                      @endif 
                                </div> -->
                            
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

</script>


@endsection
