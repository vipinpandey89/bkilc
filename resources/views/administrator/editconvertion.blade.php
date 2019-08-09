@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <h2> modificare conversione</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="{{url('administrator/convertion')}}">Conversioni</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">modificare conversione</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form  method="post" enctype="multipart/form-data" > 
                             {{ csrf_field() }}
							<!--<div class="form-group {{ $errors->has('pv_type') ? ' has-error' : '' }}">
								 <label for="pv_type">conversione</label>
								 <select class="form-control" name="pv_type">
								 	<option value="">Select Type</option>
								 	<option value="1" {{($getConvertionById->convertion_title=='1')?'selected':''}}>Digital Card conversione</option>
								 	<option value="2" {{($getConvertionById->convertion_title=='2')?'selected':''}}>Affiliate Shop conversione</option>
								 	<option value="3" {{($getConvertionById->convertion_title=='3')?'selected':''}}>BK2 conversione</option>
								 	<option value="4" {{($getConvertionById->convertion_title=='4')?'selected':''}}>BK4 conversione</option>
								 	<option value="5" {{($getConvertionById->convertion_title=='5')?'selected':''}}>BK6 conversione</option>
								 	<option value="6" {{($getConvertionById->convertion_title=='6')?'selected':''}}>BK8 conversione</option>
								 	<option value="7" {{($getConvertionById->convertion_title=='7')?'selected':''}}>BK10 conversione</option>
								 	<option value="8" {{($getConvertionById->convertion_title=='8')?'selected':''}}>BK12 conversione</option>

								 </select> 								
								 @if ($errors->has('pv_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pv_type') }}</strong>
                                    </span>
                                @endif
							</div>-->


							<div class="form-group {{ $errors->has('euros') ? ' has-error' : '' }}">
								 <label for="euros">Euro</label> 
								 <input type="text" class="form-control" id="euros" disabled="" value="{{!empty($getConvertionById)?$getConvertionById->convertion_euro:''}}" name="euros" placeholder="Euros">

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
								 <input type="text" class="form-control" id="point" name="point" value="{{!empty($getConvertionById)?$getConvertionById->convertion_pv:''}}" placeholder="PV">

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