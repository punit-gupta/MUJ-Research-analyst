
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
    <title>mujpub1</title>
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
$dbname = "mujpub1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$title		=($_GET["title"] != "" ? $_GET["title"] : "");
$journal	=($_GET["journal"] != "" ? $_GET["journal"] : "");
$year		=($_GET["year"] != "" ? $_GET["year"] : "");
$volume		=($_GET["volume"] != "" ? $_GET["volume"] : "");
$pages		=($_GET["pages"] != "" ? $_GET["pages"] : "");
$doi		=($_GET["doi"] != "" ? $_GET["doi"] : "");
$url		=($_GET["url"] != "" ? $_GET["url"] : "");
$affiliation=($_GET["affiliation"] != "" ? $_GET["affiliation"] : "");
$abstract	=($_GET["Abstract"] != "" ? $_GET["Abstract"] : "");
$publisher	=($_GET["publisher"] != "" ? $_GET["publisher"] : "");
$document_type=($_GET["document_type"] != "" ? $_GET["document_type"] : "");
$isbn		=($_GET["ISSN"] != "" ? $_GET["ISSN"] : "");
$issn		=($_GET["ISBN"] != "" ? $_GET["ISBN"] : "");
$scopus		=($_GET["SCOPUS"] != "" ? $_GET["SCOPUS"] : "");
$sci		=($_GET["SCI"] != "" ? $_GET["SCI"] : "");
$esci		=($_GET["ESCI"] != "" ? $_GET["ESCI"] : "");
$ugc		=($_GET["UGC"] != "" ? $_GET["UGC"] : "");

		

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "mujpub1";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$query = "SELECT * FROM article where doi='$doi'";
$result = mysqli_query($connect, $query);
$rowcount=mysqli_num_rows($result);
if($rowcount>=1)
{
	echo "Title: ".$title." already exists in database <br>";
}
else{
		
$sql = "INSERT INTO `article` (`author`, `title`, `journal`, `year`,`volume`, `pages`, `doi`, `url`, `affiliation`, `abstract`, `keyword`, `correspondence_address1`, `publisher`, `issn`,`isbn`, `language`, `abbrev_source_title`, `document_type`, `source`,`index scopus`, `index SCI`, `index esci`, `index ugc`, `date`) 
VALUES ('', '$title', '$journal ', '$year', '$volume','$pages','$doi', '$url', '$affiliation', '$abstract', '', '', '$publisher', '$issn', '$isbn', '', '', '$document_type','','$scopus','$sci','$esci','$ugc',now())";
$a6=true;
								mysqli_autocommit($conn,FALSE);
								$a1=mysqli_query($conn,$sql);
								echo "<b>New</b>".$title." <br>";
								$a3=$_GET["count"];			
								$i=1;
								if($a1)
								{
									while($a3>=$i)
									{$author=$_GET["author".$i];
									$sql="INSERT INTO `author` (`author`, `doi`, `department`,`date`,`ord` ) VALUES ('$author', '$doi', '',now(),'$i');";
									echo $sql."<br>";
									$a4=mysqli_query($conn,$sql);
									$a5=true;
									if($a4)
									{echo "New author".$i." successfully<br>";}
									else 
									{ $a6=false; break;}
								
									$i++;
									}
								}
								else
								{$a6=false;}
												
							$a4=mysqli_query($conn, "DELETE FROM `articlec` WHERE doi='$doi';");
							$a2=mysqli_query($conn,"DELETE FROM `authorc` WHERE doi='$doi';");	

							if($a6&$a4&$a2 )
									{mysqli_commit($conn);
									 echo "Transaction Completed";
									echo " <a href=update_dept2.php?doi=".$doi."> Next Form</a>";}
									else
									{	mysqli_rollback($conn);		
										echo "Transaction Failed";}	 
	} 
	
		


 
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


