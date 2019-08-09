@extends('administrator.layout.admin')
@section('title','UserList')
@section('content')

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2> Lista Formazione</h2>--->                     
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="{{url('administrator/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Formazione</a></li>
                               
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
					<h3 class="panel-title">Lista Formazione</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
						<a href="{{url('administrator/addElearningdocs')}}" class="btn btn-primary" style="display:inline-block;margin-bottom:20px;">Aggiungi documento</a>
                        <?php if(sizeof($listDetail) != 0){ ?>
						<table class="table user-data-table table-striped table-hover table-green" id="myTable">
						 <thead>
						  	 <tr> 
					  			  <th>S-No</th>
						  		  <th>Nome</th>
						  		  <th>Tipo di file</th>
								  <th>File</th>
								  <th>Azione</th>
						  	 </tr>
						</thead>

						 	<tbody>
						 		<?php $i=1; ?>
						 		<?php
						 		foreach($listDetail as $doc){
									 $fn = $doc->file;						
								?>
						   		 <tr>
							       <th scope="row">{{$i}}</th>
							       <td><?php echo $doc->file_name; ?></td>
							       <td><?php 
								   if($doc->file_type == 'document'){
									echo 'Documento';
								   }else if($doc->file_type == 'image'){
									echo 'Immagine';
								   }else if($doc->file_type == 'video'){
									echo 'Video';
								   }
								   ?></td> 
							       
								   <td>
								  
								   <?php 
								    $imn = url('/admin/images/video.png');
								    $pimn = url('/admin/images/doc.png');
									$ppimn = url('/admin/images/ppt.png');
								   if($doc->file_type == 'video' ){ ?>
								   <img id="file<?php echo $doc->id; ?>" style="width:70px; height:70px;" src="<?php echo $imn;?>">
								   <?php }else if($doc->file_type == 'document' ){ ?>
									 <img id="file<?php echo $doc->id; ?>" style="width:70px; height:70px;" src="<?php echo $pimn;?>">  
									 
								   <?php }
									 else if($doc->file_type == 'ppt' ){ ?>
									 <img id="file<?php echo $doc->id; ?>" style="width:70px; height:70px;" src="<?php echo $ppimn;?>">  
									 <?php
									 }									 
								   else{ ?>
								       <img id="file<?php echo $doc->id; ?>" style="width:70px; height:70px;" src="<?php echo url('/elearningdocs/'.$doc->file);?>">
								      <!-- <img src='<?php //echo "http://127.0.0.1:8000/public/elearningdocs/$doc->file"; ?>' />-->
								   <?php } ?>   
								   </td>
								   <td>
							        	
							       <a class="btn btn-primary btn-sm" href="{{url('administrator/viewdoc/'.$doc->id)}}"  title="vista"><i class="fa fa-eye" aria-hidden="true"></i></a>

							      <!--  <a class="btn btn-info btn-sm" href="{{url('administrator/edit-elearning/'.$doc->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->

							       <a class="btn btn-danger btn-sm" href="{{url('administrator/deleteelearning/'.$doc->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo file')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							        	

							        </td>
							     
							       
						   		</tr> 
						   		<?php $i++;	?>
						   		<?php }
						   		
						   		?>
                               
						 </tbody>
					 </table> 
					 <?php }else{
						   		    echo '<tr><td> <h3 style="text-align: center;">Non è stato caricato alcun documento</h3></td></tr> ';
						   		}
						   		?>
					 
					</div>
				  </div>
				</div>
				</div>
			</div>
		</div>
		
		
<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({
  "language": {
    "search": "Cerca", 
     "lengthMenu": "Mostra _MENU_",
     "info": "Mostra _PAGE_ of _PAGES_", 
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
</script>
		<!--footer-->
		@endsection