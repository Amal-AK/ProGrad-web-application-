<?php
session_start();
//connexin a la base de données
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$chemin =$_SESSION['photo'] ;
$type_user="enseignant";
$user=$_SESSION['id'];
$date_m=date("Y-m-d H:i:s");
$name=$_SESSION['nom_projet'];
$nb_phases=$_POST['nombre'];
$etat=0;
$_SESSION['projet'] = $name ; 



//recherche du projet
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$name);
$requete->execute();
$id_projet = $requete->fetch();
for ($i=1; $i <=$nb_phases ; $i++)
{
    $nb_chaine=(string) $i;
    $chaine="phaseName".$nb_chaine;
    $nom_phase=$_POST[$chaine];
    $chaine1="DateDebut".$nb_chaine;
    $date_debut=$_POST[$chaine1];
    $chaine2="DateFin".$nb_chaine;
    $date_debut=$_POST[$chaine1];
    $date_fin=$_POST[$chaine2];
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

}




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

header('Location: projet_encadreur.php?nomProjet='.$name ) ; 
exit() ; 

 ?>
