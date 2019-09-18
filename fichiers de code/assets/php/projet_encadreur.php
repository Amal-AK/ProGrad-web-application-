<?php
session_start() ;
$chemin=$_SESSION["photo"] ;
$nom_projet = $_GET["nomProjet"] ;
$_SESSION['nomProjet'] =$nom_projet ;
$resultat['nom'] = $_SESSION['nom']  ;
$resultat['prenom'] = $_SESSION['prenom'] ;
$resultat['id']= $_SESSION['id'] ;
$_SESSION['projet'] = $nom_projet;
$_SESSION['typeuser'] = "enseignant" ;
$_SESSION['id'] = $resultat['id'] ;
$_SESSION['existe'] =0 ;

/*************************************la page du proje *******************************************/
?>

 <!DOCTYPE html>

<html >

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Page du projet</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min1.css">
    <link href="../css/projet.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  </head>

  <body>
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

</style>
  <section id="container" >

     <!--header start-->
      <header class="header black-bg bg-gradient-9">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation" ></div>
              </div>
                    <a href="#" class="logo"><img src="../img/logoo1.png" height="40" width="110"></a>
            <div class="nav notify-row" id="top_menu">

            </div>

            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                <li>
                  <div class="dropdown">
                    <span class="badge bg-warning" style="position:absolute ; right:11px ; top:0 ; z-index:100 "></span>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" ><i i class="fa fa-user"></i> </button>
                        <div class="dropdown-menu" style="font-size:13px ">

                        </div>
                    </div>
                </li>
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

                  <p class="center"><a href="profil.php"><img src=<?php echo $chemin ?> height="80" class="img-circle" width="80"></a></p>
                   <h5 class="center"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                    <li class="mt">
                      <a href="compte.php"  data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                          <i class="fa fa-home"></i>
                          <span>Acceuil</span>
                      </a>
                    </li>
                       <li class="sub-menu">
                      <a href="projet_encadreur.php" data-toggle="tooltip" data-placement="right" title="Créer un nouveau projet !" id="active">
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


</section>
   <section id="main-content">
    <section class="wrapper">

  <h2><i class="fa fa-angle-right"></i> Nom du projet :  <?php echo $nom_projet ?> </h2>
  <div class="container table-responsive">

    <!-- la table du planning ___________________________________________________-->

  <table class="table table-bordered " style="overflow-x:auto; background:white ">
    <thead >

      <tr class="table-active">
        <th> <i class="fa fa-plus-circle phase" data-toggle="modal" data-target="#myModal"></i> Les phases</th>
        <th > <i class="fa fa-plus-circle "  data-toggle="modal" data-target="#ModalRen"></i>réunions</th>
        <th > <i class="fa fa-plus-circle livrable" data-toggle="modal" data-target="#ModalLiv" ></i>livrables</th>
        <th>Commentaires</th>
      </tr>
    </thead>
    <tbody>



    </tbody>
  </table>
</div>





 <!-- le modal de supression des phases  -->
  <div class="modal fade" id="Modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Suppression d'une phase </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" style='padding:8px 10px; font-size:15px;  ' data-dismiss="modal" onclick="supprimer_phase()">Valider</button>
        </div>


      </div>
    </div>
  </div>


<!-- le modal des erreurs ______________________________________________________  -->

  <div class="modal fade" id="ModalErr">
    <div class="modal-dialog-sm modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Erreur </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          La date intoruite ne respecte pas les deadline de projet

        </div>


      </div>
    </div>
  </div>




  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une phase </h4>
          <button type="button" onclick="SuppDiv()" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body">
        <input type="text" name="newphase"  id="newName" class="form-control inp" placeholder="Nom de la phase " required="">
        <input type="text" name="datedeb" class="form-control inp" placeholder="date de debut de la phase " onfocus="(this.type='date')" required="" >
        <input type="text" name="datef" class="form-control inp" placeholder="date de fin de la phase" onfocus="(this.type='date')" required="">
        <div></div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
           <button type="button" class="btn btn-primary" style='padding:8px 10px; font-size:15px; background: #c82333 ; border-color: #bd2130 '  onclick="SuppDiv()" data-dismiss ='modal'>Quitter</button>
          <button type="button" class="btn btn-primary" style='padding:8px 10px; font-size:15px;  '  onclick="ajoutPhase()">Ajouter la phase</button>
        </div>

      </div>
    </div>
  </div>








 <!-- le modal d ajout d une reunion  -->
  <div class="modal fade" id="ModalRen">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajout d'une réunion </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

         <!-- Modal body -->
        <div class="modal-body">
        <input type="text" name="dateRen" class="form-control inp" placeholder="La date et l'heure de la réunion " onfocus="(this.type='datetime-local')" required="" >

        <input type="text" name="lieuRen" class="form-control inp" placeholder="Le lieu de la réunion"  required="">
       <div class="form-group">
       <label for="sel1" style="margin-top: 20px ; margin-left:30px;  ">Selectionner le type de la réunion </label>
        <select class="form-control" id="sel1">
          <option>Périodique</option>
          <option>Urgente</option>
        </select>
         </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" style='padding:8px 10px; font-size:15px;  ' data-dismiss="modal" onclick="ajouter_reunion()">Ajouter</button>
        </div>

      </div>
    </div>
  </div>


 <!-- le modal d ajout d un livrable   -->
  <div class="modal fade" id="ModalLiv">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Suppression d'une phase </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

         <!-- Modal body -->
        <div class="modal-body">
        <input type="text" name="dateRemise" class="form-control inp" placeholder="La date limite de remise" onfocus="(this.type='datetime-local')" required="" >

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" style='padding:8px 10px; font-size:15px;  ' data-dismiss="modal" onclick="ajouter_livrable()">Ajouter</button>
        </div>

      </div>
    </div>
  </div>



 <!-- le modal d ajout d un livrable   -->
  <div class="modal fade" id="ModifPhase">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modifier une phase </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

         <!-- Modal body -->
        <div class="modal-body">
            <div class="input-group">
             <span class="input-group-addon">Nom de phase </span>
             <input type="text" name="nom" class="form-control">

            </div>

          <div class="input-group">
             <span class="input-group-addon">Date de debut </span>
             <input type="text" name="dd" class="form-control" placeholder="Nom" onfocus="(this.type='date')" >

           </div>
            <div class="input-group">
             <span class="input-group-addon">Date de fin </span>
             <input type="text" name="df" class="form-control" placeholder="Nom" onfocus="(this.type='date')">

           </div>



        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" style='padding:8px 10px; font-size:15px;  ' data-dismiss="modal" onclick="modifier_phase()">Modifier</button>
        </div>

      </div>
    </div>
  </div>



   </section>

   </section>
   <!-- Trigger the modal with a button -->

 </body>

      <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/js_compte/jquery.js"></script>
    <script src="../js/js_compte/bootstrap.min.js"></script>
    <script src="../js/js_compte/common-scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">



