<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\PaypalSetting;
use App\CmsPages;
use App\elearningdocs;
use App\Commission;
use App\MinimumValuePoint;
use App\PaymentHistory;
use App\UploadCard;
use App\CategoryManagement;
use App\Convertion;
use App\CalendarManagement;
use App\SetReminder;
use App\BonusManagement;
use App\SubscriptionPlans;
use App\Notifications;
use App\Wallet;
use App\Business;
use App\NewCms;
class AdministratorController extends Controller
{
    //


  /*
  Start login here admin */

    public function index(Request $request)
    {

      if(isset($_POST['Signin']))
      {

            $rules = [
                        'email' => 'required|email',             
                        'password' => 'required|min:3|max:20',
                   ];

              $message["email.required"] = 'Il campo email è obbligatorio';
              $message["password.required"] = 'Il campo della password è obbligatorio';

              $this->validate($request, $rules,$message);     


         $email = !empty($request->input('email'))  ?  $request->input('email') : '';
         $password = !empty($request->input('password'))  ? $request->input('password') : '';             

         if(Auth::attempt(['email' => $email, 'password' => $password, 'role_type' => '1'])){
            // Get the logged-in user id
           $userId = Auth::id();

           return redirect('administrator/dashboard');
        }else{
                    return redirect('/administrator')->with('danger','Indirizzo email o password sono errati!');
                }
      }

      return view('administrator.login');
    }

    /*
  End login here admin */




  /*
  Start Dashboard functionality here admin */

  public function Dashboard()
  {
    
    // viertical cahrt array//
    $data= array();

   $onevalue=array('Mesi', 'Carte vendute', 'Upgrade', 'Affiliati');
  // end here//


  // payment array//
  $paymentarray=array();

  $paymentfinalarray= array();
  // end here//

 $months = array(0=>'value',01 =>'Gen', 02 =>'Feb', 03 =>'Mar', 04 =>'Apr', 05 =>'Mag', 06 =>'Giu', 07 =>'Lug', 8 =>'Ago', 9 =>'Set', 10 =>'Ott',11 =>'Nov', 12 =>'Dic');

          foreach($months as $key=> $value)
          {

            if($key=='0')  {

               $data[]= $onevalue;

            }else{

            $data[$key][]  = $value;

            $data[$key][] =  DB::table('users')
                                            ->join('payment_history', 'users.id', '=', 'payment_history.user_id')                     
                                            ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id')
                                            ->where('users.role_type','=','3')
                                            ->whereMonth('payment_history.created_at','=', $key)
                                            ->where('users.status','=','1')
                                            ->where('users.is_deleted','=','0')  
                                            ->count();


          $data[$key][] =        DB::table('users')
                                            ->join('payment_history', 'users.id', '=', 'payment_history.user_id')                     
                                            ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id')
                                            ->where('users.role_type','=','2')
                                            ->whereMonth('payment_history.created_at','=',$key)
                                            ->where('payment_history.payment_level','!=','S')
                                            ->where('users.status','=','1')  
                                            ->where('users.is_deleted','=','0')                                 
                                            ->count();

         $data[$key][]=  DB::table('users')                                                  
                                  ->select('users.*')
                                  ->where('users.role_type','=','4')
                                  ->where('users.status','=','1')  
                                 ->where('users.is_deleted','=','0')
                                  ->whereMonth('users.created_at','=',$key)                               
                                  ->count();


            $paymentarray[$key][] = $key;       


              $payement  =  DB::table('users')
                                        ->join('payment_history', 'users.id', '=', 'payment_history.user_id')                     
                                        ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id')
                                        ->where('users.role_type','!=','1')
                                        ->whereMonth('payment_history.created_at','=',$key)
                                        ->where('users.status','=','1')    
                                        ->where('users.is_deleted','=','0')                             
                                        ->sum('payment_history.paidAmount'); 
                                                
         
             $paymentarray[$key][] = (float)$payement;    
			 $totalpayments[] = (float)$payement; 

                }
          }

         
          
          $totalNumberofPromoter = DB::table('users')                                                  
                                  ->select('users.*')
                                  ->where('users.role_type','=','2')
                                  ->where('users.status','=','1')  
                                 ->where('users.is_deleted','=','0')                           
                                  ->count();

         $totalNumberofaffiliates = DB::table('users')                                                  
                                  ->select('users.*')
                                  ->where('users.role_type','=','4')
                                  ->where('users.status','=','1')  
                                 ->where('users.is_deleted','=','0')                           
                                  ->count();

          $totalNumberofcardUser = DB::table('users')                                                  
                                    ->select('users.*')
                                    ->where('users.role_type','=','3')
                                    ->where('users.status','=','1')  
                                   ->where('users.is_deleted','=','0')                           
                                    ->count();  

   
         $pichart[]= array('Task','Hours per Day');                          
         $pichart[]= array('Utenti card',$totalNumberofcardUser);
         $pichart[]= array('Affiliati',$totalNumberofaffiliates);
         $pichart[]= array('Promoter',$totalNumberofPromoter);
		     $totals['Utenti card'] = $totalNumberofcardUser;
         $totals['Affiliati']= $totalNumberofaffiliates;
         $totals['Promoter']= $totalNumberofPromoter;
         $totals['totalpayment'] = array_sum($totalpayments);    
     
                          
    return view('administrator.dashboard',['data'=>json_encode($data),'paymentdata'=>json_encode($paymentarray),'pichart'=>json_encode($pichart),'totals'=>$totals]);

  }
   
   	public function elearningDocument(Request $request)
    {
    		$request->session()->forget('name');
    		$request->session()->forget('type');
    		$listDetail= elearningdocs::all();
       //$listDetail= PaypalSetting::first();
      //echo '<pre>'; print_r($listDetail); die;
      return view('administrator.elearning-documents',['listDetail'=>$listDetail]);

    }
    
    public function addElearningdocs(Request $request)
    {
		
		if(isset($_POST['elearning_submit'])){
			//echo '<pre>'; print_r($request->all()); die;
			$rules = [
                        'filename' => 'required',             
                        'editor1' => 'required',
						'filetype' => 'required',
						'file' => 'required'
						
						
                   ];

              $message["filename.required"] = 'Questo campo è obbligatorio';
              $message["editor1.required"] = 'Questo campo è obbligatorio';
			  $message["filetype.required"] = 'Questo campo è obbligatorio';
              $message["file.required"] = 'Questo campo è obbligatorio';
			 // $message["point_value.required"] = 'Questo campo è obbligatorio';
			  

              $this->validate($request, $rules,$message);  
			  
			 if ($request->hasFile('file')) {
				$request->session()->forget('name');
				$request->session()->forget('type');
				$image = $request->file('file');
				$fileext = $image->getClientOriginalExtension();
				$data['type'] = $request->input('filetype');
				$data['name'] = $request->input('filename');
				// echo $image->getClientOriginalExtension(); die;
				if($request->input('filetype') == 'image'){
					 
					 if($fileext == 'jpg' || $fileext == 'png' || $fileext == 'jpeg' || $fileext == 'JPG' || $fileext == 'PNG' || $fileext == 'JPEG'){
					 }else{
						 $request->session()->put('type', $request->input('filetype'));
						 $request->session()->put('name', $request->input('filename'));
						$request->session()->flash('error', 'Si prega di caricare il file immagine');
						return redirect('/administrator/addElearningdocs');
					 }
				 }
				 if($request->input('filetype') == 'video'){
					 
					 if($fileext != 'mp4'){
						 $request->session()->put('type', $request->input('filetype'));
						 $request->session()->put('name', $request->input('filename'));
						$request->session()->flash('error', 'Si prega di caricare il file .mp4');
						return redirect('/administrator/addElearningdocs');
					 }
				 }
				 if($request->input('filetype') == 'document'){
					 $docarr = array('DOC','DOCX','ODT','RTF','TXT','PDF','HTM','HTML','PPT','PPTX','doc','docx','odt','rtf','txt','pdf','htm','html','ppt','pptx');
					 if (!in_array($fileext, $docarr)){
						 $request->session()->put('type', $request->input('filetype'));
						 $request->session()->put('name', $request->input('filename'));
						$request->session()->flash('error', 'Si prega di caricare file valido');
						return redirect('/administrator/addElearningdocs');
					 }
				 }
				
				$name = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/elearningdocs');
				$image->move($destinationPath, $name);
				$insert= new elearningdocs();
			    $insert->file_name= $request->input('filename');
				$insert->description= $request->input('editor1');
				$insert->point_value= $request->input('point_value');
				$insert->file_type= $request->input('filetype');
				$insert->file= $name;
				$insert->save();
				$request->session()->flash('success', 'Il file è stato caricato con successo!');
				return redirect('/administrator/elearningdocuments');
			 }
		}
        return view('administrator.addElearningdocs');

    }
    
