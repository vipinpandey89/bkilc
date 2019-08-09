@extends('layouts.dashboard')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>Commissione del venditore</h2>-->                     
                       
                    </div> 
                     <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Commission del venditore</a></li>
                               
                            </ul>
                        </div>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                         
							<h3 class="panel-title">Commissione del venditore</h3>
						   
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-green" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Nome</th>
                                             <th>E-mail</th>                                            
                                            <th>P.V. della commissione</th>
                                            <th>Livello della Commissione</th>
                                            <th>Data della Commissione</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                        ?>

                                        @foreach($CommissionUser as $detail)                                         
                                        <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td>{{$detail->name}}</td>
                                             <td>{{$detail->email}}</td>
                                             <td>{{$detail->commission_point}}</td>
                                             <td>{{!empty($detail->commission_level) ? 'Livello '.$detail->commission_level:'level upgrade '}}</td>
                                             <td>{{date('d-m-Y',strtotime($detail->commissioncreate))}}</td>
                                        </tr>
                                        <?php 
                                            $i++;
                                        ?>
                                       @endforeach
                                       
                                      
                                    </tbody>
                                </table>
                            </div>                            
                        </div>

                    </div>


                  
                </div>
            </div>
                            
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
@endsection