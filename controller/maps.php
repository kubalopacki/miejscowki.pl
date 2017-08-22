<?php


$pdo = new PDO('mysql:host=localhost;dbname=miejscowki;charset=utf8', 'root', 'root', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT * FROM skateparki WHERE visible=1 ";
$stmt = $pdo->query($sql);

$places = [];
while ($place = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $places[$place['skatepark_id']] = $place;
    $places[$place['skatepark_id']]['locals'] = [];
}
//$places = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();


$sql = "SELECT * FROM locals";
$stmt = $pdo->query($sql);
$locals = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

foreach ($locals as $local) {
    $places[$local['skatepark_id']]['locals'][] = $local;
}

$places = array_values($places);



require TEMPLATES_PATH . '/maps.html.php';