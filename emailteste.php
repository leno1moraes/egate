<?php

require_once("vendor/autoload.php");

$paramStatus = (isset($_GET['status'])) ? $_GET['status'] : "";
$paramEstudante = (isset($_GET['estudante'])) ? $_GET['estudante'] : "";
$dataReg = (isset($_GET['datareg'])) ? $_GET['datareg'] : "";

/*$paramStatus = "Saída Liberada";
$paramEstudante = "Onel Moraes";
$dataReg = "18/03/2019";*/

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
$mail->addAddress('lenomoraes12@gmail.com', 'e-Gate IFMT Campus Avançado VRL Informa');

//Set the subject line
$mail->Subject = 'Teste de Envio Aqui';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.php?status='.$paramStatus.'&estudante='.$paramEstudante.'&datareg='.$dataReg), dirname(__FILE__));
//$mail->msgHTML(file_get_contents('contents.php'), dirname(__FILE__), array('%status%' => $paramEstudante, '%estudante%' => $paramStatus, '%datareg%' => $dataReg));

$body = "<html>
        <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; utf-8\">
        <title>e-Gate</title>
        </head>
        <body>
        <p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 16px;\"><b>e</b>-Gate Informa </p>
        <p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">Registro de: <b> ".$paramStatus." </b></p>
        <p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">Estudante: <b> ".$paramEstudante." </b></p>
        <p style=\"font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">Data: <b> ".$dataReg." </b></p>
        </body>
        </html>";

$mail->msgHTML($body);

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>