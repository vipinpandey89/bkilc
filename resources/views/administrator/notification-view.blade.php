@extends('administrator.layout.admin')

@section('content')
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                      <div class="col-md-8 heading">
                     <h2> NOTIFICA</h2>                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('/administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="{{url('promoter-affiliati')}}">Notifica</a></li>
                               
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
                    <div class="panel panel-default">                       
                        <div class="panel-body">
                            <div class="row">                                
                            </div>
                            <div class="table-responsive">
                                <table class="table user-data-table" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No</th>
                                            <th>Foto</th>
                                            <th>Nome</th>
                                             <th>E-mail</th> 
                                            <th>Messaggio</th>
                                             <th>Tipo di utente</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i='1';?>
                                        @foreach($notifications as $detail)
                                           
                                        <tr class="odd gradeX">
                                            <td>{{$i}}</td>
                                            <td><div class="user-avatar"><a class="chlid" data-id="{{$detail->id}}">
                                                <?php  if(!empty($detail->profileimage)){?>
                                               <img src="{{url('images/profile_images/'.$detail->profileimage)}}">
                                                      <?php }else{?>
                                                   <img src="{{url('front/assets/img/find_user.png')}}">
                                                 <?php } ?>
                                                   

                                              </a></div> </td>
                                            <td>{{$detail->name}}</td>
                                             <td>{{$detail->email}}</td> 
                                             <td>{{$detail->message}}</td>
                      <td><?php if($detail->role_type=='2'){echo 'Promoter';}elseif($detail->role_type=='3'){echo 'Card Buyer';}elseif($detail->role_type=='4'){echo 'Affiliate';}?></td>  
                                          
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
</div>






@endsection



