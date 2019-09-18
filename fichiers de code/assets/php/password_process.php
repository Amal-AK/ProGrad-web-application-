<?php

  $from= "hn_amieur@esi@esi.dz";
  $to = $_POST['mail'];
  session_start();
 $type_user = $_SESSION['type_user'];



  $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
  if ($type_user=='etudiant')
{
  $req = $bdd->prepare('SELECT id,nom,prenom,pass FROM etud WHERE  mail = :mail  ');

  $req->execute(array(
      'mail' => $to
      ));
  $resultat = $req->fetch();

}
  else{
  $req = $bdd->prepare('SELECT nom,prenom,pass FROM ens1 WHERE  mail = :mail  ');
  $req->execute(array(
      'mail' => $to
      ));
  $resultat = $req->fetch();}





  if (!$resultat)
  {
      echo 'Mail incorrect !';
  }
  else
  {$cmessage ="Bonjour Amal,
Vous avez demandé à changer votre mot de passe sur ProGrad. Votre identifiant pour vous connecter sur notre site est maintenant le suivant :" ; 
   "\n\nCordialement.";;
   $subject = "Votre identifiant sur ProGrad";
   $headers = "From: $from";
   $headers = "From: " . $from . "\r\n";
   $headers .= "Reply-To: ". $from . "\r\n";
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'><title>Express Mail</title></head><bod";
  $body .= "<table style='width: 100%;' class='table'>";
  $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
  $body .= "</tr><th  style='border:none;font-size: 24px ; color :#4ECDC4 ; text-align:center '><strong>ProGrad</strong></th></thead>";
 
  $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
  $body .= "<tr><td colspan='2' style='border:none;'><strong>Mot de passe : </strong>{$resultat['pass']}</td></tr>";
  $body .= "</tbody></table>";
  $body .= "</body></html>";

$send = mail($to, $subject, $body, $headers);}
header('Location: rénitialisation.php') ; 
$_SESSION[reset] = 1 ; 
exit() ; 
?>
