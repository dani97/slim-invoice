<?php
	namespace App\Services;
	use App\Model\User;
	class UserService {
		private $db;
		function __construct($db) {
			$this->db = $db;
		}

		function getAllUsers() {
			return $this->db->select("select * from user",array(),"User");
		}

		function getUser($args) {
			return $this->db->select("select * from user where user_id = :userId",$args,User::class);
		}	

		function addUser($args) {
			global $db;
			$args['password'] = md5($args['password']);
			$query = "insert into user (user_name,user_type,password) values (:userName,:userType,:password)";
			return $this->db->insert($query, $args);
		}
	}
?>