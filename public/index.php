<?php
require '../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "./../");
// $dotenv->load();

$dotenv = Dotenv\Dotenv::createImmutable("./../");
$dotenv->load();


$router = require '../src/Routes/index.php';



