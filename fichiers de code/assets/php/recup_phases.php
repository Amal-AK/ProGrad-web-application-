<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$table_phase = array( );
$nom_projet=$_SESSION['projet'];
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet', (String) $nom_projet);
$requete->execute();
$projet= $requete->fetch();

$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id_projet');
$requete->bindValue(':id_projet',$projet[0]);
$requete->execute();
$phases= $requete->fetchAll();
$count=count($phases);
$m=0;
//recuperations des taches
if (count($phases)>1)
{
  for ($i=0; $i <count($phases) ; $i++)
  {
    
      $table_phase[$m]['nom']=$phases[$i][2];
      $table_phase[$m]['date_debut']=$phases[$i][4];
      $table_phase[$m]['date_fin']=$phases[$i][5];
      $m++;
  }

}
elseif (count($phases)==1) {//une seule phase inserée
  $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id_projet');
  $requete->bindValue(':id_projet',$projet[0]);
  $requete->execute();
  $phase= $requete->fetch();

  $table_phase[0]['nom']=$phases[0][2];
  $table_phase[0]['date_debut']=$phases[0][4];
  $table_phase[0]['date_fin']=$phases[0][5];
}


$json = array("phase" => $table_phase);

echo json_encode($json);

?>
