<?php


$pdo = new PDO('mysql:host=localhost;dbname=miejscowki;charset=utf8', 'root', 'root', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$description = $_POST['description'];

$sql = "INSERT INTO `skateparki` (longitude, latitude, description) VALUES('$longitude', '$latitude', '$description')";


$stmt = $pdo->exec($sql);

function redirect($url, $code)
{
    http_response_code($code);
    header('Location: ' . $url);

    exit(0);
}

redirect('/', 303);