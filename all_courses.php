<?php //$sql="select *  from $db_name.subject, $db_name.category where $db_name.subject.category_id=$db_name.category.category_id AND level='A'";
$sql="select *  from $db_name.course"; 
$result = mysqli_query($con,$sql);	
		//if there are no users
		if(mysqli_num_rows($result)<=0){ ?>
		
                  <h3 class="">Viewing All Course</h3>
				There are no Course registered!
		<?php }//close if there are no users
		
		else{ //shows users in the db ?>
		
				
					<?php while($row = mysqli_fetch_array($result)){?>
                    <div class="course Item" id="<?php echo $row['course_id']; ?>" title="Course: <?php echo $row['course_name']; ?>" onclick="clicked(this);" page="course_choice_details.php?courseId=<?php echo $row['course_id']; ?>">
                          <input name="id" value="<?php echo $row['course_id']; ?>" type="hidden">
                          <input name="name" value="<?php echo $row['course_name']; ?>" type="hidden">
                          
                          <div class="Inner">                                                                          
                                <h4><b><?php echo ucwords(strtolower($row['course_name'])); ?></b></h4>                                      
                                <a title="Click here for more information.">i</a>
                          </div> <!-- /.Item -->
                          
                      </div> <!-- /.Inner -->
                      <hr/>
					  <?php }//close while ?>
		
		<?php }//close showing the users in db ?>