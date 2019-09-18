<!DOCTYPE html>


<?php
session_start();



////////////////////////////////la page de projet////////////////////////////////////////

?>



<html >

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Compte enseignant </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min1.css">
    <link href="../css/projet.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">


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
     <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" style="background: white"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Menu</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">

            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../index.php">Déconnexion</a></li>
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

                  <p class="centered"><a href="../../profil.php"><img height="60" ></a></p>
                  <h5 class="centered">akli amal</h5>
                    <li class="mt">
                      <a href="compte.php"  data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                          <i class="fa fa-home"></i>
                          <span>Aceuil</span>
                      </a>
                    </li>
                     <li class="sub-menu">
                      <a href="#" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" id="active">
                          <i class="fa fa-plus-square-o"></i>
                          <span>Page du projet</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="#" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !">
                          <i class="fa fa-plus-square-o"></i>
                          <span>Historique du projet</span>
                      </a>
                    </li>
                    <li class="sub-menu">

                          <a  href="#" onclick="changer()"data-toggle="tooltip" data-placement="right" title="Atenttion c'est pas possible de récupérer!">
                            <i class="fa fa-trash"></i>
                            <span >Diagramme d'avancement </span>
                        </a>
                    </li>
                     <li class="sub-menu">

                        <a  href="#" data-toggle="tooltip" data-placement="bottom" title="Voir les réunions de tout vos projets !" >
                          <i class="fa fa-plus-square-o"></i>
                          <span >Ajouter un co-encadreur</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                        <a  href="#" data-toggle="tooltip" data-placement="bottom" title="Voir les réunions de tout vos projets !" >
                          <i class="fa fa-plus-square-o"></i>
                          <span >Ajouter un étudiant</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                        <a  href="#" data-toggle="tooltip" data-placement="bottom" title="Voir les réunions de tout vos projets !" >
                          <i class="fa fa-trash"></i>
                          <span >Retirer un étudiant</span>
                      </a>
                  </li>

                   
                </ul>
          </div>
      </aside>
    

      <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/js_compte/jquery.js"></script>
    <script src="../js/js_compte/bootstrap.min.js"></script>
    <script src="../js/js_compte/common-scripts.js"></script>
  

  </body>
</html>
