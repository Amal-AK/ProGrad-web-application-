<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$type_user=$_SESSION['typeuser'];
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");

$nom_phase =$_GET['phase'];
$nom_projet =$_SESSION['projet'];
$action="a supprimé un commentaire dans la phase ".$nom_phase." du projet ".$nom_projet;
$cmmt=$_GET['com'];


//recuperer le projet
$requete = $conn->prepare('SELECT id FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$projet = $requete->fetch();
$id_projet=$projet[0];

//la phase
$requete = $conn->prepare('SELECT * FROM phase WHERE nom= :nom_phase AND num_projet= :id_projet');
$requete->bindValue(':id_projet',$id_projet) ;
$requete->bindValue(':nom_phase',$nom_phase) ;
$requete->execute();
$phase = $requete->fetch();
$id_phase=$phase[0];

$requete = $conn->prepare('SELECT * FROM commentaires WHERE id_phase= :id_phase AND cmmt= :cmmt AND id_user= :user_id');
$requete->bindValue(':id_phase',$id_phase);
$requete->bindValue(':user_id', $user);
$requete->bindValue(':cmmt',$cmmt);
$requete->execute();
$cmmt = $requete->fetch();

$id=$cmmt[0];

$requete = $conn->prepare('DELETE FROM commentaires WHERE id= :id');
$requete->bindValue(':id',$id);
$requete->execute();

//insertion de l'action dans l'historique du projet
  $requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
  $requete->bindValue(':id_user',$user) ;
  $requete->bindValue(':id_projet',$id_phase) ;
  $requete->bindValue(':date_m',$date_m);
  $requete->bindValue(':type',$type_user);
  $requete->bindValue(':action',$action);
  $requete->execute();

 ?>
