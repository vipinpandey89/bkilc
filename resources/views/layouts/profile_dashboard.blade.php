<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$userAs= Auth::user()->user_as;
$getAsPerlevelFounder =  Helper::getUpgradeValuePoint($userAs); 
?>
<!DOCTYPE html>

<html xmlns="">

<head>

      <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Bklic</title>



    <link href="{{URL::asset('front/assets/css/bootstrap.css')}}" rel="stylesheet" />

    

    <link href="{{URL::asset('front/assets/css/font-awesome.css')}}" rel="stylesheet" />

   

    <link href="{{URL::asset('front/assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />



    <link href="{{URL::asset('front/assets/css/custom.css?s=1')}}" rel="stylesheet" />



   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />



   <link href="{{URL::asset('front/assets/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />





   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

   <link href="{{URL::asset('js/parsley.css')}}" rel="stylesheet">

   <link href="{{URL::asset('front/assets/css/jquery.fancybox-1.3.4.css')}}" rel="stylesheet" />

</head>

<body>

    <div class="profile-sidebar">
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="{{url('/')}}"><img src="{{URL::asset('images/logo.png')}}"/></a> 

            </div>

  <div style="color: white;

padding: 15px 50px 5px 50px;

float: right;

font-size: 16px;"> <!--Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> -->



        <div class="collapse navbar-collapse" id="app-navbar-collapse"> 

                <div class="notification">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!--<i class="fa fa-bell-o" aria-hidden="true"></i>--></a>
                                <ul class="dropdown-menu">
                                  <?php $notificationdetail= Helper::notificationDetail(Auth::user()->id);
                                  ?>
                                    @if(!empty($notificationdetail) && count($notificationdetail)> 0)
                                      @foreach($notificationdetail as $notval )
                                                      <li class="unread"><a href="{{ url('read-notification').'/'.$notval->id}}">{{$notval->message}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
                                      @endforeach
                                    @else
                                    <li class="read"><a href="javascript:void(0);">nessuna notifica</a></li>  
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>  

                    @if(Auth::user()->role_type=='2')                   

                        <div class="user_wallet_icon">

                        <a  href="{{url('user-wallet')}}"><i class="fa fa-desktop"></i></a>

                       </div>                   

                    @endif
                         &nbsp; &nbsp; &nbsp;                   

                    <ul class="nav navbar-nav navbar-right user_profile_top">                        

                        @if (Auth::guest())

                             <li><a href="{{ url('members-login') }}">Login</a></li>

                            <li><a href="{{ url('members-register') }}">Registrazione</a></li>

                        @else

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle btn btn-danger square-btn-adjust" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">

                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a href="{{ route('logout') }}"

                                            onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                            Esci

                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                            {{ csrf_field() }}

                                        </form>
                                    </li>
                                    <li>

                                        <a href="{{url('userprofile')}}">Profilo</a>

                                    </li>

                                    <!--<li>
                                        <a href="{{url('socialProfile')}}">Social</a>

                                    </li>-->

                                </ul>

                            </li>

                        @endif

                    </ul>

                </div>

</div>
        </nav>           
          
          <div class="profile-main-section">
          <div class="profile-sidebar-title"><i class="fa fa-user" aria-hidden="true"></i> Impostazioni account</div>
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">

              <ul class="nav" id="main-menu">

                   <li>
                        <a class="<?php echo($actual_link == url('home'))?'active-menu':'';?>"  href="{{url('home')}}"><i class="fa fa-dashboard"></i> Dashboard <i class="fa fa-angle-down dd-aerow"></i></a>

                  </li>               


                  <li>
                        <a  href="{{url('userprofile')}}" class="<?php echo($actual_link == url('userprofile'))?'active-menu':'';?>"><i class="fa fa-user" aria-hidden="true"></i> Dati personali</a>

                  </li>           

                      <li><a href="{{url('payment-detail')}}" class="<?php echo($actual_link == url('payment-detail'))?'active-menu':'';?>"><i class="fa fa-cc-paypal" aria-hidden="true"></i> Dettagli di pagamento</a></li>

                      <?php 
                     

                  if(Auth::user()->is_profile_complete=='1' && Auth::user()->role_type=='2'){?>

                      <li><a href="{{url('contract-card')}}" class="<?php echo($actual_link == url('contract-card'))?'active-menu':'';?>"><i class="fa fa-credit-card-alt"></i> Contratti & Card</a></li>                     
                       


                     <li><a href="{{url('upgrade-level')}}" class="<?php echo($actual_link == url('upgrade-level'))?'active-menu':'';?>"><i class="fa fa-calendar"></i> Upgrade</a></li>

                       <?php if($getAsPerlevelFounder->level_founder_status=='1' && Auth::user()->founder=='0'){?>
                      <li><a href="{{url('become-founder')}}" class="<?php echo($actual_link == url('become-founder'))?'active-menu':'';?>"><i class="fa fa-calendar"></i>Diventare founder</a></li>

                      <?php } }?>

                                    

                   

                </ul>             

            </div>            

        </nav>         

         @yield('content')

     </div>  
    </div>
     <script src="{{URL::asset('front/assets/js/jquery-1.10.2.js')}}"></script>
	 
	 <script src="{{URL::asset('front/assets/js/jquery.fancybox-1.3.4.js')}}"></script>
		<script>
			jQuery.support.cors = true;
			jQuery(document).ready(function() {
			

			/* This is basic - uses default settings */

			jQuery("a#example4").fancybox({  

			'type' : 'image'});
			
			jQuery("a#video").fancybox({  

			'type' : 'iframe',
			
			
			});
			
			jQuery("a#doc").fancybox({  

			'type' : 'iframe',
			
			
			});
			

			/* Using custom settings */


			});
		</script>



    <script src="{{URL::asset('front/assets/js/bootstrap.min.js')}}"></script>

  

    <script src="{{URL::asset('front/assets/js/jquery.metisMenu.js')}}"></script>



    <!--  <script src="{{URL::asset('front/assets/js/morris/morris.js')}}"></script>-->



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->



<script src="{{ URL::asset('js/parsley.js') }}"></script>



<script src="{{ URL::asset('js/parsley.min.js') }}"></script>



 <script src="{{URL::asset('front/assets/js/dataTables/jquery.dataTables.js')}}"></script>



<script src="{{URl::asset('front/assets/js/dataTables/dataTables.bootstrap.js')}}"></script>



  <script src="{{URL::asset('front/assets/js/custom.js')}}"></script>





  





</body>

</html>

