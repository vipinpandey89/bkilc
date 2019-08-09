@extends('layouts.dashboard')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!---<h2> Utenti card</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="{{url('card-users')}}">Utenti card</a></li>
                               
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
                           <h3 class="panel-title"> UTENTI CARD</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-green" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>                                            
                                            <th>Nome del carrello</th>
                                            <th>Prezzo carta</th>                                            
                                            <th>Data di acquisto della carta</th>
                                            <th>Data di scadenza della carta</th>
                                           

                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                        ?>

                                        @foreach($cardUser as $detail)                                         
                                        <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td>{{$detail->name}}</td>
                                             <td>{{$detail->email}}</td>
                                             <td>{{$detail->product_name}}</td>
                                             <td>&euro;{{$detail->product_price}}</td>
                                             <td>{{date('d-m-Y',strtotime($detail->orderCreate))}}</td>
                                               <td>{{date('d-m-Y',strtotime($detail->orderCreate. " +1 month"))}}</td>

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