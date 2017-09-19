<?php

		include_once "dbconfig.php"; 
		//if a request to view is made
		if(isset($_REQUEST['courseId'])){
		$sql="select * from $db_name.course WHERE course_id=".$_REQUEST['courseId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no course edit request is made //or if there are no course with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		
                  <h3>View Course failed</h3>
				Sorry! If you arrived at this page by mistake, contact the administrator!

		<?php }//close if there are no courses
		
		else{ //shows course to be editted 
		$row = mysqli_fetch_array($result);
		
		
		?>
               <div class="box ">
                <div class="box-header bg-purple with-border">
                        <h3 class="box-title  with-border"><i class="fa fa-university"></i> <?php echo ($row['course_name']); ?></h3>
                </div>
                <div class="box-body">
                        <span class="smaller"><?php echo $row['course_type']. " " . $row['course_name']; ?></span>
                        <div id="lineChart"></div>
                        
                        <script type="text/javascript">
						var renderer = 'javascript';
						renderer = 'javascript';
						FusionCharts.setCurrentRenderer(renderer);
						var chart = new FusionCharts("/FusionCharts/Charts/line.swf", 
						"64785A74-5671-4E47-B18617D5F834AE61", "100%", "230", "0", "0");
						
						var a = '<chart showvalues="1" yaxisname="Weights (Measured in Points)" numdivlines="" canvasborderalpha="0" canvasbgalpha="0" numvdivlines="5" plotgradientcolor="FF9900" drawanchors="1" plotfillangle="90" plotfillalpha="63" vdivlinealpha="22" vdivlinecolor="000000" bgcolor="EAFDEE,FFFFFF" showplotborder="1" numbersuffix=" Points" bordercolor="9DBCCC" borderalpha="100" canvasbgratio="0" basefontcolor="37444A" tooltipbgcolor="37444A" tooltipbordercolor="37444A" tooltipcolor="FFFFFF" basefontsize="10" outcnvbasefontsize="11" showyaxisvalues="0" animation="1" palettecolors="FF9900" showtooltip="1" showborder="0">';
						var b ='<?php

					   
					   $course_id =  $_REQUEST['courseId']; //the name of the crime category to be echoed
			   
					   $sql = "select * from $db_name.cuttoffpoints, $db_name.course WHERE $db_name.cuttoffpoints.course_id = $db_name.course.course_id AND $db_name.course.course_id=".$course_id; 
						$result2 = mysqli_query($con,$sql);	
							if(!isset($result2) || mysqli_num_rows($result2)<=0){
                             	/*echo "<set label=\"".$name."\" value=\"0\"  />";	*/  //no data, no graph
								}
								
							else{
								while ($row2 = mysqli_fetch_array($result2)) { 
				   
									echo "<set label=\"".$row2['year']."\" value=\"".$row2['points']."\" />";
									//print("\n"); 
									 }//close while
							} // else
								  ?></chart>';
					chart.setXMLData(a+b);  
					chart.render("lineChart");
					</script>
                        
                        
                        
               </div> <!-- /.box-body -->
            </div>                       
                        
		<?php }//close showing the users being edited ?>