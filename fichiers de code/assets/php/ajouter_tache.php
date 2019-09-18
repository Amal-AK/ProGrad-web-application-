<?php
session_start();
//connexin a la base de données
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$type_user="enseignant";
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");


$tache=$_GET['tache'];
$nom_projet=$_SESSION['projet'];
$nom_phase=$_GET['phase'];




//rechercher le projet
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj', $nom_projet);
$requete->execute();
$id_projet = $requete->fetch();

//rechercher la phase
$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id AND nom= :nom');
$requete->bindValue(':id', $id_projet[0]);
$requete->bindValue(':nom', $nom_phase);
$requete->execute();
$id_phase = $requete->fetch();


$action="a ajouté une tache dans la phase ".$nom_phase." dans le projet ".$nom_projet;

//ajouter la tache
$idea="";
$realise="non";
$requete = $conn->prepare('INSERT INTO taches VALUES(null,:id_projet,:id_phase,:user_id,:tache, :realise)');
$requete->bindValue(':id_projet', $id_projet[0]);
$requete->bindValue(':id_phase', $id_phase[0]);
$requete->bindValue(':user_id', $idea);
$requete->bindValue(':realise', $realise);
$requete->bindValue(':tache', $tache);
$requete->execute();




//modifier l'etat de la phase
$etat_old=$id_phase[3];

$requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id');
$requete->bindValue(':id',$id_phase[0]) ;
$requete->execute();
$tache= $requete->fetchAll();
$total=count($tache);
$realise="oui";
$requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id AND realise= :realise');
$requete->bindValue(':id',$id_phase[0]) ;
$requete->bindValue(':realise',$realise) ;
$requete->execute();
$tache= $requete->fetchAll();
$tot_real=count($tache);

$etat=floatval(($tot_real*100)/$total);

$requete = $conn->prepare('UPDATE phase SET etat= :etat WHERE id= :idp ');
$requete->bindValue(':idp',$id_phase[0]) ;
$requete->bindValue(':etat',$etat) ;
$requete->execute();




//modifier l'etat general du projet dans la table des diagrammes
$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
$requete->bindValue(':id',$id_projet[0]) ;
$requete->execute();
$phases= $requete->fetchAll();

$etat_coll=0.00;
$etat_cpt=0.00;
if (count($phases)==1)
{

  $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
  $requete->bindValue(':id',$row_pr[0]) ;
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




//insertion de l'action dans l'historique du projet
 $requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
 $requete->bindValue(':id_user',$user) ;
 $requete->bindValue(':id_projet',$id_projet[0]) ;
 $requete->bindValue(':date_m',$date_m);
 $requete->bindValue(':type',$type_user);
 $requete->bindValue(':action',$action);
 $requete->execute();
 ?>
