<div class="row">
            <div class="col-lg-3 col-xs-6">
			<?php $sql="select * from $db_name.subject"; $result = mysqli_query($con,$sql);?>
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 class="Count"><?php echo mysqli_num_rows($result); ?></h3>
                  <p>Subjects</p>
                </div>
                <div class="icon">
                  <!--<i class="ion ion-bag"></i>-->
				  <i class="ion ion-compose"></i>
                </div>
                <a href="view_subjects.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
			
			<?php $sql="select * from $db_name.combination"; $result = mysqli_query($con,$sql);?>
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3 class="Count"><?php echo mysqli_num_rows($result); ?><sup style="font-size: 20px"></sup></h3>
                  <p>Combinations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-filing"></i>
				  
                </div>
                <a href="view_combinations.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
			
			<?php $sql="select * from $db_name.users"; $result = mysqli_query($con,$sql);?>
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">				
				
                  <h3 class="Count" ><?php echo mysqli_num_rows($result); ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="view_users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
				<?php $sql="select * from $db_name.student"; $result = mysqli_query($con,$sql);?>
                  <h3 class="Count"><?php echo mysqli_num_rows($result); ?></h3>
                  <p>Students</p>
                </div>
                <div class="icon">
                  <i class="ion ion-university"></i>
				 <!-- <i class="ion ion-pie-graph"></i>-->
                </div>
                <a href="view_students.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->