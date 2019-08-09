<?php $__env->startSection('content'); ?>

<div class="checkout">

<?php if(count($carDetail)>0): ?>   
   <div class="container">  
     <ol class="breadcrumb">
      <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
      <li class="active">carrello</li>
     </ol>
     <div class="col-md-9 product-price1">
       <div class="check-out">      
         <div class=" cart-items">
           <h3>Il mio carrello (<?php echo e(count($carDetail)); ?>)</h3>
            <script>$(document).ready(function(c) {
              $('.close1').on('click', function(c){
                $('.cart-header').fadeOut('slow', function(c){
                  $('.cart-header').remove();
                });
                });   
              });
             </script>
          <script>$(document).ready(function(c) {
              $('.close2').on('click', function(c){
                $('.cart-header1').fadeOut('slow', function(c){
                  $('.cart-header1').remove();
                });
                });   
              });
             </script>
           <?php if(Session::has('success')): ?>
               <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong><?php echo e(Session::get('success')); ?></strong>
                </div>
         <?php endif; ?>   
       
            
           <div class="in-check" >
              <ul class="unit">
              <li><span>Articolo</span></li>
              <li><span>nome del prodotto</span></li>    
              <li><span>Prezzo unitario</span></li>
              <li><span>Disponibilità</span></li>
              <li> </li>
              <div class="clearfix"> </div>
              </ul>
                   <?php
                      $total=0; 
                    ?>

                 <?php $__currentLoopData = $carDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php $getImage= Helper::getImageCard($detail->id);?>
                    <ul class="cart-header">
                     <a href="<?php echo e(url('remove-cart/'.$detail->rowId)); ?>"> <div class="close1"></div></a>
                    <li class="ring-in"><a href="<?php echo e(url('card-detail/'.$detail->id)); ?>" ><img src="<?php echo e(url('images/digital-card/'.$getImage->image)); ?>" class="img-responsive" alt=""></a>
                    </li>
                    <li><span><?php echo e($detail->name); ?></span></li>
                    <li><span>&euro; <?php echo e($detail->price); ?></span></li>
                    <li><span>Disponibile</span></li>
                    
                    <div class="clearfix"> </div>
                    </ul>
                  <?php $total = $total + $detail->price;?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
           </div>


          </div>            
       </div>
     </div>
     <div class="col-md-3 cart-total">
       <a class="continue" href="<?php echo e(url('/bklic-card')); ?>"> Altre card</a>
      <!-- <div class="price-details">
         <h3>Price Details</h3>
         <span>Total</span>
         <span class="total">350.00</span>
               
         <div class="clearfix"></div>        
       </div> -->
       <h4 class="last-price">TOTALE</h4>
       <span class="total final">&euro;<?php echo e($total); ?></span>
       <div class="clearfix"></div>
       <a class="order" href="<?php echo e('checkout'); ?>">Invia ordine</a>
       <!--<div class="total-item">
         <h3>OPTIONS</h3>
         <h4>COUPONS</h4>
         <a class="cpns" href="#">Apply Coupons</a>
         <p><a href="#">Log In</a> to use accounts - linked coupons</p>
       </div>-->
      </div>
   </div>
   <?php else: ?>
   <div class="container"> 
 <div class="col-md-9 product-price1">
      <div class="alert alert-dark" role="alert">
      Il carrello è vuoto  <a href="<?php echo e(url('bklic-card')); ?>" class="alert-link">Other cards</a>.
    </div>
 </div>
</div>
   <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>