    public function viewDoc(Request $request,$id)
    {

       $docDetail= elearningdocs::where(['id'=>$id])->first();

       // echo '<pre>';print_r($docDetail);die;

        return view('administrator.docview',['docDetail'=>$docDetail]); 

    }
    
    public function deleteElearning(Request $request,$id)
    {

        $page= elearningdocs::find($id);

          $page->delete();

          $request->session()->flash('success','Pagina cancellata con successo.');
         return redirect('administrator/elearningdocuments');   

    }
    /* start UserList functionality here */

    public function UserList()
    {

        $userDetail= User::where(['role_type'=>'2','is_deleted'=>'0'])->orderBy('id', 'DESC')->get();

        //echo '<pre>';print_r($userDetail);die;

        return view('administrator.userlist',['userDetail'=>$userDetail]);

    }

     /* start UserDetail functionality here */

    public function UserDetail($id)
    {
      

        $userDetail= User::where(['role_type'=>'2','is_deleted'=>'0','id'=>$id])->first();

         $GetCommissionUser= Commission::where(['user_id'=>$id,'compv_expired'=>'0'])->sum('commission_point');
         
          $CommissionUser = DB::table('users')
                            ->join('commission', 'users.id', '=', 'commission.comission_by_userId')                  
                            ->select('users.*', 'commission.commission_point', 'commission.commission_level','commission.created_at as commissiondate')
                            ->where('commission.compv_expired','=','0')
                            ->where('commission.user_id',$id)
                            ->get();

                    // echo '<pre>';print_r($CommissionUser);die;

        return view('administrator.userdetail',['userDetail'=>$userDetail,'GetCommissionUser'=>$GetCommissionUser,'CommissionUser'=>$CommissionUser]);

    }



    public function addUser(Request $request)
    { 
        return view('administrator.addUser');

    }


    

    public function edituser(Request $request,$id)
    {            

         $userProfile = User::find($id);

         if(isset($_POST['editbutton']))
         {

                $rules=[
                        'name' => 'required|string|max:255',
                        'userName' => 'required|string|max:255',
                        'telephoneNumber' => 'required|numeric|digits:10',
                        'postalCode' => 'required|string|min:5',    
                    ];



              $message["name.required"] = 'È richiesto il campo nome';
              $message["userName.required"] = 'Il campo userName è richiesto';
              $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';

              $message["postalCode.required"] = 'Il campo cap è richiesto';

             $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';

              $this->validate($request, $rules,$message);          


            $name        =            !empty($request->input('name')) ?    $request->input('name') :'';
            $username     =          !empty($request->input('userName')) ?     $request->input('userName'):'';
            $telephoneNumber  =    !empty($request->input('telephoneNumber'))  ?  $request->input('telephoneNumber'):'';
            $postalCode   =         !empty($request->input('postalCode'))    ?  $request->input('postalCode'):'';
            
            $updateUserDetail = array(
                        'name'=>$name,
                        'username'=>$username,
                        'telephoneNumber'=>$telephoneNumber,
                        'postalCode' =>$postalCode,
                );

            User::where(['id'=>$id])->update($updateUserDetail);


            $request->session()->flash('success', 'Profilo aggiornato con successo!');         
            return redirect('/administrator/userlist');

         }       
       return view('administrator.editUser',['userProfile'=>$userProfile]);       
    }


   
      public function deleteuser(Request $request , $id)
    {  

         $getDetail =  User::where(['id'=>$id])->first();


          $getChildeDetail = User::where(['parent_id'=>$getDetail->id])->get();

              foreach($getChildeDetail as $item)
               {
                    User::where(['id'=>$item->id])->update(array('parent_id'=>$getDetail->parent_id,'previous_parent_id'=>'0'));

               }


           User::where(['id'=>$id])->update(array('is_deleted'=>'1'));

          // email send to user //

              $subject= 'Il tuo account viene eliminato dal lato amministratore';

               $header = "From:bklic@bklic.komete.it \r\n";
               $header.= 'MIME-Version: 1.0' . "\r\n";
               $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";

               $message ='Ciao '.$getDetail->name.'<br/>'; 
               $message.='Il tuo account viene eliminato dal lato amministratore. <br/>'; 

               mail($getDetail->email,$subject,$message,$header);
           // end here //                  


           $request->session()->flash('success', 'Profilo cancellato con successo');

          return Redirect::back();
    }


    /*start user block functionality*/     
    

   public function blockUser(Request $request,$id)
    { 

        $getDetail =  User::where(['id'=>$id])->first();

     if($getDetail->status=='1')
        {

           $getChildeDetail = User::where(['parent_id'=>$getDetail->id])->get();

              foreach($getChildeDetail as $item)
               {
                    User::where(['id'=>$item->id])->update(array('parent_id'=>$getDetail->parent_id,'previous_parent_id'=>$item->parent_id));

               }

                  $data= array(
                         'status'=>'0'
                     );    


               // email send to user //

                  $subject= 'Il tuo account è stato bloccato dal lato amministrativo';

                 $header = "From:bklic@bklic.komete.it \r\n";
                 $header.= 'MIME-Version: 1.0' . "\r\n";
                 $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";

                 $message ='Ciao '.$getDetail->name.'<br/>'; 
                 $message.='Il tuo account è stato bloccato dal lato amministrativo. <br/>'; 
                 $message.='Se lo desideri Sblocca il tuo account Si prega di contattare il nostro team di supporto.& Puoi raggiungerci da bklic@bklic.komete.it <br/>';

                 mail($getDetail->email,$subject,$message,$header);
            // end here //                


         }else{

            $getPreviousChild = User::where(['previous_parent_id'=>$getDetail->id])->get();

              foreach($getPreviousChild as $previousChild)
               {
                    User::where(['id'=>$previousChild->id])->update(array('parent_id'=>$getDetail->id,'previous_parent_id'=>'0'));

               }

                  $data= array(
                       'status'=>'1'
                    );
         }

          User::where(['id'=>$id])->update($data);



         $request->session()->flash('success', 'Profilo aggiornato con successo!'); 

        return Redirect::back();
    }


    public function walletUserList()
    { 

        //echo 'fdfd';die;

        $walletDetail = DB::table('payment_history')
                      ->join('e_wallet', 'payment_history.id', '=', 'e_wallet.paid_id')
                      ->join('users', 'payment_history.user_id', '=', 'users.id')
                        ->select('users.*', 'payment_history.paidAmount','payment_history.txn_id','payment_history.created_at as paymentdate')
                      ->orderBy('payment_history.id','DESC')
                      ->get();

           // echo '<pre>';print_r($walletDetail);die;
          return view('administrator/walletlist',['walletDetail'=>$walletDetail]);       

    }
    
    
     public function walletLivelloList()
    {  
        //echo 'fdfd';die;
      
        $walletDetail = DB::table('livello_list')
                          ->select('*')
                          ->get();

           // echo '<pre>';print_r($walletDetail);die;
          return view('administrator/levelllist',['listDetail'=>$walletDetail]);       

    }


    public function EditLevel(Request $request,$id)
    { 
        
        $levelDetail= DB::table('livello_list')->where('id', '=', $id)->get();

          if(isset($_POST['editbutton']))
          {
              $rules=[
                        'level_name' => 'required|string|max:255',
                        'percentage' => 'required|string|max:255',
                    ];



              $message["level_name.required"] = 'Il campo del livello è richiesto';
              $message["percentage.required"] = 'Il campo percentuale è richiesto';
             
              $this->validate($request, $rules,$message);      

              $percentageLevel= !empty($request->input('level_name'))  ?  $request->input('level_name')  : '';
           
              $percentage= !empty($request->input('percentage'))  ?  $request->input('percentage')  : ''; 

              if($percentageLevel=='13')
                {
                  $id=$percentageLevel;
                }elseif($percentageLevel=='14')
                {
                  $id=$percentageLevel;
                }
                elseif($percentageLevel=='15')
                {
                  $id=$percentageLevel;
                }
                elseif($percentageLevel=='16')
                {
                  $id=$percentageLevel;
                }

               $data= array(                         
                          'level_percentage'=>$percentage
                      );

                    DB::table('livello_list')->where('id', $id)
                                     ->update($data);

               $request->session()->flash('success', 'Livello aggiornato con successo!');
                return redirect('administrator/wallet-livello-list');    
          }

        return view('administrator.editlevel',['levelDetail'=>$levelDetail]);

    }


    public function LevelAjax($id)
    {

        $value= isset($_GET['val'])?$_GET['val']:'';
       if($value!='1')
       {

         $levelDetail = DB::table('livello_list')
                          ->select('*')
                          ->where('id','=',$value)
                          ->first();

               //  echo '<pre>';print_r($levelDetail);die; 
       }elseif($value=='16')
       {

          $levelDetail = DB::table('livello_list')
                          ->select('*')
                          ->where('id','=','16')
                          ->first();

       }else{
          
         $levelDetail = DB::table('livello_list')
                          ->select('*')
                          ->where('id','=',$id)
                          ->first();
       }
       return json_encode($levelDetail);  die;            

    }
    
    
    

