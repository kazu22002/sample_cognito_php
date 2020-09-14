<?php

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

$ch = curl_init();
curl_setopt($ch,CURLOPT_TIMEOUT,3000);
