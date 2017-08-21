<?php
$id = $_GET['id'];

$stmt = $pdo->query("SELECT city, street FROM skateparki WHERE skatepark_id = $id");
$skatepark = $stmt->Fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();



require TEMPLATES_PATH . '/i_am_local.html.php';