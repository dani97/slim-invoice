<?php
	namespace App\Subdomain;
	use App\Services\UserService;
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

		function addUser($args) {
			return $this->service->addUser($args);
		}
	}
?>