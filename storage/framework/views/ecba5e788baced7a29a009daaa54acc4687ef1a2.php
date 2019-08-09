<?php $__env->startSection('content'); ?>


  <div id="Banner_wrapper" class="bg-parallax" style="background-image:url(<?php echo e(url('website/images/card-dark.jpg')); ?>);">
  <div id="Subheader">
   <div class="container">
    <div class="inner_banner_title">
     <h1 class="title">Bklic Card</h1>
    </div>
   </div>
  </div>
 </div>

  <div id="Content">




  <div class="featured">
  <div id="service_section" class="section">
       <div class="container">
         <h2 class="title_heading">prodotti sponsorizzati</h2>
        
         <div class="feature-grids">

          <?php $__currentLoopData = $getCard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-md-4 col-sm-4 jewel">
                 <a href="<?php echo e(url('card-detail/'.$card->id)); ?>"><img src="<?php echo e(url('images/digital-card/'.$card->image)); ?>" alt=""/>   
                     <div class="arrival-info">
                         <h4><?php echo e($card->title); ?></h4>
                         <p>&euro;<?php echo e($card->amount); ?></p>
                         <span class="pric1"><del> &euro;<?php echo e($card->amount); ?></del></span>
                       
                     </div>
                     <div class="viw">
                        <a href="<?php echo e(url('card-detail/'.$card->id)); ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                     </div>
                     <div class="shrt">
                        <a href="<?php echo e(url('card-detail/'.$card->id)); ?>"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Shortlist</a>
                     </div></a>
             </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


         </div>
     </div> 
</div>
 </div>


 
<!--- The project --->
 <div id="project_section" class="section">
   <div class="container">
    <div class="who_we_are">
        <h2>La card per te</h2>
     <p>Se sei arrivata/o sin qui e perché sei una persona attenta al risparmio, e nel darti il benvenuto, vogliamo farti un <b>regalo</b>: la <b>Bklic card</b>.</p>
     
    </div>
   </div>
  </div>
 <!--- Values Section--->
 <div id="values_section" class="section">
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-6 col-md-6 col-sm-12">
 <div class="row image_frame">
 <div class="image_wrapper">
 <img src="<?php echo e(url('website/images/overspending.jpg')); ?>" class="img-responsive" alt="">
 </div>
 </div>
 </div>
 <div class="col-lg-6 col-md-6 col-sm-12">
 <div class="row text_frame">
 <div class="text_wrapper">
 <h2 class="title_heading">Un'idea vincente</h2>
 <p>È&nbsp;<b>gratis</b>con la prima registrazione Dura 30 giorni dalla data di emissione. </p>
<p>La trovi allegata alla mail che hai inserito in fase di registrazione. Stampala e portala con te.</p>
<p>Pensa a quante cose puoi fare con i soldi risparmiati, un <b>viaggio</b>, un <b>corso </b>per te o per i figli, un regalo importante <b>per chi ami</b>?</p>
 </div>
 </div>
 </div>
 
 </div>
 </div>
 </div>
 
  <!--- Become better Section--->
 <div id="better_section" class="section">
 <div class="container-fluid">
 <div class="row">
 
 <div class="col-lg-6 col-md-6 col-sm-12">
 <div class="row text_frame">
 <div class="text_wrapper">
 <h2 class="title_heading">Non è un cashback, Bklic è il vero risparmio.</h2>
 <p>Grazie alla <b>Bklic Card</b>, hai la possibilità di fare la spesa negli esercizi commerciali aderenti al circuito "<b>La via dello shopping</b>" che ti consente di risparmiare concretamente sugli acquisti di tutti i giorni. Non un semplice sconto, ma <b>un forte risparmio immediato</b> che ti consente di <b>aumentare il tuo potere di acquisto</b>. Immagina di avere a disposizione almeno <b>100 €</b> in più al mese e di utilizzarli come più ti piace. Adesso immagina di diventare <b>promoter </b>e di condividere questa possibilità di <b>risparmio </b>con le persone a te care creandoti un <b>guadagno </b>extra mensile.</p>
 </div>
 </div>
 </div>
 <div class="col-lg-6 col-md-6 col-sm-12">
 <div class="row image_frame">
 <div class="image_wrapper">
 <img src="<?php echo e(url('website/images/cashback.jpg')); ?>" class="img-responsive" alt="">
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>


<?php if(!empty($getVideo)){?>
 <div class="featured">
  <div id="service_section" class="section">
       <div class="container">
        <!--  <h2 class="title_heading">prodotti sponsorizzati</h2> -->
        
         <div class="feature-grids">

          <?php $__currentLoopData = $getVideo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $videoitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-md-4 col-sm-4 jewel">
                <iframe width="100%" height="400" src="<?php echo e(url('dealer_videos/'.$videoitem->video)); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


         </div>
     </div> 
</div>
 </div>
<?php }?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website-layout.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>