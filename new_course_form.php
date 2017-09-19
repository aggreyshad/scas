<?php
//on submission of new user
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$course_name=$_POST['course_name'];
				$course_type=$_POST['course_type'];
				$sql="select *  from $db_name.course where $db_name.course.course_name='$course_name'"; //CHECK TO  SEETHAT SUBJECT DOESNOT EXIST
				$result = mysqli_query($con,$sql);
					
					if(mysqli_num_rows($result)>=1){
					$message="Failed! A Course with a name <b>$course_name</b> already exists"; //Do not insert duplicates
					}//if(mysqli_num_rows	
					
					else{ //ok to insert
						$sql="INSERT INTO $db_name.course (course_name, course_type) 	VALUES('$course_name','$course_type')";
						$result_of_adding = mysqli_query($con,$sql);
							
						//error message in case update fails
						if(!$result_of_adding){ 				
							$message="Failed to add new course!";}
						else{
							$message="Successful";}
					}// CLOSE elseok to insert
				
		}//if(isset($_POST['submit']))	
?>

<div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			Successfully added <?php  echo "<b>".$course_type." ". $course_name."</b>";?> to Courses.
			</div> 
		<?php }
		
		else{ //failed to add new user ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="register_course" id="register_course" class="register_course" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add New Course</h3> 
            </div>
            <div class="box-body">
				<div class="row">
                
					<div class="form-group col-lg-6 col-md-6">
                      <label for="course_type">Course Type</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
					  <select class="form-control" id="course_type" name="course_type">
					  	<option value="">Please Select</option>
						<option value="Bachelor of">Bachelor</option>
						<option value="Bachelor of Arts in">Bachelor of Arts</option>
						<option value="Bachelor of Science in">Bachelor of Science</option>
						<option value="Diploma in">Diploma</option>
						<option value="Certification">Certification</option>
					</select>
					  </div>
                    </div>
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="course_name">Course Name</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-book"></i></div>
                      <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name" />
					  </div>
                    </div>				

                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
<!--					<input type="submit"class="btn btn-default" name="submit" id="submit" value="Submit" />
					<button class="btn btn-default clearForm" type="reset">Reset</button>
-->              
			  </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         
      <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_course').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			course_name: {
                message: 'A valid Course Name is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 60,
						message: 'Course Name must be more than 2 and less than 60 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9 ]+$/,
                        message: 'This field can only consist of alphanumerics'
                    }
                }
            },
            course_type: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            }
        }
																			
    });
	
	
	});

    </script>	
	
	<!-- =========================================================================  -->