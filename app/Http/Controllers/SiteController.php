<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\UploadCard;
use Illuminate\Support\Facades\DB;
use Cart;
use App\PaypalSetting;
use App\User;
use App\PaymentHistory;
use App\BillingDetail;
use App\OrderDetail;
use App\UserRatings;
use App\CategoryManagement;
use App\Checkout;
use App\SetReminder;
use App\Commission;
use App\MinimumValuePoint;
use App\CalendarManagement;
use App\CmsPages;
use App\NewCms;
use Helper;
use Mail;


class SiteController extends Controller
{
    //

            public $apiUrl = 'http://chart.apis.google.com/chart';
            public $data;

		public function index()
		{

			

			return view('welcome');

		}


		public function CardDetail($id)
		{
			
			$getAsPerId = UploadCard::where('id',$id)->first(); 

			return view('card-detail',['getCard'=>$getAsPerId]);
		}


		public function CartAdd(Request $request)
		{	

				$productId = 		!empty($request->input('cart_id'))  ?    $request->input('cart_id') : '' ; 
				
				$getProductDetail = UploadCard::where('id',$productId)->first(); 

				$qty         =    '1';
				$price       =   $getProductDetail->amount;
				$productName =   $getProductDetail->title;
			

				Cart::add([
							'id'=>$productId,
							'price'=>$price,
							'name' =>$productName,
							'qty' => $qty, 
						]);

			 $request->session()->flash('success', 'Il prodotto si aggiunge con successo nel carrello!'); 		
			return redirect('cart');	

		}


		public function ShowCart()
		{

			$carDetail = Cart::Content();

			return view('cart',['carDetail'=>$carDetail]);
		}

		public function RemoveCart(Request $request,$id)
		{

			Cart::remove($id);

			$request->session()->flash('success', 'Prodotto rimosso con successo nel carrello!');
			return redirect('cart');

		}


		public function Checkout()
		{			
			
			$cartDetail = Cart::Content();

		    $paypalDetail= PaypalSetting::first();

		  	//echo '<pre>';print_r($cartDetail);die;

			return view('checkout',['cartDetail'=>$cartDetail,'paypalDetail'=>$paypalDetail]);
		}

