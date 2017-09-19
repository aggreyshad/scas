<?php 
		//if a request to edit is made
		if(isset($_REQUEST['subjectId'])){
		$sql="select * from $db_name.subject WHERE subject_id=".$_REQUEST['subjectId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no student edit request is made //or if there are no student with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">View Subject failed</h3>
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
                        <h3 class="box-title"><?php echo ucwords(strtolower($row['subject_name'])); ?></h3>
                    </div>
                    <div class="box-body">
                         <strong> <?php echo $row['code']; ?> <?php echo ucwords(strtolower($row['subject_name'])); ?></strong> is a subject offerd at: <?php echo $row['level']; ?> Level. 

									<?php 
									
									if ($row['level']=='A'){ ?>
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
                                <?php
                                    $current_id=$row['subject_id']; 
                                      $sql4="select * from $db_name.subject, $db_name.subjectprerequisites WHERE $db_name.subject.subject_id=$db_name.subjectprerequisites.o_level_subject_id  AND $db_name.subjectprerequisites.subject_id=$current_id";
                                      $result4 = mysqli_query($con,$sql4) or die ('querry failed');
                                      if(!$result4){echo "Failed to select all o level prerequisites for this subject";}
									  elseif(mysqli_num_rows($result4)<=0){ echo "None"; }
									  else{ ?>
                                      <p><?php printf($row['subject_name']); ?> is recommended for students who have performed well in any of the following O-Level Subject(s):</p>
                                      
                                           <ul>
											<?php 
									  
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
                                        
											   <?php } // cose while ?>
                                              </ul>
                                          
                                 		<?php } //close else ?>
									  </div> <!-- /.box-body -->
									</div><!-- /.box-body -->
								  </div><!-- /.col -->
                                 <?php   
                                }   //close if ($row['level']=='A'){
								
								?>                      
                        
                        
                    </div>
                </div><!-- /.Default box -->	
            </div><!--  <div class="col-lg-10 -->
        </div>
        <!-- /.row -->	 
		<?php }//close showing the students being edited ?>