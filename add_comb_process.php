<?php
include_once 'dbconfig.php';

	if(isset($_REQUEST['student_id']) && isset($_REQUEST['combination_id']))

	//if(isset($_POST['add_comb']))
	{
		
		$student_id = $_REQUEST['student_id']; //echo "got this";
		$combination_id = $_REQUEST['combination_id']; /*o level subject to be inserted */ //echo "got this";
		
		
		$message=""; // sucess - error reporting
		$combination_name=""; // for sucess - error reporting
			$sql_3="UPDATE  $db_name.student SET $db_name.student.combination_id=". $combination_id ." WHERE $db_name.student.student_id=".$student_id;
            $result_3 = mysqli_query($con,$sql_3);
							
				//error message in case adding Mark fails
				if(!$result_3){ $message="Failed to add Combination!";}
				else{$message="Successful";}
		
		
		// get a name for success reporting
		$sql_5="select * from $db_name.student, $db_name.combination WHERE $db_name.student.combination_id=$db_name.combination.combination_id AND $db_name.student.combination_id=". $combination_id ." AND $db_name.student.student_id=".$student_id;
            $result_5 = mysqli_query($con,$sql_5);
			
			if(isset($result_5)){
				if(mysqli_num_rows($result_5)>=1){
				$row_5 = mysqli_fetch_array($result_5);
				
				//get recently / just added mark
				$combination_name=$row_5['combination_name'];
				}
			}
		//header("Location: view_students.php?student_id=$student_id&combination_name=$combination_name&message=$message");
		echo ($message=="Successful")?"You have been successfully Awarded Combination $combination_name":" Failed to award combination $combination_name";
	}

?>