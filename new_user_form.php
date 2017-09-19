<?php
//on submission of new user
if(isset($_POST['submit']))		{		
				//PICK FORM VALUES
				$username=$_POST['username'];
				$name=$_POST['surname']." ".$_POST['othername'];
				$user_email=$_POST['user_email'];
				$user_tel=$_POST['user_tel'];
				$user_password=md5($_POST['user_password']);
				$user_role=$_POST['user_role'];		
				$sql="INSERT INTO $db_name.users (user_name, full_name, user_email, user_tel, user_password, user_role, joining_date) 	VALUES('$username','$name','$user_email','$user_tel','$user_password','$user_role',NOW())";
				$result_of_adding = mysqli_query($con,$sql);
					
				//error message in case update fails
				if(!$result_of_adding){ 				
				$message="Failed to add new user!";}
				else{
					$message="Successful";			
					
				}//else
				
		}//if(isset($_POST['submit']))	
?>

<div class="row">
		 <div class="col-lg-10 col-md-11 col-sm-12 col-xs-12">
		 
		 <?php if(isset($message)){ //if there is an alert
	
		if($message=="Successful"){ //positive alert ?>
			<div class="alert alert-warning alert-dismissable">
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			Successfully added <?php  echo $name;?> to Users.
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
		  <form name="register_user" id="register_user" class="register_user" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
			<div class="box-header with-border bg-green-gradient">
              <h3 class="box-title">Add New User</h3> 
            </div>
            <div class="box-body">
				<div class="row">
		
				  	<div class="form-group col-lg-6 col-md-6">
                      <label for="username">Username</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-user"></i></div>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
					  </div>
                    </div>
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="user_email">Email address</label>
					  <div class="input-group">
					 <div class="input-group-addon"> @ </div>
                      <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter email">
					  </div>
                    </div>
					
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="surname">Surname</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-bullhorn"></i></div>
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname">
					  </div>
                    </div>
					
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="othername">Other Names</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-bullhorn"></i></div>
                      <input type="text" class="form-control" id="othername" name="othername" placeholder="Enter othername">
					  </div>
                    </div>
					
					
                    <div class="form-group col-lg-6 col-md-6">
                      <label for="user_password">Password</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-key"></i></div>
                      <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password">
					  </div>
                    </div>
					
					<div class="form-group col-lg-6 col-md-6">
                      <label for="retype_user_password">Re-type Password</label>
					  <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-key"></i></div>
                      <input type="password" class="form-control" id="retype_user_password" name="retype_user_password" placeholder="Retype Password">
					  </div>
                    </div>

					 <!-- select -->
                    <div class="form-group col-lg-6 col-md-6">					
					 <label for="user_role">Role</label>
					 <div class="input-group">
					 <div class="input-group-addon"><i class="fa fa-gears"></i></div>
                      <select class="form-control" id="user_role" name="user_role">
					  	<option value="">Please Select</option>
                        <option value="0">Admin</option>
                        <option value="1">Teacher / Data Entrant</option>
                      </select>
					  </div>
                    </div>
								
                    
					 <div class="form-group col-lg-6 col-md-6">
					 <label for="phone">Phone</label><br>
					 <input type="tel" id="user_tel" name="user_tel" class="form-control"></div>
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
    $('#register_user').bootstrapValidator({
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
			user_password: {
                message: 'A password is required in this field',
                validators: {
                    notEmpty: {
                        message: 'Password cannot be empty'
                    },
					stringLength: {
						min: 6,
						max: 30,
						message: 'Password length must between 6 and 30 characters'
					},
					identical: {
						field: 'retype_user_password',
						message: 'The password and its confirm are not the same'
					}
                }
            },
			retype_user_password: {
                message: 'A password is required in this field',
                validators: {
                    notEmpty: {
                        message: 'This field is required and cannot be empty'
                    },
					stringLength: {
						min: 6,
						max: 30,
						message: 'Password length must between 6 and 30 characters'
					},
					identical: {
						field: 'user_password',
						message: 'The password and its confirm are not the same'
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
	$('#register_user').on('click', "button[type='reset']",  function() {
	$('#register_user').bootstrapValidator('resetForm', true);

	});
	
	});

    </script>	
	
	<!-- =========================================================================  -->