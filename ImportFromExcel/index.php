<html>
<head>
	<style type="text/css">
	body
	{
		margin: 0;
		padding: 0;
		background-color:#D6F5F5;
		text-align:center;
	}
	.top-bar
		{
			width: 100%;
			height: auto;
			text-align: center;
			background-color:#FFF;
			border-bottom: 1px solid #000;
			margin-bottom: 20px;
		}
	.inside-top-bar
		{
			margin-top: 5px;
			margin-bottom: 5px;
		}
	.link
		{
			font-size: 18px;
			text-decoration: none;
			background-color: #000;
			color: #FFF;
			padding: 5px;
		}
	.link:hover
		{
			background-color: #9688B2;
		}
	</style>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60962033-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>

<body>
	
    
	<form name="import" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>
<?php
	include ("connection.php");
	
	if(isset($_POST["submit"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$fname = $filesop[2];
			$lname = $filesop[3];
			$otherName=$filesop[4];
			$class=$filesop[5];
			$stream=$filesop[6];
			$gender=$filesop[7];
			$bloodGroup=$filesop[8];
			$dob=$filesop[9];
			$email=$filesop[10];
			$type=$filesop[11];
			$nationality=$filesop[12];
			$level=$filesop[13];
			$student_password=$filesop[14];
			$student_password=md5('$student_password');
			
			if($c != 0){ // do not insert colun one coz it has headings not real data
			
			//$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
			$sql = mysql_query("INSERT INTO student (fname, lname, otherName, classId, stream,gender, bloodGroup, dob,email,type,nationality,level,student_password,registered_on) VALUES('$fname','$lname','$otherName','$class','$stream','$gender','$bloodGroup','$dob','$email','$type','$nationality','$level','$student_password',NOW())");
			
			}//close if
			
			$c = $c + 1;
		}
		
			if($sql){
				echo "You database has imported successfully. You have inserted ". $c ." recoreds";
			}else{
				echo "Sorry! There is some problem.";
			}

	}
?>
    
    
</body>
</html>