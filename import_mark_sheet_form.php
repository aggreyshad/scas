<?php
//on submission of new user
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$visible=false;
				
				$exam_id=$_POST['exam_id'];
				$year_of_exam=$_POST['year_of_exam'];
				$term=$_POST['term'];
				
				$class_id_4=$_POST['class_id_4'];
				$class_id_6=$_POST['class_id_6'];
				$class_id_all=$_POST['class_id'];
				
				if($class_id_4 != '' ){$class_id=$class_id_4;}
				elseif($class_id_6 != ''){$class_id=$class_id_6;}
				elseif($class_id_all != ''){$class_id=$class_id_all;} // get class id from any of the three variables

				$subject_id_o=$_POST['subject_id_o'];
				$subject_id_a=$_POST['subject_id_a'];
				$subject_id = ($subject_id_o != '') ? $subject_id_o : $subject_id_a; //assign either subject_id_o or alevel id
				
				//$student_id=$_POST['student_id'];
				
				//$sql="select *  from $db_name.marks WHERE $db_name.marks.exam_id=$exam_id AND $db_name.marks.year='$year_of_exam' AND $db_name.marks.term=$term AND $db_name.marks.class_id=$class_id AND $db_name.marks.subject_id=$subject_id AND $db_name.marks.student_id=$student_id"; //CHECK TO  SEE THAT MARK DOESNOT EXIST ALREADY EXIST
				//$result = mysqli_query($con,$sql);
					
					//if(mysqli_num_rows($result)>=1){
					//$message="Failed! A Subject with code: $code already exists"; //Do not insert duplicates
					//}//if(mysqli_num_rows	
					
					//else{ //ok to insert
						//$sql="INSERT INTO $db_name.subject (subject_name, subject_short_name, level, category_id, code) 	VALUES('$subject_name','$subject_short_name','$level','$category_id','$code')";
						//$result_of_adding = mysqli_query($con,$sql);
							
						//error message in case update fails
						//if(!$result_of_adding){ 				
							//$message="Failed to add new subject!";}
						//else{
							//$message="Successful";}
					//}// CLOSE elseok to insert
				include ("ExportExcel/ExportToExcel.php");
				if($exam_id==4 || $exam_id==5){Export_UNEB_Marksheet_Excel($class_id, $exam_id, $subject_id); } //marksheet for UNEB
				else { ExportMarksheetExcel($class_id, $exam_id, $subject_id);} // Mark sheet for other exams

				//header("location: insert_marks_imported.php?examId=$exam_id&classId=$class_id&subjectId=$subject_id");
				
		}//if(isset($_POST['submit']))	
?>
<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60962033-1', 'auto');
	  ga('send', 'pageview');

</script>
    
<!--<div class="row">-->	
		 <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->

	 
<?php
include ("ImportFromExcel/connection.php");

