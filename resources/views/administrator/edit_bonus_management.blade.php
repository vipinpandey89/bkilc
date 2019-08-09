@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

				 <div class="row">
                    <div class="col-md-8 heading">
                     <h2>Modifica percentuale</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Portafoglio</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="{{url('administrator/bonus-management')}}">Gestione Bonus</a></li>

                                 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Modifica percentuale</a></li>
                               
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

							<div class="form-group {{ $errors->has('percentage') ? ' has-error' : '' }}">
								 <label for="percentage">Percentuale di profitto</label> 
								 <input type="text" class="form-control" id="percentage" name="percentage" value="{{ !empty($bonus)?$bonus->promoter_percentage:old('percentage')}}" placeholder="Percentuale di profitto" maxlength="30">
								   @if ($errors->has('percentage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('percentage') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
								 <label for="amount">Ammontare</label> 
								 <input type="text" class="form-control" id="amount" name="amount" value="{{ !empty($bonus)?$bonus->bklic_profit:old('amount')}}" placeholder="Ammontare" maxlength="30">

								    @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif

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