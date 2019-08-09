<?php
	$conn = mysqli_connect("localhost","franc906_bklicus","Pb)ET^#Mf[*]","franc906_bklic");

	if(isset($_POST['elearning_submit']))
	{

			$dr= !empty($_POST['doctro'])?$_POST['doctro']:'';
			//$dr1 = json_encode($dr);
			$patients= !empty($_POST['patients'])?$_POST['patients']:'';
			//$patients1 = json_encode($patients);
			$times= !empty($_POST['times'])?$_POST['times']:'';
			$start_time = !empty($_POST['start_time'])?$_POST['start_time']:'';
			$finish_time = !empty($_POST['finish_time'])?$_POST['finish_time']:'';
 
			if(!empty($dr) && !empty($patients) && !empty($times))
			{
               foreach($dr as $d){
				   foreach($patients as $p){
				 $sql= "insert into test (dr_name, patent_name, time,start_date,end_date) VALUES ('$d', '$p', '$times','$start_time','$finish_time')";
				 if ($conn->query($sql) === TRUE) {
						   echo "<script>alert('New record created successfully')</script>";
						   
						   $subject= "Conferma dell'appuntamento";

		                             $header = "From:bklic@bklic.komete.it \r\n";
		                             $header.= 'MIME-Version: 1.0' . "\r\n";
		                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		                            $message= '<body style="margin:0; padding:0; background-color:#F2F2F2;">
											<span style="display: block; width: 640px !important; max-width: 640px; height: 1px" class="mobileOff"></span>
  
		  											<center>
		  											 <h3>Ciao'.$p.'</h3>
													 <p>Il tuo appuntamento è stato corretto. Si prega di controllare i dettagli di seguito</p>
													 <p>Nome medico: <span>'.$d.'</span></p>
		  										</center>
  											</span>
										</body>';	                            

		                             mail('francesco.g@komete.it',$subject,$message,$header);  
						   
						   
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
				   }
			   }
			}
	}

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Bklic</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />


<link href="css/style.css" rel='stylesheet' type='text/css' />


<link href="css/font-awesome.css" rel="stylesheet"> 

<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>

<script src="js/jquery-1.11.1.min.js"></script>


<!-- calender section-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<!-- end here -->

<!--
 <link href="{{URL::asset('admin/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css"/>

  <script type="text/javascript" src="{{URL::asset('admin/js/bootstrap-datetimepicker.js')}}"></script>-->


<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

<script src="js/metisMenu.min.js"></script>

<link href="css/custom.css" rel="stylesheet">

<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>


  
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><img src="images/logo2.png" style="width: 192px; height: 27px;
"><span class="dashboard_text">Design dashboard</span></a></h1><span class="dashboard_text">Design dashboard</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.html">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			  
             
              <li class="treeview">
             
              <li><a href="upload-caleneder-managment.php"><i class="fa fa-angle-right text-red"></i> <span>Important</span></a></li>
             
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
	

		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
			 				
					<div class="table-responsive bs-example widget-shadow">

						<h4>Carica notizie ed eventi</h4>						

							<!--<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#delevent" style="margin-bottom: 11px;">
								<i class="fa fa-close" aria-hidden="true"></i> Delete Events
							</button>-->

							<div id="calendar"></div>						
					</div>
				</div>
			</div>
		</div>

		

		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Dottore</h4>
					</div>
					<div class="modal-body">

						<form action="#" method="post" enctype="multipart/form-data"> 
						
							<div class="form-group ">
								<label for="title">Dottore</label> 
								<select name="doctro[]" multiple class="form-control" required>
									<option value="Stefano Scuri">Stefano Scuri</option>
									<option value="Filippo Scuri">Filippo Scuri</option>
									<option value="Mario Rossi">Mario Rossi</option>
									


								</select>
								
							</div>
							
							<div class="form-group ">
								<label for="title">Paziente</label> 
								<select name="patients[]" multiple class="form-control" required>
									<option value="lorenzo aranzulla">lorenzo aranzulla</option>
									<option value="marco rossi">marco rossi</option>
									<option value="marco rossi">marco rossi</option>
									<option value="federico rossi">federico rossi</option>
									<option value="fabrizio rossi">fabrizio rossi</option>
									<option value="luca rossi">luca rossi</option>
								</select>
								
							</div>

							<div class="form-group ">
								<label for="title">Ora appuntamento</label> 
								<select name="times" class="form-control" required>
									<option value="Controllo (10)">Controllo (10)</option>
									<option value="Intervento laser (90)">Intervento laser (90)</option>
									<option value="Visita approfondita (60)">Visita approfondita (60)</option>
									
								</select>
								
							</div>		

							<div class="form-group ">
								<label for="start_time">Data dell'appuntamento</label> 
								<input type="date" title="Nome del file" class="form-control" id="start_time" name="start_time" placeholder="Data dell'appuntamento" value="" required>
							</div>						

							

							<div class="form-group ">
								<label for="finish_time">Ora dell'appuntamento</label> 
								<input type="time" title="Nome del file" class="form-control" id="finish_time" name="finish_time" placeholder="Ora dell'appuntamento" value="">
							</div>						
			

							<button type="submit" class="btn btn-default" name="elearning_submit">Inserisci</button> 
						</form>

					</div>
					
				</div>

			</div>
		</div>



<!-- delete evenet here -->

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#delevent">Open Modal</button>

		<div id="delevent" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Elimina eventi</h4>
					</div>
					<div class="modal-body">


					 <table class="table user-data-table">
             <thead>
                 <tr> 
                    <th>S-No</th>
                    <th>Titolo</th>
                    <th>Data d'inizio</th>
                    <th>Data di fine</th>
                     <th>Azione</th> 
                  
                 </tr>
            </thead>

              <tbody>
              		<?php $i=1;?>
              		@foreach($allevents as $data)
                   <tr>
                     <th scope="row">{{$i}}</th>
                      <td>{{$data->title}} </td>
                     <td>{{$data->start_time}}</td>
                     <td>{{$data->end_time}}</td> 
                     <td>  <a class="btn btn-danger btn-sm" href="{{url('administrator/delete-event/'.$data->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler cancellare questo ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                     </td>                                       
                  </tr>        
                  <?php $i++;?> 
                  @endforeach       

             </tbody>
           </table>	
			     </div>
				</div>
			</div>
		</div>




<div id="myModal1" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Informazione</h4>
					</div>
					<div class="modal-body">

				<div class="table-responsive">
						<div class="col-md-12">
							<a id="eventUrl" target="_blank" href="#"><h4><i class="fa fa-calendar" aria-hidden="true"></i> <span id="modalTitle">Reunion</span></h4></a>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="startTime">2019-05-09</span> At <span id="endTime">03:45 PM</span></p>
						</div>
						<div class="col-md-12">	
							<div id="imageDiv"><img src="assets/uploads/7f9d9917925b0c4e4dc37854ba6ae68d.png" onerror="this.style.display=&quot;none&quot;" class="img-responsive" alt=""></div>
							<br>
							<h4><i class="fa fa-globe"></i> Dottor:</h4>
                                                      
							 <p id="modalBody">the test!</p>
						</div>
                                                <div class="col-md-12">	
							<div id="imageDiv"><img src="assets/uploads/7f9d9917925b0c4e4dc37854ba6ae68d.png" onerror="this.style.display=&quot;none&quot;" class="img-responsive" alt=""></div>
							<br>
							<h4><i class="fa fa-globe"></i> patients Name:</h4>
                                                      
							 <p id="modalBody1">the test!</p>
						</div>


					</div>




					</div>
					
				</div>

			</div>
	</div>







<!-- end here -->

<script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({


    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },

	monthNames: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
	monthNamesShort: ['Ene', 'febbraio', 'Mar', 'Abr', 'Maggio', 'giugno', 'Luglio', 'Ago', 'Settembre', 'Oct', 'Novembre', 'Dic'],
	dayNames: ['Domenica', 'Lunedi', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'],
	dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'],

 buttonText: {
    today: 'oggi',
    month: 'il mio',
    week: 'settimana',
    day: 'giorno'
   },
   

   events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {

     	$('#myModal').modal('toggle');
   
    },

    eventClick:function(event)
    {

    	var id= event.id;

         

    	        $.ajax({
		         url:"event.php",
		         type:"POST",
                         data:{"myData":id},
		         success:function(result){
		         	var obj= JSON.parse(result);
                             //console.log(result);
		         	//var start_time = new Date(obj.start_time);
		         	//var end_time = new Date(obj.end_time);
		         	
		         	$('#startTime').html (obj.start_time);
		         	$('#endTime').html(obj.end_time);
		         	$('#modalBody').html(obj.dr_name);
                                 $('#modalBody1').html(obj.patent_name) 
		         	$('#myModal1').modal('toggle');
		         }
        })      
    },


   });
  });
   
  </script>


<script src='js/SidebarNav.min.js' type='text/javascript'></script>
 <script>
   $('.sidebar-menu').SidebarNav()
 </script>
  <script src="js/bootstrap.js"> </script> 
  
</body>
</html>