		public function getCheckoutDetail(Request $request)
		{

			   $taxId= isset($_GET['tx'])?$_GET['tx']:'';

			   $cartDetail = Cart::Content();
			  //echo '<pre>';print_r($_REQUEST);die;

			   if(!empty($taxId)){

                    $checkTxnId= PaymentHistory::where(['txn_id'=>$taxId])->first();

                   
                    if(!empty($checkTxnId)>0){

                         //return redirect('paypal/success/'.$taxId);
                       $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('order-detail');

                    }else{
                          
                            $status= $_GET['st'];
                            $userName= $_GET['item_name'];
                            $currencyCode= $_GET['cc'];
                            $custome = !empty($_GET['cm'])?json_decode($_GET['cm']):'';
                            $paidAmount= $_GET['amt'];

                          
                           $customedata=array();

                            foreach($custome as $key=>$val){

                            	foreach ($val as $k => $v) {

                            		$customedata[$k]=$v;
                            	}
                            	
                            }

                             $refferalCode= !empty($customedata['refferal'])? $customedata['refferal']:'';

                             $PostCode= !empty($customedata['zip'])? $customedata['zip']:'';



                             	if(!empty($PostCode) && empty($refferalCode))
                             	{

                             		$getDetail=  DB::table('users')
							                          ->select('users.*')						                          			                     
							                          ->Where('postalCode','=',$PostCode)							                                                      
							                          ->first();

							                      

							          if(!empty($getDetail)) {

							          	$matchRefferaCode = $getDetail;

							          }else{

                             			$matchRefferaCode =  DB::table('users')
									                          ->select('users.*')
									                          ->where('role_type','=','2')
									                          ->inRandomOrder()                             
									                          ->first();        
							          }

                             	}else{

                             		$matchRefferaCode=  User::where(['referralCode'=>$refferalCode])->first();                            		

                             	} 


                             //echo '<pre>';print_r($matchRefferaCode);die;                             


							   $email = $customedata['email'];

							  $checkEmailExists= User::where(['email'=>$email])->first();

														  
							  if(empty($checkEmailExists))
							  {                       	

							  		  $password = mt_rand(100000,999999); 
							  		  $dcryptPassword = bcrypt($password); 
							  		 // $token= csrf_token();

							  		  $userInsert= new User();  

									  $userInsert->name  =        $customedata['name'];
									  $userInsert->userName  =    $customedata['name'];
			                          $userInsert->email  =       $customedata['email'];
			                          $userInsert->resiaddress=   $customedata['address'];
			                          $userInsert->role_type=      '3';
			                          $userInsert->is_email_verify= '1';
			                          $userInsert->region=        $customedata['city'];
			                          $userInsert->postalCode =   $customedata['zip']; 
			                          $userInsert->password =   $dcryptPassword; 
			                         // $userInsert->remember_token = $token;

			                          $userInsert->save(); 


			                         // registration mail to user //
			                         $subject= 'Registration Confirmation';

		                             $header = "From:bklic@bklic.komete.it \r\n";
		                             $header.= 'MIME-Version: 1.0' . "\r\n";
		                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		                             $message ='Ciao '.$customedata['name'].'<br/>'; 
		                             $message ='Email- '.$customedata['email'].'<br/>'; 
		                             $message.='la tua password  '.$password.'<br/>';
		                             $message.='Grazie per esserti registrato a Bklic. <br/>'; 
		                             $message.= "Hai l'autorità di rivedere su affiliati.<br/>";
		                         //   $message.= '<a href="'.url('user-login/'.$token).'">Click here</a>';	                            
		                             	
		                             mail($customedata['email'],$subject,$message,$header); 	

	                          }                     	


                          $userId = empty($checkEmailExists)?$userInsert->id:$checkEmailExists->id;


                         	 $paymentData= new PaymentHistory();

                            $paymentData->txn_id= $taxId;
                            $paymentData->user_id= $userId;
                            $paymentData->userName = $userName;
                            $paymentData->currencyCode= $currencyCode;
                            $paymentData->paidAmount= $paidAmount;
                            $paymentData->status= $status;
                            $paymentData->payment_level= 'C';

                            $paymentData->save();
                           $insertId= $paymentData->id;

                          if(!empty($insertId)) {

                          	if(count($matchRefferaCode) > 0){ 

                          			$getAsPerLevelPoint= DB::table('upgrade_pv_conversion')
                                                      ->select('upgrade_pv_conversion.*')
                                                      ->where('level','=','SC')
                                                      ->first();  

                          			if(empty($checkEmailExists))
                          			{

                          					Helper::GetCommission($matchRefferaCode->id,$getAsPerLevelPoint->point,$level='1',$insertId);
                         		
                         					$updateUserDetail=array('parent_id'=>$matchRefferaCode->id);   
                          			}else{

                          					if($checkEmailExists->role_type=='3')
                          					{

                          						Helper::GetCommission($matchRefferaCode->id,$getAsPerLevelPoint->point,$level='1',$insertId);
                         		
                         						$updateUserDetail=array('parent_id'=>$matchRefferaCode->id);

                          					}else{


                          						 $updateUserDetail=array('parent_id'=>$matchRefferaCode->id);
                          					}


                          			}

                         	 }else{
                                      $updateUserDetail=array('referralCode'=>'');                                    
                                  }


                                User::where(['id'=>$userId])->update($updateUserDetail); 


                                // notification//
		                                 $notMessage = 'Nuovo acquisto della carta';

		                                 $userTo =  (count($matchRefferaCode)>0)?$matchRefferaCode->id:'0';

		                                 Helper::saveNotification($userId, $userTo, $notMessage, '3', '3');
                                 // end here//


	                          $Order= new OrderDetail;

	                          $checkout = new Checkout;

	                          // insert data check out//

	                          $checkout->user_id= $userId;
	                          $checkout->paid_id= $insertId;
	                          $checkout->parent_id= (count($matchRefferaCode)>0)?$matchRefferaCode->id:'0';
	                          $checkout->card_status= '1';
	                          $checkout->save();
                          	  $checkoutinsertId= $checkout->id;

                          	  // end here//


                          	  // billing detail //	                          

	                          $billing= new BillingDetail;

	                          $billing->user_id= $userId;
	                          $billing->paid_id= $insertId;
	                          $billing->checkout_id= $checkoutinsertId;
	                          $billing->name= $customedata['name'];
	                          $billing->email= $customedata['email'];
	                          $billing->address= $customedata['address'];
	                          $billing->city= $customedata['city'];
	                          $billing->state= $customedata['state'];
	                          $billing->zip= $customedata['zip'];
	                          $billing->save();

	                          // end here//


                          	  foreach($cartDetail as $cartItem)  {

								  $getproductinfo = UploadCard::where('id',$cartItem->id)->first(); 
								  if(!empty($getproductinfo->card_length)){
									$totaltime = $getproductinfo->card_length;
									$expirtyDate = date('d-m-Y',strtotime($paymentData->created_at. " + $totaltime month"));
								  }elseif(!empty($getproductinfo->card_length_days)) {
								  	$days = $getproductinfo->card_length_days;
								  	$expirtyDate = date('d-m-Y',strtotime($paymentData->created_at. " + $days day"));
								  }
								  else{
									$totaltime = 1;
									$expirtyDate = date('d-m-Y',strtotime($paymentData->created_at. " + $totaltime month"));
								  }



                          		$user = User::where(['id'=>$userId])->first();

                          		$text= 'User Name:'.$user->name ;

                          		$text.= 'User Card Expiry Date:'.$expirtyDate;

                          		//echo $text;die;

                          	    $this->TEXT($text);

				                  // render QR code
			                    $randString =  rand();       

			                    $this->QRCODE(200,"$randString.png"); 	



	                              $Order->product_id = $cartItem->id;
	                              $Order->user_id = $userId;
	                              $Order->checkout_id = $checkoutinsertId;
	                              $Order->product_name = $cartItem->name;
	                              $Order->product_price = $cartItem->price;
	                              $Order->total_price = $paidAmount;
	                              $Order->paid_id = $insertId; 
	                              $Order->qr_code = "$randString.png";
								  //$Order->expiry_date= date('Y-m-d H:i:s',strtotime($paymentData->created_at. " +".$totaltime." months")); 
								  $date1 = strtotime($expirtyDate);
								  $Order->expiry_date = date("Y-m-d h:i:s",$date1);
	                              $Order->save();



	                              // here email send to user as per card with qr //
	                            

                              	 $orderDetail= DB::table('order_detail')
                              	 					->join('checkout', 'checkout.id', '=', 'order_detail.checkout_id')
							                      	->join('payment_history', 'order_detail.paid_id', '=', 'payment_history.id')
							                      	->select('order_detail.*', 'payment_history.txn_id', 'payment_history.currencyCode','payment_history.paidAmount','payment_history.status')
								                    ->where('order_detail.user_id','=',$userId)
								                    ->where('order_detail.id','=',$Order->id) 
								                    ->where('checkout.card_status','=','1')                      
								                    ->first();
	                     
	         
	         						$subject= 'Order Confirmation';

		                             $header = "From:bklic@bklic.komete.it \r\n";
		                             $header.= 'MIME-Version: 1.0' . "\r\n";
		                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		         

		                            $message= '<body style="margin:0; padding:0; background-color:#F2F2F2;">
											<span style="display: block; width: 640px !important; max-width: 640px; height: 1px" class="mobileOff"></span>
  
		  											<center>
		  											 <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
		  											 	<tr>
       														 <td align="center" valign="top">
       														 		  <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
															            <tr>
															              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
															            </tr>

															           <tr>
															              <td align="center" valign="top">

															           <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
															              	<tr>
															                    <td align="center" valign="top">
															                      <h3 style="color: green">Grazie per il vostro ordine</h3>
															                    </td>
															                  </tr>
															                </table>

															              </td>
															           </tr>
															      	<tr>
													            	 	<td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
													            	</tr>     
													           </table>

													        <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
													        
													        		 <tr>
														             	 <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
														            </tr>

														            	<tr>
													              <td align="center" valign="top">

													                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
													                  <tr>
													                    <td align="left" valign="top">
													                      <table width="100%">
													                        <thead>
													                            <tr>
													                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">TXN ID</th>
													                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Articolo</th>
													                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Descrizione</th>
													                               
													                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Qty</th>
													                                <th align="left" height="32px" style="border-bottom: 2px solid #727272; padding: 0 15px; font-size: 14px;" bgcolor="#f1f1f1">Totale</th>
													                            </tr>
													                          </thead>
													                          <tbody>
													                            <tr>
													                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">'.$orderDetail->txn_id.'</td>
													                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">'.$orderDetail->product_name.'</td>
													                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">
													                                Sottoscrizione 1 mese</td>
													                                
													                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">1</td>
													                                <td align="left" height="32px" style="border-bottom: 1px solid #f1f1f1; padding: 10px 15px; font-size: 13px;" bgcolor="#fff">'.$orderDetail->product_price.'</td>
													                            </tr>
													                              
													                              <tr>
													                                <td align="right" height="32px" style="border-top: 2px solid #f1f1f1; border-bottom: 2px solid #f1f1f1; padding: 10px 15px; font-size: 20px; font-weight: bold" bgcolor="#fff" colspan="4">TOTALE</td>
													                                <td align="left" height="32px" style="border-top: 2px solid #f1f1f1; border-bottom: 2px solid #f1f1f1; padding: 10px 15px; font-size: 20px; font-weight: bold" bgcolor="#fff">'.$orderDetail->paidAmount.'</td>
													                            </tr>
													                          </tbody>
													                        </table>
													                    </td>
													                  </tr>
													                </table>

													              </td>
            													</tr>
            													<tr>
													              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
													            </tr>
													        </table> 

															<table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
															            <tr>
															              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
															            </tr>
															            <tr>
															              <td align="center" valign="top">

															                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
															                  <tr>
															                    <td align="center" valign="top">
															                      <img src="http://bklic.komete.it/public/images/header.jpg">
															                    </td>
															                  </tr>
															                </table>

															              </td>
															            </tr>
															            <tr>
															              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
															            </tr>
          												     	</table>

          												    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
														            <tr>
														              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
														            </tr>
														            <tr>
														              <td align="center" valign="top">

														                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
														                  <tr>
														                    <td align="left" valign="top">
														                      <p>Grazie per avere acquistato la Carta Sconto Bklic, ti ricordiamo che questa carta sconto ha durata '.date('d-m-Y',strtotime($orderDetail->expiry_date)).' mesi e può essere utilizzata in tutti i negozi affiliati Bklic. Comincia subito e vedi quali negozi sono sono affiliati a noi link affiliati  <a href="'.url('affiliates').'">Click here</a></p>
														                    </td>
														                  </tr>
														                </table>

														              </td>
														            </tr>
														            <tr>
														              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
														            </tr>
        													  </table>


        														<table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
														            <tr>
														             <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
														            </tr>
														            <tr>
														              <td align="center" valign="top">

														                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
														                  <tr>
														                      <td width="200" class="mobile" align="center" valign="top" style="padding: 0 10px 0 0">
														                        <div class="qr_code" style=" height: 200px; border:1px solid #000;padding: 15px;">
														                        	 <img style="width:100%" src="http://bklic.komete.it/public/'.$orderDetail->qr_code.'">
														                        </div>
														                      </td>
														                      <td width="400" class="mobile" align="center" valign="top" style="padding: 0 0px 0 10px;">
														                           <div class="card-box" style="height: 200px; border:1px solid #000; padding: 15px;">
														                          <table width="100%">
														                            <tr>
														                                <td>Nome</td>
														                                <td><div class="name-field" style=" border-bottom: 1px solid; height: 36px; line-height:36px;">'.$user->name.'</div></td>
														                              </tr>
														                              <tr>
														                                <td>Scadenza</td>
														                                <td><div class="name-field" style=" border-bottom: 1px solid; height: 36px; line-height:36px;">'.date('d-m-Y',strtotime($orderDetail->expiry_date)).'</div></td>
														                              </tr>
														                              <tr>
														                                <td>Numero Di Carta</td>
														                                <td><div class="name-field" style=" border-bottom: 1px solid; height: 36px; line-height:36px;">'.$orderDetail->id.'</div></td>
														                              </tr>
														                              
														                            </table>
														                        </div>
														                      </td>
														                  </tr>
														                </table>

														              </td>
														            </tr>
														            <tr>
														              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
														            </tr>
         												 </table>


												          <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
												            <tr>
												              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
												            </tr>
												            <tr>
												              <td align="center" valign="top">

												                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
												                  <tr>
												                    <td align="center" valign="top">
												                      <img src="http://bklic.komete.it/public/images/footer.jpg">
												                    </td>
												                  </tr>
												                </table>

												              </td>
												            </tr>
												            <tr>
												              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
												            </tr>
         												 </table>

       														 </td>
       													</tr>
		  											 </table>
		  										</center>
  											</span>
										</body>';

								   // $message.= 'Grazie per avere acquistato la Carta Sconto Bklic, ti ricordiamo che questa carta sconto ha durata '.date('d-m-Y',strtotime($orderDetail->expiry_date)).' mesi e può essere utilizzata in tutti i negozi affiliati Bklic. <br/>';
		         //   				 $message.= 'Comincia subito e vedi quali negozi sono sono affiliati a noi link affiliati.<br/>' ;
		         //   				 $message.= '<a href="'.url('affiliates').'">Click here</a>';			

								//echo $message;die;
		                             mail($user->email,$subject,$message,$header);

                          	  	}
	                       }

	                       Cart::destroy();
                        
                         $request->session()->flash('success', 'Il tuo pagamento è andato a buon fine');
                       return redirect('/');
                    }                  

            }else{ 

              return redirect('paypal/cancel');  

            }


		}


