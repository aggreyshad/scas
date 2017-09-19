<?php
function ExportExcel($table)
	{

		$filename = "uploads/".strtotime("now").'.csv';

		$sql = mysqli_query("SELECT * FROM $table") or die(mysqli_error());

		$num_rows = mysqli_num_rows($sql);
		if($num_rows >= 1)
		{
			$row = mysqli_fetch_assoc($sql);
			$fp = fopen($filename, "w");
			$seperator = "";
			$comma = "";

			foreach ($row as $name => $value)
				{
					$seperator .= $comma . '' .str_replace('', '""', $name);
					$comma = ",";
				}

			$seperator .= "\n";
			fputs($fp, $seperator);
	
			mysqli_data_seek($sql, 0);
			while($row = mysqli_fetch_assoc($sql))
				{
					$seperator = "";
					$comma = "";

					foreach ($row as $name => $value) 
						{
							$seperator .= $comma . '' .str_replace('', '""', $value);
							$comma = ",";
						}

					$seperator .= "\n";
					fputs($fp, $seperator);
				}
	
			fclose($fp);
			echo "Your file is ready. You can download it from <a href='$filename'>here!</a>";
		}
		else
		{
			echo "There is no record in your Database";
		}


	}
?>

<?php
function ExportMarksheetExcel($class_id, $exam_id, $subject_id)
	{
	// coppied db_config lines ***********************************************************
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
	  
	  // end coppied db_config line *******************************************************

		$filename = "uploads/".strtotime("now").'.csv';
		
		if($subject_id=='*'){ // dealing will all subjects
		$sql="select $db_name.student.student_id,  $db_name.student.student_surname, $db_name.student.student_othernames, $db_name.student.class_id, $db_name.student.o_level_index, $db_name.exams.exam_id, $db_name.exams.exam_name FROM $db_name.student, $db_name.exams, $db_name.subject, $db_name.class WHERE $db_name.exams.exam_id=$exam_id AND $db_name.class.class_id=$class_id AND $db_name.class.class_id=$db_name.student.class_id";
		}
		
		else{ // dealing with a single subject
		$sql="select $db_name.student.student_id,  $db_name.student.student_surname, $db_name.student.student_othernames, $db_name.student.class_id, $db_name.student.o_level_index, $db_name.exams.exam_id, $db_name.exams.exam_name, $db_name.subject.subject_id, $db_name.subject.subject_short_name FROM $db_name.student, $db_name.exams, $db_name.subject, $db_name.class WHERE $db_name.exams.exam_id=$exam_id AND $db_name.class.class_id=$class_id AND $db_name.subject.subject_id=$subject_id AND $db_name.class.class_id=$db_name.student.class_id";
		}
		
		$result = mysqli_query($con,$sql);

		$num_rows = @mysqli_num_rows($result);
		if($num_rows >= 1)
		{
			$row = mysqli_fetch_assoc($result);
			$fp = fopen($filename, "w");
			$seperator = "";
			$comma = "";

			foreach ($row as $name => $value)
				{
					$seperator .= $comma . '' .str_replace('', '""', $name);
					$comma = ",";
				}
			if($subject_id!='*'){ //  dealing with a single subject
			$seperator .= ",mark,aggregate_id";}
			
			else{ // dealing with all subjects
			
				if(($class_id >= 1) && ($class_id <= 4) ){
				// ******
				
				$sql2="select * FROM $db_name.subject WHERE $db_name.subject.level='O'";
				$result2 = mysqli_query($con,$sql2);
				$num_rows2 = @mysqli_num_rows($result2);
				if($num_rows2 >= 1)
					{
						while($row2 = mysqli_fetch_array($result2)){
						$seperator .= ",". $row2['subject_short_name'];
						}
					}
				
				//*******
				}
				
				
				elseif(($class_id >= 5) && ($class_id <= 6) ){
				// ******
				
				$sql2="select * FROM $db_name.subject WHERE $db_name.subject.level='A'";
				$result2 = mysqli_query($con,$sql2);
				$num_rows2 = @mysqli_num_rows($result2);
				if($num_rows2 >= 1)
					{
						while($row2 = mysqli_fetch_array($result2)){
						$seperator .= ",". $row2['subject_short_name'];
						}
					}
				
				//*******
				}
			} // close	else{ // dealing with all subjects

			
			$seperator .= "\n";
			fputs($fp, $seperator);
	
			mysqli_data_seek($result, 0);
			while($row = mysqli_fetch_assoc($result))
				{
					$seperator = "";
					$comma = "";

					foreach ($row as $name => $value) 
						{
							$seperator .= $comma . '' .str_replace('', '""', $value);
							$comma = ",";
						}

					$seperator .= "\n";
					$seperator .= "";
					$seperator .= "";
					fputs($fp, $seperator);
				}
	
			fclose($fp);
			$message="Successful";
			echo "<div class=\"alert alert-info alert-dismissable\">";
			echo "<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">x</button>";
			echo "<i class=\"fa fa-download\"></i> Mark Sheet is ready. You can <a href='$filename'>download it from here</a>, fill marks in and re-upload it when complete.";
			echo "</div>";
		}
		else
		{	$message="There is no record in your Database!";
			echo "<div class=\"alert alert-danger alert-dismissable\">";
			echo "<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">x</button>";
			echo "<i class=\"fa fa-download\"></i> Failed to Export MarkSheet. Some of the requested for data - like students, subjects, class may be missing!.";
			echo "</div>";
		}


	}
