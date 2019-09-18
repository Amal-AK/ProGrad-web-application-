<?php
session_start();
$name=$_GET['param'];
$id_ens=$_SESSION['id'];


//connexion a la bdd
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');







//recherche id projet
$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$name);
$requete->execute();
$projet = $requete->fetch();
$id=$projet[0];

//suppression de la table du projet
$requete = $conn->prepare('DELETE FROM projet WHERE id= :id');
$requete->bindValue(':id', $id);
$requete->execute();

//suppressions
$requete = $conn->prepare('DELETE FROM phase WHERE num_projet= :id');
$requete->bindValue(':id', $id);
$requete->execute();

$requete = $conn->prepare('DELETE FROM tache WHERE num_projet= :id');
$requete->bindValue(':id', $id);
$requete->execute();

$requete = $conn->prepare('DELETE FROM reunions WHERE ID_PROJET= :id');
$requete->bindValue(':id', $id);
$requete->execute();


$requete = $conn->prepare('DELETE FROM historique WHERE ID_PROJET= :id');
$requete->bindValue(':id', $id);
$requete->execute();

$requete = $conn->prepare('DELETE FROM livrable WHERE ID_PROJET= :id');
$requete->bindValue(':id', $id);
$requete->execute();











//suppression de la table de l'ens
$requete = $conn->prepare('SELECT * FROM ens1 WHERE id= :id_ens');
$requete->bindValue(':id_ens', $id_ens);
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
$id=$org_projet[0];
$resultat=$id;
for ($p=1; $p <sizeof($org_projet); $p++)
{

  $resultat=$resultat.".";
  $resultat=$resultat.$org_projet[$p];

}
$requete = $conn->prepare('UPDATE ens1 SET PROJETS = :projets WHERE ID = :ens_matricule');

$requete->bindValue(':ens_matricule',$id_ens);
$requete->bindValue(':projets', (String) $resultat);
$requete->execute();

 ?>
