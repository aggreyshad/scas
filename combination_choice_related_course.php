<?php

		include_once "dbconfig.php"; 
		//if a request to view combination's related course
		if(isset($_REQUEST['combinationId'])){
		
		$sql2="select *  from $db_name.course"; 
		$result2 = mysqli_query($con,$sql2);	
		//if there are no course
		if(mysqli_num_rows($result2)<=0){ ?>
		
                  <h3 class="">Viewing All Course</h3>
				There are no Course registered!
		<?php }//close if there are no courses
		
		else{ //shows courses in the db ?>
		
				
			<?php while($row2 = mysqli_fetch_array($result2)){ // while there are courses in db
			$current_id2=$row2['course_id']; 
			$sql4="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$current_id2"; //select all subjects related to current course // got from university weighing system
			$result4 = mysqli_query($con,$sql4) or die ('querry failed');
            if(!$result4){echo "Failed to select all A level REQUIREMENTS for this COURSE";}
			elseif(mysqli_num_rows($result4)<=0){ echo ""; }
			else{ // a course has related A level subjects
				$ctr=0;
				 while($row4 = mysqli_fetch_array($result4)){ //while a course has related A level subjects

		
				//******************************* Subjects releted to combination
				//*****************************************************************************************************
				$sql="select * from $db_name.subject, $db_name.category, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.category_id=$db_name.category.category_id AND level='A' AND $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=".$_REQUEST['combinationId']; // select the subjects realted to currently chosen combination
				$result = mysqli_query($con,$sql);	
				
				//if there are no SUBJECTS related to currenyly chosen combinaation
				if(mysqli_num_rows($result)<=0){ ?>
				
						  <h3 class="">Viewing All Subjects</h3>
						There are no Subjects related to currenyly chosen combinaation!
				<?php }//close if there are no users
				
				else{ //shows Subjects related to currently chosen combinaation
				
				
				 ?>
				
							<?php while($row = mysqli_fetch_array($result)){ // there are subjects related to currenlty chosen combination 
							
							if($row4['subject_id']==$row['subject_id']) {
							$ctr+=1; // count the number of related coursessubjects to combination subjects // total should be 3
							}
							?>
							                              
							  <?php }//close while there are subjects related to currenlty chosen combination ?>
				
		<?php }//close else { //shows Subjects related to currenyly chosen combination 
		// ******************************************************************************************
		
		} // close while($row4 = mysqli_fetch_array($result4)){ //while a course has related A level subjects
		
		} // close else { // a course has related A level subjects
		
		// **************** related course
		
		
		if(isset($ctr) && $ctr >= 3){
		//echo $ctr;
		?> 
        <div class="course Item" id="<?php echo $row2['course_id']; ?>" title="Course: <?php echo $row2['course_name']; ?>" onclick="clicked_course(this);" page="course_choice_details.php?courseId=<?php echo $row2['course_id']; ?>" >
        <input name="id" value="<?php echo $row2['course_id']; ?>" type="hidden">
        <input name="name" value="<?php echo $row2['course_name']; ?>" type="hidden">
                          
        <div class="Inner">                                                                          
        <h4><b><?php echo ucwords(strtolower($row2['course_name'])); ?></b></h4>                                      
        <a title="Click here for more information.">i</a>
        </div> <!-- /.Item -->
                          
        </div> <!-- /.Inner -->
        <hr/>
        
        <?php
		unset($ctr);
		  // take back counter to zero
		} // close if
		  // close related course
		
		} // close while there are courses in db
		
		} // close else{ //shows courses in the db 
		
		} // close if(isset($_REQUEST['combinationId'])){
		?>