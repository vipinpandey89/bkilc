@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">



				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Conversioni</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Conversioni</a></li>
                               
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
				<!--	<a href="{{url('administrator/addconvertion')}}" class="btn btn-primary" style="">Aggiungi conversione</a>-->
					
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Conversioni</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
												

						<table class="table user-data-table table-striped table-hover table-green">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>                               
						  		  <th>Conversione</th>
                     <th>PV</th>      
						  		  <th>Euro</th>		  	 	 
						  	  	 			  	   	  
						  	       <th>Azione</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		

                  <?php $i=1; ?>
                @foreach($getConvertion as $user)
                   <tr>
                     <th scope="row">{{$i}}</th>
                     
                     <td><?php  if($user->convertion_title=='2'){echo 'BK0 conversione';}elseif($user->convertion_title=='3'){echo 'BK2 conversione';}elseif($user->convertion_title=='4'){echo 'BK4 conversione';}elseif($user->convertion_title=='5'){echo 'BK6 conversione';}elseif($user->convertion_title=='6'){echo 'BK8 conversione';}elseif($user->convertion_title=='7'){echo 'BK10 conversione';}elseif($user->convertion_title=='8'){echo 'BK12 conversione';}elseif($user->convertion_title=='9'){echo 'P conversione'; }elseif($user->convertion_title=='10'){echo 'PT conversione'; }elseif($user->convertion_title=='11'){echo 'PE conversione'; } ?></td>

                      <td>{{$user->convertion_pv}}</td> 

                     <td> &euro;{{$user->convertion_euro}}</td> 
                 
                    
                   
                          <td>
                        
                        <a class="btn btn-info btn-sm" href="{{url('administrator/edit-convertion/'.$user->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                       <!-- <a class="btn btn-danger btn-sm" href="{{url('administrator/deleteconvertion/'.$user->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler cancellare questo ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                       

                      </td>
                  </tr> 
                  <?php $i++; ?>
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