@extends('layouts.dashboard')

@section('content')
<div id="page-wrapper" >
  <div id="page-inner">
  
<div class="text-right">
  
    @if(Auth::user()->role_type=='2')

<?php

if($userProfile->user_as=='BK0'){

  $currentUpgradeLevel= 'BK2';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

 $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

       //echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";    

         }

}elseif($userProfile->user_as=='BK2'){

  $currentUpgradeLevel='BK4';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

  $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

        // echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  

           }

 }elseif($userProfile->user_as=='BK4'){

  $currentUpgradeLevel='BK6';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

  $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

       // echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  

         }

}

elseif($userProfile->user_as=='BK6'){

  $currentUpgradeLevel='BK8';

   $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

  $downline = !empty($levelData)?$levelData->level_downline:'';

     if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

     // echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  
         }

}elseif ($userProfile->user_as=='BK8') {

  $currentUpgradeLevel='BK10';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

   if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

   // echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  

       }

}elseif($userProfile->user_as=='BK10'){

  $currentUpgradeLevel='Bk12';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

      //echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  

       }

}elseif($userProfile->user_as=='BK12'){

  $currentUpgradeLevel='P';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

      // echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  

       }

}elseif($userProfile->user_as=='P'){

  $currentUpgradeLevel='PT';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

      //echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  

       }

}

elseif($userProfile->user_as=='PT'){

  $currentUpgradeLevel='PE';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

   $downline = !empty($levelData)?$levelData->level_downline:'';

 if($countChildPromoter >= $downline && $userProfile->is_profile_complete=='1'){

      //echo "<div class='bkx-wrapper'><a href=".url('upgrade-level').">Clicca per eseguire lupgrade".Auth::user()->user_as." </a></div>";  
       }

}
elseif($userProfile->user_as=='PE'){

  $currentUpgradeLevel='PE';

  $levelData = Helper::getUpgradeValuePoint($currentUpgradeLevel);

  $founderEuro= !empty($levelData)?$levelData->become_founder_euro:'0';

  $successmessage= 'Hai completato il tuo livello di upgration';

   $BusinessEmail= '';

   $paypalUrl=  '';   

   $downline='';      
   
  }
$remaningdownline= $downline - $countChildPromoter ;

