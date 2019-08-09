@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Modifica utente</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="{{url('administrator/userlist')}}">Lista</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica utente</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form method="post" id="demo-form" data-parsley-validate> 

							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Nome</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ !empty($userProfile)?$userProfile->name:old('name')}}" placeholder="Name" maxlength="30">
								   @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('userName') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Cognome</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="userName" value="{{ !empty($userProfile)?$userProfile->userName:old('userName')}}" placeholder="Usre Name" maxlength="30">

								    @if ($errors->has('userName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userName') }}</strong>
                                    </span>
                                @endif

							</div>

							<div class="form-group{{ $errors->has('referralCode') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Codice di riferimento</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="referralCode" value="{{ !empty($userProfile)?$userProfile->referralCode:old('referralCode')}}" readonly="" placeholder="ReferralCode">

								  @if ($errors->has('referralCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('referralCode') }}</strong>
                                    </span>
                                @endif

							</div>

							<div class="form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">Telefono</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="telephoneNumber"  value="{{ !empty($userProfile)?$userProfile->telephoneNumber:old('telephoneNumber')}}" placeholder="Telephone Number">

								  @if ($errors->has('telephoneNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephoneNumber') }}</strong>
                                    </span>
                                @endif

							</div>

							<div class="form-group{{ $errors->has('postalCode') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">CAP</label> 
								 <input type="text" class="form-control" id="exampleInputEmail1" name="postalCode" value="{{ !empty($userProfile)?$userProfile->postalCode:old('postalCode')}}" placeholder="Postal Code">

								    @if ($errors->has('postalCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postalCode') }}</strong>
                                    </span>
                                @endif

							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								 <label for="exampleInputEmail1">E-mail</label> 
								 <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{!empty($userProfile)?$userProfile->email:''}}" readonly="" placeholder="E-Mail Address">
							</div>
								  {{ csrf_field() }}

							  <button type="submit" name="editbutton" class="btn btn-default">Salva</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>

<!--<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })

});

</script>	-->	
		@endsection