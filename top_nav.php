	  <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="home.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SCAS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><i class="ion ion-university"></i></b> SCAS</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
		  <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo ($row['photofile']!= NULL ? 'uploads/'.$row['photofile'] : 'uploads/user.jpg'); ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo ucwords($row['full_name']); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo ($row['photofile']!= NULL ? 'uploads/'.$row['photofile'] : 'uploads/user.jpg'); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo ucwords($row['full_name']);?>
                      <small>User since - <?php $date = date_create($row['joining_date']); echo date_format($date, 'jS F Y');?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="edit_user.php?userId=<?php echo $row['user_id']; ?>" class="btn btn-default btn-flat"><span class="fa fa-user"></span> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!--<li>
                <a href="#" data-toggle="control-sidebar"><i class="glyphicon glyphicon-plus"></i></a>
              </li> --> 
              
                <li class="dropdown">
                <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-plus"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="add_new_subject.php">Subject</a></li>
                  <li><a href="add_new_exam.php" class="dropdown-toggle" data-toggle="dropdown" >Exam</a>
                  	 <ul>
                     	<li><a href="add_new_exam.php">Add New Exam</a></li>
                     	<li><a href="view_exams.php">View Exams</a></li>
                     	<li><a href="manage_exam_scores.php">Exam Scores</a></li>
                     </ul>
                  </li>
                  <li><a href="#">Prerequisites</a></li>
                  <li><a href="add_new_combination.php">Combination</a></li>
                  <li><a href="add_new_student.php">Student</a></li>
                  <li><a href="#">Course</a></li>
                  <li><a href="#">Aptitude Test</a></li>
                  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Career</a>
                  	<ul>
                     	<li><a href="add_new_career_category.php">Add New Career Category</a></li>
                     	<li><a href="view_career_category.php">View Career Category</a></li>
                     	<li><a href="add_new_career.php">Add New Career</a></li>
                     </ul>
                  
                  </li>
                  <li><a href="#">Salary Scales</a></li>
                  <li><a href="add_new_user.php">User</a></li>
                </ul>
           </li>
       
            </ul>
          </div>
        </nav>
      </header>