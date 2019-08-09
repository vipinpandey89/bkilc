@extends('layouts.dashboard')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <h2>Fattura</h2>                     
                       
                    </div>
                    <!-- <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="{{url('card-users')}}">Utenti card</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Fattura</a></li>
                               
                            </ul>
                        </div>
                    </div>-->

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
                                <strong>{{date('d-m-Y',strtotime($InvoiceDetail->created_at))}}</strong> 
                                  <span class="float-right"> <strong>Status:</strong> {{$InvoiceDetail->status}}</span>

                                </div>
                                <div class="card-body">                                
                                <div class="table-responsive-sm">
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                <th class="center">Txn Id</th>
                                <th>Articolo</th>
                                <th>Descrizione</th>

                                <th class="right">Costo unitario</th>
                                  <th class="center">Qty</th>
                                <th class="right">Totale</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                
                                
                                <tr>
                                <td class="center">#{{$InvoiceDetail->txn_id}}</td>
                                <td class="left">{{$InvoiceDetail->product_name}}</td>
                                <td class="left">1 Month subcription</td>

                                <td class="right">&euro;{{$InvoiceDetail->product_price}}</td>
                                  <td class="center">1</td>
                                <td class="right">&euro;{{$InvoiceDetail->product_price}}</td>
                                </tr>

                                </tbody>
                                </table>
                                </div>
                                <div class="row">
                                <div class="col-lg-8 col-sm-5">

                                </div>

                                <div class="col-lg-3 col-sm-5 ml-auto">
                                <table class="table table-clear">
                                <tbody>
                                <tr>
                                <!--<td class="left">
                                <strong>Subtotal</strong>
                                </td>
                                <td class="right">$8.497,00</td>
                                </tr>
                                <tr>
                                <td class="left">
                                <strong>Discount (20%)</strong>
                                </td>
                                <td class="right">$1,699,40</td>
                                </tr>
                                <tr>
                                <td class="left">
                                 <strong>VAT (10%)</strong>
                                </td>
                                <td class="right">$679,76</td>
                                </tr>-->
                                <tr>
                                <td class="left">
                                <strong>Totale</strong>
                                </td>
                                <td class="right">
                                <strong>&euro;{{$InvoiceDetail->product_price}}</strong>
                                </td>
                                </tr>
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
               
    </div>
             <!-- /. PAGE INNER  -->
    
@endsection