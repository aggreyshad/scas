<?php

	if(isset($_POST['add_new_rel_course']))
	{
		$careerId=$_POST['careerId']; //Caree to which related courses are added
		$course_id = $_POST['course_id']; // related course to be inserted
		//$type = trim($_POST['type']);
		
		$message=""; // sucess - error reporting
		$required=""; //name of related A level subject Added //for success reporting
		
			
			//$sql_3="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$careerId AND $db_name.coursesubject.subject_id=".$course_id;
			//$sql3="select * from $db_name.career, $db_name.career_cat, $db_name.careercourse, $db_name.course, $db_name.coursesubject, $db_name.subject   WHERE career.career_cat_id=career_cat.career_cat_id AND $db_name.careercourse.career_id=$db_name.career.career_id AND $db_name.careercourse.course_id=$db_name.course.course_id AND $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND career.career_id=$current_id AND $db_name.careercourse.course_id=".$course_id;
			$sql3="select * from $db_name.career, $db_name.career_cat, $db_name.careercourse, $db_name.course WHERE career.career_cat_id=career_cat.career_cat_id AND $db_name.careercourse.career_id=$db_name.career.career_id AND $db_name.careercourse.course_id=$db_name.course.course_id AND career.career_id=$current_id AND $db_name.careercourse.course_id=".$course_id;
            $result_3 = mysqli_query($con,$sql_3);
			
			if(mysqli_num_rows($result_3)>=1){
			//echo "Prerequisites already exists";
			$message="Related Course already exists";
			}
			else{
			$sql_4="INSERT INTO $db_name.careercourse (career_id, course_id) VALUES( $careerId, $course_id)";

				$result_of_adding_p = mysqli_query($con,$sql_4);
					
				//error message in case adding Prerequisite fails
				if(!$result_of_adding_p){ $message="Failed to add related course!";}
				else{$message="Successful";}
			}
		
		// get a name for success reporting
		//$sql_5="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$careerId AND $db_name.coursesubject.subject_id=".$subject_id;
		//$sql_5="select * from $db_name.career, $db_name.career_cat, $db_name.careercourse, $db_name.course, $db_name.coursesubject, $db_name.subject   WHERE career.career_cat_id=career_cat.career_cat_id AND $db_name.careercourse.career_id=$db_name.career.career_id AND $db_name.careercourse.course_id=$db_name.course.course_id AND $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND career.career_id=$current_id AND $db_name.careercourse.course_id=".$course_id;
		$sql_5="select * from $db_name.career, $db_name.career_cat, $db_name.careercourse, $db_name.course WHERE career.career_cat_id=career_cat.career_cat_id AND $db_name.careercourse.career_id=$db_name.career.career_id AND $db_name.careercourse.course_id=$db_name.course.course_id AND career.career_id=$current_id AND $db_name.careercourse.course_id=".$course_id;
		
            $result_5 = mysqli_query($con,$sql_5);
			
			if(isset($result_5)){
				if(mysqli_num_rows($result_5)>=1){
				$row_5 = mysqli_fetch_array($result_5);
				
				//get recently / just added prerequisite
				$required=$row_5['course_name'];
				}
			}
		header("Location: view_career_details.php?careerId=$careerId&required=$required&message=$message");
	}

?>