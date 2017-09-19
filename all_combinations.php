<?php 
if(isset($_REQUEST['combinationId'])){ $ext = " WHERE  $db_name.combination.combination_id= " .$_REQUEST['combinationId'];} 
else{ $ext = "";}

$sql="select * from $db_name.combination $ext"; 
$result = mysqli_query($con,$sql);	
		//if there are no users
		if(mysqli_num_rows($result)<=0){ ?>
		
                  <h3 class="">Viewing All Combinations</h3>
				There are no Combinations registered!
		<?php }//close if there are no users
		
		else{ //shows users in the db ?>
		
				
					<?php 
					while($row1 = mysqli_fetch_array($result)){?>
                    
                      <div class="comb Item <?php echo ( isset($_REQUEST['combinationId']) && $_REQUEST['combinationId']== $row1['combination_id']) ? 'current_selection': 'not'; ?>" id="<?php echo $row1['combination_id']; ?>" title="Combination: <?php echo $row1['combination_name']; ?>" onclick="clicked(this);" page="combination_choice_details.php?combinationId=<?php echo $row1['combination_id']; ?>" page2="combination_choice_related_sub.php?combinationId=<?php echo $row1['combination_id']; ?>" page3="combination_choice_related_course.php?combinationId=<?php echo $row1['combination_id']; ?>" page4="combination_choice_related_career.php?combinationId=<?php echo $row1['combination_id']; ?>"  >
                          <input name="combination_id" value="<?php echo $row1['combination_id']; ?>" type="hidden">
                          <input name="combination_id" value="<?php echo $row1['combination_name']; ?>" type="hidden">
                          
                          <div class="Inner">                                                                          
                                <h4><b><?php echo $row1['combination_name']; ?> <?php if(isset($_REQUEST['combinationId']) && $_REQUEST['combinationId'] == $row1['combination_id']){$loadthis="true";?> <img src="uploads/user.jpg" onload="clicked_loaded(this);" style="visibility:hidden; width:1px; height:1px;" title="Combination: <?php echo $row1['combination_name']; ?>" onclick="clicked(this);" page="combination_choice_details.php?combinationId=<?php echo $row1['combination_id']; ?>" page2="combination_choice_related_sub.php?combinationId=<?php echo $row1['combination_id']; ?>" page3="combination_choice_related_course.php?combinationId=<?php echo $row1['combination_id']; ?>" page4="combination_choice_related_career.php?combinationId=<?php echo $row1['combination_id']; ?>" /> <?php } ?></b></h4>                                      
                                <a title="Click here for more information.">i</a>
                          </div> <!-- /. Inner-->
                          
                      </div> <!-- /.Item -->
                      
                      <hr/>
                      
					  <?php }//close while ?>
		
		<?php }//close showing the users in db ?>