<?php $__env->startSection('content'); ?>

<div id="Banner_wrapper" class="bg-parallax single-post" style="background-color:#024eac;">
	<div id="Subheader">
		<div class="container">
			<div class="inner_banner_title">
				<h1 class="title"><?php echo e(!empty($getNewsDetail)?$getNewsDetail->title:''); ?></h1>
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
					 <?php if(!empty($getNewsDetail->image)): ?>
					<img src="<?php echo e(url('images/news/'.$getNewsDetail->image)); ?>" class="img-responsive" alt="">
					 <?php endif; ?>
				</div> 
			</div> 
			<div class="post-excerpt"><p class="big"><?php echo e(strip_tags($getNewsDetail->description)); ?></p></div>
		</div>
	</div> 
		 
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>