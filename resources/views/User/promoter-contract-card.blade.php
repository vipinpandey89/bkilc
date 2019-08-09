@extends('layouts.profile_dashboard')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Contratti & Card</h2> -->                    
                       
                    </div> 
                  <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Contratti & card</a></li>
                               
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
							<h3 class="panel-title">Contratti & Card</h3>
							</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table user-data-table table-green table-hover table-striped" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Contratti letter</th>
                                            <th>Card</th>   
                                           <!-- <th>Action</th>   -->                                 
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                            $paidAmount=0;
                                        ?>
                                        
                                        <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td>
                                             <!--  <a href="{{url('/images/bklic_letter.pdf')}}" download title="Comfirmation Letter">
                                                 <img src="{{url('/images/bklic_letter.jpg')}}" style="width: 101px; height: 87px;"> 
                                              </a> -->

                                             <a href="{{url('/contract-letter/pdf')}}"  title="Comfirmation Letter">
                                                 <img src="{{url('/images/bklic_letter.jpg')}}" style="width: 101px; height: 87px;"> 
                                              </a> 

                                            </td>
                                             <td>
                                                 <!--  <a href="{{url('/images/bklic_card.pdf')}}" download title="Comfirmation Letter">
                                                     <img src="{{url('/images/bklic_card.jpg')}}" style="width: 101px; height: 87px;"> 
                                                  </a> -->

                                              <a href="{{url('/contract-card/pdf')}}"  title="Comfirmation Letter">
                                                 <img src="{{url('/images/bklic_card.jpg')}}" style="width: 101px; height: 87px;"> 
                                              </a> 
                                            </td>
                                           
                                          
                                        </tr>
                                        <?php 
                                            $i++;
                                        ?>
                                      
                                       
                                      
                                    </tbody>
                                </table>
                            </div>                            
                        </div>

                    </div>
                </div>
            </div>                            
        </div>               
    </div>             <!-- /. PAGE INNER  -->
  </div>


            <!-- Modal -->





@endsection



