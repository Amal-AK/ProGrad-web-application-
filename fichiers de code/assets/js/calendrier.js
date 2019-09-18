// recupérer les noms des projets de la base de données  ____________________________________________________________________________________

    $.ajax({
       url : '../php/chargement_calendrier.php',
       type : 'GET',
       dataType : 'json',
       success : function(resultat,statut){





      var events= resultat.nbevents ; // le nombre d'évenemts
      var i;
      var tab_events= resultat.tabevents ;  // tableau des noms des evenements
      var type=resultat.type;//type d'evenements


// boucle pour creer les boutons d'évenemnts__________________________________________________________________________________________________

       for (i=1 ; i<events+1 ; i++) {

      var divParent = document.createElement('div') ;
      divParent.id = 'external-events' ;
      if (type == "Réunion")
      {
        var div= document.createElement('div') ;
        div.className = 'external-event label label-success' ;
        var titre=document.createElement('p');
        var txtP = document.createTextNode(tab_events[i-1]) ;

      }
      else if (type=="Réunion urgente")
       {
         var div= document.createElement('div') ;
         div.className = 'external-event label label-danger' ;
         var titre=document.createElement('p');
         var txtP = document.createTextNode(tab_events[i-1]) ;

      }
      else if (type=="Remise")
      {
        var div= document.createElement('div') ;
        div.className = 'external-event label label-warning' ;
        var titre=document.createElement('p');
        var txtP = document.createTextNode(tab_events[i-1]) ;
      }
      else
       {
         var div= document.createElement('div') ;
         div.className = 'external-event label label-default' ;
         var titre=document.createElement('p');
         var txtP = document.createTextNode(tab_events[i-1]) ;
      }
      var text = document.createElement('p') ;
      text.className='drop-after';
      var P = document.createTextNode("Effacer après selection !") ;
      var in=document.createElement('input');
      in.dataType='checkbox';
      in.id='drop-remove';
      text.appendChild(txtP) ;
      text.appendChild(in) ;
      titre.appendChild(txtP) ;
      div.appendChild(titre) ;
      divParent.appendChild(div) ;
       }
       },

       error : function(resultat , statut , erreur ){

              console.log( statut +" "+ erreur) ;


             },

       complete : function(resultat , statut){

               console.log(resultat + " " + statut) ;
       }

    });
