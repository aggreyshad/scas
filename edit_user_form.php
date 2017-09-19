<?php
/*
// ******* code moved to edit_user.php ****************************
//on submission of edit user form
if(isset($_POST['edituser']))		{	

				
				
				//$username=$_POST['username'];
				$name=$_POST['surname']." ".$_POST['othername'];
				$user_email=$_POST['user_email'];
				$user_tel=$_POST['user_tel'];
				$user_role=$_POST['user_role'];	
				$userId=$_POST['userId'];
					
				$sql="UPDATE $db_name.users SET full_name='$name',user_email='$user_email',user_tel='$user_tel', user_role='$user_role' WHERE user_id=$userId";
				$result_of_editting = mysqli_query($con,$sql);
					
				//error message in case update fails
				if(!$result_of_editting){ $message="Failed to edit user!";}
				else{$message="Successful";}
		}
// **************** above code moved to edit user.php
*/
?>

<?php 
		//if a request to edit is made
		if(isset($_REQUEST['userId'])){
		$sql="select * from $db_name.users WHERE user_id=".$_REQUEST['userId'];	
		$result = mysqli_query($con,$sql);	
		
		}
		
		//if no user edit request is made //or if there are no user with the given id
		if(!isset($result) || mysqli_num_rows($result)!=1){ ?>
		<div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit user failed</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
				Sorry! If you arrived at this page by mistake, contact the administrator!
				</div>
			  </div>
			 </div>
		</div>
		<?php }//close if there are no users
		
		else{ //shows user to be editted 
		$row = mysqli_fetch_array($result);
		
		
		?>
		
		
		 <div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			Successfully updated <?php echo ucwords(strtolower($row['user_name'])); ?>'s information. 
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
		  <form name="edit_user" id="edit_user" class="edit_user" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
		  	
			<!-- get user id and pass it as a value in hidden field -->		  	
			<input type="hidden" name="userId" id="userId" value="<?php echo $row['user_id']; ?>" />
		  
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Edit User "<?php echo ucwords(strtolower($row['user_name'])); ?>"</h3> 
            </div>
            <div class="box-body">
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="username">Username</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" title="Username. This field can not be edited!" class="form-control" id="username" name="username" placeholder="Enter username" value="<?php echo $row['user_name']; ?>" disabled="disabled">
					  </div>
                    </div>
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="user_email">Email address</label>
					  <div class="input-group">
					 <div class="input-group-addon"> @ </div>
                      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter email" value="<?php echo $row['user_email']; ?>">
					  </div>
                    </div>
					
					
					<?php 
					//split name into first and last name 
					//fullname must be made up of atleast 2 names separared by a space
					$fullname = $row['full_name'];
					list($surname, $othername) = explode(" ", $fullname, 2);
					?>
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="surname">Surname</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-bullhorn"></i></div>
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" value="<?php echo $surname; ?>">
					  </div>
                    </div>
					
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="othername">Other Names</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-bullhorn"></i></div>
                      <input type="text" class="form-control" id="othername" name="othername" placeholder="Enter othername" value="<?php echo $othername; ?>">
					  </div>
                    </div>
					
					
					 <!-- select -->
                    <div class="form-group col-lg-6 col-md-6">					
					 <label for="user_role">Role</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-gears"></i></div>
					 
                      <select class="form-control" id="user_role" name="user_role">
					  	<option value="" <?php if($row['user_role']=="") echo "selected=\"selected\"" ?> >Please Select</option>
                        <option value="0" <?php if($row['user_role']==0) echo "selected=\"selected\"" ?> >Admin</option>
                        <option value="1" <?php if($row['user_role']==1) echo "selected=\"selected\"" ?> >Teacher / Data Entrant</option>
                      </select>
					  </div>
                    </div>
								
                    
					 <div class="form-group col-lg-6 col-md-6">
					 <label for="phone">Phone</label><br>
					 <input type="tel" id="user_tel" name="user_tel" class="form-control" value="<?php echo $row['user_tel']; ?>"></div>
						 <script src="intl-tel-input-master/build/js/intlTelInput.js"></script>
						 <script>
						  $("#user_tel").intlTelInput({
						  preferredCountries: ['ug'],
						  utilsScript: "intl-tel-input-master/lib/libphonenumber/build/utils.js" });
						 </script>                
					
					</div>
					
					<!--<div class="form-group col-lg-6 col-md-6">
                      <label for="user_photofile">Profile Picture</label>
					  <br>
							 <input type="file" id="user_photofile">					  
							<button class="btn btn-default" id="user_photofile">Upload <i class="fa fa-arrow-circle-right"></i></button>
                      
                    </div>
					<div class="form-group col-lg-6 col-md-6">
					</div>-->
					
                  </div><!-- /.box-body -->
				  			  
			  <div class="box-footer ">
                    <button type="submit" class="btn btn-default" name="edituser" id="edituser">Submit <i class="fa fa-arrow-circle-right"></i></button>
<!--					<input type="submit"class="btn btn-default" name="submit" id="submit" value="Submit" />
-->					<button class="btn btn-default clearForm" type="reset">Reset</button>
              </div><!-- /.box-footer-->
			  
			 </form>
          	</div><!-- /.box -->
		  </div><!-- column -->
		 </div><!-- /.row -->	 
		 <?php }//close showing the users being edited ?>
		 
         
         <!-- validation code for forms -->	
	<script>	
	$(document).ready(function() {
    $('#edit_user').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			username: {
                message: 'A valid username is required',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 6,
						max: 30,
						message: 'Username must be more than 6 and less than 30 characters long'
					},
					
                    regexp: {
                        regexp: /^[A-Za-z0-9]+$/,
                        message: 'This field can only consist of alphanumerics'
                    }
                }
            },
			surname: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 3,
						max: 40,
						message: 'Surname must be between 3 and 40 characters long'
					},
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'The field can only consist of alphabets'
                    }
                }
            },
            othername: {
                message: 'The field is not valid',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 3,
						max: 40,
						message: 'Otherame must be between 3 and 40 characters long'
					},
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'The field can only consist of alphabets'
                    }
                }
            },
			user_role: {
                message: 'Please select a role',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    }
                }
            },
            user_email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },					
                   	emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
																			
    });
	
	
//	/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	
	
	//form reset code	
	$('#edit_user').on('click', "button[type='reset']",  function() {
	$('#edit_user').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>