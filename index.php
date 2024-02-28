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

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$params = $_GET;

// echo($_GET["username"]);

require 'src/routes.php';
$router->dispatch($uri, $params);

?>