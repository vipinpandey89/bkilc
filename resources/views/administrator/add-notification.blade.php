@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <h2> Imposta promemoria</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="{{url('administrator/set-notification')}}">Notifiche</a></li>

                                 <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Imposta promemoria</a></li>
                              
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
           <hr/>

				<div class="forms">					
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						
						<div class="form-body">
							<form action="#" method="post" enctype="multipart/form-data" > 
                             {{ csrf_field() }}


							<div class="form-group {{ $errors->has('type_notification') ? ' has-error' : '' }}">
								 <label for="type_notification">Tipo di notifica</label> 
								 <select class="form-control" id="type_notification" name="type_notification">
								 		<option value="">Selezionare</option>
								 		<option value="1">Upgrade</option>
								 		<option value="2">Expiration Card</option>							 		

								 </select>
								
								 @if ($errors->has('type_notification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_notification') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('date_of_month') ? ' has-error' : '' }}">
								 <label for="date_of_month">Data</label> 

								<!-- <div id="timeappend"></div>	
								 <input type="date" class="form-control" id="date" name="date" placeholder="Nome Utente">

								 <input type="hidden" name="notification_date[]" id="n_date" value="">-->
								  <select class="form-control" id="date_of_month" name="date_of_month[]"  multiple="multiple">
								 	
								 		<option value="30">30</option>
								 		<option value="20">20</option>
								 		<option value="10">10</option>
								 		<option value="5">5</option>
								 		<option value="4">4</option>
								 		<option value="3">3</option>
								 		<option value="2">2</option>
								 		<option value="1">1</option>
								 								 		

								 </select>


								  @if ($errors->has('date_of_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_of_month') }}</strong>
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