<?php
header('Content-Type: application/json');
require __DIR__ . '/vendor/autoload.php'; 
require __DIR__ . '/router.php';       

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$basePath = ''; 
$requestUri = str_replace($basePath, '', $requestUri);


dispatch($requestUri, $requestMethod);

?>