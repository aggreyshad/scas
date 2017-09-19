<script type="text/javascript">
	function get_com_4student(item) {
			$(".modal-body").load($(item).attr("page"));
   }

   function clicked_loaded(item) {
	document.getElementById("content").innerHTML = ($(item).attr("title"));
	
	var id = ($(item).attr("id"));
	var str = ($(item).attr("title"));
	var res = str.substring(0, 4);
	var selector = ".Item";
	//$(selector).removeClass("current_selection");
	//$(item).addClass("current_selection");

			$("#combination_info").load($(item).attr("page"));
            $("#rsubject").load($(item).attr("page2"));
            $("#rcourse").load($(item).attr("page3"));
            $("#rcareer").load($(item).attr("page4"));
            $("#summary_info").load($(item).attr("page"));
			$("#subject_info").load("no-page.php"); //empty prevoius subject selection
			$("#course_info").load("no-page.php"); //empty prevoius course selection
			$("#career_info").load("no-page.php"); //empty prevoius career selection
   }

   function clicked(item) {
	document.getElementById("content").innerHTML = ($(item).attr("title"));
	
	var id = ($(item).attr("id"));
	var str = ($(item).attr("title"));
	var res = str.substring(0, 4);
   }
   
   function clicked_career(item) {
	//document.getElementById("career_info").innerHTML = ($(item).attr("page"));
	var selector = ".career.Item";
	$(selector).removeClass("current_selection");
	$(item).addClass("current_selection");
	$("#career_info").load($(item).attr("page")); // load career info in this div
   }
   
   function clicked_course(item) {
	var selector = ".course.Item";
	$(selector).removeClass("current_selection");
	$(item).addClass("current_selection");
	$("#course_info").load($(item).attr("page")); // load career info in this div
   }
   
   function clicked_subject(item) {
	var selector = ".sub.Item";
	$(selector).removeClass("current_selection");
	$(item).addClass("current_selection");
	$("#subject_info").load($(item).attr("page")); // load career info in this div
   }
   
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
	
	

        $(".comb").on("click", function(){  
            $("#combination_info").load($(this).attr("page"));
            $("#rsubject").load($(this).attr("page2"));
            $("#rcourse").load($(this).attr("page3"));
            $("#rcareer").load($(this).attr("page4"));
            $("#summary_info").load($(this).attr("page"));
			$("#subject_info").load("no-page.php"); //empty prevoius subject selection
			$("#course_info").load("no-page.php"); //empty prevoius course selection
			$("#career_info").load("no-page.php"); //empty prevoius career selection
            return false;
        });
		$(".sub").on("click", function(){  
            $("#subject_info").load($(this).attr("page"));
            return false;
        });
		$(".course").on("click", function(){  
            $("#course_info").load($(this).attr("page"));
            return false;
        });
		$(".career").on("click", function(){  
            $("#career_info").load($(this).attr("page"));
            return false;
        });
		
		// change class of current clicked item
		var selector = ".Item";
		$(selector).on("click", function(){
		$(selector).removeClass("current_selection");
		$(this).addClass("current_selection");
		}); 
		// -- end change class
    });
</script>

<div class="box box-solid box-success">
<div class="box-header with-border bg-green-gradient">
                  <h3 class="box-title">Current Selection: <span id="content"></span> <span id="content2"></span></h3>
                  <h3 class="box-title pull-right"><a href="get_combination_of_choice.php">Clear All</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
