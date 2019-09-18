<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$nom_projet=$_SESSION['projet'];

$requete = $db->prepare('SELECT *  FROM projet WHERE  nom= :nom ');
$requete->bindValue(':nom', $nom_projet);
$requete->execute();
$res = $requete->fetch();
$id_projet=$res['id'];
$myid=$_SESSION['id'];

$id_ens1=$res['ens1'];
$id_ens2=$res['ens2'];

if($myid==$id_ens2)
{$id_ens2=NULL;}

if($myid==$id_ens1)
{$id_ens1=NULL;}

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
  if($result[$j]['id']==$myid)
  {}
    else{
  $profils[$r][0]=$result[$j]['id'];
  $profils[$r][1]=$result[$j]['nom'];
  $profils[$r][2]=$result[$j]['prenom'];
  $profils[$r][3]="etudiant";
 $r++;}
}


if ($id_ens1!=NULL)
{

$requete = $db->prepare('SELECT *  FROM ens1 WHERE  id= :id ');
$requete->bindValue(':id', $id_ens1);
$requete->execute();
$res1 = $requete->fetch();

$profils[$r][0]=$res1['id'];
$profils[$r][1]=$res1['nom'];
$profils[$r][2]=$res1['prenom'];
$profils[$r][3]="enseignant";

}
if ($id_ens2!=NULL)
{


  $requete = $db->prepare('SELECT *  FROM ens1 WHERE  id= :id ');
  $requete->bindValue(':id', $id_ens2);
  $requete->execute();
  $res2 = $requete->fetch();

  $profils[$r][0]=$res2['id'];
  $profils[$r][1]=$res2['nom'];
  $profils[$r][2]=$res2['prenom'];
  $profils[$r][3]="enseignant";
  $r++;
}


$json = array("profil" => $profils );
echo json_encode($json);

//////////////////////////////////////////////////////////////////////////////
?>
