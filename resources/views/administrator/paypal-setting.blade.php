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
									
					<div class="table-responsive bs-example widget-shadow">
						<h4>Impostazioni PayPal</h4>

					<!--<a href="{{url('administrator/adduser')}}" class="btn btn-primary" style="margin-left: 1427px;margin-bottom: 10px;">Add User</a>		-->			

						<table class="table user-data-table">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Email di lavoro</th>
						  		  <th>Tipo di PayPal</th>
						  		  <th>Azione</th>
						  		  
						  	   	  
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 	
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td>{{$listDetail->business_id}}</td>
							       <td>{{($listDetail->paypal_type=='1')?'SendBox':'Live'}}</td> 
							       <td>					

							  <a class="btn btn-primary btn-sm" href="{{url('administrator/edit-paypal-setting/'.$listDetail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							        </td>
						   		</tr> 
						 </tbody>
					 </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		@endsection