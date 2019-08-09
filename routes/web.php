<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// website route here//

Route::get('/','SiteController@index');


Route::get('chi-siamo','SiteController@WhoweAre');

Route::get('opportunita','SiteController@Opportunita');

Route::get('news','SiteController@News');

Route::get('meeting','SiteController@Meeting');

Route::get('card-list','SiteController@ListingCardDetail');

Route::get('mission','SiteController@Mission');

Route::get('career-and-gains','SiteController@CareerAndGains');

Route::get('affiliati-gratis','SiteController@AffiliatiGratis');

Route::get('lavora-con-noi','SiteController@LavoraConNoi');

Route::get('bklic-card','SiteController@BklicCard');


Route::get('term-condition','SiteController@TermCondition');

Route::get('privacy-policy','SiteController@PrivacyPoilcy');

Route::get('nuova','SiteController@Nuova');

Route::get('news-detail/{id}','SiteController@NewsDetail');

Route::get('meeting-detail/{id}','SiteController@MeetingDetail');


Route::get('/contract-letter/pdf','UserController@ExportPdf');

Route::get('/contract-card/pdf','UserController@ExportCardPdf');



Route::get('contact-us','SiteController@ContactUs');

Route::match(['get','post'],'card-detail/{id}','SiteController@CardDetail');


Route::post('cart-add','SiteController@CartAdd');

Route::get('cart','SiteController@ShowCart');

Route::get('remove-cart/{id}','SiteController@RemoveCart');

Route::match(['get','post'],'affiliates','SiteController@Affiliates');

Route::match(['get','post'],'affiliatese/single/{id}','SiteController@affiliatesSingle');

Route::match(['get','post'],'affiliates/search','SiteController@affiliatesSearch');

Route::match(['get','post'],'affiliates/affiliates-search-next','SiteController@affiliatesSearchNext');

Route::match(['get','post'],'/get-affiliatese-sucat','VendorController@getAffiliateseSucat'); 

/* cron functionality start here */
Route::match(['get','post'],'/send-upgrade-email','VendorController@sendUpgradeEmail1');

Route::get('carduser-expirationmail','SiteController@CardReminderNotifcationEmail');


Route::get('minimum-value-month','SiteController@MinimumValuePOintInMonth');

/* cron functionality end here */





// front routes //



Route::get('qr-code','SiteController@TestQr');


Route::match(['get','post'],'/user-register','HomeController@register');

Route::any('/user-login/{token?}','HomeController@userLogin');

Route::match(['get','post'],'user-forgotpassword','HomeController@ForgotPassword');

Route::any('user-resetpassword/{token}','HomeController@ResetPassword');

Route::get('members-register','HomeController@MemberRegister');


Route::get('members-login','HomeController@MemberLogin');


Route::match(['get','post'],'/affiliatese-register','VendorController@register');

Route::any('/affiliatese-login/{token?}','VendorController@login');


Route::match(['get','post'],'checkout','SiteController@Checkout');







// pay pal route//

Route::group(['prefix'=>'paypal'],function(){

Route::match(['get','post'],'cancel','UserController@CancelStatus');	

Route::match(['get','post'],'success/{tx}','UserController@SuccessStatus');

Route::match(['get','post'],'ipnstatus','UserController@Ipnstatus');

Route::match(['get','post'],'getresponse','UserController@GetPaymentResponse');


Route::match(['get','post'],'getupgradelevel','UserController@GetUpgradeLevelPaypalResponse');


Route::match(['get','post'],'getdigitalcard','UserController@GetDigitCardPaymentResponce');

Route::match(['get','post'],'dealer-cancel','VendorController@CancelStatus');	

Route::match(['get','post'],'dealer-getupgradecommission','VendorController@GetUpgradeCommission');

Route::match(['get','post'],'getCheckoutDetail','SiteController@getCheckoutDetail');

Route::match(['get','post'],'become-founder-response','UserController@BecomeFounderResponse');
Route::match(['get','post'],'getdocument-response','UserController@GetDocumentResponse');


});

// end here//



