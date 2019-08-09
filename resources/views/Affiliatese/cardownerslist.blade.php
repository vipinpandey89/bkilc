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
						<h4>Elenco dei proprietari di carte</h4>

					<!--<a href="{{url('addDealerPost')}}" class="btn btn-primary" style="display:ruby-text">Aggiungi post</a>	-->	

						<table class="table table-bordered">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome</th>
						  		  <th>E-mail identificativo utente</th>
								  <th>Azione</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($cardowners as $Detail)
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td>{{$Detail->name}}</td>
							       <!--<td>{{$Detail->iva}}</td>
							       <td>{{$Detail->vat_code}}</td>
							       <td>{{$Detail->discount_amount}}</td>
							       <td>{{$Detail->category}}</td>
							       <td>{{$Detail->sub_category}}</td>-->
							     					       
							       <td>{{$Detail->email}}</td>
							        <td>
									<a href="{{url('viewcardowner/'.$Detail->id)}}"  title="vista"><i class="fa fa-eye" aria-hidden="true"></i></a>
				

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