<?php

function connectToDb($connectionString) {
    $dbConnection = pg_connect($connectionString);

    if (!$dbConnection) {
        echo("Failde to connect to database");
        return;
    }

    // echo("Connection is succesfuly established");
    return $dbConnection;
}

?>