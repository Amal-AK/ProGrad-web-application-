<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

session_start();
$type_user=$_SESSION['type_user'] ;
$id=$_SESSION['id'] ;
$_SESSION['id']=$id;
$_SESSION['type_user']=$type_user;

$chemin =$_SESSION['photo'] ;

if ($type_user=="enseignant")
{
  $pass=$_POST['newPasswd'];
  $requete= $bdd->prepare('UPDATE ens1 SET pass= :pass  WHERE id = :id');
  $requete->bindValue(':pass',$pass);
  $requete->bindValue(':id', $id, PDO::PARAM_STR);
  $requete->execute();



}


else {


    $pass=$_POST['newPasswd'];
    $requete= $bdd->prepare('UPDATE etud SET pass= :pass  WHERE id = :id');
    $requete->bindValue(':pass',$pass);
    $requete->bindValue(':id', $id, PDO::PARAM_STR);
    $requete->execute();

}


$nom=$_SESSION['nom'];
$_SESSION['nom']=$nom;
$prenom=$_SESSION['prenom'];
$_SESSION['prenom']=$prenom;
$mail=$_SESSION['mail'];
$_SESSION['mail']=$mail;
$tele=$_SESSION['tele'];
$_SESSION['tele']=$tele;
$chemin =$_SESSION['photo'] ;
$_SESSION['photo']=$chemin ;

/*   if(info.trim().match(/^[a-z]{1}_[a-zA-Z_\-]+@esi\.dz$/) != null) */
$id=$_SESSION['id'];
$_SESSION['id']=$id;
$_SESSION['PASS'] = 1 ; 

header('Location: modifier-profil.php') ;
exit() ; 



 ?>
