<?php
//connexin a la base de données
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
$nb=6;

$id_ens=$_SESSION['id'];



//tirer tt les projets de l'ens
$requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id_user');
$requete->bindValue(':id_user',$id_ens) ;
$requete->execute();
$ens = $requete->fetch();
$projets=$ens[6];  //les projets de l'ens



//creer une table contenant les projets de l'ens
$projet_array = array();
$j=0;
$i=0;
$temp="";
$projet_cpt=0;
if (!empty ( $projets) )
{
  while ($i <strlen($projets))
  {
      $temp=$temp.$projets[$i];
      if ((substr ($projets,$i+1 ,1)==".")||($i+1==strlen($projets)))
      {
        $projet_array[$j]=$temp;
        $j++;
        $i++;
        $temp="";
        $projet_cpt++;
      }
      $i++;
  }
}
else {
  //l'ens1 n'a aucun projet donc rien a afficher dans les notifications
  echo "rien a afficher";
}

$pp=0;
for ($k=0; $k <sizeof($projet_array) ; $k++)
{

  $requete = $conn->prepare('SELECT * FROM projet WHERE id= :id_projet');
  $requete->bindValue(':id_projet',number_format($projet_array[$k])) ;
  $requete->execute();
  $projet= $requete->fetch();

  if (!empty($projet[1])) {
    $org_projet[$pp]=$projet[0];
    $pp++;

  }
  else {
    $projet_cpt--;
  }

}




$meme=0;
$table_notif = array();
for ($k=0; $k<$projet_cpt ; $k++)
{
        $requete = $conn->prepare('SELECT * FROM historique WHERE id_projet= :id_projet');
        $requete->bindValue(':id_projet',$org_projet[$k]) ;
        $requete->execute();
        $historique= $requete->fetchAll();

        if (count($historique)>1)
       {
         for ($m=0; $m <count($historique) ; $m++)
         {
           if ($historique[$m][4]=="enseignant")
          {
             $requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id');
             $requete->bindValue(':id',$historique[$m][1]) ;
             $requete->execute();
             $user= $requete->fetch();

           }

           else
           {
             $requete = $conn->prepare('SELECT * FROM etud WHERE id= :id');
             $requete->bindValue(':id',$historique[$m][1]) ;
             $requete->execute();
             $user= $requete->fetch();
           }

           $table_notif[$meme]['user']=$user[1]." ".$user[2];
           $table_notif[$meme]['datetime']=$historique[$m][3];
           $table_notif[$meme]['action']=$historique[$m][5];
           $meme++;

         }


        }

        elseif (count($historique)==1)
        {
          $requete = $conn->prepare('SELECT * FROM historique WHERE id_projet= :id_projet');
          $requete->bindValue(':id_projet',$org_projet[$k]) ;
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

          $table_notif[$meme]['user']=$user[1]." ".$user[2];
          $table_notif[$meme]['datetime']=$historique[3];
          $table_notif[$meme]['action']=$historique[5];
          $meme++;
        }

}

$length=sizeof($table_notif)-1;
$resultat = array( );
//prendre les 6 dernieres modifications dans l'$historique
if ($length>=5)
{
  for ($i=0; $i <5 ; $i++)
  {
    $resultat[$i]=$table_notif[$length-$i];
  }
}
else
{
  for ($i=0; $i <=$length ; $i++)
  {
    $resultat[$i]=$table_notif[$length-$i];
  }

}

$json = array( "notif" => $resultat  );

echo json_encode($json);










 ?>
