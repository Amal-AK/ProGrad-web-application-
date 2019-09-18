<?php
 session_start() ;
 $_GET['insere']=0 ;
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

//generer un matricule
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i<10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
//On récupère les variables
    $nom=$_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $num_tele = $_POST['Numéro'];
    $n_bureau = $_POST['bureau'];
    $matricule= $randomString;
    $mes_projets="";

//verifier si le compte n'existe pas deja

$req = $bdd->prepare('SELECT id FROM ens1 WHERE  mail = :mail  ');
$req->execute(array(
    'mail' => $email
    ));
$resultat = $req->fetch();

if ($resultat)
{
  /////////////////////////////////////////email existant//////////////////////////////////////////////////
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>inscription</title>
  <meta charset="UTF-8">
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
<!--===============================================================================================-->
</head>
<body>
  <style type="text/css">
      .alert.alert-danger {

    color: red ;
    width : 100%;

  }
  </style>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top  ">
  <div class="container">
    <div class="inline-item justify-content-space">
      <a class="navbar-brand" href="#"><img src="../img/logoo1.png" height="40" width="85"></a>
      </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

    <ul class="navbar-nav  " >
       <li class="nav-item">
            <a class="nav-link" href="../../index.php">Aceuil</a>
       </li>
          <li class="nav-item">
            <a class="nav-link" href="../../connexion-encadreur.php">Connexion</a>
       </li>
       <li class="nav-item">
            <a class="nav-link active" href="#">Inscription</a>
       </li>
       <li class="nav-item">

         <li class="nav-item">
            <a class="nav-link" href="#">Service</a>
        </li>
    </ul>
  </div>
</div>
</nav>

  <div class="limiter">

    <div class="container-login100">
      <div class="wrap-login100">
          <div class="alert alert-danger">
              <strong>Erreur ! </strong> L'email utilisé existe déja !
           </div>
          <span class="login100-form-title">
            Créez votre compte !
          </span>


        <form class="login100-form validate-form"  method="POST" action="inscription.php">

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
          <div class="wrap-input100 validate-input" data-validate = "Composé éxactement de 10 chiffres ">
            <input class="input100" type="tel" name="Numéro" placeholder="Numéro de téléphone " required="Champ obligatoire">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Veuillez donner votre numéro de bureau">
            <input class="input100" type="text" name="bureau" placeholder=" Numéro de bureau">


            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-home" aria-hidden="true"></i>
            </span>
          </div>
          <div class="container-login100-form-btn">
            <button class="login100-form-btn ">
              Inscription
            </button>
          </div>


          <div class="text-center p-t-10">
            <a class="txt2" href="#">
              Créer votre compte
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>




<!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="../js/inscription.js"></script>

</body>
</html>

<?php




}
else {


  // Insertion




$req = $bdd->prepare('INSERT INTO ens1 (id,nom,prenom,mail,tele,bureau,projets,pass) VALUES(:id,:nom,:prenom,:mail,:tele,:bureau,:projets,:pass)');
$req->execute(array(
    'id' =>$matricule,
    'nom' =>$nom ,
    'prenom' =>$prenom,
    'mail' =>$email,
    'tele' =>$num_tele,
    'pass' =>$password,
    'bureau' =>$n_bureau,
   'projets' =>$mes_projets));
   $type='ENS';
   $type_user='enseignant';
   $_SESSION['id']= $matricule;
   $_SESSION['type_user']=$type_user;
   $_SESSION['photo']='default.php';
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $chemin="uploads/default.png";
    $_SESSION['photo']=$chemin;


   $req1 = $bdd->prepare('INSERT INTO photos VALUES (null,:chemin,:id_user,:type_user)');
   $req1->execute(array(
       'chemin' =>$chemin,

       'id_user' =>$matricule,
       'type_user' =>$type
      ));

?>



  <!DOCTYPE html>
<html lang="en">
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

                  <p class="centered"><a href="profil.php"><img src=<?php echo $chemin ?>  class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $nom." ".$prenom?></h5>
                    <li class="mt">
                      <a href="compte.php" id="active" >
                          <i class="fa fa-home"></i>
                          <span>Aceuil</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="pageAjout_Projet.php?insere=0" >
                          <i class="fa fa-plus-square-o"></i>
                          <span>Ajouter un projet</span>
                      </a>
                    </li>
                    <li class="sub-menu">

                          <a  href="#">
                            <i class="fa fa-trash"></i>

                            <span >Supprimer un projet</span>

                        </a>
                      </li>




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
               <div    class="showback ">
                 <div  class="row">
                    <div class="col-lg-20 main-chart">
                        <h4 class="titre"><i class="fa fa-angle-right"></i><b> Projet de PFE</b></h4>
                        <div class="row" style="display:flex ; justify-content: center  ">
                          <img src="../img/fichier.png" height="130" width="150" >
                        </div>
                         <h3 style="text-align: center; color : #b3b3b3">Votre espace est vide !</h3>
                     </div>
                </div>
              </div>

             <div class="showback ">
                <div class="row">
                    <div class="col-lg-20 main-chart">
                        <h4 class="titre"><i class="fa fa-angle-right"></i><b> Projet de MASTER</b></h4>
                          <div class="row" style="display:flex ; justify-content: center  ">
                          <img src="../img/fichier.png" height="130" width="150" >

                        </div>
                        <h3 style="text-align: center; color : #b3b3b3">Votre espace est vide !</h3>
                    </div>
                </div>
              </div>
            </div>
           <div class="col-lg-4 ds" style="height:600px ; ">
              <h3>NOTIFICATIONS</h3>




                  </div><!-- /col-lg-3 -->

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
    <script src="../js/js_compte/common-scripts.js"></script>

    <script src="../js/chargement_projet.js"> </script>  <!-- un fichier qui contient le fichier js de chargement -->


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



    </script>


  </body>
</html>
<?php } ?>
