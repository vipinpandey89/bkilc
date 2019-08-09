<!DOCTYPE html>
<html xmlns="">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bklic</title>

    <link href="{{URL::asset('front/assets/css/bootstrap.css')}}" rel="stylesheet" />
    
    <link href="{{URL::asset('front/assets/css/font-awesome.css')}}" rel="stylesheet" />
   
    <link href="{{URL::asset('front/assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />

    <link href="{{URL::asset('front/assets/css/custom.css')}}" rel="stylesheet" />
    
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href="{{URL::asset('front/assets/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />


   <link href="{{URL::asset('js/parsley.css')}}" rel="stylesheet">

</head>
<body>
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
                    
           
                    <ul class="nav navbar-nav navbar-right user_profile_top">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                             <li><a href="{{ url('user-login') }}">Login</a></li>
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
                                        <a href="{{url('dealerprofile')}}">Profilo</a>

                                    </li>
                                  </ul>
                            </li>
                        @endif
                    </ul>
                </div>
</div>
        </nav>    
        
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">
                 <!--<li class="text-center">

                    @if(!empty(Auth::user()->profileimage))
                   <?php  $profileImage= Auth::user()->profileimage; ?>
                    <img src="{{url('/images/profile_images/'.$profileImage)}}" class="user-image img-responsive"/>
                    @else
                     <img src="{{URL::asset('front/assets/img/find_user.png')}}" class="user-image img-responsive"/>
                     @endif


                  </li>-->
                
                    
                   <!--<li {{ Request::path() == 'dealer' ? 'class=active' : '' }}>
                        <a   href="{{url('dealer')}}"><i class="fa fa-dashboard"></i> Home</a>
                  </li>-->
                   @if(Auth::user()->is_profile_complete==1)
                 
                  
                   <li {{ Request::path() == 'dealer-post' ? 'class=active' : '' }}>
                        <a  href="{{url('dealer-post')}}"><i class="fa fa-info-circle" aria-hidden="true"></i>
                  Pagina pubblica</a>
                  </li>
                   <!--<li>
                        <a  href="{{url('page_builder')}}"><i class="fa fa-desktop fa-3x"></i> Page Builder</a>

                  </li> -->
				  
				  <li {{ Request::path() == 'dealersubscription' ? 'class=active' : '' }}>
                        <a  href="{{url('dealersubscription')}}"><i class="fa fa-desktop"></i> Sottoscrizione</a>

                  </li> 
				  
				  
				  <li {{ Request::path() == 'aff-transaction' ? 'class=active' : '' }}>
                        <a  href="{{url('aff-transaction')}}"><i class="fa fa-money" aria-hidden="true"></i>
        Transazioni</a>

                  </li> 
				  @endif
				  
				  
				  
                  
                  

                </ul>
               
            </div>
            
        </nav>  
       
         @yield('content')
     </div>
     
	 <style>
	 .active a{

    background: #00ade9 !important;
    outline: 0;

}
	 </style>
    
     <script src="{{URL::asset('front/assets/js/jquery-1.10.2.js')}}"></script>
    <script src="{{URL::asset('front/assets/js/bootstrap.min.js')}}"></script>
  
    <script src="{{URL::asset('front/assets/js/jquery.metisMenu.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ URL::asset('js/parsley.js') }}"></script>
<script src="{{ URL::asset('js/parsley.min.js') }}"></script>

 <script src="{{URL::asset('front/assets/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{URl::asset('front/assets/js/dataTables/dataTables.bootstrap.js')}}"></script>


</body>
</html>
