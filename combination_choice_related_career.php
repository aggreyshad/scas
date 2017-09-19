<?php

		include_once "dbconfig.php"; 
		//if a request to view combination's related Careers is Made
		if(isset($_REQUEST['combinationId'])){
		
		$sql_career="select *  from $db_name.career"; 
		$result_career = mysqli_query($con,$sql_career);	
		//if there are no careers
		if(mysqli_num_rows($result_career)<=0){ ?>
		
                  <h3 class="">Viewing All Careers</h3>
				There are no Careers registered!
		<?php }//close if there are no Careers
		
		else{ //shows Careers in the db ?>
		
				
			<?php 
				while($row_career = mysqli_fetch_array($result_career)){  // while there are careers
				
				$current_career_id=$row_career['career_id']; 
									
				$sql_careercourse="select * from $db_name.career, $db_name.career_cat, $db_name.careercourse, $db_name.course WHERE career.career_cat_id=career_cat.career_cat_id AND $db_name.careercourse.career_id=$db_name.career.career_id AND $db_name.careercourse.course_id=$db_name.course.course_id AND career.career_id=$current_career_id";
									
                $result_careercourse = mysqli_query($con,$sql_careercourse) or die ('querry failed');
                if(!$result_careercourse){echo "Failed to select all related courses for this Career";}
				elseif(mysqli_num_rows($result_careercourse)<=0){ echo ""; }
				else{ // shows careers that have related courses
				
					 	while($row_careercourse = mysqli_fetch_array($result_careercourse)){ //while there are careers with related courses

		
		
						//************************************ course **********************************************
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
								$sql="select * from $db_name.subject, $db_name.category, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.category_id=$db_name.category.category_id AND level='A' AND $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=".$_REQUEST['combinationId']; // select the subjects realted to currently chosen comnination
								$result = mysqli_query($con,$sql);	
								
								//if there are no SUBJECTS related to currenyly chosen combinaation
								if(mysqli_num_rows($result)<=0){ ?>
								
										  <h3 class="">Viewing All Subjects</h3>
										There are no Subjects related to currenyly chosen combinaation!
								<?php }//close if there are no users
								
								else{ //shows Subjects related to currenyly chosen combinaation
								
								
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
						
						
									if($row_careercourse['course_id']==$row2['course_id']) { // if career has this current course registered as a related course  
									$careercourse_are_related=true; // count the number of related coursessubjects to combination subjects // total should be 3
									//echo "Career and couse are realted <br />";
						
				
									?> 
						
						
									<?php
									} // show/ display careers with related courses
									unset($ctr);
									// unset the counter
								}// close if
							// ************* close related course
						
							} // close while there are courses in db
						
						} // close else{ //shows courses in the db 
						
						// *********************close course **************************************************
		
		} // close while($row_careercourse = mysqli_fetch_array($result_careercourse)){ //while there are careers with related courses
		
		} // close else{ // shows careers that have related courses
		
		if(isset($careercourse_are_related) && $careercourse_are_related==true){
		
		?>
        
        <div class="career Item" id="<?php echo $row_career['career_id']; ?>" title="Career: <?php echo $row_career['career_name']; ?>" onclick="clicked_career(this);" page="career_choice_details.php?careerId=<?php echo $row_career['career_id']; ?>" >
        <input name="career_id" value="<?php echo $row_career['career_id']; ?>" type="hidden">
        <input name="career_name" value="<?php echo $row_career['career_name']; ?>" type="hidden">
                          
        <div class="Inner">                                                                          
        <h4><b><?php echo ucwords(strtolower($row_career['career_name'])); ?></b></h4>                                      
        <a title="Click here for more information.">i</a>
        </div> <!-- /.Item -->
                          
        </div> <!-- /.Inner -->
        <hr/>
        
        
        <?php
		unset($careercourse_are_related); //unset variable
		}//close if
		
		} // close while($row_career = mysqli_fetch_array($result_career)){  // while there are careers
		
		
		} // close else{ //shows Careers in the db
		
		} // close if(isset($_REQUEST['combinationId'])){
		?>