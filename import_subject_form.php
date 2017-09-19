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
				$subject_name=$filesop[1];
				$subject_short_name=$filesop[2];
				$level=$filesop[3];
				$code=$filesop[4];
				$category_id=$filesop[5];
				
			$sql1="select * from $db_name.subject, $db_name.category where $db_name.subject.category_id=$db_name.category.category_id"; 
			$result1 = mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1)<=0){
			
			if($c != 0){ // do not insert column one coz it has headings not real data
			
			
			
			
			
			
			
			
			
			}
			
			
			while($row1 = mysqli_fetch_array($result1)){	
			
					if($row1['code']!=$code || $row1['subject_short_name']!=$subject_short_name || $row1['subject_name']!=$subject_name){ //if 2 -- no duplicates
					
					//echo $row1['code'];
			
			$sql="INSERT INTO $db_name.subject (subject_name, subject_short_name, level, code, category_id) 	VALUES('$subject_name','$subject_short_name','$level','$code','$category_id')"; 
				$result_of_adding = mysqli_query($con,$sql);			
					}//close if 2 
				}//close while
			}//close if
			
			$c = $c + 1;
		}
			if(isset($result_of_adding)){
				if(!$result_of_adding){
				$message="Sorry!"; // shows if thers error with $sql="INSERT INTO $db_name.subject 
				} 
			if(!isset($result_of_adding)){
				$message="Sorry!"; // shows if no record was inserted 
			}
			}else{ $c=$c-1 ;
				$message="Your database has imported successfully. You have inserted ". $c ." records.";
			}

	}
?>
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Sorry!"){ //positive alert ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php  echo $message. " An error occured. No record was inserted!"; ?> 
			</div>
			 
		<?php }
		
		else{ //failed to add new student ?>
			
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php echo $message; ?> <a href="view_subjects.php">Click Here To View all Subjects in Database</a> <br/>
			</div>			
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="register_subject1" id="register_subject1" class="register_subject1" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Bulk Subject Registration</h3> 
            </div>
            <div class="box-body">
			<div class="callout callout-default" >Import New Subject Details from .csv file	
			</div>
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="fname">Import New Subject Details</label>
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
    $('#register_subject1').bootstrapValidator({
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
	$('#register_subject1').on('click', "button[type='reset']",  function() {
	$('#register_subject1').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>