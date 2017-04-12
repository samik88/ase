<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

function sendMail($email,$name,$msg){	

$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'localhost';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 25;

//Set the encryption system to use - ssl (deprecated) or tls
//$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = false;

//Username to use for SMTP authentication - use full email address for gmail
//$mail->Username = "register@my.aseshopping.com";

//Password to use for SMTP authentication
//$mail->Password = "aseshopping.com2015";

//Set who the message is to be sent from
$mail->setFrom('norepl@my.aseshopping.com', 'noreply@my.aseshopping.com');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@aseshopping.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($email, $name);

//Set the subject line
$mail->Subject = 'registration on my.aseshopping.com site';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($msg);

//Replace the plain text body with one created manually
$mail->AltBody = 'registration';


//$mail->Body="test";
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    return $mail->ErrorInfo;
} else {
    return 1;
}
}
?>