<?php $sql="select * from $db_name.career, $db_name.career_cat WHERE $db_name.career.career_cat_id=$db_name.career_cat.career_cat_id"; 
$result = mysqli_query($con,$sql);	
		//if there are no courses
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Career</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no careers registered!
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
                  <h3 class="box-title">Viewing all Careers</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Career Name</th>
                        <th>Career Category</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php printf('%01d', $row['career_id']); ?></td>
                        <td><?php echo $row['career_name']."";?></td>
                        <td><?php echo $row['career_cat_name']; ?></td>
                        <th><a href="view_career_details.php?careerId=<?php echo $row['career_id']; ?>"><i class="fa fa-edit" style="color:#33CC66;"></i> </a> <a href="?id=<?php echo $row['career_id']; ?>"><i class="fa fa-trash-o" style="color:red;"></i></a></th>
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Career Category</th>
                        <th>Details</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the courses in db ?><?