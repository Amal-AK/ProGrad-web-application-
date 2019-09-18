<?php
// conexion la base de données
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

session_start();
$_SESSION['type_user']="enseignant";
$password = $_POST['pass'];
$email = $_POST['email'];
//recuperation mail && mot de passe

  $type='ENS';
  $req = $bdd->prepare('SELECT id,nom,prenom,pass FROM ens1 WHERE  mail = :mail  ');
  $req->execute(array(
      'mail' => $email
      ));
  $resultat = $req->fetch();
  if ( $resultat['pass']==$password)
      {$isPasswordCorrect=true;}
  else
  {$isPasswordCorrect=false;}

   if (!$resultat)
   {
    /****************************mail n' existe pas *******************************************/
      ?>


        <!DOCTYPE >
<html lang="en">
<head>
  <title>Connexion </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/connexion.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
</head>
<body>
<style type="text/css">


  .wrap-input100 {
    margin-bottom: 10px ;
  }
  .alert.alert-danger {

    color: red ;
  }
</style>

<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top  ">
  <div class="container">
    <div class="inline-item ">
       <a class="navbar-brand" href="#"><img src="../img/logoo1.png" height="40" width="110"></a>
    
      </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

    <ul class="navbar-nav  " >
       <li class="nav-item">
            <a class="nav-link" href="index.php" >Acceuil</a>
       </li>
       <li class="nav-item">
            <a class="nav-link active" href="#">Connexion</a>
       </li>
       <li class="nav-item">
            <a class="nav-link " href="../../inscription.html">Inscription</a>
       </li>
       <li class="nav-item">
            <a class="nav-link" href="index.php#services">Aide</a>
        </li>
    </ul>
  </div>
</div>
</nav>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('../img/background-connexion1.png');">
      <div class="wrap-login100">

        <form class="login100-form validate-form" method="POST" action="../php/connexion_ens.php">
          <input type="hidden" name="type_user" value='enseignant'>
          <span class="login100-form-logo">
              <img src="../img/logo_yelow.png" height="44" width="32">
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
           <div class="alert alert-danger">
              <strong>Erreur ! </strong> Votre Email n'existe pas !
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

            <a class="txt1" href="rénitialisation.php">
            <input type="hidden" name="type_user" value='enseignant'>
              Mot de passe oublié ?
            </a>

          </div>
          <div class="text-center p-t-10 justify-content-space-between">
            <a class="txt1" href="inscription.html">
              Inscription
            </a>

          </div>

        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="../js/connexion.js"></script>

</body>
</html>


      <?php
   }
   else
  {if ($isPasswordCorrect)
    {

        $_SESSION['nom'] = $resultat['nom'];
        $_SESSION['email'] = $email;
        $_SESSION['prenom'] =$resultat['prenom'];
        $_SESSION['id'] =$resultat['id'];
     }
    else {
      /*****************************mot de passe incorrect *********************************/
      ?>

 <!DOCTYPE >
<html lang="en">
<head>
  <title>Connexion </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/connexion.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
</head>
<body>
<style type="text/css">


  .wrap-input100 {
    margin-bottom: 10px ;
  }
  .alert.alert-danger {

    color: red ;
  }
</style>

<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top  ">
  <div class="container">
    <div class="inline-item ">
       <a class="navbar-brand" href="#"><img src="../img/logoo1.png" height="40" width="110"></a>
  
      </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

    <ul class="navbar-nav  " >
       <li class="nav-item">
            <a class="nav-link" href="index.php">Acceuil</a>
       </li>
       <li class="nav-item">
            <a class="nav-link active" href="#">Connexion</a>
       </li>
       <li class="nav-item">
            <a class="nav-link " href="../../inscription.html">Inscription</a>
       </li>
       <li class="nav-item">
            <a class="nav-link" href="index.php#services">Aide</a>
        </li>
    </ul>
  </div>
</div>
</nav>

  <div class="limiter">
    <div class="container-login100" style="background-image: url('../img/background-connexion1.png');">
      <div class="wrap-login100">

        <form class="login100-form validate-form" method="POST" action="../php/connexion_ens.php">
          <input type="hidden" name="type_user" value='enseignant'>
          <span class="login100-form-logo">
            <img src="../img/logo_yelow.png" height="44" width="32">
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
           <div class="alert alert-danger">
              <strong>Erreur ! </strong> mot de passe incorrecte
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

            <a class="txt1" href="rénitialisation.php">
            <input type="hidden" name="type_user" value='enseignant'>
              Mot de passe oublié ?
            </a>

          </div>
          <div class="text-center p-t-10 justify-content-space-between">
            <a class="txt1" href="inscription.html">
              Inscription
            </a>

          </div>

        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="../js/connexion.js"></script>

</body>
</html>



      <?php

  }
}
if (isset($_SESSION['nom'])AND isset($_SESSION['prenom']))
{

  $rep = $bdd->prepare('SELECT chemin FROM photos WHERE  id_user = :id && type_user = :type_user ');
  $rep->execute(array(
      'id' => $resultat['id'],
      'type_user' => $type
   ));
  $resultat1 = $rep->fetch();
  if   (!$resultat1)
  {
     $chemin='uploads/default.jpg'      ;
  }
  else
  {

  $chemin=$resultat1['chemin'];
  }

 $_SESSION['photo']=$chemin;

?>
<!--//////////////////////////////////////////////////////le compte d un encadreur ///////////////////////////////////////////////////////////////////-->
<!DOCTYPE html>

<html >

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Compte enseignant </title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="../css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../css/icon.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="../css/compte-enseignant.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

  <script src="../js/chart-master/Chart.js"></script>

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

                <p class="centered"><a href="profil.php"><img src=<?php echo $chemin ?> class="img-circle" width="80" height="80"></a></p>
                <h5 class="centered"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                  <li class="mt">
                    <a href="#" id="active" data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                        <i class="fa fa-home"></i>
                        <span>Acceuil</span>
                    </a>
                  </li>
                <li class="sub-menu">
                    <a href="pageAjout_Projet.php?insere=0" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !">
                        <i class="fa fa-plus-square-o"></i>
                        <span>Ajouter un projet</span>
                    </a>
                  </li>
                  <li class="sub-menu">

                        <a  href="#" onclick="changer()" data-toggle="tooltip" data-placement="right" title="Atenttion c'est pas possible de récupérer!">
                          <i class="fa fa-trash"></i>
                          <span >Supprimer un projet</span>
                      </a>
                  </li>
                    <li class="sub-menu">

                        <a  href="page_agenda_ens.php" data-toggle="tooltip" data-placement="bottom" title="Voir les réunions de tout vos projets !" >
                          <i class="fa fa-calendar"></i>
                          <span >Consulter mon agenda</span>
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
        <section class="wrapper" >
          <div class="col-lg-8 ">
             <div    class="showback pfe">
               <div  class="row">
                  <h4 class="titre"><i class="fa fa-angle-right"></i><b> Projets de PFE</b></h4>
                 <div class="col-lg-20 main-chart">
                  </div>
                 </div>
               </div>
                <!---fin des projets master---->

                  <!---début des projets de recherche---->
                  <div class="showback master">
                    <div class="row">
                       <h4 class="titre"><i class="fa fa-angle-right"></i><b> Projets de MASTER</b></h4>
                       <div class="col-lg-20 main-chart" >

                       </div>
                      </div>
                    </div>
                 </div>


              <!-- Modal -->

    <!-- *******************************************************************************************************************************************-->
   <div class="col-lg-4 ds" style="height: 600px">
                            <!--COMPLETED ACTIONS DONUTS CHART-->
                            <h3>NOTIFICATIONS</h3>
                                 <div    class="showback notif ">
                                  </div>
                                  </div><!-- /col-lg-4 -->

        </section>
    </section>


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


 <!-- le modal de supression des phases  -->
  <div class="modal fade" id="Modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Suppression d'un projet </h4>
          <button type="button" class="close" data-dismiss="modal" onclick="désactiver()">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="font-size:14px; ">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" style='padding:6px 8px; font-size:14px;  ' data-dismiss="modal" onclick="supp()">Valider</button>
        </div>
        

      </div>
    </div>
  </div>


</body>

    <!-- js placed at the end of the document so the pages load faster -->
  <script src="../js/js_compte/jquery.js"></script>
  <script src="../js/js_compte/bootstrap.min.js"></script>
  <script src="../js/js_compte/common-scripts.js"></script>

  <script src="../js/chargement_projet.js"> </script>  <!-- un fichier qui contient le fichier js de chargement -->

   <script type="text/javascript">
    // chargement des notifs
     $.ajax({
           url : 'notif_ens.php',
           type : 'GET',
           dataType : 'json',
           success : function(resultat,statut){


          var notif = resultat.notif ; // la table des notifs
          var i,k ;



          if(notif.length == 0)
          {
                var notifSpace = document.querySelector('.showback.notif ') ;
                notifSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center  ; > <img src="../img/fichier.png" height="150" width="150" ></div><h3 style="text-align: center; color : #b3b3b3">Aucune notification !</h3>' ;
          }
          else
          {


              for (i=0 ; i< notif.length +1; i++)
                {k=i;
                  var divParent = document.createElement('div') ;
                  divParent.className = 'desc' ;
                  divParent.id = '1' ;
                  var div= document.createElement('div') ;
                  div.className="thumb" ;
                  div.id=2;
                  var span = document.createElement('span') ;
                  span.className = "badge bg-theme" ;
                  var icon = document.createElement('i') ;
                  icon.className="fa fa-clock-o";
                  var divprin= document.createElement('div') ;
                  divprin.className="details" ;
                  divprin.id=3;
                  var text = document.createElement('p') ;
                  var muted=document.createElement('muted');
                  var temps = document.createTextNode(notif[k]['datetime'] +" ") ;
                  var saut_ligne1=document.createElement('br');
                  var ligne = document.createElement('a') ;
                  var nom = document.createTextNode("    "+notif[k]['user'] +" ") ;
                  var action = document.createTextNode(notif[k]['action'] +" " ) ;
                  var saut_ligne=document.createElement('br');
                  span.appendChild(icon) ;
                  div.appendChild(span);
                  divParent.appendChild(div);
                  muted.appendChild(temps);
                  muted.appendChild(saut_ligne1);
                  text.appendChild(muted) ;
                  ligne.appendChild(nom);
                  text.appendChild(ligne);
                  text.appendChild(action);
                  divprin.appendChild(text);
                  divParent.appendChild(divprin) ;
                  var notifSpace = document.querySelector('.showback.notif ') ;
                  notifSpace.appendChild(divParent);
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
      </script>

<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });



</script>


<!--________________________________________________________________________________________________________________________________________-->

<script type="text/javascript">
      $(document).ready(function () {
      var unique_id = $.gritter.add({
          // (string | mandatory) the heading of the notification
          title: 'BIENVENUE!',
          // (string | mandatory) the text inside the notification

          // (string | optional) the image to display on the left
          image: '../img/ui-sam.jpg',
          // (bool | optional) if you want it to fade out on its own or just sit there
          sticky: true,
          // (int | optional) the time you want it to be alive for before fading out
          time: '',
          // (string | optional) the class name you want to apply to that specific message
          class_name: 'my-sticky-class'
      });

      return false;
      });
</script>

<!--________________________________________________________________________________________________________________________________________-->

<script type="application/javascript">
      $(document).ready(function () {
          $("#date-popover").popover({html: true, trigger: "manual"});
          $("#date-popover").hide();
          $("#date-popover").click(function (e) {
              $(this).hide();
          });

          $("#my-calendar").zabuto_calendar({
              action: function () {
                  return myDateFunction(this.id, false);
              },
              action_nav: function () {
                  return myNavFunction(this.id);
              },
              ajax: {
                  url: "show_data.php?action=1",
                  modal: true
              },
              legend: [
                  {type: "text", label: "Special event", badge: "00"},
                  {type: "block", label: "Regular event", }
              ]
          });
      });


      function myNavFunction(id) {
          $("#date-popover").hide();
          var nav = $("#" + id).data("navigation");
          var to = $("#" + id).data("to");
          console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
      }

//__________________________________________________________________________________________________________________________________________________

      function changer() { // une fonction pour afficher les cases à cocher de suppression des projets lors de clic sur le button supprimer
       var elem= document.querySelectorAll("input[type=checkbox]");
       var i =0 ;
       for(i=0 ; i<elem.length ; i++) {
        elem[i].style.display = 'block' ;
       }

      }

//__________________________________________________________________________________________________________________________________________________

      function supprimer (id) { // supprmier un projet
           var elem = document.getElementById(id);
           var nom= elem.nextElementSibling.nextElementSibling.textContent; 
      
          var selct= $(".modal-body") ; 
          selct[0].innerHTML="Voulez-vous confirmer la suppression du projet : '<span>"+nom+"</span>'  ?";

           $('#Modal').modal('show');



      }





      function supp() {

      
     
          var nom= $(".modal-body span") ; 
          nom = nom[0].textContent ; 


              $.ajax(
            {
            method:'get',
            url:'supprim_projet.php',
            data:
            {
                'param': nom
            }
          });

        var input= document.querySelectorAll("input[type=checkbox]");
         var i =0 ;
         for(i=0 ; i<input.length ; i++) {
           input[i].style.display = 'none' ;
           if (input[i].checked == true){
            input[i].parentNode.remove() ; 
       
           }
         }      

      }

    function désactiver() {
        var input= document.querySelectorAll("input[type=checkbox]");
         var i =0 ;
         for(i=0 ; i<input.length ; i++) {
           input[i].style.display = 'none' ;
           input[i].checked = false ; 
           
         }


    }

  </script>



</body>
</html>



<?php

}
else {



}
?>
