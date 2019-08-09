@extends('administrator.layout.admin')

@section('title','UserList')

@section('content')

		<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">					

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

						<div class="form-title">

							<h4>Impostazione di modifica Paypal</h4>

						</div>

						<div class="form-body">

							<form method="post" id="demo-form" data-parsley-validate> 



							<div class="form-group {{ $errors->has('business_id') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Email Di Lavoro</label> 

								 <input type="text" class="form-control" id="exampleInputEmail1" name="business_id" value="{{ !empty($getDetail)?$getDetail->business_id:old('business_id')}}" placeholder="Email Di Lavoro">

								   @if ($errors->has('business_id'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('business_id') }}</strong>

                                    </span>

                                @endif

							</div>

								



							<div class="form-group {{ $errors->has('paypal_type') ? ' has-error' : '' }}">

								 <label for="exampleInputEmail1">Tipo Di PayPal</label> 

										<select  class="form-control" id="exampleInputEmail1" name="paypal_type">

											<option value="">Seleziona Dettaglio</option>

											<option value="1"{{($getDetail->paypal_type=='1')?'selected':''}}>SendBox</option>

											<option value="2"{{($getDetail->paypal_type=='2')?'selected':''}}>Live</option>

										</select>



								    @if ($errors->has('paypal_type'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('paypal_type') }}</strong>

                                    </span>

                                @endif



							</div>



								  {{ csrf_field() }}



							  <button type="submit" name="editbutton" class="btn btn-default">Salva</button> 

							</form> 

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