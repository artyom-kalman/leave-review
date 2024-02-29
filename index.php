<?php  

require('Data/DbConnection.php');
require('Data/DbContext.php');

use RatePage\Data\DbContext;

$connectionString = "host=localhost dbname=rate-page user=postgres password=12345";
$dbConnection = connectToDb($connectionString);

if (!$dbConnection) {
    throw new \Exception("Failde to connect to database.");
    exit;
}

$dbContext = new DbContext($dbConnection);

require 'src/routes.php';

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$router->dispatch($uri);

?>