<?php 
		//if a request to edit is made
		if(isset($_REQUEST['combinationId'])){
		$sql="select * from $db_name.combination WHERE combination_Id=".$_REQUEST['combinationId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no student edit request is made //or if there are no student with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">View Combination failed</h3>
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
                        <h3 class="box-title"><?php echo strtoupper($row['combination_name']); ?></h3>
                    </div>
                    <div class="box-body">
                        The Combination <strong><?php echo strtoupper($row['combination_name']); ?></strong> is made up of 3 subjects, which are: 
                        
									<?php 
                                    $current_id=$row['combination_id'];
                                    $sql3="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=$current_id";
                                    $result3 = mysqli_query($con,$sql3) or die ('querry failed');
                                    
                                    while($row3 = mysqli_fetch_array($result3)){?> 
                                    <strong>- <?php printf($row3['subject_name']); ?> </strong>
                                    <?php } // while($row3 ?>
                                    
                     				<?php include 'prerequisites.php'; ?>                           
                        
                        
                    </div>
                </div><!-- /.Default box -->	
            </div><!--  <div class="col-lg-10 -->
        </div>
        <!-- /.row -->	 
		<?php }//close showing the users being edited ?>