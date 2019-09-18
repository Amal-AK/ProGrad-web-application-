<?php
session_start();
//connexin a la base de données
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$type_user="enseignant";
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");

$name=$_SESSION['projet'];
$nom_phase=$_GET['phase'];
$date_debut=$_GET['DateDebut'];
$date_fin=$_GET['DateFin'];


$etat=0;


//recherche du projet
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$name);
$requete->execute();
$id_projet = $requete->fetch();

$action="a ajouté la phase ".$nom_phase." dans le projet ".$name;



$requete = $conn->prepare('INSERT INTO phase VALUES(null,:id_projet,:nom,:etat, :date_debut, :date_fin)');
$requete->bindValue(':id_projet', $id_projet[0]);
$requete->bindValue(':etat',$etat);
$requete->bindValue(':nom', $nom_phase);
$requete->bindValue(':date_debut', $date_debut);
$requete->bindValue(':date_fin',$date_fin);
$requete->execute();

//insertion de l'action dans l'historique du projet
$requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
$requete->bindValue(':id_user',$user) ;
$requete->bindValue(':id_projet',$id_projet[0]) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':type',$type_user);
$requete->bindValue(':action',$action);
$requete->execute();




//modifier l'etat du projet dans la table des diagrammes
$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
$requete->bindValue(':id',$id_projet[0]) ;
$requete->execute();
$phases= $requete->fetchAll();

$etat_coll=0.00;
$etat_cpt=0.00;
if (count($phases)==1)
{

  $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
  $requete->bindValue(':id',$id_projet[0]) ;
  $requete->execute();
  $phases= $requete->fetch();
  $etat_coll=floatval($phases[3]);

}
elseif (count($phases)>1)
{

  for ($i=0; $i <count($phases) ; $i++)
   {
     $etat_cpt=floatval($etat_cpt)+floatval($phases[$i][3]);
   }
   $etat_coll=floatval ( $etat_cpt/count($phases));


}

$requete = $conn->prepare('INSERT INTO diagrammes VALUES(null,:id_projet,:etat,:date_m)');
$requete->bindValue(':id_projet',$id_projet[0]) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':etat',$etat_coll);
$requete->execute();


 ?>
