<?php $sql="select * from $db_name.course"; $result = mysqli_query($con,$sql);	
		//if there are no courses
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Courses</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no courses registered!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no courses
		
		else{ //shows courses in the db ?>
		
		<div class="row">
            <div class="col-xs-12 col-md-12 col-lg-11">
              <div class="box box-solid box-success">
                <div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title">Viewing all Courses</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <!-- <th>Type</th> -->
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php printf('%01d', $row['course_id']); ?></td>
                        <!-- <td><?php //echo $row['course_name']."";?></td> -->
                        <td><?php 
						if($row['course_type']=='Bachelor of') { $course_type='B.';}
						elseif($row['course_type']=='Bachelor of Arts in') { $course_type='B.A.';}
						elseif($row['course_type']=='Bachelor of Science in') { $course_type='B.SC';}
						elseif($row['course_type']=='Diploma in') { $course_type='DIP. in';}
						elseif($row['course_type']=='Certification') { $course_type='';}
						else{ $course_type=$row['course_type'];} 
						//echo $course_type." ";
						//echo ($row['course_type']!='Certification') ? substr($row['course_type'], 0, -2) : $row['course_type'];
						echo $row['course_type']." ". $row['course_name'];
						// substr($row['course_type'], 0, -2);
						 ?></td>
                        <th><a href="view_course_details.php?courseId=<?php echo $row['course_id']; ?>"><i class="fa fa-edit" style="color:#33CC66;"></i> </a> <a href="?id=<?php echo $row['course_id']; ?>"><i class="fa fa-trash-o" style="color:red;"></i></a></th>
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <!-- <th>Type</th> -->
                        <th>Details</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the courses in db ?><?