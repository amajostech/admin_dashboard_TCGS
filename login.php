<!DOCTYPE html>
<html>


<!-- Mirrored from www.konnectplugins.com/proclinic/Horizontal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jan 2022 10:42:12 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Tony Cheta Group of Schools - Primary and Nursery Login Page </title>
	<!-- Fav  Icon Link -->
	<link rel="shortcut icon" type="image/png" href="images/fav.png">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- themify icons CSS -->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/green.css" id="style_theme">
	<link rel="stylesheet" href="css/responsive.css">

	<script src="js/modernizr.min.js"></script>
</head>

<body class="auth-bg">
	<!-- Pre Loader -->
	<div class="loading">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--/Pre Loader -->
	<!-- Color Changer -->
	<div class="theme-settings" id="switcher">
		<span class="theme-click">
			<span class="ti-settings"></span>
		</span>
		<span class="theme-color theme-default theme-active" data-color="green"></span>
		<span class="theme-color theme-blue theme-active" data-color="blue"></span>
		<span class="theme-color theme-red theme-active" data-color="red"></span>
		<span class="theme-color theme-violet theme-active" data-color="violet"></span>
		<span class="theme-color theme-yellow theme-active" data-color="yellow"></span>
	</div>
	<!-- /Color Changer -->
	<div class="wrapper">
		<!-- Page Content  -->
		<div id="content">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 auth-box">
						<div class="proclinic-box-shadow">
							<h3 class="widget-title">Login to the dashboard</h3>
							<form class="widget-form" action="valid.php">
								<!-- form-group -->
								<div class="form-group row">
									<div class="col-sm-12">
										<input name="code" placeholder="Enter Special Code Here" class="form-control" required="" >
									</div>
								</div>
								
								<!-- /.form-group -->
								<!-- Check Box -->		
								<div class="form-check row">
									<div class="col-sm-12 text-left">
										<div class="custom-control custom-checkbox">
											<input class="custom-control-input" type="checkbox" id="ex-check-2">
											<label class="custom-control-label" for="ex-check-2">Remember Me</label>
										</div>
									</div>
								</div>
								<!-- /Check Box -->	
								<!-- Login Button -->			
								<div class="button-btn-block">
									<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
								</div>
								<!-- /Login Button -->	
								<!-- Links -->	
								
								<!-- /Links -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Content  -->
	</div>
	<!-- Jquery Library-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Popper Library-->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap Library-->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Script-->
	<script src="js/custom.js"></script>
</body>


<!-- Mirrored from www.konnectplugins.com/proclinic/Horizontal/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jan 2022 10:42:12 GMT -->
</html>

<?php 

include_once 'function.php';
if (isset($_GET["code"])) {
	$code = $_GET["code"];
    $chkuser = mysqli_query($link, "SELECT * FROM teachers WHERE scode='$code' ");
    if (mysqli_num_rows($chkuser) == 1) {
    	echo "You are now logged in";
    	session_start();
    	$_SESSION["usercode"] = $code; 
    	header("location:index.php");
    }else{
    	echo "No User with this Special code was found";
    }
}

?>