function ajax ( ) {

  $.ajax({
       url : 'Recup_membre.php',
       type : 'GET',
       dataType : 'json',
       success : function(resultat,statut){

      var element = $('.dropdown-menu') ;
      element = element[0] ;
      var tableau = resultat.profil;
      var badge= $(".bg-warning");
      badge[0].textContent = tableau.length ;
      for(var i =0 ; i< tableau.length; i++){
        console.log(tableau[i]) ;
      var a = document.createElement('a') ;
      a.className = "dropdown-item" ;
      a.href = "recup_prof_mem.php?id_member="+tableau[i][0]+" & type_member=" +tableau[i][3];
      var txt = document.createTextNode(tableau[i][1]+" "+tableau[i][2]) ;
      a.appendChild(txt) ;
      element.appendChild(a ) ;
                      }
            } ,
                error : function(resultat , statut , erreur ){

                   var badge= $(".bg-warning");
                   badge[0].textContent = 0 ;
                },

    })  ;
    }


ajax() ;



// chargement

    $.ajax({
       url : 'recup_phases.php',
       type : 'GET',
       data : 'projet=' + "<?php echo $nom_projet ?>" ,
       dataType : 'json',
       success : function(resultat,statut){

       var inp , tache , etat , tr , td1 , td2 , td3 , td4  , div , ul , li  , div1 , div2 , pourcentage , span , j , i  ;
       var color= ["#5cb85c","#f0ad4e"  , "#d9534f" , "#5bc0de"] ;
       var body = document.querySelector('tbody') ;

      //boucle des phases



     for( i=1; i<=resultat.phase.length ; i++) {

  //une ligne de tableau
    tr = document.createElement('tr') ;
// les colonnes
//les phases
 td1 = document.createElement('td') ;

div = document.createElement('div') ;
div.className = "cont ";
var dd = resultat.phase[i-1].date_debut.toString() ;
dd= dd.substring(0,10);
var df = resultat.phase[i-1].date_fin.toString() ;
df= df.substring(0,10);
div.innerHTML = '  <h1 class="titre">Phase  : <span class="nomPhase">'+resultat.phase[i-1].nom+'</span><span class="label label-warning dd" style="margin-left:5px;">'+dd+'</span><i class="fa fa-arrows-h" aria-hidden="true" style="margin-left:5px;"></i><span class="label label-warning df" style="margin-left:5px;">'+df+'</span>   <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Ajouter une tâche"></i><i class="fa fa-window-close-o" data-toggle="modal" data-target="#Modal"></i><i class="fa fa-pencil-square-o" data-toggle="modal" data-target="#ModifPhase" ></i></h1><input type="text" placeholder="Ajouter une tâche" class="ajout">';

ul = document.createElement('ul') ;
ul.className='liste' ;

div.appendChild (ul) ;
//colonne des reunions
 td2 = document.createElement('td') ;
 td2.style.width = '180px'  ;
 td2.className = "reunion" ;
 // colonne des livrables
 td3 = document.createElement('td') ;
  td3.style.width = '180px'  ;
  td3.className = "liv" ;
  // colonne des commentaires
 td4 = document.createElement('td') ;
 td4.innerHTML='<textarea class="form-control" rows="5" id="comment" placeholder="Ajouter un commentaire"></textarea>' ;
 td4.className='comment' ;


td1.appendChild(div) ;
tr.appendChild(td1) ;
tr.appendChild(td2) ;
tr.appendChild(td3) ;
tr.appendChild(td4) ;
body.appendChild(tr) ;

} ;



 // pour supprimer une tâche
 $(".liste").on("click" ,".supprim", function(){
  $(this).parent().fadeOut(500 , function(){
    var tach = this.textContent ;
    tach = tach.substr(1 , tach.length) ;
    var pliste = this.parentNode.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[1].textContent ;
    $(this).remove() ;
     $.ajax(
              {
              method:'get',
              url:'supp_tache.php',
              data:
              {
                  'tache' : tach ,
                  'phase' : ph ,

              }
            });

  }) ;
  event.stopPropagation() ;

})  ;

chargement_réunion() ;
chargement_livrable() ;


// ajouter un element aux tâches
$(".ajout").keypress(function(event){

  if(event.which===13 ){

       var text =  $(this).val() ;
       var phase = event.target.previousElementSibling.childNodes ;
       var namePhase = phase[1].textContent ;
       if(text.length > 0) {
       var li= document.createElement('li') ;
       li.className = "ligne" ;
       li.innerHTML = '<span class="supprim"><i class="fa fa-trash-o"></i> </span>'+ text +'<input type="checkbox" name="etat" disabled>' ;
       var elem =  event.target.nextElementSibling ;
       elem.appendChild(li) ;
       $(this).val("");
       event.target.style='none' ;
          $.ajax(
              {
              method:'get',
              url:'ajouter_tache.php',
              data:
              {
                  'tache': text ,
                  'phase' : namePhase ,
              },
            });


  }
}

}) ;


// ajouter des commentaires /////////////////////////////////////////

$("textarea").keypress(function(event){
  if(event.which===13 ){

       var text = event.target.value ;
       var th = event.target.parentNode.parentNode.childNodes ;
       var td = th[0].childNodes ;
       var d = td[0].childNodes ;
       var hliste =d[1].childNodes ;
       var  ph = hliste[1].textContent ;

       if(text.length > 0) {
       var div= document.createElement('div') ;
         var span1=  document.createElement('span') ;
        span1.className="delete" ;
        span1.innerHTML ="<i class='fa fa-times'> </i>"  ;
         var span2=  document.createElement('span') ;
          span2.className="editer" ;
          span2.innerHTML ="<i class='fa fa-pencil'> </i>"  ;
       var user = document.createTextNode('<?php echo $resultat['nom'] ?> ' + ' <?php echo $resultat['prenom'] ?>  : ') ;
       var span=  document.createElement('span') ;
       span.style.fontWeight = "bold" ;
       var txt = document.createTextNode(text) ;
       span.appendChild  (user) ;
        span.style.color  ="#5bc0de" ;
        div.appendChild(span2) ;
        div.appendChild(span1)  ;
        div.appendChild(span) ;
       div.appendChild(txt) ;
       var elem =  event.target.parentNode;
       elem.appendChild(div) ;
       event.target.value ='' ;
       event.target.placeholder ='Ajouter un commentaire' ;
         $.ajax(
              {
              method:'get',
              url:'ajout_cmmt.php',
              data:
              {
                  'comment' : text  ,
                  'phase' : ph  ,

              }
            });

  }


/////////////////modifier commentaire ////////////////////////////////
  $(".comment div").on("click" ,".editer", function(){
  var div = this.parentNode ;
  var text = this.parentNode.childNodes ;
  text = text[3].nodeValue;
  div.innerHTML = " <input type='texte'  class='form-control modifier-commentaire' value =' "+text+" ' placeholder =' "+text+" '>" ;


$(".modifier-commentaire").keypress(function(event){
  if(event.which===13 ){


    var pliste = event.target.parentNode.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[0].childNodes ;
    ph= ph[1].childNodes ;
    var phase = ph[1].textContent ;


      var txt = event.target.value ;
      var old = event.target.placeholder ;

      if(txt) {

      var div= document.createElement('div') ;
      var span1=  document.createElement('span') ;
      span1.className="delete" ;
      span1.innerHTML ="<i class='fa fa-times'> </i>"  ;
      var span2=  document.createElement('span') ;
      span2.className="editer" ;
      span2.innerHTML ="<i class='fa fa-pencil'> </i>"  ;
      var user = document.createTextNode('<?php echo $resultat['nom'] ?> ' + ' <?php echo $resultat['prenom'] ?>  : ') ;
      var span=  document.createElement('span') ;
      span.style.fontWeight = "bold" ;
      var texte = document.createTextNode(txt) ;
      span.appendChild  (user) ;
      span.style.color  ="#5bc0de" ;
      div.appendChild(span2) ;
      div.appendChild(span1)  ;
      div.appendChild(span) ;
      div.appendChild(texte) ;
      var elem =  event.target.parentNode.parentNode;
      event.target.parentNode.remove()  ;
      elem.appendChild(div) ;
      event.target.value ='' ;
      $.ajax(
              {
              method:'get',
              url:'modifier_cmmt.php',
              data:
              {
                  'nouveau' : txt  ,
                  'ancien' : old ,
                  'phase' : phase ,

              }
            });

      }

           }
     })  ;


   })  ;







//supprimer un commentaire
  $(".comment div").on("click" ,".delete", function(){
  $(this).parent().fadeOut(500 , function(){
    var com = this.childNodes ;
    com = com[3].textContent;
    var pliste = this.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[0].childNodes ;
    ph= ph[1].childNodes ;
    var ph = ph[1].textContent ;
    $(this).remove() ;
     $.ajax(
              {
              method:'get',
              url:'supp_cmmt.php',
              data:
              {
                  'com' : com ,
                  'phase' : ph ,

              },
            });

  }) ;
  event.stopPropagation() ;

})  ;


}

}) ;


$(".fa-plus").click(function(e){
var plus =  e.target ;
    elem = plus.parentNode.nextElementSibling ;
    elem.style.display= 'block' ;
}) ;



// supprimer une phase
$(".fa-window-close-o").click(function(event){
  var icon = event.target ;
  var elem = icon.parentNode.parentNode.parentNode.parentNode ;
  var ph = event.target.parentNode.childNodes ;
  var phase = ph[1].textContent ;
  var mod = document.querySelector('#Modal .modal-body');
  mod.innerHTML = "Vous confirmez la suppression de la phase : ' <span>"+phase+"</span> '?"



}) ;


// modifier une phase
$(".fa-pencil-square-o").click(function(event){
  var elem = event.target.parentNode.childNodes ;
  var nom=elem[1].textContent ;
  var dd = elem[2].textContent ;
  var df= elem[4].textContent ;
  var div= $("#ModifPhase .modal-body .form-control") ;
  div[0].value = nom ;
  div[1].value = dd  ;
  div[2].value = df ;
  div[0].placeholder = nom ;
  div[1].placeholder = dd  ;
  div[2].placeholder = df ;





}) ;


// récpérer les taches
var ls = $(".nomPhase") ;
for(j=0 ; j< ls.length ; j++)  {
  var nom= ls[j].textContent ;


    $.ajax({
       url : 'recup_taches.php',
       type : 'GET',
        data:
              {
                  'projet': "<?php echo $nom_projet ?>" ,
                  'phase' : nom ,
                  'boucle' : j ,
              } ,
       dataType : 'json',
       success : function(resultat,statut ){

            var lsls = $(".liste");
            var i ,  k =resultat.nombre ;

           for(i=0 ; i<resultat.tache.length; i++) {
               li= document.createElement("li") ;
               li.className="ligne" ;
               span =document.createElement('span');
               span.className='supprim' ;
               span.innerHTML='<i class="fa fa-trash-o" > </i>';
               tache = document.createTextNode(resultat.tache[i].tache) ;
               inp = document.createElement('input') ;
               inp.type='checkbox' ;
               inp.name="etat" ;
               etat=resultat.tache[i].realise;
                inp.disabled="vrai" ;
               if(etat=="oui") {

               li.appendChild(tache);
               inp.checked = "checked" ;
               li.appendChild(inp) ;
               li.style.paddingLeft="20px" ;

              }else {
              li.appendChild(span);
              li.appendChild(tache);
              li.appendChild(inp) ;
              }
              lsls[k].appendChild(li) ;

            };



       },


    });

}



// chargement des livrables////////////////////////////////////////////////////////

function chargement_livrable() {

       $.ajax(
              {
              method:'get',
              url:'recup_livrable.php',
              dataType : 'json',
       success : function(resultat,statut ){

         console.log(resultat.liv) ;

        var listeliv = $('.liv') ;
        var datefin= $('.df') ;
        var i , j ;

        for( i =0 ; i<resultat.liv.length; i++) {

        j=0 ;
        var comp =  resultat.liv[i].date.toString().substring(0,10) ;
        var bol=false ;

        while(j<datefin.length & bol==false ) {


            if(comp.localeCompare(datefin[j].textContent) < 0){

                 var div = document.createElement('div') ;
                 var a = document.createElement('a') ;
                 a.href = "dépo_ens.php?id_liv="+resultat.liv[i].ID ;
                 var txt = document.createTextNode("Livrable à remettre le ") ;
                 a.appendChild(txt) ;
                 div.appendChild(a) ;
                 var texte = document.createTextNode(" : " ) ;
                 div.appendChild(texte) ;
                 var div1 = document.createElement ('div') ;
                 div1.innerHTML = "<i class='fa fa-clock-o '></i>" ;
                 var text = document.createTextNode (resultat.liv[i].date.toString()) ;
                 div1.appendChild(text) ;
                 div.appendChild(div1) ;
                 listeliv[j].appendChild(div) ;

                 bol=true ;

                }else {j++ ; }

          }

     }


          } ,
     }) ;




}



///////////////////////chargement réunion////////////////////////////////////////////////////////

function chargement_réunion() {

       $.ajax(
              {
              method:'get',
              url:'recup_reunion.php',
              dataType : 'json',
       success : function(resultat,statut ){

         console.log(resultat.ren) ;

        var listeliv = $('.reunion') ;
        var datefin= $('.df') ;
        var i , j ;

        for( i =0 ; i<resultat.ren.length; i++) {

        j=0 ;
        var comp =  resultat.ren[i].date.toString().substring(0,10) ;
        var bol=false ;

        while(j<datefin.length & bol==false ) {


            if(comp.localeCompare(datefin[j].textContent) < 0){

            var text = document.createTextNode ("Réunion" + " ( "+resultat.ren[i].typ+" )") ;
            var h = document.createElement('a') ;
            h.appendChild(text) ;
            h.href = "page_agenda_ens.php?id="+resultat.ren[i].ID  ;
            var div = document.createElement('div') ;
            var span1 = document.createElement ('span') ;
            span1.innerHTML = "<i class='fa fa-clock-o '></i>" ;
            var comp =  resultat.ren[i].date.toString().substring(0,10) ;
            var text = document.createTextNode (resultat.ren[i].date.toString()) ;


            div.appendChild(span1) ;
            div.appendChild(text) ;

            var div1 = document.createElement('div') ;
            var span3 = document.createElement ('span') ;
            span3.innerHTML = "<i class='fa fa-map-marker'></i>" ;
            var text = document.createTextNode (resultat.ren[i].lieu) ;


            div1.appendChild(span3) ;
            div1.appendChild(text) ;

            var span= document.createElement ('span') ;
            span.className ="ren" ;
            span.appendChild(h) ;
            span.appendChild(div) ;
            span.appendChild(div1) ;


               listeliv[j].appendChild(span) ;
               bol=true ;

                }else {j++ ; }

          }

     }


          } ,
     }) ;




}


//////////////////////////////////////////////////////////////////////////////////////////////


// chargement des commntaires
 var list = $(".comment") ;
 for(var k=0 ; k<list.length; k++) {
  var ls1 =  list[k].parentNode.childNodes;
  var ls2 = ls1[0].childNodes;
  var ls3= ls2[0].childNodes;
  var ls4 = ls3[1].childNodes;
  var phase = ls4[1].textContent ;

  $.ajax(
              {
              method:'get',
              url:'recup_cmmt.php',
              data:
              {
                  'phase' : phase ,
                   'nb' : k ,

              } ,

             dataType : 'json',
       success : function(resultat,statut ){

        var list = $(".comment") ;
        for(var j=0; j<resultat.com.length;j++){


         var div= document.createElement('div') ;
          var span1=  document.createElement('span') ;
          span1.className="delete" ;
          span1.innerHTML ="<i class='fa fa-times'> </i>"  ;
           var span2=  document.createElement('span') ;
          span2.className="editer" ;
          span2.innerHTML ="<i class='fa fa-pencil'> </i>"  ;
         var user = document.createTextNode(resultat.com[j].user_name+" : ") ;
         var span=  document.createElement('span') ;
         span.style.fontWeight = "bold" ;
         var txt = document.createTextNode(resultat.com[j].commentaire) ;
         span.appendChild  (user) ;
         span.style.color  ="#5bc0de" ;
         if(resultat.com[j].user_name == "<?php echo $resultat['nom']  ?>"+" "+"<?php echo $resultat['prenom']  ?>") {
          div.appendChild(span2) ;
          div.appendChild(span1) ;


         }

         div.appendChild(span) ;
         div.appendChild(txt) ;
         list[resultat.nombre].appendChild(div) ;

        }


//supprimer un commentaire
  $(".comment div").on("click" ,".delete", function(){
  $(this).parent().fadeOut(500 , function(){
    var com = this.childNodes ;
    com = com[3].textContent;
    var pliste = this.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[0].childNodes ;
    ph= ph[1].childNodes ;
    var ph = ph[1].textContent ;
    $(this).remove() ;
     $.ajax(
              {
              method:'get',
              url:'supp_cmmt.php',
              data:
              {
                  'com' : com ,
                  'phase' : ph ,

              },
            });

  }) ;
  event.stopPropagation() ;

})  ;



 // modifier un commentaire//////////////////////////////////////////////////////////////////

  $(".comment div").on("click" ,".editer", function(){
  var div = this.parentNode ;
  var text = this.parentNode.childNodes ;
  text = text[3].nodeValue;
  div.innerHTML = " <input type='texte'  class='form-control modifier-commentaire' value =' "+text+" ' placeholder ='"+text+"'>" ;


$(".modifier-commentaire").keypress(function(event){
  if(event.which===13 ){


    var pliste = event.target.parentNode.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[0].childNodes ;
    ph= ph[1].childNodes ;
    var phase = ph[1].textContent ;


      var txt = event.target.value ;
      var old = event.target.placeholder ;

      if(txt) {

      var div= document.createElement('div') ;
      var span1=  document.createElement('span') ;
      span1.className="delete" ;
      span1.innerHTML ="<i class='fa fa-times'> </i>"  ;
      var span2=  document.createElement('span') ;
      span2.className="editer" ;
      span2.innerHTML ="<i class='fa fa-pencil'> </i>"  ;
      var user = document.createTextNode('<?php echo $resultat['nom'] ?> ' + ' <?php echo $resultat['prenom'] ?>  : ') ;
      var span=  document.createElement('span') ;
      span.style.fontWeight = "bold" ;
      var texte = document.createTextNode(txt) ;
      span.appendChild  (user) ;
      span.style.color  ="#5bc0de" ;
      div.appendChild(span2) ;
      div.appendChild(span1)  ;
      div.appendChild(span) ;
      div.appendChild(texte) ;
      var elem =  event.target.parentNode.parentNode;
      event.target.parentNode.remove()  ;
      elem.appendChild(div) ;
      event.target.value ='' ;
      $.ajax(
              {
              method:'get',
              url:'modifier_cmmt.php',
              data:
              {
                  'nouveau' : txt  ,
                  'ancien' : old ,
                  'phase' : phase ,

              }
            });

      }

           }
     })  ;


   })  ;









            },
        }) ;




 }





       },

       error : function(resultat , statut , erreur ){



             },

       complete : function(resultat , statut){




       } ,



    });




