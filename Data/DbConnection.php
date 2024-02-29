<?php

function connectToDb($connectionString): PgSql\Connection|false {
    $dbConnection = pg_connect($connectionString);

    if (!$dbConnection) {
        return false;
    }

    return $dbConnection;
}

?>