@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<div id="page-wrapper">
			<div class="main-page">

					<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista Livello</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Piano marketing</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>

	<!--	<div class="tables">
			  @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif									
					<div class="table-responsive bs-example widget-shadow">					

						

					<table class="table user-data-table">
						 <thead>
						  	 <tr> 
						  		  <th>livello</th>
						  		  <th>Percentuale</th>
						  		  <th>Azione</th>
						  	   	  
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($listDetail as $detail)
							   		 <tr>							      
								       <td>{{$detail->level_name}}</td>
								       <td>{{$detail->level_percentage}} %</td> 
								       <td>							        	
								          <a class="btn btn-primary btn-sm" href="{{url('administrator/editlevel/'.$detail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								        </td>
							   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach
						 </tbody>
					 </table> 
					</div>
				</div> -->
				<!-------------------- changes ----------------------->
				<div class="tables">
			    @if (Session::has('success'))
	               <div class="alert alert-success alert-block">
	                    <button type="button" class="close" data-dismiss="alert">×</button> 
	                        <strong>{{Session::get('success') }}</strong>
	                </div>
                @endif
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Lista Livello</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
						<table class="table user-data-table table-striped table-hover table-green">
						 <thead>
						  	 <tr> 
						  		  <th>livelli</th>
						  		  <th>BK0</th>
						  		  <th>BK2-BK12</th>
								  <th>President</th>
						  		  <th>President Team</th>
								  <th>President Executive</th>	
								   <th>Azione</th>					  	   	  
						  	 </tr>
						</thead>
						 	<tbody>
						 		<?php 
								$i=1; 
								 $p_commission=  $listDetail[12]->level_percentage;
								 $pt_commission= $listDetail[13]->level_percentage;
								 $pe_commission= $listDetail[14]->level_percentage;
								 $bk0levelCommission= $listDetail[15]->level_percentage;
						 		 foreach($listDetail as $detail){
									 if($i >12)
									 {
										 break;
									 }
								 ?>
						   		 <tr>
							       
							       <td><?php echo $i; ?></td>
							       <td><?php if($i==1){ echo ($bk0levelCommission).'%'; } else { echo ''; } ?></td>
								   <td>{{$detail->level_percentage}} %</td> 
								   <td>{{$detail->level_percentage + $p_commission}} %</td> 
								   <td>{{$detail->level_percentage + $pt_commission}} %</td> 
								   <td>{{$detail->level_percentage + $pe_commission}} %</td> 
								   <td>							        	
								          <a class="btn btn-primary btn-sm" href="{{url('administrator/editlevel/'.$detail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								   </td>
						   		</tr> 
								 <?php $i++;	
								 }
                                ?>
						   		

						 </tbody>
					 </table> 
					</div>
					  </div>
					</div>
				</div>
				<!---------------------end------------------------->
			</div>
		</div>
@endsection