

// recupérer les noms des projets de la base de données  ____________________________________________________________________________________

    $.ajax({
       url : '../php/chargement_projet.php',
       type : 'GET',
       dataType : 'json',
       success : function(resultat,statut){
    


      console.log(resultat.tabpfe.length) ; 
      console.log(resultat.tabmaster.length) ; 

      var master= resultat.nbmaster ; // le nombre des projets de master 
      var pfe = resultat.nbpfe ; // le nombre des projets de pfe 
      var i , j ;  
      

// boucle pour creer les projets de pfe __________________________________________________________________________________________________
  if( resultat.tabpfe.length != 0 ) {
       

       for (i=1 ; i<resultat.tabpfe.length+1 ; i++) {
      
      var divParent = document.createElement('div') ; 
      divParent.className = 'col-md-2 col-sm-4 box0' ; 
      divParent.id = '2' ; 
      var input= document.createElement('input') ; 
      input.type="checkbox" ; 
      input.name='case' ; 
      input.id='case'+i ;
      var chaine = "supprimer('case"+i+"')" ; 
      input.setAttribute("onchange" ,chaine ) ; 
      var div= document.createElement('div') ; 
      div.className = 'box1' ;
      var span = document.createElement('span') ; 
      span.className = "li_study" ; 
      var titre= document.createElement('h3') ; 
      var textTitre = document.createTextNode("projet "+i) ; 
      var icon = document.createElement('i') ; 
      titre.appendChild(textTitre) ; 
      var text = document.createElement('a') ; 
       text.href= "projet_encadreur.php?nomProjet="+resultat.tabpfe[i-1] ; 
      var txtP = document.createTextNode(resultat.tabpfe[i-1]) ; 
      text.appendChild(txtP) ;
      div.appendChild(span) ; 
      div.appendChild(titre) ;  
      divParent.appendChild(input) ; 
      divParent.appendChild(div) ; 
      divParent.appendChild(text) ; 

       var pfeSpace = document.querySelector('.showback.pfe div div') ;
       pfeSpace.appendChild(divParent) ;

       }


      }else {
            var pfeSpace = document.querySelector('.showback.pfe div div') ; 
            pfeSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Votre espace de PFE est vide !</h3>' ; 

      }
//boucle pour creer les projet de master ___________________________________________________________________________________________________________________
     
       if( resultat.tabmaster.length != 0 ) {

         for (j=1 ; j<resultat.tabmaster.length+1 ; j++) {

     var divParent = document.createElement('div') ; 
      divParent.className = 'col-md-2 col-sm-4 box0' ; 
      divParent.id =  " " + (pfe+j) ; 
      var input= document.createElement('input') ; 
      input.type="checkbox" ; 
      input.name='case' ; 
      input.id='case'+(i+j) ; 
      var chaine = "supprimer('case"+(i+j)+"')" ; 
      input.setAttribute("onchange" ,chaine ) ; 
      var div= document.createElement('div') ; 
      div.className = 'box1' ;
      var span = document.createElement('span') ; 
      span.className = "li_news" ; 
      var titre= document.createElement('h3') ; 
       var textTitre = document.createTextNode("projet "+j) ; 
       var icon = document.createElement('i') ; 
       titre.appendChild(textTitre) ; 
      var text = document.createElement('a') ; 
      var fct= "NameProjet('"+resultat.tabmaster[j-1]+"')" ; 
      text.setAttribute("onclick",fct) ; 
      text.href= "projet_encadreur.php?nomProjet="+resultat.tabmaster[j-1] ; 
      var txtP = document.createTextNode(resultat.tabmaster[j-1]) ; 
       text.appendChild(txtP) ;
       div.appendChild(span) ; 
      div.appendChild(titre) ;  
      divParent.appendChild(input) ; 
      divParent.appendChild(div) ; 
      divParent.appendChild(text) ; 


        
     var masterSpace = document.querySelector('.showback.master div div') ; 
     masterSpace.appendChild(divParent) ;
}
}else {

     var masterSpace = document.querySelector('.showback.master div div') ; 
     masterSpace.innerHTML=  '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Votre espace de MASTER est vide !</h3>' ; 

}    




           
       },

       error : function(resultat , statut , erreur ){
        
              console.log( statut +" "+ erreur) ; 

               var pfeSpace = document.querySelector('.showback.pfe div div') ; 
               pfeSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Votre espace de PFE est vide !</h3>' ; 
              var masterSpace = document.querySelector('.showback.master div div') ; 
               masterSpace.innerHTML=  '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Votre espace de MASTER est vide !</h3>' ; 



             },

       complete : function(resultat , statut){

               console.log(resultat + " " + statut) ;




       } ,



    });

   
    // **************************************fonction pour les liens des projets **************************************


