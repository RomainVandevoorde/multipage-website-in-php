<?php

echo "<pre>".print_r($_SERVER, TRUE)."</pre>";

if(!file_exists(__DIR__.'/includes/gmaail.id.php')) {
  echo "<p>Le fichier 'includes/gmail.id.php' est introuvable.</p>";
  if(file_exists(__DIR__.'/includes/gmail.id.example.php')) {
    echo "<p>Le fichier 'includes/gmail.id.example.php' est présent. Suivez les instructions qui se trouvent dedans pour permettre au script de fonctionner.</p>";
  }
  exit;
}

require __DIR__.'/includes/gmail.id.php';

if(!defined("GMAIL_ID") || !defined("GMAIL_PW")) {
  echo "<p>Constantes manquantes. (GMAIL_ID ou GMAIL_PW)</p>";
  exit;
}

exit;

use PHPMailer\PHPMailer\PHPMailer;
require __DIR__.'/vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;

$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = GMAIL_ID;
$mail->Password = GMAIL_PW;

$mail->setFrom('romain.vandevoorde.dev@gmail.com', 'Romain Vandevoorde');
$mail->addReplyTo('replyto@example.com', 'First Last');
$mail->addAddress('romain.vandevoorde.dev@gmail.com', 'John Doe');
$mail->Subject = 'PHPMailer GMail SMTP test';

$mail->msgHTML("<h2>Hello World !</h2>");
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
