@extends('administrator.layout.admin')
@section('title', 'Dashboard')
@section('content')

<div id="page-wrapper">
			<div class="main-page">
			<div class="col_3">
        	
        	<div class="col-md-3 r-p-l">
        		<div class="r3_counter_box box-shadow box-1">
                    <i class="fa fa-laptop user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$totals['Promoter']}}</strong></h5>
                      <span>Promotori totali</span>
                    </div>
					<div class="more_info">
	   <a href="#">More info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
                </div>
        	</div>
        	<div class="col-md-3 r-p-l">
        		<div class="r3_counter_box box-shadow box-2">
                    <i class="fa fa-money user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$totals['Affiliati']}}</strong></h5>
                      <span>Affiliati totali</span>
                    </div>
					<div class="more_info">
	   <a href="#">More info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
                </div>
        	</div>
        	<div class="col-md-3 r-p-l">
        		<div class="r3_counter_box box-shadow box-3">
                    <i class="fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>{{$totals['Utenti card']}}</strong></h5>
                      <span>Totale utenti di carte</span>
                    </div>
					<div class="more_info">
	   <a href="#">More info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
                </div>
        	 </div>
        	<div class="col-md-3 r-p-r r-p-l">
        		<div class="r3_counter_box box-shadow box-4">
                    <!-- <i class="fa fa-dollar icon-rounded"></i> -->
                    <i class="fa fa-eur icon-rounded" aria-hidden="true"></i>
                    <div class="stats">
                      <h5><strong>&euro;{{$totals['totalpayment']}}</strong></h5>
                      <span>Pagamenti totali</span>
                    </div>
					<div class="more_info">
	   <a href="#">More info <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
                </div>
        	</div>
        	<div class="clearfix"> </div>
		</div>
		
		<div class="row-one widgettable">
		</div>
				
				<div class="charts">
					<div class="col-md-5 r-p-l">
					<div class="panel panel-default">
					<div class="panel-heading"><span class="icon-panel"><i class="fa fa-pie-chart" aria-hidden="true"></i></span> <h3 class="panel-title">Performance ultimo anno</h3> </div>
					  <div class="panel-body">
						<div id="piechart" style="width: 100%; height: 295;"></div>
					  </div>
					</div>						
					</div>
					
					<div class="col-md-7 r-p-l r-p-r">
						<div class="panel panel-default">
						<div class="panel-heading"><span class="icon-panel"><i class="fa fa-bar-chart" aria-hidden="true"></i></span> <h3 class="panel-title">Performance Aziendale</h3> </div>
						  <div class="panel-body">
							<div id="columnchart_material" style="width: 100%; height: 295px;"></div>
						  </div>
						</div>					
					</div>
			
					<div class="clearfix"> </div>
				</div>		

				<div class="charts">
					<div class="col-md-12 r-p-l r-p-r">
						<div class="panel panel-default">
						  <div class="panel-heading">
							<span class="icon-panel"><i class="fa fa-bar-chart" aria-hidden="true"></i></span> <h3 class="panel-title">Pagamenti</h3>
						  </div>
						  <div class="panel-body">
							<div id="chart_div" style="width: 100%; height: 295px;"></div>
						  </div>
						</div>
					</div>
			
					<div class="clearfix"> </div>
				</div>			
           </div>
   </div>
@endsection

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- vertical graph -->


   <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

     
      var alldata= '<?php echo $data;?>';

      	var obj= JSON.parse(alldata);

      var output= [];
      	$.each( obj, function( key, value ) {
  						output.push(value);
				});
      	//console.log(output);
      		

      function drawChart() {
        var data = google.visualization.arrayToDataTable(output);

        var options = {
          chart: {
            title: 'Performance Aziendale',
            subtitle: ' Carte vendute, Upgrade, and Affiliati: 2019',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<!-- end here-->

<!--pie graph-->

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

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<!-- end here--->


<!-- line char-->

<script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Pagamenti');


      var paymentdata= '<?php echo $paymentdata;?>';

      	var obj1= JSON.parse(paymentdata);

       

      var output1= [];

      	$.each( obj1, function( key1, value1 ) {

  						output1.push(value1);
              //console.log(value1);
				});
				
      	
      
      console.log(output1);
      data.addRows(output1);

      //data.addRows([0,1],[1,10]);

      var options = {
        hAxis: {
          title: 'Mesi'
        },
        vAxis: {
          title: 'Pagamenti'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>
<!-- end here-->

