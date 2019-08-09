@extends('layouts.dashboard')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Fattura</h2>                     
                       
                    </div> 
                </div>
                 <!-- /. ROW  -->
                 <hr/>

                    @if (Session::has('success'))
                           <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong>{{Session::get('success') }}</strong>
                            </div>
                       @endif
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                           


                                <div class="container">
                                  <div class="card">
                                <div class="card-header">
                                Fattura

                                </div>
                                <div class="card-body">                                
                                <div class="table-responsive-sm">
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                <th class="center">Id</th>
                                <th>Name</th>
                                <th>User Name</th>

                                <th class="right">Email Id</th>
                                  <th class="center">Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                
                                @if(!empty($notifications))
									
								
							
                                <tr>
                                <td class="center">#{{$notifications->id}}</td>
                                <td class="left">{{$notifications->name}}</td>
                                <td class="left">{{$notifications->userName}}</td>

                                <td class="right">&euro;{{$notifications->email}}</td>
                                  <td class="center">{{$notifications->message}}</td>
                                </tr>
									
								@endif	
                                </tbody>
                                </table>
                                </div>
                                

                                </div>
                                </div>
                                </div>

                        </div>
                    </div>                  
                </div>
            </div>
                            
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
    
@endsection