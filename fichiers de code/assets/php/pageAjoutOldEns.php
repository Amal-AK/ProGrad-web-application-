<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$chemin=$_SESSION["photo"] ;
$nom_projet = $_SESSION["projet"] ;
$_SESSION['nomProjet'] =$nom_projet ;
$resultat['nom'] = $_SESSION['nom']  ;
$resultat['prenom'] = $_SESSION['prenom'] ;
$resultat['id']= $_SESSION['id'] ;
$_SESSION['projet'] = $nom_projet;
$_SESSION['typeuser'] = "enseignant" ;
$msg= 0  ; // $_GET['check'] ; 
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

    <title>Ajout encadreur à un projet</title>

    <!-- Custom styles for this template -->
    <link href="../css/bootstrap.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    <link rel="stylesheet" href="../css/bootstrap.min1.css">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">
    

  </head>

  <style type="text/css">
    aside li {

      text-align: left ;
    }
    .modal-header {
      background-color: #68dff0 ;
      color:white;
      padding: 15px ;
      text-align: center ;
    }
     .modal-title {
      text-align: center ;
      color : white ;
      font-size: 18px ;
      line-height: 1.4285 ;
     }
     .modal-body {
      padding : 15px ;
     }
     .dropdown-toggle {
      background: transparent;
     }
     .form-control {
       width: 100% ;
    border: 0 ;
    font-family: inherit ;
    padding: 12px 0 ;
    height: 48px ;
    font-size: 16px ;
    font-weight: 500 ;
    border-bottom: 2px solid #C8CCD4 ;
    background: none ;
    border-radius: 0 ;
    color: #223254 ;
    transition: all .15s ease ;
    box-shadow:none !important ;
    padding: 30px ; 
    font-size: 13px ; 
     }

     .input-group-addon {
      background: white ; 
      border : none;

     }
     .input-group-addon i {
      color : gray ;
      margin-top: 16px ; 
     }
     </style>

  <body>


  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg bg-gradient-9">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
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
                   <h5 class="centered"><?php echo $resultat['nom']." ".$resultat['prenom'] ?>
                    <li class="mt">
                      <a href="compte.php"  data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                          <i class="fa fa-home"></i>
                          <span>Aceuil</span>
                      </a>
                    </li>
                       <li class="sub-menu">
                      <a href="projet_encadreur.php?nomProjet=<?php echo $nom_projet ?>"  data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" id="active">
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
                      <a  href="AjouterEtudiant.php?msg=''" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" >
                          <i class="fa fa-suitcase"></i>
                          <span>Ajouter un étudiant</span>
                      </a>
                    </li>


                
                </ul>
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel well">


            <?php if ($msg=="1") {
               ?>
                      
                  <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success ! </strong> Co-encadreur ajouté avec succès :
                  </div>
              <?php }
                ?>
                  	  <h4 class="mb"> Ajouter un co-encadreur</h4>
                       <form class="form-horizontal style-form " method="post" action="../php/ajout_oldens.php">
                          <!-- INLINE FORM ELELEMNTS -->
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" name="nom" class="form-control round-form" placeholder="Nom">
                          
                          </div>
                          
                       <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input type="text" class="form-control round-form" name="prenom" placeholder="Prénom">
                            
                          </div>
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control round-form" id="exampleInputEmail2" name="mail" placeholder="Email">
                  
                          </div>

                              <div class="container-login100-form-btn">

                            <input type="submit" class="btn btn-theme" value="Ajouter au projet">
                            </div>

                      </form>
                  </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
   
      <!--footer end-->
  </section>



  </body>
   <script src="../js/js_compte/jquery.js"></script>
    <script src="../js/js_compte/bootstrap.min.js"></script>
    <script src="../js/js_compte/common-scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <script type="text/javascript">
  
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
</html>

<?php
$_SESSION['id'] = $resultat['id'] ;
$_SESSION['projet']= $nom_projet  ;
?>
