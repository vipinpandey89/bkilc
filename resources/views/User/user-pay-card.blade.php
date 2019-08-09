@extends('layouts.dashboard')

@section('content')
 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <h2>Dettagli ordine</h2>                     
                       
                    </div> 

                        <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Dettagli ordine</a></li>
                               
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
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                
                            </div>

                            <div class="table-responsive">
                                <table class="table user-data-table" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Nome</th>
                                            <th>Nome del carrello</th>
                                            <th>Prezzo del carrello</th>                                             
                                            <th>Txn Id</th>                                           
                                            <th>Data di acquisto della carta</th>
                                             <th>Data di scadenza della carta</th>
                                             <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                            $paidAmount=0;
                                        ?>

                                        @foreach($SelectUserOrder as $detail)
                                            <?php $paidAmount= $paidAmount+$detail->paidAmount;?>
                                         <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td>{{$detail->userName}}</td>
                                            <td>{{$detail->product_name}}</td>
                                             <td>&euro;{{$detail->product_price}}</td>
                                            <td>#{{$detail->txn_id}}</td>                                          
                                           <td>{{date('d-m-Y',strtotime($detail->created_at))}}</td>
                                              <td>{{date('d-m-Y',strtotime($detail->created_at. " +1 month"))}}</td>

                                            <td><a href="{{url('invoice-detail/'.$detail->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>

                                          
                                          
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


@endsection
