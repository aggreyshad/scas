<?php
	
	include ("connection.php");
	include ("ExportToExcel.php");

	if(isset($_POST["submit"]))
	{
		//ExportExcel("student");
		ExportClassListExcel(1);
 	}

?>

<html>
<head>
	
	
</head>

<body>
	
    	

    		<form name="export" method="post">
    			<input type="submit" value="Click Me!" name="submit">
    		</form>
    
 
</body>
</html>