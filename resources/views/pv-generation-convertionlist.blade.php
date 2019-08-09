@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">



				<div class="row">
                    <div class="col-md-8 heading">
                     <h2>PV Conversioni</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Conversioni pv</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <hr/>

				<div class="tables">
			  @if (Session::has('success'))
                       <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success') }}</strong>
                        </div>
                @endif
				<!--	<a href="{{url('administrator/addconvertion')}}" class="btn btn-primary" style="">Aggiungi conversione</a>-->					
					<div class="table-responsive bs-example widget-shadow">		
						<table class="table user-data-table">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>                               
						  		  <th>Action</th>
                     <th>PV generated for upline</th>     
						  		
						  	       <th>Azione</th> 
						  	 </tr>
						</thead>
						 	<tbody>
                   <tr>
                     <th scope="row">1</th>                     
                     <td>BK0-BK2</td>
                      <td>10</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                  <tr>
                     <th scope="row">2</th>                     
                     <td>BK2-BK4</td>
                      <td>20</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> <tr>
                     <th scope="row">3</th>                     
                     <td>BK4-BK6</td>
                      <td>30</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                  <tr>
                     <th scope="row">4</th>                     
                     <td>BK6-BK8</td>
                      <td>40</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                  <tr>
                     <th scope="row">5</th>                     
                     <td>BK8-BK10</td>
                      <td>50</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                  <tr>
                     <th scope="row">6</th>                     
                     <td>BK10-BK12</td>
                      <td>60</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 

                   <tr>
                     <th scope="row">7</th>                     
                     <td>President Team</td>
                      <td>70</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                   <tr>
                     <th scope="row">8</th>                     
                     <td>President Executive</td>
                      <td>80</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 


                   <tr>
                     <th scope="row">9</th>                     
                     <td>Affiliation of business</td>
                      <td>90</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 

                   <tr>
                     <th scope="row">10</th>                     
                     <td>sale of digital card</td>
                      <td>100</td>
                      <td> <a class="btn btn-info btn-sm" href="#" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                

						 </tbody>
					 </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->

		@endsection