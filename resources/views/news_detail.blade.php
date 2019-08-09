@extends('website-layout.header')

@section('content')

<div id="Banner_wrapper" class="bg-parallax single-post" style="background-color:#024eac;">
	<div id="Subheader">
		<div class="container">
			<div class="inner_banner_title">
				<h1 class="title">{{!empty($getNewsDetail)?$getNewsDetail->title:''}}</h1>
			</div>
		</div>
	</div>
</div>
<div id="Content">
	<!--- HAPPY EASTER --->
	<div id="happy_easter" class="section post_section">
		<div class="container">
			<div class="box_frame">
				<div class="text-center vc_figure">
					 @if(!empty($getNewsDetail->image))
					<img src="{{url('images/news/'.$getNewsDetail->image)}}" class="img-responsive" alt="">
					 @endif
				</div> 
			</div> 
			<div class="post-excerpt"><p class="big">{{strip_tags($getNewsDetail->description)}}</p></div>
		</div>
	</div> 
		 
</div>
 @endsection