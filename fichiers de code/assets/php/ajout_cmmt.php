<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$type_user=$_SESSION['type_user'];
$user=$_SESSION['id'];
$nom_phase =$_GET['phase'];
$nom_projet =$_SESSION['projet'];
$cmmt=$_GET['comment'];
$date_m=date("Y-m-d H:i:s");

$action="a ajouté un commentaire dans la phase ".$nom_phase." du projet ".$nom_projet;


//Get id projet
$requete = $conn->prepare('SELECT id FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$projet = $requete->fetch();
$id_projet=$projet[0];

$requete = $conn->prepare('SELECT id FROM phase WHERE nom= :nom_phase AND num_projet= :id_projet');
$requete->bindValue(':id_projet',$id_projet) ;
$requete->bindValue(':nom_phase',$nom_phase) ;
$requete->execute();
$phase = $requete->fetch();
$id_phase=$phase[0];

$requete = $conn->prepare('INSERT INTO commentaires VALUES(null,:id_projet,	:id_phase,	:id_user, :type_user,	:cmmt)');
$requete->bindValue(':id_projet', $id_projet);
$requete->bindValue(':id_phase',$id_phase);
$requete->bindValue(':id_user', $user);
$requete->bindValue(':type_user', $type_user);
$requete->bindValue(':cmmt',$cmmt);
$requete->execute();

//insertion de l'action dans l'historique du projet
  $requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
  $requete->bindValue(':id_user',$user) ;
  $requete->bindValue(':id_projet',$id_projet) ;
  $requete->bindValue(':date_m',$date_m);
  $requete->bindValue(':type',$type_user);
  $requete->bindValue(':action',$action);
  $requete->execute();

 ?>
