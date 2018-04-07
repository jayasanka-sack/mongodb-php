<?php

try {

    $filter = [];
    $options = ["projection" => ['_id' => 0]];

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query($filter, $options);

    $rows = $mng->executeQuery("testdb.cars", $query);

    foreach ($rows as $row) {

        print_r($row);
    }

} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}