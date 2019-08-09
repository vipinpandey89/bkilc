<?php $__env->startSection('title','UserList'); ?>

<?php $__env->startSection('content'); ?>
	

		<div id="page-wrapper">
			<div class="main-page">

				<div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>Carica notizie ed eventi</h2>--->
                       
                    </div> 
                    <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('administrator/dashboard')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Bachea</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a href="#">News ed Eventi</a></li>

                               <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="#">Pubblica News ed Eventi</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>


				<div class="tables">
					<div class="panel panel-primary">
					  <div class="panel-heading">
						<h3 class="panel-title">Carica notizie ed eventi</h3>
					  </div>
					  <div class="panel-body">
						<div class="table-responsive">										

							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#delevent" style="margin-bottom: 11px;">
								<i class="fa fa-close" aria-hidden="true"></i>  cancella evento
							</button>

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
						<h4 class="modal-title">Nuovo evento</h4>
					</div>
					<div class="modal-body">

						<form action="<?php echo e(url('administrator/upload-calender')); ?>" method="post" enctype="multipart/form-data"> 
							 <?php echo e(csrf_field()); ?>

							<div class="form-group ">
								<label for="title">Titolo</label> 
								<input type="text" title="Nome del file" class="form-control" id="title" name="title" placeholder="Nome del file" value="" required>
							</div>

							<div class="form-group ">
								<label for="FilUploader">Immagine</label> 
								<input type="file" title="Nome del file" class="form-control" id="FilUploader" name="image" value="" required>
							</div>
							
							<div class="form-group ">
								<label for="exampleInputEmail1">Descrizione</label> 
								<textarea class="form-control" name="editor1" placeholder="Descrizione"><?php echo e(old('editor1')); ?></textarea>

							</div>	

							<div class="form-group ">
								<label for="start_time">Data d'inizio</label> 
								<input type="text" title="Nome del file" class="form-control dateTime"  name="start_time" readonly="readonly" placeholder="Nome del file" value="" required>
							</div>						

							

							<div class="form-group ">
								<label for="finish_time">Data di fine</label> 
								<input type="text" title="Nome del file" class="form-control dateTime"  name="finish_time"  readonly="readonly" placeholder="Nome del file" value="" required>
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
              		<?php $__currentLoopData = $allevents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <tr>
                     <th scope="row"><?php echo e($i); ?></th>
                      <td><?php echo e($data->title); ?> </td>
                     <td><?php echo e($data->start_time); ?></td>
                     <td><?php echo e($data->end_time); ?></td> 
                     <td>  <a class="btn btn-danger btn-sm" href="<?php echo e(url('administrator/delete-event/'.$data->id)); ?>" title="Elimina" onclick="return confirm('Sei sicuro di voler cancellare questo ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                     </td>                                       
                  </tr>        
                  <?php $i++;?> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       

             </tbody>
           </table>	
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

	 monthNames: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
	monthNamesShort: ['Genn','Febbr','Mar','Apr','Magg','Giugno','Luglio','Ag','Sett','Ott','Nov','Dic'],
	dayNames: ['Domenica','Lunedì','Martedì','Mercoledì','Giovedì','Venerdì','Sabato'],
	dayNamesShort: ['Do','Lun','Mar','Mer','Gio','Ven','Sab'], 

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
     	$('#myModal').modal('toggle');   
    },

   });
  });

   $("#FilUploader").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
            return false;
        }
    });
   
  </script>



 <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


<script>
	CKEDITOR.replace( 'editor1' );
 </script>	


<script>
$('.dateTime').datetimepicker({
ownerDocument: document,
contentWindow: window,
value: '',
rtl: false,
format: 'Y-m-d H:i',
formatTime: 'H:i',
formatDate: 'Y-m-d',
startDate:  false, 
step: 60,
monthChangeSpinner: true,
closeOnDateSelect: false,
closeOnTimeSelect: true,
closeOnWithoutClick: true,
closeOnInputClick: true,
openOnFocus: true,
timepicker: true,
datepicker: true,
weeks: false,
defaultTime: false, 
defaultDate: false, 
});

</script>

 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('administrator.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>