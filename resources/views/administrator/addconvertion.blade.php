@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Aggiungi conversione</h4>
						</div>
						<div class="form-body">
							<form action="#" method="post" enctype="multipart/form-data" > 
                             {{ csrf_field() }}
							<div class="form-group {{ $errors->has('pv_type') ? ' has-error' : '' }}">
								 <label for="pv_type">conversione</label>
								 <select class="form-control" name="pv_type">
								 	<option value="">Select Type</option>
								 	<option value="1">Digital Card conversione</option>
								 	<option value="2">Affiliate Shop conversione</option>
								 	<option value="3">BK2 conversione</option>
								 	<option value="4">BK4 conversione</option>
								 	<option value="5">BK6 conversione</option>
								 	<option value="6">BK8 conversione</option>
								 	<option value="7">BK10 conversione</option>
								 	<option value="8">BK12 conversione</option>

								 </select> 								
								 @if ($errors->has('pv_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pv_type') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('euros') ? ' has-error' : '' }}">
								 <label for="euros">Euros</label> 
								 <input type="text" class="form-control" id="euros" name="euros" placeholder="Euros">

								  @if ($errors->has('euros'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('euros') }}</strong>
                                    </span>
                                @endif
							</div>

							<!--<div class="form-group">
								 <label for="refralcode">Codice Di Riferimento</label> 
								 <input type="text" class="form-control" id="refralcode" name="refralcode" placeholder="Codice Di Riferimento">
							</div>-->

							<div class="form-group {{ $errors->has('point') ? ' has-error' : '' }}">
								 <label for="point">PV</label> 
								 <input type="text" class="form-control" id="point" name="point" placeholder="PV">

								 @if ($errors->has('point'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('point') }}</strong>
                                    </span>
                                @endif
							</div>

							  <button type="submit" class="btn btn-default" name="addbutton">Sottoscrivi</button> </form> 
						</div>
					</div>											
				</div>
			</div>
		</div>
		@endsection