// ajouter une phase
function ajoutPhase(){
  var body=  $("tbody") ;
var liste = $('input[name="newphase"]') ;
var dd = document.querySelector('input[name="datedeb"]').value.toString();
var df = document.querySelector('input[name="datef"]').value.toString();
if(dd!= "" && df!= "" && dd<df ) {
df= df.substring(0,10);
dd= dd.substring(0,10);
var nn = liste[0].value ;
liste[0].value = "" ;
var i = $('nomPhase').length ;
tr = document.createElement('tr') ;
td1 = document.createElement('td') ;
div = document.createElement('div') ;
div.className = "cont ";
 document.querySelector('input[name="datedeb"]').value = "" ;
 document.querySelector('input[name="datef"]').value= "" ;
if(nn)  {
 div.innerHTML = '  <h1 class="titre">Phase  : <span class="nomPhase">'+nn+'</span><span class="label label-warning dd" style="margin-left:5px;">'+dd+'</span><i class="fa fa-arrows-h" aria-hidden="true" style="margin-left:5px;"></i><span class="label label-warning df" style="margin-left:5px;">'+df+'</span>   <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Ajouter une tâche"></i><i class="fa fa-window-close-o" data-toggle="modal" data-target="#Modal"></i><i class="fa fa-pencil-square-o" data-toggle="modal" data-target="#ModifPhase"></i></h1><input type="text" placeholder="Ajouter une tâche" class="ajout">';

 ul = document.createElement('ul') ;
 ul.className='liste' ;
 div.appendChild (ul) ;
 //colonne des reunions
 td2 = document.createElement('td') ;
 td2.style.width = '200px'  ;
 // colonne des livrables
 td3 = document.createElement('td') ;
 td3.style.width = '200px'  ;
  td3.className = "liv" ;
 // colonne des commentaires
 td4 = document.createElement('td') ;
 td4.innerHTML='<textarea class="form-control" rows="5" id="comment" placeholder="Ajouter un commentaire"></textarea>' ;
 td4.className='comment' ;

td1.appendChild(div) ;
tr.appendChild(td1) ;
tr.appendChild(td2) ;
tr.appendChild(td3) ;
tr.appendChild(td4) ;

body[0].appendChild(tr) ;
 var ls= $('#myModal .modal-body div') ;
 ls[0].innerHTML = '<div style="margin : 10px ; " class="alert alert-success"> <strong>Success !</strong> Phase ajoutée  </div>' ;
    $.ajax(
              {
              method:'get',
              url:'ajouter1phase.php',
              data:
              {
                  'phase' : nn ,
                  'DateDebut' : dd ,
                  'DateFin' : df ,
              }
            });


}else {

 var ls= $('#myModal .modal-body div') ;
 ls[0].innerHTML = '<div  style="margin : 10px ; " class="alert alert-danger"><strong>Erreur!</strong> Veuillez Ajouter le nom de la phase  ! </div>' ;
}
}else {

 var ls= $('#myModal .modal-body div') ;
 ls[0].innerHTML = '<div  style="margin : 10px ; " class="alert alert-danger"><strong>Erreur!</strong> Veuillez vérifier les dates ! </div>' ;

}




 // pour supprimer une tâche
 $(".liste").on("click" ,".supprim", function(){
  $(this).parent().fadeOut(500 , function(){
    var tach = this.textContent ;
    tach = tach.substr(1 , tach.length) ;
    var pliste = this.parentNode.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[1].textContent ;
    $(this).remove() ;
     $.ajax(
              {
              method:'get',
              url:'supp_tache.php',
              data:
              {
                  'tache' : tach ,
                  'phase' : ph ,

              }
            });

  }) ;
  event.stopPropagation() ;

})  ;




//ajouter une tâche
$(".ajout").keypress(function(event){
  if(event.which===13 ){

       var text =  $(this).val() ;
       var phase = event.target.previousElementSibling.childNodes ;
       var namePhase = phase[1].textContent ;
       if(text.length > 0) {
       var li= document.createElement('li') ;
       li.className = "ligne" ;
       li.innerHTML = '<span class="supprim"><i class="fa fa-trash-o"></i> </span>' + text +'<input type="checkbox" name="etat" disabled>' ;
       var elem =  event.target.nextElementSibling ;
       elem.appendChild(li) ;
       $(this).val("");
       event.target.style='none' ;
          $.ajax(
              {
              method:'get',
              url:'ajouter_tache.php',
              data:
              {
                  'tache': text ,
                  'phase' : namePhase ,
              }
            });

       }
}

}) ;




// ajouter des commentaires /////////////////////////////////////////

$("textarea").keypress(function(event){
  if(event.which===13 ){

       var text = event.target.value ;
       var th = event.target.parentNode.parentNode.childNodes ;
       var td = th[0].childNodes ;
       var d = td[0].childNodes ;
       var hliste =d[1].childNodes ;
       var  ph = hliste[1].textContent ;

      if(text.length > 0) {
      var div= document.createElement('div') ;
      var span1=  document.createElement('span') ;
      span1.className="delete" ;
      span1.innerHTML ="<i class='fa fa-times'> </i>"  ;
      var span2=  document.createElement('span') ;
      span2.className="editer" ;
      span2.innerHTML ="<i class='fa fa-pencil'> </i>"  ;
      var user = document.createTextNode('<?php echo $resultat['nom'] ?> ' + ' <?php echo $resultat['prenom'] ?>  : ') ;
      var span=  document.createElement('span') ;
      span.style.fontWeight = "bold" ;
      var txt = document.createTextNode(text) ;
      span.appendChild  (user) ;
      span.style.color  ="#5bc0de" ;
      div.appendChild(span2) ;
      div.appendChild(span1) ;
      div.appendChild(span) ;
      div.appendChild(txt) ;
      var elem =  event.target.parentNode;
      elem.appendChild(div) ;
      event.target.value ='' ;
      event.target.placeholder ='Ajouter un commentaire' ;
        $.ajax(
              {
              method:'get',
              url:'ajout_cmmt.php',
              data:
              {
                  'comment' : text  ,
                  'phase' : ph  ,

              }
            });

  }



////////////modifier les commentaires
  $(".comment div").on("click" ,".editer", function(){
  var div = this.parentNode ;
  var text = this.parentNode.childNodes ;
  text = text[3].nodeValue;
  div.innerHTML = " <input type='texte'  class='form-control modifier-commentaire' value =' "+text+" ' placeholder =' "+text+" '>" ;


$(".modifier-commentaire").keypress(function(event){
  if(event.which===13 ){


    var pliste = event.target.parentNode.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.childNodes ;
    var ph= pliste[0].childNodes ;
    ph= ph[1].childNodes ;
    var phase = ph[1].textContent ;


      var txt = event.target.value ;
      var old = event.target.placeholder ;

      if(txt) {

      var div= document.createElement('div') ;
      var span1=  document.createElement('span') ;
      span1.className="delete" ;
      span1.innerHTML ="<i class='fa fa-times'> </i>"  ;
      var span2=  document.createElement('span') ;
      span2.className="editer" ;
      span2.innerHTML ="<i class='fa fa-pencil'> </i>"  ;
      var user = document.createTextNode('<?php echo $resultat['nom'] ?> ' + ' <?php echo $resultat['prenom'] ?>  : ') ;
      var span=  document.createElement('span') ;
      span.style.fontWeight = "bold" ;
      var texte = document.createTextNode(txt) ;
      span.appendChild  (user) ;
      span.style.color  ="#5bc0de" ;
      div.appendChild(span2) ;
      div.appendChild(span1)  ;
      div.appendChild(span) ;
      div.appendChild(texte) ;
      var elem =  event.target.parentNode.parentNode;
      event.target.parentNode.remove()  ;
      elem.appendChild(div) ;
      event.target.value ='' ;
      $.ajax(
              {
              method:'get',
              url:'modifier_cmmt.php',
              data:
              {
                  'nouveau' : txt  ,
                  'ancien' : old ,
                  'phase' : phase ,

              }
            });

      }

           }
     })  ;


   })  ;






//supprimer un commentaire
  $(".comment div").on("click" ,".delete", function(){
  $(this).parent().fadeOut(500 , function(){
  var com = this.childNodes ;
  com = com[3].textContent;
  var pliste = this.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.childNodes ;
  var ph= pliste[0].childNodes ;
  ph= ph[1].childNodes ;
  var ph = ph[1].textContent ;
  $(this).remove() ;
     $.ajax(
              {
              method:'get',
              url:'supp_cmmt.php',
              data:
              {
                  'com' : com ,
                  'phase' : ph ,

              },
            });

  }) ;
  event.stopPropagation() ;

})  ;



}


}) ;





$(".fa-plus").click(function(e){
var plus =  e.target ;
    elem = plus.parentNode.nextElementSibling ;
    elem.style.display= 'block' ;
}) ;



// supprimer une phase
$(".fa-window-close-o").click(function(event){
  var icon = event.target ;
  var elem = icon.parentNode.parentNode.parentNode.parentNode ;
  var ph = event.target.parentNode.childNodes ;
  var phase = ph[1].textContent ;
  var mod = document.querySelector('#Modal .modal-body');
  mod.innerHTML = "Vous confirmez la suppression de la phase : ' <span>"+phase+"</span> '?"



}) ;



};