    public function PaypalSetting()
    { 
      
      $listDetail= PaypalSetting::first();
    
      return view('administrator.paypal-setting',['listDetail'=>$listDetail]);

    }


    public function EditPaypalSetting(Request $request,$id)
    {        


        if(isset($_POST['editbutton']))
        {

             $rules=[
                      'business_id' => 'required|string|max:255',
                      'paypal_type' => 'required|string|max:255',
                  ];

              $message["business_id.required"] = 'Il campo email aziendale è obbligatorio';
              $message["paypal_type.required"] = 'Il campo tipo paypal è richiesto';
             
              $this->validate($request, $rules,$message);

             $businessEmail = !empty($request->input('business_id'))   ? $request->input('business_id')  : '';
             $paypalType    = !empty($request->input('paypal_type'))   ? $request->input('paypal_type')  : '';

             $updateData= array(
                            'business_id'=>$businessEmail,
                            'paypal_type'=>$paypalType
                          );  

          //   echo '<pre>';print_r($updateData);die;
                PaypalSetting::where(['id'=>$id])->update($updateData);

                $request->session()->flash('success', 'Impostazioni PayPal aggiornate con successo!');

                return redirect('administrator/paypalsetting');                   

        }

       $getDetail= PaypalSetting::where(['id'=>$id])->first();

        return view('administrator.editpaypalsetting',['getDetail'=>$getDetail]);

    }


    public function CmsPages()
    {


      $getCmsDetail= CmsPages::all();

      return view('administrator.cmslist',['getCmsDetail'=>$getCmsDetail]);

    }


    public function AddCmsPages(Request $request)
    {

        if(isset($_POST['addbutton']))
        {

            $rules=[
                      'type' => 'required|string|max:255',
                       'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
                  ];


             $message["type.required"] = 'Il campo del type è obbligatorio';
             $message["video.required"] = 'Il campo video è obbligatorio';
             $message["video.mimes"] = 'Il tipo di video dovrebbe essere obbligatorio (mp4, ogx, oga, ogv, ogg, webm)';
         
              $this->validate($request, $rules,$message); 

             $title       =  !empty($request->input('type'))  ? $request->input('type')  : '';

      
             if(!empty($request->file('video'))){

                    $video1       =         !empty($request->file('video'))  ?  $request->file('video') : '';
                     $fileext1     =         $video1->getClientOriginalExtension();

                     // file move to folder//
                     $videoname = time().'.'.$video1->getClientOriginalExtension();
                     $destinationPath1 = public_path('/dealer_videos');
                     $video1->move($destinationPath1, $videoname);                     
                    
                 }
                 

             
             $insert= new CmsPages();

             $insert->page_title= $title;
             $insert->video= $videoname;
             $insert->status = '1';

              $insert->save();

              $request->session()->flash('success', 'La pagina del video è stata aggiornata con successo!');

            return redirect('administrator/video-pages');  

        }

      return view('administrator.addcmspage');
    }



    public function EditCms(Request $request,$id)
    {

       if(isset($_POST['addbutton']))
        {

            $rules=[
                      'type' => 'required|string|max:255',
                     
                  ];


             $message["type.required"] = 'Il campo del type è obbligatorio';
            
         
              $this->validate($request, $rules,$message); 

             $title       =  !empty($request->input('type'))  ? $request->input('type')  : '';

      
             if(!empty($request->file('video'))){

                    $video1       =         !empty($request->file('video'))  ?  $request->file('video') : '';
                     $fileext1     =         $video1->getClientOriginalExtension();

                     // file move to folder//
                     $videoname = time().'.'.$video1->getClientOriginalExtension();
                     $destinationPath1 = public_path('/dealer_videos');
                     $video1->move($destinationPath1, $videoname);                     
                    
                 }else{
                  $videoname= $request->input('old_video');
                 }
                // echo $videoname;die;

             
             $insert= CmsPages::where(['id'=>$id])->first();

             $insert->page_title= $title;
             $insert->video= $videoname;
             $insert->status = '1';

              $insert->save();

              $request->session()->flash('success', 'La pagina del video è stata aggiornata con successo!');

            return redirect('administrator/video-pages');  

        }

        $getPageDetail= CmsPages::where(['id'=>$id])->first();

        return view('administrator.editcmspage',['getPageDetail'=>$getPageDetail]);
    }


    public function DeletePage(Request $request,$id)
    {

        $page= CmsPages::find($id);

          $page->delete();

          $request->session()->flash('success','Pagina cancellata con successo.');
         return redirect('administrator/video-pages');   

    }


    public function adminLogout()
    {
         Auth::logout();
         
         return redirect('administrator');

    }


    /* start card seller user */
    
    public function cardsellerusersList(Request $request)
    {
         $getDetail =  User::where(['users.role_type'=>3,'users.is_deleted'=>0])->leftjoin('order_detail', 'users.id', '=', 'order_detail.user_id')->select('users.*', 'order_detail.expiry_date')->get();

         //echo '<pre>';print_r($getDetail);die;
        return view('administrator.seller-users',['userDetail'=>$getDetail]);

    }
    
    public function addcardsellerUser(Request $request)
    { 
       
        if(isset($_POST['addbutton']))
        {

                 $rules=[
                        'name' => 'required|string|max:255',
                        'username' => 'required|string|max:255',
                        'telephone' => 'required|numeric|digits:10',
                        'postalcode' => 'required|string|min:5',
                        'email' => 'required|string|email|max:255|unique:users',
                             
                    ];


                $message["name.required"] = 'È richiesto il campo nome';

                $message["username.required"] = 'Il campo userName è richiesto';

                $message["telephone.required"]= 'Il campo telefono è richiesto';

                $message["postalcode.required"] = 'Il campo cap è richiesto';

                $message["email.required"] = 'Il campo email è obbligatorio';                    

                $message["email.unique"] = "l'email è già stata presa";

               $message["telephone.digits"] = 'Il numero di telefono deve essere di 10 cifre';
                     
                    
               $this->validate($request, $rules,$message);  


             $name         =    !empty($request->input('name'))    ?   $request->input('name')  : '';
             $username     =   !empty($request->input('username'))  ?  $request->input('username') :'' ;            
             $telephone    =   !empty($request->input('telephone'))  ? $request->input('telephone') :'' ; 
             $postalcode   =   !empty($request->input('postalcode')) ? $request->input('postalcode')  : '';
             $email        =   !empty($request->input('email'))      ? $request->input('email') :'' ; 

        

              $insert= new User();
        		  $insert->name=       $name;
        			$insert->userName= $username;
        			$insert->telephoneNumber= $telephone;
        			$insert->postalCode= $postalcode;
        			$insert->email= $email;
                   $insert->remember_token   =   !empty($request->input('_token'))      ?    $request->input('_token'):'';
        			$insert->role_type= 3;
        			$insert->password = Hash::make(str_random(4));
  			
	             $insert->save();
			
  	           $password = bcrypt($insert->password);
  	
              $subject= 'Il tuo account è stato attivato dal lato amministrativo';
              
              $header = "From:bklic@bklic.komete.it \r\n";
              $header.= 'MIME-Version: 1.0' . "\r\n";
              $header.= 'Content-type: text/html; charset=utf-8' . "\r\n";
              
              $message ='Ciao '.$name.'<br/>'; 
              $message.='Il tuo account è stato attivato dal lato amministrativo. <br/>'; 
              $message.='Se si desidera accedere al proprio account, si prega di utilizzare il nome utente e la password come desiderato. E puoi raggiungerci da bklic@bklic.komete.it <br/>';
              $message.='Username:-'.$username.' <br/>';
              $message.='Password:-'.$password.' <br/>';

              if(mail($email,$subject,$message,$header)){
                
                }else{
                    
                    die('Error');
                }

            $request->session()->flash('success', 'Utente aggiunto con successo!');

            return redirect('administrator/cardsellerusers');                 
        }
        
        return view('administrator.addcardsellerUser');

    }



