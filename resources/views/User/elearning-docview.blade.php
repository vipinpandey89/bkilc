@extends('layouts.dashboard')

@section('content')
<?php 
$BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';
$paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';
?>

<!-- //header-ends -->
<!-- main content start-->
<div id="page-wrapper">

	<div class="row">
		<div class="col-md-8 heading">
			<h2>Documenti di e-learning</h2>                     

		</div> 

		<div class="col-md-4 text-right">
			<div class="breadcumb">
				<ul>
					<li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>
					<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
					<li><a href="{{url('user-documents')}}">Documenti di e-learning</a></li>
					<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
					<li><a class="current" href="#">E-learning View</a></li>

				</ul>
			</div>
		</div>
	</div>

	<hr/>

	<div class="main-page">
		<div class="e-learning-gallery">


			<div class="gallery">
				<form method="post" action="{{$paypalUrl}}">
					<div class="container-fluid">
						{{ csrf_field() }}

						<?php 
						$is_video = 0;$is_image = 0;$is_doc=0;						 			
						if($listDetail->file_type == 'video'){
							if($is_video == 0){
								echo '<div class="row">'; 
								echo '<h3>Video</h3>';
							}
							$amount = !empty($listDetail->point_value)?$listDetail->point_value:'0';
							$ElearningDocs= !empty($listDetail) ? $listDetail->id:'0';
							$checkPaidForThis= Helper::getLearningPayment($userProfile->id,$listDetail->id);	
							?>
							<div class="col-md-12 col-sm-6">
								<div class="gallery-card detail">
									<?php 
									if(empty($listDetail->point_value) || !empty($checkPaidForThis)){?>
									
										<div class="card-img">
											<iframe style="width: 100%;height: 700px;"src="{{url('/elearningdocs/'.$listDetail->file)}}" ></iframe>
										</div>
									<?php }else{?>
										<div class="card-img">
											<img src="{{url('elearningdocs/paid.png')}}" style="height: 472px;">
										</div>
									<?php }?>

									<div class="card-body">
										<h5 class="card-title">{{$listDetail->file_name}}</h5>
										<span class="card-title">@if(!empty($listDetail->point_value)){{$listDetail->point_value}}&euro; @else Gratis @endif</span>
										@if($listDetail->description)<p class="card-text">{{strip_tags($listDetail->description)}} </p>@endif
										<?php if($amount > 0 && empty($checkPaidForThis)){?>
											<button typpe="submit"   class="btn btn-outline-primary">pagare</button>
										<?php }?>
									</div>

								</div>
							</div>
							<?php
							$is_video=1; 
						}

						?>

						<?php 
						$i1=1;
						if($listDetail->file_type == 'image'){
							if($is_image == 0){
								echo '</div>';
								echo '<div class="row">';
								echo '<h3>Immagini</h3>';
							}
							$fn = $listDetail->file;	
							$amount = !empty($listDetail->point_value)?$listDetail->point_value:'0';
							$ElearningDocs= !empty($listDetail) ? $listDetail->id:'0';	
							$checkPaidForThis= Helper::getLearningPayment($userProfile->id,$listDetail->id);			

							?>
							<div class="col-md-12 col-sm-6">
								<div class="gallery-card detail">
									<?php 
									if(empty($listDetail->point_value) || !empty($checkPaidForThis)){?>
									
										<div class="card-img">
											<a id="example4" title="{{$listDetail->file_name}}" href="{{url('/elearningdocs/'.$listDetail->file)}}"><img src="{{url('/elearningdocs/'.$listDetail->file)}}" ></a>
										</div>
									<?php }else{?>
										<div class="card-img">
											<a id="example4" title="{{$listDetail->file_name}}" href="{{url('elearningdocs/paid.png')}}"><img src="{{url('elearningdocs/paid.png')}}" style="height: 472px;"></a>
										</div>
									<?php }?>
									<div class="card-body">
										<h5 class="card-title">{{$listDetail->file_name}}</h5>
										<span class="card-title">@if(!empty($listDetail->point_value)){{$listDetail->point_value}}&euro; @else Gratis @endif</span>
										@if($listDetail->description)<p class="card-text">{{strip_tags($listDetail->description)}} </p>@endif

										<?php if($amount > 0 && empty($checkPaidForThis)){?>
											<button typpe="submit"   class="btn btn-outline-primary">pagare</button>
										<?php }?>

									</div>

								</div>
							</div>
							<?php 
							$i1++; $is_image = 1;	?>
						<?php }  ?>


						<?php  $i1=1; ?>
						<?php 
						if($listDetail->file_type == 'document'){
							if($is_doc == 0){
								echo '</div>';
								echo '<div class="row">';
								echo '<h3>Documento</h3>';
							}
							$fn = $listDetail->file;	

							$amount = !empty($listDetail->point_value)?$listDetail->point_value:'0';
							$ElearningDocs= !empty($listDetail) ? $listDetail->id:'0';
							$checkPaidForThis= Helper::getLearningPayment($userProfile->id,$listDetail->id);

							?>	
							<div class="col-md-12 col-sm-6">
								<div class="gallery-card detail">
									<?php 
									if(empty($listDetail->point_value) || !empty($checkPaidForThis) ){?>
									
										<div class="card-img">
											<iframe style="width: 100%;height: 700px;" src="{{url('/elearningdocs/'.$listDetail->file)}}" ></iframe>
										</div>
									<?php }else{?>
										<div class="card-img">
											<img src="{{url('elearningdocs/paid.png')}}" style="height: 472px;">
										</div>
									<?php } ?>

									<div class="card-body">
										<h5 class="card-title">{{$listDetail->file_name}}</h5>
										<span class="card-title">@if(!empty($listDetail->point_value)){{$listDetail->point_value}}&euro; @else Gratis @endif</span>
										@if($listDetail->description)<p class="card-text">{{strip_tags($listDetail->description)}} </p>@endif

										<?php if($amount > 0 && empty($checkPaidForThis)){?>
											<button typpe="submit"   class="btn btn-outline-primary">pagare</button>
										<?php }?>

									</div>                                    
								</div>
							</div>
							<?php 
							$i1++; $is_doc = 1;	?>
						<?php }  ?>

						<input type="hidden" name="business" value="{{$BusinessEmail}}">  

						<input type="hidden" name="cmd" value="_xclick"> 

						<input type="hidden" name="item_name" value="{{$ElearningDocs}}">

						<input type="hidden" name="item_number" value="{{ !empty($userProfile)?$userProfile->id:'' }}">

						<input type="hidden" id="amount" name="amount" value="{{$amount}}">

						<input type="hidden" name="currency_code" value="EUR">                                        

						<input type='hidden' name='cancel_return' value='{{url('paypal/cancel')}}'>

						<input type='hidden' name='return' value='{{url('paypal/getdocument-response')}}'> 

						<input type='hidden' name='notify_url' value='https://www.komete.it'>                            

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<style>
#fancybox-content{
	width: auto !important;
}
</style>





<!--footer-->
@endsection