<?php $__env->startSection('content'); ?>
<div class="single-sec">
   <div class="container">
     <ol class="breadcrumb">
       <li><a href="index.html">Home</a></li>
       <li class="active">prodotti</li>
     </ol>
     <!-- start content --> 
     <div class="col-md-9 det">
         <div class="single_left">
           <div class="flexslider">
              <ul class="slides" style="list-style: none;">
                <li data-thumb="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>">
                  <img style="max-width: 100%;" src="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>" />
                </li>
               <!--  <li data-thumb="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>">
                  <img src="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>" />
                </li>
                <li data-thumb="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>">
                  <img src="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>" />
                </li>
                <li data-thumb="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>">
                  <img src="<?php echo e(url('images/digital-card/'.$getCard->image)); ?>" />
                </li> -->
              </ul>
            </div>
            <!-- FlexSlider -->
            <!--   <script defer src="<?php echo e(URL::asset('website/js/jquery.flexslider.js')); ?>"></script>
            <link rel="stylesheet" href="<?php echo e(URL::asset('website/css/flexslider.css')); ?>" type="text/css" media="screen" /> -->

              <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
              animation: "slide",
              controlNav: "thumbnails"
              });
            });
            </script>
         </div>
          <div class="single-right">
           <h3><?php echo e($getCard->title); ?></h3>
          
             <form method="post" action="<?php echo e(url('cart-add')); ?>" class="sky-form">
                 <fieldset>         
                 <section>
                   <div class="rating">
                  <input type="radio" name="stars-rating" id="stars-rating-5">
                  <label for="stars-rating-5"><i class="icon-star"></i></label>
                  <input type="radio" name="stars-rating" id="stars-rating-4">
                  <label for="stars-rating-4"><i class="icon-star"></i></label>
                  <input type="radio" name="stars-rating" id="stars-rating-3">
                  <label for="stars-rating-3"><i class="icon-star"></i></label>
                  <input type="radio" name="stars-rating" id="stars-rating-2">
                  <label for="stars-rating-2"><i class="icon-star"></i></label>
                  <input type="radio" name="stars-rating" id="stars-rating-1">
                  <label for="stars-rating-1"><i class="icon-star"></i></label>
                  <div class="clearfix"></div>
                 </div>
                </section>
                </fieldset>
          
            <div class="cost">
                 <div class="prdt-cost">
                     <ul>
                                      
                       <li> prezzo di vendita:</li>
                       <li class="active">&euro;<?php echo e($getCard->amount); ?></li>
                    
                      <input type="submit" class="btn btn-primary btn-lg" name="addtocard" value="ACQUISTA ORA">
                     </ul>
               </div>

                  <?php echo e(csrf_field()); ?>


                  <input type="hidden" name="cart_id" value="<?php echo e($getCard->id); ?>">
                  <input type="hidden" name="amount" vaue="<?php echo e($getCard->amount); ?>">
                  <input type="hidden" name="cart_name" value="<?php echo e($getCard->title); ?>">

               </form>
            
             <div class="clearfix"></div>
            </div>
            
            <div class="single-bottom1">
            <h6>Dettagli</h6>
            <p class="prod-desc"> <?php echo e(strip_tags($getCard->description)); ?>.</p>
           </div>          
          </div>
         
      </div>
    
      </div>      
      <!---->
        </div>
      
    </div>   
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>