<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\User;
use App\PaymentHistory;
use App\Wallet;
use App\PaypalSetting;
use App\Commission;
use App\MinimumValuePoint;
use App\elearningdocs;
use App\CalendarManagement;
use App\Notifications;
use App\NewCms;
use Helper;
use PDF;

class UserController extends Controller
{
    //

    public function UserProfile(Request $request)
    {

      //Helper::GetCommission('19','10','1','700');  

        $id= Auth::id();  

        $userProfile = User::find($id);

      if(isset($_POST['updateprofile']))
      {  

              $rules=[
                      'name' => 'required|string|max:255',
                      'userName' => 'required|string|max:255',
                      'telephoneNumber' => 'required|numeric|min:10',
                      'postalCode' => 'required|numeric|min:5',
                      'dob'   =>      'required', 
                     // 'resiaddress' => 'required|string|max:255',
                      'region'      => 'required|string|max:255',
                     // 'streat'    =>   'required|string|max:255',
                      'Fcode'    =>    'required|string|max:255',
                      // 'pariva'   =>    'required|string|max:255', 
                      'business_name'   =>    'required|string|max:255',
                      'IBAN'   =>    'required|numeric|min:20',
                      'bank'   =>    'required|string|max:255',
                      'Paypal'   =>    'required|string|email|max:255',
                      'profileImage' => 'mimes:jpeg,jpg,png',
                      //'photo_id_document' =>'required|mimes:jpeg,jpg,png',  
                    ];

              $message["name.required"] = 'È richiesto il campo nome';
              $message["userName.required"] = 'Il campo userName è richiesto';
              $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';
              $message["postalCode.required"] = 'Il campo cap è richiesto';
              $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';
              $message['dob.required']           =  'È richiesto il campo Nata/o a';
             // $message['resiaddress.required']   =  'È richiesto il campo Residente a';
              $message['region.required']        =   'È richiesto il campo Regione';
             // $message['streat.required']        =   'È richiesto il campo Via';
              $message['Fcode.required']         =   'È richiesto il campo Codice Fiscale';
              // $message['pariva.required']        =    'È richiesto il campo Part. I.V.A';
              $message['business_name.required']  =    'Il campo Nome aziendale è obbligatorio';
              $message['IBAN.required']        =    'È richiesto il campo del nome Iban';
              $message['bank.required']        =    'Il campo del nome della banca è obbligatorio';
              $message['Paypal.required']        =    'Il campo del nome paypal è obbligatorio';
              $message['Paypal.email']        =    'Il paypal deve essere un indirizzo email valido';
              $message['IBAN.numeric']        =    "L'i b a n deve essere un numero";
              $message['profileImage.mimes']        =  'Il file dovrebbe essere jpg, png, jpeg e dimensione massima 1 MB';
              // $message['photo_id_document.required']        =  'Il campo della foto di identità è obbligatorio';
            

              $this->validate($request, $rules,$message);   


            $name        =          !empty($request->input('name')) ?    $request->input('name') :'';
            $username     =         !empty($request->input('userName')) ?     $request->input('userName'):'';
            $telephoneNumber  =     !empty($request->input('telephoneNumber'))  ?  $request->input('telephoneNumber'):'';
            $postalCode   =         !empty($request->input('postalCode'))    ?  $request->input('postalCode'):'';
            $dob          =         !empty($request->input('dob'))            ?  $request->input('dob')  : '';
           // $resiaddress  =         !empty($request->input('resiaddress'))    ?  $request->input('resiaddress')  :  '';
            $region       =         !empty($request->input('region'))         ?  $request->input('region')      :  '';
          //  $streat       =         !empty($request->input('streat'))         ?  $request->input('streat')      :  '';
            $fcode        =         !empty($request->input('Fcode'))         ?  $request->input('Fcode')       :   ''; 
            $pariva       =         !empty($request->input('pariva'))         ?  $request->input('pariva')       :   ''; 
            $business_name  =       !empty($request->input('business_name'))         ?  $request->input('business_name')       :   '';
            $IBAN          =        !empty($request->input('IBAN'))         ?  $request->input('IBAN')       :   '';
            $bank          =        !empty($request->input('bank'))         ?  $request->input('bank')       :   '';
            $Paypal       =         !empty($request->input('Paypal'))         ?  $request->input('Paypal')       :   '';
            $facebook      =        !empty($request->input('facebook'))         ?  $request->input('facebook')       :   '';
            $twitter       =        !empty($request->input('twitter'))         ?  $request->input('twitter')       :   '';
            $linkedin      =        !empty($request->input('linkedin'))         ?  $request->input('linkedin')       :   '';
            $instagram      =       !empty($request->input('instagram'))         ?  $request->input('instagram')       :   '';


              if(!empty($request->file('profileImage'))){
                     $image       =         !empty($request->file('profileImage'))  ?  $request->file('profileImage') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/profile_images');
                     $image->move($destinationPath, $imagNmae);
                 }else{
                    $imagNmae=  $request->input('old_file');
                 }

                 if(!empty($request->file('photo_id_document'))){

                        // DB::table('promoter_document')->where('user_id',$id)->delete();

                        foreach($request->file('photo_id_document') as $image1)
                        {
                              $imagNmae1     = rand('45658','46561').'.'.$image1->getClientOriginalExtension();
                               $destinationPath1 = public_path('/images/profile_images');
                              $image1->move($destinationPath1, $imagNmae1); 
                             $inserData= DB::table('promoter_document')->insert(['document' => $imagNmae1, 'user_id' => $id]);                           
                                    
                       }
                 }

             // end here //


                 if(!empty($userProfile) && $userProfile->is_profile_complete=='0')
                 {

                 			// contract letter//
	                 			  $rand = time();
	                 		
	         					      // Send data to the view using loadView function of PDF facade
	         					        $pdf = PDF::loadView('Pdf.pdf-design',['data'=>$userProfile]);

	         					       $pdf->save(public_path('images/').$rand.'.pdf');
         					  // end here// 

	         				 // bklic card letter//
	                 		  	 $rand1 = rand('456156','564563');	                 			
	         					       // Send data to the view using loadView function of PDF facade
	         					       $pdf1 = PDF::loadView('Pdf.card-emailer',['data'=>$userProfile]);

	         					       $pdf1->save(public_path('images/').$rand1.'.pdf');
         					// end here// 


                 	 		     $subject= 'Profile Completed Confirmation ';

                             $header = "From:bklic@bklic.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             $message ='Ciao '.$userProfile->name.'<br/>';
                             $message.='Grazie per aver completato il tuo profilo personale! ​ .<br/>';
                             $message.='Ecco qui la tua carta Promoter da esibire in pubblico e la lettera di incarico di Bklic.<br/>';

                             $message.= '<a href="'.url('images/'.$rand.'.pdf').'">Click here for contract letter </a>'.'<br/>';

                             $message.= '<a href="'.url('images/'.$rand1.'.pdf').'">Click here for Bklic Card </a>';

                             mail($userProfile->email,$subject,$message,$header);
	 


                 }

        
            $updateUserDetail = array(
                                  'name'=>$name,
                                  'username'=>$username,
                                  'telephoneNumber'=> $telephoneNumber,
                                  'postalCode' => $postalCode,
                                  'dob'       => $dob,
                                  //'resiaddress' => $resiaddress,
                                  'region'     => $region,
                                 // 'streat'     => $streat,
                                  'fcode'     =>  $fcode,
                                  'pariva'    =>  $pariva,
                                  'is_profile_complete'=>'1',
                                  'profileimage'=>$imagNmae,
                                 //'photo_id_document'=>$imagNmae1,
                                  'business_name'=>$business_name,
                                  'iban'  =>  $IBAN,
                                  'bank'  =>$bank,
                                  'paypal'=>$Paypal,
                                  'facebook_url'=>$facebook,
                                  'twitter_url'=>$twitter,
                                  'linkedin_url'=>$linkedin,
                                  'instagram_url'=>$instagram
                                );

            User::where(['id'=>$id])->update($updateUserDetail);


            $request->session()->flash('success', 'Profilo aggiornato con successo!');    
            return redirect('/userprofile');
       }

        $multipleImage = DB::table('promoter_document')->where('user_id',$id)->get();

        //echo '<pre>';print_r($multipleImage);die;

      return view('User.userProfile',['userProfile'=>$userProfile,'multipleImage'=>$multipleImage]);
      
    }
    
    
    public function addSocial(Request $request)
    {
            $user_id = Auth::id();  
        
            $facebook        =          !empty($request->input('facebook')) ?    $request->input('facebook') :'';
            $twitter     =         !empty($request->input('twitter')) ?     $request->input('twitter'):'';
            $linkedin  =     !empty($request->input('linkedin'))  ?  $request->input('linkedin'):'';
            $instagram   =         !empty($request->input('instagram'))    ?  $request->input('instagram'):'';
           
            $updateUserDetail = array(
                                  'facebook_url'=>$facebook,
                                  'twitter_url'=>$twitter,
                                  'linkedin_url'=> $linkedin,
                                  'instagram_url' => $instagram
                                );
                                
             User::where(['id'=>$user_id])->update($updateUserDetail);      
             $request->session()->flash('success', 'Profilo sociale aggiornato con successo!');    
             return redirect('/socialProfile'); 
       
    }


