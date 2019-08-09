@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2>Modifica del livello</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                             <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="{{url('administrator/minimum-value-point')}}">Gestione Pv</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica del livello</a></li>
                               
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

							<div class="form-group {{ $errors->has('level_name') ? ' has-error' : '' }}">
								 <label for="level_name">Livello</label> 
								 <input type="text" class="form-control" id="level_name" name="level_name" value="{{ !empty($levelDetail)?$levelDetail->step:old('level_name')}}" placeholder="Livello" readonly="">
								   @if ($errors->has('level_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level_name') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('percentage') ? ' has-error' : '' }}">
								 <label for="percentage">Generazione minima PV</label> 
										<input type="text" class="form-control" id="percentage" name="percentage" value="{{ !empty($levelDetail)?$levelDetail->point:old('percentage')}}" placeholder="Generazione minima PV">

								    @if ($errors->has('percentage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('percentage') }}</strong>
                                    </span>
                                @endif

							</div>


							<div class="form-group {{ $errors->has('upgrade_point') ? ' has-error' : '' }}">
								 <label for="upgrade_point">Costo Upgrade(Euro)</label> 
										<input type="text" class="form-control" id="upgrade_point" name="upgrade_point" value="{{ !empty($levelDetail)?$levelDetail->level_upgrade_point:old('upgrade_point')}}" placeholder="Costo Upgrade(Euro)">

								    @if ($errors->has('upgrade_point'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('upgrade_point') }}</strong>
                                    </span>
                                @endif

							</div>

								<div class="form-group {{ $errors->has('level_downling') ? ' has-error' : '' }}">
								 <label for="level_downling">Bkx In 1° linea per upgrade</label> 
										<input type="text" class="form-control" id="level_downling" name="level_downling" value="{{ !empty($levelDetail)?$levelDetail->level_downline:old('level_downling')}}" placeholder="Bkx In 1° linea per upgrade">

								    @if ($errors->has('level_downling'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level_downling') }}</strong>
                                    </span>
                                @endif

							 </div>


                            <div class="form-group {{ $errors->has('renuwal_point') ? ' has-error' : '' }}">
                                 <label for="renuwal_point">   Costo rinnovo  (After 12 Mesi)​</label> 
                                        <input type="text" class="form-control" id="renuwal_point" name="renuwal_point" value="{{ !empty($levelDetail)?$levelDetail->renuwal_account:old('renuwal_point')}}" placeholder="Costo rinnovo (After 12 Mesi)​">

                                    @if ($errors->has('renuwal_point'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('renuwal_point') }}</strong>
                                    </span>
                                @endif

                             </div>


                              <div class="form-group {{ $errors->has('become_founder') ? ' has-error' : '' }}">
                                 <label for="become_founder">Founder Costo(Euro)</label> 
                                        <input type="text" class="form-control" id="become_founder" name="become_founder" value="{{ !empty($levelDetail)?$levelDetail->become_founder_euro:old('become_founder')}}" placeholder="Become a founder(Euro)">

                                    @if ($errors->has('become_founder'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('become_founder') }}</strong>
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