function supprimer_phase () {
  var elem , phase = document.querySelector("#Modal .modal-body span").textContent ;
  var liste = $(".nomPhase") ;
  for(var i=0; i<liste.length ; i++) {
    if(phase==liste[i].textContent) {
       elem = liste[i].parentNode.parentNode.parentNode.parentNode ;
      elem.remove() ;
      $.ajax(
              {
              method:'get',
              url:'supp_ph.php',
              data:
              {
                  'phase' : phase ,

              }
            });

    }
  }
}


//////////////////////////Ajouter un livrable/////////////////////////////////////////////////

function ajouter_livrable() {
  var date = document.querySelector("input[name='dateRemise']").value;
  var liste = $('.liv') ;
  var datefin= $('.df') ;
  var ph , phases= $('.nomPhase') ;
  var comp = date.toString().substring(0,10) ;
  var j=0 ;
  var bol=false ;
  document.querySelector("input[name='dateRemise']").value = '' ;
  document.querySelector("input[name='dateRemise']").type = 'text';
if(date.toString()!=''){
while(j<datefin.length & bol==false ) {


  if(comp.localeCompare(datefin[j].textContent) < 0){

  var div = document.createElement('div') ;
  var a = document.createElement('a') ;
  a.href ="dépo_ens.php?id=" ;
  var txt = document.createTextNode("Livrable à remettre le ") ;
  a.appendChild(txt) ;
  div.appendChild(a) ;
  var texte = document.createTextNode(" : " ) ;
  div.appendChild(texte) ;
  var div1 = document.createElement ('div') ;
  div1.innerHTML = "<i class='fa fa-clock-o '></i>" ;
  var text = document.createTextNode (date.toString()) ;

  div1.appendChild(text) ;
  div.appendChild(div1) ;
  liste[j].appendChild(div) ;


    bol=true ;
    ph = phases[j].textContent;

          $.ajax(
              {
              method:'get',
              url:'addlivrable.php',
              data:
              {

                  'phase' : ph ,
                  'date' : date ,

              }
            });


            }else {j++ ; }

          }



   if(bol == false) {
     alert("La date n'est pas inclue dans l'intervalle du projet !  ") ;


   }

 }
}



