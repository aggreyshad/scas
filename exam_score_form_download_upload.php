<?php
//on submission of new user
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				
				$exam_id=$_POST['exam_id'];
				$year_of_exam=$_POST['year_of_exam'];
				$term=$_POST['term'];
				
				$class_id_4=$_POST['class_id_4'];
				$class_id_6=$_POST['class_id_6'];
				$class_id_all=$_POST['class_id'];
				
				if($class_id_4 != '' ){$class_id=$class_id_4;}
				elseif($class_id_6 != ''){$class_id=$class_id_6;}
				elseif($class_id_all != ''){$class_id=$class_id_all;} // get class id from any of the three variables

				$subject_id_o=$_POST['subject_id_o'];
				$subject_id_a=$_POST['subject_id_a'];
				$subject_id = ($subject_id_o != '') ? $subject_id_o : $subject_id_a; //assign either subject_id_o or alevel id
				
				//$student_id=$_POST['student_id'];
				
				//$sql="select *  from $db_name.marks WHERE $db_name.marks.exam_id=$exam_id AND $db_name.marks.year='$year_of_exam' AND $db_name.marks.term=$term AND $db_name.marks.class_id=$class_id AND $db_name.marks.subject_id=$subject_id AND $db_name.marks.student_id=$student_id"; //CHECK TO  SEE THAT MARK DOESNOT EXIST ALREADY EXIST
				//$result = mysqli_query($con,$sql);
					
					//if(mysqli_num_rows($result)>=1){
					//$message="Failed! A Subject with code: $code already exists"; //Do not insert duplicates
					//}//if(mysqli_num_rows	
					
					//else{ //ok to insert
						//$sql="INSERT INTO $db_name.subject (subject_name, subject_short_name, level, category_id, code) 	VALUES('$subject_name','$subject_short_name','$level','$category_id','$code')";
						//$result_of_adding = mysqli_query($con,$sql);
							
						//error message in case update fails
						//if(!$result_of_adding){ 				
							//$message="Failed to add new subject!";}
						//else{
							//$message="Successful";}
					//}// CLOSE elseok to insert
				include ("ExportExcel/ExportToExcel.php");
				if($exam_id==4 || $exam_id==5){Export_UNEB_Marksheet_Excel($class_id, $exam_id, $subject_id); } //marksheet for UNEB
				else { ExportMarksheetExcel($class_id, $exam_id, $subject_id);} // Mark sheet for other exams

				//header("location: insert_marks_imported.php?examId=$exam_id&classId=$class_id&subjectId=$subject_id");
				
		}//if(isset($_POST['submit']))	
