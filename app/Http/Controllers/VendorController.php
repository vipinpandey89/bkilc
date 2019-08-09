<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\DealerPost;
use App\PaymentHistory;
use App\Wallet;
use App\PaypalSetting;
use App\Commission;
use App\DealerDetail;
use App\DealerImages;
use App\CategoryManagement;
use Validator;
use File;
use Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\SubscriptionPlans;
use App\SetReminder;
use DateTime;
use Mail;
class VendorController extends Controller
{
     private $apiUrl = 'http://chart.apis.google.com/chart';

     private $data;
     
    
    public function index()
    {
        
        
        return view('Affiliatese.home');
    } 


	public function register(Request $request)
    {
 
            $getCategories = CategoryManagement::all();
			///echo '<pre>'; print_r($getCategories); die;
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
	

                    if(!empty($request->input('referralCode'))){
						$checkReferralCodeParent = User::where('referralCode','=',strtoupper($request->input('referralCode')))->first(); 
						$ispromotor = 1;
					}else{
						
						 $checkReferralCodeParent = User::where(['postalCode'=>$request->input('postalCode'),'role_type'=>2])->first(); 
						// echo '<pre>'; print_r($checkReferralCodeParent); die;
						 $ispromotor = 0;
						
					}

                   $Affiliatese = new User();
                 

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
                   //$Affiliatese->referralCode    =      strtoupper(str_random(6));
                  // $Affiliatese->qr_code         =      "$randString.png";
                   $Affiliatese->role_type         =      4;
				          $Affiliatese->isPromotor         =      $ispromotor;


          $userAs = !empty($checkReferralCodeParent)?$checkReferralCodeParent->user_as:'';
                  if($userAs!='BK0'){
                   if ($Affiliatese->save()) {
					   
	
                        $insert1= new DealerDetail();
                      
                        $notMessage = 'Nuovo registro Affiliati';

                        Helper::saveNotification($Affiliatese->id, $Affiliatese->parent_id, $notMessage, '4', '1');

  						$insert1->category =      !empty($request->input('category'))           ?         $request->input('category') : '';
  						$insert1->sub_category =      !empty($request->input('subcategory'))           ?         $request->input('subcategory') : '';
                        
                        $insert1->affiliatese_id= $Affiliatese->id;
                        $insert1->save();
						
						
						$insert12= new DealerPost();
                        $insert12->iva =      !empty($request->input('iva'))           ?         $request->input('iva') : '';
						$insert12->discount_amount =      !empty($request->input('discount_amount'))           ?         $request->input('discount_amount') : '';
						
                        
                        $insert12->affiliatese_id= $Affiliatese->id;
                        $insert12->save();
                     

                              $subject= 'Conferma registrazione';

                             $header = "From:bklic@bklic.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";

                             $message ='Ciao '.$request->input('name').'<br/>'; 
                             $message.='Complimenti! Sei appena entrato a far parte della rete di negozi Bklic con il tuo xxxxx ('.$request->input('userName').').<br/>';
                             $message.= ' Ti ricordiamo che questa affiliazione dura un anno a partire da oggi. ​ <br/>';
                             $message.='Scopri subito come farti conoscere link articolo come farsi pubblicità di un articolo da tenere pubblicato nel blog e riutilizzare.</br>'; 
                             $message.= 'Per favore, conferma la tua registrazione al seguente link.<br/>';
                             $message.= '<a href="'.url('affiliatese-login/'.$request->input('_token')).'">Clicca qui</a>';

                             mail($request->input('email'),$subject,$message,$header);

                             // $request->session()->flash('success', 'Registration is done successfully');
                            return redirect('/affiliatese-register')->with('success','La registrazione è avvenuta con successo per favore verifica prima la tua email');
                        } 
                        else {
                           return redirect('/affiliatese-register');
                        }
                      }else{

                         return redirect('/affiliatese-register')->with('danger',"il livello genitore dovrebbe essere l'aggiornamento da Bk0 a BK2");
                      } 

                   /*   }else{

                             return redirect('register')->with('danger','Si prega di selezionare un captcha.');
                         }
                     }else{

                        return redirect('register')->with('danger','Si prega di selezionare un captcha.');
                     } */
         }