Route::group(['middleware'=>['auth']],function(){

Route::get('/test-qr','SiteController@TestQr');	

Route::get('/home', 'HomeController@index');

Route::match(['get','post'],'/userprofile','UserController@UserProfile');

Route::get('socialProfile','UserController@socialProfile');

Route::get('user-network','UserController@UserNetwork');

Route::get('card-users','UserController@CardUser');

Route::get('invoice-detail/{id}','UserController@InvoiceDetail');



Route::match(['get','post'],'user-wallet-add','UserController@walletUser');

Route::match(['get','post'],'/user-wallet','UserController@walletList');

Route::match(['get','post'],'viewdoc/{id}','UserController@viewDoc');

Route::get('/user-documents','UserController@userDocuments');

Route::post('/addsocial','UserController@addSocial');

Route::match(['get','post'],'upgrade-level','UserController@UpgradeLevel');

Route::match(['get','post'],'become-founder','UserController@BecomeFounder');

Route::match(['get','post'],'order-detail','UserController@OrderDetail');

Route::match(['get','post'],'user-commission','UserController@UserCommission');


Route::get('child-detail/{id}','UserController@ajaxChildDetail');


Route::get('promoter-affiliati','UserController@PromoterAffiliates');

Route::get('new-event-promoter','UserController@NewsEventPromoter');


Route::get('payment-detail','UserController@PaymentDetail');

Route::get('contract-card','UserController@CantractCard');


Route::match(['get','post'],'upload-letter/{id}','UserController@UploadContractLetter');




/*dealear section*/
Route::get('/dealer', 'VendorController@index');


Route::match(['get','post'],'/get-post','VendorController@listPost');

Route::match(['get','post'],'/dealer-post','VendorController@addPost');

Route::match(['get','post'],'/addDealerPost','VendorController@addPost');

Route::match(['get','post'],'/editdealerpost/{id}','VendorController@editPost');

Route::match(['get','post'],'/dealerprofile','VendorController@DealerProfile');

Route::match(['get','post'],'/page_builder','VendorController@pageBuilder');

Route::match(['get','post'],'/dealersubscription','VendorController@dealerSubscription');

Route::match(['get','post'],'/aff-transaction','VendorController@affTransaction');

Route::match(['get','post'],'/viewcardowner/{id}','VendorController@viewCardOwner');

Route::match(['get','post'],'/deleteimage/{id}','VendorController@deleteImage');

Route::match(['get','post'],'affiliates-review/{post_id}','SiteController@affiliatesReview');

Route::match(['get','post'],'/get-affiliatese-sucat1','VendorController@getAffiliateseSucat1');

Route::match(['get','post'],'/cancelpayment','VendorController@cancelPayment');


Route::get('read-notification/{id?}','UserController@ReadNotification');

/* end here*/

});




Auth::routes();


// end here //














// admin routes//

Route::match(['get', 'post'],'administrator','AdministratorController@index');


