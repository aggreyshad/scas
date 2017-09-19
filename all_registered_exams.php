<?php $sql="select * from $db_name.exams"; $result = mysqli_query($con,$sql);	
		//if there are no exams
		if(mysqli_num_rows($result)<=0){ ?>
		
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Viewing All Exams</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				There are no exams registered!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no exams
		
		else{ //shows exams in the db ?>
		
		<div class="row">
            <div class="col-xs-12 col-md-12 col-lg-11">
              <div class="box box-solid box-success">
                <div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title">Viewing all exams</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">		
				
                  <table id="example2" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Exam Name</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
                      <tr>
                        <td><?php printf('%02d', $row['exam_id']); ?></td>
                        <td><?php echo strtoupper($row['exam_name']); ?></td>
                      </tr>
					  <?php }//close while ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Exam Name</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
		
		<?php }//close showing the exams in db ?><?