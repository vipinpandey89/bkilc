@extends('layouts.dashboard')

@section('content')


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
					<li><a class="current" href="{{url('user-documents')}}">Documenti di e-learning</a></li>

				</ul>
			</div>
		</div>
	</div>

	<hr/>

	<div class="main-page">
		<div class="e-learning-gallery">
		
			<div class="banner">
				<div class="content">
					<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
				</div>
			</div>

			<div class="gallery">
				<div class="container-fluid">


					<?php 
					$is_video = 0;$is_image = 0;$is_doc=0;
					foreach($listDetail as $doc){		
						if($doc->file_type == 'video'){
							if($is_video == 0){
								echo '<div class="row">'; 
								echo '<h3>Video</h3>';
							}
							$checkPaidForThis= Helper::getLearningPayment($ProfileDetail->id,$doc->id);		
							//echo count($checkPaidForThis);die;

							?>
							<div class="col-md-3 col-sm-6">
								<div class="gallery-card">
								<?php if(empty($doc->point_value) || !empty($checkPaidForThis)){?>
									<div class="card-img">
										<iframe src="{{url('/elearningdocs/'.$doc->file)}}" ></iframe>
									</div>
								<?php }else{?>
										<div class="card-img">
										<img src="{{url('elearningdocs/paid.png')}}">
									</div>
								<?php }?>

									<div class="card-body">
										<h5 class="card-title">{{$doc->file_name}}</h5>
										<h4 class="card-title">@if(!empty($doc->point_value)){{$doc->point_value}} &euro; @else Gratis @endif</h4>
										<p class="card-text">@if($doc->description){{strip_tags($doc->description)}}... @endif</p>
										
										<a title="{{$doc->file_name}}" href="{{url('viewdoc/'.$doc->id)}}"  class="btn btn-outline-primary blog_btn">apri</a>
										
									</div>

								</div>
							</div>
							<?php
							$is_video=1; 
						}

					} ?>

					<?php $i1=1; ?>
					<?php foreach($listDetail as $doc1){
						if($doc1->file_type == 'image'){
							if($is_image == 0){
								echo '</div>';
								echo '<div class="row">';
								echo '<h3>Immagini</h3>';
							}
							$fn = $doc1->file;	

							$checkPaidForThis= Helper::getLearningPayment($ProfileDetail->id,$doc1->id);				

							?>


							<div class="col-md-3 col-sm-6">
								<div class="gallery-card">
								<?php if(empty($doc1->point_value) || !empty($checkPaidForThis)){?>
									<div class="card-img">
										<a id="example4" title="{{$doc1->file_name}}" href="{{url('/elearningdocs/'.$doc1->file)}}"><img src="{{url('/elearningdocs/'.$doc1->file)}}" ></a>
									</div>
								<?php }else{?>
									<div class="card-img">
										<img src="{{url('elearningdocs/paid.png')}}">
									</div>
								<?php }?>

									<div class="card-body">
										<h5 class="card-title">{{$doc1->file_name}}</h5>
										<h4 class="card-title">@if(!empty($doc1->point_value)){{$doc1->point_value}}&euro; @else Gratis @endif</h4>
										<p class="card-text">@if($doc1->description){{strip_tags($doc1->description)}}... @endif</p>
										
										
										<a title="{{$doc1->file_name}}" href="{{url('viewdoc/'.$doc1->id)}}"  class="btn btn-outline-primary blog_btn">apri</a>
										
									</div>

								</div>
							</div>
							<?php 
							$i1++; $is_image = 1;	?>
							<?php } } ?>


						<?php  $i1=1; ?>
						<?php foreach($listDetail as $doc1){ 
							if($doc1->file_type == 'document'){
								if($is_doc == 0){
									echo '</div>';
									echo '<div class="row">';
									echo '<h3>Documento</h3>';
								}
								$fn = $doc1->file;	
								$checkPaidForThis= Helper::getLearningPayment($ProfileDetail->id,$doc1->id);	
								
								?>								

								<div class="col-md-3 col-sm-6">
									<div class="gallery-card">
										<?php if(empty($doc1->point_value) || !empty($checkPaidForThis) ){?>
										<div class="card-img">
											<iframe style="width: 100%;" src="{{url('/elearningdocs/'.$doc1->file)}}" ></iframe>
										</div>
									<?php }else{?>
										<div class="card-img">
											<img src="{{url('elearningdocs/paid.png')}}">
										</div>

									<?php }?>

										<div class="card-body">
											<h5 class="card-title">{{$doc1->file_name}}</h5>
											<h4 class="card-title">@if(!empty($doc1->point_value)){{$doc1->point_value}} &euro; @else Gratis @endif</h4>
											<p class="card-text">@if($doc1->description){{strip_tags($doc1->description)}}... @endif</p>
											
										
												<a title="{{$doc1->file_name}}" href="{{url('viewdoc/'.$doc1->id)}}"  class="btn btn-outline-primary blog_btn">apri</a>
										
										</div> 

									</div>
								</div>
								<?php 
								$i1++; $is_doc = 1;	?>
							<?php } } ?> 
						</div>
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