<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
//setting up config 


session_start();

$config = require __DIR__ . '/../src/config.php';
// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware/middleware.php';

// Register routes
require __DIR__ . '/../src/routes/UserRoute.php';

// Run app
$app->run(); 
?>