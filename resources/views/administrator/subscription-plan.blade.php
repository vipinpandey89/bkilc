@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista Piani di abbonamento</h2>-->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">Affiliati</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Piano</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

				<div class="tables">
			  @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
                 @if (Session::has('error'))
                       <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('error') }}</strong>
                        </div>
                @endif
					<!--<a href="{{url('administrator/addsubscriptionplan')}}" class="btn btn-primary">Aggiungi piano di abbonamento</a>-->
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Lista Piani di abbonamento</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
						<table class="table user-data-table table-striped table-hover table-green">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome dell'abbonamento</th>
								  <th>Durata (Mesi)</th>
						  		  <th>Prezzo di abbonamento</th>								 
								  <th>Azione</th>
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i='1';?>
						 		@foreach($SubscriptionPlan as $item)
						 		<?php ?>
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td>{{$item->subscription_name}}</td>
								   <td>12</td>
							       <td>{{$item->subscription_price}}</td> 							       
								  
								   <td>
								   <a class="btn btn-info btn-sm" href="{{url('administrator/editsubscriptionplan/'.$item->plan_id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							      <!--<a class="btn btn-danger btn-sm" href="{{url('administrator/deletesubscriptionplan/'.$item->plan_id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->

							       </td>
						   		</tr> 
						   		<?php $i++;?>
						   	@endforeach	
						   		
                               
						 </tbody>
					 </table> 
				
					</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		
		

		<!--footer-->
		@endsection