<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$type_user=$_SESSION['typeuser'];
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");
$nom_projet=$_SESSION['projet'];


/******************************** les nouvelles variables ******************************/
$nom =$_GET['nom_old'];
$nom_nouv=$_GET['nom'];
$date_debut=$_GET['date_debut'];
$date_debut_ancien=$_GET['date_debut_old'];
$date_fin=$_GET['date_fin'];
$date_fin_ancien=$_GET['date_fin_old'];
/*************************************************************************************/

$requete = $conn->prepare('SELECT id FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$row_pr = $requete->fetch();
$id_pr=$row_pr[0];


$requete = $conn->prepare('SELECT * FROM phase WHERE nom= :nom_phase AND num_projet= :id');
$requete->bindValue(':nom_phase',$nom) ;
$requete->bindValue(':id',$row_pr[0]) ;
$requete->execute();
$row_Ph = $requete->fetch();
$id_ph=$row_Ph[0];



$action="a modifié la phase ".$nom." du projet ".$nom_projet;
$requete = $conn->prepare('UPDATE phase SET nom = :nom WHERE id= :id  ');
$requete->bindValue(':nom',$nom_nouv) ;
$requete->bindValue(':id',$id_ph);
$requete->execute();


$requete = $conn->prepare('UPDATE phase SET date_debut = :date_debut WHERE id= :id  ');
$requete->bindValue(':date_debut',$date_debut) ;
$requete->bindValue(':id',$id_ph) ;
$requete->execute();



$requete = $conn->prepare('UPDATE phase SET date_fin = :date_fin WHERE id= :id  ');
$requete->bindValue(':date_fin',$date_fin) ;
$requete->bindValue(':id',$id_ph) ;
$requete->execute();




//insertion de l'action dans l'historique du projet
$requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_pr) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();

 ?>
