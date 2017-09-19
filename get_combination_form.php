			<!-- Modal -->


<?php
//on submission of edit student form
if(isset($_POST['getcombination']))		{	

				
				
				//PICK FORM VALUES
				$combination=$_POST['combination'];
				$studentId=$_POST['studentId'];
						
$sql="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 AND $db_name.student.student_id=$studentId ORDER BY $db_name.marks.aggregate_id";

				$result_of_adding = mysqli_query($con,$sql);
					
				//error message in case update fails
				if(!$result_of_adding){ $message="Failed to Get Combination!";
				
				
				}
				else{$message="Successful";
					while($row = mysqli_fetch_array($result_of_adding)){
					//$array_of_subjects[] = $row['subject_id'];// create array of all aggregates
						if(($row['aggregate_id']>=1) && ($row['aggregate_id']<=5)){ //get only subjects with aggregate 5 and below
						
							$array_of_subjects[] = $row['subject_id'];
							$array_of_subjects_names[] = $row['subject_short_name'];
							$array_of_aggregates[] = $row['aggregate_id'];
						
						
								//$sql3="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.subjectcombination.subject_id=2 GROUP BY $db_name.subjectcombination.combination_id";
								$sql3="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.subject.subject_short_name LIKE '".$row['subject_short_name']."' GROUP BY $db_name.subjectcombination.combination_id";
								$result3 = mysqli_query($con,$sql3) or die ('querry failed');
									while($row3 = mysqli_fetch_array($result3)){
										echo strtoupper($row3['combination_name'])."<br/>";
									}

						}
					}
					
					if(isset($array_of_subjects,$array_of_aggregates,$array_of_subjects_names)){
					subjects_for_combination($array_of_subjects,$array_of_aggregates,$array_of_subjects_names);}
					
					//$sql3="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.student.student_id=$current_id"; 
						
					//$result3 = mysqli_query($con,$sql3) or die ('querry failed');
				
				
				}
		}


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
					  <select class="form-control" id="combination" name="combination">
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
            combination: {
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
    
    
