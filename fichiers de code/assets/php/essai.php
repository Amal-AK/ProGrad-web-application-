<?php
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$nom_projet="hello";

$requete = $db->prepare('SELECT *  FROM projet WHERE  nom= :nom ');
$requete->bindValue(':nom', $nom_projet);
$requete->execute();
$res = $requete->fetch();
$id_projet=$res['id'];

$id_ens1=$res['ens1'];
$id_ens2=$res['ens2'];


if($res['pfe_master']=="Master")

{

  $requete = $db->prepare('SELECT *  FROM etud WHERE  master= :id ');
  $requete->bindValue(':id', $id_projet);
  $requete->execute();
  $result = $requete->fetchAll();

}
else {

  $requete = $db->prepare('SELECT *  FROM etud WHERE  pfe= :id ');
  $requete->bindValue(':id', $id_projet);
  $requete->execute();
  $result = $requete->fetchAll();
}



$r=0;
$long=sizeof($result);
$j=0;
for ($j = 0; $j<$long; $j++)
{
  $profils[$r][0]=$result[$j]['id'];
  $profils[$r][1]=$result[$j]['nom'];
  $profils[$r][2]=$result[$j]['prenom'];
  $profils[$r][3]=$result[$j]['mail'];
  $profils[$r][4]=$result[$j]['tele'];
  $profils[$r][5]=$result[$j]['id'];
 $r++;
}




$requete = $db->prepare('SELECT *  FROM ens1 WHERE  id= :id ');
$requete->bindValue(':id', $id_ens1);
$requete->execute();
$res1 = $requete->fetch();

$profils[$r][0]=$res1['id'];
$profils[$r][1]=$res1['nom'];
$profils[$r][2]=$res1['prenom'];
$profils[$r][3]=$res1['mail'];
$profils[$r][4]=$res1['tele'];
$profils[$r][5]=$res1['bureau'];
$r++;

$requete = $db->prepare('SELECT *  FROM ens1 WHERE  id= :id ');
$requete->bindValue(':id', $id_ens2);
$requete->execute();
$res2 = $requete->fetch();

$profils[$r][0]=$res2['id'];
$profils[$r][1]=$res2['nom'];
$profils[$r][2]=$res2['prenom'];
$profils[$r][3]=$res2['mail'];
$profils[$r][4]=$res2['tele'];
$profils[$r][5]=$res2['bureau'];






$json = array("profil" => $profils );

echo json_encode($json);

//////////////////////////////////////////////////////////////////////////////
?>
