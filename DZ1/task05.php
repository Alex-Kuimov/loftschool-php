<?php
header("Content-Type: text/plain; charset=utf-8");

$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year'  => '2015'
];

$toyota = [
    'model' => 'supra',
    'speed' => 220,
    'doors' => 2,
    'year'  => '2019'
];

$opel = [
    'model' => 'astra',
    'speed' => 180,
    'doors' => 4,
    'year'  => '2005'
];

$cars = [
    'bmw'    => $bmw,
    'toyota' => $toyota,
    'opel'   => $opel
];

foreach ($cars as $key => $car) {
    echo "CAR $key \r\n";
    echo $car['model'].' '.$car['speed'].' '.$car['doors'].' '.$car['year'];
    echo "\r\n";
    echo "\r\n";
}
