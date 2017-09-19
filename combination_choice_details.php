<?php

		include_once "dbconfig.php"; 
		//if a request to view is made
		if(isset($_REQUEST['combinationId'])){
		$sql="select * from $db_name.combination WHERE combination_Id=".$_REQUEST['combinationId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no student edit request is made //or if there are no student with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		
                  <h3>View Combination failed</h3>
				Sorry! If you arrived at this page by mistake, contact the administrator!

		<?php }//close if there are no students
		
		else{ //shows student to be editted 
		$row = mysqli_fetch_array($result);
		
		
		?>
               <div class="box ">
                <div class="box-header bg-maroon with-border">
                        <h3 class="box-title  with-border"><i class="fa fa-list"></i> <?php echo strtoupper($row['combination_name']); ?></h3>
                </div>
                <div class="box-body">
                        The Combination <strong><?php echo strtoupper($row['combination_name']); ?></strong> is made up of 3 subjects: 
                        
									<?php 
                                    $current_id=$row['combination_id'];
                                    $sql3="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=$current_id";
                                    $result3 = mysqli_query($con,$sql3) or die ('querry failed');
                                    
                                    while($row3 = mysqli_fetch_array($result3)){?> 
                                    <strong>- <?php printf($row3['subject_name']); ?> </strong>
                                    <?php } // while($row3 ?>
                                    
                     				<?php //include 'prerequisites.php'; ?>
               </div> <!-- /.box-body -->
            </div>
            
            <div class="">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Prerequisites</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
					<?php $result3 = mysqli_query($con,$sql3) or die ('querry failed');
                      while($row3 = mysqli_fetch_array($result3)){?>
                    <div class="panel box box-default box-solid">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#<?php printf($row3['code']); ?>">
                           <?php printf($row3['subject_name']); ?>
                          </a>
                        </h4>
                      </div>
                      <div style="height: 0px;" aria-expanded="false" id="<?php printf($row3['code']); ?>" class="panel-collapse collapse">
                        <div class="box-body">
                          <?php printf($row3['subject_name']); ?> is recommended for students who have performed well in the following O-Level Subject(s):
                          <ul>
                          <?php 
						  $current_id=$row3['subject_id'];
						  $sql4="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id";
						  $result4 = mysqli_query($con,$sql4) or die ('querry failed');
						  if(!$result4){echo "Failed to select all o level prerequisites for this subject";}
						  while($row4 = mysqli_fetch_array($result4)){
						  ?>
                          	<li>
							<?php printf($row4['subject_name']); 
									if($row4['type']>0) { ?>
									<small  class="label bg-yellow" title="<?php echo $row4['subject_name']; ?> is required">required</small>
                            		<?php }
                                    if($row4['type']==2) { ?>
									<small  class="label bg-green" title="<?php echo $row4['subject_name']; ?> is required">*</small>
                            		<?php } ?>
							</li>
                            
						  <?php }?>
                          </ul>
                          
                          
                        </div>
                      </div>
                    </div>
					<?php }?>
                    
                  </div> <!-- /.box-group -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
                           
                        
                        
		<?php }//close showing the users being edited ?>