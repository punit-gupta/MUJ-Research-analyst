
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
    <title>mujpub</title>
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
        <?php include 'menua.php';?>
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
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
					<div class="card">
                    <div class="card-body">	
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mujpub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



?>
<?php include 'bibtexParse/PARSEENTRIES.php' ?>
<?php include 'bibtexParse/PARSECREATORS.php' ?>
<?php
if( isset($_GET['name'])) 
   {
	$name=   $_GET['name'];
   }
$parse = NEW PARSEENTRIES();
$parse->expandMacro = FALSE;
$parse->removeDelimit = TRUE;
$parse->fieldExtract = TRUE;

$parse->openBib($name);
$parse->extractEntries();
$parse->closeBib();
list($preamble, $strings, $entries, $undefinedStrings) = $parse->returnArrays();

$sno=0;
 
 mysqli_autocommit($conn,FALSE);
 $a1=true;
 
 foreach ( $entries as $entry ) 
 {
if($a1)
{	
$title='';
$cite=$entry["note"];
 //echo $cite."<br>";

$cite=str_replace("cited By ","",$cite);
$cite=str_replace("; Article in Press","",$cite);
	
 //echo $cite."<br>";

		if(isset($entry["title"]))
		$title = $entry["title"]; 
	    $journal = $entry["journal"]; 
		$authorss = $entry["author"]; 
		$authorss=str_replace("'","\'",$authorss);
		$title=str_replace("'","\'",$title);		


$query = "SELECT * FROM article where title='$title' and journal='$journal'and author='$authorss'";
$result = mysqli_query($conn, $query);
$rowcount=mysqli_num_rows($result);
if($rowcount>=1)
{    $row1 = mysqli_fetch_array($result);
	echo "<b>Aricle found</b>".$title."<br>";
	$uid=$row1[27];
	$sql="select * from cite where uid='$uid'";
	$result1=mysqli_query($conn,$sql);
	$rowcount1=mysqli_num_rows($result1);
	if($rowcount1>=1)
	{
		$sql="update cite set cite='$cite' where uid='$uid'";
	     $a1=mysqli_query($conn,$sql);
		 //echo "1<br>";
		 $sno++;
	}
	else
	{
		$sql="INSERT INTO `cite`(`uid`, `cite`) VALUES ('$row1[27]','$cite')";
	     $a1=mysqli_query($conn,$sql);
		// echo "2<br>";
		 $sno++;
	}
		
}else{
	
	 echo "<b>Aricle not found</b>".$title." <br>";
}



 }
}
									if($a1 )
									{mysqli_commit($conn);
									 echo "Transaction Completed";
																		}
									else
									{	mysqli_rollback($conn);		
										echo "Transaction Failed";								
									}	 
echo "Total updated: ".$sno."<br>";

$conn->close();?>
</div>
					</div>
                </div>

			</div>		
									   
							
            <!-- End Container fluid  -->
            <!-- footer -->
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


