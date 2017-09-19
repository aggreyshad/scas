<!-- ============================================================================================================= -->
<!-- with coloring based on mark rage -->
<!-- ======================================================================================================= -->
<?php
function colorcheck1($a){
if ($a=="A"){$color="EA3131"; return $color;} //red for poor
elseif ($a=="B"){$color="FCFC7B"; return $color;} //yellow for fair
elseif ($a=="C"){$color="43DF43"; return $color;} //green for good
else {$color="2B75FF"; return $color;} // blue for excellent
}

?>

<div id="lineChart"></div>
<script type="text/javascript">
		var renderer = 'javascript';
		renderer = 'javascript';
		FusionCharts.setCurrentRenderer(renderer);
		var chart = new FusionCharts("/FusionCharts/Charts/line.swf", 
		"64785A74-5671-4E47-B18617D5F834AE61", "100%", "400", "0", "0");
		var a = '<chart showvalues="1" yaxisname="Rise in sea level (cm)" numdivlines="0" canvasborderalpha="0" canvasbgalpha="0" numvdivlines="5" plotgradientcolor="FF9900" drawanchors="1" plotfillangle="90" plotfillalpha="63" vdivlinealpha="22" vdivlinecolor="6281B5" bgcolor="EAFDEE,999999" showplotborder="0" numbersuffix="%" bordercolor="9DBCCC" borderalpha="100" canvasbgratio="0" basefontcolor="37444A" tooltipbgcolor="37444A" tooltipbordercolor="37444A" tooltipcolor="FFFFFF" basefontsize="8" outcnvbasefontsize="11" showyaxisvalues="0" animation="1" palettecolors="FF9900" showtooltip="1" showborder="0"><set value="0" label="1880" /><set value="2" label="1900" /><set value="4" label="1920" /><set value="6" label="1940" /><set value="10" label="1960" /><set value="13" label="1980" /><set value="20" label="2000" /></chart>';
chart.setXMLData(a);  
chart.render("lineChart1");
</script>


<script type="text/javascript">
		var renderer = 'javascript';
		renderer = 'javascript';
		FusionCharts.setCurrentRenderer(renderer);
		var chart = new FusionCharts("/FusionCharts/Charts/line.swf", 
		"64785A74-5671-4E47-B18617D5F834AE61", "100%", "400", "0", "0");
		
		var a = '<chart showvalues="1" yaxisname="Weights (Measured in Points)" numdivlines="" canvasborderalpha="0" canvasbgalpha="0" numvdivlines="5" plotgradientcolor="FF9900" drawanchors="1" plotfillangle="90" plotfillalpha="63" vdivlinealpha="22" vdivlinecolor="6281B5" bgcolor="EAFDEE,999999" showplotborder="0" numbersuffix=" Points" bordercolor="9DBCCC" borderalpha="100" canvasbgratio="0" basefontcolor="37444A" tooltipbgcolor="37444A" tooltipbordercolor="37444A" tooltipcolor="FFFFFF" basefontsize="8" outcnvbasefontsize="11" showyaxisvalues="0" animation="1" palettecolors="FF9900" showtooltip="1" showborder="0">';
		
		var b ='<set value="24.8" label="2013" /><set value="25.9" label="2014" /><set value="32.5" label="2015" /></chart>';
chart.setXMLData(a+b);  
chart.render("lineChart2");
</script>

<script type="text/javascript">
		var renderer = 'javascript';
		renderer = 'javascript';
		FusionCharts.setCurrentRenderer(renderer);
		var chart = new FusionCharts("/FusionCharts/Charts/bar2d.swf", 
		"64785A74-5671-4E47-B18617D5F834AE61", "100%", "400", "0", "0");
		
		var a = '<chart showvalues="1" yaxisname="Weights (Measured in Points)" numdivlines="" canvasborderalpha="0" canvasbgalpha="0" numvdivlines="5" plotgradientcolor="FF9900" drawanchors="1" plotfillangle="90" plotfillalpha="63" vdivlinealpha="22" vdivlinecolor="6281B5" bgcolor="EAFDEE,999999" showplotborder="0" numbersuffix=" Points" bordercolor="9DBCCC" borderalpha="100" canvasbgratio="0" basefontcolor="37444A" tooltipbgcolor="37444A" tooltipbordercolor="37444A" tooltipcolor="FFFFFF" basefontsize="8" outcnvbasefontsize="11" showyaxisvalues="0" animation="1" palettecolors="FF9900" showtooltip="1" showborder="0">';
		
		<?php
		mysql_select_db('scas',mysql_connect('localhost','root',''))or die(mysql_error()); //connect to database
		
	    $course_id=  1; //the current course
		
		$query1=
		mysql_query("select * from course WHERE course_id=".$course_id) or die(mysql_error()); 
		?>
				var b ='<?php

               while ($row1 = mysql_fetch_array($query1)) { // while there are categories
			   
			   $course_id=  $row1['course_id']; //the name of the crime category to be echoed
			   
		$query=
		mysql_query("select * from cuttoffpoints, course WHERE cuttoffpoints.course_id = course.course_id AND course.course_id=".$row1['course_id']) or die(mysql_error()); 
							if(mysql_num_rows($query)<=0){
                             	/*echo "<set label=\"".$name."\" value=\"0\"  />";	*/  //no data, no graph
								}
								
							else{
								while ($row = mysql_fetch_array($query)) { 
				   
									echo "<set label=\"".$row['year']."\" value=\"".$row['points']."\" />";
									//print("\n"); 
									 }//close while
							} // else
					} //close while ($row1 = mysql_fetch_array($query1)) {
								  ?></chart>';
chart.setXMLData(a+b);  
chart.render("lineChart");
</script>

<style>.color{ color:#FF9900; background-color:#FFFFCC;} </style>