<?php
	require __DIR__.'\..\services\UserService.php';
	class UserDomain {
		public $service;

		function __construct() {
			$this->service = new UserService();
		}

		function getAllUsers() {
			
			return $this->service->getAllUsers();
		}

		function getUser($args) {
				return $this->service->getUser($args);
		}
	}
?>