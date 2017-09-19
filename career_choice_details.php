<?php

		include_once "dbconfig.php"; 
		//if a request to view is made
		if(isset($_REQUEST['careerId'])){
		$sql="select * from $db_name.career WHERE career_id=".$_REQUEST['careerId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no career edit request is made //or if there are no career with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		
                  <h3>View Career failed</h3>
				Viewing Career failed!

		<?php }//close if there are no careers
		
		else{ // there are carees 
		$row = mysqli_fetch_array($result);
		
		
		?>
        	<div>
               <div class="box ">
                <div class="box-header bg-orange with-border">
                        <h3 class="box-title  with-border"><i class="fa fa-briefcase"></i> <?php echo ($row['career_name']); ?></h3>
                </div>
                <div class="box-body">
                        <span class="smaller"><?php echo ($row['career_details']); ?></span>
               </div> <!-- /.box-body -->
              </div>
           </div>
             
                        
                        
		<?php }//close showing the users being edited ?>