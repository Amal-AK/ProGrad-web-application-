<?php

session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$nom_projet=$_SESSION['projet'];


$table_phases = array( );
$table_etat = array( );
$nb_phase=0;


$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$nom_projet) ;
$requete->execute();
$projet= $requete->fetch();


$requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
$requete->bindValue(':id',$projet [0]) ;
$requete->execute();
$phases= $requete->fetchAll();
$nb_phases=count($phases);
$etat_coll=0.00;
$etat_cpt=0.00;
if (count($phases)==1)
{

  $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
  $requete->bindValue(':id',$projet [0]) ;
  $requete->execute();
  $phases= $requete->fetch();
  $table_phases[0]=$phases[2];
  $table_etat[0]=floatval($phases[3]);

}
elseif (count($phases)>1)
{
  $k=0;
  for ($i=0; $i <count($phases) ; $i++)
   {
     $table_phases[$k]=$phases[$i][2];
     $table_etat[$k]=floatval($phases[$i][3]);
     $k++;
   }


}
$_SESSION['projet']=$nom_projet;
$json = array("tabphases" => $table_phases , "tabetat_phase"=> $table_etat);


echo json_encode($json);

?>
