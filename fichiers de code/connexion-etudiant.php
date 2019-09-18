<?php
session_start();
$_SESSION['type_user']="etudiant";
$_SESSION['reset'] = 0 ; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Connexion </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/connexion.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top  ">
	<div class="container">
		<div class="inline-item ">
		 <a class="navbar-brand" href="#"><img src="assets/img/logoo1.png" height="40" width="110"></a>
     	</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

    <ul class="navbar-nav  " >
       <li class="nav-item">
            <a class="nav-link" href="assets/php/index.php">Acceuil</a>
       </li>
       <li class="nav-item">
            <a class="nav-link active" href="#">Connexion</a>
       </li>
          <li class="nav-item">
            <a class="nav-link" href="HelpEtudiant.html">Aide</a>
        </li>
      
    </ul>
	</div>
</div>
</nav>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/img/background-connexion.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="assets/php/connexion_etud.php">

					<span class="login100-form-logo">
						<img src="assets/img/logo_yelow.png" height="44" width="32">
					</span>

					<span class="login100-form-title p-b-34 p-t-27 ">
						Connectez Vous
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email invalide">
						<input class="input100" type="email" name="email" placeholder="Adresse email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Mot de passe incorrecte">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Se souvenir de moi
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
						 Connecter
						</button>
					</div>

					<div class="text-center p-t-10 justify-content-space-between">

						<a class="txt1" href="assets/php/rénitialisation.php">

							Mot de passe oublié ?
						</a>


					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/connexion.js"></script>

</body>
</html>