    public function editcardselleruser(Request $request,$id)
    {            

         $userProfile = User::find($id);

         if(isset($_POST['editbutton']))
         {

                $rules=[
                        'name' => 'required|string|max:255',
                        'username' => 'required|string|max:255',
                        'telephone' => 'required|numeric|digits:10',
                        'postalcode' => 'required|string|min:5',
                        'email' => 'required|string|email|max:255|unique:users',
                             
                    ];

                  $message["name.required"] = 'È richiesto il campo nome';

                  $message["username.required"] = 'Il campo userName è richiesto';

                  $message["telephone.required"]= 'Il campo telefono è richiesto';

                  $message["postalcode.required"] = 'Il campo cap è richiesto';

                  $message["email.required"] = 'Il campo email è obbligatorio';                    

                  $message["email.unique"] = "l'email è già stata presa";

                  $message["telephone.digits"] = 'Il numero di telefono deve essere di 10 cifre';
                     
                    
                  $this->validate($request, $rules,$message); 


            $name        =            !empty($request->input('name')) ?    $request->input('name') :'';
            $username     =          !empty($request->input('username')) ?     $request->input('username'):'';
            $telephoneNumber  =    !empty($request->input('telephone'))  ?  $request->input('telephone'):'';
            $postalCode   =         !empty($request->input('postalcode'))    ?  $request->input('postalcode'):'';
            
            $updateUserDetail = array(
                        'name'=>$name,
                        'username'=>$username,
                        'telephoneNumber'=>$telephoneNumber,
                        'postalCode' =>$postalCode,
                );

            User::where(['id'=>$id])->update($updateUserDetail);


            $request->session()->flash('success', 'Profilo aggiornato con successo!');         
            return redirect('/administrator/cardsellerusers');

         }       
       return view('administrator.edit-seller-user',['userProfile'=>$userProfile]);       
    }
    
    /*end here card seller user detail*/
    
    
    
    public function MiniumValuePoint()
    {

      $minimumValue = MinimumValuePoint::all();

        //  echo '<pre>';print_r($minimumValue);die;
          return view('administrator/minimum-value-point',['listDetail'=>$minimumValue]);


    }  


    public function EditValuePoint(Request $request,$id)
    {

       // echo $id;die;

      $levelDetail= MinimumValuePoint::where(['id'=>$id])->first();

           if(isset($_POST['editbutton']))
          {
              $rules=[
                        'level_name' => 'required|string|max:255',
                        'percentage' => 'required|string|max:255',
                        'upgrade_point' => 'required|string|max:255',
                        'level_downling' => 'required|string|max:255',
                        'renuwal_point' => 'required|string|max:255',
                    ];



              $message["level_name.required"] = 'Il campo del livello è richiesto';
              $message["percentage.required"] = 'Il campo Punto è richiesto';
             $message["upgrade_point.required"] = 'Il campo Punto è richiesto';
             $message["level_downling.required"] = 'Il campo Punto è richiesto';
             $message["renuwal_point.required"] = 'Il campo Punto è richiesto';
             
              $this->validate($request, $rules,$message);               

               $percentage= !empty($request->input('percentage'))  ?  $request->input('percentage')  : ''; 
              $upgradePoint= !empty($request->input('upgrade_point'))  ?  $request->input('upgrade_point')  : '';
              $upgradelevelPoint= !empty($request->input('level_downling'))  ?  $request->input('level_downling')  : '';
                $renewalPoint= !empty($request->input('renuwal_point'))  ?  $request->input('renuwal_point')  : '';
                 $becomeFounder = !empty($request->input('become_founder'))  ? $request->input('become_founder') : '';

               $data= array(
                          'point'=>$percentage,
                          'level_upgrade_point'=>$upgradePoint,
                          'level_downline'=>$upgradelevelPoint,
                          'renuwal_account'=>$renewalPoint,
                           'become_founder_euro'=>$becomeFounder
                      );

                    DB::table('minimum_value_point')->where('id', $id)
                                          ->update($data);

               $request->session()->flash('success', 'Livello aggiornato con successo!');
                return redirect('administrator/minimum-value-point');    
          }

        return view('administrator.edit-minimum-point',['levelDetail'=>$levelDetail]);

    }



     public function SetLevelFounder()
   {
        $userId= isset($_GET['userid']) ? $_GET['userid']:'';

       $founderValue = isset($_GET['founder']) ? $_GET['founder']:'';

        MinimumValuePoint::where(['id'=>$userId])->update(array('level_founder_status'=>$founderValue));
   } 
   

    public function PaymentHistory(Request $request)
    {

        //DB::enableQueryLog();
        //$PaymentDetail = PaymentHistory::where('payment_level','!=','W')->get();


        $getAllPaymentHistory = DB::table('users')
                                    ->leftjoin('payment_history', 'users.id', '=', 'payment_history.user_id')                     
                                    ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id','payment_history.currencyCode')
                                    ->where('users.status','=','1')
                                    ->where('users.role_type','!=','1')
                                     ->Where('users.role_type','!=','3')                                    
                                    ->orderBy('payment_history.id','desc')                                  
                                    ->get();

                      // $query = DB::getQueryLog();
                      // print_r($query);die;

           //echo '<pre>';print_r($getAllPaymentHistory);die;                         

        return view('administrator.payment-detail',['PaymentDetail'=>$getAllPaymentHistory]);


    }
    
     public function ListCard()
    {

          $getCardDetail = UploadCard::all();

        return view('administrator.list-card',['getCardDetail'=>$getCardDetail]);
    }

    public function UploadCard(Request $request)
    {
        if(isset($_POST['addbutton']))
        {



               $rules=[
                        'title' => 'required|string|max:255',
                        'amount' => 'required|numeric|max:255',
						            // 'card_length' => 'required|numeric|max:12',
                        'image' => 'required|mimes:jpeg,jpg,png | max:1024',                      
                             
                    ];


            $message["title.required"] = 'È richiesto il campo titolo della carta';

            $message["amount.required"] = 'È richiesto il campo Importo della carta';

            $message["amount.numeric"] = 'importo della carta dovrebbe essere numerico';

            $message['image.mimes']  =  'Il file dovrebbe essere jpg, png, jpeg e dimensione massima 1 MB';

            $message['image.required']  =  'È richiesto il campo Immagine';
			
    			// $message['card_length.required']  =  'Il campo della lunghezza della carta è richiesto';
    			
    			// $message["card_length.numeric"] = 'La lunghezza della carta deve essere un numero.';  
                     
                    
            $this->validate($request, $rules,$message); 



             if(!empty($request->file('image'))){


                     $image       =         !empty($request->file('image'))  ?  $request->file('image') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/digital-card');
                     $image->move($destinationPath, $imagNmae);
                 }

               $title       =       !empty($request->input('title'))         ?  $request->input('title')       :   ''; 
               $amount    =   !empty($request->input('amount'))         ?  $request->input('amount')       :   '';       
			         $card_length    =   !empty($request->input('card_length'))         ?  $request->input('card_length')       :   '';        
               $description    =   !empty($request->input('editor1'))         ?  $request->input('editor1')       :   ''; 

               $cardLengthDays = !empty($request->input('card_length_days')) ? $request->input('card_length_days') : '';

                $UploadCard = new  UploadCard();

                $UploadCard->title= $title;
                $UploadCard->description = $description;
                $UploadCard->image = $imagNmae;
                $UploadCard->amount = $amount;
                if(empty($card_length) && empty($cardLengthDays)){
    				        $UploadCard->card_length = '1';                   
                  }else{
                    $UploadCard->card_length = $card_length;
                    $UploadCard->card_length_days= $cardLengthDays;
                  }

                $UploadCard->save();

              $request->session()->flash('success', 'Scheda creata con successo!');    
              return redirect('administrator/list-card'); 


        }

      return view('administrator.upload-card');
    }

   public function EditCard(Request $request,$id)
    {


      if(isset($_POST['addbutton']))
        {

         // echo '<pre>';print_r($request->file('image'));die;


               $rules=[
                        'title' => 'required|string|max:255',
                        'amount' => 'required|numeric|max:255',
                      //  'card_length' => 'required|numeric|max:12',                      
                             
                    ];


            $message["title.required"] = 'È richiesto il campo titolo della carta';

            $message["amount.required"] = 'È richiesto il campo Importo della carta';

            $message["amount.numeric"] = 'importo della carta dovrebbe essere numerico';

            // $message['card_length.required']  =  'Il campo della lunghezza della carta è richiesto';
      
            // $message["card_length.numeric"] = 'La lunghezza della carta deve essere un numero.';  
          
                     
                    
            $this->validate($request, $rules,$message);


             if(!empty($request->file('image'))){


                     $image       =         !empty($request->file('image'))  ?  $request->file('image') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/digital-card');
                     $image->move($destinationPath, $imagNmae);

                 }else{

                    $imagNmae= !empty($request->input('old_file')) ? $request->input('old_file') : '';

                 }

               $title       =       !empty($request->input('title'))         ?  $request->input('title')       :   ''; 
               $amount    =   !empty($request->input('amount'))         ?  $request->input('amount')       :   '';               
               $description    =   !empty($request->input('editor1'))         ?  $request->input('editor1')       :   ''; 
               $card_length    =   !empty($request->input('card_length'))         ?  $request->input('card_length')       :   ''; 

                $cardLengthDays = !empty($request->input('card_length_days')) ? $request->input('card_length_days') : '';

                $data= array(
                        'title'=>$title,
                        'description'=>$description,
                        'image' =>$imagNmae,
                        'amount' => $amount,
                        'card_length'=>(empty($card_length) && empty($cardLengthDays))?'1':$card_length,
                        'card_length_days'=>$cardLengthDays
                      );

                UploadCard::where('id',$id)->update($data);

              $request->session()->flash('success', 'Aggiornamento della carta con successo!');    
              return redirect('administrator/list-card'); 

        }

        $getCardDetail = UploadCard::where('id',$id)->first();

        return view('administrator.upload-edit-card',['getCardDetail'=>$getCardDetail]);

    }


