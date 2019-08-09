<?php $__env->startSection('content'); ?>
<?php
$BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';
$paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';
?>
<div id="page-wrapper" >
  <div id="page-inner">  
   <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">                                    
             <?php if(Session::has('success')): ?>
             <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><?php echo e(Session::get('success')); ?></strong>
            </div>
            <?php endif; ?>
            <div class="form-group form-group">
              <form role="form" method="post" action="<?php echo e($paypalUrl); ?>"  id="demo-form" data-parsley-validate>
               <?php echo e(csrf_field()); ?>          

               <table class="table table-bordered" style="border:none;">


                <tbody>									

                  <tr style="border:none;">
                    <th style="border:none;">Diventare founder</th>
                  </tr> 
                  <tr> 
                    <td style="border:none;"><span style="font-size: 30px;font-weight: bold;" class="superscript">&euro;</span>
                      <span style="font-size: 30px;font-weight: bold;"><?php echo e(!empty($getAsPerlevelFounder)?$getAsPerlevelFounder->become_founder_euro:'0'); ?></span></td>
                    </tr>											

                  </tbody>
                </table> 

                <input type="hidden" name="business" value="<?php echo e($BusinessEmail); ?>">  
                <input type="hidden" name="cmd" value="_xclick"> 
                <input type="hidden" name="item_name" value="<?php echo e(!empty($userProfile)?$userProfile->name:''); ?>">
                <input type="hidden" name="item_number" value="<?php echo e(!empty($userProfile)?$userProfile->id:''); ?>">
                <input type="hidden" id="amount" name="amount" value="<?php echo e(!empty($getAsPerlevelFounder)?$getAsPerlevelFounder->become_founder_euro:'0'); ?>">
                <input type="hidden" name="currency_code" value="EUR">    
           <!--      <input type="hidden" name="custom" id="custom" value="">      -->                                   
                <input type='hidden' name='cancel_return' value='<?php echo e(url('paypal/cancel')); ?>'>
                <input type='hidden' name='return' value='<?php echo e(url('paypal/become-founder-response')); ?>'> 
                <!-- <input type='hidden' name='notify_url' value='<?php echo e(url('paypal/ipnstatus')); ?>'> -->
                <input type='hidden' name='notify_url' value='https://www.komete.it'>

                <button type="submit" name="updateprofile" class="btn btn-default">Salva</button>  

              </form>                                  
            </div>
            <div class="form-group form-group">
              <!--<h4>Elenco dei proprietari di carte</h4>-->

              <span style="font-size: 20px;font-weight: bold;color: green;"> Clicca per diventare un founder <span></span> </span>

            </div>

          </div>
        </div>
      </div>                   
    </div>
  </div>              
</div>            
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.profile_dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>