<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\User;
use App\DealerPost;

use App\DealerDetail;
use App\DealerImages;
use Validator;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class DealerController extends Controller
{
     private $apiUrl = 'http://chart.apis.google.com/chart';

     private $data;
     
    
    public function index()
    {
        
        
        return view('Affiliatese.home');
    } 


	public function register(Request $request)
    {


            if(isset($_POST['register'])){

                 $rules=[
                        'name' => 'required|string|max:255',
                        'userName' => 'required|string|max:255',
                        'telephoneNumber' => 'required|numeric|digits:10',
                        'postalCode' => 'required|string|min:5',
						'iva' => 'required|string',
						'category' => 'required|string',
						'subcategory' => 'required|string',
						'discount_amount' => 'required|numeric',
						
                        'email' => 'required|string|email|max:255',
                        'password' => 'required|string|min:6|confirmed',     
                    ];
  
                     $message["name.required"] = 'È richiesto il campo nome';

                    $message["userName.required"] = 'Il campo userName è richiesto';

                     $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';

                     $message["postalCode.required"] = 'Il campo cap è richiesto';

                     $message["email.required"] = 'Il campo email è obbligatorio';

                      $message["password.required"] = 'Il campo della password è obbligatorio';
					  
					$message["iva.required"] = 'Il campo IVA è obbligatorio';
					
					$message["discount_amount.required"] = 'Il campo Codice sconto è obbligatorio';
					$message["category.required"] = 'Il campo Categoria è obbligatorio';
					$message["subcategory.required"] = 'Il campo Sottocategoria è obbligatorio';

                      $message["email.unique"] = "l'email è già stata presa";

                     $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';

                     $message["password.min"] = 'La password deve contenere almeno 6 caratteri';

                     $message["password.confirmed"] = 'La conferma della password non corrisponde';
                    
                    $this->validate($request, $rules,$message);   

                     

                 /* if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) { 

                   $secretKey = '6LfN1poUAAAAAJrx4d053qLJ6wvPpykAbURLTvOl'; 
             
                    // Verify the reCAPTCHA response 
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LfH15oUAAAAAAiQ57RAexlr_7M_k2BPggIBBycV&response='.$_POST['g-recaptcha-response']); 
                     
                    // Decode json data 
                    $responseData = json_decode($verifyResponse); 

                     if($responseData->success){ 
    */
	

                    $checkReferralCodeParent = User::where('referralCode','=',strtoupper($request->input('referralCode')))->first(); 

                   $Affiliatese = new User();

                    $this->CONTACT($request->input('name'),$address= $request->input('postalCode'),$phone=$request->input('telephoneNumber'),$email=$request->input('email'));

                    // render QR code
                    $randString =  rand();                
                    $this->QRCODE(200,"$randString.png");
                   

                    

                    //echo $request->input('_token');die;
                   $Affiliatese->name     =      !empty($request->input('name'))               ?         $request->input('name') :'';
                   $Affiliatese->userName =      !empty($request->input('userName'))           ?         $request->input('userName') : '';
                   $Affiliatese->telephoneNumber= !empty($request->input('telephoneNumber'))   ?         $request->input('telephoneNumber') : '';
                   $Affiliatese->postalCode   =    !empty($request->input('postalCode'))       ?         $request->input('postalCode') : ''; 
                   $Affiliatese->email        =    !empty($request->input('email'))            ?         $request->input('email'):'';
                   $Affiliatese->password     =    !empty($request->input('password'))        ?           bcrypt($request->input('password')):'';
                   $Affiliatese->remember_token   =   !empty($request->input('_token'))       ?           $request->input('_token'):'';
                   $Affiliatese->parent_id       =      !empty($checkReferralCodeParent)      ?           $checkReferralCodeParent->id:'0';
                   $Affiliatese->pariva =      !empty($request->input('iva'))           ?         $request->input('iva') : ''; 
                   $Affiliatese->referralCode    =      strtoupper(str_random(6));
                   $Affiliatese->qr_code         =      "$randString.png";
                   $Affiliatese->role_type         =      4;

                   if ($Affiliatese->save()) {
					   
	
                        $insert1= new DealerDetail();
                        $insert1->iva =      !empty($request->input('iva'))           ?         $request->input('iva') : '';
						$insert1->discount_amount =      !empty($request->input('discount_amount'))           ?         $request->input('discount_amount') : '';
						$insert1->category =      !empty($request->input('category'))           ?         $request->input('category') : '';
						$insert1->sub_category =      !empty($request->input('subcategory'))           ?         $request->input('subcategory') : '';
                        
                        $insert1->affiliatese_id= $Affiliatese->id;
                        $insert1->save();
                     

                              $subject= 'Registration Confirmation';

                             $header = "From:bklic@bklic.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             $message ='Ciao '.$request->input('name').'<br/>'; 
                             $message.='Grazie per esserti registrato a Bklic. <br/>'; 
                             $message.= 'Per favore, conferma la tua registrazione al seguente link.<br/>';
                             $message.= '<a href="'.url('affiliatese-login/'.$request->input('_token')).'">Click here</a>';

                             mail($request->input('email'),$subject,$message,$header);

                             // $request->session()->flash('success', 'Registration is done successfully');
                            return redirect('/affiliatese-register')->with('success','La registrazione è avvenuta con successo per favore verifica prima la tua email');
                        } 
                        else {
                           return redirect('/affiliatese-register');
                        }

                   /*   }else{

                             return redirect('register')->with('danger','Si prega di selezionare un captcha.');
                         }
                     }else{

                        return redirect('register')->with('danger','Si prega di selezionare un captcha.');
                     } */
         }

        return view('Affiliatese.register');
    }
	public function login(Request $request,$token=null)
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

                    return redirect('affiliatese-login')->with('success','Il tuo indirizzo email è verificato ora puoi effettuare il login.');

              }else{

                return redirect('affiliatese-login')->with('danger','Mancata corrispondenza dei token con noi.');
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

                     $userId = Auth::id();
                 
                     if(Auth::user()->is_email_verify=='1') {

                       return redirect('/dealer');
                    }else{
                      return redirect('affiliatese-login')->with('danger','Verifica prima il tuo indirizzo email.');
                    }

                 }else{

                    return redirect('affiliatese-login')->with('danger','Indirizzo email o password sono errati!');
                 }

        }else{
              return view('Affiliatese.login');
        }

        
        
    }
	
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

                      $subject= 'ForgotPassword Confirmation';

                     $header = "From:bklic@bklic.komete.it \r\n";
                     $header.= 'MIME-Version: 1.0' . "\r\n";
                     $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                     $message ='Hello '.$checkEmailExists->name.'<br/>'; 
                     $message.='You can reset your password bellow link . <br/>'; 
                     $message.= '<a href="'.url('user-resetpassword/'.$token).'">Please click on link to verify your email address</a>';

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
    
    
    
    public function editPost(Request $request,$id)
    {
        if(isset($_POST['addbutton']))
        {
        $rules=[
                      'Titolo' => 'required|string|max:255',
                      'editor1' => 'required|string',
                      'iva' => 'required|string',
                      'vat_code' => 'required|string',
                      'discount_amount' => 'required|string',
                      'category' => 'required|numeric',
                      'sub_category' => 'required|numeric'
                  ];


             $message["Titolo.required"] = 'Il campo del titolo è obbligatorio';
             $message["editor1.required"] = 'Il campo descrizione è obbligatorio';
             $message["iva.required"] = 'Il campo IVA è obbligatorio';
             $message["vat_code.required"] = 'Il campo del codice IVA è obbligatorio';
             $message["discount_amount.required"] = 'Il campo Codice sconto è obbligatorio';
             $message["category.required"] = 'Il campo Categoria è obbligatorio';
             $message["sub_category.required"] = 'Il campo Sottocategoria è obbligatorio';
           
              $this->validate($request, $rules,$message); 
    
         $title       =  !empty($request->input('Titolo'))  ? $request->input('Titolo')  : '';
         $description = !empty($request->input('editor1'))  ? $request->input('editor1') :'' ; 
         $iva       =  !empty($request->input('iva'))  ? $request->input('iva')  : '';
         $vat_code = !empty($request->input('vat_code'))  ? $request->input('vat_code') :'' ; 
         $discount_amount = !empty($request->input('discount_amount'))  ? $request->input('discount_amount') :'' ; 
         $category = !empty($request->input('category'))  ? $request->input('category') :'' ; 
         $sub_category = !empty($request->input('sub_category'))  ? $request->input('sub_category') :'' ; 
         $pid = !empty($request->input('id'))  ? $request->input('id') :'' ; 
        $updateDetail = array(
                        'title'=>$title,
                        'description'=>$description,
                        'vat_code'=>$vat_code,
                        'iva' =>$iva,
                        'discount_amount'=>$discount_amount,
                        'category'=>$category,
                        'sub_category'=>$sub_category,
                        
                );

        DealerPost::where(['id'=>$pid])->update($updateDetail);
        $request->session()->flash('success', 'Il post è stato aggiunto con successo!');

            return redirect('dealer-post');  
        }
        $getPostDetail = DealerPost::where(['id'=>$id])->first();
        //echo '<pre>'; print_r($getPostDetail); die;
        return view('Affiliatese.addPost',['getPostDetail'=>$getPostDetail]);
    } 
    public function addPost(Request $request)
    {
      
        if(isset($_POST['addbutton']))
        {

            $rules=[
                      'Titolo' => 'required|string|max:255',
                      'editor1' => 'required|string',
                     
                  ];


             $message["Titolo.required"] = 'Il campo del titolo è obbligatorio';
             $message["editor1.required"] = 'Il campo descrizione è obbligatorio';
             $message["iva.required"] = 'Il campo IVA è obbligatorio';
             $message["vat_code.required"] = 'Il campo del codice IVA è obbligatorio';
             $message["discount_amount.required"] = 'Il campo Codice sconto è obbligatorio';
            /* $message["category.required"] = 'Il campo Categoria è obbligatorio';
             $message["sub_category.required"] = 'Il campo Sottocategoria è obbligatorio';*/
           
              $this->validate($request, $rules,$message); 

             $title       =  !empty($request->input('Titolo'))  ? $request->input('Titolo')  : '';
             $description = !empty($request->input('editor1'))  ? $request->input('editor1') :'' ; 
             $iva       =  !empty($request->input('iva'))  ? $request->input('iva')  : '';
             $vat_code = !empty($request->input('vat_code'))  ? $request->input('vat_code') :'' ; 
             $discount_amount = !empty($request->input('discount_amount'))  ? $request->input('discount_amount') :'' ; 
            /* $category = !empty($request->input('category'))  ? $request->input('category') :'' ; 
             $sub_category = !empty($request->input('sub_category'))  ? $request->input('sub_category') :'' ; */
             

             
             $insert= new DealerPost();

             $insert->title= $title;
             $insert->description= $description;
            /* $insert->vat_code= $vat_code;
             $insert->iva= $iva;
             $insert->discount_amount= $discount_amount;
             $insert->category= $category;
             $insert->sub_category= $sub_category;*/
             
             
             $insert->affiliatese_id = Auth::id();  
             //$insert->status = '1';
            
              $insert->save();
             

              $request->session()->flash('success', 'Il post è stato aggiunto con successo!');

            return redirect('dealer-post');  

        }
        return view('Affiliatese.addPost');
        
    } 
    
     public function listPost(Request $request)
    {
        
        $getPostDetail = DealerPost::all();
        //echo '<pre>'; print_r($getPostDetail); die;
        return view('Affiliatese.postlist',['getPostDetail'=>$getPostDetail]);
    } 
    
    public function dealerSetting(Request $request)
    {
        
        return view('Affiliatese.setting');
    }
    
     public function uploadLogo(Request $request)
    {
		
		if(!empty($_POST)){
			 if ($request->hasFile('file')) {
				
				$image = $request->file('file');
				$fileext = $image->getClientOriginalExtension();
			
				
				$name = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/dealerlogo');
				$image->move($destinationPath, $name);
				$insert= new DealerLogo();
			  
				$insert->file= $name;
				$insert->save();
				$request->session()->flash('success', 'Il file è stato caricato con successo!');
				return redirect('dealersetting');
			 }
		}
        return view('administrator.addElearningdocs');

    }
    
    public function DealerProfile(Request $request)
    {

        $id= Auth::id();  

        $userProfile = User::where('users.id', $id)->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_detail.iva', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.discount_amount')->first();

      if(isset($_POST['updateprofile']))
      {  

              $rules=[
                      'name' => 'required|string|max:255',
                      'userName' => 'required|string|max:255',
                      'telephoneNumber' => 'required|numeric|min:10',
                      'postalCode' => 'required|numeric|min:5',
                      'dob'   =>      'required', 
                      'resiaddress' => 'required|string|max:255',
                      'region'      => 'required|string|max:255',
                      'streat'    =>   'required|string|max:255',
                      'Fcode'    =>    'required|string|max:255',
                      'pariva'   =>    'required|string|max:255', 
                      'business_name'   =>    'required|string|max:255',
                      'IBAN'   =>    'required|string|max:255',
                      'bank'   =>    'required|string|max:255',
                      'Paypal'   =>    'required|string|max:255',
                      'profileImage' => 'mimes:jpeg,jpg,png | max:1024',  
                    ];

              $message["name.required"] = 'È richiesto il campo nome';
              $message["userName.required"] = 'Il campo userName è richiesto';
              $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';
              $message["postalCode.required"] = 'Il campo cap è richiesto';
              $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';
              $message['dob.required']           =  'È richiesto il campo Nata/o a';
              $message['resiaddress.required']   =  'È richiesto il campo Residente a';
              $message['region.required']        =   'È richiesto il campo Regione';
              $message['streat.required']        =   'È richiesto il campo Via';
              $message['Fcode.required']         =   'È richiesto il campo Codice Fiscale';
              $message['pariva.required']        =    'È richiesto il campo Part. I.V.A';
              $message['business_name.required']  =    'Il campo Nome aziendale è obbligatorio';
              $message['IBAN.required']        =    'È richiesto il campo del nome Iban';
              $message['bank.required']        =    'Il campo del nome della banca è obbligatorio';
              $message['Paypal.required']        =    'Il campo del nome paypal è obbligatorio';

              $message['profileImage.mimes']        =  'Il file dovrebbe essere jpg, png, jpeg e dimensione massima 1 MB';

              $this->validate($request, $rules,$message);   


            $name        =          !empty($request->input('name')) ?    $request->input('name') :'';
            $username     =         !empty($request->input('userName')) ?     $request->input('userName'):'';
            $telephoneNumber  =     !empty($request->input('telephoneNumber'))  ?  $request->input('telephoneNumber'):'';
            $postalCode   =         !empty($request->input('postalCode'))    ?  $request->input('postalCode'):'';
            $dob          =         !empty($request->input('dob'))            ?  $request->input('dob')  : '';
            $resiaddress  =         !empty($request->input('resiaddress'))    ?  $request->input('resiaddress')  :  '';
            $region       =         !empty($request->input('region'))         ?  $request->input('region')      :  '';
            $streat       =         !empty($request->input('streat'))         ?  $request->input('streat')      :  '';
            $fcode        =         !empty($request->input('Fcode'))         ?  $request->input('Fcode')       :   ''; 
            $pariva       =         !empty($request->input('pariva'))         ?  $request->input('pariva')       :   ''; 
            $business_name  =       !empty($request->input('business_name'))         ?  $request->input('business_name')       :   '';
            $IBAN          =        !empty($request->input('IBAN'))         ?  $request->input('IBAN')       :   '';
            $bank          =        !empty($request->input('bank'))         ?  $request->input('bank')       :   '';
            $Paypal       =         !empty($request->input('Paypal'))         ?  $request->input('Paypal')       :   '';
			$discount_amount       =         !empty($request->input('discount_amount'))         ?  $request->input('discount_amount')       :   '';
			$category       =         !empty($request->input('category'))         ?  $request->input('category')       :   '';
			$subcategory       =         !empty($request->input('subcategory'))         ?  $request->input('subcategory')       :   '';
            
            $logoImage       =         !empty($request->input('logoImage'))         ?  $request->input('logoImage')       :   '';
            
             if(!empty($request->file('logoImage'))){
                     $image       =         !empty($request->file('logoImage'))  ?  $request->file('logoImage') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/dealer_logos');
                     $image->move($destinationPath, $imagNmae);
                     
                     $dealerlogo = DealerLogos::where('affiliatese_id',$id)->value('logo');
                     if(!empty($dealerlogo)){
                         $updatedealerLogo = array(
                                  
                                  'logo'=>$imagNmae
                                  
                                );
                         DealerLogos::where(['affiliatese_id'=>$id])->update($updatedealerLogo);
                     }else{
                        $insert1= new DealerLogos();
                        
                        $insert1->logo= $imagNmae;
                        $insert1->affiliatese_id= $id;
                        $insert1->save();
                     }
                 }else{
                    $imagNmae=  $request->input('old_logo');
                 }


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
            return redirect('/dealerprofile');
       }

      return view('Affiliatese.dealerProfile',['userProfile'=>$userProfile]);
      
    }
    
    
    public function pageBuilder(Request $request)
    {

        $id= Auth::id();  
        $data = array();

        $userProfile = User::where('users.id', $id)->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_images.file as filename', 'dealer_detail.iva', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.discount_amount', 'dealer_detail.logo')->first();
      //echo '<pre>'; print_r($userProfile); die;

      if(isset($_POST['updatepage']))
      {  
        
               $rules=[
                        
						'category' => 'required|string',
						'subcategory' => 'required|string',
						'filename' => 'required',
						
					  
                    ];
  
                   
				
					$message["category.required"] = 'Il campo Categoria è obbligatorio';
					$message["subcategory.required"] = 'Il campo Sottocategoria è obbligatorio';
					$message["filename.required"] = 'Il campo Sottocategoria è obbligatorio';

                    
                    
                    $this->validate($request, $rules,$message);   


       
			$category       =         !empty($request->input('category'))         ?  $request->input('category')       :   '';
			$subcategory       =         !empty($request->input('subcategory'))         ?  $request->input('subcategory')       :   '';
            
            $logoImage       =         !empty($request->input('logoImage'))         ?  $request->input('logoImage')       :   '';
            
           
            
             if(!empty($request->file('logoImage'))){
                     $image       =         !empty($request->file('logoImage'))  ?  $request->file('logoImage') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/dealer_logos');
                     $image->move($destinationPath, $imagNmae);
                     
                    
                 }else{
                    $imagNmae=  $request->input('old_logo');
                
                        
                 }
                 
                if($request->hasfile('filename'))
                {
                    $b=1;
                    foreach($request->file('filename') as $image1)
                    {
                        $name=time().$b.'.'.$image1->getClientOriginalExtension();
                         $destinationPath1 = public_path('/dealer_images');
                        $image1->move($destinationPath1, $name); 
                        $data[] = $name;  
                        $b++;
                    }
                    
                }
                    $insert3= new DealerImages();
                    
                    $insert3->file= json_encode($data);
                    
                    $insert3->affiliatese_id= $id;
                    $insert3->save();
                
               
                 
                       
                  $dealerdetails = DealerDetail::where('affiliatese_id',$id)->value('id');
                     if(!empty($dealerdetails)){
                         $updatedealerdetail = array(
                                  
                                   'category'=>$category,
                                   'sub_category'=>$subcategory,
                                   'logo'=>$imagNmae
                                  
                                );
                         DealerDetail::where(['affiliatese_id'=>$id])->update($updatedealerdetail);
                     }else{
                        $insert2= new DealerDetail();
                        
                        $insert2->category= $category;
                        $insert2->sub_category= $subcategory;
                        $insert2->logo= $imagNmae;
                        
                        $insert2->affiliatese_id= $id;
                        $insert2->save();
                     }
                


              
             // end here //
        
           


            $request->session()->flash('success', 'La pagina è stata aggiornata con successo');    
            return redirect('/page_builder');
       }

      return view('Affiliatese.dealerpage',['userProfile'=>$userProfile]);
      
    }
    
    
    
    
    
    
    
    
   
}
