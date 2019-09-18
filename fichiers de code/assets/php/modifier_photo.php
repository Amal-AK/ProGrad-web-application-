<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();

$id=$_SESSION['id'];
$_SESSION['id']=$id;
$type_user=$_SESSION['type_user'] ;

if ($type_user=='enseignant')
{
  $type='ENS';}
else {
$type='ETUD';
}


//////////////////////////////////////////////////////////////////////////
if($_SESSION['here']=='nothere'){
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i<10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

if ($_FILES['avatar']['error'] > 0) $erreur = "Erreur lors du transfert";
else {
  $extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
  $nom="uploads/".$randomString.".".$extension_upload;

   $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$nom);
if($resultat)

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{

$requete = $bdd->prepare('UPDATE photos SET chemin=:chemin WHERE id_user = :id && type_user = :type_user ');

$requete->bindValue(':id',$id) ;
$requete->bindValue(':chemin', $nom);
$requete->bindValue('type_user' ,$type);

$requete->execute();
$_SESSION['photo']=$nom;
}
else {
  $msg="erreur lors du chargement de la photo de profil ";
}
}
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
$id=$_SESSION['id'];
$_SESSION['id']=$id;
$_SESSION['here'] = 'here' ;

$_SESSION['tof'] = 1 ; 

header('Location: modifier-profil.php?') ;
exit() ; 


 ?>












