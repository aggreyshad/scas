<?php $sql="select *  from $db_name.subject, $db_name.category where $db_name.subject.category_id=$db_name.category.category_id"; 
$result = mysqli_query($con,$sql);	
		//if there are no users
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Subjects</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no Subjects registered!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no users
		
		else{ //shows users in the db ?>
		
		<div class="row">
            <div class="col-xs-12 col-md-12 col-lg-11">
              <div class="box box-solid box-success">
                <div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title">Viewing all Subjects</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
						<th>Code</th>
                        <th>Subject Name</th>
                        <th>Level</th>
                        <th>Short Name</th>
                        <th>Category</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php printf('%02d', $row['subject_id']); ?></td>
						<td><?php echo $row['code'];?></td>
                        <td><?php echo ucwords(strtolower($row['subject_name'])); ?></td>
                        <td><?php echo ucwords(strtolower($row['level'])); ?></td>
                        <td><?php echo strtoupper($row['subject_short_name']); ?></td>
                        <td><?php echo ucwords(strtolower($row['category_name'])); ?></td>
                        <td><a href="view_subject_details.php?subjectId=<?php echo $row['subject_id']; ?>"><i class="fa fa-edit" style="color:#33CC66;"></i></a> 
						<a href="?id=<?php echo $row['subject_id']; ?>"><i class="fa fa-trash-o" style="color:red;"></i></a></td>
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
						<th>Code</th>
                        <th>Subject Name</th>
                        <th>Level</th>
                        <th>Short Name</th>
                        <th>Category</th>
                        <th>Details</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the users in db ?><?