<?php $__env->startSection('content'); ?>

<div id="Banner_wrapper" class="bg-parallax category-news cat-meeting" style="background-image:url(<?php echo e(url('website/images/meeting-dark.jpg')); ?>);">
  <div id="Subheader">
   <div class="container">
    <div class="inner_banner_title">
     <h1 class="title">Meeting</h1>
   </div>
 </div>
</div>
</div>
<div id="Content">
  <div id="category-news_section" class="section timeline">
    <div class="container">
      <div class="row">

          
                  
            <?php $__currentLoopData = $getnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="post-item isotope-item clearfix">
                    <div class="date_label"><?php echo e(date('d-m-Y',strtotime($newsDetail->start_time))); ?> To <?php echo e(date('d-m-Y',strtotime($newsDetail->end_time))); ?> </div>

                    <?php if(!empty($newsDetail->image)): ?>
                    <div class="image_frame post-photo-wrapper image">
                      <div class="image_wrapper">
                        <a href="<?php echo e(url('meeting-detail/'.$newsDetail->id)); ?>">
                          <img width="960" height="699" src="<?php echo e(url('images/news/'.$newsDetail->image)); ?>" class="img-responsive wp-post-image" alt="">
                        </a>
                      </div>
                    </div>
                    <?php endif; ?>

                    <div class="post-desc-wrapper">
                      <div class="post-desc">
                        <div class="post-title">
                          <h2 class="entry-title"><a href="<?php echo e(url('meeting-detail/'.$newsDetail->id)); ?>"><?php echo e($newsDetail->title); ?></a></h2>
                        </div>
                        <div class="post-excerpt"><p class="big"><?php echo e(strip_tags(substr($newsDetail->description,0,200))); ?></p></div>
                        <div class="post-footer">
                          <div class="post-links"><i class="fa fa-file-text-o"></i> <a href="<?php echo e(url('meeting-detail/'.$newsDetail->id)); ?>" class="post-more">Leggi di più</a></div></div>
                        </div>
                      </div>

                    </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       

            

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>