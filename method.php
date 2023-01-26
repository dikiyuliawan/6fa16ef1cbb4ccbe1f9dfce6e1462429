<?php
require_once "connection.php";
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

header('Content-Type: application/json');

class Sendmail{
    public function send_email(){
        if (isset($_POST['email'])) {

            $subject = isset($_POST['subject']) ? $_POST['subject'] : 'PHP Developer Test';

            $mailContent = "<h1>Software Engineer Test</h1>
                <p>This is a email Im sending to Levart for technical test issue.</p>";
            $body = (isset($_POST['body']) ? $_POST['body'] : $mailContent);

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

            $mail->Subject = $subject;
            $mail->isHTML(true);

            $mail->Body = $body;

            if($mail->send()){
                //insert into table when email sent
                $query = "INSERT INTO sent_email VALUES ('$_POST[email]', '$subject', '$body')";
                pg_query($query);

                $response = [
                    'status' => true,
                    'message' => 'Email sent succesfully'
                ];
            }else{
                $response = [
                    'status' => false,
                    'message' => 'Email failed to sent. ' . $mail->ErrorInfo
                ];
            }
        } else {
            $response = [
                'status' => false,
                'message' => 'Error 204! Email is empty'
            ];
        }

        echo json_encode($response);
    }
}

?>