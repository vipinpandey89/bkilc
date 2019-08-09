<!DOCTYPE HTML>
<html>
<head>
<title>Bklic</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

<link href="{{URL::asset('admin/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />


<link href="{{URL::asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />


<link href="{{URL::asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 


<link href='{{URL::asset('admin/css/SidebarNav.min.css')}}' media='all' rel='stylesheet' type='text/css'/>

<script src="{{URL::asset('admin/js/jquery-1.11.1.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>





<!-- calender section-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<!-- end here -->




<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

<script src="{{URL::asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{URL::asset('admin/js/custom.js')}}"></script>
<link href="{{URL::asset('admin/css/custom.css')}}" rel="stylesheet">

<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>


  
</head> 
<body class="cbp-spmenu-push">
  <div class="main-content">
  <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="{{url('administrator/dashboard')}}"><img src="{{url::asset('logo-bklic_mod.png')}}" style="width:118px"></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
            
              <li class="treeview">
                <a href="{{url('administrator/dashboard')}}">
                <i class="fa fa-dribbble"></i> <span>Bacheca</span>
                </a>
              </li>
        <li class="treeview">
                <a href="#">
               <i class="fa fa-share-alt-square" aria-hidden="true"></i>
                <span>Promoter</span>
                <i class="fa fa-angle-left pull-down"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('administrator/userlist')}}"><i class="fa fa-angle-right"></i> Lista</a></li>
                  <!--<li><a href="{{url('administrator/wallet-user-list')}}"><i class="fa fa-angle-right"></i> Rete</a></li>-->
                  <li><a href="{{url('administrator/wallet-livello-list')}}"><i class="fa fa-angle-right"></i>Piano marketing</a></li>
                  <li><a href="{{url('administrator/minimum-value-point')}}"><i class="fa fa-angle-right"></i>Gestione pacchetti</a></li>
                   <li><a href="{{url('administrator/convertion')}}"><i class="fa fa-angle-right"></i>Conversioni</a></li>
                   <li><a href="{{url('administrator/pv-generation-convertion')}}"><i class="fa fa-angle-right"></i>Generazione PV</a></li>
                  <li><a href="{{url('administrator/founder-list')}}"><i class="fa fa-angle-right"></i>Gestione bonus</a></li>

                </ul>
              </li>


               <li class="treeview">
                <a href="#">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Affiliati</span>
                <i class="fa fa-angle-left pull-down"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('administrator/affiliates-user')}}"><i class="fa fa-angle-right"></i>Lista</a></li>
                  <li><a href="{{url('administrator/subscription-affiliates')}}"><i class="fa fa-angle-right"></i> Sottoscrizioni</a></li>
                  <li><a href="{{url('administrator/category-management')}}"><i class="fa fa-angle-right"></i> Gestione Categorie</a></li>   
                  <li><a href="{{url('administrator/subscription-plan')}}"><i class="fa fa-angle-right"></i> Piani di abbonamento</a></li>          
                </ul>
              </li>



             <li class="treeview">
                <a href="#">
             <i class="far fa-address-card"></i>
                <span>Utenti card</span>
                <i class="fa fa-angle-left pull-down"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('administrator/cardsellerusers')}}"><i class="fa fa-angle-right"></i> Lista</a></li>
                  <li><a href="{{url('administrator/list-card')}}"><i class="fa fa-angle-right"></i> Carica la carta digitale</a></li>
                  <li><a href="{{url('administrator/card-user-manage')}}"><i class="fa fa-angle-right"></i> Gestione Carte</a></li>
                 
                </ul>
              </li>

               <li class="treeview">

                 <a href="{{url('administrator/set-notification')}}"> <i class="fa fa-bell-o" aria-hidden="true"></i><span>Notifiche</span></a>               
              </li>



               <li class="treeview">
                <a href="#">
               <i class='fas fa-wallet'></i>
                <span>Portafoglio</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                        
                     <li><a href="{{url('administrator/payment-history')}}"><i class="fa fa-angle-right"></i>Lista dei Pagamenti </a></li>
                  <li><a href="{{url('administrator/bonus-management')}}"><i class="fa fa-angle-right"></i> Gestione Bonus </a></li>
                  <li class="treeview"> <a href="{{url('administrator/user-conversion')}}"> <i class="fa fa-angle-right"></i><span>Richiesta provvigioni</span></a>
                 
                </ul>
              </li>

              <li class="treeview"> <a href="{{url('administrator/elearningdocuments')}}"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Formazione</span></a>
                
              </li>


               <li class="treeview">
                <a href="#">
                <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                <span>News ed Eventi</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                 
                    <li><a href="{{url('administrator/calendar-management')}}"><i class="fa fa-angle-right"></i>Gestione Calendario </a></li>
                     <li><a href="{{url('administrator/publish-newsevent')}}"><i class="fa fa-angle-right"></i>Pubblica Eventi</a></li>
                     <li><a href="{{url('administrator/publish-news')}}"><i class="fa fa-angle-right"></i>Pubblica News</a></li>

                    <li><a href="{{url('administrator/video-pages')}}"><i class="fa fa-angle-right"></i> Video</a></li>
                  <li><a href="{{url('administrator/company-list')}}"><i class="fa fa-angle-right"></i> Modello aziendale</a></li>
                </ul>
              </li>

          
                
              </li>

                          
            </ul>
          </div>
  
      </nav>
    </aside>
  </div>
  
    <div class="sticky-header header-section ">
      
      <div class="header-right"> 
