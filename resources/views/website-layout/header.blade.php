<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html>
<head>
<title>Bklic</title>
<link href="{{URL::asset('website/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<?php $current_url = Request::url(); ?>
<?php $filename = Request::segment(1);
if(($filename == 'affiliatese') || ($filename == 'nuova')){
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
<script src="{{url('website/js/owl.carousel.min.js')}}"> </script>
<?php }else{ ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="{{URL::asset('website/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />  
<link href="{{URL::asset('website/css/custome.css')}}" rel="stylesheet" type="text/css" media="all" />  

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script src="{{URl::asset('website/js/simpleCart.min.js')}}"> </script>

<link href="{{URL::asset('website/css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{URL::asset('website/js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="{{URL::asset('website/scripts/jquery.rateit.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('website/scripts/jquery.rateit.min.js')}}"></script>
<link rel="stylesheet" href="{{URL::asset('website/scripts/rateit.css')}}">

<link href="{{URL::asset('website/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css" media="all" />

<link href="{{URL::asset('website/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>
<body> 
   

<header id="header">
 <nav class="navbar navbar-default custom_navbar" id="nav_custom">
  <div class="container-fluid">
    <div class="navbar-header">

      
      <a href="#off-canvas" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
          <div class="navbar-brand logo"><a href="{{url('/')}}"><img src="{{url('website/images/logo.png')}}" alt=""></a></div>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
            <li class="<?php echo($actual_link == url('/').'/')?'active':'';?>"><a href="{{url('/')}}">HOME</a></li>
            <li class="dropdown <?php echo($actual_link == url('chi-siamo') || $actual_link == url('mission'))?'active':'';?>">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chi siamo</a>
              <ul class="dropdown-menu dropdown-menu-left">
                <li><a href="{{url('chi-siamo')}}">L’azienda</a></li>
                <li><a href="{{url('mission')}}">Mission</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo($actual_link == url('opportunita') || $actual_link == url('career-and-gains'))?'active':'';?>">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opportunità </a>
              <ul class="dropdown-menu dropdown-menu-left">
                <li><a href="{{url('opportunita')}}">Cos’è Bklic</a></li>
                <li><a href="{{url('career-and-gains')}}">Carriera e guadagni</a></li>
              </ul>
            </li>
             <!-- <li class="<?php //echo($actual_link == url('card-list'))?'active':'';?>"><a href="{{url('card-list')}}">Card</a></li> -->
             <li class="<?php echo($actual_link == url('bklic-card'))?'active':'';?>"><a href="{{url('bklic-card')}}">Card</a></li>
            <li class="<?php echo($actual_link == url('news'))?'active':'';?>"><a href="{{url('news')}}">News</a></li>
            <li class="<?php echo($actual_link == url('meeting'))?'active':'';?>"><a href="{{url('meeting')}}">Meeting</a></li>
            <li class="<?php echo($actual_link == url('contact-us'))?'active':'';?>"><a href="{{url('contact-us')}}">Contatti</a></li>
            <li class="<?php echo($actual_link == url('affiliates'))?'active':'';?>"><a href="{{url('affiliates')}}">Affiliati</a></li>
			<li class="<?php echo($actual_link == url('nuova'))?'active':'';?>"><a href="{{url('nuova')}}">nuova</a></li>

              @if(Auth::guest())
                <li>
                  <a href="{{url('members-register')}}" class="dropdown-toggle nav-reg" >Registrati</a>
                 <!-- <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)">Diventa Promoter</a></li>
                  </ul>-->
                </li>

                 <li>
                     <a href="{{url('members-login')}}" class="dropdown-toggle nav-log">Login</a>

                  </li>
                 @else
                      
                        <?php if(Auth::user()->role_type=='1')
                       {?>
                 <li class="top_link"><a href="{{url('/administrator/dashboard')}}">Dashboard</a></li>
                       <?php }elseif(Auth::user()->role_type=='2'){?>
                     <li class="top_link"><a href="{{url('/home')}}"> {{ Auth::user()->name }}</a></li>
                        <?php }elseif(Auth::user()->role_type=='4'){?>
                             <li class="top_link"><a href="{{url('/dealer')}}"> {{ Auth::user()->name }}</a></li>
                         <?php }?>
                     <li class="top_link">
                          <a href="{{ route('logout') }}"

                                            onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                            Esci

                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                            {{ csrf_field() }}

                                        </form>
                        </li>
                @endif           

          </ul>
    </div>
  </div>
</nav>



 </header>

      @yield('content')



<div class="footer">
   <div class="container-fluid">
       <div class="ftr-grids">
           <div class="col-md-3 ftr-grid footer-menu">
            <ul>
                <li><a href="{{url('members-register')}}">Diventa Promoter</a></li>
                <li><a href="{{url('members-login')}}">Login</a></li>
               <li><a href="{{url('term-condition')}}">Termini e condizioni</a></li>
                <li><a href="{{url('privacy-policy')}}">Cookie &amp; Privacy</a></li>
            </ul>
        </div>
        <div class="col-md-9 ftr-grid footer-logo">
            <img src="{{url('website/images/footer-logo.png')}}">
        </div>
        <div class="clearfix"></div>
    </div>     
</div>

  <div class="copywrite">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8">
   <p>&copy; 2017 Bklic srl. All Rights Reserved. | Via Giammatteo, 35 – 73100 Lecce (LE) | info@bklic.it | P. IVA 04862330752</p>
    </div>
<div class="col-sm-4">
<ul class="social">
  <li class="facebook"><a target="_blank" href="https://it-it.facebook.com/Cambialavita2017/" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
  <li class="facebook"><a target="_blank" href="https://it-it.facebook.com/Cambialavita2017/" title="Facebook"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
  <li class="facebook"><a target="_blank" href="https://it-it.facebook.com/Cambialavita2017/" title="Facebook"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
  <li class="facebook"><a target="_blank" href="https://it-it.facebook.com/Cambialavita2017/" title="Facebook"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
  <li class="facebook"><a target="_blank" href="https://it-it.facebook.com/Cambialavita2017/" title="Facebook"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
</ul>
</div>
 </div>
 </div>
</div>

</div>      
</body>
<script type="text/javascript">
$(document).ready(function(){
  // Sticky navigation
    $(window).scroll(function(){
    $('#nav_custom').removeClass('navbar-fixed-top');
      if($(this).scrollTop() >= 200)
      {
        $('#nav_custom').addClass('navbar-fixed-top');
        $('body').css('padding-top', '45px');
      }
      else
      {
        $('#nav_custom').removeClass('navbar-fixed-top');
        $('body').css('padding-top', '0');
      }
    });
  });
</script>
</html>
