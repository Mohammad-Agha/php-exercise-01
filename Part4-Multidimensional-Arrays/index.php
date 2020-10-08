<?php


$multiArray = array(
    "musicals" => array(
        "Oklahoma", "The Music Man", "South Pacific"
    ),
    "dramas" => array(
        "Lawrence of Arabia", "To Kill a Mockingbird", "Casablanca"
    ),
    "mysteries" => array(
        "The Maltese Falcon", "Rear Window", "North by Northwest"
    )
);

echo "Before Sorting: " . PHP_EOL;
foreach($multiArray as $key => $array) {
    echo strtoupper($key);
    echo PHP_EOL;
    foreach($array as $index => $item) {
        echo "----> $index = $item";
        echo PHP_EOL;
    }
}

echo PHP_EOL;

krsort($multiArray);

echo "After Sorting: " . PHP_EOL;
foreach($multiArray as $key => $array) {
    echo strtoupper($key);
    echo PHP_EOL;
    foreach($array as $index => $item) {
        echo "----> $index = $item";
        echo PHP_EOL;
    }
}