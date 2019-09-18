<?php
session_start();
//connexion vers la bdd
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$matricule=$_POST['matricule'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['email'];
$num_tele=$_POST['Numéro'];
$password=$_POST['pass'];
$nom_projet=$_SESSION['projet'];
$type_user="etudiant";
//
$type_u="ETUD";

$requete = $conn->prepare('SELECT * FROM etud WHERE matricule= :matricule');
$requete->bindValue(':matricule',$matricule) ;
$requete->execute();
$etud= $requete->fetch();


$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$nom_projet) ;
$requete->execute();
$projet= $requete->fetch();
$id_projet=$projet[0];
$type=$projet[4];



if (!empty($etud[1]))
{

  if ($type=="Master")
  {
      $master=$id_projet;
      $requete = $conn->prepare('UPDATE etud SET pfe= :pfe WHERE matricule = :matricule');
      $requete->bindValue(':matricule',$matricule );
      $requete->bindValue(':master', $master);
      $requete->execute();

      echo "L'etudiant existe déja!";


  }

  elseif ($type=="PFE")
  {
      $pfe=$id_projet;
      $requete = $conn->prepare('UPDATE etud SET pfe= :pfe WHERE matricule = :matricule');
      $requete->bindValue(':matricule',$matricule );
      $requete->bindValue(':pfe', $pfe);
      $requete->execute();
      echo "L'etudiant existe déja!";
    }


}


else
{
  $chemin="uploads/default.png";


  $req1 = $conn->prepare('INSERT INTO photos VALUES (null,:chemin,:id_user,:type_user)');
  $req1->execute(array(
     'chemin' =>$chemin,

     'id_user' =>$matricule,
     'type_user' =>$type_u
    ));
  if ($type=="PFE")
  {

    $pfe=$id_projet;
    $master=0;

    $requete = $conn->prepare('SELECT * FROM etud  WHERE pfe= :pfe');
    $requete->bindValue(':pfe',$pfe) ;
    $requete->execute();
    $etud= $requete->fetchAll();
    if (count($etud)<2)
    {
      $requete = $conn->prepare('INSERT INTO etud VALUES(:id,:nom,:prenom,:mail,:num_tele, :pfe,:master,:password)');

      $requete->bindValue(':id',$matricule) ;
      $requete->bindValue(':nom',$nom) ;
      $requete->bindValue(':prenom', $prenom);
      $requete->bindValue(':mail', $mail);
      $requete->bindValue(':num_tele',$num_tele);
      $requete->bindValue(':pfe',$pfe);
      $requete->bindValue(':master',$master);
      $requete->bindValue(':password',$password);
      $requete->execute();
      $msg= "success" ;
    }
       else {
      $msg="error" ;
    }

  }
  elseif ($type=="Master")
  {
    $master=$id_projet;
    $pfe=0;
    $requete = $conn->prepare('SELECT * FROM etud  WHERE master= :master');
    $requete->bindValue(':master',$master) ;
    $requete->execute();
    $etud= $requete->fetchAll();
    if (count($etud)<2)
    {
      $requete = $conn->prepare('INSERT INTO etud VALUES(:id,:nom,:prenom,:mail,:num_tele, :pfe,:master,:password)');

      $requete->bindValue(':id',$matricule) ;
      $requete->bindValue(':nom',$nom) ;
      $requete->bindValue(':prenom', $prenom);
      $requete->bindValue(':mail', $mail);
      $requete->bindValue(':num_tele',$num_tele);
      $requete->bindValue(':pfe',$pfe);
      $requete->bindValue(':master',$master);
      $requete->bindValue(':password',$password);
      $requete->execute();
      $msg= "success" ;
    }
    else {
      $msg="error" ;
    }

  }


}

header('Location: AjouterEtudiant.php?msg='.$msg ) ;
exit() ;

 ?>
