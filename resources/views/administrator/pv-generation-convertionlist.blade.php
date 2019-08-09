@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
      <div class="main-page">



        <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>PV Conversioni</h2>-->                     
                       
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
        <!--  <a href="{{url('administrator/addconvertion')}}" class="btn btn-primary" style="">Aggiungi conversione</a>-->  
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">PV Conversioni</h3>
			  </div>
			  <div class="panel-body">
				<div class="table-responsive">   
            <table class="table user-data-table table-striped table-hover table-green">
             <thead>
                 <tr> 
                    <th>S-No</th>                               
                    <th>Azione</th>
                     <th>PV generati</th>     
                  
                       <th>Azione</th> 
                 </tr>
            </thead>
              <tbody>
                <?php $i='1';?>
                  @foreach($getConvertion as $item)
                   <tr>
                     <th scope="row">{{$i}}</th>                     
                     <td><?php if($item->level=='BK2'){echo 'BK0-BK2';}elseif($item->level=='BK4'){echo 'BK2-BK4';}elseif($item->level=='BK6'){echo 'BK4-BK6';}elseif($item->level=='BK8'){echo 'BK6-BK8';}elseif($item->level=='BK10'){echo 'BK8-BK10';}elseif($item->level=='BK12'){echo 'BK10-BK12';}elseif($item->level=='P'){echo 'President';}elseif($item->level=='PT'){echo 'President Team';}elseif($item->level=='PE'){echo 'President Executive';}elseif($item->level=='AF'){echo 'Affiliazione';}elseif($item->level=='SC'){echo 'Vendita card';}?></td>
                      <td>{{$item->point}}</td>
                      <td> <a class="btn btn-info btn-sm" href="{{url('administrator/edit-pv-generation/'.$item->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                    
                  </tr> 
                  <?php $i++;?>
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