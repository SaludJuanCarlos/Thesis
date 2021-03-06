<?php

require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token){
	global $mailer;
	
	$body = '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Verification Email</title>
</head>
<body>
	<div class="wrapper">
	<p>
		Thank you for signing up on our website. Please click the link below
		to verify your email.
	</p>
		<a href="http://localhost/Thesis%20Remake/main.php?token=' . $token . '">
		Verify your email address
		</a>
	
	</div>
</body>
</html>';
	
	// Create a message
$message = (new Swift_Message('Email Verification'))
  ->setFrom([EMAIL])
  ->setTo($userEmail)
  ->setBody($body, 'text/html');

// Send the message
$result = $mailer->send($message);
}


