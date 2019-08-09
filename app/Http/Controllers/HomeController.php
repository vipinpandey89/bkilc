<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Commission;
use App\CalendarManagement;
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
//use Storage;
use Illuminate\Support\Facades\DB;
use File;
use Helper;
use App\NewCms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


      private $apiUrl = 'http://chart.apis.google.com/chart';

      private $data;


    public function index()
    {
       $userId= Auth::id();

       $affiliates= User::where(['parent_id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'4'])->count();

       $cardUser = DB::table('users')
                      ->join('order_detail', 'users.id', '=', 'order_detail.user_id')
                      ->join('checkout', 'checkout.id', '=', 'order_detail.checkout_id')
                      ->select('users.*', 'order_detail.product_name', 'order_detail.product_price','order_detail.created_at as orderCreate')
                      ->where('checkout.parent_id','=',$userId)
                      ->where('users.role_type','3')
                      ->count();

           $GetCommissionUserCurrentMonth = DB::table('commission')
                                          ->select('commission.*')
                                          ->where('commission.user_id','=',$userId)
                                          ->whereMonth('commission.created_at','=',date('m'))
                                          ->sum('commission_point');

          $GetCommissionUserPreviousMonth = DB::table('commission')
                                          ->select('commission.*')
                                          ->where('commission.user_id','=',$userId)
                                          ->whereMonth('commission.created_at','=',date("m",strtotime("-1 month")))
                                          ->sum('commission_point'); 
         
         $allNewsEvents= NewCms::all();

         $userProfile=  User::where(['id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->first();

        $countChildPromoter = User::where(['parent_id'=>$userId,'status'=>'1','is_deleted'=>'0','role_type'=>'2'])->count();


         $dashBoardData['AffiliatesData']= $affiliates;
         $dashBoardData['cardUser']      = $cardUser;
         $dashBoardData['GetCommissionUserCurrentMonth'] = $GetCommissionUserCurrentMonth;
         $dashBoardData['GetCommissionUserPreviousMonth'] = $GetCommissionUserPreviousMonth;
         $dashBoardData['allNewsEvents']     = $allNewsEvents;



       //echo '<pre>';print_r($dashBoardData);die;             
      

        return view('home',['dashBoardData'=>$dashBoardData,'userProfile'=>$userProfile,'countChildPromoter'=>$countChildPromoter]);
    }


   public function register(Request $request)
    {


            if(isset($_POST['register'])){


                 $rules=[
                        'name' => 'required|string|max:200',
                        'userName' => 'required|string|max:200',
                        'telephoneNumber' => 'required|numeric|digits:10',
                        'postalCode' => 'required|string|min:5',
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|min:6|confirmed',      
                    ];
  
                     $message["name.required"] = 'È richiesto il campo nome';

                    $message["userName.required"] = 'Il campo userName è richiesto';

                     $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';

                     $message["postalCode.required"] = 'Il campo cap è richiesto';

                     $message["email.required"] = 'Il campo email è obbligatorio';

                      $message["password.required"] = 'Il campo della password è obbligatorio';

                      $message["email.unique"] = "l'email è già stata presa";

                     $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';

                     $message["password.min"] = 'La password deve contenere almeno 6 caratteri';

                     $message["password.confirmed"] = 'La conferma della password non corrisponde';
                     
                     $message["name.max"] = 'Il nome deve contenere almeno 200 caratteri';
                     
                     $message["userName.max"] = 'Il nome deve contenere almeno 200 caratteri';
                     
                    
                     $this->validate($request, $rules,$message);   

                     

                  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) { 

                   $secretKey = '6LfN1poUAAAAAJrx4d053qLJ6wvPpykAbURLTvOl'; 
             
                    // Verify the reCAPTCHA response 
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
                     
                    // Decode json data 
                    $responseData = json_decode($verifyResponse); 

                     if($responseData->success){ 
    

                    $checkReferralCodeParent = User::where(['referralCode'=>strtoupper($request->input('referralCode')),'role_type'=>'2'])->first();

                    $userAs = !empty($checkReferralCodeParent)?$checkReferralCodeParent->user_as:'';


                  $user = new User();                    

                if($userAs!='BK0'){

                   $user->name     =      !empty($request->input('name'))               ?         $request->input('name') :'';
                   $user->userName =      !empty($request->input('userName'))           ?         $request->input('userName') : '';
                   $user->telephoneNumber= !empty($request->input('telephoneNumber'))   ?         $request->input('telephoneNumber') : '';
                   $user->postalCode   =    !empty($request->input('postalCode'))       ?         $request->input('postalCode') : ''; 
                   $user->email        =    !empty($request->input('email'))            ?         $request->input('email'):'';
                   $user->password     =    !empty($request->input('password'))        ?           bcrypt($request->input('password')):'';
                   $user->remember_token   =   !empty($request->input('_token'))       ?           $request->input('_token'):'';
                   $user->parent_id       =      !empty($checkReferralCodeParent)      ?           $checkReferralCodeParent->id:'0';
                   $user->referralCode    =      strtoupper(str_random(6));
                 

                   if ($user->save()) {                 
                                    

                                // Notification section//
                              $notMessage = 'Nuovo registro promotore';

                              Helper::saveNotification($user->id, $user->parent_id, $notMessage, '2', '1');
                               // end here//

                            $subject= 'Conferma registrazione';

                             $header = "From:bklic@bklic.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";

                             $message ='<p>Ciao '.$request->input('name').'</p>'; 
							 $message.='<p></p>';
                             $message.='<p>Benvenuto in Bklic, grazie per esserti registrato!  </p>'; 
							 $message.='<p></p>';
                             $message.= '<p>Conferma la tua registrazione al seguente link e completa subito il tuo profilo personale! </p>​';
							 $message.='<p></p>';
                             $message.= '<p><a href="'.url('user-login/'.$request->input('_token')).'">Clicca qui</a></p>';
							 $message.='<p></p>';

                             mail($request->input('email'),$subject,$message,$header);

                            return redirect('/user-register')->with('success','La registrazione è avvenuta con successo per favore verifica prima la tua email');
                        } 
                        else {
                           return redirect('/user-register');
                        }
                     }else{
                            return redirect('/user-register')->with('danger',"il livello genitore dovrebbe essere l'aggiornamento da Bk0 a BK2.");
                        }


                      }else{

                             return redirect('register')->with('danger','Si prega di selezionare un captcha.');
                         }
                     }else{

                        return redirect('register')->with('danger','Si prega di selezionare un captcha.');
                     } 
         }

        return view('auth.register');
    }




/* here are qr code detail*/

    public function URL($url = null){

        //echo $url;die;
        $this->data = preg_match("#^https?\:\/\/#", $url) ? $url : "http://{$url}";
    }


   public function CONTACT($name = null, $address = null, $phone = null, $email = null) {

     $this->data = "MECARD:N:{$name};COD:{$address};TEL:{$phone};EMAIL:{$email};;";

   }




    public function QRCODE($size = 200, $filename = null) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $img = curl_exec($ch);
            curl_close($ch);
            
            if($img) {
              if($filename) {
                if(!preg_match("#\.png$#i", $filename)) {
                  $filename .= ".png";
                }
                
                return file_put_contents($filename, $img);
              } else {
                header("Content-type: image/png");
                //print $img;
                return true;
              }
            }

            return false;
  }

  /*end here*/





    public function userLogin(Request $request,$token=null)
    {

        if(!empty($token))
        {
             $checkReferralCodeParent = User::where(['remember_token'=>$token,'is_email_verify'=>'0'])->first();

              if(!empty($checkReferralCodeParent))
              {
                    $updateisVerify= array(
                                    'is_email_verify'=>'1'
                                     );
                    User::where(['id' => $checkReferralCodeParent->id])->update($updateisVerify);

                    return redirect('user-login')->with('success','Il tuo indirizzo email è verificato ora puoi effettuare il login.');

              }else{

                return redirect('user-login')->with('danger','Mancata corrispondenza dei token con noi.');
              }

                  //echo '<pre>';print_r($checkReferralCodeParent);die;

        }elseif(isset($_POST['login'])) {

                
                    $rules=[
                         'email' => 'required|string|email|max:255',
                         'password' => 'required|string|min:6',          
                      ];
  
                     $message["email.required"] = 'Il campo email è obbligatorio';

                     $message["password.required"] = 'Il campo della password è obbligatorio';

                     $message["password.min"] = 'La password deve contenere almeno 6 caratteri';

                      $this->validate($request, $rules,$message);    


                  
                  if(isset($_POST['remember'])) {
                         $remember= true;
                    }else{
                        $remember= false;
                    }

                $email = !empty($request->input('email')) ? $request->input('email'):'';
                $password = !empty($request->input('password')) ? $request->input('password'):'';
              
                if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1'], $remember)) {
                                  
                  if(Auth::user()->is_email_verify=='1' && (Auth::user()->role_type=='3' || Auth::user()->role_type=='1' || Auth::user()->role_type=='2')) {   
                              
                        if(Auth::user()->role_type=='3'){
                           
                                 $redto = $request->input('redirectto');
                                  $urlarr = explode('/', $redto);                                    

                                    if(in_array('affiliatese',$urlarr)){
                                         return redirect($redto);
                                      }else{
                                           $request->session()->flush();
                                           return redirect('user-login')->with('danger','oops! non hai il permesso di accesso.');
                                      }
                            }elseif(Auth::user()->role_type=='1'){

                              return redirect('/administrator/dashboard');

                            }else{
                              return redirect('/home');
                            }
                       
                    }else{

                          $request->session()->flush();
                      return redirect('user-login')->with('danger','Verifica prima il tuo indirizzo email.');
                    }

                 }else{

                    return redirect('user-login')->with('danger','Indirizzo email o password sono errati!');
                 }

        }else{
              return view('auth.login');
        }
        
    }

    public function ForgotPassword(Request $request)
    {

      if(isset($_POST['forgotpassword']))
      {

                $rules=[
                         'email' => 'required|string|email|max:255',                               
                      ];

              $message["email.required"] = 'Il campo email è obbligatorio';
              
               $this->validate($request, $rules,$message); 
     

          $email = !empty($request->input('email'))?$request->input('email'):'';

           $token= !empty($request->input('_token'))?$request->input('_token'):'';

          $checkEmailExists= User::where('email','=',$email)->first();
             
       
          if(!empty($checkEmailExists))
          { 

              if($checkEmailExists->is_email_verify=='1')
              {

                    $updateToken= array(
                            'remember_token'=>$token
                        );

                     User::where(['id' => $checkEmailExists->id])->update($updateToken);

                      $subject= 'Password dimenticata';

                     $header = "From:bklic@bklic.komete.it \r\n";
                     $header.= 'MIME-Version: 1.0' . "\r\n";
                     $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";

                     $message ='<p>Ciao '.$checkEmailExists->name.'</p>'; 
					 $message.='<p></p>';
                     $message.='<p>Puoi resettare la password con il link sotto . </p>'; 
					 $message.='<p></p>';
                     $message.= '<p><a href="'.url('user-resetpassword/'.$token).'">Per favore clicca il link per verificare il tuo indirizzo email</a></p>';
					 $message.='<p></p>';

                     mail($email,$subject,$message,$header);  

              }else{

                  return redirect('user-forgotpassword')->with('danger','Si prega di verificare prima e-mail.');
              }

          }else{

            return redirect('user-forgotpassword')->with('danger','indirizzo email non corrisponde a noi.');
          }

      }
      return view('auth.passwords.email');

    }



    public function ResetPassword(Request $request,$token)
    {
        //echo $token;die;


          $checkTokenCorrect= User::where('remember_token','=',$token)->first();

          if(!empty($checkTokenCorrect))
          {
              if(isset($_POST['reset']))
              {
                 
                     $rules=[
                         'password' => 'required|string|min:6|confirmed',                               
                      ];

                      $message["password.required"] = 'Il campo della password è obbligatorio';
                      $message["password.min"] = 'La password deve contenere almeno 6 caratteri';

                     $message["password.confirmed"] = 'La conferma della password non corrisponde';

                      $this->validate($request, $rules,$message); 


                   $password= !empty($request->input('password'))?$request->input('password'):'';

                    $updatepassword= array(
                            'password'=>bcrypt($password)
                        );


                     User::where(['id' => $checkTokenCorrect->id])->update($updatepassword); 

                   return redirect('user-login')->with('success','La tua password cambia con successo');  
             }
             
          }else{

            return redirect('user-login')->with('danger','Mancata corrispondenza dei token con noi.');
          }

        return view('auth.passwords.reset',['token'=>$token]);

    }
    
    public function MemberRegister()
    {

      return view('auth.members-register');
    }

       public function MemberLogin()
    {

      return view('auth.members-login');
    }


}
