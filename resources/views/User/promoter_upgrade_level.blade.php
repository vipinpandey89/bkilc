@extends('layouts.profile_dashboard')



@section('content')

<?php

$userAs= Auth::user()->user_as;
$getAsPerlevelFounder =  Helper::getUpgradeValuePoint($userAs); 

if($userProfile->user_as=='BK0'){

  $currentUpgradeLevel= 'BK2';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

 $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter==$downline || $countChildPromoter > $downline){

          $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

          $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

         }else{

            $BusinessEmail= '';

            $paypalUrl=  '';

            $message= 'La downline non è completa '.$downline.'! ';

           $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

         }



}elseif($userProfile->user_as=='BK2'){

  $currentUpgradeLevel='BK4';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);



  $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter==$downline || $countChildPromoter > $downline){

            $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

            $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

             $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

           }else{

              $BusinessEmail= '';

              $paypalUrl=  '';

                $message= 'La downline non è completa '.$downline.'! ';

                $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

           }

 }elseif($userProfile->user_as=='BK4'){

  $currentUpgradeLevel='BK6';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

  $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter==$downline || $countChildPromoter > $downline){

          $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

          $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

         }else{

            $BusinessEmail= '';

            $paypalUrl=  '';

            $message= 'La downline non è completa '.$downline.'! ';

            $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

         }



}

elseif($userProfile->user_as=='BK6'){

  $currentUpgradeLevel='BK8';

   $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);
   //echo '<pre>';print_r($levelData);die;

  $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter==$downline || $countChildPromoter > $downline){

          $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

          $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

           $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0'; 

         }else{

            $BusinessEmail= '';

            $paypalUrl=  '';

              $message= 'La downline non è completa '.$downline.'!';

              $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

         }

}elseif ($userProfile->user_as=='BK8') {

  $currentUpgradeLevel='BK10';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

   if($countChildPromoter==$downline || $countChildPromoter > $downline){

        $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

        $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

       }else{

          $BusinessEmail= '';

          $paypalUrl=  '';

           $message= 'La downline non è completa '.$downline.'!';

           $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

       }

}elseif($userProfile->user_as=='BK10'){

  $currentUpgradeLevel='BK12';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter==$downline || $countChildPromoter > $downline){

        $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

        $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

     }else{

          $BusinessEmail= '';

          $paypalUrl=  '';

          $message= 'La downline non è completa '.$downline.'! ';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

       }

}elseif($userProfile->user_as=='BK12'){

  $currentUpgradeLevel='P';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter==$downline || $countChildPromoter > $downline){

        $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

        $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

     }else{

          $BusinessEmail= '';

          $paypalUrl=  '';

          $message= 'La downline non è completa '.$downline.'! ';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

       }

}elseif($userProfile->user_as=='P'){

  $currentUpgradeLevel='PT';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter==$downline || $countChildPromoter > $downline){

        $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

        $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

     }else{

          $BusinessEmail= '';

          $paypalUrl=  '';

          $message= 'La downline non è completa '.$downline.'! ';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

       }

}

elseif($userProfile->user_as=='PT'){

  $currentUpgradeLevel='PE';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter==$downline || $countChildPromoter > $downline){

        $BusinessEmail= !empty($paypalDetail->business_id)?$paypalDetail->business_id:'';

        $paypalUrl=  ($paypalDetail->paypal_type=='1')?'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

     }else{

          $BusinessEmail= '';

          $paypalUrl=  '';

          $message= 'La downline non è completa '.$downline.'! ';

          $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

       }

}elseif($userProfile->user_as=='PE'){

  $currentUpgradeLevel='PE';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

  $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

  $successmessage= 'Hai completato il tuo livello di upgration';

   $BusinessEmail= '';

   $paypalUrl=  '';         
   
  }

?>



