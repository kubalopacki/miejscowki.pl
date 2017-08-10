<?php

//redirect('/maps.php', 303);


$data = file_get_contents("mapdata.txt");
$data2 = json_decode($data, true);

print_r($data2['markers']);

$sweden = [];

foreach ($data2['markers'] as $id => $item) {

    $link = substr($item['description'], 9);
    $pos = strpos($link, '"');
    $link = substr($link, 0, $pos);


    $city = substr($item['description'], 0, -4);
    $pos = strpos($city, '>');
    $city = substr($city, $pos+1);



    $sweden[] = [
        $item['lat'],
        $item['lng'],
        $city,
        $link,
    ];


}

print_r($sweden);





foreach ($sweden as $id => $item) {

    $latitude = $item['0'];
    $longitude = $item['1'];
    $visible = '1';
    $country = 'Sweden';
    $adress = '-';
    $link = $item['3'];
    $city = $item['2'];



    $sql = "INSERT INTO `skateparki` (`longitude`, `latitude`, `visible`, `country`, `street`, `link`, `city`) 
            VALUES('$longitude', '$latitude', '$visible', '$country', '$adress', '$link', '$city' );";
    echo $sql . PHP_EOL;
}
