            <br />
			<br />
			<div class="col-md-6">
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
            
            
            
            
            
            
            
            
            <div class="col-md-6">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Possible Degrees</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                The combination <b><?php echo $row['combination_name']; ?></b> allows you to do the following courses at university:
                
                <?php
		//if a request to view combination's related course
		if(isset($_REQUEST['combinationId'])){
		
		$sql2="select *  from $db_name.course"; 
		$result2 = mysqli_query($con,$sql2);	
		//if there are no course
		if(mysqli_num_rows($result2)<=0){ ?>
		
                  <h3 class="">Viewing All Course</h3>
				There are no Course registered!
		<?php }//close if there are no courses
		
		else{ //shows courses in the db ?>
		
				
			<?php while($row2 = mysqli_fetch_array($result2)){ // while there are courses in db
			$current_id2=$row2['course_id']; 
			$sql4="select * from $db_name.subject, $db_name.course, $db_name.coursesubject WHERE $db_name.coursesubject.subject_id=$db_name.subject.subject_id AND $db_name.coursesubject.course_id=$db_name.course.course_id AND $db_name.coursesubject.course_id=$current_id2"; //select all subjects related to current course // got from university weighing system
			$result4 = mysqli_query($con,$sql4) or die ('querry failed');
            if(!$result4){echo "Failed to select all A level REQUIREMENTS for this COURSE";}
			elseif(mysqli_num_rows($result4)<=0){ echo ""; }
			else{ // a course has related A level subjects
				$ctr=0;
				 while($row4 = mysqli_fetch_array($result4)){ //while a course has related A level subjects

		
				//******************************* Subjects releted to combination
				//*****************************************************************************************************
				$sql="select * from $db_name.subject, $db_name.category, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.category_id=$db_name.category.category_id AND level='A' AND $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=".$_REQUEST['combinationId']; // select the subjects realted to currently chosen combination
				$result = mysqli_query($con,$sql);	
				
				//if there are no SUBJECTS related to currenyly chosen combinaation
				if(mysqli_num_rows($result)<=0){ ?>
				
						  <h3 class="">Viewing All Subjects</h3>
						There are no Subjects related to currenyly chosen combinaation!
				<?php }//close if there are no users
				
				else{ //shows Subjects related to currently chosen combinaation
				
				
				 ?>
				
							<?php while($row = mysqli_fetch_array($result)){ // there are subjects related to currenlty chosen combination 
							
							if($row4['subject_id']==$row['subject_id']) {
							$ctr+=1; // count the number of related coursessubjects to combination subjects // total should be 3
							}
							?>
							                              
							  <?php }//close while there are subjects related to currenlty chosen combination ?>
				
		<?php }//close else { //shows Subjects related to currenyly chosen combination 
		// ******************************************************************************************
		
		} // close while($row4 = mysqli_fetch_array($result4)){ //while a course has related A level subjects
		
		} // close else { // a course has related A level subjects
		
		// **************** related course
		
		
		if(isset($ctr) && $ctr >= 3){
		//echo $ctr;
		?> 
        <div class="course Item" id="<?php echo $row2['course_id']; ?>" title="Course: <?php echo $row2['course_name']; ?>" onclick="clicked_course(this);" page="course_choice_details.php?courseId=<?php echo $row2['course_id']; ?>" >
        <input name="id" value="<?php echo $row2['course_id']; ?>" type="hidden">
        <input name="name" value="<?php echo $row2['course_name']; ?>" type="hidden">
                          
        <div class="Inner">                                                                          
        <p><b><?php echo ucwords(strtolower($row2['course_name'])); ?></b></p>                                      
        <a title="Click here for more information.">i</a>
        </div> <!-- /.Item -->
                          
        </div> <!-- /.Inner -->
        <hr/>
        
        <?php
		unset($ctr);
		  // take back counter to zero
		} // close if
		  // close related course
		
		} // close while there are courses in db
		
		} // close else{ //shows courses in the db 
		
		} // close if(isset($_REQUEST['combinationId'])){
		?>
                
                
                
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
            
            
            
            <div class="col-md-6">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Possible Careers</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                Possible Careers from the  combination <b><?php echo $row['combination_name']; ?></b> are:
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
            
            
            
            
                
