<?php
//on submission of new user
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$subject_name=$_POST['subject_name'];
				$subject_short_name=$_POST['subject_short_name'];
				$level=$_POST['level'];
				$category_id_o=$_POST['category_id_o'];
				$category_id_a=$_POST['category_id_a'];
				
				$category_id = ($category_id_o != '') ? $category_id_o : $category_id_a; //assign either olevel id or alevel id
				$code=$_POST['code'];
				$sql="select *  from $db_name.subject where $db_name.subject.code='$code'"; //CHECK TO  SEETHAT SUBJECT DOESNOT EXIST
				$result = mysqli_query($con,$sql);
					
					if(mysqli_num_rows($result)>=1){
					$message="Failed! A Subject with code: $code already exists"; //Do not insert duplicates
					}//if(mysqli_num_rows	
					
					else{ //ok to insert
						$sql="INSERT INTO $db_name.subject (subject_name, subject_short_name, level, category_id, code) 	VALUES('$subject_name','$subject_short_name','$level','$category_id','$code')";
						$result_of_adding = mysqli_query($con,$sql);
							
						//error message in case update fails
						if(!$result_of_adding){ 				
							$message="Failed to add new subject!";}
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
			Successfully added <?php  echo $subject_name;?> to Subjects.
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
		  <form name="register_subject" id="register_subject" class="register_subject" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add New Subject</h3> 
            </div>
            <div class="box-body">
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="subject_name">Subject Name</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-book"></i></div>
                      <input type="text" class="form-control" id="subject_name" name="subject_name" placeholder="Enter Subject Name" />
					  </div>
                    </div>
					
								
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="subject_short_name">Subject Short Name</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-book"></i></div>
                      <input type="text" class="form-control" id="subject_short_name" name="subject_short_name" placeholder="Enter Subject Short Name" />
					  </div>
                    </div>
					
					<!--<div class="form-group col-lg-6 col-md-6">
                      <label for="level">Level</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-arrows"></i></div>
					  <select class="form-control" id="level" name="level" onchange="yesnoCheck(this);">
					  	<option value="">Please Select</option>
						<option value="O">0rdinary</option>
						<option value="A">Advanced</option>
					</select>
					  </div>
                    </div>-->
                    <!-- select -->
                    <div class="form-group col-lg-6 col-md-6">					
					 <label for="student_role">Class</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="class_id" name="class_id" onchange="yesnoCheck(this);">
					  	<option value="">Please Select</option>
						<?php $sql="select * from $db_name.class"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['class_id']); ?>"><?php printf($row['name']); ?></option>
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
					  	<option value="">Please Select</option>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
					  </div>
                    </div>
							
					<!-- select  O LEVEL-->
                    <div class="form-group col-lg-6 col-md-6" id="o_level" style="display: none;">					
					 <label for="code">Subject Category</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-gears"></i></div>
                      <select class="form-control" id="category_id_o" name="category_id_o">
					  	<option value="">Select O - Level Subject Category</option>
                        <?php $sql="select * from $db_name.category"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
							if($row['category_name'] != 'GENERAL PAPER'){
						
						?>
                        <option value="<?php printf($row['category_id']); ?>"><?php printf($row['category_name']); ?></option>
            			<?php }
							}
						}?>
                      </select>
					  </div>
                    </div>
                    
                    
                    <!-- select  A LEVEL-->
                    <div class="form-group col-lg-6 col-md-6" id="a_level" style="display: none;">					
					 <label for="code">Subject Category</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-gears"></i></div>
                      <select class="form-control" id="category_id_a" name="category_id_a">
					  	<option value="">Select A - Level Subject Category</option>
                        <?php $sql="select * from $db_name.category"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
							if(($row['category_name'] != 'ENGLISH LANGUAGE') && ($row['category_name'] != 'BUSINESS STUDIES')){
						?>
                        <option value="<?php printf($row['category_id']); ?>"><?php printf($row['category_name']); ?></option>
            			<?php }
							}
						}?>
                      </select>
					  </div>
                    </div>
					

				   <div class="form-group col-lg-6 col-md-6">
					 <label for="phone">Subject Code</label>
					<div class="input-group">
					 <div class="input-group-addon"><strong> # </strong></div>
					 <input type="text" id="code" name="code" class="form-control"></div>					
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
         
         
         <!-- SHOW HIDE SUBJECT CATEGORY DEPEDING ON CHOSEN LEVEL ie o level or A level   -->
         <script>
			function yesnoCheck(that) {
				if (that.value == "O") {
				   // alert("check");
					document.getElementById("o_level").style.display = "block";
				} else {
					document.getElementById("o_level").style.display = "none";
				}
				if (that.value == "A") {
				   // alert("check");
					document.getElementById("a_level").style.display = "block";
				} else {
					document.getElementById("a_level").style.display = "none";
				}
			}
		</script>
         
         
         
      <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_subject').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			subject_name: {
                message: 'A valid Subject Name is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 30,
						message: 'Subject Name must be more than 2 and less than 30 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9 ]+$/,
                        message: 'This field can only consist of alphanumerics'
                    }
                }
            },
			subject_short_name: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 10,
						message: 'Subject Short Name must be between 3 and 10 characters long'
					},
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'The field can only consist of alphanumerics'
                    }
                }
            },
            level: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			category_id: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field can not be empty'
                    }
                }
            },
			code: {
                message: 'This field is required and cannot be empty',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 10,
						message: 'Code length must between 2 and 10 characters'
					},
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: 'The field can only consist of alphanumerics'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	//$('#register_user').on('click', "button[type='reset']",  function() {
	//$('#register_user').bootstrapValidator('resetForm', true);

	//});
	
	});

    </script>	
	
	<!-- =========================================================================  -->