<?php

require_once("vendor/autoload.php");

$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "noreplay.egate@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "18032019";

//Set who the message is to be sent from
$mail->setFrom('noreplay.egate@gmail.com', 'e-Gate Controle Teste 5');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('lenomoraes12@gmail.com', 'Nome do Usuario');

//Set the subject line
$mail->Subject = 'Teste de Envio Aqui';

$paramEstudante = "Onel Moraes";
$paramStatus = "Entrada Liberada";
$dataReg = "18/03/2019";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.php?status='.$paramStatus.'&estudante='.$paramEstudante.'&datareg='.$dataReg), dirname(__FILE__));
$mail->msgHTML(file_get_contents('contents.php'), dirname(__FILE__), array('%status%' => $paramEstudante, '%estudante%' => $paramStatus, '%datareg%' => $dataReg));

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>