<?php
//session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
/*$type_user=$_SESSION['typeuser'];
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");
*/
$nom ="amk akka";
$nom_projet ="application d'éducation ";

$action="a modifié la phase ".$nom." du projet ".$nom_projet;

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



$action="a modifié le nom de la phase ".$nom." du projet ".$nom_projet;
$nom_nouv="random";
$requete = $conn->prepare('UPDATE phase SET nom = :nom WHERE id= :id  ');
$requete->bindValue(':nom',$nom_nouv) ;
$requete->bindValue(':id',$id_ph);
$requete->execute();
/*
$action="a modifié la date de debut de la phase ".$nom." du projet ".$nom_projet;
$date=date_create($_GET['date_debut']);
$requete = $conn->prepare('UPDATE phase SET date_debut = :date_debut WHERE id= :id  ');
$requete->bindValue(':date_debut',date_format($date, 'Y-m-d H:i:s')) ;
$requete->bindValue(':id',$id_ph) ;
$requete->execute();


$action="a modifié la date de fin de la phase ".$nom." du projet ".$nom_projet;
$date=date_create($_GET['date_fin']);
$requete = $conn->prepare('UPDATE phase SET date_fin = :date_fin WHERE id= :id  ');
$requete->bindValue(':date_fin',date_format($date, 'Y-m-d H:i:s')) ;
$requete->bindValue(':id',$id_ph) ;
$requete->execute();

*/

/*
//insertion de l'action dans l'historique du projet
$requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_pr) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();
*/
 ?>
