<?php $__env->startSection('title','UserList'); ?>

<?php $__env->startSection('content'); ?>
	

		<div id="page-wrapper">
			<div class="main-page">



				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>Eventi</h2>--->               
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Gestione Calendario</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>



				<div class="tables">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">Eventi</h3>
				  </div>
				  <div class="panel-body">
					<div class="table-responsive">
						
							<div id="calendar"></div>						
					</div>
				  </div>
				</div>
				</div>
			</div>
		</div>



		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Evento</h4>
					</div>
					<div class="modal-body">

				<div class="table-responsive">
						<div class="col-md-12">
							<a id="eventUrl" target="_blank" href="#"><h4><i class="fa fa-calendar" aria-hidden="true"></i> <span id="modalTitle">Reunion</span></h4></a>
							<p><i class="fa fa-clock-o" aria-hidden="true"></i> <span id="startTime">2019-05-09</span> to <span id="endTime">2019-05-09</span></p>
						</div>
						<div class="col-md-12">	
							<div id="imageDiv"><img src="assets/uploads/7f9d9917925b0c4e4dc37854ba6ae68d.png" onerror="this.style.display=&quot;none&quot;" class="img-responsive" alt=""></div>
							<br>
							<h4><i class="fa fa-globe"></i> DESCRIZIONE:</h4>
							 <p id="modalBody">the test!</p>
						</div>
					</div>




					</div>
					
				</div>

			</div>
	</div>

<script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({   	 	

    editable:true,
    header:{
     left:'prev,Il prossimo oggi',
     center:'titolo',
     //right:'mese,Settimana del programma,giorno del giorno'
    },

	    monthNames: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
	    monthNamesShort: ['genn','febbr','mar','apr','magg','giugno','luglio','ag','sett','ott','nov','dic'],
	    dayNames: ['Domenica', 'Lunedi', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'],
	    dayNamesShort: ['do','lun','mar','mer','gio','ven','sab'],

   buttonText: {
	    today: 'oggi',
	    month: 'mese',
	    week: 'settimana',
	    day: 'giorno'
   	},

    events: 'ajaxcalender',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {	

      //$('#myModal').modal('toggle');
   
    },

     eventClick:function(event)
    {

    	var id= event.id;

    	$.ajax({
		         url:"getevent/"+id,
		         type:"GET",
		         success:function(result){

		         	var obj= JSON.parse(result);
		         	var start_time = new Date(obj.start_time);
		         	var end_time = new Date(obj.end_time);
		         	
		         	$('#startTime').html (obj.start_time);
		         	$('#endTime').html(obj.end_time);
		         	$('#modalBody').html(obj.description);
		         	$('#myModal').modal('toggle');
		         }
        })      
    },

   });
 });

   
  </script>	

  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>