<?php
/**
 * Webservice that connects to an Api from another
 * site Allowing the user to get information about
 * specific IPs
 */
	$url = 'http://freegeoip.net/json/';
	$ip = '0.0.0.0';
	if(isset($_POST['ip'])){
		$ip = $_POST['ip'];
	}
	$response = file_get_contents($url.$ip);
	echo $response;


?>