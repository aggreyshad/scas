<?php

	if(isset($_POST['add_new_rel_alevel_subject']))
	{
		$courseId=$_POST['courseId']; //Course to which prerequisites are added
		$subject_id = $_POST['subject_id']; // A level subject to be inserted
		$type = trim($_POST['type']);
		
		$message=""; // sucess - error reporting
		$required=""; //name of related A level subject Added //for success reporting
		
			//$sql_3="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$courseId AND $db_name.subjectprerequisites.o_level_subject_id=".$subject_id;
			$sql_3="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$courseId AND $db_name.coursesubject.subject_id=".$subject_id;
            $result_3 = mysqli_query($con,$sql_3);
			
			if(mysqli_num_rows($result_3)>=1){
			//echo "Prerequisites already exists";
			$message="A level subject already exists";
			}
			else{
			$sql_4="INSERT INTO $db_name.coursesubject (course_id, subject_id, requirement_type) VALUES( $courseId, $subject_id, $type)";

				$result_of_adding_p = mysqli_query($con,$sql_4);
					
				//error message in case adding Prerequisite fails
				if(!$result_of_adding_p){ $message="Failed to add required A level Subject!";}
				else{$message="Successful";}
			}
		
		// get a name for success reporting
		$sql_5="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$courseId AND $db_name.coursesubject.subject_id=".$subject_id;
            $result_5 = mysqli_query($con,$sql_5);
			
			if(isset($result_5)){
				if(mysqli_num_rows($result_5)>=1){
				$row_5 = mysqli_fetch_array($result_5);
				
				//get recently / just added prerequisite
				$required=$row_5['subject_name'];
				}
			}
		header("Location: view_course_details.php?courseId=$courseId&required=$required&message=$message");
	}

?>