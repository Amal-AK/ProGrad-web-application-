<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();



$r=0;


$nom_projet=$_SESSION['projet'];








$requete = $bdd->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj', $nom_projet);
$requete->execute();
$res = $requete->fetch();
$id_projet=$res[0];




$req = $bdd->prepare('SELECT id,date_prevu  FROM livrables WHERE  id_projet = :id ORDER BY  date_prevu asc ');
$req->execute(array(
  'id' => $id_projet
  ));
$resultat2 = $req->fetchAll();
$long=sizeof($resultat2);
$j=0;
for ($j = 0; $j<$long; $j++)
{
 $Livrables[$r][0]=$resultat2[$j][0];
 $Livrables[$r][1]=$resultat2[$j][1];
 $r++;
}

$json = array("livrable" => $Livrables );

echo json_encode($json);


?>
