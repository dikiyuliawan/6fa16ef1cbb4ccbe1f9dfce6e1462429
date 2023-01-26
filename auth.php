<?php

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit();
}

$json = file_get_contents('php://input');

$input = json_decode($json);

if (!isset($input->email) || !isset($input->password)) {
    http_response_code(400);
    exit();
}

$user = [
    'email' => 'johndoe@example.com',
    'password' => 'qwerty123'
];

if ($input->email !== $user['email'] || $input->password !== $user['password']) {
    echo json_encode([
      'message' => 'Email atau password tidak sesuai'
    ]);
    exit();
  }

date_default_timezone_set("Asia/Bangkok");
$expired_time = time() + (15 * 60);

$payload = [
    'email' => $input->email,
    'exp' => $expired_time
];

$access_token = JWT::encode($payload, $_ENV['ACCESS_TOKEN_SECRET'], 'HS256');

echo json_encode([
  'accessToken' => $access_token,
  'expiry' => date(DATE_ISO8601, $expired_time)
]);

?>