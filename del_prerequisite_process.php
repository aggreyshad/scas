<?php 
		include_once 'dbconfig.php';
if(isset($_GET['delete'])) { // if there is a request to delete

		//$result_del = mysqli_query($con, 'DELETE FROM $db_name.subjectprerequisites WHERE $db_name.subjectprerequisites.sp_id=74');
		$sql="DELETE FROM $db_name.subjectprerequisites WHERE subjectprerequisites.sp_id =".$_GET['delete'];
		 $result_del = mysqli_query($con,$sql);
		
		
		//echo $_GET['delete'];
		if(!$result_del) {echo "deleting failed";}
		else {echo "Deleted"};
		}?>