<?php
session_start() ;
$chemin=$_SESSION["photo"] ;
$nom_projet = $_SESSION["projet"] ;
$resultat['nom'] = $_SESSION['nom']  ;
$resultat['prenom'] = $_SESSION['prenom'] ;
$resultat['id']= $_SESSION['id'] ;
$_SESSION['projet']= $nom_projet  ;
$type= $_SESSION['type_user']  ; 
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

  <title>historique </title>

  <!-- Bootstrap core CSS -->
  <link href="./assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="./assets/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../css/icon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  .fa-clock-o {
    color : white;
    margin : 3px ;

  }
  p {
    font-size: 13px ; 
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
                  <li style="margin-top:10px "><a class="logout" href="index.html">Déconnexion</a></li>
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

                  <p class="centered"><a href="profil.php"><img src=<?php echo $chemin ?> height="80" class="img-circle" style="border-radius: 50% " width = "80"></a></p>
                  <h5 class="centered"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
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
                      <a href="historique_prof.php" data-toggle="tooltip" data-placement="right" title="Voir la trace de ce projet" id="active">
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
        <section class="wrapper" style='margin-right:20px ; margin-left:20px ; width:96%;  margin-top:70px   ' >

          <div class="col-lg-20 ">

                <div class="col-lg-20 ds">

                    <h3 style="color : white" >Historique</h3>
                    <div    class="showback historique" style="box-shadow:none; border: 1px solid rgba(209, 209, 209, 1); height: 445px ; overflow: auto ; ">





                </div><!-- /col-lg-3 -->
            </div>
        </section>
    </section>

    <!--main content end-->
      <footer class="site-footer">
        <div class="text-center">
       copyright
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
</section>

    <!-- js placed at the end of the document so the pages load faster -->
  <script src="../js/js_compte/jquery.js"></script>
  <script src="../js/js_compte/bootstrap.min.js"></script>
  <!--common script for all pages-->
  <script src="../js/js_compte/common-scripts.js"></script>


  <!--chargement de l'historique-->
  <script type="text/javascript">

    $.ajax({
       url : 'recup_histo.php',
       type : 'GET',
       dataType : 'json',
       success : function(resultat,statut){

      var nb= resultat.nb; // les lignes dispo de l'historique
      var histo = resultat.histo ; // la table d'$historique
      var i,k ;
      if(nb==0)
      {
            var histoSpace = document.querySelector('.showback.historique ') ;
            histoSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="130" width="150" ></div><h3 style="text-align: center; color : #b3b3b3">Aucun historique !</h3>' ;
      }
      else
      {
        k=nb;
            for (i=0 ; i<k ; i++)
            {
              var divParent = document.createElement('div') ;
              divParent.className = 'desc' ;
              divParent.id = '1' ;
              var div= document.createElement('div') ;
              div.className="thumb" ;
              div.id=2;
              var span = document.createElement('span') ;
              span.className = "badge bg-theme" ;
              span.style.padding="3px 7px" ; 
              var icon = document.createElement('i') ;
              icon.className="fa fa-clock-o";
              var divprin= document.createElement('div') ;
              divprin.id=3;
              var text = document.createElement('p') ;
              var muted=document.createElement('muted');
              var temps = document.createTextNode(histo[i][1] +" ") ;
              muted.style.margin = "15px" ; 
              var saut_ligne1=document.createElement('br');
              var ligne = document.createElement('a') ;
              var nom = document.createTextNode("    "+histo[i][0] +" ") ;
              var action = document.createTextNode(histo[i][2] +" " ) ;
              var saut_ligne=document.createElement('br');
              span.appendChild(icon) ;
              div.appendChild(span);
              divParent.appendChild(div);
              muted.appendChild(temps);
             
              text.appendChild(muted) ;
              ligne.appendChild(nom);
              text.appendChild(ligne);
              text.appendChild(action);
              divprin.appendChild(text);
              divParent.appendChild(divprin) ;
              var histoSpace = document.querySelector('.showback.historique ') ;
              histoSpace.appendChild(divParent);
            }
        }
      },

       error : function(resultat , statut , erreur ){

              console.log( statut +" "+ erreur) ;
             },

       complete : function(resultat , statut){

               console.log(resultat + " " + statut) ;
       },




});

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

  <?php
  $_SESSION['id'] = $resultat['id'] ;
  $_SESSION['projet']= $nom_projet  ;

  ?>







</body>
</html>
