$.ajax({


   url : '../php/chrg_etud_prj.php',
   type : 'GET',
   dataType : 'json',
   success : function(resultat,statut)
   {
console.log(resultat.nompfe);
  var master=resultat.nommaster;//le nom du projet Master
  var pfe=resultat.nompfe;//le nom du projet pfe


//Créer le div  du master__________________________________________________________________________________________________
if( pfe != "")
 {
       
      var divParent = document.createElement('div') ; 
      divParent.className = 'col-md-10 col-sm-10 col-md-offset-1 box0' ; 
      divParent.id = '1' ; 
      var input= document.createElement('input') ; 
      input.type="checkbox" ; 
      input.name='case' ; 
      input.id='case1' ;
      var chaine = "supprimer('case1')" ; 
      input.setAttribute("onchange" ,chaine ) ; 
      var div= document.createElement('div') ; 
      div.className = 'box1' ;
      var span = document.createElement('span') ; 
      span.className = "li_study" ; 
      var titre= document.createElement('h3') ; 
      var textTitre = document.createTextNode("Mon projet du pfe") ; 
      var icon = document.createElement('i') ; 
      titre.appendChild(textTitre) ; 
      var text = document.createElement('a') ; 
      text.href= "projet_etudiant.php?nomProjet="+pfe ; 
      var txtP = document.createTextNode(pfe) ; 
      text.appendChild(txtP) ;
      div.appendChild(span) ; 
      div.appendChild(titre) ;  
      divParent.appendChild(input) ; 
      divParent.appendChild(div) ; 
      divParent.appendChild(text) ; 

       var pfeSpace = document.querySelector('.showback.pfe div div') ;
       pfeSpace.appendChild(divParent) ;

       


      }else {
            var pfeSpace = document.querySelector('.showback.pfe div div') ; 
            pfeSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Aucun projet !</h3>' ; 

      }
//boucle pour creer les projet de pfe ___________________________________________________________________________________________________________________
     
       if( master != "" ) {

        

     var divParent = document.createElement('div') ; 
      divParent.className = 'col-md-10 col-sm-10 col-md-offset-1 box0' ; 
      divParent.id =  "2 " ; 
      var input= document.createElement('input') ; 
      input.type="checkbox" ; 
      input.name='case' ; 
      input.id='case 2' ; 
      var chaine = "supprimer('case2')" ; 
      input.setAttribute("onchange" ,chaine ) ; 
      var div= document.createElement('div') ; 
      div.className = 'box1' ;
      var span = document.createElement('span') ; 
      span.className = "li_news" ; 
      var titre= document.createElement('h3') ; 
       var textTitre = document.createTextNode("Mon projet du master") ; 
       var icon = document.createElement('i') ; 
       titre.appendChild(textTitre) ; 
      var text = document.createElement('a') ;
       text.href= "projet_etudiant.php?nomProjet="+master ; 
      var txtP = document.createTextNode(master) ; 
       text.appendChild(txtP) ;
       div.appendChild(span) ; 
      div.appendChild(titre) ;  
      divParent.appendChild(input) ; 
      divParent.appendChild(div) ; 
      divParent.appendChild(text) ; 


        
     var masterSpace = document.querySelector('.showback.master div div') ; 
     masterSpace.appendChild(divParent) ;

}else {

     var masterSpace = document.querySelector('.showback.master div div') ; 
     masterSpace.innerHTML=  '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Aucun projet!</h3>' ; 

}
           
       },

       error : function(resultat , statut , erreur ){
        
              console.log( statut +" "+ erreur) ; 

               var pfeSpace = document.querySelector('.showback.pfe div div') ; 
               pfeSpace.innerHTML = '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Aucun projet !</h3>' ; 
              var masterSpace = document.querySelector('.showback.master div div') ; 
               masterSpace.innerHTML=  '<div class="row" style="display:flex ; justify-content: center  "> <img src="../img/fichier.png" height="110" width="130" ></div><h3 style="text-align: center; color : #b3b3b3">Aucun projet!</h3>' ; 


             },

       complete : function(resultat , statut){

               console.log(resultat + " " + statut) ; 



       } 

    });
   
function NameProjet(name){
   $.ajax(
              {
              method:'get',
              url:'../php/projet_encadreur.php',
              data:
              {
                  'nom': name
              }
            });
  
}
