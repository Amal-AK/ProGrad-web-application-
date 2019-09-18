<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];

$date_m=date("Y-m-d H:i:s");
session_start();
$type_user="enseignant";
$user=$_SESSION['id'] ;
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){

	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];

	if($color=="#FF8C00")
	{ $type="Périodique";}
	else {
		$type="urgente";
	}
	$res = explode('/', $title);

	$req = $db->prepare('SELECT id FROM projet WHERE  nom= :nom ');
	$req->execute(array(
			'nom' =>  $res[1]
			));

	 $resultat = $req->fetch();
	 $id_projet=$resultat['id'];
   $id_phase=0;


	$req1 = $db->prepare('INSERT INTO reunions VALUES (null,:id_projet,:id_phase,:date_r,:salle,:type)');
 	$req1->execute(array(
 	    'id_projet' =>$id_projet,
 	    'id_phase' =>$id_phase,
 	    'date_r' =>$start,
 	    'salle' =>$res[2],
 	    'type' =>$type

 	   ));


		 $action="a ajouté une reunion ".$type." dans le projet ".$res[1];


		 $requete = $db->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type,:action)');
		 $requete->bindValue(':id_user',$user) ;
		 $requete->bindValue(':id_projet',$id_projet) ;
		 $requete->bindValue(':date_m',$date_m);
		 $requete->bindValue(':type',$type_user);
		 $requete->bindValue(':action',$action);
		 $requete->execute();


$sql = "INSERT INTO events(title, start, end, color,id_projet) values ('$title', '$start', '$end', '$color','$id_projet')";
	//$req = $bdd->prepare($sql);
	//$req->execute();

	echo $sql;

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);









?>
