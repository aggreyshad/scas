<?php $sql="select *  from $db_name.subject, $db_name.category where $db_name.subject.category_id=$db_name.category.category_id AND level='A'"; 
$result = mysqli_query($con,$sql);	
		//if there are no SUBJECTS
		if(mysqli_num_rows($result)<=0){ ?>
		
                  <h3 class="">Viewing All Subjects</h3>
				There are no Subjects registered!
		<?php }//close if there are no users
		
		else{ //shows users in the db ?>
		
				
					<?php while($row = mysqli_fetch_array($result)){?>
                    <div class="sub Item" id="<?php echo $row['subject_id']; ?>" title="Subject: <?php echo $row['subject_name']; ?>" onclick="clicked(this);" page="subject_choice_details.php?subjectId=<?php echo $row['subject_id']; ?>" >
                          <input name="subject_id" value="<?php echo $row['subject_id']; ?>" type="hidden">
                          <input name="subject_name" value="<?php echo $row['subject_name']; ?>" type="hidden">
                          
                          <div class="Inner">                                                                          
                                <h4><b><?php echo ucwords(strtolower($row['subject_name'])); ?></b></h4>                                      
                                <a title="Click here for more information.">i</a>
                          </div> <!-- /.Item -->
                          
                      </div> <!-- /.Inner -->
                      <hr/>
					  <?php }//close while ?>
		
		<?php }//close showing the users in db ?>