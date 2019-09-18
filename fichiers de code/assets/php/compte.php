   <?php
          session_start();

          $resultat['nom'] = $_SESSION['nom']  ;
          $resultat['prenom'] = $_SESSION['prenom'] ;
          $resultat['id']= $_SESSION['id'] ;
          $chemin=$_SESSION['photo'];

          $_SESSION['photo']=$chemin;
          $_SESSION['id']=$resultat['id'];

          $type_user = $_SESSION['type_user'] ;
         $_SESSION['type_user']=$type_user;
          if($type_user=='enseignant') {

////////////////////////////////////////////////////////////le compte d un enseignant///////////////////////////////////////////////////
          ?>



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

                            <p class="centered"><a href="profil.php"><img height="80" src= <?php echo $chemin  ?> class="img-circle" width="80"></a></p>
                            <h5 class="centered"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                              <li class="mt">
                                <a href="#" id="active" >
                                    <i class="fa fa-home"></i>
                                    <span>Acceuil</span>
                                </a>
                              </li>
                            <li class="sub-menu">
                                <a href="pageAjout_Projet.php?insere=0" >
                                    <i class="fa fa-plus-square-o"></i>
                                    <span>Ajouter un projet</span>
                                </a>
                              </li>
                              <li class="sub-menu">

                                    <a  href="#" onclick="changer()">
                                      <i class="fa fa-trash"></i>
                                      <span >Supprimer un projet</span>
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



                <!-- *******************************************************************************************************************************************-->

                             <div class="col-lg-4 ds" style="height: 600px ; ">
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
                   @copyright projet 4 équipe 23 
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
<script src="../js/chargement_projet.js">




    </script>




<!--________________________________________________________________________________________________________________________________________-->

  <script type="text/javascript">

     //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

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






<!--________________________________________________________________________________________________________________________________________-->

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
              notifSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center ; height: 420px ; "> </div><h3 style="text-align: center; color : #b3b3b3">Aucune notification !</h3>' ;
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




<?php
} else {
//////////////////////////////////////////////le compte d un etudiant/////////////////////////////////////////////////////

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Compte étudiant </title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="../css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../css/icon.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="../css/compte-enseignant.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

  <script type="text/javascript" src="/A03BF288-47D1-9543-8E03-9DC796E06DD8/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="/36E3F159-E7B0-C34E-A23F-65E50534764E/abn/main.css"/><script src="../js/chart-master/Chart.js"></script>

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

                <p class="centered"><a href="profil.php"><img height="80" src=<?php echo $chemin ?> class="img-circle" width="80"></a></p>
                <h5 class="centered"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                  <li class="mt">
                    <a href="#" id="active" >
                        <i class="fa fa-home"></i>
                        <span>Acceuil</span>
                    </a>
                  </li>
                    <li >
                    <a href="page_agenda_etud.php" >
                        <i class="fa fa-calendar"></i>
                        <span>Consulter l'agenda</span>
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
            <!-- début projet master -->
                 <div    class="showback pfe">
                 <div  class="row">
                   <h4 class="titre"><i class="fa fa-angle-right"></i><b> Projet de MASTER</b></h4>
                   <div class="col-lg-20 main-chart">
                    </div>
                   </div>
                 </div>
                  <!---fin des projets master---->

                    <!---début du projet de master---->
                    <div class="showback master">
                      <div class="row">
                         <h4 class="titre"><i class="fa fa-angle-right"></i><b> Projet de PFE</b></h4>
                         <div class="col-lg-20 main-chart" >

                         </div>
                        </div>
                      </div>

         </div>



    <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->

                <div class="col-lg-4 ds" style="height: 600px">
                  <!--COMPLETED ACTIONS DONUTS CHART-->
                  <h3>NOTIFICATIONS</h3>
                       <div    class="showback notif ">
                        </div>
                        </div><!-- /col-lg-4 -->




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
  <script src="./js/js_compte/bootstrap.min.js"></script>
  <!--common script for all pages-->
  <script src="../js/js_compte/common-scripts.js"></script>

  <!--Récu^pération des projet ! -->
<script src="../js/chargement_projet_etudiant.js">


</script>


<script>


    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

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


  <script type="text/javascript">
  // chargement des notifs
   $.ajax({
         url : 'notif_etudiant.php',
         type : 'GET',
         dataType : 'json',
         success : function(resultat,statut){


        var notif = resultat.notif ; // la table des notifs
        var i,k ;



        if(notif.length == 0)
        {
              var notifSpace = document.querySelector('.showback.notif ') ;
              notifSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center ; height: 420px ; "> </div><h3 style="text-align: center; color : #b3b3b3">Aucune notification !</h3>' ;

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
                var temps = document.createTextNode(notif[k][1] +" ") ;
                var saut_ligne1=document.createElement('br');
                var ligne = document.createElement('a') ;
                var nom = document.createTextNode("    "+notif[k][0] +" ") ;
                var action = document.createTextNode(notif[k][2] +" " ) ;
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



</body>
</html>




  <?php

}

?>