// check access user IsAdmin //
Route::group(['prefix' => 'administrator', 'middleware' => ['auth','admin']], function() {


Route::get('dashboard','AdministratorController@dashboard');

Route::match(['get','post'],'adminprofile','AdministratorController@AdminProfile');


Route::get('userlist','AdministratorController@UserList');

Route::get('userdetail/{id}','AdministratorController@UserDetail');

Route::get('adduser','AdministratorController@addUser');

Route::match(['get','post'],'edituser/{id}','AdministratorController@edituser');

Route::get('deleteuser/{id}','AdministratorController@deleteuser');

Route::get('blockuser/{id}','AdministratorController@blockUser');

Route::get('wallet-user-list','AdministratorController@walletUserList');	

Route::get('wallet-livello-list','AdministratorController@walletLivelloList');

Route::get('founder-list','AdministratorController@founderList');


Route::match(['get','post'],'editlevel/{id}','AdministratorController@EditLevel');

Route::match(['get','post'],'levelajax/{id}','AdministratorController@LevelAjax');


Route::get('paypalsetting','AdministratorController@PaypalSetting');

Route::match(['get','post'],'edit-paypal-setting/{id}','AdministratorController@EditPaypalSetting');

Route::get('video-pages','AdministratorController@CmsPages');

Route::match(['get','post'],'addcms','AdministratorController@AddCmsPages');

Route::match(['get','post'],'editcms/{id}','AdministratorController@EditCms');

Route::get('deletepage/{id}','AdministratorController@DeletePage');

Route::match(['get','post'],'addElearningdocs','AdministratorController@addElearningdocs');

// Route::match(['get','post'],'edit-elearning/{id}','AdministratorController@EditElearning');

Route::get('elearningdocuments','AdministratorController@elearningDocument');

Route::get('viewdoc/{id}','AdministratorController@viewDoc');

Route::get('deleteelearning/{id}','AdministratorController@deleteElearning');



Route::get('cardsellerusers','AdministratorController@cardsellerusersList');

Route::match(['get','post'],'addcardselleruser','AdministratorController@addcardsellerUser');

Route::match(['get','post'],'editcardselleruser/{id}','AdministratorController@editcardselleruser');


Route::get('minimum-value-point','AdministratorController@MiniumValuePoint');	

Route::get('set-level-founder','AdministratorController@SetLevelFounder');



Route::match(['get','post'],'edit-value-point/{id}','AdministratorController@EditValuePoint');

Route::get('payment-history','AdministratorController@PaymentHistory');

Route::get('bonus-management','AdministratorController@BonusManagement');

Route::match(['get','post'],'editbonus/{id}','AdministratorController@EditBonus');




Route::get('list-card','AdministratorController@ListCard');

Route::match(['get','post'],'add-card','AdministratorController@UploadCard');

Route::match(['get','post'],'edit-card/{id}','AdministratorController@EditCard');

Route::get('delete-card/{id}','AdministratorController@deleteCard');

Route::get('getuser-popup/{id}','AdministratorController@ajaxUserPopup');

Route::get('set-founder','AdministratorController@setFounder');

Route::get('set-founder-bonus','AdministratorController@setFounderBonus');


Route::get('affiliates-user','AdministratorController@AffiliatesUser');


Route::get('category-management','AdministratorController@CategoryManagement');

Route::match(['get','post'],'addsubscriptionplan','AdministratorController@AddSubscriptionPlan');

Route::match(['get','post'],'editsubscriptionplan/{id}','AdministratorController@EditSubscriptionPlan');

Route::get('deletesubscriptionplan/{id}','AdministratorController@DeleteSubscriptionPlan');

Route::get('subscription-plan','AdministratorController@SubscriptionPlan');

Route::match(['get','post'],'addcategory','AdministratorController@AddCategory');

Route::match(['get','post'],'editcategory/{id}','AdministratorController@EditCategory');

Route::get('deletecategory/{id}','AdministratorController@DeleteCategory');

Route::get('subscription-affiliates','AdministratorController@SubscriptionAffiliates');


Route::get('convertion','AdministratorController@Convertion');

Route::get('pv-generation-convertion','AdministratorController@PvGenerationConvertion');

Route::match(['get','post'],'addconvertion','AdministratorController@AddConvertion');

Route::match(['get','post'],'edit-convertion/{id}','AdministratorController@EditConvertion');

Route::match(['get','post'],'edit-pv-generation/{id}','AdministratorController@EditPvGenerationConvertion');

Route::get('deleteconvertion/{id}','AdministratorController@DeleteConvertion');


Route::get('card-user-manage','AdministratorController@CardUserManagement');


Route::get('publish-newsevent','AdministratorController@PublishNewsEvent');

Route::get('publish-news','AdministratorController@ListNewsPublic');

Route::match(['get','post'],'add-news','AdministratorController@PublishNews');

Route::match(['get','post'],'edit-news/{id}','AdministratorController@EditNews');

Route::get('delete-news/{id}','AdministratorController@DeleteNews');

Route::get('calendar-management','AdministratorController@CalendarManagement');

Route::get('ajaxcalender','AdministratorController@ajaxCalender');

Route::post('upload-calender','AdministratorController@UploadCalendar');

Route::get('getevent/{id}','AdministratorController@getEvent');

Route::get('delete-event/{id}','AdministratorController@DeleteEvent');

Route::get('set-notification','AdministratorController@SetNotification');

Route::match(['get','post'],'add-notification','AdministratorController@AddNotification');

Route::match(['get','post'],'edit-notification/{id}','AdministratorController@EditNotification');

Route::match(['get','post'],'update-userprofile','AdministratorController@EditUserProfile');

Route::get('adminlogout','AdministratorController@adminlogout');

Route::get('user-conversion','AdministratorController@UserConversion');

Route::get('coversion-sendconfrimation/{id}','AdministratorController@ConversionSendConfirmation');

Route::get('notification/{id?}','AdministratorController@Notification');

Route::match(['get','post'],'editAff/{id?}','AdministratorController@editAff');

Route::match(['get','post'],'add-founder-bonus','AdministratorController@addBonus');

Route::get('company-list','AdministratorController@CompanyList');

Route::match(['get','post'],'addcompany','AdministratorController@AddCompany');

Route::match(['get','post'],'edit-company/{id}','AdministratorController@EditCompany');

Route::get('delete-company/{id}','AdministratorController@DeleteCompany');

Route::get('getdocument-popup/{id}','AdministratorController@GetDocumentPopup');

});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});



