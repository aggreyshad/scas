
<!-- ==================== modal ================================= -->
                  <!-- Modal -->
                                                <div class="modal fade" id="myModal<?php echo $_REQUEST['student_id']; ?>"  role="dialog">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <?php include "add_mark_process.php"; 
													
													$sql2="select * from $db_name.student, $db_name.class where $db_name.student.class_id=$db_name.class.class_id AND $db_name.student.student_id=".$_REQUEST['student_id']; $result2 = mysqli_query($con,$sql2);
													$row2 = mysqli_fetch_array($result2);
													?>
<form name="register_mark" id="register_mark" class="register_mark" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >


                                                      <div class="modal-header bg-green">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                        <h4 class="modal-title">Add UCE Results for <?php echo ucwords(strtolower($row2['student_surname']." ".$row2['student_othernames'])); ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                       
                                                      
                                                      
                                                      
                                                          <?php
                                                          $current_id=$_REQUEST['student_id']; 
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
															<input type="hidden" name="student_id" id="student_id" value="<?php echo $_REQUEST['student_id']; ?>" />
                                                          	<!-- get user id and pass it as a value in hidden field -->		  	
															<input type="hidden" name="class_id" id="class_id" value="<?php echo $_REQUEST['class_id']; ?>" />
                                                          
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
                                                
                                                