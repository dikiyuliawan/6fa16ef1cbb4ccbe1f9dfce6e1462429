<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '249eb52c7cad39';
$mail->Password = 'a4a40f60c08fd1';

$mail->setFrom('diki@mailtrap.io', 'Diki Yuliawan');
$mail->addReplyTo('diki@mailtrap.io', 'Diki Yuliawan');
$mail->addAddress('dikiyuliawan@gmail.com', 'Diki Yuliawan');

$mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';
$mail->isHTML(true);

$mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
    <p>This is a test email Im sending using SMTP mail server with PHPMailer.</p>";
$mail->Body = $mailContent;

if($mail->send()){
    echo 'Message has been sent';
}else{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>