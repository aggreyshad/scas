<?php

//if there is a request to get a combination
if(isset($_POST['getcombination']))		{	

		//create variables helpful for determing whether one qualifies for combination
		$has_required=false;
		$has_desired=false;
		$passed_required=false;
		$passed_desired=false;
		$count_required=0;
		$count_desired=0;
				
				
		//PICK FORM VALUES
		$criteria=$_POST['criteria'];
		$studentId=$_POST['studentId'];
						
		$sql5="select * from $db_name.combination";
		$result5 = mysqli_query($con,$sql5);	
		//if there are no combinations
		if(mysqli_num_rows($result5)<=0){ $message="There are no Combinations registered!"; /*die ("There are no Combinations registered!");*/}						 
		//close if there are no combinations
		
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
						  
						  
						  	while($row7 = mysqli_fetch_array($result7)){ // while there are o level prerequisites
						  
								//show subject and prerequisites
								
								//echo "Sub: <b>".$row7['subject_name']."</b> Min: <b>".$row7['aggregate_id']."</b>";
								//echo ($row7['type']>0) ? ' Required' : '';
								//echo "<br />";
								
								$o_level_subject_id=$row7['o_level_subject_id'];
								
								//check UNEB results to see if student passes prerequisite
								//exam_id=4 represents UNEB UCE = s4 final exams
								//$sql8="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.student.student_id=$studentId AND $db_name.subject.subject_id=$o_level_subject_id ORDER BY $db_name.marks.aggregate_id";
								$sql8="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.student.student_id=$studentId AND $db_name.subject.subject_id=$o_level_subject_id";
								
								
						  		$result8 = mysqli_query($con,$sql8) /* or die ('querry failed')*/;
								if(!$result8){$message="Failed to select Marks/Results for the current Student ".$studentId;}
						  
						  		while($row8 = mysqli_fetch_array($result8)){ // while there are marks for student
								
									if(($row8['aggregate_id'] >= 1) && ($row8['aggregate_id'] <= $row7['aggregate_id'])){ 
									// if student has attained min reqiurement eg. aggregate below 5
									
										//check the type of O LEVEL subject for which he got the needed aggregate. ie is it a required or desired subject fo the combination?
										if($row7['type']==0){ 
											$has_desired=true; 
											$passed_desired=true; 
											$count_desired +=1; 
											//echo "des: <b>".$row8['subject_name']."</b> Min: <b>".$row8['aggregate_id']."</b><br />";
										}
										elseif($row7['type']==1){ 
											$has_required=true; 
											$passed_required=true;
											$count_required +=1; 
											echo "req: <b>".$row8['subject_name']."</b> Min: <b>".$row8['aggregate_id']."</b><br />";
										}
										elseif($row7['type']==2){ 
											$has_required=true; 
											$passed_required=true; 
											$count_required +=1; 
											echo "req: <b>".$row8['subject_name']."</b> Min: <b>".$row8['aggregate_id']."</b><br />";
										}
										

									} //if(($row8['aggregate_id'] >= 1) && ($row8['aggregate_id'] <= $row7['aggregate_id'])) { //  if student has scored above minimum aggregate
								
								} // while there are marks for student
				
							} // close while there are o level prerequisites
												
						} //close while there are subjects corresponding to given combination

							//echo "<br /><br />";
							
							if($count_required >=3){
							echo "<b>".$row5['combination_name']."</b> $count_required<br /> <br />"; 
							$count_required=0;$has_required=false;}
							 //combination shows when you have atleast three of the required subjects
							else {"<br />No combination <br />";}
					
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
					  	<option value="">Please Select</option>
						<option value="1">Best Done O-Level Subjects</option>
					</select>
					  </div>
                    </div>
					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="getcombination" id="getcombination">Get Combination <i class="fa fa-arrow-circle-right"></i></button>
					<button class="btn btn-default clearForm" type="reset">Reset</button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->	 
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
    
    