<div id="page-wrapper" >

  <div id="page-inner">

      <div class="row">

                    <div class="col-md-8 heading">

                     <h2> Upgrade</h2>                     

                    </div> 

                    <div class="col-md-4 text-right">

                        <div class="breadcumb">

                            <ul>

                                <li><a href="{{url('/home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Home</a></li>

                                <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>

                                <li><a class="current" href="#">upgrade</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

  <hr/>



   <div class="row">



    <div class="col-md-12">

     

            @if (!empty($message))

               <div class="alert alert-danger alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button> 

                        <strong>{{$message}}</strong>

                </div>

             @endif


              @if (!empty($successmessage))

               <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button> 

                        <strong>{{$successmessage}}</strong>

                </div>

             @endif



      <div class="panel panel-default">

        <div class="profile-sec">

          <form method="post" action="{{$paypalUrl}}">

            {{ csrf_field() }}

          <div class="profile-inner profile-user-bx ">

            <h3>Richiedi l’upgrade</h3>

            <div class="lavel-upgrade">

              <ul>

                <li class="">{{!empty($userProfile)?$userProfile->user_as:''}}</li>

                <li class="arrow-img"><i class="fa fa-arrow-right"></i></li>

                <li class="blue-txt">{{!empty($currentUpgradeLevel)?$currentUpgradeLevel:''}}</li>

              </ul>

            </div>

            <?php if($userProfile->founder=='0' && $getAsPerlevelFounder->level_founder_status=='1' && $userProfile->user_as!='PE')

            {?>

             <!--<input type="checkbox" name="become_founder" value="1">  Clicca per diventare un founder    &euro;{{$getAsPerlevelFounder->become_founder_euro}} -->

           <?php  } ?>

            <p>             

           </p>


           <?php if($levelData->level_upgrade_point > 0 && $userProfile->user_as!='PE'){?>
            <button class="btn btn-primary" type="submit">Upgrade</button>
          <?php }elseif($userProfile->user_as=='PE'){            
            ?>

             <a href="javascript:void()" class="btn btn-primary">Hai completato il tuo livello di upgration</a>

          <?php }else{?>
                   <a href="javascript:void()" class="btn btn-primary">Non puoi aggiornare ora il livello. quantità impostata dal back-end 0</a>
          <?php }
          ?>

          </div>



           <input type="hidden" name="business" value="{{$BusinessEmail}}">  

            <input type="hidden" name="cmd" value="_xclick"> 

            <input type="hidden" name="item_name" value="{{ !empty($userProfile)?$userProfile->name:'' }}">

            <input type="hidden" name="item_number" value="{{ !empty($userProfile)?$userProfile->id:'' }}">

            <input type="hidden" id="amount" name="amount" value="{{!empty($levelData)?$levelData->level_upgrade_point:''}}">

            <input type="hidden" name="currency_code" value="EUR">    

            <input type="hidden" name="custom" id="custom" value="{{$currentUpgradeLevel}}">                                        

            <input type='hidden' name='cancel_return' value='{{url('paypal/cancel')}}'>

            <input type='hidden' name='return' value='{{url('paypal/getupgradelevel')}}'> 

           <!-- <input type='hidden' name='notify_url' value='{{url('paypal/ipnstatus')}}'> -->

            <input type='hidden' name='notify_url' value='https://www.komete.it'>

        </form>



        </div>

      </div>                   

    </div>

  </div>              

</div>            

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<script>

 $(document).ready(function(){

    

    var amount= '<?php echo $levelData->level_upgrade_point;?>';

    

    var levelBecomeFounder = '<?php echo $getAsPerlevelFounder->become_founder_euro;?>';




    $('input[type="checkbox"]').click(function(){

     // alert();

            if($(this).prop("checked") == true){



                var finalAmount = parseFloat(amount) + parseFloat(levelBecomeFounder);

               //alert(finalAmount);

                $('#amount').val(finalAmount);

            }

            else if($(this).prop("checked") == false){               

                $('#amount').val(amount);

            }

        });



});



</script>

@endsection

