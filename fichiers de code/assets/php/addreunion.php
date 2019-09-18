<?php

require_once('bdd.php');
//// ajout table reunion ///////////////////////////
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();

$user=$_SESSION['id'] ;

$type=$_GET['type'];



$salle=$_GET['lieu'];

$date_h=date("Y-m-d H:i:s");
$date_m=$_GET['date'];

$type_user="enseignant";



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



$req1 = $db->prepare('INSERT INTO reunions VALUES (null,:id_projet,:id_phase,:date_r,:salle,:type)');
$req1->execute(array(
    'id_projet' =>$id_projet[0],
    'id_phase' =>$id_phase[0],
    'date_r' =>$date_m,//en post
    'salle' =>$salle,
    'type' =>$type

   ));

////////////////////////////////ajout table events//////////////////////////////////










$title="reunion"."/".$nom_projet."/".$salle;
$start=$date_m;
$end=$date_m;


if($type=="Urgente")
{ $color="#FF0000";}
else {
  $color="#FF8c00";
}
$sql = "INSERT INTO events(title, start, end, color,id_projet) values ('$title', '$start', '$end', '$color','$id_projet[0]')";


$req = $bdd->prepare($sql);
$req->execute();



/////////////////////////historique////////////////////////////

$action="a ajouté une reunion ".$type." dans le projet ".$nom_projet;


$requete = $db->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_projet[0]) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();













 ?>
