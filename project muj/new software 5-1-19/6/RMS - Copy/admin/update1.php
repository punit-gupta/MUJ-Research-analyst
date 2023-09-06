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
						 
						 if(  isset($_POST['publisher'])&&isset($_POST['Abstract'])&&isset($_POST['UGC'])&& isset($_POST['OTHER'])&& isset($_POST['SCI'])&&isset($_POST['ESCI'])&&isset($_POST['title'])&&isset($_POST['journal'])&&isset($_POST['doi'])&&isset($_POST['year'])&&isset($_POST['volume'])&&isset($_POST['pages'])&&isset($_POST['affiliation'])&&isset($_POST['ISSN'])&&isset($_POST['ISBN'])&&isset($_POST['type'])&&isset($_POST['source'])&&isset($_POST['SCOPUS']))
						 {
							$abstract	=$_POST["Abstract"] ;
							$publisher	=$_POST["publisher"];
							$ugc		=$_POST['UGC'];
							$other		=$_POST['OTHER'];
							$sci		=$_POST['SCI'];
							$scopus		=$_POST['SCOPUS'];
							$esci		=$_POST['ESCI'];
							 $title		=$_POST['title'];
							 $doi		=$_POST['doi'];
							 $uid		=$_POST['uid'];
							 $url		=$_POST['url'];
							 $journal	=$_POST['journal'];
							 $pages  	=$_POST['pages'];
							 $volume    =$_POST['volume'];
							 $year      =$_POST['year'];
							 $issn   	=$_POST['ISSN'];
							 $isbn  	=$_POST['ISBN'];
							 $type  	=$_POST['type'];
							 $source  	=$_POST['source'];
							 $affiliation  	=$_POST['affiliation'];
						    $title= str_replace("'"," ",$title);
						
						   $sql = "UPDATE `article` SET `author`='',`title`='$title',`journal`='$journal',`year`='$year',`volume`='$volume', abstract='$abstract',publisher='$publisher',`pages`='$pages',`doi`='$doi',`url`='$url',`affiliation`='$affiliation',`issn`='$issn',`isbn`='$isbn',`document_type`='$type',`source`='$source',`index scopus`='$scopus',`index SCI`='$sci',`index esci`='$esci',`index ugc`='$ugc',`index other`='$other' where uid='$uid'";
								//echo $sql;
							if ($conn->query($sql) === TRUE) 
							{
								echo "Record Updated Successfully";
							}else
							{echo "Error: " . $sql . "<br>" . $conn->error;}
						 }
						 else if(isset($_POST['name1'])&& isset($_POST['journal'])&& isset($_POST['SCOPUS'])&& isset($_POST['UGC'])&& isset($_POST['OTHER'])&& isset($_POST['SCI'])&& isset($_POST['ESCI'])&& isset($_POST['type']))
						 {
							 
							$ugc		=$_POST['UGC'];
							$other		=$_POST['OTHER'];
							$sci		=$_POST['SCI'];
							$scopus		=$_POST['SCOPUS'];
							$esci		=$_POST['ESCI'];
							$journal	=$_POST['journal'];
							$type	=$_POST['type'];
						
						   $sql = "UPDATE `article` SET `index scopus`='$scopus',`index SCI`='$sci',`index esci`='$esci',`index ugc`='$ugc',`index other`='$other' ,`document_type`='$type' where `journal`='$journal'";
								//echo $sql;
							if ($conn->query($sql) === TRUE) 
							{
								echo "Record Updated Successfully";
							}else
							{echo "Error: " . $sql . "<br>" . $conn->error;}
						 }
						 else
						 {
							 echo "missing";
						 }
						?>
					
							</div>
						</div>
					</div>
                </div>
				 <div class="row">
                    <div class="col-12">
					<div class="card">
                            <div class="card-body">
                            
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            
                                        </thead>
										
												
										</table>
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