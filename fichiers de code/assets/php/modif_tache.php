<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$type_user=$_SESSION['typeuser'];
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");
$nom=$_GET['phase'];
$nom_projet =$_SESSION['projet'];
$tache_old=$_GET ['tache_old'];
$tache_nouv=$_GET['tache'];


$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$row_pr = $requete->fetch();
$projet=$row_pr[0];


$requete = $conn->prepare('SELECT * FROM phase WHERE nom= :nom_phase AND num_projet= :id');
$requete->bindValue(':nom_phase',$nom) ;
$requete->bindValue(':id',$row_pr[0]) ;
$requete->execute();
$row_Ph = $requete->fetch();
$phase=$row_Ph[0];






 ?>
