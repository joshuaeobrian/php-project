<?php
	
	//connects the connect the database
	require_once("config/Database.php");
	//Gets the request from the browser for route.php knows what to load
	if(isset($_GET['controller']) && isset($_GET['action'])){
		$controller = $_GET['controller'];
		$action = $_GET['action'];

	}else{
		$controller = 'Log';
		$action = 'index';
	}
	//loads the layout of the site
	require_once('view/layout.php');
	
?>


