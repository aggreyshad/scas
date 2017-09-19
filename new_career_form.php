<?php
//on submission of new career
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$career_name=$_POST['career_name'];
				$career_cat_id=$_POST['career_cat_id'];
				$career_details=$_POST['career_details'];
				$sql="select *  from $db_name.career where $db_name.career.career_name='$career_name'"; //CHECK TO  SEETHAT careed DOESNOT EXIST
				$result = mysqli_query($con,$sql);
					
					if(mysqli_num_rows($result)>=1){
					$message="Failed! A Career with a name <b>$career_name</b> already exists"; //Do not insert duplicates
					}//if(mysqli_num_rows	
					
					else{ //ok to insert
						$sql="INSERT INTO $db_name.career (career_name, career_details, career_cat_id) 	VALUES('$career_name', '$career_details', $career_cat_id )";
						$result_of_adding = mysqli_query($con,$sql);
							
						//error message in case adding fails
						if(!$result_of_adding){ 				
							$message="Failed to add new career!";}
						else{
							$message="Successful";}
					}// CLOSE elseok to insert
				
		}//if(isset($_POST['submit']))	
?>

<div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			Successfully added <?php  echo "<b>".$career_name."</b>";?> to Careers.
			</div> 
		<?php }
		
		else{ //failed to add new user ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<?php  echo $message; ?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="register_career" id="register_career" class="register_career" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add New Career</h3> 
            </div>
            <div class="box-body">
				<div class="row">
                
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="career_name">Career Name</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-book"></i></div>
                      <input type="text" class="form-control" id="career_name" name="career_name" placeholder="Enter Career Name" />
					  </div>
                    </div>	
                    
                    
                    
                    <!-- select -->
                    <div class="form-group col-lg-6 col-md-6">					
					 <label for="student_role">Career Category</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control select2" id="career_cat_id" name="career_cat_id">
					  	<option value="">Please Select</option>
						<?php $sql="select * from $db_name.career_cat"; $result = mysqli_query($con,$sql);
						//if there are no career categories
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['career_cat_id']); ?>"><?php printf($row['career_cat_name']); ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div>
                    
                    
                    <div class="form-group col-lg-12 col-md-12">
                      <label for="career_details">Career Details</label>
					  <!-- <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-book"></i></div> -->
                      <!-- <input type="text" class="form-control" id="career_details" name="career_details" placeholder="Enter Career Details" />-->
                      <textarea  class="form-control" id="career_details" name="career_details" rows="10" cols="80" placeholder="Enter Career Details">
                                            
                    </textarea>
					  </div>
                    </div>			

                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
<!--					<input type="submit"class="btn btn-default" name="submit" id="submit" value="Submit" />
					<button class="btn btn-default clearForm" type="reset">Reset</button>
-->              
			  </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         
      <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_career').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			career_name: {
                message: 'A valid Career Name is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 60,
						message: 'Career Name must be more than 2 and less than 60 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9 ]+$/,
                        message: 'This field can only consist of alphanumerics'
                    }
                }
            },
            career_cat_id: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
			career_details: {
                message: 'This field is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 2,
						max: 1000000000,
						message: 'Career Name must be more than 2 and less than 1000000000 characters long'
					}
                }
            }
        }
																			
    });
	
	
	});

    </script>	
	
	<!-- =========================================================================  -->