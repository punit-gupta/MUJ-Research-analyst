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
        <?php 	include 'menu.php';	    ?>
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
			
        	<script>
function loadDoc(x,y) {
	
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     y.innerHTML= this.responseText;
    }
  };
  xhttp.open("GET", x, true);
  xhttp.send();
}
</script>                
			
			<div class="container-fluid">
                <!-- Start Page Content -->
				<div class="row">
				
				 	 <div class="col-lg-12">
                        <div class="card">
                            
							<?php
							$type=$_GET["type"];
							$dept=$_GET["dept"];
							$sno = 1;
							if(isset($_GET["year"]))
							{$year=$_GET["year"];
						     
							 if($type!='other')
								{$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='$type' and article.year='$year' and department='$dept')";
							}
								else
								{$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where  (article.document_type='Editorial' or article.document_type='Letter'or article.document_type='Erratum'or article.document_type='Retracted') and article.year='$year'and author.department='$dept')";
								}	
							}
							else 
							{
								$query = "SELECT * FROM `article` WHERE document_type='$type'";
							}
							
							$result = mysqli_query($connect, $query);

							?>
							
							
							<div class="card-title">
                                <h1><?php 
									
								if($type!='other')
								{echo $type;}
								else
								{echo "Editorial/ Letter/Poster Presentation/ Invited Lectures" ;}
							?> </h1>
							
							<?php
							
							if($_GET["type"]=='Book' &&isset($_GET["year"]))
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&D='.$dept.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							else if($type=='Book' )
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&D='.$dept.'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							
							if($type=='Journal' &&isset($_GET["year"]))
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&D='.$dept.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							else if($type=='Journal' )
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&D='.$dept.'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							
							if($type=='Conference Paper' &&isset($_GET["year"]))
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&D='.$dept.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							else if($type=='Conference Paper' )
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&D='.$dept.'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							
							 if($type=='Book Chapter' &&isset($_GET["year"]))
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&D='.$dept.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							else if($type=='Book Chapter' )
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&D='.$dept.'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							
							if($type=='other' &&isset($_GET["year"]))
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&D='.$dept.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							else if($type=='other' )
							{
								echo '<div id=\''.$type.'\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&D='.$dept.'\',document.getElementById("'.$type.'")) ;</script>';
							
							}
							
							?>
                        
                        </div>
                    </div>
					
                <!-- End PAge Content -->
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