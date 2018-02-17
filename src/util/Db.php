<?php
	
	namespace App\Util;

	use PDO;
	class Db {
		private $pdo = null;
		/*
		***
		*/
		function __construct() {
			if($this->pdo==null) {
				//@dsn host+port+dbname
				$config = parse_ini_file(__DIR__ . '\..\..\config\dbconfig.ini');
				$dsn = "mysql:host=".$config['host'].";dbname=".$config['dbname'];
				$this->pdo = new PDO( $dsn, $config['username'], $config['password']);
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		}

		function  close() {
			$this->pdo = null;
		}

		function getConnection() {
			return $this->pdo;
		}

		function fetch($query ,$bindParams) {
			try{
				$stmt = $this->pdo->prepare($query);
				$stmt->execute($bindParams);
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
			catch(PDOException $e){
			}
		}

		function select($query ,$bindParams, $className) {
			try{
				$stmt = $this->pdo->prepare($query);
				$stmt->execute($bindParams);
				$result = $stmt->fetchAll(PDO::FETCH_CLASS,$className);
			
			return $result;
			}
			catch(PDOException $e){
			}
		}

		function tableUpdate($query, $bindParams) {
			try {
				$stmt = $this->pdo->prepare($query);
				if($stmt->execute($bindParams)){
					return $stmt->rowCount();
				}
				else{
					return -1;
				}
			} 
			catch(PDOException $e){
			}
		}

		function insert($query, $bindParams) {
			try {
				$stmt = $this->pdo->prepare($query);
				if($stmt->execute($bindParams)){
					return $this->pdo->lastInsertId();
				}
				else{
					return -1;
				}
			} 
			catch(PDOException $e){
				return $e->getMessage();
			}
		}

	} 
?>