<?php
	$config = parse_ini_file(__DIR__ . '\..\config\dbconfig.ini');
	return [
		'db' => $config,
		'settings' => [
			'displayErrorDetails' => true, // set to false in production
	        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
	        'logger' => [
	            'name' => 'invoice',
	            'path' =>  __DIR__ . '\..\log\app.log',
	            'level' => \Monolog\Logger::DEBUG
	        ]
        ]
	];
?>
