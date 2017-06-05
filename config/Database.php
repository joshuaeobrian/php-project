<?php

/**
 * Class DbConnection
 */
	class DbConnection{
		private static $instance = NULL;

		private function __construct(){}

		private function __clone(){}
        //gets database instance
		public static function getInstance(){
			if(!isset(self::$instance)){
				$pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO('mysql:host=localhost:3306;dbname=etailinsights','root','atlascash', $pdo_option);
			}
			return self::$instance;
		}
	}

?>