

<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$msg = $_GET['msg'] ;
$chemin=$_SESSION["photo"] ;
$nom_projet = $_SESSION["projet"] ;
$_SESSION['nomProjet'] =$nom_projet ;
$resultat['nom'] = $_SESSION['nom']  ;
$resultat['prenom'] = $_SESSION['prenom'] ;
$resultat['id']= $_SESSION['id'] ;
$_SESSION['projet'] = $nom_projet;
$_SESSION['typeuser'] = "enseignant" ;
$existe = $_SESSION['existe'] ;

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Ajout un étudiant au projet</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker/daterangepicker.css" />

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">
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
  <link rel="stylesheet" type="text/css" href="../css/inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<style type="text/css">
  body {
    color: #797979;
  background: #f2f2f2;
    font-family: 'Ruda', sans-serif;
    padding: 0px !important;
    margin: 0px !important;
    font-size:13px;
}
.tit {

     color : #5c5c5c;
    font-weight: 700  ;
    margin : 20px ;
    margin-bottom: 30px ;
    text-align: center ;
    font-size: 22px ;

}
.wrap-input100 {
  margin-left: 10% ;
  margin-right: 10% ;
  width : 80% ;
}
.login100-form{
  width: 100% ;
}
.login100-form-btn {
  margin: 0px ;
  width : 200px;
  background: #4ecdc5 ;
}
.input100:focus + .focus-input100 + .symbol-input100 {
  color : #00b29c;
}
ul, li {
  margin : 0px ;
}
</style>
  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
     <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
                 <a href="#" class="logo"><img src="../img/logoo1.png" height="40" width="110"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">

            </div>

            <div class="top-menu">
              <ul class="nav pull-right top-menu">

                    <li><a class="logout" href="index.php">Déconnexion</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profil.php"><img src=<?php echo $chemin ?> height="80" class="img-circle" width="80"></a></p>
                   <h5 class="center"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                    <li class="mt">
                      <a href="compte.php"  data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                          <i class="fa fa-home"></i>
                          <span>Aceuil</span>
                      </a>
                    </li>
                       <li class="sub-menu">
                      <a href="projet_encadreur.php?nomProjet=<?php echo $nom_projet ?>" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" >
                          <i class="fa fa-suitcase"></i>
                          <span>Page du projet</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="historique_prof.php" data-toggle="tooltip" data-placement="right" title="Voir la trace de ce projet" >
                          <i class="fa fa-server"></i>
                          <span>Historique du projet</span>
                      </a>
                    </li>
                    <li class="sub-menu">

                          <a  href="chartjs.php" onclick="changer()"data-toggle="tooltip" data-placement="right" title="visualiser avec des diagrammes">
                            <i class="fa fa-pie-chart"></i>
                            <span >Voir l'avancement </span>
                        </a>
                    </li>
                     <li class="sub-menu">

                        <a  href="#" data-toggle="tooltip" data-placement="bottom" title="ajouter un autre encadreur  !" onclick="display_type()" >
                          <i class="fa fa-user-plus"></i>
                          <span >Ajouter un Co-encadreur</span>

                      </a>
                  </li>
                      <li class="sub-menu" style="display: none; padding-left:30px " id="disp1" >

                        <a  href="pageAjoutOldEns.php?check=0" data-toggle="tooltip" data-placement="bottom" title="Le compte existe déja !" >
                          <span >Existant</span>

                      </a>
                  </li>
                   <li class="sub-menu" style="display: none;padding-left:30px " id="disp2">

                        <a  href="pageAjoutNewEns.php?msg=0" data-toggle="tooltip" data-placement="bottom" title="Son compte n'existe pas !" >
                          <span >Nouveau</span>

                      </a>
                  </li>
                      <li class="sub-menu">
                      <a  href="#" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" id="active" >
                          <i class="fa fa-suitcase"></i>
                          <span>Ajouter un étudiant</span>
                      </a>
                    </li>


                </ul>
          </div>
      </aside>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">


            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel ">

                    <!-- tu prends les variables nom/prenom/ num de tel/ email et tu lui crée un compte et tu l'ajoute au projet-->
                       <h3 class="tit"><i class="fa fa-angle-right"></i> Ajouter un étudiant au projet</h3>

                      <?php if ($msg=="success") {
                        ?>

                          <div class="alert alert-success alert-dismissible fade in">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>Success ! </strong> Etudiant ajouté avec succès :
                          </div>
                        <?php } if ($msg=="error") {

                          ?>

                          <div class="alert alert-danger alert-dismissible fade in">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>Erreur ! </strong> Etudiant n'est pas ajouté , vérifiez le nombre des étudiants , ou l'etudiant existe
                          </div>
                          <?php

                        }
                        ?>


        <form class="login100-form validate-form"  method="POST" action="ajouter_newetud.php">

          <div class="wrap-input100 validate-input" data-validate = "votre nom ne doit contenir que des lettres">
            <input class="input100" type="text" name="nom" placeholder=" Nom" required="Champ obligatoire" >


            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Votre prénom ne doit contenir que des lettres">
            <input class="input100" type="text" name="prenom" placeholder="PRENOM" required="Champ obligatoire" >


            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            </span>
          </div>
                         <div class="wrap-input100 validate-input" data-validate = "Email invalide">
            <input class="input100" type="email" name="email" placeholder="Adresse email" required="Champ obligatoire">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "8 lettres/chiffres au minimum">
            <input class="input100" type="password" name="pass" placeholder="Mot de passe" required="Champ obligatoire">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
              <div class="wrap-input100 validate-input" data-validate = "8 lettres/chiffres au minimum">
            <input class="input100" type="password" name="passConf" placeholder="Confirmer le Mot de passe" required="Champ obligatoire">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Composé éxactement de 10 chiffres ">
            <input class="input100" type="tel" name="Numéro" placeholder="Numéro de téléphone " required="Champ obligatoire">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Veuillez donner le matricule de l'étudiant">
            <input class="input100" type="text" name="matricule" placeholder=" matricule">


            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-home" aria-hidden="true"></i>
            </span>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn ">
              Créer le compte
            </button>
          </div>



        </form>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->
    </section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start
      <footer class="site-footer">
          <div class="text-center">
              2019 projet 2cpi
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>-->

  </section>

     <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/js_compte/jquery.js"></script>
    <script src="../js/js_compte/bootstrap.min.js"></script>
    <script src="../js/js_compte/common-scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>


