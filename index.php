<?php

// $connection = pg_connect("host=localhost dbname=levart user=postgres password=root");
// if ($connection) {
//     echo "koneksi sukses";
// } else {
//     echo "failed to connect";
// }

require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

// test that the variables are loaded:
echo getenv('OAUTH_AUDIENCE');

?>