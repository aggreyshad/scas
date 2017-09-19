<?php
session_start();

if(!isset($_SESSION['user_session'])) // for logged in users only
{	header("Location: login.php"); }

include_once 'dbconfig.php';
include_once 'functions.php';

$page_name="Edit User";
$page_description="Edit User Profile";

//// ********************************************************************************
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
///// **********************************************************************************

include_once 'header.php';
include_once 'top_nav.php';
include_once 'check_login_status.php'; 
include_once 'main_sidebar.php';

?>      

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1><?php echo (isset($page_name) ? $page_name : 'SCAS') ?>
            <small><?php echo (isset($page_description) ? $page_description : '') ?></small>
          </h1>
          
          <!--bread crumbs -->          
          	<ol class="breadcrumb">
              <?php echo breadcrumbs( '' ); ?>
		  	</ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->
          <?php include 'edit_user_form.php'; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <?php include_once 'footer.php'; ?>