(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {

       if($(input).attr('type') == 'text' && $(input).attr('name') == 'nom') {
            if($(input).val().trim().match(/^[a-zA-Z_\-]{3,15}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return true;
            }
        }
        if($(input).attr('type') == 'text'&& $(input).attr('name') == 'prenom') {
            if($(input).val().trim().match(/^[a-zA-Z_\-]{3,15}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
         if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^[a-z]{2}_[a-zA-Z_\-]+@esi\.dz$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
        if($(input).attr('type') == 'password' || $(input).attr('name') == 'pass') {
            if($(input).val().trim().match(/^[a-zA-Z0-9]{8,25}$/) == null) {
              return false;

            }

        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
       if($(input).attr('type') == 'tel' || $(input).attr('name') == 'Numéro') {
            if($(input).val().trim().match(/^[0-9]{8,25}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }

       if($(input).attr('type') == 'text' && $(input).attr('name') == 'matricule') {
            if($(input).val().trim().match(/^[0-9]{2}\/[0-9]{4}$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }



})(jQuery);

    function display_type() {
  var elem1 = document.getElementById("disp1") ;
  var elem2 = document.getElementById("disp2");
    if (elem1.style.display=="none") {
      elem1.style.display='block' ;
    }else {
         elem1.style.display='none' ;

    }
    if (elem2.style.display=="none") {
      elem2.style.display='block' ;
    }else {
         elem2.style.display='none' ;

    }
 }
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
<script src="../js/ajouter_etudiant.js"></script>
  </body>
</html>

<?php
$_SESSION['id'] = $resultat['id'] ;
$_SESSION['projet']= $nom_projet  ;
?>
