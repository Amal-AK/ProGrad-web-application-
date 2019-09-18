<?php
session_start() ;
$chemin=$_SESSION["photo"] ;
$nom_projet = $_SESSION["projet"] ;
$resultat['nom'] = $_SESSION['nom']  ;
$resultat['prenom'] = $_SESSION['prenom'] ;
$resultat['id']= $_SESSION['id'] ;
$_SESSION['projet']= $nom_projet  ;
$type=$_SESSION['type_user'] ; 
$_SESSION['existe'] =0 ; 
?>

  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Charts</title>
        <!-- Bootstrap core CSS -->
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
    <style type="text/css">
      .mt {
        margin-bottom: 60px ; 
      }
      h3 {
        font-weight:700; 
        font-size:  16px ;
      }
    </style>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
       <header class="header black-bg">
               <div class="sidebar-toggle-box">
                   <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" ></div>
               </div>
                <a href="#" class="logo"><img src="../img/logoo1.png" height="40" width="110"></a>
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

                  <p class="center"><a href="profil.php"><img src=<?php echo $chemin ?> height="80" class="img-circle" width='80'></a></p>
                  <h5 class="center"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                    <li class="mt">
                      <a href="compte.php"  data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                          <i class="fa fa-home"></i>
                          <span>Acceuil</span>
                      </a>
                    </li>
                         <li class="sub-menu">
                      <a <?php   if($type=="enseignant") {  ?> href="projet_encadreur.php?nomProjet=<?php echo $nom_projet ?>" <?php }else {  ?> href="projet_etudiant.php?nomProjet=<?php echo $nom_projet ?>" <?php } ?> data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" >
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

                          <a  href="chartjs.php" onclick="changer()"data-toggle="tooltip" data-placement="right" title="visualiser avec des diagrammes" id="active">
                            <i class="fa fa-pie-chart"></i>
                            <span >Voir l'avancement </span>
                        </a>
                    </li>
                      <?php 
                    if($type=="enseignant") {
                    ?>
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
                      <a  href="AjouterEtudiant.php?msg=''" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" >
                          <i class="fa fa-suitcase"></i>
                          <span>Ajouter un étudiant</span>
                      </a>
                    </li>


<?php
}else {
  $_SESSION['type_user']  ="etudiant" ; 
}
?>
                </ul>
          </div>
      </aside>
      <!--sidebar end-->
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <h2><i class="fa fa-angle-right"></i> Diagrammes de l'état d'avancement du projet</h2>
              <!-- page start-->
              <div class="tab-pane" id="chartjs">
                  <div class="row mt" style="display:flex ; justify-content: center; ">
                      <div class="col-lg-10 well " style= "background: white">
                          <div class="content-panel">
							  <h3 ><i class="fa fa-area-chart"></i> Courbe de l'avancement du projet global en fonction du temps</h3>

                              <div class="panel-body text-center">
                                  <canvas id="myChart" height="100" width="200"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt" style="display:flex ; justify-content: center; ">
                      <div class="col-lg-10 well"  style= "background: white">
                          <div class="content-panel">
							  <h3><i class="fa fa-bar-chart"></i> Avancement de chaque phase du projet</h3>
                              <div class="panel-body text-center">
                                  <canvas id="phase" height="100" width="200"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row mt" id="parent" style="display:flex ; justify-content:space-around; ">
                      <div class="col-lg-5 well" id="div"  style= "background: white">
                          <div class="content-panel">
							  <h3><i class="fa fa-bar-chart"></i>  Avancement de chaque étudiant dans le projet</h3>
                              <div class="panel-body text-center">
                                  <canvas id="bar" height="150" width="200"></canvas>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-5 well" id="delete"  style= "background: white">
                          <div class="content-panel" >
                <h3><i class="fa fa-bar-chart"></i>  Avancement de chaque étudiant par phase </h3>
                              <div class="panel-body text-center">
                                  <canvas id="barV" height="150" width="200"></canvas>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- page end-->
            
          </section>
      <footer class="site-footer">
        <div class="text-center">
       @copyright projet 4 équipe 23 
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

  </section>
<script src="../js/js_compte/jquery.js"></script>
<script src="../js/js_compte/bootstrap.min.js"></script>
<script src="../js/js_compte/common-scripts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../js/myChart.js"></script>
<script type="text/javascript">


  function display_type1() {
  var elem1 = document.getElementById("disp3") ;
  var elem2 = document.getElementById("disp4");
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

</script>
  </body>
</html>
<?php
$_SESSION['id'] = $resultat['id'] ;
$_SESSION['projet']= $nom_projet  ;

?>
