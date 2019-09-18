<?php
session_start();
$conn =new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');

$nom_projet=$_SESSION['projet'];
$table_etat1 = array();
$table_etat2 = array();
$table_noms = array( );
$table_phases=array( );


$requete = $conn->prepare('SELECT * FROM projet WHERE nom= :name_proj');
$requete->bindValue(':name_proj',$nom_projet) ;
$requete->execute();
$projet= $requete->fetch();
$id=$projet[0];
$type=$projet[3];
if ($type==' Binôme')

{
  if ($projet[4]=='Master')
  {
    $requete = $conn->prepare('SELECT * FROM etud WHERE master= :id');
    $requete->bindValue(':id',$id) ;
    $requete->execute();
    $etud= $requete->fetchAll();
  }

  else
  {
    $requete = $conn->prepare('SELECT * FROM etud WHERE pfe= :id');
    $requete->bindValue(':id',$id) ;
    $requete->execute();
    $etud= $requete->fetchAll();

  }

  $id_etud1=$etud[0][0];
  $id_etud2=$etud[1][0];
  $table_noms[0]=$etud[0][1];
  $table_noms[1]=$etud[1][1];

  $avanc_indiv1=0;
  $avanc_indiv2=0;
 //recuperer toutes les taches de la phase


 $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
 $requete->bindValue(':id',$id) ;
 $requete->execute();
 $phases= $requete->fetchAll();

 $nb_phases=count($phases);//nbre de phases


 if (count($phases)>1)
 {

   $k=0;

   for ($i=0; $i <count($phases) ; $i++)
    {
      $table_phases[$k]=$phases[$i][2];
      $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase');
      $requete->bindValue(':id_phase',$phases[$i][0]) ;
      $requete->execute();
      $taches= $requete->fetchAll();

      //avanc indiv de l'etud dans la phase
      if (count($taches)!=0)
      {
        $total=count($taches);
        $realise='oui';

        //recuperer les taches realise individulement par l'utilisateur actuel
        $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase AND user_id= :id_etud AND realise= :realise');
        $requete->bindValue(':id_phase',$phases[$i][0]) ;
        $requete->bindValue(':id_etud',$id_etud1) ;
        $requete->bindValue(':realise',$realise) ;
        $requete->execute();
        $taches= $requete->fetchAll();

        $count1=count($taches);//nb tache realisees par l'etud

        $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase AND user_id= :id_etud AND realise= :realise');
        $requete->bindValue(':id_phase',$phases[$i][0]) ;
        $requete->bindValue(':id_etud',$id_etud2) ;
        $requete->bindValue(':realise',$realise) ;
        $requete->execute();
        $taches= $requete->fetchAll();

        $count2=count($taches);//nb tache realisees par l'etud

        //calculer le pourcentage de taches realisées par l'etudiant
        $avanc_indiv1=floatval(($count1*100)/$total);
        $avanc_indiv2=floatval(($count2*100)/$total);
        $table_etat1[$k]=floatval($avanc_indiv1);
        $table_etat2[$k]=floatval($avanc_indiv2);
        $k++;
      }
      else
      {
        $table_etat1[$k]=0;
        $table_etat2[$k]=0;
        $k++;

      }

    }

 }
 elseif (count($phases)==1)
 {
   $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
   $requete->bindValue(':id',$id) ;
   $requete->execute();
   $phases= $requete->fetch();

   $table_phases[0]=$phases[2];

   $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase');
   $requete->bindValue(':id_phase',$phases[0]) ;
   $requete->execute();
   $taches= $requete->fetchAll();


   if (count($taches)!=0)
   {
     $total=count($taches);
     $realise='oui';

     //recuperer les taches realise individulement par l'utilisateur actuel
     $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase AND user_id= :id_etud AND realise= :realise');
     $requete->bindValue(':id_phase',$phases[0]) ;
     $requete->bindValue(':id_etud',$id_etud1) ;
     $requete->bindValue(':realise',$realise) ;
     $requete->execute();
     $taches= $requete->fetchAll();
     $count1=count($taches);//nb tache realisees par l'etud


     $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase AND user_id= :id_etud AND realise= :realise');
     $requete->bindValue(':id_phase',$phases[0]) ;
     $requete->bindValue(':id_etud',$id_etud2) ;
     $requete->bindValue(':realise',$realise) ;
     $requete->execute();
     $taches= $requete->fetchAll();

      $count2=count($taches);//nb tache realisees par l'etud

     //calculer le pourcentage de taches realisées par l'etudiant
     $avanc_indiv1=floatval(($count1*100)/$total);
     $avanc_indiv2=floatval(($count2*100)/$total);
     $table_etat1[$k]=floatval($avanc_indiv1);
     $table_etat2[$k]=floatval($avanc_indiv2);
     $k++;
   }
   else
   {
     $table_etat1[0]=0;
     $table_etat2[0]=0;
   }

 }

}

