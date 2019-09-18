<?php

$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
session_start();
$id=$_SESSION['id'] ;
$type_user=$_SESSION['type_user'] ;
$type=$_GET['elem'];

switch ($type) {
  case 'name':
    $nom=$_GET['info'];
    $_SESSION['nom']=$nom;
    if ($type_user=='enseignant')
    {
    $requete= $bdd->prepare('UPDATE ens1 SET nom = :nom  WHERE id = :id');
    $requete->bindValue(':nom',$nom);
    $requete->bindValue(':id', $id, PDO::PARAM_STR);
    $requete->execute();}
    else {
      $requete= $bdd->prepare('UPDATE etud SET nom = :nom  WHERE id = :id');
      $requete->bindValue(':nom',$nom);
      $requete->bindValue(':id', $id, PDO::PARAM_STR);
      $requete->execute();}


    break;
    case 'prenom':
      $prenom=$_GET['info'];
      $_SESSION['prenom']=$prenom;
      if ($type_user=='enseignant')
      {
      $requete= $bdd->prepare('UPDATE ens1 SET prenom = :prenom  WHERE id = :id');
      $requete->bindValue(':prenom',$prenom);
      $requete->bindValue(':id', $id, PDO::PARAM_STR);
      $requete->execute();}
      else {
        $requete= $bdd->prepare('UPDATE etud SET prenom = :prenom  WHERE id = :id');
        $requete->bindValue(':prenom',$prenom);
        $requete->bindValue(':id', $id, PDO::PARAM_STR);
        $requete->execute();}


      break;
    case 'mail':
      $mail=$_GET['info'];
      $_SESSION['mail']=$mail;
      if ($type_user=='enseignant')
      {
      $requete= $bdd->prepare('UPDATE ens1 SET mail = :mail  WHERE id = :id');
      $requete->bindValue(':mail', $mail);
      $requete->bindValue(':id', $id, PDO::PARAM_STR);
      $requete->execute();}
      else {
        $requete= $bdd->prepare('UPDATE etud SET mail = :mail  WHERE id = :id');
          $requete->bindValue(':mail', $mail);
        $requete->bindValue(':id', $id, PDO::PARAM_STR);
        $requete->execute();}

      break;
      case 'telephone':
        $tele=$_GET['info'];
        $_SESSION['tele']=$tele;
        if ($type_user=='enseignant')
        {
        $requete= $bdd->prepare('UPDATE ens1 SET tele = :tele  WHERE id = :id');
        $requete->bindValue(':tele', $tele);
        $requete->bindValue(':id', $id,PDO::PARAM_STR);
        $requete->execute();}
        else {
          $requete= $bdd->prepare('UPDATE etud SET tele = :tele  WHERE id = :id');
            $requete->bindValue(':tele', $tele);
          $requete->bindValue(':id', $id, PDO::PARAM_STR);
          $requete->execute();}

        break;
        case 'nmr':
          $bureau=$_GET['info'];

          if ($type_user=='enseignant')
          {
          $requete= $bdd->prepare('UPDATE ens1 SET bureau = :bureau  WHERE id = :id');
          $requete->bindValue(':bureau', $bureau);
          $requete->bindValue(':id', $id, PDO::PARAM_STR);
          $requete->execute();
          $_SESSION['bureau']=$bureau;
        }
          else {
            $requete= $bdd->prepare('UPDATE etud SET id = :id_new  WHERE id = :id');
            $requete->bindValue(':id_new', $bureau);
            $requete->bindValue(':id', $id, PDO::PARAM_STR);
            $requete->execute();
            $_SESSION['id']=$bureau;

            $requete= $bdd->prepare('UPDATE photos SET id_user = :id_new  WHERE id_user = :id && type_user = :type');
              $requete->bindValue(':id_new', $bureau);
              $requete->bindValue(':type', $type);
            $requete->bindValue(':id', $id,PDO::PARAM_STR);
            $requete->execute();}

          break;

}



?>
