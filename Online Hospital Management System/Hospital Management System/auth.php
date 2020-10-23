<?php
	$user='user';
	$password='password';

	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != $user || $_SERVER['PHP_AUTH_PW'] != $password)
	{
		header('HTTP/1.1 401 Unauthorized');

		header('WWW-Authenticate: Basic realm="Hospital Management"');
		exit('<h2>Must enter user name and password</h2>');
	}
	
?>