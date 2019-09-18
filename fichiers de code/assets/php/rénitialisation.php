<?php
session_start();
$type_user=$_SESSION['type_user'] ;
$_SESSION['type_user']=$type_user;
$reset = $_SESSION['reset'] ; 
?>




<!DOCTYPE html>


<html lang="en">
<head>
	<title>Forget Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/forgot.css">
<!--===============================================================================================-->
</head>
<body>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top  ">
	<div class="container">
		<div class="inline-item ">
	 <a class="navbar-brand" href="#"><img src="../img/logo.png" height="40" width="110"></a>
		 
     	</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

    <ul class="navbar-nav  " >
       <li class="nav-item">
            <a class="nav-link " href="index.php">Revenir à l'aceuil</a>
       </li>


    </ul>
	</div>
</div>
</nav>
	<div class="limiter">

		<div class="container-login100">
			<div class="wrap-login100">
             <?php if($reset==1) { ?>
                <div class="alert alert-success" style="margin-bottom: 50px; width:100% ;">
                  <strong> Succés !</strong> Le mot de passe a été envoyé .
                </div>
             <?php } ?> 
				<form class="login100-form validate-form" id="form" method="POST"action="password_process.php"  onsubmit="confirmInput()">
					<span  class="login100-form-title" style="text-align: center ;">
						Réinitialiser le mot de passe
					</span>

					<div class="wrap-input100 validate-input">
						<p id="mail" style="text-align: center;"> Saisissez votre E-mail: </p>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: c_nom@esi.dz">
						<input class="input100" type="text" name="mail" placeholder="Saisissez votre Email" id="message">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">

						<input type="submit" class="login100-form-btn" value="Confirmer">
					</div>

					<div class="text-center p-t-12" >

						<a class="txt2" href="#">
							 Remember Username / Password?
						</a>
					</div>


				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/forgot.js"></script>

</body>
</html>
