@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

<style>
  .switch {
  position: relative;
  display: inline-block;
  width: 70px;
  height: 33px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #cecece;
  -webkit-transition: .4s;
  transition: .4s;
   border-radius: 34px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(37px);
}

/*------ ADDED CSS ---------*/
.slider:after
{
 /*content:'OFF';*/
 color: white;
 display: block;
 position: absolute;
 transform: translate(-50%,-50%);
 top: 50%;
 left: 50%;
 font-size: 10px;
 font-family: Verdana, sans-serif;
}

input:checked + .slider:after
{  
  /*content:'ON';*/
}
</style>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Gestione PV</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">promoter</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Gestione pacchetti</a></li>
                               
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
									
				<!--	<div class="table-responsive bs-example widget-shadow">
						<table class="table user-data-table">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>livello</th>
						  		  <th>Livello mensile PV</th>
						  		  <th>Livello di aggiornamento PV</th>
						  		   <th>Level downline</th>
						  		  <th>Azione</th>
						  		  
						  	   	  
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($listDetail as $detail)
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td>{{$detail->step}}</td>
							       <td>{{$detail->point}} </td> 
							        <td>{{$detail->level_upgrade_point}} </td>
							         <td>{{$detail->level_downline}} </td>
							       <td>
							       		<a class="btn btn-primary btn-sm" href="{{url('administrator/edit-value-point/'.$detail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							       </td>

						   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach

						 </tbody>
					 </table> 
					</div> -->
				 <!--------------------------------------Start New Table --------------------->
				 <div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Gestione PV</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
						<table class="table user-data-table table-striped table-hover table-green">
						 <thead>
						  	 <tr> 
						  		  <th>livello</th>
						  		  <th>Bkx in 1° linea per upgrade</th>
						  		  <th>Costo Upgrade( euro )</th>
						  		  <th>Costo rinnovo (12 Mesi)​</th>
						  		  <th>Profondità</th>
								  <th>Generazione minima PV</th>
								  <th>accessibile da</th>
								  <th>Founder Costo ( Euro )</th>
								   <th>Founder</th>
								  <th>Azione</th>
						  		  
						  	   	  
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($listDetail as $detail)
						   		 <tr>
							       <td>{{$detail->step}}</td>
							       <td>{{$detail->level_downline}} </td>
							       <td>{{$detail->level_upgrade_point}} </td>
							      <td>{{$detail->renuwal_account}} </td>

								    <td><?php if($i=='1'){echo '0';}elseif($i=='2'){echo '2';}elseif($i=='3'){echo '4';}elseif($i=='4'){echo '6';}elseif($i=='5'){echo '8';}
								  elseif($i=='6'){echo '10';}elseif($i=='7'){echo '12';}elseif($i=='8'){echo '12';}elseif($i=='9'){echo '12';}elseif($i=='10'){echo '12';}?></td>

								   <td>{{$detail->point}} </td> 

								  <td><?php if($i=='1'){echo '0';}elseif($i=='2'){echo 'BK0';}elseif($i=='3'){echo 'BK2';}elseif($i=='4'){echo 'BK4';}elseif($i=='5'){echo 'BK6';}
								  elseif($i=='6'){echo 'BK8';}elseif($i=='7'){echo 'BK10';}elseif($i=='8'){echo 'BK12';}elseif($i=='9'){echo 'President';}elseif($i=='10'){echo 'President Team';}?></td>

								   <td>{{!empty($detail->become_founder_euro)?$detail->become_founder_euro:'0'}} </td>

								     <td>
					                        <label class="switch"><input type="checkbox" id="togBtn" data-id="{{$detail->id}}" name="founder" value="" {{($detail->level_founder_status=='1')?'checked':''}}><div class="slider round"></div></label>

                     				 </td>

								   <td>
							       		<a class="btn btn-primary btn-sm" href="{{url('administrator/edit-value-point/'.$detail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							       </td>


						   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach

						 </tbody>
					 </table> 
					</div>
				  
				  </div>
				</div>
				 	
                <!---------------------------------------End New Table------------------------>   				 
					
					
				</div>
			</div>
		</div>
		<!--footer-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


  $('input[type="checkbox"]').click(function(){

    var id = $(this).attr('data-id'); 

    if($(this).prop("checked") == true){
               $(this).val('1'); 

              var founder = '1'; 
          }
         else if($(this).prop("checked") == false){
                 $(this).val('0'); 
             var founder = '0';
         }

          $.ajax({    
            type:"GET",
            url:'set-level-founder',
            data:{userid:id,founder:founder},
            success:function(result) {
                
            }
         });

    });	
</script>
@endsection