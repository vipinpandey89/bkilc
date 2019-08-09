
<!DOCTYPE HTML>
<html>
<head>
<title>Bklic</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="<?php echo e(URL::asset('admin/css/bootstrap.css')); ?>" rel='stylesheet' type='text/css' />


<link href="<?php echo e(URL::asset('admin/css/style.css')); ?>" rel='stylesheet' type='text/css' />


<link href="<?php echo e(URL::asset('admin/css/font-awesome.css')); ?>" rel="stylesheet"> 

<link href='<?php echo e(URL::asset('admin/css/SidebarNav.min.css')); ?>' media='all' rel='stylesheet' type='text/css'/>

<script src="<?php echo e(URL::asset('admin/js/jquery-1.11.1.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('admin/js/modernizr.custom.js')); ?>"></script>


<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">


<script src="<?php echo e(URL::asset('admin/js/Chart.js')); ?>"></script>

<script src="<?php echo e(URL::asset('admin/js/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('admin/js/custom.js')); ?>"></script>
<link href="<?php echo e(URL::asset('admin/css/custom.css')); ?>" rel="stylesheet">

<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>

</head> 
<body>
	<div class="main-content">

		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">

				<?php if(count($errors)): ?>

						<div class="alert alert-danger">

							<ul>

								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<li><?php echo e($error); ?></li>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							</ul>

						</div>

			<?php endif; ?>


						<form method="post" autocomplete="off"/>
							<input type="email" class="user" name="email" placeholder="inserisci la tua email" >
							<input type="password" name="password" class="lock" placeholder="Password" >
							<div class="forgot-grid">
								<!--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>-->
								<div class="forgot">
									<a href="<?php echo e(('user-forgotpassword')); ?>">Hai dimenticato la password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<?php echo csrf_field(); ?>

							<input type="submit" name="Signin" value="Log in">
							<!--<div class="registration">
								Don't have an account ?
								<a class="" href="signup.html">
									Create an account
								</a>
							</div>-->
						</form>
					</div>
				</div>
				
			</div>
		</div>
	</div>
		<!--footer-->
		
   
</body>
</html>