<?php 
//on submission of new exam
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$exam_name=$_POST['exam_name'];
						
$sql="INSERT INTO $db_name.exams (exam_name) VALUES('$exam_name')";

				$result_of_adding = mysqli_query($con,$sql);
					
				//error message in case update fails
				if(!$result_of_adding){ $message="Failed to add new exam!";}
				else{$message="Successful";}
		}
?>

 <div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
			Successfully added <?php  echo $exam_name;?> to exams.
			</div> 
		<?php }
		
		else{ //failed to add new exam ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
			<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="register_exam" id="register_exam" class="register_exam" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add New exam</h3> 
            </div>
            <div class="box-body">
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="exam_name">Exam Name</label>
					  <div class="input-group">
					 <div class="input-group-addon"> <b>?</b> </div>
                      <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Enter Exam Name">
					  </div>
                    </div>
					
					</div><!-- /.row -->
					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
					<button class="btn btn-default clearForm" type="reset">Reset</button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         
    <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_exam').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			exam_name: {
                message: 'A valid examname is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 30,
						message: 'exam_name must be more than 6 and less than 30 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z]+$/,
                        message: 'This field can only consist of alphabets'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	$('#register_exam').on('click', "button[type='reset']",  function() {
	$('#register_exam').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>