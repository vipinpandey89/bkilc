<?php $__env->startSection('content'); ?>
<?php 
  //echo '<pre>'; print_r($getAffiliatesDetail); die;
  if(!empty($getAffiliatesDetail)){
  $fnames = $getAffiliatesDetail->filename;
  $arr = explode("$", $fnames);
  }else{
    $arr = array();
  }
  //echo '<pre>'; print_r($arr); die;
  $arc = count($arr);
 ?>
<?php
  if($arc > 1){
    $arc = 1;
  }
?>
<?php  $current_url = Request::url();  ?>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
 <style>
    .product-detail-content {
    width: 100%;
    display: block;
    background: #fff;
    margin-top: 30px;
    border: #ddd solid 1px;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 30px;
  }
  .product-detail-content.offer{
    overflow: hidden;
  }
  .product-detail-content.offer h4 {
    position: absolute;
    top: -84px;
    right: -70px;
    font-size: 13px;
    background: #ffa500;
    padding: 5px;
    transform: rotateZ(45deg);
    -webkit-transform: rotateZ(45deg);
    color: #fff;
    width: 130px;
    padding: 33px 0px 30px 10px;
    height: 70px;
    transform-origin: left center;
    -webkit-transform-origin: left center;
    text-align: center;
    font-size: 14px;
}
 </style>

<section>
  <div class="slider-section">
    <div class="owl-carousel owl-theme">

     <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arrval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="item">
        <?php if(!empty($arrval)){?>
        <img src="<?php echo e(url('dealer_images/'.$arrval)); ?>" alt="">
      <?php }else{?>
           <img src="<?php echo e(url('website/images/progetto.jpg')); ?>" alt="">
      <?php } ?>
      </div>
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        
    </div>
  </div>
</section>

<div class="container">
<!-- Product details section start here -->
<div class="col-md-12">
<!--  <ol class="breadcrumb">
    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
    <li class="active">Affiliati</li>
  </ol> -->
  
  <div class="col-md-12">
  <div class="product-detail-content offer">
  <div class="row">
    <div class="col-xs-8">
      <div class="category-tab-col">
     <?php $__currentLoopData = $getCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   
        <?php if($getAffiliatesDetail->category == $cat->id): ?><a href="#"><?php echo e($cat->title); ?></a> <?php endif; ?>
       
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
      <div class="product-detail-title"><?php echo e($getAffiliatesDetail->business_name); ?> <!--<span>Other Info: <a href="#">Read More</a></span>--></div>
    </div>
    <div class="col-xs-4">
      <div class="product-detail-right-col">
        <ul>
          <li><!-- <a class="dic" href="#">sconto: <?php echo e($getAffiliatesDetail->discount_amount); ?>%</a> --> &nbsp;</li>
          
     <!--  <?php if(!empty($getAffiliatesDetail->postalCode)): ?>
      <li><a href="#"><?php echo e($getAffiliatesDetail->postalCode); ?>, <?php echo e($getAffiliatesDetail->street); ?>,<?php echo e($getAffiliatesDetail->region); ?>, <?php echo e($getAffiliatesDetail->resiaddress); ?></a></li>
      <?php endif; ?> -->
          <?php  $current_url = Request::url();  ?>
          <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($current_url); ?>" target="_blank" data-href="<?php echo e($current_url); ?>" data-layout="button_count" class="share-button">Condividi</a></li>

          <li><strong><?php echo e(!empty($getAffiliatesDetail->resiaddress)?$getAffiliatesDetail->resiaddress:''); ?></strong></li>
    
        </ul>
        <h4>sconto<br> <span><?php echo e($getAffiliatesDetail->discount_amount); ?>%</span></h4>
      </div>
    </div>
  </div>
  </div>
</div>

  <!-- <div class="product-detail-information">
    <ul>
      <li>
        <div class="circul-col"><img src="images/home-icon.png"></div>
        <div class="title">45</div>
        <p>loream Ipsum</p>
      </li>
      <li>
        <div class="circul-col"><img src="images/user-icon.png"></div>
        <div class="title">45</div>
        <p>loream Ipsum</p>
      </li>
      <li>
        <div class="circul-col"><img src="images/spoon-icon.png"></div>
        <div class="title">45</div>
        <p>loream Ipsum</p>
      </li>
    </ul>
  </div> -->