<div class="everything_but_js" data-pjax-container="">
      <div id="container">
        <div id="main" class=" main_content">
          <div class='full_width_test'>
            <div class='swipe_accortion'>
              <div class='horizontal_loading'></div>
              <div class='section_links'>
                <div class='section'>
                  <div class='headers a_levels'>
                    <span><i class="fa fa-book"></i> A-Level Subjects</span>
                   </div>
                   <div class='section_container fixed'>
                    <h4>A-Level Subjects</h4>
                    
                    <!--<table width="100%" border="0">
                    	<tbody>
                        	<tr>
                            	<td width="45%" class="QualSel"><?php //include "all_sub.php"; ?></td>
                            	<td> STUFF    </td>
                             </tr>
                         </tbody>
                    </table>-->
                    <div class="QualSel" id="rsubject"><?php include "all_sub.php"; ?></div>
                    <div class="Summaries" id="subject_info">Select an A-Level Subject and see details about it.</div>
                    
                  </div>
                </div> <!-- /.section -->
                
                <div class='section'>
                  <div class='combination headers'>
                    <span><i class="fa fa-list"></i> Combinations</span>
                    </div>
                   <div class='section_container fixed'>
                    <h4>Combinations</h4>
                    
                    <!--<table width="100%" border="0">
                    	<tbody>
                        	<tr>
                            	<td width="45%" class="QualSel">
                    
                                <div class="Item">
                                    <input name="id" value="1600" type="hidden">                                 
                                    <input name="name" value="Accounting" type="hidden">                                 
                                    <div class="Symbol"></div>                                 
                                    <div class="Inner">                                                                          
                                    <h4>Accounting</h4>                                      
                                    <a title="Click here for more information.">i</a>
                                    </div>
                                </div> <!-- /.Item --
                   					</td>
                            	<td> STUFF    </td>
                             </tr>
                         </tbody>
                    </table>-->
                    
                    <div class="QualSel" id="rcombination"><?php include "all_combinations.php"; ?></div>
                    <div class="Summaries" id="combination_info">Select a Combination and see which course or career it leads to.</div>
                    
                  </div>
                </div> <!-- /.section -->
                
                <div class='section'>
                  <div class='courses headers'>
                    <span><i class="fa fa-university"></i> Courses / Degrees</span>
                  </div>
                  <div class='section_container fixed'>
                    <h4>Course / Degrees</h4>
                    
                    <!--<table width="100%" border="0">
                    	<tbody>
                        	<tr>
                            	<td width="45%" class="QualSel"><?php //include "all_courses.php"; ?></td>
                            	<td id="course_info"> STUFF    </td>
                             </tr>
                         </tbody>
                    </table>-->
                    <div class="QualSel" id="rcourse"><?php include "all_courses.php"; ?></div>
                    <div class="Summaries" id="course_info">Select a course and see details about it.</div>
                    
                  </div>
                </div> <!-- /.section -->
                
                <div class='section'>
                  <div class='headers careers'>
                    <span><i class="fa fa-briefcase"></i> Careers</span>
                  </div>
                  <div class='section_container fixed'>
                    <h4>Careers</h4>
                    
<!--                   <table width="100%" border="0">
                    	<tbody>
                        	<tr>
                            	<td width="45%" class="QualSel"><?php //include "all_careers.php"; ?></td>
                            	<td id="career_info"> STUFF    </td>
                             </tr>
                         </tbody>
                    </table>
