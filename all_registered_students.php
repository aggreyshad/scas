<?php $sql="select * from $db_name.student, $db_name.class where $db_name.student.class_id=$db_name.class.class_id"; $result = mysqli_query($con,$sql);	
		//if there are no users
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Students</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no students registered!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no users
		
		else{ //shows users in the db ?>
		
		<div class="row">
            <div class="col-xs-12 col-md-12 col-lg-11">
              <div class="box box-solid box-success">
                <div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title">Viewing all Students</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
						<th>Photo</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Class</th>
                        <th>Stream</th>
                        <th>Level</th>
                        <th>Combination</th>
                        <th>Email</th>
                        <th>Modify</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php printf('%02d', $row['student_id']); ?></td>
						<td><?php 
							$image=$row['student_id'];
							$imageAndPath = glob ("uploads/student_image/$image.*");							
							if(sizeof($imageAndPath)==0){ //if user image not there, show default icon ?>								
								<img src="<?php echo "uploads/user.jpg"; ?>" class="direct-chat-img" style="width:30px; height:30px" />
								<?php 
								}
							else { //else show image of user
									//image is stored in directory uploads/teacher_image
									foreach($imageAndPath as $image2show){
										if (file_exists($image2show)) { //check if user has image uploaded ?>
										<img src="<?php echo "$image2show"; ?>" class="direct-chat-img" style="width:30px; height:30px" />
										  <?php 
										} //else 
									}//close foreach
								}//close else
							?>
						</td>
                        <td><?php echo ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?></td>
                        <td><?php echo $row['sex']=='M' ? 'Male' : 'Female'; ?></td>
                        <td><?php echo ucwords(strtolower($row['name'])); ?></td>
                        <td><?php echo ucwords(strtolower($row['stream'])); ?></td>
                        <td><?php echo $row['level']=='A' ? 'Advanced' : 'Ordinary'; ?></td>
                        <td><?php if($row['class_id'] >= 4) { ?>
                        
                        <?php if($row['combination_id']!=0 && $row['combination_id']!="" ) {
						
							$sql2="select * from $db_name.combination"; $result2 = mysqli_query($con,$sql2);
							if(mysqli_num_rows($result2)>0){
								while($row2 = mysqli_fetch_array($result2)){						
									if ($row2['combination_id']==$row['combination_id']){ echo $row2['combination_name'];  }
									} ///close while
								} //close if
						
						} else{ ?> <a href="get_combination.php?studentId=<?php echo $row['student_id']; ?>"> Get Combination<i class="fa fa-list" style="color:#FF3333"></i></a><?php } ?>
                        <?php }?></td>
                        <td><?php echo strtolower($row['student_email']); ?></td>
                        <td><a href="edit_student.php?studentId=<?php echo $row['student_id']; ?>"><i class="fa fa-edit" style="color:#33CC66;"></i></a> 
						<a href="?id=<?php echo $row['student_id']; ?>"><i class="fa fa-trash-o" style="color:red;"></i></a> 
                        <?php if($row['class_id'] >= 4) { ?>
                        <button class="btn btn-xs" id="add_mark" name="add_mark" data-toggle="modal" data-target="#myModal<?php echo $row['student_id']; ?>"><i class="fa fa-bar-chart-o" style="color: #3366CC;"></i></button></a>
                        <?php }?>
                        </td>
                      </tr>
                      
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
                      
                      
                      
                      
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
						<th>Photo</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Class</th>
                        <th>Stream</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>Modify</th>
                      </tr>
                    </tfoot>
                  </table>
                  
                                                
                  
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the users in db ?>
		
		 <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_mark').bootstrapValidator({
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
			aggregate_id: {
                message: 'The Maximum Id is required',
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
	$('#register_mark').on('click', "button[type='reset']",  function() {
	$('#register_mark').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>
		
		<?