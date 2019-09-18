<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$nom_projet=$_SESSION['projet'];

$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$nom_projet) ;
$requete->execute();
$projet= $requete->fetch();
$id=$projet[0];

$table_date = array();
$table_etat = array();


$requete = $conn->prepare('SELECT * FROM diagrammes WHERE id_projet= :id');
$requete->bindValue(':id',$id) ;
$requete->execute();
$courbe= $requete->fetchAll();
$k=0;
if (count($courbe)>1)
{
  for ($i=0; $i <count($courbe) ; $i++)
  {
   $table_date[$k]=$courbe[$i][3];
   $table_etat[$k]=$courbe[$i][2];
   $k++;

  }
}
elseif (count($courbe)==1)
{
  $requete = $conn->prepare('SELECT * FROM diagrammes WHERE id_projet= :id');
  $requete->bindValue(':id',$id) ;
  $requete->execute();
  $courbe= $requete->fetch();
  $table_date[0]=$courbe[3];
  $table_etat[0]=$courbe[2];
}

$_SESSION['projet']=$nom_projet;
$json = array("tabdates" => $table_date , "tabetat"=> $table_etat);
echo json_encode($json);

 ?>
