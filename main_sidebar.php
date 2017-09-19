<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo ($row['photofile']!= NULL ? 'uploads/'.$row['photofile'] : 'uploads/user.jpg'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo ucwords($row['full_name']);?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">Informed Combination Decisions</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-users"></i> <span>User Accounts</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_new_user.php">Add New User</a></li>
                <li><a href="view_users.php">View Users</a></li>
              </ul>
            </li>
            
             <li class="treeview">
              <a href="#"><i class="fa fa-folder-open-o"></i> <span>Student Data</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_new_student.php">Add New Student</a></li>
                <li><a href="import_student_data.php">Import Student Data</a></li>
                <li><a href="view_students.php">View Students</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-bar-chart-o"></i> <span>Performance</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="exam_scores.php">Exam Scores</a></li>
                <li><a href="exam_scores.php">UNEB Results</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Subjects</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_new_subject.php">Add New Subject</a></li>
                <li><a href="import_subject.php">Import New Subject</a></li>
                <li><a href="view_subjects.php">View Subjects</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-list"></i> <span>Combinations</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_new_combination.php">Add New Combination</a></li>
                <li><a href="view_combinations.php">View Combinations</a></li>
                <li><a href="get_combination_of_choice.php">Select Preffered</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-university"></i> <span>Courses</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_new_course.php">Add New Course</a></li>
                <li><a href="view_courses.php">View Courses</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-briefcase"></i> <span>Careers</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_new_career.php">Add New Career</a></li>
                <li><a href="view_careers.php">View Careers</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>