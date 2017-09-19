<?php


	$db_host = "localhost";
	$db_name = "scas";
	$db_user = "root";
	$db_pass = "";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
	
	$con=mysqli_connect($db_host,$db_user,$db_pass); //my own connect to the datbase code
	// Check connection
	if (mysqli_connect_errno($con))
	  {  echo "Failed to connect to MySQL: " . mysqli_connect_error();}
		
	$system_name = "A Subject Combinations and Course Awarding System";
	
	$student_password=md5('543210');
	$center_no="U0726"; // St. Lawrence H/S Crown City	

?>