    public function deleteCard(Request $request,$id)
    {
        UploadCard::where('id',$id)->delete();

        $request->session()->flash('success', 'Eliminazione della carta con successo!');    
        return redirect('administrator/list-card');

    }


  public function ajaxUserPopup($id)
  {
      return  User::where(['id'=>$id])->first();
  }


  public function setFounder()
  {
        $userId= isset($_GET['userid']) ? $_GET['userid']:'';

       $founderValue = isset($_GET['founder']) ? $_GET['founder']:'';

        User::where(['id'=>$userId])->update(array('founder'=>$founderValue));


  }



  public function AffiliatesUser(Request $request)
  {

       $affiliateUser = DB::table('users')
                      ->join('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')                     
                      ->select('users.*', 'dealer_detail.category')
                      ->where('users.role_type','=','4')
                      ->get();


        return view('administrator.affiliated-userlist',['affiliateUser'=>$affiliateUser]);              

  }
    

   public function CategoryManagement(Request $request)
   {

      $category= CategoryManagement::all();        

    // $category = CategoryManagement::select(DB::raw("CONCAT(title,id) AS ID"))->get()  ; 

     //echo '<pre>';print_r($category);die;

      return view('administrator.category-affiliated',['category'=>$category]);
   } 


   public function AddCategory(Request $request)
   {

      if(isset($_POST['addbutton']))
      {

             $rules=[
                        'title' => 'required|string|max:255',
                        'category' => 'required|string|max:255',
                    ];



              $message["title.required"] = 'Il campo del titolo è obbligatorio';
              $message["category.required"] = 'Il campo categoria è obbligatorio';
             
              $this->validate($request, $rules,$message);      

          $title= !empty($request->input('title'))  ?  $request->input('title') :'';
          $parentId= !empty($request->input('category'))  ? $request->input('category') : '';

          $categoryInsert = new CategoryManagement();

          $categoryInsert->title = $title;
          $categoryInsert->parent_id = $parentId;
          $categoryInsert->save();

          $request->session()->flash('success', 'Aggiornamento della gestione delle categorie con successo!');    
          return redirect('administrator/category-management');

      }

      $category= CategoryManagement::where(['parent_id'=>'0'])->get();     

      return view('administrator.add-category',['category'=>$category]);
   }

   public function EditCategory(Request $request,$id)
   {

      if(isset($_POST['addbutton']))
      {

             $rules=[
                        'title' => 'required|string|max:255',
                        'category' => 'required|string|max:255',
                    ];



              $message["title.required"] = 'Il campo del titolo è obbligatorio';
              $message["category.required"] = 'Il campo categoria è obbligatorio';
             
              $this->validate($request, $rules,$message);      

          $title= !empty($request->input('title'))  ?  $request->input('title') :'';
          $parentId= !empty($request->input('category'))  ? $request->input('category') : '';

          $updateArray= array('title'=>$title,'parent_id'=>$parentId);
        
          CategoryManagement::where(['id'=>$id])->update($updateArray);

          $request->session()->flash('success', 'Aggiornamento della gestione delle categorie con successo!');    
          return redirect('administrator/category-management');

      }

      $categoryGetById = CategoryManagement::where(['id'=>$id])->first();

      $category = CategoryManagement::where('id','!=',$id)->where('parent_id','=','0')->get(); 

      return view('administrator.edit-category',['categoryGetById'=>$categoryGetById,'category'=>$category]); 

   }
    

    public function DeleteCategory(Request $request,$id)
    {

         CategoryManagement::where('id',$id)->delete();

        $request->session()->flash('success', 'Elimina la categoria con successo!');    
        return redirect('administrator/category-management');

    }
    

    public function SubscriptionAffiliates()
    {
        $getAffiliatesSubscription = DB::table('users')
                                    ->leftjoin('payment_history', 'users.id', '=', 'payment_history.user_id')                     
                                    ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id')
                                    ->where('users.role_type','=','4')
                                    ->where('users.status','=','1')
                                   // ->orwhere('payment_history.created_at','=',date('Y'))
                                    ->groupBy('users.id')
                                    ->orderBy('payment_history.id','desc')                                  
                                    ->get();


               //order by id desc and payment date musth be current year

               //echo '<pre>';print_r($getAffiliatesSubscription);die;
              
          return view('administrator.affiliated-subscription-userlist',['getAffiliatesSubscription'=>$getAffiliatesSubscription]) ;                         

    }
    


    
    public function convertion()
    {

      $getConvertion= Convertion::all();

        return view('administrator.convertionlist',['getConvertion'=>$getConvertion]);

    }

    public function PvGenerationConvertion()
    {
           $getConvertion= DB::table('upgrade_pv_conversion')
                              ->select('upgrade_pv_conversion.*')
                              ->get();

             //echo '<pre>';print_r($getConvertion);die;                 
        return view('administrator/pv-generation-convertionlist',['getConvertion'=>$getConvertion]);

    }



     public function EditPvGenerationConvertion(Request $request,$id)
    {


      if(isset($_POST['addbutton']))
      {



             $rules=[
                       
                        'point' => 'required|numeric',
                    ];
              $message["point.required"] = 'Il campo Pv è obbligatorio';

              $this->validate($request, $rules,$message); 
                $point  =  !empty($request->input('point'))   ? $request->input('point')   :  '';

                $updateData= array(
                                'point'=>$point               
                              );
                 

                DB::table('upgrade_pv_conversion')
                          ->where('id', $id)
                             ->update($updateData);

             $request->session()->flash('success', 'Aggiornamento della conversione con successo!');    
              return redirect('administrator/pv-generation-convertion'); 

      }


         $getConvertion= DB::table('upgrade_pv_conversion')
                              ->select('upgrade_pv_conversion.*')
                              ->where('id','=',$id)
                              ->first();

        return view('administrator/edit-pv-generasion-convertion',['getConvertion'=>$getConvertion]);
    }
    

    public function AddConvertion(Request $request)
    {

        if(isset($_POST['addbutton']))
        {


            $rules=[
                        'pv_type' => 'required|string|max:255',
                        'euros' => 'required|numeric',
                        'point' => 'required|numeric',
                    ];



              $message["pv_type.required"] = 'Il campo di conversione è obbligatorio';
              $message["euros.required"] = 'Il campo dell euro è obbligatorio';
              $message["point.required"] = 'Il campo Pv è obbligatorio';


              $this->validate($request, $rules,$message);  


                $pv_type = !empty($request->input('pv_type')) ? $request->input('pv_type') : '';
                $euro   =  !empty($request->input('euros'))   ? $request->input('euros')   : '';
                $point  =  !empty($request->input('point'))   ? $request->input('point')   :  '';

                $convertion = new Convertion();

                 $convertion->convertion_title= $pv_type;
                 $convertion->convertion_euro = $euro ;
                 $convertion->convertion_pv  = $point;

                 $convertion->save();

             $request->session()->flash('success', 'Aggiornamento della conversione con successo!');    
              return redirect('administrator/convertion');      

        }


        return view('administrator.addconvertion');
    }


    public function EditConvertion(Request $request,$id)
    {

      if(isset($_POST['addbutton']))
      {



                $rules=[
                        'point' => 'required|numeric',
                    ];

              
              $message["point.required"] = 'Il campo Pv è obbligatorio';


              $this->validate($request, $rules,$message);  


             
            
                $point  =  !empty($request->input('point'))   ? $request->input('point')   :  '';

                $updateData= array(                               
                               
                                'convertion_pv'=>$point               
                              );
                 
                 Convertion::where(['id'=>$id])->update($updateData);

             $request->session()->flash('success', 'Aggiornamento della conversione con successo!');    
              return redirect('administrator/convertion'); 

      }


      $getConvertionById= Convertion::where(['id'=>$id])->first();
      return view('administrator.editconvertion',['getConvertionById'=>$getConvertionById]);

    }

    public function DeleteConvertion(Request $request,$id)
    {


        Convertion::where('id',$id)->delete();

        $request->session()->flash('success', 'Eliminazione dei dati con successo!');    
        return redirect('administrator/convertion');

    }


