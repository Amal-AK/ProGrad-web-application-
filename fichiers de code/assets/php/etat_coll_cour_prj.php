<?php

session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$nom_projet=$_SESSION['projet'];




$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$nom_projet) ;
$requete->execute();
$projet= $requete->fetch();


$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
$requete->bindValue(':id',$projet [0]) ;
$requete->execute();
$phases= $requete->fetchAll();

$etat_coll=0.00;
$etat_cpt=0.00;
if (count($phases)==1)
{

  $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
  $requete->bindValue(':id',$projet [0]) ;
  $requete->execute();
  $phases= $requete->fetch();
  $etat_coll=floatval($phases[3]);

}
elseif (count($phases)>1)
{

  for ($i=0; $i <count($phases) ; $i++)
   {
     $etat_cpt=floatval($etat_cpt)+floatval($phases[$i][3]);
   }
   $etat_coll=floatval ( $etat_cpt/count($phases));


}


//etat_coll rep l'etat collectif courant de l'avancement du projet
