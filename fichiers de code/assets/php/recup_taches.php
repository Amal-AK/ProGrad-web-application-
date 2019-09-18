<?php

//connexin a la base de données
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$nom_projet=$_GET['projet'];
$nom_phase=$_GET['phase'];
$boucle = $_GET['boucle'] ; 
$table_taches=array();

$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet', (String) $nom_projet);
$requete->execute();
$projet= $requete->fetch();

$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id_projet AND nom= :nom');
$requete->bindValue(':id_projet',$projet[0]);
$requete->bindValue(':nom',$nom_phase);
$requete->execute();
$phase= $requete->fetch();
$id_phase=$phase[0];

$requete = $conn->prepare('SELECT * FROM taches WHERE num_projet= :id_projet AND id_phase= :id');
$requete->bindValue(':id_projet',$projet[0]);
$requete->bindValue(':id',$id_phase);
$requete->execute();
$taches= $requete->fetchAll();

$count =count($taches);

if ($count==1)
{
  $requete = $conn->prepare('SELECT * FROM taches WHERE num_projet= :id_projet AND id_phase= :id');
  $requete->bindValue(':id_projet',$projet[0]);
  $requete->bindValue(':id',$id_phase);
  $requete->execute();
  $taches= $requete->fetch();

  $table_taches[0]['tache']=$taches[4];
  $table_taches[0]['realise']=$taches[5];

}
elseif ($count>1)
{
  for ($i=0; $i <$count ; $i++)
  {
    $table_taches[$i]['tache']=$taches[$i][4];
    $table_taches[$i]['realise']=$taches[$i][5];
  }

}




//le resultat est la table_taches
//if $count==0 il n'existe aucune tache dans la phse

$json = array("tache" => $table_taches , "nombre"=> $boucle , "phase"=>$nom_phase);

echo json_encode($json);


 ?>
