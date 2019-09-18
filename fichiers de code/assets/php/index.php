<?php
session_start();

session_destroy();
?>

<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- // CSS FILES // -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<!-- Core Navigation -->
	<link rel="stylesheet" href="../js/corenav-master/corenav-master/dist/coreNavigation-1.1.3.min.css">
	<!-- Navbar Style -->
	<link rel="stylesheet" href="../css/navbar-style.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Line Icons -->
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<!-- LightBox -->
	<link rel="stylesheet" href="../js/lightbox/dist/css/lightbox.min.css">
	<!-- Style -->
	<link rel="stylesheet" href="../css/index.css">

	<!--// SITES TITLE // -->
	<title>Acceuil</title>

</head>

<body>


  <!--  NAVBAR
    =============================================== -->

	<nav hidden>
		<div class="nav-header">
			<!-- Navbar Logo -->
			<a href="#" class="brand">
				<img class="scrolled" src="../img/logo_bleu.png" alt="logo" height="50" width="110" >
				<img class="top" src="../img/logoo1.png" alt="logo-scrolled" height="50" width="110">
			</a>
			<!-- Burger Menu -->
			<button class="toggle-bar">
				<span class="fa fa-bars"></span>
			</button>
		</div>
		<!-- Navbar Links -->
		<ul class="menu">
			<li class="scrollspy active"><a href="#home">Acceuil</a></li>
			<li class="scrollspy"><a href="#about">A propos</a></li>
			<li class="scrollspy"><a href="#contact"> Contact </a></li>
			<li class=""><a href="HelpEns.php"> Aide </a></li>
		</ul>

	</nav>

	<!-- ==============================================
    BANNER
    =============================================== -->

	<section class="slider-area" id="home">
		<div class="container-fluid">
			<div class="row">
				<div class="owl-carousel main-slider owl-loaded owl-drag">
					<!-- Single slide 1-->
					<div class="single-slide slide-bg-1">
						<div class="col-md-12">
							<div class="tabel">
								<div class="tabel-cell">
									<div class="slider-content">
										<h3> Suivi des encadrements de MASTER et PFE à l'ESI  </h3>
										<h1>  ProGrad</h1>
										<a href="../../connexion-encadreur.php" class="btn btn-transparent">Encadreur</a>
										<a href="../../connexion-etudiant.php" class="btn btn-white">Etudiant</a>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.single-slide -->

					<!-- Single slide 2 -->
					<div class="single-slide slide-bg-2">
						<div class="col-md-12">
							<div class="tabel">
								<div class="tabel-cell">
									<div class="slider-content">
										<h3>Suivi des encadrements de MASTER et PFE à l'ESI   </h3>
										<h1> ProGrad </h1>
										<a href="../../connexion-encadreur.php" class="btn btn-transparent">Encadreur</a>
										<a href="../../connexion-etudiant.php" class="btn btn-white">Etudiant</a>
									</div>
								</div>
							</div>
						</div>

					</div><!-- /.single-slide -->

				</div><!-- /.main-slider -->
			</div>
		</div>
	</section>

	<!-- ==============================================
    ABOUT US
    =============================================== -->

	<section id="about">
		<div class="container">
			<h2>A propos</h2>
			<div class="row">
				<div class="col-lg-6 wow fadeInLeft" data-wow-duration=".2s" data-wow-delay=".4s">
					<div class="about-img">
						<img src="../img/capture.png" class="img-fluid" alt="about">
					</div>
				</div>
				<div class="col-lg-6 about-content wow fadeInLeft" data-wow-duration=".2s" data-wow-delay=".6s">
					<p>Une application qui garantit le contact et la collaboration entre encadreurs et étudiants.
					</p>
					<p>Cet outil se présente comme un outil de communication entre les étudiants et les encadrants. Il doit tracer la relation d’encadrement selon le planning fixé pour le projet. </p>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>



	<!-- ==============================================
    CONTACT
    =============================================== -->

	<section id="contact" style="margin-top:50px ;  ">
		<div class="svg-wave">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 3600 248">
				<path d="M3601,31.227S2736.31,201.97,1661,72.2C547.345-62.2,0,32.227,0,32.227V343H3602Z"></path>
			</svg>
		</div>
		<div class="container">
			<h2>Contact</h2>
			<div class="row">
				<div class="col-lg-4 wow fadeInLeft" data-wow-duration=".2s" data-wow-delay=".4s">
					<h4>Nos infos</h4>
					<a href="#" class="email-link">ha_akli@esi.dz</a>
					<p>0542422646</p>
					<p>Algérie , Bab Ezzouar <b></b></p>
					<ul class="social-media">
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-8 wow fadeInLeft" data-wow-duration=".2s" data-wow-delay=".6s">
					<h4>Avez-Vous un probléme avec l'application ? </h4>
					<form method="POST" action="contact_process.php">
						<div class="row">
							<div class="col">
								<input type="email" class="form-control" placeholder="email :" name="mail" required="">
							</div>
							<div class="col">
								<input type="text" class="form-control" placeholder="Objet :" name="sujet"required="">
							</div>
						</div>
						<!-- Form Group -->
						<div class="form-group wow fadeInLeft" data-wow-duration=".2s" data-wow-delay=".6s" >
							<textarea id="form-message" cols="30" rows="5" class="form-control" placeholder="Message:" required name="msg"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Envoyer un Message</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	</section>

	<!-- ==============================================
    FOOTER
    =============================================== -->

	<footer>
		<p class="copyright">

		</p>


	</footer>

	<!-- // JS FILES // -->

	<!-- jQuery -->
	  <script src="../js/js_compte/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.min.js"></script>
	<!-- Bootstrap -->
	<script src="../bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
	<!-- Core Navigation -->
	<script src="../js/corenav-master/corenav-master/dist/coreNavigation-1.1.3.min.js"></script>
	<!-- Owl Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Wow -->
	<script src="../js/wow-1.3.0.min.js"></script>
	<!-- LightBox -->
	<script src="../js/lightbox/dist/js/lightbox.min.js"></script>
	<!-- Custom -->
	<script src="../js/custom.js"></script>
</body>

</html>
