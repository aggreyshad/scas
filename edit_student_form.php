<?php
//on submission of edit student form
if(isset($_POST['editstudent']))		{	

				
				
				//PICK FORM VALUES
				$student_surname=$_POST['student_surname'];
				$student_othernames=$_POST['student_othernames'];
				$class_id=$_POST['class_id'];
				$stream=$_POST['stream'];
				$sex=$_POST['sex'];
				$dob=$_POST['dob'];	/*$dob="1999-01-05";*/ //echo $dob;
				$student_email=$_POST['student_email'];
				//$o_level_index=$_POST['o_level_index'];
				//$a_level_index=$_POST['a_level_index'];
				$nationality=$_POST['nationality'];
				$level= $class_id>4 ? 'A' : 'O'; //calcuated from class
				$student_password=md5('543210');
				//$admission_date=$_POST['admission_date'];
				//$student_photofile=$_POST['student_photofile'];
				$studentId=$_POST['studentId'];
						
$sql="UPDATE $db_name.student SET student_surname='$student_surname', student_othernames='$student_othernames', class_id=$class_id, stream='$stream', sex='$sex', dob='$dob',student_email='$student_email', nationality='$nationality', level='$level', student_password='$student_password' WHERE student_id=$studentId";

				$result_of_adding = mysqli_query($con,$sql);
					
				//error message in case update fails
				if(!$result_of_adding){ $message="Failed to Update student details!";}
				else{$message="Successful";}
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
                  <h3 class="box-title">Edit Student failed</h3>
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
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			Successfully updated <?php echo ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?>'s information. 
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
		  <form name="edit_student" id="edit_student" class="edit_student" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
          
			<!-- get user id and pass it as a value in hidden field -->		  	
			<input type="hidden" name="studentId" id="studentId" value="<?php echo $row['student_id']; ?>" />
           
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title"><?php echo ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?></h3>
              <h3 class="box-title pull-right">#StudentID: <?php printf('%02d', $row['student_id']); ?>  <?php //echo $row['level']; ?> <!--Level --></h3> 
            </div>
            <div class="box-body">
				<div class="row">
                
                <!--<div class="form-group col-lg-12 col-md-12">
                      <label for="student_surname">Student ID</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" title="Student ID. This field can not be edited!"class="form-control" id="studentId" name="studentId" placeholder="Enter Student ID" value="<?php //printf('%02d', $row['student_id']); ?>" disabled="disabled"/>
					  </div>
                    </div>-->
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="student_surname">Surname</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control" id="student_surname" name="student_surname" placeholder="Enter Surname" value="<?php echo $row['student_surname']; ?>" />
					  </div>
                    </div>
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="student_othernames">Other Names</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control" id="student_othernames" name="student_othernames" placeholder="Enter Other Names" value="<?php echo $row['student_othernames']; ?>" />
					  </div>
                    </div>
						
					<!-- select -->
                    <div class="form-group col-lg-6 col-md-6">					
					 <label for="student_role">Class</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="class_id" name="class_id">
					  	<option value="">Please Select</option>
						<?php $sql1="select * from $db_name.class"; $result1 = mysqli_query($con,$sql1);
						//if there are no users
						if(mysqli_num_rows($result1)>=1){ 
						while($row1 = mysqli_fetch_array($result1)){
						?>
                        <option value="<?php printf($row1['class_id']); ?>" <?php echo $row1['class_id']==$row['class_id'] ? "selected=\"selected\"" : "" ?>><?php printf($row1['name']); ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div>
					
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="othername">Stream</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
					  <select class="form-control" id="stream" name="stream">
					  	<option value=""<?php if($row['stream']=="") echo "selected=\"selected\"" ?>>Please Select</option>
						<option value="A" <?php if($row['stream']=="A") echo "selected=\"selected\"" ?>>A</option>
						<option value="B"<?php if($row['stream']=="B") echo "selected=\"selected\"" ?>>B</option>
					</select>
					  </div>
                    </div>
					
					
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="othername">Sex</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-male"></i></div>
					  <select class="form-control" id="sex" name="sex">
					  	<option value=""<?php if($row['sex']=="") echo "selected=\"selected\"" ?>>Please Select</option>
						<option value="M"<?php if($row['sex']=="M") echo "selected=\"selected\"" ?>>Male</option>
						<option value="F"<?php if($row['sex']=="F") echo "selected=\"selected\"" ?>>Female</option>
					</select>
					  </div>
                    </div>
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="retype_student_password">Date of Birth</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" class="form-control pull-right" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $row['dob']; ?>" />
					  </div>
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="student_password">Nationality</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-globe"></i></div>
                      <select class="form-control" id="nationality" name="nationality">
					  	<?php $nationality=$row['nationality']; include('list_of_countries.php'); ?>
					  </select>
					  </div>
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="student_password">Student Email</label>
					  <div class="input-group">
					 <div class="input-group-addon"> @ </div>
                      <input type="email" class="form-control" id="student_email" name="student_email" placeholder="Student Email" value="<?php echo $row['student_email']; ?>" />
					  </div>
                    </div>
                    
                   
					<!--
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="surname">O Level Index Number</label>
					  <div class="input-group">
					 <div class="input-group-addon"> # </div>
                      <input type="text" class="form-control" id="o_level_index" name="o_level_index" placeholder="Enter O Level Index Number">
					  </div>
                    </div>
                    
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="surname">A Level Index Number</label>
					  <div class="input-group">
					 <div class="input-group-addon"> # </div>
                      <input type="text" class="form-control" id="a_level_index" name="a_level_index" placeholder="Enter A Level Index Number">
					  </div>
                    </div>
                    -->
					
					
					
					<!--<div class="form-group col-lg-6 col-md-6">
                      <label for="student_photofile">Profile Picture</label>
					  <br>
							 <input type="file" id="student_photofile">					  
							<button class="btn btn-default" id="student_photofile">Upload <i class="fa fa-arrow-circle-right"></i></button>
                      
                    </div>
					<div class="form-group col-lg-6 col-md-6">
					</div>-->
					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="editstudent" id="editstudent">Update <i class="fa fa-arrow-circle-right"></i></button>
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
    $('#edit_student').bootstrapValidator({
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
            stream: {
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
	$('#edit_student').on('click', "button[type='reset']",  function() {
	$('#edit_student').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>