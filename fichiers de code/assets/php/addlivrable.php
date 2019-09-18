<?php

session_start();
//// ajout table livrable ///////////////////////////
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');



$date_m=$_GET['date'];// normalement a recuperer

$type_user="enseignant";
$user=$_SESSION['id'];

$date_h=date("Y-m-d H:i:s");


$nom_projet=$_SESSION['nomProjet'];

$nom_phase=$_GET['phase'];








$requete = $db->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj', $nom_projet);
$requete->execute();
$id_projet = $requete->fetch();



$requete = $db->prepare('SELECT * FROM phase WHERE num_projet= :id AND nom= :nom');
$requete->bindValue(':id', $id_projet[0]);
$requete->bindValue(':nom', $nom_phase);
$requete->execute();
$id_phase = $requete->fetch();


$action="a ajouté un livrable dans la phase ".$nom_phase." dans le projet ".$nom_projet;



$req1 = $db->prepare('INSERT INTO livrables VALUES (null,:id_projet,:id_phase,null,null,:date_prevu,null)');
$req1->execute(array(
    'id_projet' =>$id_projet[0],
    'id_phase' =>$id_phase[0],
    'date_prevu' =>$date_m ////date en post

   ));

////////////////////////////////ajout table events/////////////////////////////////////////////////////////

$req = $db->prepare('SELECT nom FROM projet WHERE  id= :id');
$req->execute(array(
    'id' =>  $id_projet[0]
    ));
$resultat = $req->fetch();










require_once('bdd.php');
$title="livrable"."/".$nom_projet."/";
$start=$date_m;
$end=$date_m;
$color="#008000";
$sql = "INSERT INTO events(title, start, end, color,id_projet) values ('$title', '$start', '$end', '$color','$id_projet[0]')";


$req = $bdd->prepare($sql);
$req->execute();

/////////////////////////////////////historique/////////////////////////////













$requete = $db->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_projet[0]) ;
$requete->bindValue(':date_m',$date_h);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();















 ?>