<div class="col-md-12">
  <div class="product-detail-content">
    <h3>A proposito di  Cartoleria Rossi</h3>
  <div class="more">
    <p><?php  echo $getAffiliatesDetail->description;  ?></p>
    <a href="javascript:void(0);" onclick="readless();" class="view-button">Mostra di più</a> 
  </div>
  
  <div class="less">
    <p><?php  echo substr($getAffiliatesDetail->description,0, 300).'...';  ?></p>
    <a href="javascript:void(0);" onclick="readmore();" class="view-button">Mostra meno</a>
  </div>
  
  
  </div>
</div>
<div class="col-md-12">
  <div class="product-detail-content">
    <div class="sidebar-wrapper">
      <h3 style="margin-top: 21px;margin-bottom: 10.5px;">Orari di apertura:</h3>
      <div class="working-hours-col">
        <ul>
          <li>Lunedì <span>9 :00 - 18:00</span></li>
          <li>Martedì <span>9 :00 - 18:00</span></li>
          <li>Mercoledì <span>9 :00 - 18:00</span></li>
          <li>Giovedì <span>9 :00 - 18:00</span></li>
          <li>Venerdì <span>9 :00 - 18:00</span></li>
          <li>Sabato <span>9 :00 - 18:00</span></li>
        </ul>
      </div>

    

    </div>
  </div>