		public function ContactUs()
		{

			return view('contact-us');
		}


		public function TEXT($text){
        			$this->data = $text;
  			  }



    public function QRCODE($size = 200, $filename = null) {

    		//echo $this->data;die;

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
            	//echo $filename;die;
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

     public function TestQr()
     {
     	//echo 'dfdfd';die;

  		$text= 'User Name:sdfsfs' ;

  		$text.= 'User Card Expiry Date:sdfsdfsd';

  		//echo $text;die;

  	    $this->TEXT($text);

          // render QR code
        $randString =  rand();       

        $this->QRCODE(200,"$randString.png"); 

     }






		
		public function Affiliates()
		{
			$getCategories = CategoryManagement::all();
			$affiliatesProfile = User::where('users.role_type', 4)->where('dealer_post.post_id', '>', 0)->groupBy('users.id')->leftJoin('dealer_post', 'users.id', '=', 'dealer_post.affiliatese_id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->leftJoin('user_ratings', 'users.id', '=', 'user_ratings.aff_id')->select('users.*', 'dealer_post.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo', 'user_ratings.rate')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id, GROUP_CONCAT(user_ratings.rate SEPARATOR '$') as ratings")->paginate(15);

    			//echo '<pre>'; print_r($affiliatesProfile); die; 

			return view('affiliates',['getAffiliatesDetail'=>$affiliatesProfile, 'getCategories'=>$getCategories]);
		}
		
		public function affiliatesSingle($id)
		{  
			if(isset(Auth::user()->id)){
				$cardownerid = Auth::user()->id;
			}
			$userRatingsDetails = array();
			$getCategories = array();
			if(!empty($cardownerid)){
				$getCategories = CategoryManagement::all();
				$userRatingsDetails = UserRatings::where(['aff_id'=>$id,'user_id'=>$cardownerid])->leftJoin('users', 'users.id', '=', 'user_ratings.user_id')->select('user_ratings.*', 'users.profileimage', 'users.name', 'users.email')->first();
			}
			$ratingsdetail = UserRatings::where(['aff_id'=>$id])->get();
		 // echo '<pre>'; print_r($userRatingsDetails); die;
			
			$affiliatesProfile = User::where('users.role_type', 4)->where('dealer_post.affiliatese_id', $id)->groupBy('users.id')->leftJoin('dealer_post', 'users.id', '=', 'dealer_post.affiliatese_id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_post.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo','dealer_detail.video')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id")->first();
     // echo '<pre>'; print_r($affiliatesProfile); die; 

			return view('affiliates-single',['getAffiliatesDetail'=>$affiliatesProfile,'ratingsdetail'=>$ratingsdetail, 'userRatingsDetails'=>$userRatingsDetails, 'getCategories'=>$getCategories]);
		}
		
		public function affiliatesSearch(Request $request)
		{
			//DB::enableQueryLog();
			
			
			if( $request->input('category') != '' || $request->input('subcategory') != '' || $request->input('location') != '')
			{ 
				$where = array();
				 $category       =  !empty($request->input('category'))  ? $request->input('category')  : '';
				 $subcategory = !empty($request->input('subcategory'))  ? $request->input('subcategory') :'' ; 
				 $location = !empty($request->input('location'))  ? $request->input('location') :'' ; 	
				 
				 if(!empty($category)){
					$where['dealer_detail.category'] = $category;
				 }
				 if(!empty($subcategory)){
					//$where .= 'dealer_detail.sub_category=>'.$subcategory.',';
					$where['dealer_detail.sub_category'] = $subcategory;
				 }
				/*  if(!empty($location)){
					$where['users.region'] = $location;
				 } */ 

				 if(!empty($location)){
					  $adresse='';
					  $ville='';
					  $province='';
					  $pays='';
					  $address=explode(',',$location);
					   if(is_array($address) && count($address)==4)
					  {
						$adresse=!empty($address[0]) ? $address[0] : '';
						$ville=!empty($address[1]) ? $address[1] : '';
						$province=!empty($address[2]) ? $address[2] : '';
						$pays=!empty(end($address)) ? end($address) : '';	
                        $where['users.region'] = $ville;
                        $orWhere['users.region'] = $province;								
					  }
					  
					   if(is_array($address) && count($address)==3)
					  {
						$ville=!empty($address[0]) ? $address[0] : '';
						$province=!empty($address[1]) ? $address[1] : '';
						$pays=!empty(end($address)) ? end($address) : '';	
                         $where['users.region'] = $ville;	
                         $orWhere['users.region'] = $province;						 
					  }else{
					  	$orWhere['users.region'] = '';
					  }
					  
						if(is_array($address) && count($address)==2)
					  {
						$province=!empty($address[1]) ? $address[1] : '';
						$pays=!empty(end($address)) ? end($address) : '';	
                        $where['users.region'] = $ville;
                         $orWhere['users.region'] = $province;								
					  }else{
					  	$orWhere['users.region'] = '';
					  } 
					
				 }else{
					  	$orWhere['users.region'] = '';
					 } 			
				 
				 $where['users.is_deleted']='0';

				 $where['users.status']='1';

				 $where['users.role_type']='4';
				 
				
				 $affiliatesProfile = User::where($where)->orWhere($orWhere)->where('dealer_post.post_id', '>', 0)->groupBy('users.id')->leftJoin('dealer_post', 'users.id', '=', 'dealer_post.affiliatese_id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->leftJoin('user_ratings', 'users.id', '=', 'user_ratings.aff_id')->select('users.*', 'dealer_post.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo','user_ratings.rate')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id,GROUP_CONCAT(user_ratings.rate SEPARATOR '$') as ratings")->skip(0)->take(15)->get();

				//dd(DB::getQueryLog());

				 session(['searchAff' => $_GET]);
				session(['offset' => 15]);
				 

				 return view('affiliates-ajax',['getAffiliatesDetail'=>$affiliatesProfile]);

			}else{
					return redirect('/affiliates');
				}
		}
		
		public function affiliatesSearchNext(Request $request)
		{
			DB::enableQueryLog();
			
			$value = $request->session()->get('searchAff');
			$offset = $request->session()->get('offset');
			
				//echo '<pre>'; print_r($value);
			if( $value['category'] != '' || $value['subcategory'] != '' || $value['location'] != '')
			{ 
				$where = array();
				 $category       =  !empty($value['category'])  ? $value['category']  : '';
				 $subcategory = !empty($value['subcategory'])  ? $value['subcategory'] :'' ; 
				 $location = !empty($value['location'])  ? $value['location'] :'' ; 	
				 
				 if(!empty($category)){
					$where['dealer_detail.category'] = $category;
				 }
				 if(!empty($subcategory)){
					//$where .= 'dealer_detail.sub_category=>'.$subcategory.',';
					$where['dealer_detail.sub_category'] = $subcategory;
				 }
				 if(!empty($location)){
					//$where .= 'users.region=>'.$location;
					$where['users.region'] = $location;
				 }
				
				 $affiliatesProfile = User::where($where)->where('dealer_post.post_id', '>', 0)->groupBy('users.id')->leftJoin('dealer_post', 'users.id', '=', 'dealer_post.affiliatese_id')->leftJoin('dealer_images', 'users.id', '=', 'dealer_images.affiliatese_id')->leftJoin('dealer_detail', 'users.id', '=', 'dealer_detail.affiliatese_id')->select('users.*', 'dealer_post.*', 'dealer_detail.category', 'dealer_detail.sub_category', 'dealer_detail.logo')->selectRaw("GROUP_CONCAT(dealer_images.file SEPARATOR '$') as filename, GROUP_CONCAT(dealer_images.id SEPARATOR '$') as file_id")->skip($offset)->take(15)->get();
				 $offset++;
				session(['offset' => $offset]);
				 if(empty($affiliatesProfile)){
					$request->session()->forget('searchAff');
					$request->session()->forget('offset');
				 }


				 return view('affiliates-ajax',['getAffiliatesDetail'=>$affiliatesProfile]);

			}else{
					return view('affiliates-ajax',['getAffiliatesDetail'=>$affiliatesProfile]);
				}
		}
		public function affiliatesReview(Request $request, $id)
		{ 
		  if(isset($_POST['reviewbutton']))
		  {
			  if(empty($request->input('rate_id'))){
			  
				 $rules=[
                         'rate' => 'required',
                         'headline' => 'required',  
						 'review' => 'required',  						 
                      ];
  
				
            
				$this->validate($request, $rules);  
				$userratings = new UserRatings();
				$userratings->rate     =      !empty($request->input('rate'))               ?         $request->input('rate') :'';
				$userratings->headline =      !empty($request->input('headline'))           ?         $request->input('headline') : '';
				$userratings->user_id =      !empty($request->input('userid'))           ?         $request->input('userid') : '';
				$userratings->aff_id =      !empty($request->input('affid'))           ?         $request->input('affid') : '';
				
				
				$userratings->review= !empty($request->input('review'))   ?         $request->input('review') : '';
				

                   if ($userratings->save()) {
				   }
			}else{
				$updateisVerify= array(
                                    'rate'=>!empty($request->input('rate'))               ?         $request->input('rate') :'',
									'headline'=>!empty($request->input('headline'))               ?         $request->input('headline') :'',
									'user_id'=>!empty($request->input('userid'))               ?         $request->input('userid') :'',
									'aff_id'=>!empty($request->input('affid'))               ?         $request->input('affid') :'',
									'review'=>!empty($request->input('review'))               ?         $request->input('review') :''
                                     );
                UserRatings::where(['id' => $request->input('rate_id')])->update($updateisVerify);
			}
		
		  }
		  
			if(Auth::user()->role_type==3){
				
			  session(['cardownerid' => Auth::user()->id]);

			  return redirect('affiliatese/single/'.$id);
			}
		}


// cron here //

	public function CardReminderNotifcationEmail()
	{

			$getCardUser=  DB::table('checkout')
		                          ->join('order_detail', 'checkout.id', '=', 'order_detail.checkout_id')                     
		                          ->select('checkout.*', 'order_detail.product_name','order_detail.product_price','order_detail.expiry_date')		                       
		                          ->where('checkout.card_status','=','1')		                     
		                          ->groupBy('order_detail.checkout_id')                               
		                          ->get();
		          	
		      $reminders = SetReminder::where(['reminder_type' => 2])->first();

		     foreach($getCardUser as $key=> $cardValue){		     		

		     		$getdate = json_decode($reminders->reminder_date);

		     		$getExpirationDate= date('Y-m-d',strtotime($cardValue->expiry_date));


		     		$getCardUserByid = User::where(['id'=>$cardValue->user_id,'role_type'=>'3','is_deleted'=>'0','status'=>'1'])->first();

		     		//echo '<pre>';print_r($getCardUserByid);die;

		     		 $now = time();

					$your_date = strtotime($cardValue->expiry_date);

					$datediff = $your_date - $now ;

					$days =	round($datediff / (60 * 60 * 24));

					if(in_array($days, $getdate))
					{

							$subject= 'Scadenza carta';

                             $header = "From:bklic@bklic.komete.it \r\n";
                             $header.= 'MIME-Version: 1.0' . "\r\n";
                             $header.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                             $message= 'Ciao  :' .$getCardUserByid->name.'<br/>';
                             $message.='ti ricordiamo che la tua prima Carta Sconto Bklic n da te sottoscritta il giorno '.$getExpirationDate.' sarà gratis e avrà durata 30 giorni​.</br>';
                             $message.='Ciao '.$getCardUserByid->name.', ti ricordiamo che la tua Carta Sconto Bklic scadrà tra '.$getExpirationDate.' giorni.</br>';
                            // $message.='Questa è la notifica di promemoria alla data di scadenza della carta è'.$getExpirationDate.'<br/>';
                            // $message.='Si prega di acquistare una nuova carta se si desidera utilizzare la carta sconto digitale <br/>';
                            
                            mail($getCardUserByid->email,$subject,$message,$header); 
					}elseif($days > '30')
					{	
						$Checkout= Checkout::where(['id'=>$cardValue->id])->first();

						$Checkout->card_status='0';

						$Checkout->save();
					}
		     } 

	}

	public function MinimumValuePOintInMonth()
	{

			$getCommissionPoint= DB::select('select commission.user_id,sum(commission.commission_point) as total_point,commission.total_wallet_point,users.founder_bonus_point_value,users.role_type,users.total_wallet,users.user_as FROM commission join users on commission.user_id = users.id and MONTH(commission.created_at)= MONTH(CURRENT_DATE()) and commission.compv_expired="0" GROUP by commission.user_id');

			//echo '<pre>';print_r($getCommissionPoint);die;
			
		     foreach($getCommissionPoint as $key=>$val){
                
                	$getMinimumValuePoint = MinimumValuePoint::where('step',$val->user_as)->first();

                		if($val->total_point >= $getMinimumValuePoint->point)
                		{
                			$totalValue = ($val->total_wallet + $val->total_point)+$val->founder_bonus_point_value;

                			$updatedata= array('compv_expired'=>'1');
	                				DB::table('commission')	                       
				                          ->where('commission.user_id','=',$val->user_id)    
				                          ->whereMonth('commission.created_at','=',date('m'))                           
				                          ->update($updatedata);

			                    User::where(['id'=>$val->user_id])->update(array('total_wallet'=>$totalValue,'founder_bonus_point_value'=>'0')) ;                     			
	                			 

                		}else{

                				$updatedata= array('compv_expired'=>'1');

                				DB::table('commission')	                       
			                          ->where('commission.user_id','=',$val->user_id)    
			                          ->whereMonth('commission.created_at','=',date('m'))                           
			                          ->update($updatedata);
                		}
		     }                             

	}



	// end here //

		public function WhoweAre()
		{
			return view('who_we_are');

		}

		public function Opportunita()
		{
			return view('opportunity');

		}

		public function News()
		{
			$getNews= NewCms::orderBy('id', 'ASC')->get();
			//echo '<pre>';print_r($getNews);die;
			return view('news',['getnews'=>$getNews]);
		}

		public function Meeting()
		{
			$getNews= CalendarManagement::orderBy('id', 'desc')->get();
			//echo '<pre>';print_r($getNews);die;
			return view('meeting',['getnews'=>$getNews]);
		}


		public function MeetingDetail($id)
		{
			
			$getNewsDetail= CalendarManagement::where(['id'=>$id])->first();	
			return view('meeting_detail',['getNewsDetail'=>$getNewsDetail]);
		}


		public function NewsDetail($id)
		{

			$getNewsDetail= NewCms::where(['id'=>$id])->first();			
			return view('news_detail',['getNewsDetail'=>$getNewsDetail]);
		}



		public function Mission()
		{
			return view('mission');

		}


		public function CareerAndGains()
		{

				return view('career-n-gains');
		}


		public function AffiliatiGratis()
		{

			$getVideo = CmsPages::where(['page_title'=>'1'])->get();
			//echo '<pre>';print_r($getVideo);die;		

			return view('affiliati-gratis',['getVideo'=>$getVideo]);
		}

		public function LavoraConNoi()
		{

			$getVideo = CmsPages::where(['page_title'=>'2'])->get();		

			return view('lavora-con-noi',['getVideo'=>$getVideo]);

			
		}

		public function BklicCard()
		{

			$getVideo = CmsPages::where(['page_title'=>'3'])->get();		

			
			$getCard = 	DB::table('upload-card')
			                ->limit(4)
			                ->get();

			return view('bklic-card',['getCard'=>$getCard,'getVideo'=>$getVideo]);
		}


		public function TermCondition()
		{

			return view('term-condition');
		}

		public function PrivacyPoilcy()
		{
			return view('privacy-policy');
		}

		public function ListingCardDetail()
		{

			$getCard = 	UploadCard::all();

			return view('listing-cards',['getCard'=>$getCard]);
			
		}
		
		public function Nuova()
		{
			return view('nuova');
		}

}
