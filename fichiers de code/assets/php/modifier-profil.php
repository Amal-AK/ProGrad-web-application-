<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();
$type_user=$_SESSION['type_user'] ;
$id=$_SESSION['id'] ;
$_SESSION['id']=$id;
$_SESSION['type_user']=$type_user;

$nom=$_SESSION['nom'];
$_SESSION['nom']=$nom;
$prenom=$_SESSION['prenom'];
$_SESSION['prenom']=$prenom;
$mail=$_SESSION['mail'];
$_SESSION['mail']=$mail;
$tele=$_SESSION['tele'];
$_SESSION['tele']=$tele;
$chemin =$_SESSION['photo'] ;
$_SESSION['photo']=$chemin ;
$_SESSION['here'] = 'nothere' ;
$tof= $_SESSION['tof'] ;
$_GET['tof']=0 ;
$passwd = $_SESSION['PASS'] ;
if ($type_user=="enseignant")
{  $req = $bdd->prepare('SELECT pass FROM ens1 WHERE  id = :id  ');
  $req->execute(array(
      'id' => $id
      ));
  $resultat = $req->fetch();}
else {
  $req = $bdd->prepare('SELECT pass FROM etud WHERE  id = :id  ');
    $req->execute(array(
        'id' => $id
        ));
    $resultat = $req->fetch();
}

$pass1 = $resultat['pass'];



 if($type_user != 'etudiant') { $bureau = $_SESSION['bureau'] ;}

?>
  <!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>modifier profil </title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../css/modif-profil.css" rel="stylesheet">
       <link href="../css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <body>

  <section id="container" >

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
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modifier votre photo de profil</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Votre photo de profil est modifiée!
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    <!-- The Modal -->
<div class="modal fade" id="Modal">
  <div class="modal-dialog modal-sm ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modifier le mot de passe</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Votre mot de passe a été modifié!
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="profil.php"><img height="80" src= <?php echo $_SESSION['photo']  ?> class="img-circle" width="80" style="border-radius:50% "  ></a></p>
              	  <h5 class="centered"> <?php echo $_SESSION['nom']." ".$_SESSION['prenom'] ?></h5>


                  <li class="mt">
                      <a href="compte.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Acceuil</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="profil.php" >
                          <i class="fa fa-user"></i>
                          <span>Profil</span>
                      </a>
                  </li>

                  <li class="sub-menu ">
                      <a href="javascript:;" class="active" >
                          <i class="fa fa-cogs"></i>
                          <span>Modifier Profil</span>
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
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <h3 class="titre"><i class="fa fa-angle-right"></i> Paramétres du compte</h3>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">

                       <div class="row" style="padding-top: 10px ; padding-bottom:0px  ">


                          <div class="col-md-12 image_profil" >
                             <img src=<?php echo $_SESSION['photo'] ?> height="150" width="150" class="profil-image">

                          </div>
                           <div class="col-md-12 image_profil" id="buttonPhoto" >
                              <button class="btn modif" onclick="modifier_photo('buttonPhoto' ,'.custom-file')"><i class="fa fa-pencil"></i></button>
                          </div>


                             <div class="custom-file col-md-12" >
                              <!--__________________ le formulaire de modification profil ___________________________-->

                              <form method="POST" action="modifier_photo.php"  enctype="multipart/form-data">
                                <input type="file" name="avatar" required="Champs obligatoire" />
                                <input type="submit" value="mettre a jour ma photo" class="btn btn-primary" id="saveImg"  />


                                </form>
                           </div>


                         </div>


                          <table class="table table-striped table-advance table-hover">

	                  	  	  <hr style="border: 1px solid #C8CCD4 !important">
                              <thead>
                              <tr>
                                  <th>Type</th>
                                  <th> Description</th>
                                  <th> Option</th>


                              </tr>

                              </thead>
                              <tbody>
                                  <tr>
                                  <td>Nom  </td>
                                  <td id="name"> <span><?php echo $_SESSION['nom'] ?></span><input type="text" name="" ></td>
                                 <td><button class="btn btn-primary " onclick="edit('name')" ><i class="fa fa-pencil"></i></button><button class="check btn btn-primary"><i class="fa fa-check"  onclick="changebutton('name')" </i></button></td>
                              </tr>
                                <tr>
                                  <td>Prénom  </td>
                                  <td id="prenom"> <span><?php echo $_SESSION['prenom']?></span><input type="text" name="" ></td>
                                 <td><button class="btn btn-primary " onclick="edit('prenom')" ><i class="fa fa-pencil"></i></button><button class="check btn btn-primary"><i class="fa fa-check"  onclick="changebutton('prenom')" </i></button></td>
                              </tr>
                                <tr>
                                  <td>Email </td>
                                  <td id="mail"> <span><?php echo $_SESSION['mail'] ;?></span><input type="text" name=""></td>
                                 <td><button class="btn btn-primary " onclick="edit('mail')" ><i class="fa fa-pencil"></i></button><button  class="check btn btn-primary"><i class="fa fa-check" onclick="changebutton('mail')"></i></button></td>
                              </tr>
                                <tr>
                                  <td>Numéro du télèphone </td>
                                  <td id="telephone"> <span><?php echo $_SESSION['tele'] ;?></span><input type="text" name=""></td>
                                 <td><button class="btn btn-primary " onclick="edit('telephone')" ><i class="fa fa-pencil"></i></button><button  class="check btn btn-primary"><i class="fa fa-check" onclick="changebutton('telephone')"></i></button></td>
                              </tr>
                                 <tr>
                                  <td><?php if ($type_user=='etudiant') {
                                echo "Le matricule" ;
                              }else {
                                echo "Numéro de bureau" ;
                             } ?></td>

                                  <td id="nmr"> <span>
                                    <?php if ($type_user=='etudiant') {
                                     echo $_SESSION['id'] ;
                                      }else {
                                    echo $_SESSION['bureau'];
                                 } ?></span><input type="text" name=""></td>
                                 <td><button class="btn btn-primary " onclick="edit('nmr')" ><i class="fa fa-pencil"></i></button><button class="check btn btn-primary" ><i class="fa fa-check" onclick="changebutton('nmr')"></i></button></td>

                              </tr>

                              </tbody>


                          </table>
                            <div class="alert alert-danger alert-dismissible fade in" style="display:none " >
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Erreur ! </strong> La date de fin est inférieure à la date de début !
                          </div>
                            <h4 style="text-align:center; margin-top: 50px;color:#4e96cd; font-weight:  bold; ">Mot de passe : </h4>

                            <form name="myForm" action="modif_passwd.php" onsubmit="return validateForm()" method="post" class="well">

                              <span ><input class="col-sm-8 inp form-control"  type="password" name="oldPasswd" placeholder="Ancien mot de passe" ></span>
                               <span ><input class="col-sm-8 inp form-control"  type="password" name="newPasswd" placeholder="Nouveau mot de passe"></span>
                               <span ><input class="col-sm-8 inp form-control" type="password" name="confirmPasswd" placeholder="Confirmer le nouveau mot de passe" class="inp"></span>
                               <span ><input class="col-sm-2 btn bleu" type="submit" name="save" value="Enregistrer" onsubmit="return validateForm()"></span>
                              </form>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->

              </div><!-- /row -->
		      </section>
      </section><!-- /MAIN CONTENT -->

   <!--footer start-->
                <footer class="site-footer">
                    <div class="text-center">
                 @copyright projet 4 équipe 23
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

    <!--script for this page-->

  <script>
