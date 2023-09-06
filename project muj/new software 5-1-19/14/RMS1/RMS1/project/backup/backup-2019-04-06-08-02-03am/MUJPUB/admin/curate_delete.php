<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title><?php session_start(); echo "".$_SESSION["project"]; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
       
            <!-- End Sidebar scroll-->
        <?php include 'menua.php';  ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
			
                        <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
					<div class="card">
                    <div class="card-body">
	
				 
						<?php

							
							$sno = 1;
							$connect=mysqli_connect($hostname, $username, $password, $databaseName);
							// Check connection
							if (mysqli_connect_errno())
							  {
							  echo "Failed to connect to MySQL: " . mysqli_connect_error();
							  }
							  
							if(isset($_GET["doi"]))
							{
								$date=$_GET["doi"];
							
							$query = "select uid from `articlec` where uid='$date'";
							$result = mysqli_query($connect, $query);
							
							$rowcount=mysqli_num_rows($result);
							// Set autocommit to off
							mysqli_autocommit($connect,FALSE);
							//echo "trans1 ".$rowcount;
							if($rowcount>=1)
							{$a1=true;
							//echo "trans2";
								
							 	while($row1 = mysqli_fetch_array($result)):;
								
									if($a1)
								    {$a2=mysqli_query($connect,"DELETE FROM authorc where uid='$row1[0]'");
								     echo "Deleting Article DOI:$row1[0]<br>";
									 $a3=mysqli_query($connect,"DELETE FROM articlec where uid='$row1[0]'");
									 //echo "Deleting Authors DOI:$row1[0]<br>";
									if($a1&$a3)
									{$a1=$a2;}
									else
									{break;}
									}
								 endwhile;
								 
									if($a1 )
									{mysqli_commit($connect);
									 echo "Transaction Completed";
									    ?>
								<?php 
									}
									else
									{	mysqli_rollback($connect);		
										echo "Transaction Failed";								
									}	 
								 
							}
							else
							{
								echo "No Record Found";
								
							}								
							}				
							?>
							
	</div>
					</div>
                </div>

			</div>		
            <footer class="footer"> © 2018 All rights reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
	<script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

</html>
<!-- Localized -->