<div class="bell_icon">
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>           

             <div class="notification">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!--<i class="fa fa-bell-o" aria-hidden="true"></i>--></a>
                                <ul class="dropdown-menu">
                                  <?php $notificationdetail= Helper::notificationDetailForAdmin();
                                  ?>
                                    @if(!empty($notificationdetail) && count($notificationdetail)> 0)
                                      @foreach($notificationdetail as $notval )
                                                      <li class="unread"><a href="{{ url('administrator/notification').'/'.$notval->id}}">{{$notval->message}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></li>
                                      @endforeach
                                    @else
                                    <li class="read"><a href="javascript:void(0);">nessuna notifica</a></li>  
                                    @endif
                                <!--       <a href="">View All</a> -->
                                </ul>

                            </li>

                        </ul>

                    </div>
                    </div>        
        
        <div class="profile_details">   
          <ul>
            <li class="dropdown profile_details_drop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <div class="profile_img"> 
                  <span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
                  <div class="user-name">
                    <p>Nome admin</p>
                    <span>Amministratore</span>
                  </div>
                  <i class="fa fa-angle-down lnr"></i>
                  <i class="fa fa-angle-up lnr"></i>
                  <div class="clearfix"></div>  
                </div>  
              </a>
              <ul class="dropdown-menu drp-mnu">
               <!-- <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> -->
               <!-- <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li> -->
                <li> <a href="{{url('administrator/adminprofile')}}"><i class="fa fa-suitcase"></i> Profile</a> </li>
               
                <li> <a href="{{url('administrator/adminlogout')}}"><i class="fa fa-sign-out"></i> Esci</a> </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="clearfix"> </div>       
      </div>
      <div class="clearfix"> </div> 
    </div>
    
         @yield('content')

  </div>  
<script src="{{URL::asset('admin/js/classie.js')}}"></script>
<script>
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;
        
      showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
      };
      

      function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
          classie.toggle( showLeftPush, 'disabled' );
        }
      }
    </script>

 <script src='{{URL::asset('admin/js/SidebarNav.min.js')}}' type='text/javascript'></script>
 <script>
$('.sidebar-menu').SidebarNav();  
/** add active class and stay opened when selected */
var url = window.location;
// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
   return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
   return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
 </script>
  <script src="{{URL::asset('admin/js/bootstrap.js')}}"> </script> 
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
</body>
</html>