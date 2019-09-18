<?php
session_start() ;
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$type_user="etudiant";
$user=$_SESSION['id'];

$nom_projet =$_SESSION['projet'];
$nom_phase=$_GET['phase'];
$action="a derealisé une tache de la phase ".$nom_phase." du projet ".$nom_projet;
$date_m=date("Y-m-d H:i:s");

$tache =$_GET['tache'];
$realise="non";


//id_projet
$requete = $conn->prepare('SELECT id FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$projet = $requete->fetch();
$id1=$projet[0];

//id_phase
$requete = $conn->prepare('SELECT id FROM phase WHERE nom= :nom_phase AND  num_projet=:id');
$requete->bindValue(':id',$id1) ;
$requete->bindValue(':nom_phase',$nom_phase) ;
$requete->execute();
$phase = $requete->fetch();
$id2=$phase[0];

$iduser="";
$requete = $conn->prepare('UPDATE taches SET realise = :realise, user_id= :user_id WHERE((tache= :tache) and (id_phase = :id))');
$requete->bindValue(':tache',$tache) ;
$requete->bindValue(':id',$id2) ;
$requete->bindValue(':user_id',$iduser) ;
$requete->bindValue(':realise',$realise) ;
$requete->execute();



$requete = $conn->prepare('SELECT * FROM taches WHERE id_phase = :id');
$requete->bindValue(':id',$id2) ;
$requete->execute();
$taches= $requete->fetchAll();


if (count($taches)!=0)
{
  $count=count($taches);
  $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase = :id AND realise= :realise');
  $requete->bindValue(':id',$id2) ;
  $requete->bindValue(':realise',$realise) ;
  $requete->execute();
  $tache = $requete->fetchAll();
  $count_realise=count($tache);
  $etat=floatval($count_realise*100/$count);

}
else
{
  $etat=0.00;
}

echo "projet: ", $id1;
echo " phase: ", $id2;

$requete = $conn->prepare('UPDATE phase SET etat= :etat WHERE id= :id');
$requete->bindValue(':id',$id2) ;
$requete->bindValue(':etat',$etat) ;
$requete->execute();



$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
$requete->bindValue(':id',$id1) ;
$requete->execute();
$phases= $requete->fetchAll();

$etat_coll=0.00;
$etat_cpt=0.00;
if (count($phases)==1)
{

  $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
  $requete->bindValue(':id',$id1) ;
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


$date_m=date("Y-m-d H:i:s");
//insetion dans la table des digrammes
$requete = $conn->prepare('INSERT INTO diagrammes VALUES(null,:id_projet,:etat,:date_m)');
$requete->bindValue(':id_projet',$id1) ;
$requete->bindValue(':date_m',$date_m);
$requete->bindValue(':etat',$etat_coll);
$requete->execute();

//insertion de l'action dans l'historique du projet
  $requete = $conn->prepare('INSERT INTO historique VALUES(null,:id_user,:id_projet,:date_m,:type, :action)');
  $requete->bindValue(':id_user',$user) ;
  $requete->bindValue(':id_projet',$id1) ;
  $requete->bindValue(':date_m',$date_m);
  $requete->bindValue(':type',$type_user);
  $requete->bindValue(':action',$action);
  $requete->execute();

  ?>
