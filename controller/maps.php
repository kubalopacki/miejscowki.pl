<?php


$pdo = new PDO('mysql:host=localhost;dbname=miejscowki;charset=utf8', 'root', 'root', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "SELECT * FROM skateparki WHERE visible=1 ";
$stmt = $pdo->query($sql);
$places = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$sql = "SELECT * FROM locals";
$stmt = $pdo->query($sql);
$locals = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$locals2 = [];
foreach ($locals as $id => $item) {
    if (array_key_exists($item['skatepark_id'], $locals2)) {
        array_push($locals2[$item['skatepark_id']], $item);
    } else {
        $locals2[$item['skatepark_id']] = [$item];
    }
}


require TEMPLATES_PATH . '/maps.html.php';