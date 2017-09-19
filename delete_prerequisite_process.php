<?php
	//session_start();
	//require_once 'dbconfig.php';

	if(isset($_POST['add_new_prerequisites']))
	{
		$subjectId=$_POST['subjectId']; //A level subject to which prerequisites are added
		$subject_id = $_POST['subject_id']; //o level subject to be inserted
		$type = trim($_POST['type']);
		$aggregate_id = trim($_POST['aggregate_id']);
		
		$message=""; // sucess - error reporting
		$prerequisite=""; //name of prerequisite //for success reporting
		
		//$password = md5($user_password);
		
		
		/*try
		{*/	
			$sql_3="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$subjectId AND $db_name.subjectprerequisites.o_level_subject_id=".$subject_id;
            $result_3 = mysqli_query($con,$sql_3);
			
			if(mysqli_num_rows($result_3)>=1){
			//echo "Prerequisites already exists";
			$message="Prerequisites already exists";
			}
			else{
			$sql_4="INSERT INTO $db_name.subjectprerequisites (subject_id, o_level_subject_id, aggregate_id, type) VALUES( $subjectId, $subject_id, $aggregate_id, $type)";

				$result_of_adding_p = mysqli_query($con,$sql_4);
					
				//error message in case adding Prerequisite fails
				if(!$result_of_adding_p){ $message="Failed to add new Prerequisite!";}
				else{$message="Successful";}
			}
		
		
		
			//$stmt = $db_con->prepare("SELECT * FROM users WHERE user_email=:email");
			//$stmt->execute(array(":email"=>$user_email));
			//$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//$count = $stmt->rowCount();
			
			/*if($row['user_password']==$password){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['user_id'];
			}
			else{
				
				echo "Email or password does not exist"; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}*/
		
		// get a name for success reporting
		$sql_5="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$subjectId AND $db_name.subjectprerequisites.o_level_subject_id=".$subject_id;
            $result_5 = mysqli_query($con,$sql_5);
			
			if(isset($result_5)){
				if(mysqli_num_rows($result_5)>=1){
				$row_5 = mysqli_fetch_array($result_5);
				
				//get recently / just added prerequisite
				$prerequisite=$row_5['subject_name'];
				}
			}
		header("Location: view_subject_details.php?subjectId=$subjectId&prerequisite=$prerequisite&message=$message");
	}

?>