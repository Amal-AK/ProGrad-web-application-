<?php

    $to = "hn_amieur@esi.dz";
    $from = $_POST['mail'];
    $cmessage = $_POST['msg'];
    $subject = $_POST['sujet'];
    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $logo = '../img/logoo1.png';
    $link = '#';
	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'> <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'><title>Express Mail</title></head><bod";
	$body .= "<table style='width: 100%;' class='table'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "</tr><th  style='border:none;font-size: 24px ; color :#4ECDC4 ; text-align:center '><strong>ProGrad</strong></th></thead>";
    $body .= "<tbody><tr><td style='border:none;'><strong>Sujet:</strong> {$subject}</td></tr>";
	$body .= "<tr><td style='border:none;'><strong>Email de l'émetteur :</strong> {$from}</td></tr>";
    $body .= "<td style='border:none;'><strong>Le message reçu:</strong></td>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";
    $send = mail($to, $subject, $body, $headers);

header('Location: index.php') ;
exit();
?>
