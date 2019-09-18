<?php
session_start();

$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
//$id=$_SESSION['id'];
$id=$_SESSION['id'];

$requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
$requete->bindValue(':id',$id) ;
$requete->execute();
$etudiant= $requete->fetch();
$pfe="";
$master="";

if ($etudiant[5]!=0)
{
  if ($etudiant[6]!=0)  //master+pfe
  {
    $master=$etudiant[6];
    $pfe=$etudiant[5];
    $requete = $conn->prepare('SELECT * FROM projet WHERE id= :id');
    $requete->bindValue(':id',$master) ;
    $requete->execute();
    $projet1= $requete->fetch();

    $requete = $conn->prepare('SELECT * FROM projet WHERE id= :id');
    $requete->bindValue(':id',$pfe) ;
    $requete->execute();
    $projet2= $requete->fetch();

    $master=$projet1[1];
    $pfe=$projet2[1];

  }
  else   //pfe seulement
  {
    $pfe=$etudiant[5];
    $requete = $conn->prepare('SELECT * FROM projet WHERE id= :id');
    $requete->bindValue(':id',$pfe) ;
    $requete->execute();
    $projet1= $requete->fetch();

    $pfe=$projet1[1];
  }


}
elseif(($etudiant[5]==0)&&($etudiant[6]!=0))//master seulement
{

    $master=$etudiant[6];

    $requete = $conn->prepare('SELECT * FROM projet WHERE id= :id');
    $requete->bindValue(':id',$master) ;
    $requete->execute();
    $projet2= $requete->fetch();
    $master=$projet2[1];
}


$json = array( "nommaster" =>$master  , "nompfe" => $pfe);


echo json_encode($json);


 ?>
