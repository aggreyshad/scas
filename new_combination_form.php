<?php 
//on submission of new combination
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$subject_id = $_POST['subject_id'];
				$combination_name='';
				for($i = 0; $i < count($subject_id); $i++){
					if ($i != (count($subject_id)-1)){
					$combination_name.=$subject_id[$i]."-"; //just a separator between names
					}
					else{
					$combination_name.=$subject_id[$i]; //just a separator after last name
					}
				}
				$sql="INSERT INTO $db_name.combination (combination_name) VALUES( '$combination_name')";
				$result_of_adding = mysqli_query($con,$sql);	
				// **************************************************************************************
				
				$sql="select combination_id from $db_name.combination where $db_name.combination.combination_name='$combination_name'"; // get id of combination you just inserted
				$result = mysqli_query($con,$sql) or die('Failed to get is of recently added combination');
					
				
				if(mysqli_num_rows($result)>0){ //if the combination exists	
				while($row = mysqli_fetch_array($result)){
				$combination_id=$row['combination_id'];}	//get its id
				
					// **************************************************************************************
					// Add subjects to combination existing combination
					for($i = 0; $i < count($subject_id); $i++){
					$sql2="INSERT INTO $db_name.subjectcombination (combination_id,subject_id) VALUES( $combination_id,$subject_id[$i])";
					$result_of_adding2 = mysqli_query($con,$sql2);				
					}
				}
				
				if((!$result_of_adding) && (!$result_of_adding2)) { $message="Failed to add new combination!";}
				else{$message="Successful";}
		}
?>

 <div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
			Successfully added <?php  echo $combination_name;?> to combinations.
			</div> 
		<?php }
		
		else{ //failed to add new combination ?>
			<div class="alert alert-danger alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">x</button>
			<?php  echo $message;?>  <!-- <a href="directory.php">Click Here To View all other Staff Members</a> <br/>--> 
			</div>
		<?php }
		
	}?>

          <!-- Default box -->
          <div class="box box-solid box-success">
		  <form name="register_combination" id="register_combination" class="register_combination" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add New Combination</h3> 
            </div>
            <div class="box-body">
				<div class="row">
		
					<!-- select -->
                    <div class="form-group col-lg-6 col-md-6">					
					 <label for="combination_role">Select Subject</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                      <select class="form-control select2" id="subject_id[]" name="subject_id[]" multiple="multiple" data-placeholder="Select a Combination" >
						<?php $sql="select * from $db_name.subject"; $result = mysqli_query($con,$sql);
						//if there are no users
						if(mysqli_num_rows($result)>=1){ 
						while($row = mysqli_fetch_array($result)){
						?>
                        <option value="<?php printf($row['subject_id']); ?>"><?php echo $row['code']." - ". $row['subject_name']; ?></option>
            			<?php }
						}?>
                       </select>
					  </div>
                    </div><!-- /.select -->
                    
                    
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="submit" id="submit">Submit <i class="fa fa-arrow-circle-right"></i></button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->
         
    <!-- =========================================================================  -->
	<!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#register_combination').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			subject_id[]: {
                message: 'A valid combinationname is required',
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
	$('#register_combination').on('click', "button[type='reset']",  function() {
	$('#register_combination').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>