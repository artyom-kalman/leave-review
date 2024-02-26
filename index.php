<?php  

// require 'vendor/autoload.php';

$conn_string = "host=localhost dbname=rate-page user=postgres password=12345";
$dbconn = pg_connect($conn_string);
if (!$dbconn) {
    echo("Failde to connect to database");
    return;
}
else {
    // echo("Connection is succesfuly established");
}

$uri = $_SERVER['REQUEST_URI'];

require 'src/routes.php';
$router->dispatch($uri);

?>