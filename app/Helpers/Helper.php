<?php
// Custom helper class that contains the common function to be used in entire application

namespace App\Helpers;

use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Commission;
use App\PaymentHistory;
use App\UploadCard;
use App\MinimumValuePoint;
use App\Notifications;
use App\Convertion;


class Helper
{
    /**
     * Function to get trip addon ariline list
     * @param void
     * @return array
     */


   public static function getTree($id,$level='1')
    {        
         $level++;

           $getParent = User::where(['role_type'=>'2','parent_id'=>$id,'is_deleted'=>'0','status'=>'1'])->get();

           if($level <= '12')
           {
            
                    echo '<ul>';           

                    foreach($getParent as $parent){

                            if(!empty($parent->profileimage)){

                                $image = url('/images/profile_images/'.$parent->profileimage);

                            }else{
                                $image = url('front/assets/img/find_user.png');

                            }
                       
                         echo '<li>                
                        <a href="javascript:void(0)"  class="chlid" data-id="'.$parent->id.'" data-target=".bs-example-modal-sm">
                            <div class="user-img"><img src="'.$image.'"></div><div class="name">'.$parent->name.'</div><div class="profile">'.$parent->user_as.'</div>
                        </a>';
                        
                        $getSubChild = User::where(['role_type'=>'2','parent_id'=>$parent->id])->first();

                        if(count($getSubChild)>0) { 

                            self::getTree($parent->id,$level);
                        
                        }

                        echo "</li>";
                    }
                echo "</ul>";
       }

    }   



