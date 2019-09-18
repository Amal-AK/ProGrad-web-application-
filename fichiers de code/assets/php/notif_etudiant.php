<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$nb=6;
$projet = array( );
$notif=array();
$id_etud=$_SESSION['id'];

$requete = $conn->prepare('SELECT * FROM etud WHERE id= :id_user');
$requete->bindValue(':id_user',$id_etud) ;
$requete->execute();
$etud = $requete->fetch();
$projet[0]=$etud[6];
$projet[1]=$etud[5];






for ($i=0; $i <sizeof($projet) ; $i++) {
  if (!empty($projet[$i])&& !is_null($projet[$i]))
  {
    $requete = $conn->prepare('SELECT * FROM historique WHERE id_projet= :master');
    $requete->bindValue(':master',$projet[$i]) ;
    $requete->execute();
    $historique = $requete->fetchAll();

    if (count($historique)>1)
    {
      $meme=0;
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
         $notif[$meme][0]=$user[1]." ".$user[2];
         $notif[$meme][1]=$historique[$k][3];
         $notif[$meme][2]=$historique[$k][5];
         $meme++;
     }
   }
     elseif (count($historique)==1)
     {

       $requete = $conn->prepare('SELECT * FROM historique WHERE id_projet= :projet');
       $requete->bindValue(':projet',$projet[$i]) ;
       $requete->execute();
       $historique = $requete->fetch();
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
          $notif[0][0]=$user[1]." ".$user[2];
          $notif[0][1]=$historique[3];
          $notif[0][2]=$historique[5];
      }


  }
}
$length=sizeof($notif)-1;
$resultat = array( );
//prendre les 6 dernieres modifications dans l'$historique
if ($length>=5)
{
  for ($i=0; $i <5 ; $i++)
  {
    $resultat[$i]=$notif[$length-$i];
  }
}
else
{
  for ($i=0; $i <=$length ; $i++)
  {
    $resultat[$i]=$notif[$length-$i];
  }

}

$json = array( "notif" => $resultat  );

echo json_encode($json);





 ?>
