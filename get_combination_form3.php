<?php

//if there is a request to get a combination
if(isset($_POST['getcombination']))		{
		$clicked_get_comb_botton=true;	

		//create variables helpful for determing whether one qualifies for combination
		$has_required=false;
		$has_desired=false;
		$passed_required=false;
		$passed_desired=false;
		$count_required=NULL;
		$count_desired=NULL;
		$total_agg=NULL;
				
				
		//PICK FORM VALUES
		$criteria=$_POST['criteria'];
		$studentId=$_POST['studentId'];
						
		$sql5="select * from $db_name.combination";
		$result5 = mysqli_query($con,$sql5);	
		//if there are no combinations
		if(mysqli_num_rows($result5)<=0){ $message="There are no Combinations registered!"; /*die ("There are no Combinations registered!");*/}						 
		else{ //shows combinations in the db
			
			while($row5 = mysqli_fetch_array($result5)){ // while there are combinations in db
				
				$current_id=$row5['combination_id'];
				$sql6="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=$current_id";
						$result6 = mysqli_query($con,$sql6);
						//error message in case selectig subjects for a combination fails
						if(!$result6){ $message="Failed to select subjects corresponding to Combination <b>".$row5['combination_name']."</b>"; }
						
						  //echo "<b>".$row5['combination_name']."</b> <br />";
						
						while($row6 = mysqli_fetch_array($result6)){ //while there are subjects corresponding to given combination
						
							$current_subject_id=$row6['subject_id'];
						  	$sql7="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_subject_id";
						  	$result7 = mysqli_query($con,$sql7) /* or die ('querry failed')*/;
						  	if(!$result7){ $message="Failed to select all o level prerequisites for A subject ".$row6['subject_name'];}
						  
						  
						  	//$count_required=0;
						  	while($row7 = mysqli_fetch_array($result7)){ // while there are o level prerequisites
						  		
								
								//show subject and prerequisites
								//if($row7['type']>0){
								//echo "Sub: <b>".$row7['subject_name']."</b> Min: <b>".$row7['aggregate_id']."</b>";
								//echo ($row7['type']>0) ? ' Required' : '';
								//echo " - ".$row7['code'];
								//echo "<br />";}
								
								$o_level_subject_code=$row7['code'];
								$o_level_subject_id=$row7['o_level_subject_id'];
								//$count_required+=1;
								
								if($row7['type']>0){
								//check UNEB results to see if student passes prerequisite
								//exam_id=4 represents UNEB UCE = s4 final exams
								//$sql8="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.student.student_id=$studentId AND $db_name.subject.subject_id=$o_level_subject_id ORDER BY $db_name.marks.aggregate_id";
								$sql8="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.student.student_id=$studentId AND $db_name.subject.code=$o_level_subject_code";
								
								
						  		$result8 = mysqli_query($con,$sql8) /* or die ('querry failed')*/;
								if(!$result8){$message="Failed to select Marks/Results for the current Student ".$studentId; }
						  
						  		while($row8 = mysqli_fetch_array($result8)){ // while there are marks for student
								
									if(($row8['aggregate_id'] >= 1) && ($row8['aggregate_id'] <= $row7['aggregate_id'])){ 
									// if student has attained min reqiurement eg. aggregate below 5
									
										//check the type of O LEVEL subject for which he got the needed aggregate. ie is it a required or desired subject fo the combination?
										/*
										if($row7['type']==0){ 
											$has_desired=true; 
											$passed_desired=true; 
											$count_desired +=1; 
											//echo "des: <b>".$row8['subject_name']."</b> Min: <b>".$row8['aggregate_id']."</b><br />";
										}
										if($row7['type']==1){ 
											$has_required=true; 
											$passed_required=true;
											$count_required +=1; 
											//echo "req: <b>".$row8['subject_name']."</b> Min: <b>".$row8['aggregate_id']."</b><br />";
										}
										if($row7['type']==2){ 
											$has_required=true; 
											$passed_required=true; 
											$count_required +=1; 
											//echo "req: <b>".$row8['subject_name']."</b> Min: <b>".$row8['aggregate_id']."</b><br />";
										}
										*/
										//echo "<br />has required: ".$row8['subject_name']." Agg: ".$row8['aggregate_id']."<br /><br />";
 										$count_required+=1;
										$total_agg+=$row8['aggregate_id'];
										$you_pass = $count_required;

									} //if(($row8['aggregate_id'] >= 1) && ($row8['aggregate_id'] <= $row7['aggregate_id'])) { //  if student has scored above minimum aggregate
								
								} // while there are marks for student
								
								} //if($row7['type']>0){
				
							} // close while there are o level prerequisites
												
						} //close while there are subjects corresponding to given combination

							
							if(isset($you_pass) && $you_pass >=3){
							//echo "<b>".$row5['combination_name']."</b> $total_agg<br />"; 
							$recomended_combinations[]= "<tr><td style=\"visibility:hidden\">$total_agg</td> <!-- <td>".$row5['combination_id']." </td> --> <td> <b>".$row5['combination_name']."</b> </td> <td>$total_agg</td><td> <a href=\"get_combination_of_choice.php?combinationId=".$row5['combination_id']."&studentId=$studentId\" title=\"Details about - ".$row5['combination_name']."\" target=\"_blank\" ><i class=\"fa fa-eye\" style=\"color:#33CC66;\"></i> View</a></td> </tr>"; 
							$total_agg=0;
							$count_required=0;
							$has_required=false;
							}
							$count_required=0;
							$total_agg=0;
							//echo "<br /><br />";
							 //combination shows when you have atleast three of the required subjects
							//else {"<br />No combination <br />";}
					
					} // close while there are combinations in db
				
				} //else closes there are combnations in db
				
		} //close if(isset($_POST['getcombination']))


