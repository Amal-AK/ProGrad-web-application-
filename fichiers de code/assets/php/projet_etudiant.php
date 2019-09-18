<?php
session_start() ;
$chemin=$_SESSION["photo"] ;
$_SESSION["photo"]=$chemin;
$nom_projet = $_GET["nomProjet"] ;
$_SESSION['nomProjet'] =$nom_projet ;
$resultat['nom'] = $_SESSION['nom']  ;
$resultat['prenom'] = $_SESSION['prenom'] ;
$_SESSION['nom']  = $resultat['nom'];
$_SESSION['prenom']  = $resultat['prenom'];


$resultat['id']= $_SESSION['id'] ;
$_SESSION['projet'] = $nom_projet;
$_SESSION['type_user'] = "etudiant" ;
$_SESSION['id'] = $resultat['id'] ;
?>

 <!DOCTYPE html >

<html >

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>projet etudiant </title>

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
    display : block ;
    text-align: left;
  }
 table  li {
    padding-left: 15px ;
  }
</style>
  <section id="container" >

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

                  <p class="center"><a href="profil.php"><img width="80" src=<?php echo $chemin ?> height="80" class="img-circle"></a></p>
                   <h5 class="center"><?php echo $resultat['nom']." ".$resultat['prenom'] ?></h5>
                    <li class="mt">
                      <a href="compte.php"  data-toggle="tooltip" data-placement="right" title="l'espace de votre compte!">
                          <i class="fa fa-home"></i>
                          <span>Acceuil</span>
                      </a>
                    </li>
                     <li class="sub-menu">
                      <a href="#" data-toggle="tooltip" data-placement="right" title=" accéder à la page de projet !" id="active">
                          <i class="fa fa-suitcase"></i>
                          <span>Page du projet</span>
                      </a>
                    </li>
                  <li class="sub-menu">
                      <a href="historique_prof.php" data-toggle="tooltip" data-placement="right" title="consulter l'historique  !">
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



                </ul>
          </div>
      </aside>


</section>
   <section id="main-content">
    <section class="wrapper">

  <h2><i class="fa fa-angle-right"></i> Nom du projet : " <?php echo $nom_projet ?> "</h2>
  <div class="container table-responsive">
  <table class="table table-bordered ">
    <thead >

      <tr class="table-active">
        <th>  Les phases</th>
        <th > réunions</th>
        <th > livrables</th>
        <th>Commentaires</th>
      </tr>
    </thead>
    <tbody>



    </tbody>
  </table>
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
div.innerHTML = '  <h1 class="titre">Phase  : <span class="nomPhase">'+resultat.phase[i-1].nom+'</span><span class="label label-warning dd" style="margin-left:5px;">'+dd+'</span><i class="fa fa-arrows-h" aria-hidden="true" style="margin-left:5px;"></i><span class="label label-warning df" style="margin-left:5px;">'+df+'</span> </h1><input type="text" placeholder="Add To-Do" class="ajout">';

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




 // modifier un commentaire//////////////////////////////////////////////////////////////////

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
      var txt = document.createTextNode(txt) ;
      span.appendChild  (user) ;
      span.style.color  ="#5bc0de" ;
      div.appendChild(span2) ;
      div.appendChild(span1)  ;
      div.appendChild(span) ;
      div.appendChild(txt) ;
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
      event.stopPropagation() ;
     })  ;
     event.stopPropagation() ;

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


} ;

}) ;




chargement_réunion() ;
chargement_livrable() ;


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
               tache = document.createTextNode(resultat.tache[i].tache) ;
               inp = document.createElement('input') ;
               inp.type='checkbox' ;
               inp.name="etat" ;
               etat=resultat.tache[i].realise;
               var att =  "realise('"+resultat.tache[i].tache+"','"+resultat.phase+"','"+etat+"')" ;
               inp.setAttribute("onchange" , att) ;
          
               if(etat == "oui") {
                inp.checked ="check" ;
               }
              li.appendChild(tache);
              li.appendChild(inp) ;

              lsls[k].appendChild(li) ;

            };






       },


    });

}





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
      var txt = document.createTextNode(txt) ;
      span.appendChild  (user) ;
      span.style.color  ="#5bc0de" ;
      div.appendChild(span2) ;
      div.appendChild(span1)  ;
      div.appendChild(span) ;
      div.appendChild(txt) ;
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
             event.stopPropagation() ;
     })  ;

  event.stopPropagation() ;
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


//////////////////////// la fonction check d une tache ////////////////////////////////////////


function realise (tache , phase, etat) {

  if(etat=='non'){
       $.ajax(
              {
              method:'get',
              url:'realise.php',
              data:
              {

                  'tache' : tache,
                  'phase' : phase ,

              }
            });}
       else {
     ////////////////////déréaliser /////////////////////////////
          $.ajax(
              {
              method:'get',
              url:'derealise.php',
              data:
              {

                  'tache' : tache,
                  'phase' : phase ,

              }
            }); 

       }
} ;



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



////////////////////////////////chargement reunion /////////////////////////////////////////
function chargement_réunion() {


       $.ajax(
              {
              method:'get',
              url:'recup_reunion.php',
              dataType : 'json',
       success : function(resultat,statut ){

         console.log(resultat.ren[0]) ;

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
            h.href = "page_agenda_etud.php?id="+resultat.ren[i].ID  ;
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



</script>


  </body>
</html>

<?php
$_SESSION['id'] = $resultat['id'] ;
$_SESSION['projet']= $nom_projet  ;
?>
