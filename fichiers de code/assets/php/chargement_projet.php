<?php
session_start();

//connexion vers la bdd

$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$ens_matricule=$_SESSION['id'];

//recupoeration des données de l'enseignant
$requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :ens_matricule');
$requete->bindValue(':ens_matricule', $ens_matricule);
$requete->execute();
$ens= $requete->fetch();

$projets=$ens[6];
$projet_array = array();
$j=0;
$i=0;
$temp="";
$projet_cpt=0;
if (!empty ( $projets) )
{
  while ($i <strlen($projets))
  {
      $temp=$temp.$projets[$i];

      if ((substr ($projets,$i+1 ,1)==".")||($i+1==strlen($projets)))
      {
        $projet_array[$j]=$temp;
        $j++;
        $i++;
        $temp="";
        $projet_cpt++;
      }
      $i++;
    }
}

else {
  echo "Vous n'avez aucun projet<br>";
}
$pp=0;
$mm=0;
$pfe=0;
$master=0;
$table_pfe = array();
$table_master = array() ;
for ($k=0; $k <sizeof($projet_array) ; $k++)
{

  $requete = $conn->prepare('SELECT * FROM projet WHERE id= :id_projet');
  $requete->bindValue(':id_projet',number_format($projet_array[$k])) ;
  $requete->execute();
  $projet= $requete->fetch();
  $type=$projet[4];
  $name_projet=$projet[1];
  $date_debut=$projet[5];
  $date_fin=$projet[6];
  if (!empty($name_projet)) {  //recuperation des noms des pfe
    if ($type=="PFE") {
      $table_pfe[$pp]=$name_projet;
      /*$table_pfe[$pp]['nom']=$name_projet;
      $table_pfe[$pp]['date_debut']=$date_debut;
      $table_pfe[$pp]['date_fin']=$date_fin;*/

      $pp++;
      $pfe++;
    }
    else {    //recupoeration des noms des projets master
      $table_master[$mm]=$name_projet;
      /*$table_master[$mm]['nom']=$name_projet;
      $table_master[$mm]['date_debut']=$date_debut;
      $table_master[$mm]['date_fin']=$date_fin;*/
      $mm++;
      $master++;
    }
  }
}

$pfe= 0 ;
$json = array("tabmaster" => $table_master , "tabpfe" =>  $table_pfe , "nbmaster" => $master ,"nbpfe"=> $pfe);


echo json_encode($json);


 ?>
