<?php 
		//if a request to edit is made
		if(isset($_REQUEST['subjectId'])){
		$sql="select * from $db_name.subject WHERE subject_id=".$_REQUEST['subjectId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no student edit request is made //or if there are no student with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">View Subject failed</h3>
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
              <!-- Default box -->
                <div class="box box-solid box-success">         
                    <div class="box-header with-border bg-green-gradient">
                        <h3 class="box-title"><?php echo ucwords(strtolower($row['subject_name'])); ?></h3>
                    </div>
                    <div class="box-body">
                         <strong> <?php echo $row['code']; ?> <?php echo ucwords(strtolower($row['subject_name'])); ?></strong> is a subject offerd at: <?php echo $row['level']; ?> Level. 

									<?php 
									
									if ($row['level']=='A'){ ?>
                                    <br />
                                    <br />
                                    <div class="col-md-12">
                                      <div class="box box-default">
                                        <div class="box-header with-border">
                                          <h3 class="box-title">Prerequisites</h3>
                                        
                                                <div class="box-tools pull-right">
                                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div><!-- /.box-tools -->
                                        </div><!-- /.box-header -->
                                        <div class="box-body">
                                <?php
                                    $current_id=$row['subject_id']; 
                                      $sql4="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id";
                                      $result4 = mysqli_query($con,$sql4) or die ('querry failed');
                                      if(!$result4){echo "Failed to select all o level prerequisites for this subject";}
									  elseif(mysqli_num_rows($result4)<=0){ echo "None"; }
									  else{ ?>
                                      <p><?php printf($row['subject_name']); ?> is recommended for students who have performed well in any of the following O-Level Subject(s):</p>
                                      
                                           <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Related O level Subject</th>
                                                        <th>Maximum Aggregate</th>
                                                        <th></th>
                                                    </tr>
                                               </thead>
                                           		<tbody>
                                           
											<?php 
									  
                                      		while($row4 = mysqli_fetch_array($result4)){
                                      		?>
                                                	<tr>
                                                        <td>
                                                	<?php printf($row4['subject_name']); 
                                                        if($row4['type']>0) { ?>
                                                        <small  class="label bg-yellow" title="<?php echo $row4['subject_name']; ?> is required">required</small>
                                                        <?php }
                                                        if($row4['type']==2) { ?>
                                                        <small  class="label bg-green" title="<?php echo $row4['subject_name']; ?> is required">*</small>
                                                        <?php } ?>
                                                     	</td>
                                                     	<td><?php printf($row4['aggregate_id']); ?></td>
                                           			 	<td><i class="fa fa-times-circle"></i></td>
                                                	</tr>
                                        
											   	<?php } // cose while ?>
                                              	</tbody>
                                             </table>
                                          
                                 		<?php } //close else ?>
                                        
                                        
										<br />

                                              <button class="btn btn-default pull-right" id="add_prerequisites" name="add_prerequisites" data-toggle="modal" data-target="#myModal">Add Prerequisites <i class="fa fa-arrow-circle-right"></i></button>
                                              
                                              
                                             
                                             
                                             
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal"  role="dialog">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
<form name="register_prerequisites" id="register_prerequisites" class="register_prerequisites" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                        <h4 class="modal-title">Add Prerequisites to <?php echo ucwords(strtolower($row['subject_name'])); ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                          <?php
                                                          $current_id=$row['subject_id']; 
                                                          //$sq8="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id";
														  $sql8="select * from $db_name.subject WHERE level ='O'";
														  
                                                          $result8 = mysqli_query($con,$sql8) or die ('querry failed');
                                                          if(!$result8){echo "Failed to select all o level subject";
														  }
                                                          elseif(mysqli_num_rows($result8)<=0){ echo "There are no o level subjects"; 
														  }
                                                          else{ ?>
                                                          <div class="row">
                                                          
                                                            <!-- select -->
                                                            <div class="form-group col-lg-12 col-md-12">					
                                                             <label for="student_role">Related O level Subject </label>
                                                             <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                                              <select class="form-control" id="subject_id" name="subject_id">
                                                                <option value="">Please Select</option>
                                                                <?php while($row8 = mysqli_fetch_array($result8)){ 
																//*****************************************************
																$sql_2="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id";
                                                          		$result_2 = mysqli_query($con,$sql_2); // or die ('querry failed');
																  if(!$result_2){ //echo "Failed to select all o level subject in prerequisites";
																  ?> 
																   <option value="<?php printf($row8['subject_id']); ?>"><?php printf($row8['subject_name']); ?></option>
																<?php
																  }
																  elseif(mysqli_num_rows($result_2)<=0){ //echo "There are no o level subjects";  
																  ?> 
																   <option value="<?php printf($row8['subject_id']); ?>"><?php printf($row8['subject_name']); ?></option>
																<?php
																  }
																  else{ // CHECK TO AVOID DUPLICATES
																  while($row_2 = mysqli_fetch_array($result_2)){
																  
																  	if($row_2['o_level_subject_id']==$row8['subject_id']){ //if curent olevel subject is in already prequisites

																?>
                                                                <option value="<?php printf($row8['subject_id']); ?>" disabled="disabled"><?php printf($row8['subject_name']); ?></option>
                                                                <?php 	$exists=true;
																		break;
																		} //close if curent olevel subject id is already in prequisites
																
																	
																
																		} //CLOSE WHILE
																		
																		 ?>
                                                                    <?php    //close else
																
																	}//close else
																	
																	if(!(isset($exists) && $exists==true)){
																?>
                                                                
                                                            	<option value="<?php printf($row8['subject_id']); ?>"><?php printf($row8['subject_name']); ?></option>
																    
																<?php
																$exists=false;
																}
																
                                                                //*********************************************************
																} //while there are o level subjects
                                                                ?>
                                                               </select>
                                                              </div>
                                                            </div>

                                                            <!-- select -->
                                                           <div class="form-group col-lg-6 col-md-6">
                                                              <label for="type">Requirement Type</label>
                                                              <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                                              <select class="form-control" id="type" name="type">
                                                                <option value="">Please Select</option>
                                                                <option value="1">Required</option>
                                                                <option value="2">One Of Required</option>
                                                                <option value="0">Desirable</option>
                                                            </select>
                                                              </div>
                                                            </div>
                                                            
                                                            <!-- select -->
                                                            <div class="form-group col-lg-6 col-md-6">					
                                                             <label for="aggregate_id">Maximum Aggregate</label>
                                                             <div class="input-group">
                                                             <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                                              <select class="form-control" id="aggregate_id" name="aggregate_id">
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
                                                    <button type="submit" class="btn btn-default" name="add_new_prerequisites" id="add_new_prerequisites">Submit <i class="fa fa-arrow-circle-right"></i></button>
                                                    <button class="btn btn-default clearForm" type="reset">Reset</button>
							
                                                      </div>
			 										</form>
                                                    </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                                </div>
                                             
                                             

                                        
                                        
                                        
									  </div> <!-- /.box-body -->
									</div><!-- /.box-body -->
								  </div><!-- /.col -->
                                 <?php   
                                }   //close if ($row['level']=='A'){
								
								?>                      
                        
                        
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
    $('#register_prerequisites').bootstrapValidator({
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
	$('#register_prerequisites').on('click', "button[type='reset']",  function() {
	$('#register_prerequisites').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>