?>

 <div class="row">
		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
            <?php echo  "<div class=\"callout callout-info\" >".	
			"<i class=\"fa fa-download\"></i> Mark Sheet is ready. You can <a href='$filename'>download it from here</a>, fill marks in and re-upload it when complete.</div>"; ?>
			</div> 
		<?php }
		
		else{ //failed to add new combination ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
			<?php  echo $message;?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="manage_exam_score" id="manage_exam_score" class="manage_exam_score" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Manage Exam Scores</h3> 
            </div>
            <div class="box-body">
				<div class="row">
                
                
                	<div class="form-group col-lg-3 col-md-3">			
					 <label for="exam_id">Select Exam</label>
					 		<div class="input-group">
					 		<div class="input-group-addon"><i class="fa fa-gears"></i></div>
                      		<select class="form-control" id="exam_id" name="exam_id" onchange="classCheck(this);">
					  			<option value="">Please Select</option>
								<?php 
						 		$sql="select * from $db_name.exams"; $result = mysqli_query($con,$sql);
						        if(mysqli_num_rows($result)>=1){ 
								//if there are exams
								while($row = mysqli_fetch_array($result)){
								?>
                        		<option value="<?php printf($row['exam_id']); ?>" <?php if(isset($_REQUEST['exam_id']) && $_REQUEST['exam_id']==$row['exam_id']) echo "selected=\"selected\""; ?>><?php echo($row['exam_name']); ?></option>
            					<?php }
								}?>
                     		</select>
					  		</div> 
                    	</div>
                        
                       <!-- Year of Exam --> 
                	<div class="form-group col-lg-3 col-md-3">			
                      <label for="year_of_exam">Year Of Exam</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" class="form-control" id="year_of_exam" name="year_of_exam" placeholder="Enter Year Of Exam" value="<?php if(isset($_REQUEST['year_of_exam']))echo $_REQUEST['year_of_exam']; ?>">
					  </div>
                    </div>
                    
                    <!-- Term  in which exam was done ie 1, 2 or 3. -->
                    <div class="form-group col-lg-3 col-md-3" id="select_term" style="display: <?php echo isset($_REQUEST['term'])? 'block' : 'none'; ?>;">
                      <label for="othername">Select Term</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					  <select class="form-control" id="term" name="term">
					  	<option value="" <?php if(isset($_REQUEST['term']) && $_REQUEST['term']=="") echo "selected=\"selected\""; ?>>Please Select</option>
						<option value="1" <?php if(isset($_REQUEST['term']) && $_REQUEST['term']==1) echo "selected=\"selected\""; ?>>Term I</option>
						<option value="2" <?php if(isset($_REQUEST['term']) && $_REQUEST['term']==2) echo "selected=\"selected\""; ?>>Term II</option>
						<option value="3" <?php if(isset($_REQUEST['term']) && $_REQUEST['term']==3) echo "selected=\"selected\""; ?>>Term III</option>
					</select>
					  </div>
                    </div>

                <!-- select only s4-->
                    <div class="form-group col-lg-3 col-md-3" id="class_4" style="display: <?php echo isset($_REQUEST['class_id_4'])? 'block' : 'none'; ?>;">					
					 <label for="class_id">Select Class</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="class_id_4" name="class_id_4" onchange="yesnoCheck(this);">
					  	<option value="">Please Select</option>
						<?php $sql="select * from $db_name.class WHERE name_numeric=4"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['class_id']); ?>" <?php if(isset($_REQUEST['class_id_4']) && $_REQUEST['class_id_4']==$row['class_id']) echo "selected=\"selected\""; ?>><?php printf($row['name']); ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div>
                
                <!-- select only s6-->
                    <div class="form-group col-lg-3 col-md-3" id="class_6" style="display: <?php echo isset($_REQUEST['class_id_6'])? 'block' : 'none'; ?>;">					
					 <label for="class_id">Select Class</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="class_id_6" name="class_id_6" onchange="yesnoCheck(this);">
					  	<option value="">Please Select</option>
						<?php $sql="select * from $db_name.class WHERE name_numeric=6"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['class_id']); ?>" <?php if(isset($_REQUEST['class_id_6']) && $_REQUEST['class_id_6']==$row['class_id']) echo "selected=\"selected\""; ?>><?php printf($row['name']); ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div>


                <!-- select All classes-->
                    <div class="form-group col-lg-3 col-md-3" id="all_classes" style="display: <?php echo isset($_REQUEST['class_id'])? 'block' : 'none'; ?>;">					
					 <label for="class_id">Select Class</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="class_id" name="class_id" onchange="yesnoCheck(this);">
					  	<option value="">Please Select</option>
						<?php $sql="select * from $db_name.class"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['class_id']); ?>" <?php if(isset($_REQUEST['class_id']) && $_REQUEST['class_id']==$row['class_id']) echo "selected=\"selected\""; ?>><?php printf($row['name']); ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div>
					
					
					
                    
                    
                    <!-- select O Level-->
                    <div class="form-group col-lg-3 col-md-3"  id="o_level" style="display: <?php echo isset($_REQUEST['subject_id_o'])? 'block' : 'none'; ?>;">					
					 <label for="subject_id">Select Subject</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="subject_id_o" name="subject_id_o" data-placeholder="Select a Subject"  >
					  	<option value="">Please Select</option>
					  	<option value="*">* All Subjects</option>
						<?php $sql="select * from $db_name.subject WHERE level='O'"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['subject_id']); ?>" <?php if(isset($_REQUEST['subject_id_o']) && $_REQUEST['subject_id_o']==$row['subject_id']) echo "selected=\"selected\""; ?>><?php echo $row['code']." - ". $row['subject_name']; ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div><!-- /.select -->
		
					<!-- select A Level-->
                    <div class="form-group col-lg-3 col-md-3"  id="a_level" style="display:<?php echo isset($_REQUEST['subject_id_a'])? 'block' : 'none'; ?>;">					
					 <label for="subject_id_a">Select Subject</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control" id="subject_id_a" name="subject_id_a" data-placeholder="Select a Subject" >
					  	<option value="">Please Select</option>
					  	<option value="*">* All Subjects</option>
						<?php $sql="select * from $db_name.subject WHERE level='A'"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['subject_id']); ?>" <?php if(isset($_REQUEST['subject_id_a']) && $_REQUEST['subject_id_a']==$row['subject_id']) echo "selected=\"selected\""; ?>><?php echo $row['code']." - ". $row['subject_name']; ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div><!-- /.select -->
                    
                    
                    
                    
                    
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Get Mark Sheet <i class="fa fa-arrow-circle-right"></i></button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         
         <!-- SHOW HIDE SUBJECT CATEGORY DEPEDING ON CHOSEN LEVEL ie o level or A level   -->
         <script>
		 
		 function classCheck(that){
				if (that.value <=3  && that.value >=1 ) {
				   // alert("check");
					document.getElementById("all_classes").style.display = "block";
					document.getElementById("o_level").style.display = "none";
					document.getElementById("a_level").style.display = "none";
					document.getElementById("select_term").style.display = "block";
				} else {
					document.getElementById("all_classes").style.display = "none";
					document.getElementById("o_level").style.display = "none";
					document.getElementById("a_level").style.display = "none";
					document.getElementById("select_term").style.display = "none";
				}
				if (that.value ==4) {
				   // alert("check");
					document.getElementById("class_4").style.display = "block";
					document.getElementById("o_level").style.display = "block";
					document.getElementById("a_level").style.display = "none";
					document.getElementById("select_term").style.display = "none";
				} else {
					document.getElementById("class_4").style.display = "none";
				}
				if (that.value ==5) {
					document.getElementById("class_6").style.display = "block";
					document.getElementById("a_level").style.display = "block";
					document.getElementById("o_level").style.display = "none";
					document.getElementById("select_term").style.display = "none";
				} else {
					document.getElementById("class_6").style.display = "none";
				}
			}
			
			function yesnoCheck(that) {
				if (that.value <=4  && that.value >=1) {
				   // alert("check");
					document.getElementById("o_level").style.display = "block";
				} else {
					document.getElementById("o_level").style.display = "none";
				}
				if (that.value >= 5) {
					document.getElementById("a_level").style.display = "block";
				} else {
					document.getElementById("a_level").style.display = "none";
				}
			}
			
			
		</script>
         
    <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#manage_exam_score').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			exam_id: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			year_of_exam: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 4,
						max: 4, 
						message: 'Invalid Year'
					},
					
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'This field can only consist of Numbers'
                    }
                }
            },
			term: {
                message: 'The field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
            class_id_4: {
                message: 'The field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			class_id_6: {
                message: 'The field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			class_id: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field cannot be empty'
                    }
                }
            },
			subject_id_o: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			subject_id_a: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	$('#manage_exam_score').on('click', "button[type='reset']",  function() {
	$('#manage_exam_score').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>