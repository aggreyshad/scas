<?php
session_start();

if(!isset($_SESSION['user_session'])) // for logged in users only
{	header("Location: login.php"); }

include_once 'dbconfig.php';
include_once 'functions.php';

$page_name="Combination Details";
$page_description="View Combination Details";

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
          <?php include 'combination_details.php'; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    <?php include_once 'footer.php'; ?>