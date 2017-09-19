<?php 
//on submission of new exam
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$career_cat_name=$_POST['career_cat_name'];
				$sql="select *  from $db_name.career_cat where $db_name.career_cat.career_cat_name='$career_cat_name'"; 
				//CHECK TO  SEETHAT caree_cat DOESNOT EXIST
				$result = mysqli_query($con,$sql);
					
					if(mysqli_num_rows($result)>=1){
					$message="Failed! A Career Category with name <b>$career_cat_name</b> already exists"; //Do not insert duplicates
					}//if(mysqli_num_rows	
					
					else{ //ok to insert
						
						$sql="INSERT INTO $db_name.career_cat (career_cat_name) VALUES('$career_cat_name')";
	
						$result_of_adding = mysqli_query($con,$sql);
						
						//error message in case update fails
						if(!$result_of_adding){ $message="Failed to add new exam!";}
						else{$message="Successful";}
					}// CLOSE elseok to insert
					
		}//if(isset($_POST['submit']))	
?>

 <div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
			Successfully added <?php  echo $career_cat_name;?> to career category.
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
		  <form name="register_exam_career_cat" id="register_exam_career_cat" class="register_exam_career_cat" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add Career Category</h3> 
            </div>
            <div class="box-body">
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="career_cat_name">Career Category Name</label>
					  <div class="input-group">
					 <div class="input-group-addon"> <b>?</b> </div>
                      <input type="text" class="form-control" id="career_cat_name" name="career_cat_name" placeholder="Enter Career Category Name">
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
    $('#register_exam_career_cat').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			career_cat_name: {
                message: 'A valid examname is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 60,
						message: 'career_cat_name must be more than 2 and less than 60 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9,. ]+$/,
                        message: 'This field can only consist of alphabets'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	$('#register_exam_career_cat').on('click', "button[type='reset']",  function() {
	$('#register_exam_career_cat').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>