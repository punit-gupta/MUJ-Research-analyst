<?php include 'database_conf.php'; ?>
<div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
				 <!-- Sidebar scroll-->
					<a class="navbar-brand" href="index.php">
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
                      <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                    
                        
                        <!-- End Comment -->
                       
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="../admin/login.php" >Login</a>
                            
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
						
                        <li> <a c href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i>Dashboard </a>
                            
                        </li>
                       <li class="nav-label">Features</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Reports <span class="label label-rouded label-success pull-right">5</span></span></a>
                           
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="rallarticle.php">All Articles</a></li>
                         
                                <li><a href="authors.php">Authors</a></li>
                            </ul>
                            
                            
                        </li>
                        <li> <a  href="graph.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Graph Report </span></a>
                        </li>
						<li> <a  href="author_search.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Authors </span></a>
                        </li>
                         <li> <a  href="search.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Search </span></a>
                        </li>
						<li> <a  href="add_pub.php" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">ADD Publication </span></a>
                        </li>
                        
                        
                        <li class="nav-label">EXTRA</li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Publication Data <span class="label label-rouded label-success pull-right">3</span></span></a>
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
		
		