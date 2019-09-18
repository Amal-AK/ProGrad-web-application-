<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();


$r=0;


$nom_projet=$_SESSION['projet'];








$requete = $db->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj', $nom_projet);
$requete->execute();
$res = $requete->fetch();
$id_projet=$res[0];












  $req = $bdd->prepare('SELECT id,date_r,salle,type  FROM reunions WHERE  id_projet = :id ORDER BY  date_r asc ');
  $req->execute(array(
    'id' => $id_projet
    ));
  $resultat1 = $req->fetchAll();
  $long=sizeof($resultat1);

  for ($j = 0; $j<$long; $j++)
  {
   $Reunions[$r][0]=$resultat1[$j][0];
   $Reunions[$r][1]=$resultat1[$j][1];
   $Reunions[$r][2]=$resultat1[$j][2];
   $Reunions[$r][3]=$resultat1[$j][3];

   $r++;
 }


?>
