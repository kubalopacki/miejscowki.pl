<?php


$pdo = new PDO('mysql:host=localhost;dbname=miejscowki;charset=utf8', 'root', 'root', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT * FROM skateparki";
$stmt = $pdo->query($sql);
$places = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$places_json = json_encode($places);


require 'maps.html.php';