     public function CardUserManagement()
    {

        $getUserPayment=  DB::table('users')
                          ->join('payment_history', 'users.id', '=', 'payment_history.user_id')
                          ->join('checkout', 'checkout.paid_id', '=', 'payment_history.id') 
                           ->join('order_detail', 'order_detail.checkout_id', '=', 'checkout.id')                             
                          ->select('users.*', 'payment_history.txn_id','payment_history.status as paymentstatus','payment_history.payment_level','payment_history.created_at as paymentDate','payment_history.paidAmount','payment_history.user_id','checkout.parent_id as checkoutparentid','order_detail.expiry_date')
                          ->where('users.role_type','=','3')
                          ->where('users.status','=','1')
                          //->whereMonth('payment_history.created_at','=',date('m'))
                          //->groupBy('users.id')
                          ->orderBy('payment_history.id','desc')                                  
                          ->get();

       

        //echo '<pre>';print_r($getUserPayment);die;          


        return view('administrator.card-user-management',['getUserPayment'=>$getUserPayment]);

    }
    

    

    public function PublishNewsEvent()
    {


        $allData= CalendarManagement::all();
        return view('administrator/upload-caleneder-managment',['allevents'=>$allData]);
    }

    public function UploadCalendar(Request $request)
    {

            $rules=[
                      'image' => 'mimes:jpeg,jpg,png,gif | max:1024',  
                    ];

            $message['image.mimes']        =  'Il file dovrebbe essere jpg, png, jpeg e dimensione massima 1 MB';

           $this->validate($request, $rules,$message);   

            if(!empty($request->file('image'))){
                     $image       =         !empty($request->file('image'))  ?  $request->file('image') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/news');
                     $image->move($destinationPath, $imagNmae);
                 }


        $title= !empty($request->input('title')) ? $request->input('title') : '';
        $description= !empty($request->input('editor1'))  ? $request->input('editor1') : '';
        $startDate=   !empty($request->input('start_time'))  ? $request->input('start_time') : '';
        $endDate =   !empty($request->input('finish_time'))  ? $request->input('finish_time') :  '';

        $CalendarManagement = new CalendarManagement();

        $CalendarManagement->title= $title;
        $CalendarManagement->description= $description;
        $CalendarManagement->start_time = $startDate;
        $CalendarManagement->end_time = $endDate;
        $CalendarManagement->image= $imagNmae;

        $CalendarManagement->save();

        return redirect('administrator/publish-newsevent');


    }

    public function CalendarManagement()
    {

      return view('administrator/caleneder-managment');
    }

    public function ajaxCalender()
    {   

        $allData= CalendarManagement::all();
        foreach($allData as $row)
          {
             $data[] = array(
              'id'   => $row->id,
              'title'   => $row->title,
              'start'   => $row->start_time,
              'end'   => $row->end_time,
             );
        }

        echo json_encode($data);die;
    }

    public function getEvent($id)
    {

      $allData= CalendarManagement::where(['id'=>$id])->first();

      echo json_encode($allData);die;
    }
    
    
     public function DeleteEvent($id)
    {

          CalendarManagement::where('id',$id)->delete();
         
        return redirect('administrator/publish-newsevent');

    }



    public function SetNotification()
    {

        $notificationData= SetReminder::all();

      // echo '<pre>';print_r($getalldata);die;
       return view('administrator/set-notification',['getalldata'=>$notificationData]); 

    }

    public function AddNotification(Request $request)
    {

        if(isset($_POST['addbutton']))
        {

             $rules=[
                        'type_notification' => 'required|string|max:255',
                        'date_of_month' => 'required',
                    ];



              $message["type_notification.required"] = 'Il campo è obbligatorio';
              $message["date_of_month.required"] =    'Il campo è obbligatorio';             


              $this->validate($request, $rules,$message);  


              $notificationType=  !empty($request->input('type_notification')) ? $request->input('type_notification') :  '';
              $notificationDate= !empty($request->input('date_of_month'))  ? json_encode($request->input('date_of_month')) : '';

            //  echo '<pre>';print_r($request->input('date_of_month'));die;

              $inserNotification = new SetReminder();

              $inserNotification->reminder_type= $notificationType;
              $inserNotification->reminder_date= $notificationDate;
              $inserNotification->save();


               $request->session()->flash('success', 'Aggiorna i dati con successo!');    
             return redirect('administrator/set-notification');
             

        }

        return view('administrator/add-notification');

    }

    public function EditNotification(Request $request,$id)
    {

        if(isset($_POST['addbutton']))
        {

              $rules=[
                        'type_notification' => 'required|string|max:255',
                        'date_of_month' => 'required',
                    ];



              $message["type_notification.required"] = 'Il campo è obbligatorio';
              $message["date_of_month.required"] =    'Il campo è obbligatorio';             


              $this->validate($request, $rules,$message);  


              $notificationType=  !empty($request->input('type_notification')) ? $request->input('type_notification') :  '';
              $notificationDate= !empty($request->input('date_of_month'))  ? json_encode($request->input('date_of_month')) : '';

            //  echo '<pre>';print_r($request->input('date_of_month'));die;

             $updateData= array(
                              'reminder_type'=>$notificationType,
                              'reminder_date'=>$notificationDate
                  );
              SetReminder::where(['id'=>$id])->update($updateData);

             $request->session()->flash('success', 'Aggiornamento della notifica con successo!');    
              return redirect('administrator/set-notification'); 


        }

      $getEditNotification  = SetReminder::where(['id'=>$id])->first();

      return view('administrator/edit-notification',['getEditNotification'=>$getEditNotification]);
    }
    
    
     public function EditUserProfile(Request $request)
    {

        $renewalDate = !empty($request->input('date')) ? $request->input('date') : '';
        $userId      = !empty($request->input('user_id')) ? $request->input('user_id') : '';

        $updateUserDetail= array(
                              'renewal_date'=>$renewalDate
                            ); 

       User::where(['id'=>$userId])->update($updateUserDetail);


        $request->session()->flash('success', 'Data aggiornata con successo!');         
        return redirect('/administrator/payment-history');
    }
    

    public function BonusManagement()
    {
       $userDetail=  DB::table('users')
                          ->leftjoin('bonus_management', 'users.id', '=', 'bonus_management.user_id')                     
                          ->select('users.*', 'bonus_management.promoter_percentage','bonus_management.bklic_profit','bonus_management.date_apply','bonus_management.created_at as bonuscreatedate','bonus_management.id as bonusId')
                          ->where('users.role_type','=','2')
                          ->where('users.status','=','1')                           
                          ->where('users.is_deleted','=','0')
                          ->orderBy('users.id','DESC')                                                          
                          ->get(); 

      return view('administrator/bonus_management',['userDetail'=>$userDetail]);
    }


    public function EditBonus(Request $request,$id)
    {


          if(isset($_POST['editbutton']))
          {

               $rules=[
                        'percentage' => 'required|numeric',
                        'amount' => 'required|numeric',
                    ];
                   

              $message["percentage.required"] = 'Il campo è obbligatorio';
              $message["amount.required"] =    'Il campo è obbligatorio';             


              $this->validate($request, $rules,$message);

              $percentage = !empty($request->input('percentage')) ? $request->input('percentage') : '';
              $amount    =  !empty($request->input('amount'))   ?  $request->input('amount')   :   '';


               $checkExists= BonusManagement::where(['user_id'=>$id])->first();
              if(count($checkExists)>0)
              {

              $updateUserDetail= array(
                                      'user_id'=>$id,
                                      'promoter_percentage'=>$percentage,
                                      'bklic_profit'=>$amount
                                  );
              BonusManagement::where(['user_id'=>$id])->update($updateUserDetail);
            }else{

              $bonus= new BonusManagement();

              $bonus->user_id= $id;
              $bonus->promoter_percentage= $percentage;
              $bonus->bklic_profit = $amount;
              $bonus->save();

            }

              $request->session()->flash('success', 'Data aggiornata con successo!');         
              return redirect('/administrator/bonus-management');


          }

        $bonus= BonusManagement::where(['user_id'=>$id])->first();       

        return view('administrator.edit_bonus_management',['bonus'=>$bonus]);

    }
	
	public function SubscriptionPlan(Request $request)
	{

	$SubscriptionPlan= SubscriptionPlans::all();           

	return view('administrator.subscription-plan',['SubscriptionPlan'=>$SubscriptionPlan]);
	} 
	
	public function AddSubscriptionPlan(Request $request)
	{         
	
	if(isset($_POST['addbutton']))
	{
			$rules=[
						'subscription_name' => 'required',
						'plan_type' => 'required',
						'subscription_price' => 'required'
					];
			$message["subscription_name.required"] = "Il campo del nome dell'abbonamento è obbligatorio.";
			$message["plan_type.required"] =    "Il campo del tipo di piano è richiesto.";
			$message["subscription_price.required"] =    "Il campo del prezzo dell'abbonamento è obbligatorio.";
            $this->validate($request, $rules, $message); 
			
			$name= !empty($request->input('subscription_name')) ? $request->input('subscription_name') : '';
			$type= !empty($request->input('plan_type'))  ? $request->input('plan_type') : '';
			$price=   !empty($request->input('subscription_price'))  ? $request->input('subscription_price') : '';

			$SubscriptionPlans = new SubscriptionPlans();

			$SubscriptionPlans->subscription_name= $name;
			$SubscriptionPlans->plan_type= $type;
			$SubscriptionPlans->subscription_price = $price;

			$SubscriptionPlans->save();

			return redirect('administrator/subscription-plan');

              
		//echo '<pre>'; print_r($_POST); die;
	}
	return view('administrator.add-subscription-plan');
	} 
	
