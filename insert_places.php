<?php

redirect('/maps.php', 303);

$data = file_get_contents("mapdata.txt");
$data2 = json_decode($data, true);

print_r($data2);


$mpgpoland = [];
foreach ($data2['0']['markers'] as $id => $item) {

    $mpgpoland[] = [
        $item['title'],
        $item['coord_x'],
        $item['coord_y'],
        $item['address'],
        $item['params']['marker_title_link'],
        '1',
        'Poland',
        $item['description'],
    ];
}

print_r($mpgpoland);

foreach ($mpgpoland as $id => $item) {

    $latitude = $item['2'];
    $longitude = $item['1'];
    $visible = $item['5'];
    $country = $item['6'];
    $adress = $item['3'];
    $description = $item['7'];
    $link = $item['4'];
    $city = $item['0'];



    $sql = "INSERT INTO `skateparki` (`longitude`, `latitude`, `visible`, `country`, `street`, `link`, `city`) 
            VALUES('$longitude', '$latitude', '$visible', '$country', '$adress', '$link', '$description' );";
    echo $sql . PHP_EOL;
}