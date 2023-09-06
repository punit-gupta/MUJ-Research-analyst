
<?php
session_start();


if (isset($_SESSION['Name'])) 
{
//print_r($_SESSION);

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
	header("Location: login.php"); 
}
$_SESSION['LAST_ACTIVITY'] = time();



?>
















<div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
				 <!-- Sidebar scroll-->
					<a class="navbar-brand" href="aindex.php">
                        <!-- Logo icon -->
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                       <span><img src="images/logo-text1.png" alt="homepage" class="dark-logo" /></span>
                    </a>
            
                </div>
                <!-- End Logo -->
               <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                    
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                       
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
				
            </nav>
        </div>
		<div class="left-sidebar">
            
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                 <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider">
                            
                        </li>
                        <li class="nav-label">Home</li>
						
                        <li> <a href="aindex.php" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard </a></li>
						
						
						
                       <li class="nav-label">Features</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Reports <span class="label label-rouded label-success pull-right">3</span></span></a>
                           <ul aria-expanded="false" class="collapse">
                                <li><a href="../admin/rallarticle.php">All Articles</a></li>
                                <li><a href="../admin/jc.php">Journals</a></li>
                                <li><a href="../admin/au.php">Authors</a></li>
                            </ul>
                            
                            
                        </li>
						<li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-level-down"></i><span class="hide-menu">Department</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow" href="#" aria-expanded="false">Dept. of CCE</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#">Dashboard</a></li>
                                        <li><a href="#">Faculty</a></li>
                                        <li><a href="#">Graph</a></li>
                                        <li><a href="#">Others</a></li>
                                    </ul>
                                </li>
                             
                            </ul>
                        </li>


                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Update Data <span class="label label-rouded label-success pull-right">4</span></span></a>
                           
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="bulkupdate.php">Update bulk</a></li>
                                <li><a href="update.php">Update Article</a></li>
                                <li><a href="all_flag.php">Update Department</a></li>
								<li><a href="update_url.php">Update URL</a></li>
								<li><a href="update_cite.php">Update Cite</a></li>
								<li><a href="bulk_affiliation.php">Update Affiliation</a></li>
                            </ul>
                            
                            
                        </li>
                        
                         <li> <a  href="../admin/search.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Search </span></a>
						 <li> <a  href="../admin/graph.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Graph Report </span></a>
                        </li>
                        <li> <a  href="add_pub.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">ADD Publication </span></a>
                        </li>
                        </li>
                        <li> <a  href="../admin/doi.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">DOI Search Online </span></a>
                        </li>
						<li> <a  href="../admin/curate_list.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Curate </span></a>
                        </li>
						<li> <a  href="../admin/Reportg.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Generate Report </span></a>
                        </li>
                       
						<li> <a  href="../admin/upload_file.php?field=Journal" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Upload</span></a>
                        </li>
						<li> <a  href="../admin/upload_cite.php?field=Journal" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Upload citation</span></a>
                        </li>
                        <li> <a  href="../admin/delete_article.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Delete</span></a>
                        </li>
						
                        <li class="nav-label">EXTRA</li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Publication Data <span class="label label-rouded label-success pull-right">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_article.php">All Articles</a></li>
                                <li><a href="journal.php">Journal\Conferences</a></li>
                                <li><a href="authors.php">Authors</a></li>
								<li><a href="year.php">Year</a></li>
                            </ul>
                        </li>
                        
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
		
		
		
		<?php
}
else
{
	
	header("Location: login.php"); 
}
?>