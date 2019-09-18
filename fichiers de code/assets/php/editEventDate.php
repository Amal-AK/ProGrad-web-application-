<?php
session_start();
// Connexion à la base de données
require_once('bdd.php');

$db = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$type_user="enseignant";
$user="2c1CGoUew0";//session
$date_m=date("Y-m-d H:i:s");



if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])){


	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];


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
       $action="a modifié la date du livrable prevu le ".$result['start']." dans le projet ".$res[1];
			$req1 = $db->prepare('UPDATE livrables SET date_prevu = :date_nouv WHERE id_projet = :id_projet && date_prevu = :date_prevu ');
			$req1->execute(array(
					'id_projet' =>$id_projet,
					'date_nouv' =>$start,
					'date_prevu' =>$result['start']

				 ));


		}
		else {
        $action="a modifié la date de la reunion prevue".$result['start']." dans le projet ".$res[1];
			$req1 = $db->prepare('UPDATE reunions SET date_r = :date_nouv WHERE id_projet = :id_projet && date_r = :date_prevu ');
			$req1->execute(array(
					'id_projet' =>$id_projet,
					'date_nouv' =>$start,
					'date_prevu' =>$result['start']

				 ));





		}


		$requete = $db->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
		$requete->bindValue(':id_user',$user) ;
		$requete->bindValue(':id_projet',$id_projet) ;
		$requete->bindValue(':date_m',$date_m);
		$requete->bindValue(':type',$type_user);
		$requete->bindValue(':action',$action);
		$requete->execute();


	$sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";


	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}else{
		die ('OK');
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);


?>