<?php if ($tof=="1") {

?>
$("#myModal").modal("show") ;

<?php }
$_SESSION['tof']=0 ;

 ?> ;

<?php if ($passwd=="1") {

?>
$("#Modal").modal("show") ;

<?php }
$_SESSION['PASS']=0 ;

 ?> ;
/***************************************controle du form *********************************************/
    function validateForm() {
    var x = document.forms["myForm"]["oldPasswd"].value;
    var p = <?php echo $pass1 ?>;

    if (x != p) {


        document.forms["myForm"]["oldPasswd"].style.borderColor=" red " ;
       return false;


      }else {
          document.forms["myForm"]["oldPasswd"].style.borderColor=" #C8CCD4" ;
        var y = document.forms["myForm"]["newPasswd"].value;
        if(y.length < 8 ) {
           document.forms["myForm"]["newPasswd"].style.borderColor=" red " ;
          return false ;
        }else {
          document.forms["myForm"]["newPasswd"].style.borderColor=" #C8CCD4 " ;
           var z = document.forms["myForm"]["confirmPasswd"].value;

           if(z != y) {
             document.forms["myForm"]["confirmPasswd"].style.borderColor=" red " ;
            return false ;
           }else {
                document.forms["myForm"]["confirmPasswd"].style.borderColor=" #C8CCD4 " ;
           }
        }
      }



  }

  /******************************************************************************************************/

  function edit(id) {
    var elem = document.getElementById(id) ;
    var enfant = elem.childNodes ;
    var next= elem.nextElementSibling;
    var childs = next.childNodes ;
    childs[0].style.display='none' ;
    childs[1].style.display='block' ;
    enfant[2].placeholder=enfant[1].textContent ;
    enfant[1].style.display = 'none' ;
    enfant[2].style.display= 'block' ;

  }
