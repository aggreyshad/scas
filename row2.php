<?php 
//$sql="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id"; // joins three tabless
$sql="select * from $db_name.combination ORDER BY $db_name.combination.combination_id DESC  limit 5";
$result = mysqli_query($con,$sql);	
		//if there are no combinations
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-list"></i> Recent Combinations</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no Combinations registered!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no combinations
		
		else{ //shows combinations in the db ?>
		
		<div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6">
              <div class="box box-solid box-success">
                <div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title"><i class="fa fa-list"></i>  Recent Combinations</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
						<th>Combination Name</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php echo strtoupper($row['combination_name']); ?></td>
						<?php
						$current_id=$row['combination_id'];
						$sql3="select * from $db_name.subject, $db_name.combination, $db_name.subjectcombination WHERE $db_name.subject.subject_id=$db_name.subjectcombination.subject_id AND $db_name.combination.combination_id=$db_name.subjectcombination.combination_id AND $db_name.combination.combination_id=$current_id";
						$result3 = mysqli_query($con,$sql3) or die ('querry failed');
						while($row3 = mysqli_fetch_array($result3)){?>
                        <td><?php printf($row3['subject_short_name']); ?></td>
                        <?php } // while($row3 ?>
                        <th><a href="view_combination_details.php?combinationId=<?php echo $row['combination_id']; ?>" title="Details about - <?php echo $row['combination_name']; ?>"><i class="fa fa-eye" style="color:#33CC66;"></i> View</a>  
						<a href="?prerequisite=<?php echo $row['combination_id']; ?>"><i class="fa fa-edit" style="color:#33CC66;"></i> Edit</a></th>
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
						<th>Combination Name</th>
                        <th>Subject 1</th>
                        <th>Subject 2</th>
                        <th>Subject 3</th>
                        <th>Details</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the combinations in db ?>