            <br />
			<br />
			<div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Prerequisites</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
					<?php $result3 = mysqli_query($con,$sql3) or die ('querry failed');
                      while($row3 = mysqli_fetch_array($result3)){?>
                    <div class="panel box box-default box-solid">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#<?php printf($row3['code']); ?>">
                           <?php printf($row3['subject_name']); ?>
                          </a>
                        </h4>
                      </div>
                      <div style="height: 0px;" aria-expanded="false" id="<?php printf($row3['code']); ?>" class="panel-collapse collapse">
                        <div class="box-body">
                          <?php printf($row3['subject_name']); ?> is recommended for students who have performed well in the following O-Level Subject(s):
                          <ul>
                          <?php 
						  $current_id=$row3['subject_id'];
						  $sql4="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id";
						  $result4 = mysqli_query($con,$sql4) or die ('querry failed');
						  if(!$result4){echo "Failed to select all o level prerequisites for this subject";}
						  while($row4 = mysqli_fetch_array($result4)){
						  ?>
                          	<li>
							<?php printf($row4['subject_name']); 
									if($row4['type']>0) { ?>
									<small  class="label bg-yellow" title="<?php echo $row4['subject_name']; ?> is required">required</small>
                            		<?php }
                                    if($row4['type']==2) { ?>
									<small  class="label bg-green" title="<?php echo $row4['subject_name']; ?> is required">*</small>
                            		<?php } ?>
							</li>
                            
						  <?php }?>
                          </ul>
                          
                          
                        </div>
                      </div>
                    </div>
					<?php }?>
                    
                  </div> <!-- /.box-group -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
            
            
            
            
            
            
            
            
            <div class="col-md-6">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Possible Degrees</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                The combination <b><?php echo $row['combination_name']; ?></b> allows you to do the following courses at university:
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
            
            
            
            <div class="col-md-6">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Possible Careers</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                Possible Careers from the  combination <b><?php echo $row['combination_name']; ?></b> are:
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
            
            
            
            <div class="col-md-6">
              <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Salary Scales</h3>
                
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div><!-- /.box-tools -->
				</div><!-- /.box-header -->
                <div class="box-body">
                Salary Scales for careers arising out of combination <b><?php echo $row['combination_name']; ?></b>:
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
                