</div> 

  <?php if(!empty($getAffiliatesDetail->video)): ?>
  <div class="col-md-12">
    <div class="product-detail-content video-section">
   <h3>Video</h3>
   <div class="video-wrpper">
  <video width="100%" height="350" controls>
    <source src="<?php echo e(url('dealer_videos/'.$getAffiliatesDetail->video)); ?>" type="video/mp4">
  </video> 
   </div>
   </div>
 </div>
   <?php endif; ?>
   <div class="col-md-12">
  <div class="product-detail-content review-section">
  <?php if(!empty($ratingsdetail)): ?>
  <h3>Recensioni</h3> 
      <?php $__currentLoopData = $ratingsdetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userRatingsDetailsVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="review-row">
      <div class="review-img">
        <span>
    <?php if(!empty($userRatingsDetailsVal->profileimage)): ?>
          <img src="<?php echo e(url('images/profile_images/'.$userRatingsDetailsVal->profileimage)); ?>" alt="">
    <?php else: ?>
      <img src="<?php echo e(url('website/images/no-image.png')); ?>" alt="">
    <?php endif; ?>
        </span>
      </div>
      <div class="review-content">
    
    
        <div class="heading-part">
        <h4><?php echo e($userRatingsDetailsVal->headline); ?></h4>
        <div class="starts">
      <span class="fa fa-star <?php if($userRatingsDetailsVal->rate >= 1): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
      <span class="fa fa-star <?php if($userRatingsDetailsVal->rate >= 2): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
      <span class="fa fa-star <?php if($userRatingsDetailsVal->rate >= 3): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
      <span class="fa fa-star <?php if($userRatingsDetailsVal->rate >= 4): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
      <span class="fa fa-star <?php if($userRatingsDetailsVal->rate >= 5): ?><?php echo e('checked'); ?> <?php endif; ?>"></span>
        </div>
      </div>
        <p>
         <?php echo e($userRatingsDetailsVal->review); ?>

        </p>
        <p class="date"><i class="fa fa-calendar"></i> <?php echo e(date('m/d/Y',strtotime($userRatingsDetailsVal->created_at))); ?> </p>
    
      </div>
    
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
  <?php endif; ?>
    
    <div class="form-section">
  <?php if(Auth::user()): ?>
    <?php if(Auth::user()->role_type==3): ?>
      <h3 style="margin: revert;font-size: x-large;">Contact Form</h3>
      <div class="starts">
        <span class="content">Review</span>
        <div id="rateit7">
    </div>
      </div>
    
    
    
      <div class="form-part">
      <div class="row">
        <form role="form" method="post" action="<?php echo e(url('affiliates-review/'.$getAffiliatesDetail->id)); ?>" id="filter-form" data-parsley-validate enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="form-group <?php echo e($errors->has('rate') ? ' has-error' : ''); ?>  col-md-12">   
    <input type="hidden" id="rate_id" name="rate_id" value="<?php if(!empty($userRatingsDetails->id)): ?><?php echo e($userRatingsDetails->id); ?><?php endif; ?>">
    <input type="hidden" id="rate" name="rate" value="<?php if(!empty($userRatingsDetails->rate)): ?><?php echo e($userRatingsDetails->rate); ?><?php endif; ?>">
    
    <input type="hidden" id="userid" name="userid" value="<?php if(!empty(Auth::user()->id)): ?><?php echo e(Auth::user()->id); ?><?php endif; ?>">
    
    <input type="hidden" id="affid" name="affid" value="<?php if(!empty($getAffiliatesDetail->id)): ?><?php echo e($getAffiliatesDetail->id); ?><?php endif; ?>">
    
    
    
       <?php if($errors->has('rate')): ?>
      <span class="help-block">
        <strong><?php echo e($errors->first('rate')); ?></strong>
      </span>
       <?php endif; ?>
    
    </div>
    
        <div class="col-md-6">
          <div class="form-group <?php echo e($errors->has('headline') ? ' has-error' : ''); ?>">

         
          <input class="form-control" type="text" name="headline" id="headline" readonly value="<?php if(!empty(Auth::user()->name)): ?><?php echo e(Auth::user()->name); ?><?php endif; ?>" />
          <?php if($errors->has('headline')): ?>
          <span class="help-block">
            <strong><?php echo e($errors->first('headline')); ?></strong>
          </span>
           <?php endif; ?>

           
        
      </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <input type="email" readonly class="form-control" id="email" placeholder="Email" value="<?php if(!empty(Auth::user()->email)): ?><?php echo e(Auth::user()->email); ?><?php endif; ?>">
            </div>
        </div>
        <div class="col-md-12">
      <div class="form-group <?php echo e($errors->has('review') ? ' has-error' : ''); ?>">
        <textarea class="form-control" name="review" id="review"><?php if(!empty($userRatingsDetails->review)): ?><?php echo e($userRatingsDetails->review); ?><?php endif; ?></textarea>
        <?php if($errors->has('review')): ?>
        <span class="help-block">
        <strong><?php echo e($errors->first('review')); ?></strong>
        </span>
        <?php endif; ?>
      </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <button type="submit" name="reviewbutton" value="1">Submit</button>
            </div>
        </div>
        </form>
      </div>
    </div>
   <?php endif; ?>
   <?php else: ?>
     <a href="<?php echo e(url('affiliates-review/'.$getAffiliatesDetail->id)); ?>" class="btn btn-default">Scrivere una recensione</a>
  <?php endif; ?>
    </div>
  </div>
</div>
</div>
<!-- Product details section start end -->


<!-- sidebar section start here -->
<!-- sidebar section start end -->
</div>
      
    </div>   
</div>


 
<script type="text/javascript">
    $(function () { $('#rateit7').rateit({ max: 5, step: 1, backingfld: '#rate' }); });
</script>
<style>
textarea.form-control {
    height: 200px;
}
.form-control, input {
    border-width: 2px;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.single-bottom1 h6 {
    background: #F3F3F3;
    padding: 10px;
    color: #333;
    font-size: 1.35em;
    margin-top: 0.2em;
    font-family: 'JosefinSans-Bold';
}
.checked {
    color: orange;
}
.fa {
    font-size: 14px;
}

</style>


<script type="text/javascript">
$(document).ready(function(){
  $('.more').hide();
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
    //autoHeight:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:<?php echo e($arc); ?>

          },
          1000:{
              items:<?php echo e($arc); ?>

          }
      }
  });

  $( ".owl-prev").html('<i class="fa fa-angle-left"></i>');
  $( ".owl-next").html('<i class="fa fa-angle-right"></i>');
  
});

 function readmore(){
  $('.more').show();
  $('.less').hide();
  }
  
  function readless(){
  $('.more').hide();
  $('.less').show();
  }
</script>
 

 <?php $__env->stopSection(); ?>
 

<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>