@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')
		<div id="page-wrapper">
			<div class="main-page">



       	 <div class="row">
                    <div class="col-md-8 heading">
                     <h2> Aggiungi utente</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Utenti card</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a  href="{{url('administrator/cardsellerusers')}}">Lista</a></li>

                                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Aggiungi utente</a></li>
                               
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
							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
								 <label for="name">Nome</label> 
								 <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
								 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>


							<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
								 <label for="username">Nome Utente</label> 
								 <input type="text" class="form-control" id="username" name="username" placeholder="Nome Utente">

								  @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
							</div>

							<!--<div class="form-group">
								 <label for="refralcode">Codice Di Riferimento</label> 
								 <input type="text" class="form-control" id="refralcode" name="refralcode" placeholder="Codice Di Riferimento">
							</div>-->

							<div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
								 <label for="telephone">Numero Di Telefono</label> 
								 <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Numero Di Telefono">

								 @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('postalcode') ? ' has-error' : '' }}">
								 <label for="postalcode">Codice Postale</label> 
								 <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="Codice Postale">
								 @if ($errors->has('postalcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postalcode') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								 <label for="email">Indirizzo Email</label> 
								 <input type="email" class="form-control" id="email" name="email" placeholder="Indirizzo Email">
								 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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