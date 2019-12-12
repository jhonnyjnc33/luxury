<?php
session_start();
?>

<!DOCTYPE html>

<html>
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.css" rel="stylesheet" /> 
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body >
	<br>
	<br>
	<center><img src="/images/logo.png" width="200px" /></center> 
    <div class="login-container animated fadeInDown" style="margin-top: 10px;">
        <div class="loginbox bg-white">
            <div class="loginbox-title">Accesar</div>
            <form method="POST" action="acciones/login.php"/>
	            <div class="loginbox-or">
	                <div class="or-line"></div>
	                <div class="or"></div>
	            </div>
	            <form>
	            <div class="loginbox-textbox">
	                <input type="text" class="form-control" name="user" placeholder="Usuario" />
	            </div>
	            <div class="loginbox-textbox">
	                <input type="password" class="form-control" name="pass" placeholder="Password" />
	            </div>
	            <div class="loginbox-forgot">
	                <a href="">Olvid&eacute; mi password?</a>
	            </div>
	            <div class="loginbox-submit">
	                <input type="submit" class="btn btn-primary btn-block" value="Accesar">
	            </div>
           </form>
        </div>
        <div class="logobox">
        	<?php
				print $_SESSION["us"]["error"];	
			 ?>
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>

    
</body>
<!--Body Ends-->
</html>
