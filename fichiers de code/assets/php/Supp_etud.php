<?php

session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$etudiant= $_GET['id'];
$nom_projet =$_SESSION['projet'];

$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$row_pr = $requete->fetch();
$id=$row_pr[0];
$type= $row_pr[4];

if ($type=="Master")
{
  $master= 0;
  $requete = $conn->prepare('UPDATE etud SET master= :master WHERE id= :id');
  $requete->bindValue(':master',$master);
  $requete->bindValue(':id',$etudiant);
  $requete->execute();
}
elseif ($type=="PFE") {
  $pfe= 0;
  $requete = $conn->prepare('UPDATE etud SET pfe= :pfe WHERE id= :id');
  $requete->bindValue(':pfe',$pfe);
  $requete->bindValue(':id',$etudiant);
  $requete->execute();
}
$requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
$requete->bindValue(':id',$id) ;
$requete->execute();
$etud = $requete->fetch();

if (($etud[5]==$etud[6]) && ($etud[5]==0))
{
  $requete = $conn->prepare('DELETE FROM etud WHERE id= :id ');
  $requete->bindValue(':id',$etudiant);
  $requete->execute();

}





header('Location: projet_encadreur.php?nomProjet='.$nom_projet) ; 
exit() ; 




 ?>