?>

<?php 
function Export_UNEB_Marksheet_Excel($class_id, $exam_id, $subject_id)
	{
	// coppied db_config lines ***********************************************************
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
	  
	  // end coppied db_config line *******************************************************

		$filename = "uploads/UNEB_Results_".strtotime("now").'.csv';
		
		// ****** start addition **********************
		
		$addition="";
		if(($class_id >= 1) && ($class_id <= 4) ){
				// ******
				
				$sql2="select * FROM $db_name.subject WHERE $db_name.subject.level='O'";
				$result2 = mysqli_query($con,$sql2);
				$num_rows2 = @mysqli_num_rows($result2);
				if($num_rows2 >= 1)
					{
						while($row2 = mysqli_fetch_array($result2)){
						$addition .= ",". $row2['subject_short_name'];
						}
					}
				
				//*******
				}
				
				
				elseif(($class_id >= 5) && ($class_id <= 6) ){
				// ******
				
				$sql2="select * FROM $db_name.subject WHERE $db_name.subject.level='A'";
				$result2 = mysqli_query($con,$sql2);
				$num_rows2 = @mysqli_num_rows($result2);
				if($num_rows2 >= 1)
					{
						while($row2 = mysqli_fetch_array($result2)){
						$addition .= ",". $row2['subject_short_name'];
						}
					}
				
				//*******
				}
				
				//************************************************* End addition     *******************************
		
		
		
		
		if($subject_id=='*'){ // dealing will all subjects
		$sql="select $db_name.student.student_id,  $db_name.student.student_surname, $db_name.student.student_othernames, $db_name.student.class_id, $db_name.student.o_level_index, $db_name.exams.exam_id, $db_name.exams.exam_name FROM $db_name.student, $db_name.exams, $db_name.subject, $db_name.class WHERE $db_name.exams.exam_id=$exam_id AND $db_name.class.class_id=$class_id AND $db_name.class.class_id=$db_name.student.class_id";
		}
		
		else{ // dealing with a single subject
		$sql="select $db_name.student.student_id,  $db_name.student.student_surname, $db_name.student.student_othernames, $db_name.student.class_id, $db_name.student.o_level_index, $db_name.exams.exam_id, $db_name.exams.exam_name, $db_name.subject.subject_id, $db_name.subject.subject_short_name FROM $db_name.student, $db_name.exams, $db_name.subject, $db_name.class WHERE $db_name.exams.exam_id=$exam_id AND $db_name.class.class_id=$class_id AND $db_name.subject.subject_id=$subject_id AND $db_name.class.class_id=$db_name.student.class_id";
		}
		
		$result = mysqli_query($con,$sql);

		$num_rows = @mysqli_num_rows($result);
		if($num_rows >= 1)
		{
			$row = mysqli_fetch_assoc($result);
			$fp = fopen($filename, "w");
			$seperator = "";
			$comma = "";

			foreach ($row as $name => $value)
				{
					$seperator .= $comma . '' .str_replace('', '""', $name);
					$comma = ",";
				}
			if($subject_id!='*'){ //  dealing with a single subject
			$seperator .= ",mark,aggregate_id";}
			
			else{ // dealing with all subjects
			$seperator .= ",mark,aggregate_id"; } // close	else{ // dealing with all subjects

			
			$seperator .= "\n";
			fputs($fp, $seperator);
	
			mysqli_data_seek($result, 0);
			while($row = mysqli_fetch_assoc($result))
				{
					$seperator = "";
					$comma = "";

					foreach ($row as $name => $value) 
						{
							$seperator .= $comma . '' .str_replace('', '""', $value);
							$comma = ",";
						}

					$seperator .= "\n";
					$seperator .= "";
					$seperator .= "";
					fputs($fp, $seperator);
				}
	
			fclose($fp);
			$message="Successful";
			echo "<div class=\"alert alert-info alert-dismissable\">";
			echo "<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">x</button>";
			echo "<i class=\"fa fa-download\"></i> Mark Sheet is ready. You can <a href='$filename'>download it from here</a>, fill marks in and re-upload it when complete.";
			echo "</div>";
		}
		else
		{	$message="There is no record in your Database!";
			echo "<div class=\"alert alert-danger alert-dismissable\">";
			echo "<button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">x</button>";
			echo "<i class=\"fa fa-download\"></i> Failed to Export MarkSheet. Some of the requested for data - like students, subjects, class may be missing!.";
			echo "</div>";
		}


	}
?>