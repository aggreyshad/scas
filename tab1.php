<?php 
//$sql="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id"; // joins three tabless
//$sql="select * from $db_name.marks WHERE $db_name.marks.exam_id=4 ORDER BY student_id";
$sql="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.marks.exam_id=4 GROUP BY $db_name.marks.student_id";  // exam_id 4 rep UCE
$result = mysqli_query($con,$sql);	
		//if there are no combinations
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Marks</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no Marks Recorded!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no combinations
		
		else{ //shows combinations in the db ?>
		
		<div class="row">
            <div class="col-xs-12 col-md-12 col-lg-11">
              <div class="box box-solid box-success">
                <div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title">Viewing all Marks</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th><?php //echo $row['exam_name']; ?></th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php $ctr=0;
					while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php echo ($ctr+=1); ?></td>
                        <td>
<!--                        <div align="center" class="bg-light-blue-gradient box-header"><?php //echo $row['year']." ". $row['exam_name']; ?></div>
-->                        <div class="pull-left">
                        <h4>
                        <?php //STUDENTS FACE
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

						<b><?php echo " &nbsp;".ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?></b></h4>
                        
                        </div>
                        <div class="pull-right"> <h4>
                        <?php printf('<b>Index No:</b> '.$center_no.'/%03d', $row['student_id']); ?></h4>
                        </div>
                        <?php
						$current_id=$row['student_id'];
						$sql3="select * from $db_name.marks, $db_name.student, $db_name.subject,  $db_name.exams, $db_name.class WHERE $db_name.marks.student_id=$db_name.student.student_id AND $db_name.marks.subject_id=$db_name.subject.subject_id AND $db_name.marks.exam_id=$db_name.exams.exam_id AND $db_name.marks.class_id=$db_name.class.class_id AND $db_name.student.student_id=$current_id"; 
						
						//select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.student.student_id=$current_id";
						$result3 = mysqli_query($con,$sql3) or die ('querry failed');
						?>
                        <table class="table table-bordered table-striped">
                          <tr>
                            <th>Subject</th>
                            <th>Aggregate</th>
                          </tr>
						<?php while($row3 = mysqli_fetch_array($result3)){?>
                          <tr>
                            <td><?php printf($row3['subject_name']); ?></td>
                            <td><?php printf($row3['aggregate_id']); ?></td>
                          </tr>
                        <?php } // while($row3 ?>
                        </table>
						
                        </td><!-- close td that has student results -->
                        <td><a href="?studentId=<?php echo $row['student_id']; ?>" title="Details about - <?php echo ucwords(strtolower($row['student_surname']." ".$row['student_othernames'])); ?>'s Performance"><i class="fa fa-eye" style="color:#33CC66;"></i> View</a>
                        </td>  
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Exam ID</th>
                        <th>Details</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the combinations in db ?>