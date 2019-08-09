@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
			  @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
					<a href="{{url('administrator/addcardselleruser')}}" class="btn btn-primary" style="">Aggiungi utente</a>					
					<div class="table-responsive bs-example widget-shadow">
						<h4>Lista utenti</h4>

							

						<table class="table table-bordered">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome e cognome</th>
						  		  <th>Nome utente</th>
						  	 	  <th>Codice di riferimento</th>
						  	  	  <th>Telefono</th>
						  	   	  <th>CAP</th>
						  	      <th>E-mail</th> 
						  	      <th>Crea data</th> 
						  	       <th>Azione</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($userDetail as $user)
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td>{{$user->name}}</td>
							       <td>{{$user->userName}}</td> 
							       <td>{{$user->referralCode}}</td> 
							       <td>{{$user->telephoneNumber}}</td> 
							       <td>{{$user->postalCode}}</td> 
							       <td>{{$user->email}}</td> 
							       <td>{{date('d-m-Y',strtotime($user->created_at))}}</td>
							        <td>
							        	
							        	<a href="{{url('administrator/editcardselleruser/'.$user->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							        	<a href="{{url('administrator/deletecardselleruser/'.$user->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							        	@if($user->status=='0')
							        	<a href="{{url('administrator/blockcardselleruser/'.$user->id)}}" title="Sbloccare" onclick="return confirm('Sei sicuro di voler sbloccare questo utente')" style=" color: red;"><i class="fa fa-ban" aria-hidden="true"></i></a>
							        	@else
							        	<a href="{{url('administrator/blockcardselleruser/'.$user->id)}}" title="Bloccare" onclick="return confirm('Sei sicuro di voler bloccare questo utente')"><i class="fa fa-ban" aria-hidden="true"></i></a>
							        	@endif

							        </td>
						   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach

						 </tbody>
					 </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		@endsection