<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$nom_phase =$_GET['phase'];
$nom_projet =$_SESSION['projet'];
$nbr = $_GET['nb'] ; 

$table_cmmt = array( );
//recuperer le projet
$requete = $conn->prepare('SELECT id FROM projet WHERE nom= :nom_projet');
$requete->bindValue(':nom_projet',$nom_projet) ;
$requete->execute();
$projet = $requete->fetch();
$id_projet=$projet[0];

//la phase
$requete = $conn->prepare('SELECT id FROM phase WHERE nom= :nom_phase AND num_projet= :id_projet');
$requete->bindValue(':id_projet',$id_projet) ;
$requete->bindValue(':nom_phase',$nom_phase) ;
$requete->execute();
$phase = $requete->fetch();
$id_phase=$phase[0];


$requete = $conn->prepare('SELECT * FROM commentaires WHERE id_phase= :id_phase');
$requete->bindValue(':id_phase',$id_phase);
$requete->execute();
$cmmt = $requete->fetchAll();

if (count($cmmt)>1)
{
  $k=0;
  for ($i=0; $i < count($cmmt); $i++)
  {
    if ($cmmt[$i][4]=='enseignant')
    {
      $requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id');
      $requete->bindValue(':id',$cmmt[$i][3]);
      $requete->execute();
      $user  = $requete->fetch();
    }
    else
    {
      $requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
      $requete->bindValue(':id',$cmmt[$i][3]);
      $requete->execute();
      $user  = $requete->fetch();
    }
    $user_name=$user[1]." ".$user[2];
    $table_cmmt[$k]['user_name']=$user_name;
    $table_cmmt[$k]['commentaire']=$cmmt[$i][5];
    $k++;
  }


}
elseif (count($cmmt)==1)
{
  $requete = $conn->prepare('SELECT * FROM commentaires WHERE id_phase= :id_phase');
  $requete->bindValue(':id_phase',$id_phase);
  $requete->execute();
  $cmmt = $requete->fetch();
  if ($cmmt[4]=='enseignant')
  {
    $requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id');
    $requete->bindValue(':id',$cmmt[3]);
    $requete->execute();
    $user  = $requete->fetch();
  }
  else
  {
    $requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
    $requete->bindValue(':id',$cmmt[3]);
    $requete->execute();
    $user  = $requete->fetch();
  }
  $user_name=$user[1]." ".$user[2];
  $table_cmmt[0]['user_name']=$user_name;
  $table_cmmt[0]['commentaire']=$cmmt[5];

}
else
{
    echo "aucun commentaire a afficher";
}


$json = array( "com" =>$table_cmmt , "nombre"=> $nbr);

echo json_encode($json);




 ?>