/********************************************************************************************/
function changebutton ( id) {
    var elem = document.getElementById(id) ;
    var enfant = elem.childNodes ;
    var info = enfant[2].value ;
    var next= elem.nextElementSibling;
    var childs = next.childNodes ;


    if(id=="mail"){
         <?php if ($type_user=='etudiant') { ?>
        if(info.trim().match(/^[a-z]{1}_[a-zA-Z_\-]+@esi\.dz$/) != null) {
        <?php } else { ?>
           if(info.trim().match(/^[a-z]{1}_[a-zA-Z_\-]+@esi\.dz$/) != null) {
            <?php } ?>
            enfant[2].placeholder=enfant[1].textContent ;
            enfant[1].textContent= info ;
            enfant[1].style.display = 'block' ;
            enfant[2].style.display= 'none' ;
            childs[0].style.display='block' ;
            childs[1].style.display='none' ;
           enfant = $(".alert") ;
            enfant[0].style.display = "none" ;

              $.ajax(
                 {
               method:'get',
               url:'modif.php',
               data: {'info':info ,'elem':id }

                });
        }else {

            enfant = $(".alert") ;
            enfant[0].innerHTML =' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur ! </strong> Le format du mail est incorrect !' ;
            enfant[0].style.display = "block" ;
        }

    }
     if(id=="telephone"){

        if(info.trim().match(/^0[5-7][0-9]{8}$/) != null) {
            enfant[2].placeholder=enfant[1].textContent ;
            enfant[1].textContent= info ;
            enfant[1].style.display = 'block' ;
            enfant[2].style.display= 'none' ;
            childs[0].style.display='block' ;
           childs[1].style.display='none' ;
            enfant = $(".alert") ;
            enfant[0].style.display = "none" ;

              $.ajax(
                 {
               method:'get',
               url:'modif.php',
               data: {'info':info ,'elem':id }

                });
        }else {

            enfant = $(".alert") ;
            enfant[0].innerHTML =' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur ! </strong> Le numéro du téléphone est non valide !' ;
            enfant[0].style.display = "block" ;
        }

    }
     if(id=="nmr"){

        if(info.trim().match(/^[0-9a-zA-Z]*$/) != null) {
            enfant[2].placeholder=enfant[1].textContent ;
            enfant[1].textContent= info ;
            enfant[1].style.display = 'block' ;
            enfant[2].style.display= 'none' ;
            childs[0].style.display='block' ;
           childs[1].style.display='none' ;
            enfant = $(".alert") ;
            enfant[0].style.display = "none" ;

              $.ajax(
                 {
               method:'get',
               url:'modif.php',
               data: {'info':info ,'elem':id }

                });
        }else {

            enfant = $(".alert") ;
            enfant[0].innerHTML =' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur ! </strong> Le numéro du bureau est non valide !' ;
            enfant[0].style.display = "block" ;
        }

    }
     if(id=="name"|| id=="prenom"){

       if(info.trim().match(/^[a-zA-Z]{3,20}$/) != null) {
            enfant[2].placeholder=enfant[1].textContent ;
            enfant[1].textContent= info ;
            enfant[1].style.display = 'block' ;
            enfant[2].style.display= 'none' ;
            childs[0].style.display='block' ;
           childs[1].style.display='none' ;
            enfant = $(".alert") ;
            enfant[0].style.display = "none" ;

              $.ajax(
                 {
               method:'get',
               url:'modif.php',
               data: {'info':info ,'elem':id }

                });
        }else {

            enfant = $(".alert") ;
            enfant[0].innerHTML =' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Erreur ! </strong> Le nom/prènom est non valide !' ;
            enfant[0].style.display = "block" ;
        }

    }
    }


function modifier_photo (idbutton , idinput ) {
  var button=  document.getElementById(idbutton) ;
  var input= document.querySelector(idinput) ;
  button.style.display = 'none' ;
  input.style.display = 'block' ;
    input.style.display = 'flex' ;
    console.log(input.childNodes[1].value) ;

}

// ________________________________ modifier la photo de profil ___________________________________________

$('#saveImg').onclick(function(e){

  var button=  document.getElementById( 'buttonPhoto') ;
  var input= document.querySelector('.custom-file') ;
  button.style.display = 'block' ;
    button.style.display = 'flex' ;
  input.style.display = 'none' ;
});
  </script>

  </body>

</html>
<?php




$nom=$_SESSION['nom'];
$_SESSION['nom']=$nom;
$prenom=$_SESSION['prenom'];
$_SESSION['prenom']=$prenom;
$mail=$_SESSION['mail'];
$_SESSION['mail']=$mail;
$tele=$_SESSION['tele'];
$_SESSION['tele']=$tele;
$chemin =$_SESSION['photo'] ;
$_SESSION['photo']=$chemin ;
$id=$_SESSION['id'];
$_SESSION['id']=$id;
$_SESSION['here'] = 'nothere' ;












 ?>
