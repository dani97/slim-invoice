<?php
	require __DIR__.'\..\util\Db.php';
	require __DIR__.'\..\model\User.php';
	$config = parse_ini_file(__DIR__ .'\..\..\config\dbconfig.ini');
	$db = new Db();
	$db->connect($config);
	class UserService {
		function getAllUsers() {
			global $db;
			return $db->select("select * from user",array(),"User");
		}

		function getUser($args) {
			global $db;
			return $db->select("select * from user where user_id = :userId",$args,"User");
		}	
	}
?>