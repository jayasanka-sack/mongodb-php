<?php

try {

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $stats = new MongoDB\Driver\Command(["dbstats" => 1]);
    $res = $mng->executeCommand("testdb", $stats);

    $stats = current($res->toArray());

    print_r($stats);

} catch (MongoDB\Driver\Exception\Exception $e) {

    $filename = basename(__FILE__);

    echo "The $filename script has experienced an error.\n";
    echo "It failed with the following exception:\n";

    echo "Exception:", $e->getMessage(), "\n";
    echo "In file:", $e->getFile(), "\n";
    echo "On line:", $e->getLine(), "\n";
}