if(isset($_POST["import_marks"]))
	{
		$visible=false;
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		$counter =0;
		while(($filesop = fgetcsv($handle, 1000, ",")) != false)
		{
				$student_id=$filesop[0];
				$class_id=$filesop[3];
				$o_level_index=$filesop[4];
				$exam_id=$filesop[5];
				$subject_id=$filesop[7];
				$mark=$filesop[9];
				$mark= $mark!='' ? $mark : -1; // if mrk is empty, let mark be -1
				
				$aggregate_id=$filesop[10];
				if($aggregate_id==''){
					if($mark <= 100 && $mark >= 80){$aggregate_id=1;}
					elseif($mark <= 79 && $mark >= 75){$aggregate_id=2;}
					elseif($mark <= 74 && $mark >= 70){$aggregate_id=3;}
					elseif($mark <= 69 && $mark >= 65){$aggregate_id=4;}
					elseif($mark <= 64 && $mark >= 60){$aggregate_id=5;}
					elseif($mark <= 59 && $mark >= 55){$aggregate_id=6;}
					elseif($mark <= 54 && $mark >= 50){$aggregate_id=7;}
					elseif($mark <= 49 && $mark >= 45){$aggregate_id=8;}
					elseif($mark <= 44 && $mark >= 0){$aggregate_id=9;}
					elseif($mark <0) {$aggregate_id='';}
				}
				
				$year_of_exam=$_POST['year_of_exam'];
				$year_of_exam= $_POST['year_of_exam']!='' ? $_POST['year_of_exam'] : 2014; //calcuated term - if there is no term, term is 3
				$term=$_POST['term'];
				$term= $_POST['term']!='' ? $_POST['term'] : 3; //calcuated term - if there is no term, term is 3
			if($c != 0){ // do not insert colun one coz it has headings not real data
			
			//echo "mark: '". $mark."' agg: ".$aggregate_id."<br/>";
			
			if($mark!= -1 || $aggregate_id!=''){ //no inserting null values
			
			
			$sql4="select *  from $db_name.marks WHERE $db_name.marks.exam_id=$exam_id AND $db_name.marks.year='$year_of_exam' AND $db_name.marks.term=$term AND $db_name.marks.class_id=$class_id AND $db_name.marks.subject_id=$subject_id AND $db_name.marks.student_id=$student_id"; //CHECK TO  SEE THAT MARK DOESNOT EXIST ALREADY EXIST
				$result4 = mysqli_query($con,$sql4);
					
					if(mysqli_num_rows($result4)>=1){
					$message="Failed! A mark for the given subject, exam, year, term already exists"; //Do not insert duplicates
					} //if(mysqli_num_rows	
					
					else{ //ok to insert
						$sql="INSERT INTO $db_name.marks (student_id, subject_id, exam_id, year, term, class_id, mark, aggregate_id) VALUES($student_id,$subject_id,$exam_id,'$year_of_exam',$term,$class_id,$mark,$aggregate_id)";
						$result_of_adding = mysqli_query($con,$sql);
							
						//error message in case update fails
						if(!$result_of_adding){ 				
							$message="Failed to add new mark!";}
						else{
							$message="Successful"; 
							$counter+=1;
							}
					}// CLOSE elseok to insert
			
			
			
			
			
			
			
			
			//$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
			//$sql="INSERT INTO $db_name.student (student_surname, student_othernames, class_id, stream, sex, dob,student_email, nationality, level, student_password, admission_date) VALUES( '$student_surname','$student_othernames',$class_id,'$stream','$sex','$dob','$student_email','$nationality','$level','$student_password',NOW())";
			
			//$result_of_adding = mysqli_query($con,$sql);
			
			}//if($mark!='' || $aggregate_id!=''){ //no inserting null values
			
			}//close if
			
			$c = $c + 1;
		}//while(($filesop
		
			if(!isset($result_of_adding) || !$result_of_adding ){
				$message="Sorry! Failed to import Mark!";
			}else{ $c=$c-1 ;
				$message="Successful";
			}

	} //if(isset($_POST["import_marks"]))

?>
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message!="Successful"){ //positive alert ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
			 
		<?php }
		
		else{ //failed to add new student ?>
			
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php 
			echo $message."! Your database has imported ";
			echo (isset($counter) && $counter !=0) ? $counter.' record(s) ' : '';
			echo " successfully."; ?>
			</div>			
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="import_marks" id="import_marks" class="import_marks" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
             <input  type="hidden" class="form-control" id="year_of_exam" name="year_of_exam" value="<?php if(isset($_REQUEST['year_of_exam']))echo $_REQUEST['year_of_exam']; ?>">
             <input  type="hidden" class="form-control" id="term" name="term" value="<?php if(isset($_REQUEST['term']))echo $_REQUEST['term']; ?>">
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Exam Scores</h3> 
            </div>
            <div class="box-body">
			<div class="callout callout-default" >Import Exam Marks from .csv file	
			</div>
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="fname">Import Exam Marks</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-group"></i></div>
					  <input type="file" class="form-control" name="file" id="file" />
					  </div>
                    </div>					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="import_marks" id="import_marks">Submit <i class="fa fa-arrow-circle-right"></i></button>
<!--					<input type="submit"class="btn btn-default" name="submit" id="submit" value="Submit" />
-->					<button class="btn btn-default clearForm" type="reset">Reset</button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		<!-- </div><!-- column -->
		<!-- </div><!-- /.row -->
		         

<!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#import_marks').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			file: {
                message: 'A File with Student Details must be attached',
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
	$('#import_marks').on('click', "button[type='reset']",  function() {
	$('#import_marks').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>