	public function editsubscriptionplan(Request $request,$id)
   {

      if(isset($_POST['addbutton']))
      {

             $rules=[
						'subscription_name' => 'required',
						'plan_type' => 'required',
						'subscription_price' => 'required'
					];
			$message["subscription_name.required"] = "Il campo del nome dell'abbonamento è obbligatorio.";
			$message["plan_type.required"] =    "Il campo del tipo di piano è richiesto.";
			$message["subscription_price.required"] =    "Il campo del prezzo dell'abbonamento è obbligatorio.";
            $this->validate($request, $rules, $message);  

			$name= !empty($request->input('subscription_name')) ? $request->input('subscription_name') : '';
			$type= !empty($request->input('plan_type'))  ? $request->input('plan_type') : '';
			$price=   !empty($request->input('subscription_price'))  ? $request->input('subscription_price') : '';

          $updateArray= array('subscription_name'=>$name,'plan_type'=>$type,'subscription_price'=>$price);
        
          SubscriptionPlans::where(['plan_id'=>$id])->update($updateArray);

          $request->session()->flash('success', 'Piano di abbonamento aggiornato con successo!');    
          return redirect('administrator/subscription-plan');

      }

      $planById = SubscriptionPlans::where(['plan_id'=>$id])->first();

      return view('administrator.edit-subscription-plan',['planGetById'=>$planById]); 

   }
    

    public function deletesubscriptionplan(Request $request,$id)
    {

         SubscriptionPlans::where('plan_id',$id)->delete();

        $request->session()->flash('success', 'Piano di abbonamento eliminato con successo!');    
        return redirect('administrator/subscription-plan');

    }


    public function UserConversion()
    {

        $userConversionPoint = DB::table('users')
                        ->join('e_wallet', 'users.id', '=', 'e_wallet.user_id')                     
                        ->select('users.*', 'e_wallet.amount','e_wallet.paid_status','e_wallet.id as walletid')
                        ->where('users.role_type','=','2')
                        ->where('users.status','=','1') 
                        ->where('users.is_deleted','=','0')
                        ->orderBy('e_wallet.id','DESC')                              
                       ->get();     

           //echo '<pre>';print_r($userConversionPoint);die;                   

        return view('administrator.user-pv-conversion',['userConversionPoint'=>$userConversionPoint]);
    }

    public function ConversionSendConfirmation(Request $request,$id)
    {

         $update =array('paid_status'=>'1');

          Wallet::where(['id'=>$id])->update($update);

        $request->session()->flash('success', "L'importo della conversione è stato inviato correttamente!");  
        return redirect('administrator/user-conversion');
    }

    public function Notification(Request $request,$id)
    {

        $notifications= Notifications::where(['notifications.id'=>$id])->leftJoin('users', 'users.id', '=', 'notifications.not_from')->select('users.name','users.userName','users.email','users.profileimage', 'notifications.*')->get();
        //echo '<pre>'; print_r($notifications); die;
        if(!empty($notifications)){
           $updateIsRead= array(
                                'is_read'=>1
                               );
                 Notifications::where(['id' => $id])->update($updateIsRead);
        }     
        return view('administrator.notification-view',['notifications'=>$notifications]);

       
    }

    public function founderList(Request $request)
    {

        $founders = User::where(['founder'=>true])->get();
        //echo '<pre>'; print_r($founders); die;
        return view('administrator.founders-view',['founders'=>$founders]);

       
    }

  /*  public function setFounderBonus()
   {
        $userId= isset($_GET['userid']) ? $_GET['userid']:'';

        $founderValueBonus = isset($_GET['founderbonus']) ? $_GET['founderbonus']:'';

        User::where(['id'=>$userId])->update(array('founder_bonus_point_value'=>$founderValueBonus));


   } */
   
    public function addBonus(Request $request)
   {

			$bonus= !empty($request->input('bonus')) ? $request->input('bonus') : '';

      $allUser = !empty($request->input('foundercheck'))?$request->input('foundercheck'):'';

      if(!empty($allUser))
      {
         foreach($allUser as $item)
          {
		  	    User::where(['founder'=>true,'id'=>$item])->update(array('founder_bonus_point_value'=>$bonus));
          }
          $request->session()->flash('success', 'Bonus Fondatore aggiornato con successo!'); 

      }else{

         $request->session()->flash('danger', 'Si prega di selezionare almeno un utente!');
      }
			
		   
			return redirect('administrator/founder-list');

   }
   
   public function editAff(Request $request,$id)
    {
		//echo '<pre>'; print_r($_POST); die;
			$promotors= User::where(['role_type'=>2])->get();
            if(!empty($_POST)){
				$rules=[
                        'promotor' => 'required',
                    ];

              $message["promotor.required"] = 'Il campo Promotore è obbligatorio';


              $this->validate($request, $rules,$message);  


                $promotor = !empty($request->input('promotor')) ? $request->input('promotor') : '';
                $aff_id   =  !empty($request->input('aff_id'))   ? $request->input('aff_id')   : '';
                
				$updateData= array(
                                'parent_id'=>$promotor,
								'isPromotor' => 1
                              );
                 
                 User::where(['id'=>$aff_id])->update($updateData);
				 $request->session()->flash('success', 'Promotore aggiornato con successo!');    
				return redirect('administrator/subscription-affiliates');
			}				
          return view('administrator.affiliated-promotor-update',['allPromotors'=>$promotors, 'affid'=>$id]) ;                         

    }
   

   public function AdminProfile(Request $request)
   {

      $userId= Auth::id();

         if(isset($_POST['editbutton']))
         {



                $rules=[
                        'name' => 'required|string|max:255',
                        'userName' => 'required|string|max:255',
                        'telephoneNumber' => 'required|numeric|digits:10',
                        'postalCode' => 'required|string|min:5',
                        'iban'   =>    'required|numeric|min:20',
                        'bank'   =>    'required|string|max:255',
                        'paypal'   =>    'required|string|email|max:255',    
                    ];



              $message["name.required"] = 'È richiesto il campo nome';
              $message["userName.required"] = 'Il campo userName è richiesto';
              $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';

              $message["postalCode.required"] = 'Il campo cap è richiesto';

             $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';

              $message['iban.required']        =    'È richiesto il campo del nome Iban';
              $message['bank.required']        =    'Il campo del nome della banca è obbligatorio';
              $message['paypal.required']        =    'Il campo del nome paypal è obbligatorio';
              $message['paypal.email']        =    'Il paypal deve essere un indirizzo email valido';
              $message['iban.numeric']        =    "L'i b a n deve essere un numero";

              $this->validate($request, $rules,$message);          


            $name        =            !empty($request->input('name')) ?    $request->input('name') :'';
            $username     =          !empty($request->input('userName')) ?     $request->input('userName'):'';
            $telephoneNumber  =    !empty($request->input('telephoneNumber'))  ?  $request->input('telephoneNumber'):'';
            $postalCode   =         !empty($request->input('postalCode'))    ?  $request->input('postalCode'):'';
            $IBAN          =        !empty($request->input('iban'))         ?  $request->input('iban')       :   '';
            $bank          =        !empty($request->input('bank'))         ?  $request->input('bank')       :   '';
            $Paypal       =         !empty($request->input('paypal'))         ?  $request->input('paypal')       :   '';
            
            $updateUserDetail = array(
                        'name'=>$name,
                        'username'=>$username,
                        'telephoneNumber'=>$telephoneNumber,
                        'postalCode' =>$postalCode,
                        'iban'  =>  $IBAN,
                        'bank'  =>$bank,
                        'paypal'=>$Paypal,
                        
                );

            User::where(['id'=>$userId])->update($updateUserDetail);


            $request->session()->flash('success', 'Profilo aggiornato con successo!');         
            return redirect('/administrator/dashboard');

         }      


       $userProfile = User::find($userId);

      return view('administrator.editadminprofile',['userProfile'=>$userProfile]);
   }

   public function CompanyList()
   {

      $getDetail = Business::all();
      return view('administrator.company-list',['getDetail'=>$getDetail]);
   }