-->                    
                    <div class="QualSel" id="rcareer"><?php include "all_careers.php"; ?></div>
                    <div class="Summaries" id="career_info">Select career and see details about it.</div>

                  </div>
                </div> <!-- /.section -->
                
                <div class='section'>
                  <div class='summary headers'>
                    <span><i class="fa fa-cog"></i> Summary</span>
                  </div>
                  <div class='section_container fixed'>
                    <h4>Summary</h4>
                    
                    <div class="QualSel">
                    <?php echo (!isset($_REQUEST['studentId'])) ? "Your Selections" : ""; ?>
                    
                    
                    <?php 
					if(isset($_REQUEST['studentId'])){ $ext = " WHERE  $db_name.student.student_id= " .$_REQUEST['studentId'];} 
					else{ $ext = "";}
					
					$sql="select * from $db_name.student $ext"; 
					$result = mysqli_query($con,$sql);	
							//if there is no current student
					if(mysqli_num_rows($result)!=1){ 
					
					//student_id missing
					?>
		
					<?php }//close if there is no current student
		
					else{ //shows student in the db 
					
							while($row1 = mysqli_fetch_array($result)){?>
							
							<p><strong>Student Name:</strong> <?php echo ucwords(strtolower($row1['student_surname']." ".$row1['student_othernames'])); ?><br />

							<strong>Current Recomended Combination: </strong>
							<?php 
							if(isset($_REQUEST['combinationId'])){ $ext = " WHERE  $db_name.combination.combination_id= " .$_REQUEST['combinationId'];} 
							else{ $ext = "";}
							$sqlc="select * from $db_name.combination $ext"; 
							$resultc = mysqli_query($con,$sqlc);	
							if(mysqli_num_rows($resultc)!=1){ 
							//combination missing
							}//close if there is no current combination
				
							else{ //shows combination in the db 
							
							while($rowc = mysqli_fetch_array($resultc)){ ?>
							<?php echo strtoupper(strtolower($rowc['combination_name'])); ?>
							
							<?php }//close while ?>
				
							<?php }//close showing the current combination in db 

					
					?>
                    </p>
                    <p>
                    <button class="btn btn-sm" id="add_comb" name="add_comb" data-toggle="modal" data-target="#myModal<?php echo $row1['student_id']; ?>"> Take this Combination <i class="fa fa-check" style="color:#33CC66;"></i></button>
                    </p>
                    
                    <!-- ==================== modal ================================= -->
                  <!-- Modal -->
                                                <div class="modal fade" id="myModal<?php echo $row1['student_id']; ?>"  role="dialog">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <?php include "add_comb_process.php"; 
													
													$sql2="select * from $db_name.student, $db_name.class where $db_name.student.class_id=$db_name.class.class_id AND $db_name.student.student_id=".$row1['student_id']; $result2 = mysqli_query($con,$sql2);
													$row2 = mysqli_fetch_array($result2);
													?>
<form name="register_comb" id="register_comb" class="register_comb" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >


                                                      <div class="modal-header bg-green">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                                        <h4 class="modal-title">Award Combination to <?php echo ucwords(strtolower($row2['student_surname']." ".$row2['student_othernames'])); ?></h4>
                                                      </div>
                                                      <div class="modal-body">
                                                       
                                                      
                                                      
                                                      
                                                          <?php
                                                          $current_id=$row2['student_id']; 
														  ?>
                                                          
                                                          <?php
														  //$sql8="select * from $db_name.combinanation WHERE $db_name.combinanation ='O'";
														  if(isset($_REQUEST['combinationId'])){ $ext = " WHERE  $db_name.combination.combination_id= " .$_REQUEST['combinationId'];} 
														  else{ $ext = "";}
														  $sql8="select * from $db_name.combination $ext";
														  
                                                          $result8 = mysqli_query($con,$sql8) or die ('querry failed');
                                                          if(!$result8){echo "Failed to select all combination";
														  }
                                                          elseif(mysqli_num_rows($result8)<=0){ echo "There are no combinations"; 
														  }
                                                          else{ ?>
                                                          <div class="row">
                                                          
                                                          	<!-- get user id and pass it as a value in hidden field -->		  	
															<input type="hidden" name="student_id" id="student_id" value="<?php echo $row2['student_id']; ?>" />
                                                          
                                                            <!-- select -->
                                                           <div class="col-lg-12 col-md-12">
                                                             
                                                                <?php while($row8 = mysqli_fetch_array($result8)){ 
																//***************************************************** ?>		
                                                                
                                                          	<!-- get user id and pass it as a value in hidden field -->		  	
															<input type="hidden" name="combination_id" id="combination_id" value="<?php echo $row8['combination_id']; ?>" />
                                                            
                                                            <?php if($row2['combination_id']!=0 && $row2['combination_id']!="" ) {
						
                                                                    $sql_comb="select * from $db_name.combination"; $result_comb = mysqli_query($con,$sql_comb);
                                                                    if(mysqli_num_rows($result_comb)>0){
                                                                        while($row_comb = mysqli_fetch_array($result_comb)){						
                                                                            if ($row_comb['combination_id']==$row2['combination_id']){ echo  ucwords(strtolower($row2['student_surname']))." already has combination: <b>".$row_comb['combination_name']."</b>.";  
																				if($row_comb['combination_id']==$row8['combination_id']) { ?>
																				Would you like to re-assign him the same combination? <?php }
																				else { ?> Would you like to assign him a new combination: <b><?php echo $row8['combination_name']; ?></b> <?php }
																				} // close if 
                                                                            } ///close while
                                                                        } //close if
                                                                
                                                                }  else { ?>
                                                            
																Would you like to assign combination: <?php echo $row8['combination_name']; ?> to Student: <?php echo ucwords(strtolower($row2['student_surname']." ".$row2['student_othernames'])); ?> ? 
																<?php
																}
                                                                //********************************************************* ?>
                                                                <br/><br/>
                                                                <a href="add_comb_process.php" id="add_new_comb" onclick="get_com_4student(this);" page="add_comb_process.php?student_id=<?php echo $row2['student_id']; ?>&combination_id=<?php echo $row8['combination_id']; ?>" class="btn btn-success"> Yes <i class="fa fa-check"></i></a>
																 
                                                    <button class="btn btn-danger clearForm" type="reset" data-dismiss="modal">No <i class="fa fa-times"></i></button>
																
																<?php } //while there are o level subjects
                                                                ?>
                                                                </div>
                                                           </div>
                                                           
                                                          <?php } //close else?>
                                                          
                                                          
                                                      </div>
                                                      <div class="modal-footer">
                                                   
							
                                                      </div>
			 										</form>
                                                    </div><!-- /.modal-content -->
                                                  </div><!-- /.modal-dialog -->
                                                </div>
                                                
                                                <!-- ==================== modal ================================= -->
                    
                    
                    <?php }//close while ?>
		
		<?php }//close showing the current student in db ?>
                                       
                    </div>
                    <div class="Summaries" id="summary_info">No info</div>
                    
                  </div>
                </div>
                
                <!-- section code
                <div class='section'>
                  <div class='headers reference_groups'>
                    <span>reference_groups</span>
                  </div>
                  <div class='section_container fixed'>
                    <h4>Refference</h4>
                    this is a fixed div
                    <p class='fixie'></p>
                    <p class='fixie'></p>
                    <div> <img class='fixie' height='900' width='1200'> </div>
                  
                  </div>
                </div>                
               < section end here -->
               
              </div>
            </div>
          </div>
        </div>
      </div>
     
  </div>
  <script type="text/javascript">
    //<![CDATA[
    $(document).ready(function() {
      $('.section_links').horizontalAccordion({speed:400});
      $('.horizontal_loading').fadeOut('fast');
    });
    //]]>
	
    </script>
    </div>
    </div>
    
    
    
    
   
<!-- onclick update value of a div. the script /  lines of code are below  -->
<!--<script type="text/javascript">
   function clicked(item) {
    //alert($(item).attr("id"));
	document.getElementById("content").innerHTML = ($(item).attr("title"));
   }
  </script>

  <div onclick="clicked(this);" id="currrent_selection" title=" test ">test</div>
  <div onclick="clicked(this);" id="currrent_selection1" title=" test 2 ">test 2</div>
  <div onclick="clicked(this);" id="currrent_selection2" title=" test 3 ">test 3</div>
  
  <p><b>Current Selection :</b><span id="content"></span></p>-->
  
  <!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_comb').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			subject_id: {
                message: 'A valid Subject Id is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			aggregate_id: {
                message: 'The Maximum Id is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	$('#register_comb').on('click', "button[type='reset']",  function() {
	$('#register_comb').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>
  
  