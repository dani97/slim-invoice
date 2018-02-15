<?php
	$config = parse_ini_file(__DIR__ . '\..\config\dbconfig.ini');
	return [
		'db' => $config
	];

?>