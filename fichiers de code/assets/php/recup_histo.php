<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');


$name_projet=$_SESSION['projet'];


//recuperation de l'identifiant de projet
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$name_projet) ;
$requete->execute();
$projet= $requete->fetch();

//recuperation de l'historique de projet
$requete = $conn->prepare('SELECT * FROM historique WHERE ID_PROJET= :id');
$requete->bindValue(':id',$projet[0]) ;
$requete->execute();
$historique= $requete->fetchAll();

//resultat
$meme=0;


  if (count($historique)>1)
{
     for ($k=0; $k < count($historique); $k++)

     {

        if ($historique[$k][4]=="enseignant")
       {
          $requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id');
          $requete->bindValue(':id',$historique[$k][1]) ;
          $requete->execute();
          $user= $requete->fetch();

        }
        else
        {
          $requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
          $requete->bindValue(':id',$historique[$k][1]) ;
          $requete->execute();
          $user= $requete->fetch();
        }
        $table_histo[$meme][0]=$user[1]." ".$user[2];
        $table_histo[$meme][1]=$historique[$k][3];
        $table_histo[$meme][2]=$historique[$k][5];
        $meme++;
    }


    $nb_ligne=$meme;
}





//table a une dim

elseif (count($historique)==1)
{
  $requete = $conn->prepare('SELECT * FROM historique WHERE ID_PROJET= :id');
  $requete->bindValue(':id',$projet[0]) ;
  $requete->execute();
  $historique= $requete->fetch();


  if ($historique[4]=="enseignant")
  {
    $requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id');
    $requete->bindValue(':id',$historique[1]) ;
    $requete->execute();
    $user= $requete->fetch();

  }
  else
  {
    $requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
    $requete->bindValue(':id',$historique[1]) ;
    $requete->execute();
    $user= $requete->fetch();
  }
  $table_histo[0][0]=$user[1]." ".$user[2];
  $table_histo[0][1]=$historique[3];
  $table_histo[0][2]=$historique[5];


  $nb_ligne=1;
  }

//table vide

if (count($historique)==0)
 {
   //table vide
    $nb_ligne=0;
    echo "rien a afficher";
}

$json = array( "histo" =>$table_histo , "nb" => $nb_ligne );

echo json_encode($json);


 ?>
