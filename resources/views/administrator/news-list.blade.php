@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista categoria</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Azienda</a></li>
                               
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
                 @if (Session::has('error'))
                       <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('error') }}</strong>
                        </div>
                @endif
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Elenco delle notizie</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">
						<a href="{{url('administrator/add-news')}}" class="btn btn-primary" style="display: inline-block;margin-bottom: 20px;">Elenco delle notizie</a>						
                       
						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
					  			  <th>Logo</th>
						  		  <th>Title</th>
						  	      <th>Azione</th> 
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		@foreach($getDetail as $Detail)
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td><div class="user-avatar">
				                        <a class="chlid">
				                               @if(!empty($Detail->image))
				                           <img src="{{url('images/news/'.$Detail->image)}}"> 
				                           @else
				                           <img src="{{url('front/assets/img/find_user.png')}}">
				                           @endif
				                           
				                          </a>
				                       </div></td>							     
							     					       
							       <td>	{{$Detail->title}}</td>
							       
							        <td>						        
							        	

							       <a class="btn btn-info btn-sm" href="{{url('administrator/edit-news/'.$Detail->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							      <a class="btn btn-danger btn-sm" href="{{url('administrator/delete-news/'.$Detail->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

							        </td>
						   		</tr> 
						   		<?php $i++;	?>
						   		@endforeach

						 </tbody>
					 </table> 
				
					</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
		
		
<script>
	$(document).ready( function () {
        $('#myTable').DataTable({
  "language": {
    "search": "Cerca",  
     "lengthMenu": "Mostra _MENU_ ",
     "info": "Mostra  _PAGE_ of _PAGES_",
  "infoEmpty": "Nessun record disponibile",
  "emptyTable": "Nessun dato disponibile nella tabella",
  "zeroRecords": "Nessuna corrispondenza trovata",
  "paginate": {
      "previous": "precedente",
      "next":'Successiva'
    }
    
  }
});
} );
</script>	<!--footer-->
		@endsection