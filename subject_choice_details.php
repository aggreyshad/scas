<?php

		include_once "dbconfig.php"; 
		//if a request to view is made
		if(isset($_REQUEST['subjectId'])){
		$sql="select * from $db_name.subject WHERE subject_id=".$_REQUEST['subjectId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no subject edit request is made //or if there are no subject with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		
                  <h3>View Subject failed</h3>
				Viewing Subject failed!

		<?php }//close if there are no subjects
		
		else{ // there are carees 
		$row = mysqli_fetch_array($result);
		
		
		?>
        	<div>
               <div class="box ">
                <div class="box-header bg-yellow with-border">
                        <h3 class="box-title  with-border"><i class="fa fa-book"></i> <?php echo ($row['subject_name']); ?></h3>
                </div>
                <div class="box-body">
                        <span class="smaller">
                        <?php echo $row['code']; ?> <?php echo ucwords(strtolower($row['subject_name'])); ?> is a subject offerd at: <?php echo $row['level']; ?> Level. 
                        </span>
               </div> <!-- /.box-body -->
              </div>
           </div>
           
           <?php if ($row['level']=='A'){ ?>
           
           <div class="">
              <div class="box box-default">
              
                <div class="box-header text-soldier-green with-border">
                  <h3 class="box-title">Prerequisites for <?php printf($row['subject_name']); ?></h3>
                
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
                                      <!--<div class="callout callout-info">
                    				  <p><?php //printf($row['subject_name']); ?> is recommended for students who have performed well in any of the following O-Level Subject(s):</p>
                                      </div>-->
                                      
                                           <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Related O level Subject</th>
                                                        <th>Maximum Aggregate</th>
                                                    </tr>
                                               </thead>
                                           		<tbody>
                                           
											<?php 
									  
                                      		while($row4 = mysqli_fetch_array($result4)){
                                      		?>
                                                	<tr>
                                                        <td>
                                                	<?php printf($row4['subject_name']); 
                                                        if($row4['type']>0) { ?>
                                                        <small  class="label bg-yellow" title="<?php echo $row4['subject_name']; ?> is required">required</small>
                                                        <?php }
                                                        if($row4['type']==2) { ?>
                                                        <small  class="label bg-green" title="<?php echo $row4['subject_name']; ?> is required">*</small>
                                                        <?php } ?>
                                                     	</td>
                                                     	<td><?php printf($row4['aggregate_id']); ?></td>
                                                	</tr>
                                        
											   	<?php } // cose while ?>
                                              	</tbody>
                                             </table>
                                          
                                 		<?php } //close else ?>
                
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>
            <?php } ?>
             
                        
                        
		<?php }//close showing the users being edited ?>