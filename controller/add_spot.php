<?php

require '../lib/functions.php';

$pdo = new PDO('mysql:host=localhost;dbname=miejscowki;charset=utf8', 'root', 'root', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$description = $_POST['description'];
$city = $_POST['city'];
$street = $_POST['street'];
$link = $_POST['link'];
$dater = date("Y-m-d H:i:s");


//print_r($_FILES);

//checkUploadedImage();

//checkTypeOfUploadedImage();


//$url = saveUploadedImage();


$sql = "INSERT INTO `skateparki` (longitude, latitude, description, city, street, link, dater ) 
            VALUES(:longitude, :latitude, :description, :city, :street, :link, :dater)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':longitude', $longitude);
$stmt->bindParam(':latitude', $latitude);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':street', $street);
$stmt->bindParam(':link', $link);
$stmt->bindParam(':dater', $dater);
//$stmt->bindParam(':url', $url);
$stmt->execute();


redirect('/maps', 303);