        return view('Affiliatese.register',['getCategories'=>$getCategories]);
    }
	
	
	public function getAffiliateseSucat(Request $request){
		if(!empty($_POST)){
			$selct = '';
			$catd = !empty($request->input('catv'))  ? $request->input('catv')  : '';
			$affiliatesProfile = CategoryManagement::where('parent_id', $catd)->get();
			if(!empty($affiliatesProfile)){
				$selct = '<select class="form-control affiliates-select" id="subcategory" name="subcategory"><option value="">Seleziona sottocategoria</option>';
                                if(!empty($request->input('catv'))){
				foreach($affiliatesProfile as $subcatv){
					$selct .= '<option value="'.$subcatv->id.'">'.$subcatv->title.'</option>';
				}
                            }
			}
			$selct .= '</select>';
			echo $selct;
			
			 
		}
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
              
                  if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1','role_type'=>'4'], $remember)) {

                     $userId = Auth::id();
                 
                    if(Auth::user()->is_email_verify=='1' && Auth::user()->is_profile_complete=='1') {

                       return redirect('/dealer-post');
                    }elseif(Auth::user()->is_profile_complete=='0' && Auth::user()->is_email_verify=='1') {

                       	User::where('email','=',$email)->update(array('is_profile_complete'=>'1'));
                        return redirect('/dealerprofile');
                    }
                    else{
                       $request->session()->flush();
                      return redirect('affiliatese-login')->with('danger','Controlla prima il tuo indirizzo email e verifica il tuo account.');
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

                      $subject= 'Password dimenticata';

                     $header = "From:bklic@bklic.komete.it \r\n";
                     $header.= 'MIME-Version: 1.0' . "\r\n";
                     $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";

                     $message ='Ciao '.$checkEmailExists->name.'<br/>'; 
                     $message.='Puoi resettare la password con il link sotto . <br/>'; 
                     $message.= '<a href="'.url('user-resetpassword/'.$token).'">Per favore clicca il link per verificare il tuo indirizzo email</a>';

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

      
		$id = Auth::id(); 
		$data = array();
		$videoname = '';
		$getCategories = CategoryManagement::all();

        $userProfile = User::where('users.id', $id)->groupBy('users.id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo', 'dealer_detail.video')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id")->first();
      
      
	    $getPostDetail = DealerPost::where(['affiliatese_id'=>$id])->first();
		
       
        if(isset($_POST['addbutton']))
        {

            $rules=[
                      'Titolo' => 'required|string|max:255',
                      'editor1' => 'required|string',
					  'iva' => 'required|string',
					  // 'vat_code' => 'required|string',
					  'discount_amount' => 'required|string',
					  'business_name' => 'required|string',
					  	'category' => 'required|string',
						'subcategory' => 'required|string',
						
                     
                  ];

			
            


             $message["Titolo.required"] = 'Il campo del titolo è obbligatorio';
             $message["editor1.required"] = 'Il campo descrizione è obbligatorio';
             $message["iva.required"] = 'Il campo IVA è obbligatorio';
             // $message["vat_code.required"] = 'Il campo del codice IVA è obbligatorio';
             $message["discount_amount.required"] = 'Il campo Codice sconto è obbligatorio';
			 $message["business_name.required"] = 'La ragione sociale è obbligatoria';
			 
			$message["category.required"] = 'Il campo Categoria è obbligatorio';
			$message["subcategory.required"] = 'Il campo Sottocategoria è obbligatorio';
			//$message["filename.required"] = 'Il campo Sottocategoria è obbligatorio';
            /* $message["category.required"] = 'Il campo Categoria è obbligatorio';
             $message["sub_category.required"] = 'Il campo Sottocategoria è obbligatorio';*/
           
              $this->validate($request, $rules,$message); 

             $title       =  !empty($request->input('Titolo'))  ? $request->input('Titolo')  : '';
             $description = !empty($request->input('editor1'))  ? $request->input('editor1') :'' ; 
             $iva       =  !empty($request->input('iva'))  ? $request->input('iva')  : '';
             $vat_code = !empty($request->input('vat_code'))  ? $request->input('vat_code') :'' ; 
             $discount_amount = !empty($request->input('discount_amount'))  ? $request->input('discount_amount') :'' ;
			 $business_name = !empty($request->input('business_name'))  ? $request->input('business_name') :'' ;
			$video = !empty($request->input('video'))  ? $request->input('video') :'' ;			 
			 
			 
			 $category       =         !empty($request->input('category'))         ?  $request->input('category')       :   '';
			$subcategory       =         !empty($request->input('subcategory'))         ?  $request->input('subcategory')       :   '';
            
            $logoImage       =         !empty($request->input('logoImage'))         ?  $request->input('logoImage')       :   '';
            /* $category = !empty($request->input('category'))  ? $request->input('category') :'' ; 
             $sub_category = !empty($request->input('sub_category'))  ? $request->input('sub_category') :'' ; */
             
            $updatePost = array(
                                  'title'=>$title,
                                  'description'=>$description,
                                  'vat_code'=> $vat_code,
                                  'iva' => $iva,
                                  'discount_amount'       => $discount_amount,
                                  
                                );

            DealerPost::where(['affiliatese_id'=>$id])->update($updatePost);
			
			User::where(['id'=>$id])->update(array('business_name'=>$business_name));

            
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
				 
				 if(!empty($request->file('video'))){
                     $video1       =         !empty($request->file('video'))  ?  $request->file('video') : '';
                     $fileext1     =         $video1->getClientOriginalExtension();

                     // file move to folder//
                     $videoname = time().'.'.$video1->getClientOriginalExtension();
                     $destinationPath1 = public_path('/dealer_videos');
                     $video1->move($destinationPath1, $videoname);
                     
                    
                 }else{
                    $videoname=  $request->input('old_video');
                
                        
                 }
                
                    
                    
                if($request->hasfile('filename'))
                {
                    $b=1;
                    foreach($request->file('filename') as $image1)
                    {
                        $name=time().$b.'.'.$image1->getClientOriginalExtension();
                         $destinationPath1 = public_path('/dealer_images');
                        $image1->move($destinationPath1, $name); 
						 $insert3= new DealerImages();
						$insert3->file= $name;

						$insert3->affiliatese_id= $id;
						$insert3->save();
                        $b++;
                    }
                    
                }
                    
                
               
                 
                       
                  $dealerdetails = DealerDetail::where('affiliatese_id',$id)->value('id');
                     if(!empty($dealerdetails)){
                         $updatedealerdetail = array(
                                  
                                   'category'=>$category,
                                   'sub_category'=>$subcategory,
                                   'logo'=>$imagNmae,
								   'video'=>$videoname
                                  
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
             
             /*$insert= new DealerPost();

             $insert->title= $title;
             $insert->description= $description;
             $insert->vat_code= $vat_code;
             $insert->iva= $iva;
             $insert->discount_amount= $discount_amount;
             $insert->category= $category;
             $insert->sub_category= $sub_category;
             
             
             $insert->affiliatese_id = Auth::id();  
             //$insert->status = '1';
            
              $insert->save();*/
             

              $request->session()->flash('success', 'Informazioni aziendali aggiornate con successo!');

            return redirect('dealer-post');  

        }
        return view('Affiliatese.addPost',['getPostDetail'=>$getPostDetail,'userProfile'=>$userProfile, 'getCategories'=>$getCategories]);
        
    } 
	
	public function listPost(Request $request)
    {
        
        $getPostDetail = DealerPost::all();
        //echo '<pre>'; print_r($getPostDetail); die;
        return view('Affiliatese.postlist',['getPostDetail'=>$getPostDetail]);
    }
    
    /*  public function listPost(Request $request)
    {
        
        $getPostDetail = DealerPost::all();
        //echo '<pre>'; print_r($getPostDetail); die;
        return view('Affiliatese.postlist',['getPostDetail'=>$getPostDetail]);
    }  */
    
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

        $userProfile = User::where('users.id', $id)->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_detail.category', 'dealer_detail.sub_category')->first();

      if(isset($_POST['updateprofile']))
      {  

              $rules=[
                      'name' => 'required|string|max:255',
                      'userName' => 'required|string|max:255',
                      'telephoneNumber' => 'required|numeric|min:10',
                      'postalCode' => 'required|numeric|min:5',
                      'resiaddress' => 'required|string|max:255',
                      'region'      => 'required|string|max:255',
                      'streat'    =>   'string|max:255',
                      'Fcode'    =>    'string|max:255',
                      'pariva'   =>    'string|max:255', 
                      'business_name'   =>    'string|max:255',
                      'IBAN'   =>    'string|max:255',
                      'bank'   =>    'string|max:255',
                      'Paypal'   =>    'string|max:255',
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
		$getCategories = CategoryManagement::all();

        $userProfile = User::where('users.id', $id)->groupBy('users.id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id")->first();
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
						 $insert3= new DealerImages();
						$insert3->file= $name;

						$insert3->affiliatese_id= $id;
						$insert3->save();
                        $b++;
                    }
                    
                }
                    
                
               
                 
                       
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

      return view('Affiliatese.dealerpage',['userProfile'=>$userProfile, 'getCategories'=>$getCategories]);
      
    }
	
	public function getAffiliateseSucat1(Request $request){
		$id= Auth::id();  
        $data = array();

        $userProfile = User::where('users.id', $id)->groupBy('users.id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id")->first();
      //echo '<pre>'; print_r($userProfile); die;
		if(!empty($_POST)){
			$selct = '';
			$catd = !empty($request->input('catv'))  ? $request->input('catv')  : '';
			$affiliatesProfile = CategoryManagement::where('parent_id', $catd)->get();
			if(!empty($affiliatesProfile)){
				$sel = '';
				$selct = '<select class="form-control" id="subcategory" name="subcategory"><option value="">Seleziona sottocategoria</option>';
				foreach($affiliatesProfile as $subcatv){
					
					if(!empty($userProfile)){ if($userProfile->sub_category == $subcatv->id){ $sel = 'selected'; }else{$sel = '';}}
					$selct .= '<option '.$sel.' value="'.$subcatv->id.'">'.$subcatv->title.'</option>';
				}
			}
			$selct .= '</select>';
			echo $selct;
			
			 
		}
	}
	
	
	
	
	public function cardOwners(Request $request)
    {
        $id= Auth::id();  

        $userProfile = User::where('users.id', $id)->select('postalCode','region','users.id')->first();
		//echo '<pre>'; print_r($userProfile); die;
		if(!empty($userProfile->postalCode)){
			$pcode = $userProfile->postalCode;
			$rcode = $userProfile->region;
			//$cardowners = User::where('users.postalCode', $pcode)->where('users.role_type', '!=' , $id)->select('users.*')->first();
			$cardowners	= User::where(['postalCode'=>$pcode,'region'=>$rcode,'role_type'=>3])->get();
		}else{
			$cardowners = array();
		}
		
		//echo '<pre>'; print_r($cardowners); die;

		return view('Affiliatese.cardownerslist',['cardowners'=>$cardowners]);
    
    }
	
	public function affTransaction(Request $request)
    {
        $id= Auth::id();  

        $PaymentHistory= PaymentHistory::where(['user_id'=>$id])->leftJoin('users', 'users.id', '=', 'payment_history.user_id')->select('users.name','users.userName', 'payment_history.*')->get();
		//echo '<pre>'; print_r($userProfile); die;
		
		
		//echo '<pre>'; print_r($PaymentHistory); die;

		return view('Affiliatese.aff-transaction',['PaymentHistory'=>$PaymentHistory]);
    
    }
	
	public function viewCardOwner(Request $request, $id)
    {
    
        $cardownersdetail = User::where('users.id', $id)->select('*')->first();
		//echo '<pre>'; print_r($userdetail); die;

		return view('Affiliatese.cardownerview',['cardownersdetail'=>$cardownersdetail]);
    
    }
	
	
	public function deleteImage(Request $request, $id)
    {
    
		DealerImages::where('id',$id)->delete();

		 $request->session()->flash('success', 'Limmagine è stata cancellata con successo');    
         return redirect('/dealer-post');
    
    }
	
	public function dealerSubscription(Request $request)
    {

       //Helper::dealerRenew('57','10','700',$level='0');


        $dealerId= Auth::id();

        $dealerProfile=  User::where(['id'=>$dealerId])->first();
		
		$SubscriptionPlans=  SubscriptionPlans::where(['plan_type'=>2])->first();

		
		

      $paypalDetail= PaypalSetting::first();
		  $PaymentHistory= PaymentHistory::where(['user_id'=>$dealerId])->first();
		

        $userProfile = User::where('users.id', $dealerId)->select('postalCode','region','users.id','created_at')->first();
		//echo '<pre>'; print_r($userProfile); die;
		if(!empty($userProfile->postalCode)){
			 $pcode = $userProfile->postalCode;
			 $rcode = $userProfile->region;
			//$cardowners = User::where('users.postalCode', $pcode)->where('users.role_type', '!=' , $id)->select('users.*')->first();
			$cardowners	= User::where(['postalCode'=>$pcode,'region'=>$rcode,'role_type'=>'3'])->get();
			//echo '<pre>';print_r($cardowners);die;
		}else{
			$cardowners = array();
		}

        return view('Affiliatese.dealerSubscribe',['paypalDetail'=>$paypalDetail,'userProfile'=>$dealerProfile,'planGetById'=>$SubscriptionPlans,'cardowners'=>$cardowners, 'PaymentHistory'=>$PaymentHistory]);
		
    }
	
	public function CancelStatus()
    {

       return view('payment.cancel');  
    }
	
	
	
	
	
	public function GetUpgradeCommission(Request $request)
    {

      $taxId= isset($_GET['tx'])?$_GET['tx']:'';

         if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('dealersubscription');

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
                           $paymentData->payment_level = 'A';

                           $paymentData->save();
                           $insertId= $paymentData->id;

                        if(!empty($insertId)) {

                           
                               $getAsPerLevelPoint= DB::table('upgrade_pv_conversion')
                                                      ->select('upgrade_pv_conversion.*')
                                                      ->where('level','=','AF')
                                                      ->first();  



                               Helper::dealerRenew($paymentData->user_id,$getAsPerLevelPoint->point,$insertId,$level='0');
                           
                          }
                        
                          $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');

                       return redirect('dealersubscription');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }

    }
	
	public function cancelPayment(Request $request)
    {
	   $user_id= Auth::id();
       $updatepaymentcancel= array(
                                    'payment_status'=>0
                                     );
        User::where(['id' => $user_id])->update($updatepaymentcancel);
        $request->session()->flash('success', 'La tua iscrizione è stata cancellata con successo');

        return redirect('dealersubscription');
    }
	
	public function sendUpgradeEmail(Request $request)
    {

		$types = array(2,4);
		
	    $users = User::whereIn('role_type', $types)->leftJoin('payment_history', 'users.id', '=', 'payment_history.user_id')->select('users.*', 'payment_history.created_at as payment_created_at')->get();
		$reminders = SetReminder::where(['reminder_type' => 1])->first();
		
		//echo '<pre>'; print_r($users[0]); die;
        //$ar[] = $users[0];
		foreach($users as $k => $v){
		$data = array('user'=>$v);
		//echo '<pre>'; print_r($v->name); die;
		$dateString = $v->created_at;
		
		$dt = new DateTime($dateString);
		$dt->modify('1 years');
		
		if(!empty($v->renewal_date)){
			$deadline = $v->renewal_date;
		}else if(!empty($v->payment_created_at)){
			$deadline = $v->payment_created_at;
		}
		else{
			$deadline = $dt->format('Y-m-d h:i:s');
		}
		
		$dt1 = new DateTime($deadline);
		$rmdatearr = array();
		if(!empty($reminders->reminder_date)){
			 $rmdate = $reminders->reminder_date; 
			 $rmdatearr = json_decode($rmdate);
			 //echo '<pre>'; print_r($rmdatearr); die;
		}
		foreach($rmdatearr as $days){
			$dtto = '';
			$crt = '';
			$dt1->modify("-$days days");
			$deadline1 = $dt1->format('Y-m-d h:i:s');
			$dtto = strtotime($deadline1);
			$currentdate = date('Y-m-d h:i:s'); 
			$crt = strtotime($currentdate);
			if($dtto == $crt){
				
				$subject= 'Renewal Notification';
				//$data = array('name'=>"Virat Gandhi");
				  Mail::send('Affiliatese.renewalNotification', $data, function($message) {
					 $message->to('er.bobbysharma92@gmail.com', 'Tutorials Point')->subject
						('Renewal Notification');
					 $message->from('bklic@bklic.komete.it','BKLIC');
				  }); 
				  
				  //die;

		    }
		
		}
		
		}	
		
		
		echo "HTML Email Sent. Check your inbox.";
    }


    public function sendUpgradeEmail1(Request $request)
    {

            $types = array(2,4);
			$getDate = '';
    
      $users = User::whereIn('role_type', $types)->leftJoin('payment_history', 'users.id', '=', 'payment_history.user_id')->select('users.*', 'payment_history.created_at as payment_created_at')->get();


      $reminders = SetReminder::where(['reminder_type' => '1'])->first();

    // echo '<pre>';print_r($users);die;

       foreach($users as $userDetail)
       {

            if(empty($userDetail->payment_created_at) && empty($userDetail->renewal_date)){

                $getDate = $userDetail->created_at;
                $getDateExpiration = date('d-m-Y',strtotime($getDate."+1 Year"));

            }elseif(!empty($userDetail->payment_created_at) && empty($userDetail->renewal_date)){

              $getDate = $userDetail->payment_created_at;
              $getDateExpiration = date('d-m-Y',strtotime($getDate."+1 Year"));

            }elseif(!empty($userDetail->renewal_date)) {

             $getDateRenualDate = ($userDetail->renewal_date > $userDetail->payment_created_at)?$userDetail->renewal_date:date('d-m-Y',strtotime($userDetail->payment_created_at."+1 Year"));

            }


          $getDateYear = date('Y',strtotime($getDate));

            $rmdatearr = array();
                if(!empty($reminders->reminder_date)){
                   $rmdate = $reminders->reminder_date; 
                   $rmdatearr = json_decode($rmdate);
             }

          if($getDateYear != date('Y') && empty($getDateRenualDate))
          {

              
                 $finalDate = $getDateExpiration;

                   $now = time(); // or your date as well
                  $your_date = strtotime($finalDate);
                 $datediff = $now - $your_date;

                  $reminderDate=  round($datediff / (60 * 60 * 24));

                 if(in_array($reminderDate,$rmdatearr)) 
                 {

                    $subject= 'Notifica di rinnovo';

                     $header = "From:bklic@bklic.komete.it \r\n";
                     $header.= 'MIME-Version: 1.0' . "\r\n";
                     $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";


                     $message ='Hello '.$userDetail->name.'<br/>'; 
                     $message.= 'Ciao xxxxx '.$userDetail->name.', ti ricordiamo che l’affiliazione a Bklic sottoscritta  per il tuo negozio '.$userDetail->name.'.</br>';
                     $message.= 'il giorno '.$finalDate.' va rinnovata entro  il giorno '.$finalDate.'';
                     // $message.= '<h3 style="color: green">Thank you for your interest</h3>';
                     // $message.= '<p>Your subscription will end on '.$finalDate.'</p>';
                     $message.= "<p>Rinnova il tuo account fino alla data di fine dell'abbonamento. Altrimenti il ​​tuo account verrà disattivato</p>";

                     mail('vipinpandey@virtualemployee.com',$subject,$message,$header);
                 }              

          }elseif(!empty($getDateRenualDate)){


                 $finalDate = $getDateRenualDate;

                   $now = time(); // or your date as well
                  $your_date = strtotime($finalDate);
                  $datediff = $your_date  -  $now ;

                 $reminderDay= round($datediff / (60 * 60 * 24)); 

                 if(in_array($reminderDay,$rmdatearr)) 
                 {

                     $subject= 'Notifica di rinnovo';

                     $header = "From:bklic@bklic.komete.it \r\n";
                     $header.= 'MIME-Version: 1.0' . "\r\n";
                     $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";


                    $message ='Ciao '.$userDetail->name.'<br/>'; 
                     $message.= 'Ciao xxxxx '.$userDetail->name.', ti ricordiamo che l’affiliazione a Bklic sottoscritta  per il tuo negozio '.$userDetail->name.'.</br>';
                     $message.= 'il giorno '.$finalDate.' va rinnovata entro  il giorno '.$finalDate.'';
                     // $message.= '<h3 style="color: green">Thank you for your interest</h3>';
                     // $message.= '<p>Your subscription will end on '.$finalDate.'</p>';
                     $message.= "<p>Rinnova il tuo account fino alla data di fine dell'abbonamento. Altrimenti il ​​tuo account verrà disattivato</p>";

                     mail('vipinpandey@virtualemployee.com',$subject,$message,$header);

                 }            

          }else{
            
            
          }

       } 


    }
   
}
