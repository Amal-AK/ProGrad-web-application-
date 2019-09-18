<?php
session_start();

$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
//recup des donnees

$mail=$_POST['mail'];
$name_proj=$_SESSION['projet'];

//rechercher l'ens
$requete = $conn->prepare('SELECT * FROM ens1 WHERE mail= :mail');
$requete->bindValue(':mail',$mail);
$requete->execute();
$ens= $requete->fetch();
$projets_str=$ens[6];

$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$name_proj) ;
$requete->execute();
$projet= $requete->fetch();

if (!empty($projet[7]) && !empty($projet[8]))
{
  echo "L'espace du projet est déja lié avec 2 encadreurs";
}
else
{
  //recuperatin de l'identifiant du projet inseré
  $requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
  $requete->bindValue(':name_proj',$name_proj) ;
  $requete->execute();
  $projet= $requete->fetch();
  $projet_id=$projet[0];

  $requete = $conn->prepare('UPDATE projet SET ens2 = :ens2 WHERE nom= :name_proj');
  $requete->bindValue(':name_proj',$name_proj) ;
  $requete->bindValue(':ens2',$ens[0]) ;
  $requete->execute();


  if (!empty ( $projets_str) )
  {
    $projets_str=$projets_str.".";
  }

  $projets_str=$projets_str.$projet_id;
  $requete = $conn->prepare('UPDATE ens1 SET PROJETS = :projets WHERE ID = :ens_matricule');
  $requete->bindValue(':ens_matricule',$ens[0] );
  $requete->bindValue(':projets', (String) $projets_str);
  $requete->execute();


}


header('Location: pageAjoutOldEns.php?check=1') ;
exit() ;

 ?>
