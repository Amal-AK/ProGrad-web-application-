<?php


//connexion vers la bdd

$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
//recup des donnees
session_start();
$name_proj=$_POST['nomprojet'];
$type=$_POST['optionsRadios3'];
$pfe_master=$_POST['optionsRadios2'];
$bin_mon=$_POST['optionsRadios1'];
$ens_matricule=$_SESSION['id'];
$_SESSION ['nom_projet'] = $name_proj ;
$date_debut=$_POST['dateDebut'];
$date_fin=$_POST['dateFin'];
$ens2="";
//recherche si le projet n'existe pas dans la bdd
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$name_proj) ;
$requete->execute();
$projet= $requete->fetch();
if (empty($projet[1]))
{
  //insertion dans la table du projet********************************************************
  $requete = $conn->prepare('INSERT INTO projet VALUES(null,:nom,:type,:bin_mon,:pfe_master, :date_debut, :date_fin, :ens1, :ens2)');

  $requete->bindValue(':nom',$name_proj) ;
  $requete->bindValue(':type', $type);
  $requete->bindValue(':bin_mon', $bin_mon);
  $requete->bindValue(':pfe_master',$pfe_master);
  $requete->bindValue(':date_debut', $date_debut);
  $requete->bindValue(':date_fin',$date_fin);
  $requete->bindValue(':ens1', $ens_matricule);
  $requete->bindValue(':ens2',$ens2);
  $requete->execute();
  //*****************************************************************************************


  //recuperations des projets de l'ens
  $requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :ens_matricule');

  $requete->bindValue(':ens_matricule',  $ens_matricule);
  $requete->execute();
  $ens= $requete->fetch();

  $projets_str=$ens[6];

  //recuperatin de l'identifiant du projet inseré
  $requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
  $requete->bindValue(':name_proj',$name_proj) ;
  $requete->execute();
  $projet= $requete->fetch();
  $projet_id=$projet[0];

  //insertion dans la table de l'enseignant
  if (!empty ( $projets_str)) {
    $projets_str=$projets_str.".";
  }

  $projets_str=$projets_str.$projet_id;

  $requete = $conn->prepare('UPDATE ens1 SET projets = :projets WHERE ID = :ens_matricule');

  $requete->bindValue(':ens_matricule', (String) $ens_matricule);
  $requete->bindValue(':projets', (String) $projets_str);
  $requete->execute();
  $nom = $_SESSION['nom'] ;
  $prenom = $_SESSION['prenom'] ;
  $chemin=$_SESSION['photo'];
?>

  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

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
                 <a href="#" class="logo"><img src="../img/logoo1.png" height="40" width="110"></a>
            <div class="nav notify-row" id="top_menu">

            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../index.php">Déconnexion </a></li>
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

                  <p class="centered"><a href="profil.php"><img src=<?php echo $chemin ?> class="img-circle" width="80" height="80 "></a></p>
                  <h5 class="centered"><?php echo $nom." ".$prenom; ?></h5>
                    <li class="mt">
                      <a  href="compte.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Aceuil</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="#">
                          <i class="fa fa-dashboard"></i>
                          <span>Ajouter un projet</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a  href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Supprimer un projet</span>
                      </a>
                  </li>
                    <li class="sub-menu">

                        <a  href="page_agenda.php" >
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


            <!-- BASIC FORM ELELEMNTS -->
               <div class="row ">
              <div class="col-lg-12" style="display: flex ;justify-content:center  ">
                  <div class="form-panel container" >
                      <h4  class="mb"> Ajout d'un Planning</h4>


                      <form class="form-horizontal style-form" method="post" action="ajouter_phase.php" >
                          <input type="hidden" name="nombre">
                        <div class="input-group row" id="nb">
                          <span class="input-group-addon">Nombre des phases </span>
                          <input type="number" class="form-control input-lg" name="nomprojet" id="nbphase" required="Champs obligatoire" >

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

         <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/js_compte/jquery.js"></script>
    <script src="../js/js_compte/bootstrap.min.js"></script>
    <!--common script for all pages-->
    <script src="../js/js_compte/common-scripts.js"></script>



  <script type="text/javascript">

  //fonction pour permettre a lencadreur d'initialiser les phases de projet


      $("#nbphase").change(function(){
      var nb = document.getElementById("nbphase").value ;
      var hid = document.querySelector('input[type=hidden]') ;
      hid.value = nb  ;
      var form = document.querySelector('form') ;
      for(var i = 0 ; i<nb ; i++) {
      //créer une div

      var div =  document.createElement('div') ;
      div.className = "input-group row" ;
      //creer une span
       var span=  document.createElement('span') ;
       span.className = "input-group-addon" ;
       span.textContent = " le nom de phase "+ (i+1) ;
      // créer une input pour le nom de phase
        var input =  document.createElement('input') ;
        input.className = "form-control input-lg" ;
        input.name = "phaseName" + (i+1) ;
        input.setAttribute("required" , "Champs obligatoire");

        // ajouter les elements au dom
        div.appendChild(span) ;
        div.appendChild(input) ;

        // ajouter le titre
        var titre= document.createElement('h4') ;
        titre.style.padding='10px' ;
        var textTitre = document.createTextNode("Phase"+(i+1)) ;
        titre.appendChild(textTitre) ;
        titre.style.color= "#d9534f" ;

        var input1 =  document.createElement('input') ;
        input1.className = "form-control input-md inp" ;
        input1.placeholder= "La date de début de la phase " ;
        input1.type = "text" ;
        input1.setAttribute("onfocus", "(this.type='date')") ;
        input1.name = "DateDebut"+(i+1);
        input1.setAttribute("required" , "Champs obligatoire");

        var input2 =  document.createElement('input') ;
        input2.className =  "form-control input-md inp" ;
        input2.placeholder= "La date de fin de la phase" ;
        input2.type = "text" ;
        input2.setAttribute("onfocus", "(this.type='date')") ;
        input2.name = "DateFin"+(i+1);
        input2.setAttribute("required" , "Champs obligatoire");




        form.appendChild(titre) ;
        form.appendChild(div) ;
        form.appendChild (input1);
        form.appendChild (input2) ;


    }
    var btn = document.createElement('input') ;
    btn.type = 'submit' ;
    btn.value = 'Continuer' ;
    btn.className = " btn btn-primary" ;
    form.appendChild(btn) ;
    document.getElementById("nb").remove();


    // en php les noms : le name de input de nombre de phases est : nombre
    // les names des inputs des noms des phases : phaseName1 , phaseName2 ... phaseName(nb)
    // les names des inputs des noms des reunions et livrables : nbLivrable1 .. ,  nbReunion1 ,,,
});


      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

<?php

}

else { //message d'erreur
  header('Location: pageAjout_Projet.php?insere=1') ; 
}

?>
