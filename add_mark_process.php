<?php

	if(isset($_POST['add_new_mark']))
	{
		$student_id = $_POST['student_id'];
		$subject_id = $_POST['subject_id']; //o level subject to be inserted
		$aggregate_id = trim($_POST['aggregate_id']);
		$exam_id=4; //UCE UNEB
		$year_of_exam=2014;
		$term=3;
		$class_id = $_POST['class_id'];
		$class_id = 4; //NB UCE UNEB results are for class Id 4
		
		$mark='';
		if($mark==''){
					if($aggregate_id==1){$mark = rand(80,100);}
					elseif($aggregate_id==2){$mark = rand(75,79);}
					elseif($aggregate_id==3){$mark = rand(70,74);}
					elseif($aggregate_id==4){$mark = rand(65,69);}
					elseif($aggregate_id==5){$mark = rand(60,64);}
					elseif($aggregate_id==6){$mark = rand(55,59);}
					elseif($aggregate_id==7){$mark = rand(50,54);}
					elseif($aggregate_id==8){$mark = rand(45,49);}
					elseif($aggregate_id==9){$mark = rand(0,44);}
					elseif($aggregate_id <0){$mark = '';}
				}
		
		$message=""; // sucess - error reporting
		$mark_name=""; // for sucess - error reporting
			$sql_3="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.marks.subject_id=". $subject_id ." AND $db_name.marks.student_id=".$student_id;
            $result_3 = mysqli_query($con,$sql_3);
			
			if(mysqli_num_rows($result_3)>=1){
			//echo "mark already exists";
			$message="mark already exists";
			}
			else{
			//$sql_4="INSERT INTO $db_name.marks (subject_id, aggregate_id, student_id, exam_id ) VALUES( $subjectId, $subject_id, $aggregate_id, $type)";
			$sql_4="INSERT INTO $db_name.marks (student_id, subject_id, exam_id, year, term, class_id, mark, aggregate_id) VALUES($student_id,$subject_id,$exam_id,'$year_of_exam',$term,$class_id,$mark,$aggregate_id)";

				$result_of_adding_p = mysqli_query($con,$sql_4);
					
				//error message in case adding Mark fails
				if(!$result_of_adding_p){ $message="Failed to add new Mark!";}
				else{$message="Successful";}
			}
		
		
		// get a name for success reporting
		$sql_5="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.marks.subject_id=". $subject_id ." AND $db_name.marks.student_id=".$student_id;
            $result_5 = mysqli_query($con,$sql_5);
			
			if(isset($result_5)){
				if(mysqli_num_rows($result_5)>=1){
				$row_5 = mysqli_fetch_array($result_5);
				
				//get recently / just added mark
				$mark_name=$row_5['subject_name'];
				}
			}
		header("Location: view_students.php?student_id=$student_id&mark_name=$mark_name&message=$message");
	}

?>