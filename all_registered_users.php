<?php $sql="select * from $db_name.users"; $result = mysqli_query($con,$sql);	
		//if there are no users
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no users registered!
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
                  <h3 class="box-title">Viewing all users</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
						<th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Modify</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php printf('%02d', $row['user_id']); ?></td>
						<td><?php 
							$image=$row['user_id'];
							$imageAndPath = glob ("uploads/user_image/$image.*");							
							if(sizeof($imageAndPath)==0){ //if user image not there, show default icon ?>								
								<img src="<?php echo "uploads/user.jpg"; ?>" class="direct-chat-img" style="width:30px; height:30px" />
								<?php 
								}
							else { //else show image of user
									//image is stored in directory uploads/teacher_image
									foreach($imageAndPath as $image2show){
										if (file_exists($image2show)) { //check if user has image uploaded ?>
										<img src="<?php echo "$image2show"; ?>" class="direct-chat-img" style="width:30px; height:30px" />
										  <?php 
										} //else 
									}//close foreach
								}//close else
							?>
						</td>
                        <td><?php echo ucwords(strtolower($row['full_name'])); ?></td>
                        <td><?php echo strtolower($row['user_email']); ?></td>
                        <td><?php echo $row['user_role']==0 ? 'Admin' : 'Teacher'; ?></td>
                        <td><a href="edit_user.php?userId=<?php echo $row['user_id']; ?>"><i class="fa fa-edit" style="color:#33CC66;"></i></a> 
						<a href="?id=<?php echo $row['user_id']; ?>"><i class="fa fa-trash-o" style="color:red;"></i></a></td>
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Modify</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the users in db ?><?