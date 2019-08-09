@extends('administrator.layout.admin')

@section('title','UserList')

@section('content')

		<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">					

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

						<div class="form-title">

							<h4>Modifica utente</h4>

						</div>

						<div class="form-body">

							<form method="post" id="demo-form" data-parsley-validate> 



							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Nome e cognome</label> 

								 <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ !empty($userProfile)?$userProfile->name:old('name')}}" placeholder="Name">

								   @if ($errors->has('name'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('name') }}</strong>

                                    </span>

                                @endif

							</div>





							<div class="form-group {{ $errors->has('userName') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Nome utente</label> 

								 <input type="text" class="form-control" id="exampleInputEmail1" name="userName" value="{{ !empty($userProfile)?$userProfile->userName:old('userName')}}" placeholder="Usre Name">



								    @if ($errors->has('userName'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('userName') }}</strong>

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