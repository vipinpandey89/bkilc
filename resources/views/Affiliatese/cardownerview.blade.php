@extends('Affiliatese.dashboard')

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
									
					<div class="table-responsive bs-example widget-shadow">
						<h4>Visualizza il proprietario della scheda</h4>

					<!--<a href="{{url('addDealerPost')}}" class="btn btn-primary" style="display:ruby-text">Aggiungi post</a>	-->	
					
				<table class="table">
					
					<tbody>
						  <tr><td>Nome</td><td>{{!empty($cardownersdetail)?$cardownersdetail->name:old('name')}}</td></tr>
						  <tr><td>Telefono</td><td>{{!empty($cardownersdetail)?$cardownersdetail->telephoneNumber:old('telephoneNumber')}}</td></tr>
						  <tr><td>Codice postale</td><td>{{!empty($cardownersdetail)?$cardownersdetail->postalCode:old('postalCode')}}</td></tr>
						 <tr><td>E-mail</td><td>{{!empty($cardownersdetail)?$cardownersdetail->email:old('email')}}</td></tr>
						 <tr><td>Data di nascita</td><td>{{!empty($cardownersdetail)?$cardownersdetail->dob:old('dob')}}</td></tr>
						 <tr><td>Regione</td><td>{{!empty($cardownersdetail)?$cardownersdetail->region:old('region')}}</td></tr>
						 <tr><td>Streat</td><td>{{!empty($cardownersdetail)?$cardownersdetail->streat:old('streat')}}</td></tr>
					  </tr>
					</tbody>
				  </table>
						
						 
						
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		@endsection