<?php  

require('Data/DbConnection.php');
require('Data/DbContext.php');

use RatePage\Data\DbContext;

$connectionString = "host=localhost dbname=rate-page user=postgres password=12345";
$dbConnection = connectToDb($connectionString);

$dbContext = new DbContext($dbConnection);

require 'src/routes.php';

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$params = $_GET;

$router->dispatch($uri, $params);

?>