<?php

	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'scas';


	 $conn = mysqli_connect($hostname,$username,$password) or die(mysqli_error());
	mysqli_select_db($database, $conn) or die(mysqli_error());

?>