   public function AddCompany(Request $request)
   {

      if(isset($_POST['add']))
      {


           $rules=[
                        
                        'businessname' => 'required|string|max:255',
                        'telephoneNumber' => 'required|numeric|digits:10',
                        'postalCode' => 'required|string|min:5',
                         'email' => 'required|string|email|max:255|unique:business',
                         'address' => 'required|string|max:255',
                         'city' => 'required|string|max:255',
                         'state' => 'required|string|max:255',
                         'logo' => 'required',
                          
                    ];



             
              $message["businessname.required"] = 'Il campo userName è richiesto';
              $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';

              $message["postalCode.required"] = 'Il campo cap è richiesto';

             $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';
              $message["email.required"] = 'Il campo email è obbligatorio';

              $message["email.unique"] = "l'email è già stata presa";

               $message["address.required"] = "Il campo indirizzo è obbligatorio";
               $message["city.required"] = "Il campo della città è obbligatorio";
               $message["state.required"] = "Il campo stato è obbligatorio";


             
             $message['logo.required']        =  'Il campo logo è obbligatorio';            

              

              $this->validate($request, $rules,$message);          


           
            $businessname     =          !empty($request->input('businessname')) ?     $request->input('businessname'):'';
            $telephoneNumber  =    !empty($request->input('telephoneNumber'))  ?  $request->input('telephoneNumber'):'';
            $postalCode   =         !empty($request->input('postalCode'))    ?  $request->input('postalCode'):'';
            $email          =        !empty($request->input('email'))         ?  $request->input('email')       :   '';
            $address          =        !empty($request->input('address'))         ?  $request->input('address')       :   '';
            $city       =         !empty($request->input('city'))         ?  $request->input('city')       :   '';
             $state       =         !empty($request->input('state'))         ?  $request->input('state')       :   '';

              if(!empty($request->file('logo'))){


                     $image       =         !empty($request->file('logo'))  ?  $request->file('logo') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/dealer_logos');
                     $image->move($destinationPath, $imagNmae);
                 }


                $setData= new Business();
                
                $setData->business_name =  $businessname;
                $setData->phone =  $telephoneNumber;
                $setData->postcode =  $postalCode;
                $setData->email =  $email;
                $setData->regione =  $address;
                $setData->city =  $city;
                $setData->state =  $state;
                $setData->logo =  $imagNmae;

                $setData->save();


                $request->session()->flash('success', 'Dettaglio aggiornato con successo!');         
             return redirect('/administrator/company-list');

      }
      return view('administrator.add-company');
   }

   public function EditCompany(Request $request,$id)
   {


      if(isset($_POST['add']))
      {


           $rules=[
                        
                        'businessname' => 'required|string|max:255',
                        'telephoneNumber' => 'required|numeric|digits:10',
                        'postalCode' => 'required|string|min:5',
                         'email' => 'required|string|email|max:255|unique:users',
                         'address' => 'required|string|max:255',
                         'city' => 'required|string|max:255',
                         'state' => 'required|string|max:255',
                         //'logo' => 'required',
                          
                    ];



             
              $message["businessname.required"] = 'Il campo userName è richiesto';
              $message["telephoneNumber.required"]= 'Il campo telefono è richiesto';

              $message["postalCode.required"] = 'Il campo cap è richiesto';

             $message["telephoneNumber.digits"] = 'Il numero di telefono deve essere di 10 cifre';
              $message["email.required"] = 'Il campo email è obbligatorio';

              $message["email.unique"] = "l'email è già stata presa";

               $message["address.required"] = "Il campo indirizzo è obbligatorio";
               $message["city.required"] = "Il campo della città è obbligatorio";
               $message["state.required"] = "Il campo stato è obbligatorio";


             
            // $message['logo.required']        =  'Il campo logo è obbligatorio';            

              

              $this->validate($request, $rules,$message);          


           
            $businessname     =          !empty($request->input('businessname')) ?     $request->input('businessname'):'';
            $telephoneNumber  =    !empty($request->input('telephoneNumber'))  ?  $request->input('telephoneNumber'):'';
            $postalCode   =         !empty($request->input('postalCode'))    ?  $request->input('postalCode'):'';
            $email          =        !empty($request->input('email'))         ?  $request->input('email')       :   '';
            $address          =        !empty($request->input('address'))         ?  $request->input('address')       :   '';
            $city       =         !empty($request->input('city'))         ?  $request->input('city')       :   '';
             $state       =         !empty($request->input('state'))         ?  $request->input('state')       :   '';

              if(!empty($request->file('logo'))){


                     $image       =         !empty($request->file('logo'))  ?  $request->file('logo') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/dealer_logos');
                     $image->move($destinationPath, $imagNmae);
                 }else{
                  $imagNmae= !empty($request->input('logo_old'))  ?  $request->input('logo_old') : '';
                 }

                 $updateUserDetail = array(
                        'business_name'=>$businessname,
                        'phone'=>$telephoneNumber,
                        'email'=>$email,
                        'postcode'=>$postalCode,
                        'regione' =>$address,
                        'city' =>$city,
                        'state' =>$state,
                        'logo' =>$imagNmae,
                  );

              Business::where(['id'=>$id])->update($updateUserDetail);


               $request->session()->flash('success', 'Dettaglio aggiornato con successo!');         
             return redirect('/administrator/company-list');

      }


      $getEditDetail = Business::find($id);
      //echo '<pre>';print_r($getEditDetail);die;
      return view('administrator.edit-company',['getEditDetail'=>$getEditDetail]);
   }


   public function DeleteCompany(Request $request,$id)
   {

         $page= Business::find($id);

          $page->delete();

         $request->session()->flash('success','dati cancellati correttamente.');
         return redirect('administrator/company-list'); 
   }

   public function GetDocumentPopup($id)
   {

      $userDocument  =  DB::table('promoter_document')                                                  
                          ->select('promoter_document.*')
                          ->where('promoter_document.user_id','=',$id)
                         ->get();

        return json_encode($userDocument);                 


   }


   public function ListNewsPublic()
   {


      $getDetail= NewCms::all();
      return view('administrator.news-list',['getDetail'=>$getDetail]);

   }

   public function PublishNews(Request $request)
   {

      if(isset($_POST['add']))
      {

               $rules=[
                        
                        'title' => 'required|string|max:255',
                        'editor1' => 'required|string',
                         'file' => 'required',
                          
                    ];



             
              $message["title.required"] = 'Il campo titolo è richiesto';
              $message["editor1.required"] = 'Il campo Descrizione è richiesto';
             
             $message['file.required']        =  'Il campo File è obbligatorio';            

              

              $this->validate($request, $rules,$message);     

            $title     =          !empty($request->input('title')) ?     $request->input('title'):'';
            $desc  =    !empty($request->input('editor1'))  ?  $request->input('editor1'):'';
           

              if(!empty($request->file('file'))){


                     $image       =         !empty($request->file('file'))  ?  $request->file('file') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/news');
                     $image->move($destinationPath, $imagNmae);
                 }


                $setData= new NewCms();
                
                $setData->title =  $title;
                $setData->description =  $desc;
                $setData->image =  $imagNmae;

                $setData->save();


                $request->session()->flash('success', 'Dettaglio aggiornato con successo!');         
             return redirect('/administrator/publish-news');

      }

      return view('administrator.add-news');
   }

   public function EditNews(Request $request,$id)
   {


      if(isset($_POST['add']))
      {

               $rules=[
                        
                        'title' => 'required|string|max:255',
                        'editor1' => 'required|string',
                        // 'file' => 'required',
                          
                    ];



             
              $message["title.required"] = 'Il campo titolo è richiesto';
              $message["editor1.required"] = 'Il campo Descrizione è richiesto';
             
            // $message['file.required']        =  'Il campo File è obbligatorio';            

              

              $this->validate($request, $rules,$message);     

            $title     =          !empty($request->input('title')) ?     $request->input('title'):'';
            $desc  =    !empty($request->input('editor1'))  ?  $request->input('editor1'):'';
           

              if(!empty($request->file('file'))){


                     $image       =         !empty($request->file('file'))  ?  $request->file('file') : '';
                     $fileext     =         $image->getClientOriginalExtension();

                     // file move to folder//
                     $imagNmae = time().'.'.$image->getClientOriginalExtension();
                     $destinationPath = public_path('/images/news');
                     $image->move($destinationPath, $imagNmae);
                 }else{
                  $imagNmae= $request->input('old_image');
                 }


                 $updateUserDetail = array(
                        'title'=>$title,
                        'description'=>$desc,
                        'image' =>$imagNmae,
                  );

              NewCms::where(['id'=>$id])->update($updateUserDetail);


                $request->session()->flash('success', 'Dettaglio aggiornato con successo!');         
             return redirect('/administrator/publish-news');

      }


    $getEditDetail= NewCms::where(['id'=>$id])->first();
    return view('administrator.edit-news',['getEditDetail'=>$getEditDetail]);
   }


   public function DeleteNews(Request $request,$id)
   {

        $page= NewCms::find($id);

          $page->delete();

          $request->session()->flash('success','Pagina cancellata con successo.');
         return redirect('administrator/publish-news');   
   }

}
