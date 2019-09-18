<?php

session_start();
////////////////////////////////////////////////////////////////////////////////////
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$type_user=$_SESSION['type_user'];
$_SESSION['type_user']=$type_user;
$date_dep=date("Y-m-d H:i:s");
$nouv_nom=$_FILES['livrable']['name'];
if($type_user=="enseignant")
{$nouv_nom="corrigé de".$_FILES['livrable']['name'];}

$id_liv=$_SESSION['id_liv'];//recuperer avec post
$_SESSION['id_liv']=$id_liv;
$user=$_SESSION['id'];//session
$_SESSION['id']=$user;
$nom_projet =$_SESSION['nomProjet'];
$_SESSION['nomProjet'] =$nom_projet ;

$requete = $bdd->prepare('SELECT * FROM livrables WHERE id= :id');
$requete->bindValue(':id', $id_liv);
$requete->execute();
$res = $requete->fetch();

$id_phase=$res['id_phase'];

$requete = $bdd->prepare('SELECT * FROM phase WHERE id= :id');
$requete->bindValue(':id', $id_phase);

$requete->execute();
$res1=$requete->fetch();
$nom_phase=$res1['nom'];
if($type_user=="enseignant")
{$action="a deposé le corrigé du ".$_SESSION['fichier']." dans le projet ".$nom_projet;}
  else {
  $action="a deposé un livrable dans la phase ".$nom_phase." dans le projet ".$nom_projet;
  }


  $requete = $bdd->prepare('SELECT * FROM projet WHERE nom= :name_proj');
  $requete->bindValue(':name_proj', $nom_projet);
  $requete->execute();
  $id_projet = $requete->fetch();













if ($_FILES['livrable']['error'] > 0) $erreur = "Erreur lors du transfer";
else {

  $nom="livrables/".$_FILES['livrable']['name'];

   $resultat = move_uploaded_file($_FILES['livrable']['tmp_name'],$nom);

if($resultat)

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{






////////////////////historique//////////////////////////

$requete = $bdd->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_projet[0]) ;
$requete->bindValue(':date_m',$date_dep);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();



















  $requete = $bdd->prepare('UPDATE livrables SET chemin =:chemin , nom =:nom ,date_dep= :date_dep WHERE id = :id');

  $requete->bindValue(':chemin', $nom);
  $requete->bindValue(':nom', $nouv_nom);
  $requete->bindValue(':date_dep', $date_dep);

  $requete->bindValue(':id', $id_liv, PDO::PARAM_INT);

  $requete->execute();


}
else {
  $msg="erreur lors du chargement du fichier ";
}
}




if($type_user=="enseignant")

	{


		$chemin=$_SESSION['photo'];
		$nom = $_SESSION['nom']  ;
		$prenom = $_SESSION['prenom'] ;

		$id=$_SESSION['id'] ;
		$_SESSION['id']=$id;

		$_SESSION['type_user']="enseignant";
		$nom_projet =$_SESSION['nomProjet'];
		$_SESSION['nomProjet'] =$nom_projet ;


		$req = $bdd->prepare('SELECT chemin,nom,date_prevu,date_dep FROM livrables WHERE  id = :id');
		$req->execute(array(
		  'id' => $id_liv
		  ));
		$resultat = $req->fetch();

		$depo=$resultat['date_dep'];
		$prevu=$resultat['date_prevu'];

		$dteStart = new DateTime($depo);
		$dteEnd   = new DateTime($prevu);

		$dteDiff  = $dteStart->diff($dteEnd);
		$chemin_liv=$resultat['chemin'];
		$nom_liv=$resultat['nom'];

		$_SESSION['fichier']=$nom_liv;

  header('Location: dépo_ens.php?id_liv='.$id_liv ) ;
      exit() ;


}

else {







  $chemin=$_SESSION['photo'];
  $nom = $_SESSION['nom']  ;
  $prenom = $_SESSION['prenom'] ;

  $id=$_SESSION['id'] ;
  $_SESSION['id']=$id;

  $_SESSION['type_user']="etudiant";
  $nom_projet =$_SESSION['nomProjet'];
  $_SESSION['nomProjet'] =$nom_projet ;


  $req = $bdd->prepare('SELECT chemin,nom,date_prevu,date_dep FROM livrables WHERE  id = :id');
  $req->execute(array(
    'id' => $id_liv
    ));
  $resultat = $req->fetch();

  $date=date("Y-m-d H:i:s");
  $prevu=$resultat['date_prevu'];

  $dteStart = new DateTime($date);
  $dteEnd   = new DateTime($prevu);

  $dteDiff  = $dteStart->diff($dteEnd);
  $chemin_liv=$resultat['chemin'];
  $nom_liv=$resultat['nom'];

  $_SESSION['fichier']=$nom_liv;


  header('Location: dépo_ens.php?id_liv='.$id_liv) ;
exit() ;

}


 ?>