?>

<?php 
		//if a request to edit is made
		if(isset($_REQUEST['studentId'])){
		$sql="select * from $db_name.student WHERE student_id=".$_REQUEST['studentId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no student edit request is made //or if there are no student with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Failed!</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				Sorry! If you arrived at this page by mistake, contact the administrator!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no students
		
		else{ //shows student to be editted 
		$row = mysqli_fetch_array($result);
		
		
		?>
		
		
		 <div class="row">
		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			Getting Combination for <?php echo ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?>.
            <?php printf('<b>Index No:</b> '.$center_no.'/%03d', $row['student_id']); ?> 
			</div> 
		<?php }
		
		else{ //failed to edit student details ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="get_combination" id="get_combination" class="get_combination" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
          
			<!-- get user id and pass it as a value in hidden field -->		  	
			<input type="hidden" name="studentId" id="studentId" value="<?php echo $row['student_id']; ?>" />
           
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title"><?php echo ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?></h3>
              <h3 class="box-title pull-right"><?php printf('<b>Index No:</b> '.$center_no.'/%03d', $row['student_id']); ?> <!--Level --></h3> 
            </div>
            <div class="box-body">
				<div class="row">
                
					<div class="form-group col-lg-12 col-md-12">
                      <label for="othername">Please Choose a Criteria</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
					  <select class="form-control" id="criteria" name="criteria">
					  	<option value="" <?php if(isset($criteria) && $criteria=='') echo "selected=\"selected\"" ?> >Please Select</option>
						<option value="1" <?php if(isset($criteria) && $criteria==1) echo "selected=\"selected\"" ?> >Best Done O-Level Subjects</option>
					</select>
					  </div>
                    </div>
					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
              
                    <button type="submit" class="btn btn-default" name="getcombination" id="getcombination">             
					<?php echo !isset($recomended_combinations) ? 'Get' : 'Recommended'; ?> Combination <i class="fa fa-arrow-circle-right"></i></button>
              </div><!-- /.box-footer-->
			  
			 </form>
             
             
             <?php if(isset($recomended_combinations)){ 
			 
			 
			 		sort($recomended_combinations); //based on combination with least aggregates
					?>
                    
                   <div class="box box-default">
<!--                        <div class="box-header with-border">
                        	<h3 class="box-title">Recommended Combination(s)</h3>
                        </div><!-- /.box-header --
-->                		<div class="box-body">
			 		Your recommended combinations based on criteria of Best Done O-Level Subjects are: <br />
                    	<table class="table table-bordered table-striped bestdone_olevel">
                        	<thead>
                            	<tr>
                                	<th style="visibility:hidden"></th>
                                	<!-- <th>#</th> -->
                                	<th>Combination</th>
                                	<th>Total Aggregates</th>
                                    <th>Details</th>
                             		</trh
                            ></thead>
                            <tbody>
                            		<?php 
			 						for($x=0; $x < sizeof($recomended_combinations); $x++){
			 						echo $recomended_combinations[$x];
			 						}
									?>
                            </tbody>
                         </table>
                         </div><!-- /.box-body -->
                     </div>
					<?php }
					
					else{  //if their are no recomended combinations						
						// yet the combination button was clicked 
						if(isset($clicked_get_comb_botton) && $clicked_get_comb_botton==true){
							if($row['class_id']<4){ ?>
							<div class="callout callout-danger">
								<p>Sorry. Combinations are only awarded to students who have completed S4, are in S5, or S6. <br />
								Your Current Class is: Senior <?php echo $row['class_id']; ?>.</p> 
                            </div>
							<?php }
							else if($row['class_id']>=4){ //s4 or above
								//but have no UNEB results
								//$sql_marks8="select * from $db_name.marks, $db_name.student, $db_name.exams WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND db_name.marks.exam_id=4 AND $db_name.marks.student_id=".$row['student_id'];
								$sql_marks8="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.marks.student_id=".$row['student_id'];								
								
						  		$result_marks8 = mysqli_query($con,$sql_marks8) /* or die ('querry failed')*/;
								if(mysqli_num_rows($result_marks8)<=0){
								?>
                                <div class="callout callout-warning">
									<p>Sorry there is no performance data for this student. <a class="btn btn-warning" id="add_mark" name="add_mark" data-toggle="modal" data-target="#myModal<?php echo $row['student_id']; ?>">Click here to add UNEB results <i class="fa fa-bar-chart-o"></i></a></p>
                                </div>
								
								<?php }
								//data entry must be complete. minimum 8 subjects required for complete UNEB results
								elseif(mysqli_num_rows($result_marks8)>=1 && mysqli_num_rows($result_marks8)<8){
								?>
                                <div class="callout callout-default bg-gray disabled ">
									<p>Sorry. Data entry incomplete. Minimum 8 UNEB subjects must be recorded. <a class="btn btn-warning" id="add_mark" name="add_mark" data-toggle="modal" data-target="#myModal<?php echo $row['student_id']; ?>">Click here to add UNEB results <i class="fa fa-bar-chart-o"></i></a></p>
                                </div>
								
								<?php }
								
								 else{
								
								 // have UNEB results but got no combination ?>
								<div class="callout callout-danger">
									<p>Sorry there are no recommended combinations for you. Your results (qualifications) are less than the required</p>
                                </div>
                                
                                <?php
								
								}
							}
						}
					}					
             
             ?>
             
             
             
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         
         <!-- ==================== modal ================================= -->
                  <!-- Modal -->
                                                <div class="modal fade" id="myModal<?php echo $row['student_id']; ?>"  role="dialog">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <?php include "add_mark_process.php"; 
													
													$sql2="select * from $db_name.student, $db_name.class where $db_name.student.class_id=$db_name.class.class_id AND $db_name.student.student_id=".$row['student_id']; $result2 = mysqli_query($con,$sql2);
													$row2 = mysqli_fetch_array($result2);
													?>
<form name="register_mark" id="register_mark" class="register_mark" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >


                                                      <div class="modal-header bg-green">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                        <h4 class="modal-title">Add UCE Results for <?php echo ucwords(strtolower($row2['student_surname']." ".$row2['student_othernames'])); ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                       
                                                      
                                                      
                                                      
                                                          <?php
                                                          $current_id=$row['student_id']; 
														  ?>
                                                          
                                                          <?php
														  $sql8="select * from $db_name.subject WHERE level ='O'";
														  
                                                          $result8 = mysqli_query($con,$sql8) or die ('querry failed');
                                                          if(!$result8){echo "Failed to select all o level subject";
														  }
                                                          elseif(mysqli_num_rows($result8)<=0){ echo "There are no o level subjects"; 
														  }
                                                          else{ ?>
                                                          <div class="row">
                                                          
                                                          	<!-- get user id and pass it as a value in hidden field -->		  	
															<input type="hidden" name="student_id" id="student_id" value="<?php echo $row['student_id']; ?>" />
                                                          	<!-- get user id and pass it as a value in hidden field -->		  	
															<input type="hidden" name="class_id" id="class_id" value="<?php echo $row['class_id']; ?>" />
                                                          
                                                            <!-- select -->
                                                           <div class="form-group col-lg-6 col-md-6">
                                                             <label for="student_role">O level Subject </label>
                                                             <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                                              <select class="form-control select2" id="subject_id" name="subject_id" style="width:100%;" required>
                                                                <option value="">Please Select</option>
                                                                <?php while($row8 = mysqli_fetch_array($result8)){ 
																//***************************************************** make sure mark is not already assigned
																$sql_2="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.marks.subject_id=".$row8['subject_id'] ." AND $db_name.marks.student_id=".$current_id;
                                                          		$result_2 = mysqli_query($con,$sql_2); // or die ('querry failed');
																 if(mysqli_num_rows($result_2)>=1){ //IF SUBJECT EXISTS 
																  ?> 
																<?php
																  }
																  else{ 
																 
																?>
                                                                <option value="<?php printf($row8['subject_id']); ?>"><?php printf($row8['subject_name']); ?></option>
                                                                <?php 	
																	} //CLSE ELSE
																
                                                                //*********************************************************
																} //while there are o level subjects
                                                                ?>
                                                               </select>
                                                              </div>
                                                            </div>

                                                            
                                                            <!-- select -->
                                                            <div class="form-group col-lg-6 col-md-6">					
                                                             <label for="aggregate_id">Score [Aggregate]</label>
                                                             <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                                              <select class="form-control" id="aggregate_id" name="aggregate_id" required>
                                                                <option value="">Please Select</option>
                                                                <?php $sql9="select * from $db_name.aggregate"; $result9 = mysqli_query($con,$sql9)or die ('failed to select agregates from agregate table');
                                                                //if there are no users
                                                                if(mysqli_num_rows($result9)>=1){ 
                                                                while($row9 = mysqli_fetch_array($result9)){
                                                                ?>
                                                                <option value="<?php printf($row9['aggregate_id']); ?>"><?php printf($row9['aggregate_short_name']); ?></option>
                                                                <?php }
                                                                }?>
                                                               </select>
                                                              </div>
                                                            </div>
                                                            
                                                           
                                                           
                                                           </div>
                                                           
                                                          <?php } //close else?>
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
<!--                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
-->																			
                                                    <button type="submit" class="btn btn-default" name="add_new_mark" id="add_new_mark">Submit <i class="fa fa-arrow-circle-right"></i></button>
                                                    <button class="btn btn-default clearForm" type="reset">Reset</button>
							
                                                      </div>
			 										</form>
                                                    </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                                </div>
                                                
                                                <!-- ==================== modal ================================= -->
			 
         	 
		 <?php }//close showing the users being edited ?>
		 
         
        <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#get_combination').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			student_surname: {
                message: 'A valid studentname is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 30,
						message: 'student_surname must be more than 6 and less than 30 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z]+$/,
                        message: 'This field can only consist of alphabets'
                    }
                }
            },
			student_othernames: {
                message: 'A valid studentname is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 40, 
						message: 'Last name must be between 2 and 40 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z ]+$/,
                        message: 'This field can only consist of alphabets'
                    }
                }
            },
			class_id: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
            criteria: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			sex: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			dob: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field cannot be empty'
                    }
                }
            },
			nationality: {
                message: 'Please select a role',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			o_level_index: {
                message: 'A valid O Level Index Number is required',
                validators: {
                    stringLength: {
						min: 6,
						max: 20,
						message: 'An O Level Index Number must be more than 6 and less than 20 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9]+$/,
                        message: 'This field can only consist of alphabets'
                    }
                }
            },
			a_level_index: {
                message: 'A valid O Level Index Number is required',
                validators: {
                    stringLength: {
						min: 6,
						max: 20,
						message: 'An O Level Index Number must be more than 6 and less than 20 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9]+$/,
                        message: 'This field can only consist of alphabets'
                    }
                }
            },
			student_email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },					
                   	emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	$('#get_combination').on('click', "button[type='reset']",  function() {
	$('#get_combination').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>
    
    
