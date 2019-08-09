
<?php $__env->startSection('content'); ?>
<?php  $userAs = Auth::user()->user_as;
if($userAs=='BK0')
{ 
  $Level='2';
   $getDetail = Helper::ConvertionDetail($Level);
}elseif($userAs=='BK2')
{ 
  $Level='3';
   $getDetail = Helper::ConvertionDetail($Level);
}elseif($userAs=='BK4'){
   $Level='4';
  $getDetail = Helper::ConvertionDetail($Level); 
}elseif($userAs=='BK6'){
   $Level='5';
  $getDetail = Helper::ConvertionDetail($Level); 
}
elseif($userAs=='BK8'){
   $Level='6';
  $getDetail = Helper::ConvertionDetail($Level); 
}
elseif($userAs=='BK10'){
   $Level='7';
  $getDetail = Helper::ConvertionDetail($Level); 
}
elseif($userAs=='BK12'){
   $Level='8';
  $getDetail = Helper::ConvertionDetail($Level); 
}
elseif($userAs=='P'){
   $Level='9';
  $getDetail = Helper::ConvertionDetail($Level); 
}
elseif($userAs=='PT'){
   $Level='10';
  $getDetail = Helper::ConvertionDetail($Level); 
}
elseif($userAs=='PE'){
   $Level='11';
  $getDetail = Helper::ConvertionDetail($Level); 
}
//echo '<pre>';print_r($getDetail);die;
 ?>          
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-8 heading">
                     <!--<h2>Dettagli del wallet</h2>-->                     
                       
                    </div> 

                     <div class="col-md-4 text-right">
                        <div class="breadcumb">
                            <ul>
                                <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                <li><a class="current" href="<?php echo e(url('user-wallet')); ?>">E-wallet</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                

                 <!-- /. ROW  -->
                 <hr/>

                    <?php if(Session::has('success')): ?>
                           <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong><?php echo e(Session::get('success')); ?></strong>
                            </div>
                       <?php endif; ?>

                        <?php if(Session::has('danger')): ?>
                           <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                    <strong><?php echo e(Session::get('danger')); ?></strong>
                            </div>
                       <?php endif; ?>
            <div class="row">
			<div class="col-md-5">
				<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Performance Aziendale</h3>
			  </div>
			  <div class="panel-body"> 
			  <div class="vertical-pipes">
                <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
              </div>
			  </div>
			</div>
			</div>
			<div class="col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Performance ultimo anno</h3>
			  </div>
			  <div class="panel-body"> 
			  <div class="vertical-pipes">
                <div id="donutchart" style="width: 100%; height: 300px;"></div>
              </div>
			  </div>
			</div>
			</div>
			<div class="col-md-2">
				<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Importo del portafoglio</h3>
			  </div>
			  <div class="panel-body"> 
			  <div class="vertical-pipes custom-box">
                <h5>Ipsum</h5>
				<p><?php echo e((count($userProfile)>0)?$userProfile->total_wallet:'0'); ?></p>
				<p class="big-f">P.V</p>
			  </div>
			  </div>
			</div>
			</div>
			<div class="col-md-2">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Bonus del fondatore</h3>
			  </div>
			  <div class="panel-body"> 
			  <div class="vertical-pipes custom-box">
				<h5>Ipsum</h5>
				<p><?php echo e((count($userProfile)>0)?$userProfile->founder_bonus_point_value:'0'); ?></p>
				<p class="big-f">P.V</p>
			  </div>
			  </div>
			</div>
			
			</div>
			</div>   
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
					<div class="panel-heading">
				<h3 class="panel-title">Dettagli del wallet</h3>
			  </div>
                        <div class="panel-body">
                            <!---<div class="row">
                                <div class="graph-box">
                                    <div class="col-sm-5">
                                      <div class="vertical-pipes">
                                       <div id="columnchart_material" style="width: 600px; height: 295px;"></div>
                                     </div>
                                    </div>
                                    <div class="col-sm-3">
                                      <div class="vertical-pipes">
                                        <div id="donutchart" style="width: 470px; height: 300px;"></div>
                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <div class="vertical-pipes custom-box">
                                        <h4></h4>
                                        <h5>Ipsum</h5>
                                        <p><?php echo e((count($userProfile)>0)?$userProfile->total_wallet:'0'); ?></p>
                                        <p class="big-f">P.V</p>
                                      </div>
                                    </div>


                                     <div class="col-sm-2">
                                      <div class="vertical-pipes custom-box">
                                        <h4>Bonus del fondatore</h4>
                                        <h5>Ipsum</h5>
                                        <p><?php echo e((count($userProfile)>0)?$userProfile->founder_bonus_point_value:'0'); ?></p>
                                        <p class="big-f">P.V</p>
                                      </div>
                                    </div>

                                    <div class="clearfix"></div>
                            </div>
                            </div>--->

                            <div class="table-responsive">
                                <table class="table user-data-table table-striped table-bordered table-hover table-green" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S-No 213</th>                                         
                                            <th>Nome E Cognome</th>
                                             <th>E-mail</th>
                                         
                                            <th>Importo pagato</th>
                                            <th>Data di pagamento</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i=1;
                                            $paidAmount=0;
                                        ?>

                                        <?php $__currentLoopData = $walletDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                        <tr class="odd gradeX">
                                            <td><?php echo e($i); ?></td>
                                           
                                            <td><?php echo e($detail->name); ?></td>
                                             <td><?php echo e($detail->email); ?></td>
                                            <td class="center">&euro;<?php echo e($detail->commission_point); ?></td>
                                           <td><?php echo e(date('d-m-Y',strtotime($detail->commissiondate))); ?></td>
                                          
                                        </tr>
                                        <?php 
                                            $i++;
                                        ?>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                      
                                    </tbody>
                                </table>
                            </div>
                            

                        </div>

                    </div>
                    
                </div>
            </div>
			<div class="row">
				<div class="col-md-12">
				<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Richiedi pagamento.</h3>
			  </div>
			  <div class="panel-body">
				<form method="post">  
                            <div class="profile-sec wallet-sec">    
                            <div class="profile-inner">
                              <!---<h3>Richiedi pagamento.</h3>-->
                               <span><strong style="color: #00ade9;">Conversione di <?php echo e(!empty($getDetail)?$getDetail->convertion_pv:''); ?> PV = 1 Euro </strong></span>
                              <div class="lavel-upgrade">
                                <ul>
                                  <li class="input-detail"><span>Inserisci l'importo</span> 
                                
                                   <input type="text" name="" value="<?php echo e((count($userProfile)>0)?$userProfile->total_wallet:'0'); ?>" disabled="" >    <span>&euro;</span>
                               </li>
                                  <li class="arrow-img"><i class="fa fa fa-arrow-down"></i></li>
                                  <li class="money-input">    <input type="text" name="wallet_pv" value="" required> <span>P.V.</span>        </li>

                                   <input type="hidden" name="pv_shouldbe" value="<?php echo e(!empty($getDetail)?$getDetail->convertion_pv:''); ?>" > 

                                    <input type="hidden" name="level_euro" value="<?php echo e(!empty($getDetail)?$getDetail->convertion_euro:''); ?>" > 


                                   <input type="hidden" name="total_walletpv" value="<?php echo e((count($userProfile)>0)?$userProfile->total_wallet:'0'); ?>" > 
                                </ul>
                              </div>
                             

                             <?php echo e(csrf_field()); ?>

                            
                            <?php 
                              $walletPvPoint= (count($walletDetail)>0)?$walletDetail[0]->total_wallet_point:'0';
                              $getDetailConversionPv= !empty($getDetail)?$getDetail->convertion_pvL:'';
                              if($walletPvPoint >= $getDetailConversionPv)
                              {
                            ?>
                              <button class="btn btn-primary" name="addbutton" type="submit">Convert</button>
                            <?php }else{
                              ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                      <strong>Per favore Compelete <?php echo e(!empty($getDetail)?$getDetail->convertion_pv:''); ?>.PV per convertire Pv in Euro.</strong> 
                                </div>
                              <?php 
                              }?>
                            </div>  
                            </div>
                          </form>
			  
			  </div>
			</div>
				</div>
			</div>
                            
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
}




<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

     
      var alldata= '<?php echo $data;?>';

      var obj= JSON.parse(alldata);

      var output= [];
        $.each( obj, function( key, value ) {
              output.push(value);
        });
        console.log(output);
          

      function drawChart() {
        var data = google.visualization.arrayToDataTable(output);

        var options = {
          chart: {
            title: 'Performance Aziendale',
            subtitle: 'PV: 2019',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);



      var pichart= '<?php echo $pichart;?>';

        var objpichart= JSON.parse(pichart);

      var outputpichart= [];
        $.each( objpichart, function( key, value ) {
              outputpichart.push(value);
        });
        

      function drawChart() {

        var data = google.visualization.arrayToDataTable(outputpichart);

        var options = {
          title: 'Performance ultimo anno'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

        chart.draw(data, options);
      }
    </script>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>