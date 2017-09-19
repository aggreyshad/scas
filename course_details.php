<?php 
		//*****************************************************
		if(isset($_GET['delete'])) { // if there is a request to delete

		$sql="DELETE FROM $db_name.coursesubject WHERE coursesubject.coursesubject_id =".$_GET['delete'];
		$result_del = mysqli_query($con,$sql);
		
		
		//echo $_GET['delete'];
		if(!$result_del) { $del_msg= "Deleting related A - lEVEL subject failed"; }
		else $del_msg = "Deleted";
		}
		//*****************************************************


		//if a request to edit is made
		if(isset($_REQUEST['courseId'])){
		$sql="select * from $db_name.course WHERE course_id=".$_REQUEST['courseId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no student edit request is made //or if there are no student with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">View Course Details failed</h3>
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
            <?php if(isset($_REQUEST['message'])){ //if there is an alert
				$message=$_REQUEST['message'];
	
				if($message=="Successful"){ //positive alert ?>
				<div class="alert alert-warning alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
						Successfully added <b><?php echo (isset($_REQUEST['required']))? $_REQUEST['required'] : 'A - level subject'; ?></b> as a requirement for <b><?php echo $row['course_name']; ?></b>.
				</div> 
				<?php }
														
				else{ //failed to add new student ?>
				<div class="alert alert-danger alert-dismissable">
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
				<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
				</div>
				<?php }
														
				}?>
                
                <?php if(isset($del_msg)){ //if there is an alert
	
				if($del_msg=="Deleted"){ //positive alert ?>
				<div class="alert alert-warning alert-dismissable">
					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
						Successfully removed.
				</div> 
				<?php }
														
				else{ //failed to add new student ?>
				<div class="alert alert-danger alert-dismissable">
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
				<?php  echo $del_msg; ?>   
				</div>
				<?php }
														
				}?>
            		 
              <!-- Default box -->
                <div class="box box-solid box-success">         
                    <div class="box-header with-border bg-green-gradient">
                        <h3 class="box-title"><?php echo ucwords(strtolower($row['course_name'])); ?></h3>
                    </div>
                    <div class="box-body">
                         <strong> <?php echo $row['course_type']." ". $row['course_name']; ?></strong> is a course offered at University 

									<?php 
									
									 ?>
                                    
                                    <br />
                                    <br />
                                    <div class="col-md-12">
                                      <div class="box box-default">
                                        <div class="box-header with-border">
                                          <h3 class="box-title">Related A - Level Subjects</h3>
                                        
                                                <div class="box-tools pull-right">
                                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div><!-- /.box-tools -->
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                <?php
                                    $current_id=$row['course_id']; 
									$sql4="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$current_id";
                                      $result4 = mysqli_query($con,$sql4) or die ('querry failed');
                                      if(!$result4){echo "Failed to select all A level REQUIREMENTS for this COURSE";}
									  elseif(mysqli_num_rows($result4)<=0){ echo "None"; }
									  else{ ?>
                                      <p><?php printf($row['course_name']); ?> is related to the following A-Level Subject(s):</p>
                                      
                                           <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Related A level Subject</th>
                                                        <th>Type</th>
                                                        <th></th>
                                                    </tr>
                                               </thead>
                                           		<tbody>
                                           
											<?php 
									  
                                      		while($row4 = mysqli_fetch_array($result4)){
                                      		?>
                                                	<tr>
                                                     	<td><?php echo $row4['subject_name']; ?></td>
                                                        <td>
                                                		<?php   
                                                        if($row4['requirement_type']==1) { ?>
                                                        <small  class="label bg-yellow" title="<?php echo $row4['subject_name']; ?> is required">Essential</small>
                                                        <?php }
                                                        if($row4['requirement_type']==2) { ?>
                                                        <small  class="label bg-green" title="<?php echo $row4['subject_name']; ?> is required">Relevant</small>
                                                        <?php }
                                                        if($row4['requirement_type']==3) { ?>
                                                        <small  class="label bg-blue" title="<?php echo $row4['subject_name']; ?> is required">Desirable</small>
                                                        <?php }
                                                        if($row4['requirement_type']==4) { ?>
                                                        <small  class="label bg-red" title="<?php echo $row4['subject_name']; ?> is required">Others</small>
                                                        <?php }
                                                        if($row4['requirement_type']==5) { ?>
                                                        <small  class="label bg-black" title="<?php echo $row4['subject_name']; ?> is required">Essential &amp; Relevant</small>
                                                        <?php }
                                                        if($row4['requirement_type']==6) { ?>
                                                        <small  class="label bg-light-blue" title="<?php echo $row4['subject_name']; ?> is required">Essential, Relevant &amp; Desirable</small>
                                                        <?php } ?>
                                                     	</td>
                                           			 	<td><a class="delete" href="?courseId=<?php echo $row['course_id']; ?>&delete=<?php echo $row4['coursesubject_id']; ?>" id="delete" name="delete" onClick="return confirm('Are you sure you want to delete related A level Subject <?php echo $row4['subject_name']; ?>?');"><i class="fa fa-times-circle" style="color:#000;" ></i></a></td>
                                                	</tr>
                                        
											   	<?php } // cose while ?>
                                              	</tbody>
                                             </table>
                                          
                                 		<?php } //close else ?>
                                        
                                        
										<br />

                                              <button class="btn btn-default pull-right" id="add_rel_al_subject" name="add_rel_al_subject" data-toggle="modal" data-target="#myModal">Add Related A Level Subject <i class="fa fa-arrow-circle-right"></i></button>
                                              
                                              
                                             
                                             
                                             
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal"  role="dialog">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <?php include "add_rel_alevel_subject_process.php"; ?>
<form name="register_rel_alevel_subject" id="register_rel_alevel_subject" class="register_rel_alevel_subject" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >


                                                      <div class="modal-header bg-green">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                        <h4 class="modal-title"><?php echo $row['course_type']." ". $row['course_name']; ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                       
                                                      
                                                      
                                                      
                                                          <?php
                                                          $current_id=$row['course_id']; 
														  $sql8="select * from $db_name.subject WHERE level ='A'";
														  
                                                          $result8 = mysqli_query($con,$sql8) or die ('querry failed');
                                                          if(!$result8){echo "Failed to select all A level subject";
														  }
                                                          elseif(mysqli_num_rows($result8)<=0){ echo "There are no A level subjects"; 
														  }
                                                          else{ ?>
                                                          <div class="row">
                                                          
                                                          	<!-- get user id and pass it as a value in hidden field -->		  	
															<input type="hidden" name="courseId" id="courseId" value="<?php echo $row['course_id']; ?>" />

                                                          
                                                            <!-- select -->
                                                            <div class="form-group col-lg-12 col-md-12">					
                                                             <label for="subject_id">Related A level Subject </label>
                                                             <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                                              <select class="form-control select2" id="subject_id" name="subject_id" style="width:100%;">
                                                                <option value="">Please Select</option>
                                                                <?php while($row8 = mysqli_fetch_array($result8)){ 
																//*****************************************************
																//$sql_2="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id AND $db_name.subjectprerequisites.o_level_subject_id=".$row8['subject_id'];
																$sql_2="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$current_id AND $db_name.coursesubject.subject_id=".$row8['subject_id'];
                                                          		$result_2 = mysqli_query($con,$sql_2); // or die ('querry failed');
																 if(mysqli_num_rows($result_2)>=1){ //IF SUBJECT EXISTS 
																  ?> 
<!--																   <option value="<?php //printf($row8['subject_id']); ?>" disabled="disabled"><?php //printf($row8['subject_name']); ?></option>
-->																<?php
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
                                                           <div class="form-group col-lg-12 col-md-12">
                                                              <label for="type">Requirement Type</label>
                                                              <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-gears"></i></div>
                                                              <select class="form-control" id="type" name="type">
                                                                <option value="">Please Select</option>
                                                                <option value="1">Essential</option>
                                                                <option value="2">Relevant</option>
                                                                <option value="3">Desirable</option>
                                                                <option value="4">Others</option>
                                                                <option value="5">Essential &amp; Relevant</option>
                                                                <option value="6">Essential, Relevant &amp; Desirable</option>
                                                            </select>
                                                              </div>
                                                            </div>
                                                            
                                                           
                                                           
                                                           </div>
                                                           
                                                          <?php } //close else?>
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
<!--                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
-->																			
                                                    <button type="submit" class="btn btn-default" name="add_new_rel_alevel_subject" id="add_new_rel_alevel_subject">Submit <i class="fa fa-arrow-circle-right"></i></button>
                                                    <button class="btn btn-default clearForm" type="reset">Reset</button>
							
                                                      </div>
			 										</form>
                                                    </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                                </div>
                                             
                                             

                                        
                                        
                                        
									  </div> <!-- /.box-body -->
									</div><!-- /.box-body -->
								  </div><!-- /.col -->
                        
                    </div>
                </div><!-- /.Default box -->	
            </div><!--  <div class="col-lg-10 -->
        </div>
        <!-- /.row -->	 
		<?php }//close showing the students being edited ?>
		
        <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_rel_alevel_subject').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			subject_id: {
                message: 'A valid Subject Id is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			type: {
                message: 'A valid Subject Requirement type is required',
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
	$('#register_rel_alevel_subject').on('click', "button[type='reset']",  function() {
	$('#register_rel_alevel_subject').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>