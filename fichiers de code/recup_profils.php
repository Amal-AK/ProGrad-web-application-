<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$type_user=$_SESSION['type_user'] ;
$id=$_GET['id'] ;
$chemin=$_SESSION['photo'];

$_SESSION['photo']=$chemin;

if ($type_user=='etudiant')
{
  $req = $bdd->prepare('SELECT nom,prenom,mail,tele  FROM etud WHERE  id = :id  ');
  $req->execute(array(
      'id' => $id
      ));
  $resultat = $req->fetch();}
else
{
  $req = $bdd->prepare('SELECT nom,prenom,mail,tele,bureau FROM ens1 WHERE  id = :id  ');

 $req->execute(array(
      'id' => $id

      ));
  $resultat = $req->fetch();
 $_SESSION ['bureau'] = $resultat['bureau'] ;
}
$_SESSION['mail']=$resultat['mail'];
$_SESSION['tele']=$resultat['tele'];
$_SESSION['nom']=$resultat['nom'];
$_SESSION['prenom']=$resultat['prenom'];


?>
