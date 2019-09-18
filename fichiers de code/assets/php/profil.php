 <?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();


 $_SESSION['PASS'] = 0 ; 
  $_SESSION['tof'] = 0 ;
$type_user=$_SESSION['type_user'] ;
$id=$_SESSION['id'] ;
$chemin=$_SESSION['photo'];

$_SESSION['photo']=$chemin;

if ($type_user=='etudiant')
{
  $req = $bdd->prepare('SELECT nom,prenom,mail,tele  FROM etud WHERE  id = :id  ');
  $req->execute(array(
      'id' => $id
      ));
  $resultat = $req->fetch();}
else
{
  $req = $bdd->prepare('SELECT nom,prenom,mail,tele,bureau FROM ens1 WHERE  id = :id  ');

 $req->execute(array(
      'id' => $id

      ));
  $resultat = $req->fetch();
 $_SESSION ['bureau'] = $resultat['bureau'] ;
}
$_SESSION['mail']=$resultat['mail'];
$_SESSION['tele']=$resultat['tele'];
$_SESSION['nom']=$resultat['nom'];
$_SESSION['prenom']=$resultat['prenom'];


///////////////////////////////////////////////////////////////le profil ///////////////////////////////////////////////////////////
?>


          <!DOCTYPE html>

          <html >

            <head>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="description" content="">
              <meta name="author" content="Dashboard">
              <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

              <title>Profil </title>

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

                            <p class="centered"><a href="profil.php"><img height="80" src= <?php echo $chemin  ?> class="img-circle" width="80"></a></p>
                            <h5 class="centered"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                              <li class="mt">
                                <a href="compte.php"  >
                                    <i class="fa fa-home"></i>
                                    <span>Acceuil</span>
                                </a>
                              </li>
                            <li class="sub-menu">
                               <a href="#" id="active" >
                               <i class="fa fa-user"></i>
                               <span>Profil</span>
                               </a>
                            </li>

                               <li class="sub-menu">

                                  <a  href="page_agenda_ens.php" >
                                    <i class="fa fa-calendar"></i>
                                    <span >Mon agenda</span>
                                </a>
                            </li>
                          </ul>
                    </div>
                </aside>
                <!--sidebar end-->

                <!-- **********************************************************************************************************************************************************
                MAIN CONTENT
                *********************************************************************************************************************************************************** -->
        <style type="text/css">
        body {
          font-size: 13px !important ; 
        }
          .intro {
            background: white ; 
             padding : 20px 25px ; 
             padding-left:  40px ; 
             box-shadow: 0px 3px 2px #aab2bd ; 

          }
          .intro h5 {
            color : #d3d3d3 ;
           



          }
          .intro h2 {
                   color : #48cfad ; 
          }
          .btn-primary {
            margin: 20px 4px ;
             color : white !important;
             background: #48bcb4 !important; 
             border-color: #48bcb4 !important; 
             border-radius: 5px ; 
             

          }
              .btn-primary a{
             color : white !important;
            font-size: 14px ; 
             }
             .tof {
              display: flex ; 
              justify-content:center ; 
              align-items:  center ; 

             }
             .tof img {
              border-radius: 50% ; 
              border : 12px solid #f1f2f7;
             }

             .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
              padding-left : 5%;
             }
        </style>     
    <section id="main-content">
        <section class="wrapper" style='margin-right:20px ; margin-left:20px ; width:96%;  margin-top:70px   ' >

          <div class="row ">

               
  <div class="col-md-12 intro">
    <div class="col-md-6 ">
      
            <h2 ><b><?php echo $resultat['nom']." ". $resultat['prenom'];?></b></h2>
            <h5 > <?php if ($type_user=='etudiant') {
                   echo "Etudiant (e) à l'école supérieure d'informatique" ;
            }else {
              echo "Enseignant(e) à l'école supérieure d'informatique " ;
            } ?> </h5>
          <button class="btn btn-primary button" style="font-size: 14px"> <a href="modifier-profil.php?"> <i class="fa fa-edit"></i> Modifier mon Profil</a> </button>
    </div>
     <div class="col-md-6 tof">
          <div class="profile-img"><img height="160" width="160" src=<?php echo $chemin?> ></div>
     </div>
    </div>
  
</div>
</section>
</section>


  <!-- basic informations -->
<section id="main-content" >
       

        <div class="row">
                    <div class="col-md-12">
                        <div class="content-panel" style="margin:5px 20px 20px 20px ">
                            <hr >
                          <table class="table table-striped" style="color : rgba(70, 79, 88, 1) ; border : none; " >
                              <thead>
                              <tr>

                                  <th style="text-decoration:underline; ">Type</th>
                                  <th style="text-decoration:underline; ">Description</th>

                              </tr>
                              </thead>
                              <tbody>
                              <tr>

                                  <td>Nom et Prénom</td>
                                  <td><?php echo $resultat['nom']." ". $resultat['prenom'];?></td>

                              </tr>
                              <tr>
                                  <td>Email</td>
                                  <td><?php echo $resultat['mail'];?></td>

                              </tr>

                                <tr>

                                  <td>Numéro de télephone</td>
                                  <td><?php echo $resultat['tele'];?></td>

                              </tr>
                                  <tr>

                                  <td><?php if ($type_user=='etudiant') {
                                echo "Ecole d'etude" ;
                              }else {
                            echo "Ecole de travail" ;
                             } ?></td>

                                  <td>Ecole supérieure d'informatique </td>

                              </tr>
                                  <tr>

                                  <td><?php if ($type_user=='etudiant') {
                                echo "Le matricule" ;
                              }else {
                            echo "Numéro de bureau" ;
                             } ?></td>
                                  <td>

                                    <?php if ($type_user=='etudiant') {
                                     echo $id ;
                             }else {
                                     echo $resultat['bureau'];
                             } ?></td>

                              </tr>


                              </tbody>
                          </table>
                        </div>
                    </div><!-- /col-md-12 -->
        </div><!-- row -->

</section>


   <!--footer start-->
                <footer class="site-footer">
                    <div class="text-center">
                   @copyright projet 4 équipe 23 
                        <a href="#" class="go-top">
                            <i class="fa fa-angle-up"></i>
                        </a>
                    </div>
                </footer>
                <!--footer end-->
           
</section>
</body>



             



</body>

                <!-- js placed at the end of the document so the pages load faster -->
<script src="../js/js_compte/jquery.js"></script>
<script src="../js/js_compte/bootstrap.min.js"></script>
<script src="../js/js_compte/common-scripts.js"></script>


</html>
