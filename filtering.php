<?php

try {

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $filter = [ 'name' => 'Volkswagen' ];
    $query = new MongoDB\Driver\Query($filter);

    $res = $mng->executeQuery("testdb.cars", $query);

    $car = current($res->toArray());

    if (!empty($car)) {

        echo $car->name, ": ", $car->price, PHP_EOL;
    } else {

        echo "No match found\n";
    }

} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}
