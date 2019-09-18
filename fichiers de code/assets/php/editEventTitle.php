<?php

require_once('bdd.php');
session_start();
$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$type_user="enseignant";
$user="2c1CGoUew0";
$date_m=date("Y-m-d H:i:s");







if (isset($_POST['delete']) && isset($_POST['id'])){


	$id = $_POST['id'];

///////////////////////////////////////////////////
$req = $bdd->prepare('SELECT title,start FROM events WHERE  id= :id ');
$req->execute(array(
		'id' =>  $id
		));
$result = $req->fetch();


$res = explode('/', $result['title']);
$req = $db->prepare('SELECT id FROM projet WHERE  nom= :nom ');
$req->execute(array(
		'nom' =>  $res[1]
		));
$resultat = $req->fetch();
$id_projet=$resultat['id'];


	if($res[0]=="livrable")

	{
    $action="a supprimé le  livrable prevu ".$result['start']." dans le projet ".$res[1];
		$req1 = $db->prepare('DELETE FROM livrables  WHERE id_projet = :id_projet && date_prevu = :date_prevu ');
		$req1->execute(array(
				'id_projet' =>$id_projet,

				'date_prevu' =>$result['start']

			 ));


	}
	else {


    $action="a supprimé la reunion  prevue ".$result['start']." dans le projet ".$res[1];
		$req1 = $db->prepare('DELETE FROM reunions  WHERE id_projet = :id_projet && date_r = :date_prevu ');
		$req1->execute(array(
				'id_projet' =>$id_projet,

				'date_prevu' =>$result['start']

			 ));














	}


	/////////////////////////////////


	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){

	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
if($color=="#FF0000")	$type="urgente";
if($color=="#FF8C00")	$type="normale";
	$res1 = explode('/', $title);
	///////////////////////////////////////////////////
	$req = $bdd->prepare('SELECT title,start FROM events WHERE  id= :id ');
	$req->execute(array(
			'id' =>  $id
			));
	$result = $req->fetch();


	$res = explode('/', $result['title']);
	$req = $db->prepare('SELECT id FROM projet WHERE  nom= :nom ');
	$req->execute(array(
			'nom' =>  $res[1]
			));
	$resultat = $req->fetch();
	$id_projet=$resultat['id'];




		if($res[0]=="reunion")

		{
			$action="a modifié la reunion  prevue".$result['start']." dans le projet ".$res[1];
			$req2 = $db->prepare('UPDATE reunions SET salle = :salle,type = :type WHERE id_projet = :id_projet && date_r = :date_r');
			$req2->execute(array(
					'id_projet' =>$id_projet,
				  'date_r' =>$result['start'],
					'salle' =>$res1[2],
          'type' =>$type
				 ));



		}


		/////////////////////////////////




















	$sql = "UPDATE events SET  title = '$title', color = '$color' WHERE id = $id ";


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

$requete = $db->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_projet) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();













header('Location: page_agenda_ens.php');


?>
