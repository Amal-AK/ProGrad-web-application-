<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$chemin=$_SESSION['photo'];
$insr= $_GET['insere'] ; 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Ajouter un projet</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../js/bootstrap-daterangepicker/daterangepicker.css" />

    <!-- Custom styles for this template -->
    <link href="../css/ajout_projet.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
   <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" ></div>
              </div>
            <!--logo start-->
                     
              <a href="#" class="logo"><img src="../img/logoo1.png" height="40" width="110"></a>
                      <!--logo end-->
            <div class="nav notify-row" id="top_menu">

            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="index.php">Déconnexion </a></li>
              </ul>
            </div>
        </header>

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profil.php"><img height="80" src=<?php echo $chemin ?>  class="img-circle" width="80" ></a></p>
                  <h5 class="centered"><?php echo $nom." ".$prenom; ?></h5>
                    <li class="mt">
                      <a  href="compte.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Aceuil</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="#">
                          <i class="fa fa-plus-square-o"></i>
                          <span>Ajouter un projet</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="fa fa-trash"></i>
                          <span>Supprimer un projet</span>
                      </a>
                  </li>
                    <li class="sub-menu">

                        <a  href= "page_agenda_ens">
                          <i class="fa fa-calendar"></i>
                          <span >Consulter mon agenda</span>
                      </a>
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <?php if ($insr==1) { ?>
            <div class="alert alert-danger alert-dismissible fade in insr_projet" style=" margin-top: 20px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Erreur ! </strong> Le projet que vous voulez ajouter existe déja !
            </div>
           <?php } ?>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row ">
              <div class="col-lg-12" style="display: flex ;justify-content:center  ">
                  <div class="form-panel container" >
                    <h4 style="color : #68dff0 ; font-weight:bold;  " class="mb"> Informations du projet:</h4>
                      <form class="form-horizontal style-form" method="post" action="ajout_projet.php" onsubmit="return validateForm()" name= "myForm">
                          <div class="input-group row">
                               <span class="input-group-addon" >Nom du projet </span>
                              <input type="text" class="form-control input-lg" name="nomprojet" required="obligatoire" >
                          </div>
                        
                            <div class="radio row">
                              <div class="col-sm-4">
                                <p>Est-ce un projet de Binome ou Monome?</p>
                              </div>
                              <div class="col-sm-4">
                                 <label class="cont">
                                <input type="radio" name="optionsRadios1" id="optionsRadios1 radio1" value=" Binôme" required="obligatoire">
                                <span class="checkmark"> </span>
                                 <span class="texto" >Binôme</span>
                              </label>
                              </div>
                              <style type="text/css">
                                /* Customize the label (the container) */

                              </style>
                             <div class="col-sm-4">
                              <label  class="cont">
                                <input type="radio" name="optionsRadios1" id="optionsRadios1 radio2" value="Monôme"  >
                                 <span class="checkmark"> </span>
                                 <span class="texto" >Monôme</span>
                              </label>
                             </div>
                            </div>



                            <div class="radio row">
                              <div class="col-sm-4">
                                <p>Est-ce un projet de PFE ou Master?</p>
                              </div>
                              <div class="col-sm-4">
                                 <label class="cont" >
                                <input type="radio" name="optionsRadios2" id="optionsRadios1 radio1" value="PFE" required="obligatoire" >
                                 <span class="checkmark"> </span>
                                <span class="texto" > PFE</span>
                              </label>
                              </div>
                             <div class="col-sm-4">
                              <label class="cont">
                                <input type="radio" name="optionsRadios2" id="optionsRadios1 radio2" value="Master"  >
                                  <span class="checkmark"> </span>
                                 <span class="texto" >Master</span>
                              </label>
                             </div>
                            </div>

                            <div class="radio row">
                              <div class="col-sm-4">
                                <p>Est-ce un projet de recher  ou d'entreprise?</p>
                              </div>
                              <div class="col-sm-4">
                                 <label class="cont">
                                <input type="radio" name="optionsRadios3" id="optionsRadios1 radio1" value="P-Recherche" required="obligatoire" >
                                <span class="checkmark"></span>
                                <span class="texto" >P-de recherche</span>
                              </label>
                              </div>
                             <div class="col-sm-4">
                              <label class="cont">
                                <input type="radio" name="optionsRadios3" id="optionsRadios1 radio2" value="P-entreprise"  >
                                <span class="checkmark"></span>
                                <span class="texto" >P-d'entreprise</span>
                              </label>
                             </div>
                            </div>

                          <input type="text" name="dateDebut" placeholder="Date de début de projet" class="form-control input-md inp" required="" onfocus="(this.type='date')">


                          <input type="text" name="dateFin" placeholder="Date de fin de projet" class="form-control input-md inp" style="margin-bottom: 40px; margin-top: 5px;" required="" onfocus="(this.type='date')">
                          <div class="alert alert-danger alert-dismissible fade in" style="display:none; ">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Erreur ! </strong> La date de fin est inférieure à la date de début !
                          </div>
                            <div class="row">
                            <div class="checkbox col-xs-6" id="confirm" >
                                <label class="cont">
                                   <input type="checkbox" value="" class="checkbox" required>
                                    <span class="check"></span>
                                    <span style="margin-left:10px; font-size: 14px   ;" > Je confirme ces informations </span>

                                 </label>


                            </div>
                            
                            <div class="col-xs-6">
                                  <input type="submit" class="btn btn-primary" value="Continuer" >
                            </div>
                          </div>
                          </div>

                      </form>
                  </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->

            <!-- INPUT MESSAGES -->
            <div class="row mt">
              <div class="col-lg-12">
              </div><!-- /col-lg-12 -->




    </section>
      </section>

  </section>
</div>
<footer class="site-footer">
     <div class="text-center">
                  @copyright projet 4 équipe 23 
          <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
          </a>
      </div>
   </footer>
</body>

         <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/js_compte/jquery.js"></script>
    <script src="../js/js_compte/bootstrap.min.js"></script>
    <!--common script for all pages-->
    <script src="../js/js_compte/common-scripts.js"></script>


  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
  
  function validateForm() {
  var x = document.forms["myForm"]["dateDebut"].value;
  var y = document.forms["myForm"]["dateFin"].value;
  if (x > y ) {
    
    var z = $(".alert-danger") ; 
    z[0].style.display = "block" ; 
    return false;
  }
} 
  </script>

  </body>
</html>
 <?php

 ?>
