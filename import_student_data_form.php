<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60962033-1', 'auto');
	  ga('send', 'pageview');

</script>
    
<div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
<?php
include ("ImportFromExcel/connection.php");

if(isset($_POST["submit"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 0;
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
				$student_surname=$filesop[1];
				$student_othernames=$filesop[2];
				$class_id=$filesop[3];
				$stream=$filesop[4];
				$sex=$filesop[5];
				$dob=$filesop[6];	/*$dob="1999-01-05";*/ //echo $dob;
				$student_email=$filesop[7];
				//$o_level_index=$_POST['o_level_index'];
				//$a_level_index=$_POST['a_level_index'];
				$nationality=$filesop[8];
				$level= $class_id>4 ? 'A' : 'O'; //calcuated from class
				$student_password=$filesop[9];
				$student_password=md5($student_password);
				//$student_password=md5('543210'); // was the default
				//$admission_date=$_POST['admission_date'];
				//$student_photofile=$_POST['student_photofile'];			
			
				/*
				$fname = $filesop[2];
				$lname = $filesop[3];
				$otherName=$filesop[4];
				$class=$filesop[5];
				$stream=$filesop[6];
				$gender=$filesop[7];
				$bloodGroup=$filesop[8];
				$dob=$filesop[9];
				$email=$filesop[10];
				$type=$filesop[11];
				$nationality=$filesop[12];
				$level=$filesop[13];
				$student_password=$filesop[14];
				$student_password=md5($student_password);
				*/
			
			if($c != 0){ // do not insert colun one coz it has headings not real data
			
			//$sql = mysql_query("INSERT INTO csv (name, email) VALUES ('$name','$email')");
			$sql="INSERT INTO $db_name.student (student_surname, student_othernames, class_id, stream, sex, dob,student_email, nationality, level, student_password, admission_date) VALUES( '$student_surname','$student_othernames',$class_id,'$stream','$sex','$dob','$student_email','$nationality','$level','$student_password',NOW())";
			
			$result_of_adding = mysqli_query($con,$sql);
			
			}//close if
			
			$c = $c + 1;
		}//while(($filesop
		
			if(!$result_of_adding){
				$message="Sorry!";
			}else{ $c=$c-1 ;
				$message="Your database has imported successfully. You have inserted ". $c ." records";
			}

	} //if(isset($_POST["submit"]))
?>
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Sorry!"){ //positive alert ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
			 
		<?php }
		
		else{ //failed to add new student ?>
			
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php echo $message; ?>
			</div>			
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="register_student1" id="register_student1" class="register_student1" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Bulk Student Registration</h3> 
            </div>
            <div class="box-body">
			<div class="callout callout-default" >Import New Student Details from .csv file	
			</div>
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="fname">Import New Student Details</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-group"></i></div>
					  <input type="file" class="form-control" name="file" id="file" />
					  </div>
                    </div>					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
<!--					<input type="submit"class="btn btn-default" name="submit" id="submit" value="Submit" />
-->					<button class="btn btn-default clearForm" type="reset">Reset</button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_student1').bootstrapValidator({
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
	$('#register_student1').on('click', "button[type='reset']",  function() {
	$('#register_student1').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>