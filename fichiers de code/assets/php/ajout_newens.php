<?php
session_start();

//connexion vers la bdd

$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
//recup des donnees
//

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$mail=$_POST['email'];
$num_tele=$_POST['Numéro'];
$num_bureau=$_POST['numbureau'];
$password=$_POST['pass'];
$name_proj=$_SESSION['projet'];




  $requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
  $requete->bindValue(':name_proj',$name_proj) ;
  $requete->execute();
  $projet= $requete->fetch();

if (!empty($projet[7]) && !empty($projet[8]))
{
    echo "L'espace du projet est déja lié avec 2 encadreurs";
    header('Location: pageAjoutNewEns.php?msg=error') ;
    exit() ;
}


else
 {
   $type='ENS';
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';

   for ($i = 0; $i<10; $i++)
   {
     $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   $id= $randomString;
   $chemin="uploads/default.png";


   $req1 = $conn->prepare('INSERT INTO photos VALUES (null,:chemin,:id_user,:type_user)');
   $req1->execute(array(
      'chemin' =>$chemin,

      'id_user' =>$id,
      'type_user' =>$type
     ));





   //recuperatin de l'identifiant du projet inseré
   $requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
   $requete->bindValue(':name_proj',$name_proj) ;
   $requete->execute();
   $projet= $requete->fetch();
   $projet_id=$projet[0];
   $projets="";
   $projets=$projets.$projet_id;


   $requete = $conn->prepare('INSERT INTO ens1 VALUES(:id,:nom,:prenom,:mail,:num_tele, :num_bureau,:projets,:password)');
   $requete->bindValue(':id',$id) ;
   $requete->bindValue(':nom',$nom) ;
   $requete->bindValue(':prenom', $prenom);
   $requete->bindValue(':mail', $mail);
   $requete->bindValue(':num_tele',$num_tele);
   $requete->bindValue(':num_bureau',$num_bureau);
   $requete->bindValue(':projets',$projets);
   $requete->bindValue(':password',$password);
   $requete->execute();

   $requete = $conn->prepare('UPDATE projet SET ens2 = :ens2 WHERE nom= :name_proj');
   $requete->bindValue(':name_proj',$name_proj) ;
   $requete->bindValue(':ens2',$id) ;
   $requete->execute();
   header('Location: pageAjoutNewEns.php?msg=1') ;
   exit() ;


}





 ?>
