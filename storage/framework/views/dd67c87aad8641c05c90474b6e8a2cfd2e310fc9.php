<!DOCTYPE html>
<html xmlns="">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bklic</title>

    <link href="<?php echo e(URL::asset('front/assets/css/bootstrap.css')); ?>" rel="stylesheet" />
    
    <link href="<?php echo e(URL::asset('front/assets/css/font-awesome.css')); ?>" rel="stylesheet" />
   
    <link href="<?php echo e(URL::asset('front/assets/js/morris/morris-0.4.3.min.css')); ?>" rel="stylesheet" />

    <link href="<?php echo e(URL::asset('front/assets/css/custom.css')); ?>" rel="stylesheet" />
    
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href="<?php echo e(URL::asset('front/assets/js/dataTables/dataTables.bootstrap.css')); ?>" rel="stylesheet" />


   <link href="<?php echo e(URL::asset('js/parsley.css')); ?>" rel="stylesheet">

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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(URL::asset('images/logo.png')); ?>"/></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <!--Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> -->

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    
           
                    <ul class="nav navbar-nav navbar-right user_profile_top">
                        <!-- Authentication Links -->
                        <?php if(Auth::guest()): ?>
                             <li><a href="<?php echo e(url('user-login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(url('members-register')); ?>">Registrazione</a></li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-danger square-btn-adjust" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Esci
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>

                                    <li>
                                        <a href="<?php echo e(url('dealerprofile')); ?>">Profilo</a>

                                    </li>
                                  </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
</div>
        </nav>    
        
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
              <ul class="nav" id="main-menu">
                 <!--<li class="text-center">

                    <?php if(!empty(Auth::user()->profileimage)): ?>
                   <?php  $profileImage= Auth::user()->profileimage; ?>
                    <img src="<?php echo e(url('/images/profile_images/'.$profileImage)); ?>" class="user-image img-responsive"/>
                    <?php else: ?>
                     <img src="<?php echo e(URL::asset('front/assets/img/find_user.png')); ?>" class="user-image img-responsive"/>
                     <?php endif; ?>


                  </li>-->
                
                    
                   <!--<li <?php echo e(Request::path() == 'dealer' ? 'class=active' : ''); ?>>
                        <a   href="<?php echo e(url('dealer')); ?>"><i class="fa fa-dashboard"></i> Home</a>
                  </li>-->
                   <?php if(Auth::user()->is_profile_complete==1): ?>
                 
                  
                   <li <?php echo e(Request::path() == 'dealer-post' ? 'class=active' : ''); ?>>
                        <a  href="<?php echo e(url('dealer-post')); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>
                  Pagina pubblica</a>
                  </li>
                   <!--<li>
                        <a  href="<?php echo e(url('page_builder')); ?>"><i class="fa fa-desktop fa-3x"></i> Page Builder</a>

                  </li> -->
				  
				  <li <?php echo e(Request::path() == 'dealersubscription' ? 'class=active' : ''); ?>>
                        <a  href="<?php echo e(url('dealersubscription')); ?>"><i class="fa fa-desktop"></i> Sottoscrizione</a>

                  </li> 
				  
				  
				  <li <?php echo e(Request::path() == 'aff-transaction' ? 'class=active' : ''); ?>>
                        <a  href="<?php echo e(url('aff-transaction')); ?>"><i class="fa fa-money" aria-hidden="true"></i>
        Transazioni</a>

                  </li> 
				  <?php endif; ?>
				  
				  
				  
                  
                  

                </ul>
               
            </div>
            
        </nav>  
       
         <?php echo $__env->yieldContent('content'); ?>
     </div>
     
	 <style>
	 .active a{

    background: #00ade9 !important;
    outline: 0;

}
	 </style>
    
     <script src="<?php echo e(URL::asset('front/assets/js/jquery-1.10.2.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('front/assets/js/bootstrap.min.js')); ?>"></script>
  
    <script src="<?php echo e(URL::asset('front/assets/js/jquery.metisMenu.js')); ?>"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo e(URL::asset('js/parsley.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>

 <script src="<?php echo e(URL::asset('front/assets/js/dataTables/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(URl::asset('front/assets/js/dataTables/dataTables.bootstrap.js')); ?>"></script>


</body>
</html>