//fin de cas des binome
/*****************************************************************************************************************************************/

else
{

  if ($projet[4]=='Master')
  {
    $requete = $conn->prepare('SELECT * FROM etud WHERE master= :id');
    $requete->bindValue(':id',$id) ;
    $requete->execute();
    $etud= $requete->fetch();
  }
  else
  {
    $requete = $conn->prepare('SELECT * FROM etud WHERE pfe= :id');
    $requete->bindValue(':id',$id) ;
    $requete->execute();
    $etud= $requete->fetch();

  }
   $id_etud1=$etud[0];
   $table_noms[0]=$etud[1];

   $avanc_indiv=0;
   $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
   $requete->bindValue(':id',$id) ;
   $requete->execute();
   $phases= $requete->fetchAll();
   $nb_phases=count($phases);//nbre de phases

    //cas plusieurs phases dans le projet
   if (count($phases)>1)
   {
     $k=0;

     for ($i=0; $i <count($phases) ; $i++)
      {
        $table_phases[$k]=$phases[$i][2];
        $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase');
        $requete->bindValue(':id_phase',$phases[$i][0]) ;
        $requete->execute();
        $taches= $requete->fetchAll();

        //avanc indiv de l'etud dans la phase
        if (count($taches)!=0)
        {
          $total=count($taches);
          $realise='oui';

          //recuperer les taches realise individulement par l'utilisateur actuel
          $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase AND user_id= :id_etud AND realise= :realise');
          $requete->bindValue(':id_phase',$phases[$i][0]) ;
          $requete->bindValue(':id_etud',$id_etud1) ;
          $requete->bindValue(':realise',$realise) ;
          $requete->execute();
          $taches= $requete->fetchAll();

          $count1=count($taches);//nb tache realisees par l'etud


          //calculer le pourcentage de taches realisées par l'etudiant
          $avanc_indiv1=floatval(($count1*100)/$total);
          $table_etat1[$k]=floatval($avanc_indiv1);
          $k++;
        }
        else
        {
          $table_etat1[$k]=0;
          $table_etat2[$k]=0;
          $k++;

        }

      }

   }

   //cas d'une seule phse dans le projet
   elseif (count($phases)==1)
   {
     $requete = $conn->prepare('SELECT * FROM phase WHERE num_projet= :id');
     $requete->bindValue(':id',$id) ;
     $requete->execute();
     $phases= $requete->fetch();

     $table_phases[0]=$phases[2];

     $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase');
     $requete->bindValue(':id_phase',$phases[0]) ;
     $requete->execute();
     $taches= $requete->fetchAll();


     if (count($taches)!=0)
     {
       $total=count($taches);
       $realise='oui';

       //recuperer les taches realise individulement par l'utilisateur actuel
       $requete = $conn->prepare('SELECT * FROM taches WHERE id_phase= :id_phase AND user_id= :id_etud AND realise= :realise');
       $requete->bindValue(':id_phase',$phases[0]) ;
       $requete->bindValue(':id_etud',$id_etud1) ;
       $requete->bindValue(':realise',$realise) ;
       $requete->execute();
       $taches= $requete->fetchAll();
       $count1=count($taches);//nb tache realisees par l'etud



       //calculer le pourcentage de taches realisées par l'etudiant
       $avanc_indiv1=floatval(($count1*100)/$total);
       $table_etat1[0]=floatval($avanc_indiv1);
     }
     else
     {
       $table_etat1[0]=0;
     }

   }

}
$cpt1=0;
$cpt2=0;

if ($type==' Binôme')
{
  for ($i=0; $i <sizeof($table_etat1) ; $i++)
  {
    $cpt1=$table_etat1[$i]+$cpt1;
    $cpt2=$table_etat2[$i]+$cpt2;
  }
  if (sizeof($table_etat1)!=0)
  {
    $table_prjt[0]=floatval($cpt1/sizeof($table_etat1));
    $table_prjt[1]=floatval($cpt2/sizeof($table_etat2));
  }
  else {
    $table_prjt[0]=0;
    $table_prjt[1]=0;

  }
}
else
{
  for ($i=0; $i <sizeof($table_etat1) ; $i++)
  {
    $cpt1=$table_etat1[$i]+$cpt1;
  }
  if (sizeof($table_etat1)!=0)
  {
    $table_prjt[0]=floatval($cpt1/sizeof($table_etat1));
  }
  else {
    $table_prjt[0]=0;

  }
}
$_SESSION['projet']=$nom_projet;
$json = array("tabphase1" => $table_phases , "tabetud1"=> $table_etat1, "tabetud2"=> $table_etat2, "tabnom"=> $table_noms,
  "tabavancement"=> $table_prjt, "type"=>$projet[3]);

echo json_encode($json);

?>
