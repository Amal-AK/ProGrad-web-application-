<?php

  $from= "hm_boutata@esi.dz";
  $to = $_POST['mail'];
  $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
  $req = $bdd->prepare('SELECT nom,prenom,pass FROM etud WHERE  mail = :mail  ');
  $req->execute(array(
      'mail' => $to
      ));
  $resultat = $req->fetch();
  if (!$resultat)
  {
      echo 'Mail incorrect !';
  }
  else
  {$cmessage ="Bonjour vous avez demandé que l'on vous envoi votre mot de
   passe .\n\nVotre mot de passe :".$resultat['pass'].
   "\n\nCordialement.";;
   $subject = "récuperation mot de passe";
   $headers = "From: $from";
	 $headers = "From: " . $from . "\r\n";
	 $headers .= "Reply-To: ". $from . "\r\n";
	 $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";

	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td> style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

/*$send = mail($to, $subject, $body, $headers);*/}

?>