    public static function GetCommission($id,$amount,$level='1',$insertId)
    {        


          $GetParentUeser = DB::select("select u2.id,u2.parent_id,u1.name,u1.user_as,u1.is_deleted as user_delete,u1.status as user_status FROM `users` as u1 INNER JOIN users as u2 on u1.id= u2.parent_id where u2.id=".$id."  and u1.status='1' and u1.is_deleted='0' ");


      
            if($level<='12')
            {

                  //echo '<pre>';print_r($GetParentUeser);die;
         
                    if($level == '1')
                    {                              


                          $GetDirectSale = User::where(['id'=>$id])->first();


                              $loginUserAs = $GetDirectSale->user_as;
                            

                             if($loginUserAs=='BK0'){                                


                                    $GetPercentage = DB::select('select level_percentage from livello_list where id="16"');

                                    $Percentage = !empty($GetPercentage)  ?  $GetPercentage[0]->level_percentage  :  '';                           

                                  
                                     $point = floatval(($amount*$Percentage)/100);

                                     $commission= new Commission();

                                    if($point > 0){

                                         $commission->user_id= $id;   
                                          $commission->comission_by_userId= $id; 
                                         $commission->commission_point = $point;
                                         $commission->commission_level= $level;
                                         $commission->paid_id          = $insertId;

                                         $commission->save();    
                                       }

                                }else{

                                        if($loginUserAs=='P' || $loginUserAs =='PT' || $loginUserAs=='PE')
                                        {
                                            $presidentLevel= DB::select('select level_percentage from livello_list where level_name="'.$loginUserAs.'"');

                                            $presidentPercentage = !empty($presidentLevel)?$presidentLevel[0]->level_percentage:'';
                                        }else{
                                            $presidentPercentage='0';
                                        }


                                    $GetPercentageData = DB::select('select level_percentage from livello_list where id='.$level.'');

                                    $getPercentage = !empty($GetPercentageData)  ?   $GetPercentageData[0]->level_percentage  :  '';

                                    $Percentage = $getPercentage + $presidentPercentage;

                                    $point = floatval(($amount*$Percentage)/100);

                                     $commission = new Commission();

                                    if($point > 0){

                                         $commission->user_id= $id;    
                                          $commission->comission_by_userId= $id; 
                                         $commission->commission_point = $point;
                                         $commission->commission_level= $level;
                                         $commission->paid_id          = $insertId;

                                         $commission->save();    
                                       }
                                }                 

                        }

           

                        if(!empty($GetParentUeser)) {
                             

                               $level++;           


                                $CommissionParentId = $GetParentUeser[0]->parent_id;
                                $userAs   = $GetParentUeser[0]->user_as; 
                                $CommissionByUserId= $GetParentUeser[0]->id;


                                 if($userAs=='P' || $userAs =='PT' || $userAs=='PE')
                                    {
                                        $presidentLevel= DB::select('select level_percentage from livello_list where level_name="'.$userAs.'"');

                                        $presidentPercentage = !empty($presidentLevel)?$presidentLevel[0]->level_percentage:'';
                                    }else{
                                        $presidentPercentage='0';
                                    }



                               $GetPercentageData = DB::select('select level_percentage from livello_list where id='.$level.'');

                               $getPercentage = !empty($GetPercentageData)  ?   $GetPercentageData[0]->level_percentage  :  '';

                                $Percentage = $getPercentage + $presidentPercentage;

                               $commission= new Commission();

                    switch($level)
                      {
                             

                            case 2: 

                                  

                                    $point = floatval(($amount*$Percentage)/100);

                                            // insert commission here //

                                    if($point > 0 && $userAs=='BK2' || $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE') { 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                         }

                                         break;

                             case 3:

                                        $point = floatval(($amount*$Percentage)/100);

                                         // insert commission here //

                                if($point > 0 && $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                 $commission->user_id = $CommissionParentId;
                                                 $commission->comission_by_userId= $CommissionByUserId;
                                                $commission->commission_point = $point;
                                                $commission->commission_level= $level;
                                                $commission->paid_id         = $insertId;

                                                $commission->save();    
                                         }  


                                        break;
                                        
                              case 4 :
                              

                                    $point = floatval(($amount*$Percentage)/100);

                                         // insert commission here //

                                if($point > 0 && $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                 $commission->user_id = $CommissionParentId;
                                                 $commission->comission_by_userId= $CommissionByUserId;
                                                $commission->commission_point = $point;
                                                $commission->commission_level= $level;
                                                $commission->paid_id        = $insertId;

                                                $commission->save();    
                                        } 

                                        break;

                                 case 5 :                         

                                               $point = floatval(($amount*$Percentage)/100);
                                                 // insert commission here //

                                            if($point > 0 &&  $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }

                                             break; 

                                case 6 : 
                                
                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0  &&  $userAs=='BK6'|| $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }  

                                        break;
                                        
                                case 7 :
                                

                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0 &&  $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }  

                                           break;
                                           
                                  case 8 :
                                  
                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0 &&  $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }

                                           break;
                                           
                                   case 9 :
                                   
                                                 $point = floatval(($amount*$Percentage)/100);
                                                  // insert commission here //

                                                if($point > 0 &&  $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }   

                                              break;
                                              
                                    case 10 :
                                    
                                                $point = floatval(($amount*$Percentage)/100);

                                                  // insert commission here //

                                                if($point > 0 && $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }

                                               break;

                                     case 11:

                                                 $point = floatval(($amount*$Percentage)/100); 

                                                     // insert commission here //

                                                    if($point > 0 && $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                            $commission->user_id = $CommissionParentId;
                                                            $commission->comission_by_userId= $CommissionByUserId;
                                                            $commission->commission_point = $point;
                                                            $commission->commission_level= $level;
                                                            $commission->paid_id        = $insertId;

                                                            $commission->save();    
                                                    } 

                                                  break;
                                                  
                                       case 12:
                                       
                                                     $point = floatval(($amount*$Percentage)/100);    

                                                      // insert commission here //

                                                    if($point > 0 && $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                            $commission->user_id = $CommissionParentId;
                                                            $commission->comission_by_userId= $CommissionByUserId;
                                                            $commission->commission_point = $point;
                                                            $commission->commission_level= $level;
                                                            $commission->paid_id        = $insertId;

                                                            $commission->save();    
                                                    }

                                                  break;
                                 }

                            
                       self::GetCommission($CommissionParentId,$amount,$level,$insertId);  
                }
         }    
    }


    public static function UpgrateLevelCommissionToRoot($id,$amount,$insertId,$level='1')
    {

         $GetParentUeser = DB::select("select u2.id,u2.parent_id,u1.name,u1.user_as,u1.is_deleted as user_delete,u1.status as user_status FROM `users` as u1 INNER JOIN users as u2 on u1.id= u2.parent_id where u2.id=".$id." and u1.status='1' and u1.is_deleted='0' ");

        

         if($level<='12')
            { 

                 if(!empty($GetParentUeser)) {


                         
                         $GetDirectSale = User::where(['id'=>$id])->first();


                          $loginUserAs = $GetDirectSale->user_as;

                           $level++;                             


                            $CommissionParentId = $GetParentUeser[0]->parent_id;
                            $userAs   = $GetParentUeser[0]->user_as; 
                            $CommissionByUserId= $id;

                            if($userAs=='P' || $userAs =='PT' || $userAs=='PE')
                                {
                                    $presidentLevel= DB::select('select level_percentage from livello_list where level_name="'.$userAs.'"');

                                    $presidentPercentage = !empty($presidentLevel)?$presidentLevel[0]->level_percentage:'';
                                }else{
                                    $presidentPercentage='0';
                                }




                          $GetPercentageData = DB::select('select level_percentage from livello_list where id='.$level.'');

                          $getPercentage = !empty($GetPercentageData)  ?   $GetPercentageData[0]->level_percentage  :  '';

                          $Percentage = $getPercentage + $presidentPercentage;

                          $commission= new Commission();   

              // echo '<pre>';print_r($GetParentUeser);die;


                    switch($level)
                      {



                            case 1: 


                                      $point = floatval(($amount*$Percentage)/100);

                                            // insert commission here //

                                         if($point > 0 && $userAs=='BK2' || $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE') { 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                         }

                                         break;


                            case 2: 


                                      $point = floatval(($amount*$Percentage)/100);

                                            // insert commission here //

                                    if($point > 0 && $userAs=='BK2' || $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE') { 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                         }

                                         break;

                             case 3:

                                        $point = floatval(($amount*$Percentage)/100);

                                         // insert commission here //

                                 if($point > 0 && $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                 $commission->user_id = $CommissionParentId;
                                                 $commission->comission_by_userId= $CommissionByUserId;
                                                $commission->commission_point = $point;
                                                $commission->commission_level= $level;
                                                $commission->paid_id         = $insertId;

                                                $commission->save();    
                                         }  


                                        break;
                                        
                              case 4 :
                              

                                    $point = floatval(($amount*$Percentage)/100);

                                         // insert commission here //

                                 if($point > 0 && $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                 $commission->user_id = $CommissionParentId;
                                                 $commission->comission_by_userId= $CommissionByUserId;
                                                $commission->commission_point = $point;
                                                $commission->commission_level= $level;
                                                $commission->paid_id        = $insertId;

                                                $commission->save();    
                                        } 

                                        break;

                                 case 5 :                         

                                               $point = floatval(($amount*$Percentage)/100);
                                                 // insert commission here //

                                                if($point > 0 &&  $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }

                                             break; 

                                case 6 : 
                                
                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0  &&  $userAs=='BK6'|| $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }  

                                        break;
                                        
                                case 7 :
                                

                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0 &&  $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }  

                                           break;
                                           
                                  case 8 :
                                  
                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0 &&  $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }

                                           break;
                                           
                                   case 9 :
                                   
                                                 $point = floatval(($amount*$Percentage)/100);
                                                  // insert commission here //

                                                if($point > 0 &&  $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }   

                                              break;
                                              
                                    case 10 :
                                    
                                                $point = floatval(($amount*$Percentage)/100);

                                                  // insert commission here //

                                                if($point > 0 && $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }

                                               break;

                                     case 11:

                                                 $point = floatval(($amount*$Percentage)/100); 

                                                     // insert commission here //

                                                    if($point > 0 && $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                            $commission->user_id = $CommissionParentId;
                                                            $commission->comission_by_userId= $CommissionByUserId;
                                                            $commission->commission_point = $point;
                                                            $commission->commission_level= $level;
                                                            $commission->paid_id        = $insertId;

                                                            $commission->save();    
                                                    } 

                                                  break;
                                                  
                                       case 12:
                                       
                                                     $point = floatval(($amount*$Percentage)/100);    

                                                      // insert commission here //

                                                    if($point > 0 && $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                            $commission->user_id = $CommissionParentId;
                                                            $commission->comission_by_userId= $CommissionByUserId;
                                                            $commission->commission_point = $point;
                                                            $commission->commission_level= $level;
                                                            $commission->paid_id        = $insertId;

                                                            $commission->save();    
                                                    }

                                                  break;
                            }                       

                       self::UpgrateLevelCommissionToRoot($CommissionParentId,$amount,$insertId,$level); 

                    }
          }  
    }
   
   public static function getCommissionAsperPaymentId($id)
   {
         $GetCommissionUser= Commission::where(['paid_id'=>$id])->sum('commission_point');

         return $GetCommissionUser;

   }


   public static function getImageCard($id)
   {
        return UploadCard::where('id',$id)->first();

   }

   public static function getUserByUserId($id)
   {
        return user::where('id',$id)->first();

   }
   

    public static function dealerRenew($id,$amount,$insertId,$level='0')
    {
        

         $GetParentUeser = DB::select("select u2.id,u2.parent_id,u1.name,u1.user_as,u1.is_deleted as user_delete,u1.status as user_status FROM `users` as u1 INNER JOIN users as u2 on u1.id= u2.parent_id where u2.id=".$id." and u1.status='1' and u1.is_deleted='0'");

        if(!empty($GetParentUeser)) {

                 
                 $GetDirectSale = User::where(['id'=>$id])->first();


                  $loginUserAs = $GetDirectSale->user_as;

                   $level++;                             


                    $CommissionParentId = $GetParentUeser[0]->parent_id;
                    $userAs   = $GetParentUeser[0]->user_as; 
                    $CommissionByUserId= $id;

                    if($userAs=='P' || $userAs =='PT' || $userAs=='PE')
                        {
                            $presidentLevel= DB::select('select level_percentage from livello_list where level_name="'.$loginUserAs.'"');

                            $presidentPercentage = !empty($presidentLevel)?$presidentLevel->level_percentage:'';
                        }else{
                            $presidentPercentage='0';
                        }




                  $GetPercentageData = DB::select('select level_percentage from livello_list where id='.$level.'');

                  $getPercentage = !empty($GetPercentageData)  ?   $GetPercentageData[0]->level_percentage  :  '';

                  $Percentage = $getPercentage + $presidentPercentage;

                  $commission= new Commission();   


      
                    switch($level)
                      {

                             

                            case 1: 


                                      $point = floatval(($amount*$Percentage)/100);
                                            // insert commission here //

                                    if($point > 0 && $userAs=='BK2' || $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE') { 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                         }

                                         break;


                            case 2: 


                                      $point = floatval(($amount*$Percentage)/100);

                                            // insert commission here //

                                    if($point > 0 && $userAs=='BK2' || $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE') { 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                         }

                                         break;

                             case 3:

                                        $point = floatval(($amount*$Percentage)/100);

                                         // insert commission here //

                                 if($point > 0 && $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                 $commission->user_id = $CommissionParentId;
                                                 $commission->comission_by_userId= $CommissionByUserId;
                                                $commission->commission_point = $point;
                                                $commission->commission_level= $level;
                                                $commission->paid_id         = $insertId;

                                                $commission->save();    
                                         }  


                                        break;
                                        
                              case 4 :
                              

                                    $point = floatval(($amount*$Percentage)/100);

                                         // insert commission here //

                                            if($point > 0 && $userAs=='BK4' || $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                 $commission->user_id = $CommissionParentId;
                                                 $commission->comission_by_userId= $CommissionByUserId;
                                                $commission->commission_point = $point;
                                                $commission->commission_level= $level;
                                                $commission->paid_id        = $insertId;

                                                $commission->save();    
                                        } 

                                        break;

                                 case 5 :                         

                                               $point = floatval(($amount*$Percentage)/100);
                                                 // insert commission here //

                                                if($point > 0 &&  $userAs=='BK6' || $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }

                                             break; 

                                case 6 : 
                                
                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0  &&  $userAs=='BK6'|| $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }  

                                        break;
                                        
                                case 7 :
                                

                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0 &&  $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }  

                                           break;
                                           
                                  case 8 :
                                  
                                            $point = floatval(($amount*$Percentage)/100);
                                              // insert commission here //

                                            if($point > 0 &&  $userAs=='BK8' || $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                    $commission->user_id = $CommissionParentId;
                                                    $commission->comission_by_userId= $CommissionByUserId;
                                                    $commission->commission_point = $point;
                                                    $commission->commission_level= $level;
                                                    $commission->paid_id         = $insertId;

                                                    $commission->save();    
                                            }

                                           break;
                                           
                                   case 9 :
                                   
                                                 $point = floatval(($amount*$Percentage)/100);
                                                  // insert commission here //

                                                if($point > 0 &&  $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }   

                                              break;
                                              
                                    case 10 :
                                    
                                                $point = floatval(($amount*$Percentage)/100);

                                                  // insert commission here //

                                                if($point > 0 && $userAs=='BK10' || $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                        $commission->user_id = $CommissionParentId;
                                                        $commission->comission_by_userId= $CommissionByUserId;
                                                        $commission->commission_point = $point;
                                                        $commission->commission_level= $level;
                                                        $commission->paid_id         = $insertId;

                                                        $commission->save();    
                                                }

                                               break;

                                     case 11:

                                                 $point = floatval(($amount*$Percentage)/100); 

                                                     // insert commission here //

                                                    if($point > 0 && $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                            $commission->user_id = $CommissionParentId;
                                                            $commission->comission_by_userId= $CommissionByUserId;
                                                            $commission->commission_point = $point;
                                                            $commission->commission_level= $level;
                                                            $commission->paid_id        = $insertId;

                                                            $commission->save();    
                                                    } 

                                                  break;
                                                  
                                       case 12:
                                       
                                                     $point = floatval(($amount*$Percentage)/100);    

                                                      // insert commission here //

                                                    if($point > 0 && $userAs=='BK12' || $userAs=='P' || $userAs=='PT' || $userAs=='PE'){ 

                                                            $commission->user_id = $CommissionParentId;
                                                            $commission->comission_by_userId= $CommissionByUserId;
                                                            $commission->commission_point = $point;
                                                            $commission->commission_level= $level;
                                                            $commission->paid_id        = $insertId;

                                                            $commission->save();    
                                                    }

                                             break;
                            }
             
               self::dealerRenew($CommissionParentId,$amount,$insertId,$level);  
            }
    }


     public static function getUpgradeValuePoint($level)
      {
         

            return MinimumValuePoint::where(['step'=>$level])->first();

      }     

       public static function saveNotification($notFrom,$notTo,$notMessage,$roleType,$notType)
        {
            $notifications = new Notifications();
            $notifications->not_to = $notTo;
            $notifications->not_from = $notFrom;
            $notifications->role_type = $roleType;
            $notifications->type = $notType;
            $notifications->message = $notMessage;
            $notifications->save();

        }   


     public static function notificationDetail($userId)
      {

        return Notifications::where(['not_to'=>$userId,'is_read'=>'0'])->orderBy('id','DESC')->limit(5)->get();           
            
      } 


      public static function notificationDetailForAdmin()
      {
           return Notifications::where(['is_read'=>'0'])->orderBy('id','DESC')->limit(5)->get();

      }
   

      public static function ConvertionDetail($levelId)
      {
      
        return Convertion::where(['convertion_title'=>$levelId])->first();
      }  

      public static function getLearningPayment($userId,$productId)
      {
            return PaymentHistory::where(['user_id'=>$userId,'userName'=>$productId])->first();

      }

}