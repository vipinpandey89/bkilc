@extends('administrator.layout.admin')

@section('title','UserList')

@section('content')

		<div id="page-wrapper">

			<div class="main-page">

				<div class="forms">					

					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 

						<div class="form-title">

							<h4>Gestione del Promotore degli Affiliati</h4>

						</div>

						<div class="form-body">

							<form method="post" id="demo-form" data-parsley-validate> 

							<input type="hidden" value="{{$affid}}" name="aff_id" />
							<div class="form-group {{ $errors->has('promotor') ? ' has-error' : '' }}">

								 <label for="promotor">Select Promotor</label>

								 <select class="form-control" name="promotor">

								 	<option value="">Select Promotor</option>
									@foreach($allPromotors as $allPromotorsVal)
									<option value="{{$allPromotorsVal->id}}" >{{$allPromotorsVal->name}}</option>
									@endforeach
									
									
									

								 </select> 

										



								  @if ($errors->has('promotor'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('promotor') }}</strong>

                                    </span>

                                @endif



							</div>
							
							



								  {{ csrf_field() }}



							  <button type="submit" name="addbutton" class="btn btn-default">Aggiornare</button> 

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