<?php $sql="select *  from $db_name.subject, $db_name.category where $db_name.subject.category_id=$db_name.category.category_id AND level='A'";
$sql="select *  from $db_name.career"; 
$result = mysqli_query($con,$sql);	
		//if there are no Careers
		if(mysqli_num_rows($result)<=0){ ?>
		
                  <h3 class="">Viewing All Careers</h3>
				There are no Careers registered!
		<?php }//close if there are no Careers
		
		else{ //shows Careers in the db ?>
		
				
					<?php 
					while($row1 = mysqli_fetch_array($result)){?>
                      <div class="career Item" id="<?php echo $row1['career_id']; ?>" title="Career: <?php echo $row1['career_name']; ?>" onclick="clicked(this);" page="career_choice_details.php?careerId=<?php echo $row1['career_id']; ?>" >
                          <input name="career_id" value="<?php echo $row1['career_id']; ?>" type="hidden">
                          <input name="career_name" value="<?php echo $row1['career_name']; ?>" type="hidden">
                          
                          <div class="Inner">                                                                          
                                <h4><b><?php echo ucwords(strtolower($row1['career_name'])); ?></b></h4>                                      
                                <a title="Click here for more information.">i</a>
                          </div> <!-- /.Item -->
                          
                      </div> <!-- /.Inner -->
                      <hr/>
                      
					  <?php }//close while ?>
		
		<?php }//close showing the Careers in db ?>