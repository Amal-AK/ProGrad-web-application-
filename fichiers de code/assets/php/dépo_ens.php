<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$chemin=$_SESSION['photo'];
$nom = $_SESSION['nom']  ;
$prenom = $_SESSION['prenom'] ;

$id_liv=$_GET['id_liv'];

$_SESSION['id_liv']=$id_liv;
$id=$_SESSION['id'] ;
$_SESSION['id']=$id;
$type=$_SESSION['type_user'];
$_SESSION['type_user']=$type;
$nom_projet =$_SESSION['projet'];
$_SESSION['projet'] =$nom_projet ;
/*$nom_phase=$_GET['phase'];
$_SESSION['nomphase'] =$nom_phase ;*/
// on doit avoir un post ici ou on recupere l'id du livrable


$req = $bdd->prepare('SELECT chemin,nom,date_prevu,date_dep FROM livrables WHERE  id = :id');
$req->execute(array(
  'id' => $id_liv
  ));
$resultat = $req->fetch();

$depo=$resultat['date_dep'];
$prevu=$resultat['date_prevu'];

$dteStart = new DateTime($depo);
$dteEnd   = new DateTime($prevu);

$dteDiff  = $dteStart->diff($dteEnd);
$chemin_liv=$resultat['chemin'];
$nom_liv=$resultat['nom'];
/*$res = explode('.', $nom_liv);
$ext=$res[1];
$fich=$nom_liv.".".$ext;*/
$_SESSION['fichier']=$nom_liv;
$_SESSION['existe'] =0 ; 

 ?>





















  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Livrables </title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="../css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../css/icon.css">
   <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="../css/compte-enseignant.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

<style type="text/css">
      .form-panel {
        box-shadow:  none ; 
        padding-left : 8% ;
        margin :20px  ;
      }
      h2  , h3 {
    color : #5c5c5c;
    font-weight: bold ; 
    margin : 20px ; 
    margin-bottom: 30px ; 
}
h3 {
  font-size : 20px ; 

  margin-left: 5% ; 
}
li {
  text-align: left ; 
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
                   <h5 class="centered"><?php echo $nom." ".$prenom ?></h5>

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

                        <a  href="pageAjoutOldEns.php" data-toggle="tooltip" data-placement="bottom" title="Le compte existe déja !" >
                          <span >Existant</span>

                      </a>
                  </li>
                   <li class="sub-menu" style="display: none;padding-left:30px " id="disp2">

                        <a  href="pageAjoutNewEns.php" data-toggle="tooltip" data-placement="bottom" title="Son compte n'existe pas !" >
                          <span >Nouveau</span>

                      </a>
                  </li>
                  <li class="sub-menu">
                        <a  href="AjouterEtudiant.php?msg=''" data-toggle="tooltip" data-placement="bottom" title="ajouter un étudiant à ce projet!" >
                          <i class="fa fa-user-plus"></i>
                          <span >Ajouter un étudiant</span>
                      </a>
                  </li>
                

           </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper" >

<!-- FORM VALIDATION -->

          <div class="col-lg-20">
            <h3><i class="fa fa-angle-right"></i> Dépôt de livrable : </h3>
            <div class="form-panel well">
              <div class=" form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="ajouter_liv.php"  enctype="multipart/form-data">


                     <div class="form-group ">
                      <br /><br />
                    <label for="curl" class="control-label col-lg-2">Date limite : </label>
                    <div class="col-lg-10">
                      <div class="alert alert-warning"><?php echo $resultat['date_prevu'] ?></div>
                    </div>
                  </div>

                  <div class="form-group ">
                   <br />
                    <label for="cname" class="control-label col-lg-2">Fichier à déposé :</label>
                    <div class="col-lg-10">
                      <input  id="cname" name="livrable" minlength="2" type="file" required />
                   <br /><br />
                    </div>

                  </div>

                  <div class="form-group">
                    <br />

                    <div class="control-label col-lg-8">
                    <input type="submit" value="déposer mon livrable" class="btn btn-info" id="saveImg"  />
                    </div>

                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->

          <div class="col-lg-20">
              <h3><i class="fa fa-angle-right"></i> Télécharger un livrable : </h3>
              <div class="form-panel well">
                <div class=" form">
                  <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="">
                    <div class="form-group ">
                        <br /><br />
                      <label for="curl" class="control-label col-lg-2">deposé avant la date prevue : </label>
                      <div class="col-lg-10">
                        <div class="alert alert-danger"><?php echo $dteDiff->format("%R  %m mois %d jours  %H heures %I minutes %S secondes ");?></div>
                      </div>
                    </div>
                     <div class="form-group ">
                    <label for="cemail" class="control-label col-lg-2">Lien de téléchargement: </label>
                    <div class="col-lg-10">


                      <div class="alert alert-warning" id="1">
                    <?php
                    if($chemin_liv)
                    { echo "<a href='tel.php?pdf=$chemin_liv'>$nom_liv</a>";}
                    else {
                    echo "<strong> aucun fichier a telecharger.</strong>";
                    }
                    ?>
                    </div>








                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->









 </div>
        </section>
    </section>

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
       copyright
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

    <!-- js placed at the end of the document so the pages load faster -->
  <script src="../js/js_compte/jquery.js"></script>
  <script src="../js/js_compte/bootstrap.min.js"></script>
  <!--common script for all pages-->
  <script src="../js/js_compte/common-scripts.js"></script>




</body>
</html>
