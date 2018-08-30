<?php
//session_start();
//require 'PHPMailer/PHPMailerAutoload.php';
include("lib/src/PHPMailer.php");
include("lib/src/SMTP.php");

$mail = new PHPMailer;

include("mailconfig.php");

$response = [
	'status'=>'success',
	'message'=>'Message has been sent'
];

$u_name = strip_tags(trim($_POST['u_name']));
$u_email = strip_tags(trim($_POST['u_email']));
$u_subject = strip_tags(trim($_POST['u_subject']));
$u_message = strip_tags(trim($_POST['u_message']));

$mail->setFrom('noreply@hyperlink.capital', 'Hyperlink website robot');
//$mail->addReplyTo('maksym.sivkovych@gmail.com', 'Maksym Dev');
$mail->addAddress('maksym.sivkovych@gmail.com');   // Add a recipient ex: hello@hyperlink.capital
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Hyperlink message from website:</h1>';
$bodyContent .= '<br><hr><br>';
$bodyContent .= '<h3>Sender information:</h3>';
$bodyContent .= "<p>Name: $u_name</p>";
$bodyContent .= "<p>Email: $u_email</p>";
$bodyContent .= "<p>Subject: $u_subject</p>";
$bodyContent .= "<p>Message: $u_message</p>";
$bodyContent .= '<br><hr><br>';

$mail->Subject = 'Hyperlink message';
$mail->Body    = $bodyContent;

$mail->addAttachment('test.pdf');

if(!$mail->send()) {
    $response['status'] = 'failed';
    $response['message'] = 'Message could not be sent.';
    $response['message'] .= 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // to do
}
echo json_encode($response);
exit();