function ajouter_reunion() {
  var date = document.querySelector("input[name='dateRen']").value;
  var lieu = document.querySelector("input[name='lieuRen']").value;
  document.querySelector("input[name='dateRen']").value="" ;
  document.querySelector("input[name='lieuRen']").value="" ;
  var select = document.getElementById("sel1");
  var choice = select.selectedIndex  ;
  var val = select.options[choice].value;


  var liste = $('.reunion') ;
  var datefin= $('.df') ;
  var ph , phases= $('.nomPhase') ;
  var comp = date.toString().substring(0,10) ;
  var bol = false , j=0 ;


  var text = document.createTextNode ("Réunion" + " ( "+val+" )") ;
  var h = document.createElement('a') ;
  h.appendChild(text) ;
  h.href = "page_agenda_ens.php"  ;
  var div = document.createElement('div') ;
  var span1 = document.createElement ('span') ;
  span1.innerHTML = "<i class='fa fa-clock-o '></i>" ;
  var text = document.createTextNode (date.toString()) ;


  div.appendChild(span1) ;
  div.appendChild(text) ;

  var div1 = document.createElement('div') ;
  var span3 = document.createElement ('span') ;
  span3.innerHTML = "<i class='fa fa-map-marker'></i>" ;
  var text = document.createTextNode (lieu) ;


  div1.appendChild(span3) ;
  div1.appendChild(text) ;

  var span= document.createElement ('span') ;
  span.className ="ren" ;
  span.appendChild(h) ;
  span.appendChild(div) ;
  span.appendChild(div1) ;

  if(date.length>0 & lieu.length> 0 ) {

 while(j<datefin.length & bol==false ) {

    if(comp.localeCompare(datefin[j].textContent) < 0){
       liste[j].appendChild(span) ;
       bol=true ;
       ph = phases[j].textContent;

         $.ajax(
              {
              method:'get',
              url:'addreunion.php',
              data:
              {
                  'phase' : ph ,
                  'date' : date ,
                  'lieu' : lieu ,
                  'type' :  val ,

              }
            });

  }else {j++ ; }


   }

   }
     if(bol == false) {

        alert("Erreur ! ") ;

   }

 }


function modifier_phase() {

    var div= $("#ModifPhase .modal-body .form-control") ;
    var nom= div[0].value;
    var nomold= div[0].placeholder;
    var dd = div[1].value ;
     var ddold = div[1].placeholder ;
    var df = div[2].value ;
    var dfold = div[2].placeholder;

    $.ajax(
              {
              method:'get',
              url:'Modif_phase.php',
              data:
              {
                  'nom' : nom ,
                  'nom_old' : div[0].placeholder ,
                  'date_debut' : dd ,
                   'date_debut_old' : ddold ,
                  'date_fin' : df ,
                   'date_fin_old' : dfold ,


              }
            });



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


function SuppDiv(){
 var liste=  $('.modal-body div') ;
 for(var i = 0 ; i<liste.length ; i++) {
  var node = liste[i].childNodes ;
  node[0].remove() ;
 }
}

</script>


  </body>
</html>
