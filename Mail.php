<?php

$email = "hosneara1720@gmail.com";
$id = "hosneara1720";
$name = "hosneara";

require_once 'lib/swift_required.php';

$subject = 'DUCafe Signup | Verification'; // Give the email a subject
$address="http://103.28.121.126/ducafe/welcome.php";
$body = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$name.'
------------------------

Please click this link to activate your account:.
'.$address;

$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
->setUsername('hosneara06@gmail.com')
->setPassword('420420420')
->setEncryption('ssl');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance($subject)
->setFrom(array('noreply@ducafe.com' => 'DUCafe'))
->setTo(array($email))
->setBody($body);

$result = $mailer->send($message);

?>