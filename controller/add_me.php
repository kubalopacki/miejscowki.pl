<?php


$dater = date("Y-m-d H:i:s");
$skatepark_id = $_POST['skatepark_id'];
$name_surname = $_POST['name_surname'];
$fb_link = $_POST['fb_link'];


$sql = "INSERT INTO `locals` (name_surname, fb_link, dater, skatepark_id) 
        VALUES ('$name_surname', '$fb_link', '$dater', '$skatepark_id')";
echo $sql;


$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name_surname', $name_surname);
$stmt->bindParam(':fb_link', $fb_link);
$stmt->bindParam(':dater', $dater);
$stmt->bindParam(':skatepark_id', $skatepark_id);
$stmt->execute();

redirect('/maps', 303);

