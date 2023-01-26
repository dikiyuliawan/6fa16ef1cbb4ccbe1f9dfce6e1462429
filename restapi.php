<?php

require_once "method.php";

use Firebase\JWT\JWT;

$mail = new Sendmail();
$request_method = $_SERVER["REQUEST_METHOD"];

$headers = getallheaders();
if (!isset($headers['Authorization'])) {
  http_response_code(401);
  exit();
}

list(, $token) = explode(' ', $headers['Authorization']);

if ($request_method != 'POST') {
    $response = [
        'status' => false,
        'message' => '405 method not allowed'
    ];
    echo json_encode($response);
} else {
    try {
        JWT::decode($token, $_ENV['ACCESS_TOKEN_SECRET'], 'HS256');
        $mail->send_email();
    } catch (Exception $e) {
        http_response_code(401);
        exit();
    }
}

?>