?>
</div>
  <hr />

       <div class="row">

	   <div class="col-md-7 r-p-l r-p-r">
	   
	   <div class="col-md-4 col-sm-6 custom_width">
	   <div class="panel panel-back noti-box r3_counter_box box-shadow box-1">
	   <i class="fa fa-user user1 icon-rounded"></i>
	   <div class="stats">
	   <h5>{{!empty($countChildPromoter)?$countChildPromoter:'0'}}</h5> 
	   <span><a href="#"> In Prima Linea</a></span>
	   </div>
	   <div class="more_info">
	   <a href="#">Scopri di più <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
	   </div>
	   </div>
	   
	   <div class="col-md-4 col-sm-6 custom_width">
	   <div class="panel panel-back noti-box r3_counter_box box-shadow box-2">
	   <i class="fa fa-user user2 icon-rounded"></i>
	   <div class="stats">
	   <h5>{{!empty($dashBoardData['AffiliatesData'])?$dashBoardData['AffiliatesData']:'0'}}</h5> 
	   <span><a href="#"> Affiliati</a></span>
	   </div>
	   <div class="more_info">
	   <a href="#">Scopri di più <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
	   </div>
	   </div>
	   
	   <div class="col-md-4 col-sm-12 custom_width">
	   <div class="panel panel-back noti-box r3_counter_box box-shadow box-3">
	   <i class="fa fa-user user3 icon-rounded"></i>
	   <div class="stats">
	   <h5>{{!empty($dashBoardData['cardUser'])?$dashBoardData['cardUser']:'0'}}</h5> 
	   <span><a href="#"> Card Vendute</a></span>
	   </div>
	   <div class="more_info">
	   <a href="#">Scopri di più <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
	   </div>
	   </div>
	   
	   
	   <!--<div class="col-md-12">
	    <div class="card_btn sub_title"><a href="javascript:void()">Ancora <span>{{($remaningdownline > 0)?$remaningdownline:'0'}}</span>  Linee per L'upgrade!</a></div>
	   </div>-->
	   
	   
	   </div>
	   
	   <div class="col-md-5 r-p-r r-p-l">
	   
	   <div class="col-md-6 col-sm-12 custom_width">
	   <div class="panel panel-back noti-box r3_counter_box box-shadow box-4">
	   <i class="fa fa-eur user4 icon-rounded"></i>
	   <div class="stats">
	   <h5>{{!empty($dashBoardData['GetCommissionUserCurrentMonth'])?round($dashBoardData['GetCommissionUserCurrentMonth'],2):'0'}}<sup>P.V.</sup></h5> 
	   <span><a href="#"> QUESTO MESE</a></span>
	   </div>
	   <div class="more_info">
	   <a href="#">Scopri di più <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
	   </div>
	   </div>
	   
	   <div class="col-md-6 col-sm-12 custom_width">
	   <div class="panel panel-back noti-box r3_counter_box box-shadow box-5">
	   <i class="fa fa-eur user5 icon-rounded"></i>
	   <div class="stats">
	   <h5>{{!empty($dashBoardData['GetCommissionUserPreviousMonth'])?round($dashBoardData['GetCommissionUserPreviousMonth'],2):'0'}}<sup>P.V.</sup></h5> 
	   <span><a href="#"> MESE PRECEDENTE</a></span>
	   </div>
	   <div class="more_info">
	   <a href="#">Scopri di più <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
	   </div>
	   </div>
	   </div>
	   
	   </div>
	   
            <!--<div class="col-md-4 col-sm-4">           
              <div class="panel panel-back noti-box">

                <div class="panel_header">
                  <h3><i class="fa fa-user" aria-hidden="true"></i>  {{!empty($userProfile)?$userProfile->name:''}}</h3>  
                </div>

                <ul class="user_name_list">
                  <li><span>{{!empty($countChildPromoter)?$countChildPromoter:'0'}}</span> <a href="#"> In Prima Linea</a></li>

                  <li><span>{{!empty($dashBoardData['AffiliatesData'])?$dashBoardData['AffiliatesData']:'0'}}</span> <a href="#"> Affiliati</a></li>

                  <li><span>{{!empty($dashBoardData['cardUser'])?$dashBoardData['cardUser']:'0'}}</span> <a href="#"> Card Vendute</a></li>

                </ul>

                <div class="card_btn"><a href="javascript:void()">Ancora <span>{{($remaningdownline > 0)?$remaningdownline:'0'}}</span>  Linee per L'upgrade!</a></div>

              </div>
            </div>-->


            <!---<div class="col-md-8 col-sm-8">           
              <div class="panel panel-back chart-box">
                <div class="panel_header">

                 <h3><i class="fa fa-eur" aria-hidden="true"></i> Guadagni mensili</h3>  
               </div>

               <div class="row">
                <div class="col-xs-12">
                  <div class="data-cal">
                    <div class="data-label color-blue">QUESTO MESE</div>
                    <div class="data-val color-blue"><p>{{!empty($dashBoardData['GetCommissionUserCurrentMonth'])?round($dashBoardData['GetCommissionUserCurrentMonth'],2):'0'}}<sup>P.V.</sup></p></div>
                  </div>

                  <div class="data-cal">
                    <div class="data-label">MESE PRECEDENTE</div>
                    <div class="data-val"><p>{{!empty($dashBoardData['GetCommissionUserPreviousMonth'])?$dashBoardData['GetCommissionUserPreviousMonth']:'0'}}<sup>P.V.</sup></p></div>
                  </div>

                  <div class="clearfix"></div>
                </div>
              </div>

            </div>
          </div>--->

        </div>
        @endif

        <div class="row">
          <div class="col-md-12"> 


		  
	<!-- 		<div class="panel panel-default ">
			<div class="panel-heading">
			<h3 class="panel-title"><span class="icon-panel"><i class="fa fa-user" aria-hidden="true"></i></span> News</h3>
			</div>
			<div class="panel-body"> 
			
			<div class="news">

                    @if(!empty($dashBoardData['allNewsEvents']))
                      @foreach($dashBoardData['allNewsEvents'] as $data)
                  
					  <div class="media">
							<div class="media-left">
							<a href="#" class="avtar_img">
							  <img class="media-object" src="http://bklic.komete.it/public/images/profile_images/1562580627.png" alt="...">
							</a>
							</div>
							<div class="media-body">
							<h4 class="media-heading">{{$data->title}}.</h4>
							<label class="label label-warning"><a href="#">{{date('d-m-Y',strtotime($data->created_at))}}</a></label>
							<p>jxhsgvfjxmjvbsjcfvbsjcbmxbvmb</p>
							</div>
							</div>
					  
                      @endforeach
                    @endif

                  </div>
			</div>
			</div> -->



          
            <!---<div class="panel panel-back news-box">
              <div class="panel_header">
			  <span class="icon-panel"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>
                <h3><i class="fa fa-user" aria-hidden="true"></i> News & eventi</h3>  
              </div>

              <div class="row">
                <div class="col-sm-12">

                  <div class="news">

                    @if(!empty($dashBoardData['allNewsEvents']))
                      @foreach($dashBoardData['allNewsEvents'] as $data)
                    <ul class="list-inline">
                      <li class="list-inline-item"><div class="card_btn"><a href="#">{{date('d-m-Y',strtotime($data->created_at))}}</a></div></li>
                      <li class="list-inline-item"><p>{{$data->title}}. </p></li>
                    </ul>
                      @endforeach
                    @endif

                  </div>
                </div>

              </div>
            </div>--->

          </div>
        </div>



      </div>                    
    </div>       
  </div>   
</div>      
</div>
@endsection
