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
						<h4>Elenco dei messaggi</h4>

					<a href="{{url('addDealerPost')}}" class="btn btn-primary" style="display:ruby-text">Aggiungi post</a>		

						<table class="table table-bordered">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Titolo</th>
						  		  <th>Aggiornato a</th>
						  	      <!--<th>IVA</th>
						  	      <th>Codice Iva</th>
						  	      <th>Aggiornato a</th>
						  	      <th>Ammontare di sconto</th>
						  	      <th>Categoria</th>
						  	      <th>Sottocategoria</th>-->
						  	       <th>Azione</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($getPostDetail as $Detail)
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td>{{$Detail->title}}</td>
							       <!--<td>{{$Detail->iva}}</td>
							       <td>{{$Detail->vat_code}}</td>
							       <td>{{$Detail->discount_amount}}</td>
							       <td>{{$Detail->category}}</td>
							       <td>{{$Detail->sub_category}}</td>-->
							     					       
							       <td>{{date('d-m-Y',strtotime($Detail->created_at))}}</td>
							        <td>
							        	
							       <a href="{{url('editdealerpost/'.$Detail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							       <!--<a href="{{url('deletedealerpost/'.$Detail->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
							        	

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