    public function socialProfile()
    {

        $id = Auth::id(); 
        $userProfile = User::find($id);
        return view('User.userSocialProfile',['userData'=>$userProfile]);
    }


    public function UserNetwork()
    {

        $userId= Auth::id();

        $userDetail= User::where(['role_type'=>'2','is_deleted'=>'0','id'=>$userId,'status'=>'1'])->first();
        
         $GetCommissionUser= Commission::where(['user_id'=>$userId])->sum('commission_point');

         return view('User.userNetwork',['userDetail'=>$userDetail,'GetCommissionUser'=>$GetCommissionUser]);
    }


    
    public function walletUser()
    {
        $userId= Auth::id();

        $userProfile=  User::where(['id'=>$userId])->first();

        $paypalDetail= PaypalSetting::first();

        //echo '<pre>';print_r($paypalDetail);die;

        return view('User.userwallet',['userProfile'=>$userProfile,'paypalDetail'=>$paypalDetail]);

    }


    public function CancelStatus()
    {

       return view('payment.cancel');  
    }

    public function   Successstatus($txid)
    {

      return view('payment.success',['taxId'=>$txid]);

    }


    public function GetPaymentResponse(Request $request)
    {           

       $taxId= isset($_GET['tx'])?$_GET['tx']:'';

         if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('user-wallet');

                    }else{
                          
                            $status= $_GET['st'];
                            $userName= $_GET['item_name'];
                            $userId= $_GET['item_number'];
                            $currencyCode= $_GET['cc'];
                            $paidAmount= $_GET['amt'];

                           $paymentData= new PaymentHistory();

                           $paymentData->txn_id= $taxId;
                           $paymentData->user_id= $userId;
                           $paymentData->userName = $userName;
                           $paymentData->currencyCode= $currencyCode;
                           $paymentData->paidAmount= $paidAmount;
                           $paymentData->status= $status;
                            $paymentData->payment_level= 'W';

                           $paymentData->save();
                           $insertId= $paymentData->id;

                          if(!empty($insertId)) {
                              $wallet= new Wallet;

                              $wallet->paid_id= $insertId;
                              $wallet->user_id= $userId;
                              $wallet->amount= $paidAmount;
                              $wallet->save();
                          }
                        
                          $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('user-wallet');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }
    }


    public function IpnStatus()
    {
      echo 'mukesh';

    }


    /*wallet current balance list*/

      public function walletList(Request $request)
    {


         $userId= Auth::id();

         $data= array();

         $onevalue=array('Month', 'PV del mese');

         $months = array(0=>'value',01 =>'Gen', 02 =>'Feb', 03 =>'Mar', 04 =>'Apr', 05 =>'Mag', 06 =>'Giu', 07 =>'Lug', 8 =>'Ago', 9 =>'Set', 10 =>'Ott',11 =>'Nov', 12 =>'Dic');



          if(isset($_POST['addbutton']))
          { 

           // echo '<pre>';print_r($_POST);die;


                $pvPoint = !empty($request->input('wallet_pv'))  ?  $request->input('wallet_pv') :  '';

                $euroAmount = !empty($request->input('level_euro'))  ?  $request->input('level_euro') :  '';

                $pvShouldbe = !empty($request->input('pv_shouldbe'))  ? $request->input('pv_shouldbe')  : '';

                $totalWalletPv = !empty($request->input('total_walletpv')) ? $request->input('total_walletpv') : '';

                if($pvPoint <=  $totalWalletPv && !empty($pvPoint) && !empty($totalWalletPv))
                {

                    $PvconvertToEuro= $pvPoint/$pvShouldbe;


                    $checkWalletAmount= Wallet::where(['user_id'=>$userId,'paid_status'=>'0'])->orderby('id','DESC')->first();



                      if(count($checkWalletAmount)>0)
                      {
                        $Amount = $checkWalletAmount->amount + $PvconvertToEuro;

                        Wallet::where(['user_id'=>$userId,'paid_status'=>'0'])->update(array('amount'=>$Amount));

                      }else{

                        $wallet= new Wallet();  

                        $wallet->amount= $PvconvertToEuro;
                        $wallet->paid_status ='0';
                        $wallet->user_id = $userId;
                        $wallet->save();
                      } 

                     $remaningPV = $totalWalletPv - $pvPoint;

                     User::where(['id'=>$userId])->update(array('total_wallet'=>$remaningPV));

                   $request->session()->flash('success', 'Hai convertito Pv in euro con successo.');
                    return redirect('user-wallet');
                 
                }else{

                      $request->session()->flash('danger', 'non puoi convertire pv più del portafoglio totale pv');
                      return redirect('user-wallet');
                }


          }else{


                foreach($months as $key=> $value)
                {
                      if($key=='0')  {

                         $data[]= $onevalue;

                      }else{

                         $data[$key][]  = $value;

                         $payment = DB::table('users')
                                                  ->join('commission', 'users.id', '=', 'commission.user_id')                     
                                                  ->select('users.*', 'commission.commission_level','commission.created_at as commissiondate')
                                                  ->where('users.role_type','=','2')
                                                  ->whereMonth('commission.created_at','=',$key)
                                                  ->where('users.status','=','1') 
                                                  ->where('commission.user_id','=',$userId)   
                                                  ->where('users.is_deleted','=','0')                             
                                                  ->sum('commission.commission_point');   
                            $data[$key][]= (float)$payment; 
                      }

                }


         $totalNumberofaffiliates = DB::table('users')                                                  
                                  ->select('users.*')
                                  ->where('users.role_type','=','4')
                                  ->where('users.status','=','1')  
                                  ->where('users.parent_id',$userId)
                                  ->where('users.is_deleted','=','0')                           
                                  ->count();

          $totalNumberofcardUser = DB::table('users')                                                  
                                    ->select('users.*')
                                    ->where('users.role_type','=','3')
                                    ->where('users.status','=','1')
                                    ->where('users.parent_id',$userId)  
                                   ->where('users.is_deleted','=','0')                           
                                    ->count();  

         $numberOfupgrades =     DB::table('users')
                                            ->join('payment_history', 'users.id', '=', 'payment_history.user_id')                     
                                            ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id')
                                            ->where('users.role_type','=','2')
                                            ->where('users.id',$userId)
                                            ->whereYear('payment_history.created_at','=',date('Y'))
                                            ->where('payment_history.payment_level','!=','S')
                                            ->where('users.status','=','1')  
                                            ->where('users.is_deleted','=','0')                                 
                                            ->count(); 

         $pichart[]= array('Task','Hours per Day');                          
         $pichart[]= array('Card User',$totalNumberofcardUser);
         $pichart[]= array('Affiliati',$totalNumberofaffiliates);
         $pichart[]= array('Upgrade',$numberOfupgrades);                                                           
         

         $currentMonth= date('m');

         $walletDetail = DB::table('users')
                              ->join('commission', 'users.id', '=', 'commission.user_id')                     
                              ->select('users.*', 'commission.commission_level','commission.created_at as commissiondate','commission.commission_point','commission.total_wallet_point','commission.comission_by_userId')
                              ->where('users.role_type','=','2')
                              ->whereMonth('commission.created_at','=',$currentMonth)
                              ->where('commission.compv_expired','=','0')
                              ->where('users.status','=','1')    
                              ->where('commission.user_id','=',$userId)
                              ->where('users.is_deleted','=','0')                             
                              ->get();     
                
            //echo '<pre>';print_r($walletDetail);die;
          $userProfile = User::where(['id'=>$userId])->first();     

        return view('User.wallet-list',['walletDetail'=>$walletDetail,'data'=>json_encode($data),'pichart'=>json_encode($pichart),'userProfile'=>$userProfile]);


          }

    }
    
    
    
    
  public function UpgradeLevel(Request $request) {

      $userId= Auth::id();

        $userProfile=  User::where(['id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->first();

        $paypalDetail= PaypalSetting::first();

         $countChildPromoter = User::where(['parent_id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->count();

       // return view('User.user-upgrade-level',['paypalDetail'=>$paypalDetail,'userProfile'=>$userProfile]);

        return view('User.promoter_upgrade_level',['paypalDetail'=>$paypalDetail,'userProfile'=>$userProfile,'countChildPromoter'=>$countChildPromoter]);

      
    }




   public function GetUpgradeLevelPaypalResponse(Request $request)
    {

      $taxId= isset($_GET['tx'])?$_GET['tx']:'';



         if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('upgrade-level');

                    }else{
                          
                            $status= $_GET['st'];
                            $userName= $_GET['item_name'];
                            $userId= $_GET['item_number'];
                            $currencyCode= $_GET['cc'];
                            $custom= $_GET['cm'];
                            $paidAmount= $_GET['amt'];

                           $paymentData= new PaymentHistory();

                           $paymentData->txn_id= $taxId;
                           $paymentData->user_id= $userId;
                           $paymentData->userName = $userName;
                           $paymentData->currencyCode= $currencyCode;
                           $paymentData->paidAmount= $paidAmount;
                           $paymentData->status= $status;
                           $paymentData->payment_level = $custom;

                           $paymentData->save();
                           $insertId= $paymentData->id;

                        if(!empty($insertId)) {

                             $getUserDetail =  User::where(['id'=>$paymentData->user_id])->first();

                          // echo $custom;die;
                               $getAsPerLevelPoint= DB::table('upgrade_pv_conversion')
                                                      ->select('upgrade_pv_conversion.*')
                                                      ->where('level','=',$custom)
                                                      ->first(); 
                                  // echo '<pre>';print_r($getAsPerLevelPoint);die;                              

                               $updateUserDetail=array('user_as'=>$custom,'renewal_date'=>date('Y-m-d', strtotime('+1 years')));

                              // Helper::UpgrateLevelCommissionToRoot($userId,'20','700',$level='1');

                               User::where(['id'=>$paymentData->user_id])->update($updateUserDetail);

                               Helper::UpgrateLevelCommissionToRoot($paymentData->user_id,$getAsPerLevelPoint->point,$insertId,$level='0');

                               $notMessage = 'Livello di aggiornamento del promotore';

                              Helper::saveNotification($paymentData->user_id,'0', $notMessage, '2', '2');  


                              //upgrade email notification to promoter//

                                 $subject= 'Conferma del livello di aggiornamento';

                                 $header = "From:bklic@bklic.komete.it \r\n";
                                 $header.= 'MIME-Version: 1.0' . "\r\n";
                                 $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                                 $message = 'Ciao  :' .$getUserDetail->name.'<br/>';
                                 $message.='hai effettuato correttamente l’upgrade da '.$getUserDetail->user_as.' a '.$custom.'.</br>';
                                 $message.= 'ti ricordiamo che il livello può essere mantenuto per un anno da oggi '.date('Y-m-d', strtotime('+1 years')).'.</br>';
                                 $message.= 'data di iscrizione, alla fine del quale potrai decidere se rinnovare o fare un ulteriore upgrade​.</br>';
                                 $message.='Ciao ' .$getUserDetail->name.', ricordati che tra '.date('Y-m-d', strtotime('+1 years')).' giorni dovrai decidere se rinnovare lo stesso livello BK o     effettuare.</br>';
                                 $message.='se possibile, un upgrade al prossimo livello';  
                                
                                mail($getUserDetail->email,$subject,$message,$header);
                                
                              // end here //  
                           
                          }
                        
                          $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');

                       return redirect('upgrade-level');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }

    }



    public function BecomeFounder()
    {

        $userId= Auth::id();

        $userProfile=  User::where(['id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->first();

        $paypalDetail= PaypalSetting::first();

         $UserAs= !empty($userProfile)?$userProfile->user_as:'';  

         $getAsPerlevelFounder =  MinimumValuePoint::where(['step'=>$UserAs,'level_founder_status'=>'1'])->first(); 

        return view('User/become-founder',['paypalDetail'=>$paypalDetail,'userProfile'=>$userProfile,'getAsPerlevelFounder'=>$getAsPerlevelFounder]);
    }


    public function BecomeFounderResponse(Request $request)
    {


        $taxId= isset($_GET['tx'])?$_GET['tx']:'';

         if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('upgrade-level');

                    }else{
                          
                            $status= $_GET['st'];
                            $userName= $_GET['item_name'];
                            $userId= $_GET['item_number'];
                            $currencyCode= $_GET['cc'];
                            // $custom= $_GET['cm'];
                            $paidAmount= $_GET['amt'];

                           $paymentData= new PaymentHistory();

                           $paymentData->txn_id= $taxId;
                           $paymentData->user_id= $userId;
                           $paymentData->userName = $userName;
                           $paymentData->currencyCode= $currencyCode;
                           $paymentData->paidAmount= $paidAmount;
                           $paymentData->status= $status;
                           $paymentData->payment_level = 'F';

                           $paymentData->save();
                           $insertId= $paymentData->id;

                        if(!empty($insertId)) {                                                       

                               $updateUserDetail=array('founder'=>'1');

                               User::where(['id'=>$userId])->update($updateUserDetail);
                           
                          }
                        
                          $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');

                       return redirect('userprofile');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }


    }


    public function OrderDetail(Request $request)
    {

        $userId= Auth::id();

        $userProfile =  User::where(['id'=>$userId])->first();    

        $SelectUserOrder = DB::table('order_detail')
                          ->join('payment_history', 'order_detail.paid_id', '=', 'payment_history.id')
                          ->select('order_detail.*', 'payment_history.paidAmount', 'payment_history.userName','payment_history.status','payment_history.payment_level','payment_history.created_at','payment_history.txn_id')
                          ->where('order_detail.user_id',$userId)
                          ->get();
        

        return view('User.user-pay-card',['userProfile'=>$userProfile,'SelectUserOrder'=>$SelectUserOrder]);

    }




    public function GetDigitCardPaymentResponce(Request $request)
    {

        $taxId= isset($_GET['tx'])?$_GET['tx']:'';

         if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('pay-card');

                    }else{
                          
                            $status= $_GET['st'];
                            $userName= $_GET['item_name'];
                            $userId= $_GET['item_number'];
                            $currencyCode= $_GET['cc'];
                            $custom= $_GET['cm'];
                            $paidAmount= $_GET['amt'];

                           $paymentData= new PaymentHistory();

                           $paymentData->txn_id= $taxId;
                           $paymentData->user_id= $userId;
                           $paymentData->userName = $userName;
                           $paymentData->currencyCode= $currencyCode;
                           $paymentData->paidAmount= $paidAmount;
                           $paymentData->status= $status;
                           $paymentData->payment_level = $custom;

                           $paymentData->save();
                           $insertId= $paymentData->id;

                        if(!empty($insertId)) {


                               Helper::GetCommission($custom,$paymentData->paidAmount,$level='1',$insertId);
                           
                          }
                        
                          $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');

                       return redirect('pay-card');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }

    }
    

    /* start card assign users*/


    public function UserCommission()
    {

         $userId= Auth::id();


         $CommissionUser = DB::table('users')
                  ->join('commission', 'users.id', '=', 'commission.comission_by_userId')                  
                  ->select('users.*', 'commission.commission_point', 'commission.commission_level','commission.created_at as commissioncreate')
                  ->where('commission.compv_expired','=','0')
                  ->where('commission.user_id',$userId)
                  ->get(); 


        //echo '<pre>';print_r($CommissionUser);die;      

        return view('User.card-assing-userlist',['CommissionUser'=>$CommissionUser]);

    }


    
    
  public function userDocuments(Request $request)
	{
			
		$userId=Auth::id();
      $request->session()->forget('name');
      $request->session()->forget('type');
      $listDetail= elearningdocs::all();
      $ProfileDetail= User::where(['id'=>$userId])->first();
    //echo '<pre>'; print_r($listDetail); die;
      return view('User.elearning-doclist',['listDetail'=>$listDetail,'ProfileDetail'=>$ProfileDetail]);

	}


 public function ajaxChildDetail($id)
  {
      return  User::where(['id'=>$id])->first();
  }


  public function CardUser()
  {

      $referralCode= Auth::user()->referralCode;

      $userId= Auth::id();

      $cardUser = DB::table('users')
                    ->join('order_detail', 'users.id', '=', 'order_detail.user_id')
                    ->join('checkout', 'checkout.id', '=', 'order_detail.checkout_id')
                    ->select('users.*', 'order_detail.product_name', 'order_detail.product_price','order_detail.created_at as orderCreate')
                    ->where('checkout.parent_id','=',$userId)
                    ->where('users.role_type','3')
                    ->get();

        // echo '<pre>';print_r($cardUser);die;
      
      return view('User.promoter-cardusers',['cardUser'=>$cardUser]);

  }


  public function InvoiceDetail($id)
  {

     $InvoiceDetail = DB::table('order_detail')
                      ->join('payment_history', 'order_detail.paid_id', '=', 'payment_history.id')
                      ->select('order_detail.*', 'payment_history.txn_id', 'payment_history.currencyCode','payment_history.paidAmount','payment_history.status')
                      ->where('order_detail.id','=',$id)                    
                      ->first();

             //  echo '<pre>';print_r($InvoiceDetail);die;       

    return view('User.card-user-invoice',['InvoiceDetail'=>$InvoiceDetail]);
  }
  
   public function viewDoc(Request $request, $id)
  {     
      $userId= Auth::id();

      $userProfile= User::where(['id'=>$userId])->first();

      $listDetail=  elearningdocs::where(['id'=>$id])->first();

       $paypalDetail= PaypalSetting::first();

      return view('User.elearning-docview',['listDetail'=>$listDetail,'paypalDetail'=>$paypalDetail,'userProfile'=>$userProfile]);

  }

   public function GetDocumentResponse(Request $request)
  {

       $taxId= isset($_GET['tx'])?$_GET['tx']:'';

         if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('pay-card');

                    }else{
                          
                            $status= $_GET['st'];
                            $userName= $_GET['item_name'];
                            $userId= $_GET['item_number'];
                            $currencyCode= $_GET['cc'];
                            $paidAmount= $_GET['amt'];

                           $paymentData= new PaymentHistory();

                           $paymentData->txn_id= $taxId;
                           $paymentData->user_id= $userId;
                           $paymentData->userName = $userName;
                           $paymentData->currencyCode= $currencyCode;
                           $paymentData->paidAmount= $paidAmount;
                           $paymentData->status= $status;
                           $paymentData->payment_level ='ED';

                           $paymentData->save();
                           $insertId= $paymentData->id;
                        
                          $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');

                       return redirect('user-documents');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }


  }


  public function PromoterAffiliates()
  {
      $userId= Auth::id();

     $affiliates= User::where(['parent_id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'4'])->get();

     

    return view('User.promoter-affiliates',['affiliates'=>$affiliates]);
  }


  public function NewsEventPromoter()
  {
    $userId= Auth::id();

     $affiliates= User::where(['parent_id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'4'])->get();

     $newsEvent= NewCms::all();


     return view('User.promoter-news-event',['affiliates'=>$affiliates,'newsEvent'=>$newsEvent]);

  }



  public function PaymentDetail()
  {

     $userId= Auth::id();

     $getUserDetail= User::where(['id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->first();

    return view('User.promoter-account-detail',['getUserDetail'=>$getUserDetail]);

  }


  public function CantractCard()
  {
    $userId= Auth::id();

     $getUserDetail= User::where(['id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->first();

     return view('User.promoter-contract-card',['getUserDetail'=>$getUserDetail]);
  }


  public function UploadContractLetter(Request $request,$id)
  {

    if(isset($_POST['updateprofile']))
    {
            $rules= [
                      'profileImage' => 'mimes:jpeg,jpg,png | max:1024',  
                    ];

              $message['profileImage.mimes']  =  'Il file dovrebbe essere jpg, png, jpeg e dimensione massima 1 MB';

              $this->validate($request, $rules,$message); 


           if(!empty($request->file('contact_letter'))){
                     $image       =         !empty($request->file('contact_letter'))  ?  $request->file('contact_letter') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/profile_images');
                     $image->move($destinationPath, $imagNmae);
             }else{
                $imagNmae=  $request->input('old_file');
             }
             // end here //
        
            $updateUserDetail = array(
                                      'name'=>$name,
                                      'username'=>$username,
                                      'telephoneNumber'=> $telephoneNumber,
                                      'postalCode' => $postalCode,
                                      'dob'       => $dob,
                                      'resiaddress' => $resiaddress,
                                      'region'     => $region,
                                      'streat'     => $streat,
                                      'fcode'     =>  $fcode,
                                      'pariva'    =>  $pariva,
                                      'is_profile_complete'=>'1',
                                      'profileimage'=>$imagNmae,
                                      'business_name'=>$business_name,
                                      'iban'  =>  $IBAN,
                                      'bank'  =>$bank,
                                      'paypal'=>$Paypal
                                  );

            User::where(['id'=>$id])->update($updateUserDetail);


            $request->session()->flash('success', 'Profilo aggiornato con successo!'); 

            return redirect('/userprofile');

    }
    return view('User.upload-contract-letter');
  }


  public function ReadNotification(Request $request, $id)
    {
        $notifications= Notifications::where(['notifications.id'=>$id])->leftJoin('users', 'users.id', '=', 'notifications.not_from')->select('users.name','users.userName','users.email','users.profileimage', 'notifications.*')->get();

      if(!empty($notifications)){
           $updateIsRead= array(
                                'is_read'=>1
                               );
                 Notifications::where(['id' => $id])->update($updateIsRead);
       }     
       return view('User.notification-view',['notifications'=>$notifications]);
        
    }



    public function ExportPdf()
    {
    	// $userId= Auth::id();

    	// $data = User::where(['id'=>$userId])->first();
    	// return view('Pdf.pdf-design',['data'=>$data]);

         $userId= Auth::id();

          $rand= rand('123456','845945');
        // Fetch all customers from database
            $data = User::where(['id'=>$userId])->first();
            // Send data to the view using loadView function of PDF facade
            $pdf = PDF::loadView('Pdf.pdf-design',['data'=>$data]);
            // If you want to store the generated pdf to the server then you can use the store function
          	$pdf->save(public_path('images/').$rand.'.pdf');
            // Finally, you can download the file using download function
            return $pdf->download('customers.pdf');
    }  

    public function ExportCardPdf()
    {    	

        	 $userId= Auth::id();

         //   $data = User::where(['id'=>$userId])->first();
         // return view('Pdf.card-emailer',['data'=>$data]);die;

        	 $rand= rand('123456','987451');

      		  // Fetch all customers from database
            $data = User::where(['id'=>$userId])->first();
            // Send data to the view using loadView function of PDF facade
            $pdf = PDF::loadView('Pdf.card-emailer',['data'=>$data]);
            // If you want to store the generated pdf to the server then you can use the store function
            //$pdf->save(public_path('images/').$rand.'.pdf');

            // Finally, you can download the file using download function
            return $pdf->download('customers.pdf');
    }
}
