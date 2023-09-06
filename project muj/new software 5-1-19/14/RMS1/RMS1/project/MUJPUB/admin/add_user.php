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
      <?php include 'menua.php';?>
        <!-- End Left Sidebar  -->
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
		
		<?php
		$type="";
		$id="";
		$email="";
		 $dept="";
		if(isset($_GET['name'])&&isset($_GET['email'])&&isset($_GET['pass'])&&isset($_GET['type']))
		{$name=$_GET['name'];
		 $email=$_GET['email'];
		 $pass=$_GET['pass'];
		 $type=$_GET['type'];
		 $dept="";
		 $id="";
		   for($i=0;$i<=26;$i++)
		   {
			   if(isset($_GET["D".$i] )&& empty($dept))
				{
				 $dept=$dept."".$_GET["D".$i];
				}
			   else if(isset($_GET["D".$i] )&& !empty($dept))
				{
				 $dept=$dept.";".$_GET["D".$i];
				}
		   }
		 
		 //echo $dept;
		$query = "SELECT * FROM login where id='$email'";
		$result = mysqli_query($connect, $query);
		$rowcount=mysqli_num_rows($result);
		
		if($rowcount>=1)
		{	
			$query="UPDATE `login` SET `name`='$name',`id`='$email',`email`='$email',`pass`='$pass',`level`='$type',`department`='$dept' WHERE id='$email'";
			$result3 = mysqli_query($connect, $query);	
			if($result3)
			{echo 'User Updated';
				 $_SESSION["depts"] = $dept;
			}
			else
			{echo"already exist";
			}
		}
		else
		{  $query="INSERT INTO `login` (`name`, `id`, `email`, `pass`, `level`,`department`) VALUES ('$name', '$email', '$email', '$pass', '$type','$dept');";
			$result3 = mysqli_query($connect, $query);	
			if($result3)
			{echo 'User Added';
			}
			else
			{echo"already exist";
			}
		}
			
		}
		
		if(isset($_GET['id']))
		{
					$email=$_GET['id'];
					$query = "SELECT * FROM login where id='$email'";
					$result = mysqli_query($connect, $query);
			while($row1 = mysqli_fetch_array($result)):;
			$name=$row1[0];
			$pass=$row1[3];		
			$type=$row1[4];
			$dept=$row1[5];
			
			endwhile;
			
			
		}
		
		?>
		
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
            <div class="row">
                    <div class="col-12">
					    <div class="card">
                            <div class="card-body">
                                <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add User</h4>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    <div class="form-body">
                                        
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" name='name' class="form-control" value=<?php echo $name;?>>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" name='email' class="form-control form-control-danger" value=<?php echo $email;?> >
                                                     </div>
                                            </div>
                                            <!--/span-->
                                        </div>
										<div ><?php echo $dept; ?>
										<table>
										<tr>
										<td>
									<input type="checkbox" name="D1" value="Department of Computer and Communication Engineering, Manipal University Jaipur, Jaipur">Department of Computer and Communication Engineering 
									<br><input type="checkbox" name="D2" value="Department of Computer Science and Engineering, Manipal University Jaipur, Jaipur">Department of Computer Science and Engineering
									<br><input type="checkbox" name="D3" value="Department of Information Technology, Manipal University Jaipur, Jaipur">Department of Information Technology
									<br><input type="checkbox" name="D4" value="Department of Chemical Engineering, Manipal University Jaipur, Jaipur">Department of Chemical Engineering
									<br><input type="checkbox" name="D5" value="Department of Civil Engineering, Manipal University Jaipur, Jaipur">Department of Civil Engineering
									<br><input type="checkbox" name="D6" value="Department of Fine Arts (Applied Art), Manipal University Jaipur, Jaipur">Department of Fine Arts (Applied Art)
									<br><input type="checkbox" name="D7" value="Department of Mechatronics Engineering, Manipal University Jaipur, Jaipur">Department of Mechatronics Engineering
									<br><input type="checkbox" name="D9" value="Department of Mechanical Engineering, Manipal University Jaipur, Jaipur">Department of Mechanical Engineering
									<br><input type="checkbox" name="D10" value="Department of Automobile Engineering, Manipal University Jaipur, Jaipur">Department of Automobile Engineering
									<br><input type="checkbox" name="D11" value="Department of Electronics & Communication Engineering, Manipal University Jaipur, Jaipur">Department of Electronics & Communication Engineering
									<br><input type="checkbox" name="D12" value="Department of Electrical Engineering, Manipal University Jaipur, Jaipur">Department of Electrical Engineering
									<br><input type="checkbox" name="D13" value="Department of Physics, Manipal University Jaipur, Jaipur">Department of Physics
									<br><input type="checkbox" name="D14" value="Department of Mathematics & Statistics, Manipal University Jaipur, Jaipur">Department of Mathematics & Statistics
														
										
										</td>
										<td style="text-align: left;">
										<input type="checkbox" name="D15" value="Department of Chemistry, Manipal University Jaipur, Jaipur">Department of Chemistry
									<br><input type="checkbox" name="D16" value="Department of Biosciences, Manipal University Jaipur, Jaipur">Department of Biosciences
									<br><input type="checkbox" name="D17" value="Department of Interior Design, Manipal University Jaipur, Jaipur">Department of Interior Design
									<br><input type="checkbox" name="D18" value="School of Humanities & Social Sciences, Manipal University Jaipur, Jaipur">School of Humanities & Social Sciences
									<br><input type="checkbox" name="D19" value="Department of Fashion Design, Manipal University Jaipur, Jaipur">Department of Fashion Design
									<br><input type="checkbox" name="D20" value="Department of Planning, Manipal University Jaipur, Jaipur">Department of Planning
									<br><input type="checkbox" name="D21" value="Department of Journalism & Mass Communication, Manipal University Jaipur, Jaipur">Department of Journalism & Mass Communication
									<br><input type="checkbox" name="D22" value="Department of Business Administration, Manipal University Jaipur, Jaipur">Department of Business Administration
									<br><input type="checkbox" name="D23" value="Department of Hotel Management, Manipal University Jaipur, Jaipur">Department of Hotel Management
									<br><input type="checkbox" name="D24" value="Department of Hospitality & Tourism, Manipal University Jaipur, Jaipur">Department of Hospitality & Tourism
									<br><input type="checkbox" name="D25" value="TAPMI School of Business, Manipal University Jaipur, Jaipur">TAPMI School of Business
									<br><input type="checkbox" name="D26" value="Department of Commerce, Manipal University Jaipur, Jaipur">Department of Commerce
											</td>
										
										</tr>
										</table>
										</div>
										
										 <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                     <input type="text" name='type' class="form-control form-control-danger" value=<?php echo $type;?>>
                                                   
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Password</label>
                                                    <input type="text" name='pass' class="form-control form-control-danger" value=<?php echo $pass;?>>
                                                     </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                       
                                        <!--/row-->
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add/Update</button>
                                        <button type="button" class="btn btn-inverse" onclick="window.location.href='login_create.php'">Back</button>
                                    </div>
                                </form>
                            </div>
                        </div>
						
                                
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="../../index.html">Colorlib</a></footer>
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
  
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

	
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
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