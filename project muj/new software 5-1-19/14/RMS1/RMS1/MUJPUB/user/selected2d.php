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
        <?php 	include 'menu.php';		    ?>
     
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
				 <?php
				 
				 
							
							$sno = 1;
							$dept=$_GET["dept"];
							$dept1=urlencode ( $dept );
							if(isset($_GET["year"]) && isset($_GET["index"]))
							{ $year=$_GET["year"];
						      $index=$_GET["index"];
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Book' and article.year='$year' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or web='$index' or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]))
							{ 
						      $index=$_GET["index"];
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Book' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or web='$index' or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
								
							}
							else 
							{
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Book' and author.department='$dept')";
							}
							//echo $query;
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{
							?>	
				 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                               <h1>Book</h1>
                            </div>
							<?php
							
							if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{
							echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&SCOPUS=SCOPUS&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&SCI=SCI&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\' ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&WEB=WEB&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\' ,document.getElementById("BOOK")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&WEB=WEB&D='.$dept1.' \',document.getElementById("BOOK")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&SCOPUS=SCOPUS&D='.$dept1.'\' ,document.getElementById("BOOK")) ;</script>';
							}
							
							else 
							{echo '<div id=\'BOOK\' ></div><script>loadDoc(\'article_cite.php?BOOK=BOOK&D='.$dept1.'\',document.getElementById("BOOK")) ;</script>';
							
							}
							?>
                        </div>
                    </div>

					<?php   }
						

							
							$sno = 1;	
							if(isset($_GET["year"]) && isset($_GET["index"]))
							{ $year=$_GET["year"];
						      $index=$_GET["index"];
								
								//$query = "SELECT * FROM `article` WHERE document_type='Book Chapter' and year='$year' and (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index')";
								//$query = "SELECT * AS `num` FROM article where `index SCI` ='SCI'  and uid in (SELECT DISTINCT uid FROM author where department='$dept') and document_type='Book Chapter' and year='$year' and (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index')";
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Book Chapter' and article.year='$year' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
							 //echo $query;
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]))
							{ 
						      $index=$_GET["index"];
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Book Chapter' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or web='$index' or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
								
							}
							else 
							{$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Book Chapter' and author.department='$dept')";
							}
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{
							?>	
               
				 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                               <h1>Book Chapters </h1>
								
                            </div>
							<?php
							
							if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{
							echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&SCOPUS=SCOPUS&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK1")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&SCI=SCI&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK1")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&WEB=WEB&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK1")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&WEB=WEB&D='.$dept1.'\',document.getElementById("BOOK1")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&SCI=SCI&D='.$dept1.'\',document.getElementById("BOOK1")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&SCOPUS=SCOPUS&D='.$dept1.'\',document.getElementById("BOOK1")) ;</script>';
							}
							else
							{echo '<div id=\'BOOK1\' ></div><script>loadDoc(\'article_cite.php?BOOKC=BOOK+CHAPTER&D='.$dept1.'\',document.getElementById("BOOK1")) ;</script>';
							}
							?>
							
                        </div>
                    </div>
					
							<?php }?>
							
						<?php

							$sno = 1;
							$dept=$_GET["dept"];
							if(isset($_GET["year"]) &&isset($_GET["index"]))
							{$year=$_GET["year"];
						     $index=$_GET["index"];
								//$query = "SELECT * FROM `article` WHERE document_type='Journal'and year='$year' and (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index' and department='$dept')";
								$query = "select * from article where uid in(SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Journal' and article.year='$year' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
							//echo $query;
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]))
							{ 
						      $index=$_GET["index"];
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Journal' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or web='$index' or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
								
							}
							else
							{$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Journal' and author.department='$dept')";
							
							}
							//echo $query;
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>0)
							{
							?>	
					  <div class="col-lg-12">
                        <div class="card">
						
                            <div class="card-title">
                                <h1>Journals </h1>

                            </div>
								<?php
							
							if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{
							echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&SCOPUS=SCOPUS&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK2")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&SCI=SCI&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK2")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&WEB=WEB&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK2")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&WEB=WEB&D='.$dept1.'\',document.getElementById("BOOK2")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&SCI=SCI&D='.$dept1.'\',document.getElementById("BOOK2")) ;</script>';
							}else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&SCOPUS=SCOPUS&D='.$dept1.'\',document.getElementById("BOOK2")) ;</script>';
							}
							
							else
							{echo '<div id=\'BOOK2\' ></div><script>loadDoc(\'article_cite.php?JOURNAL=JOURNAL&D='.$dept1.'\',document.getElementById("BOOK2")) ;</script>';
							}
							?>
								
                        
                        </div>
                    </div>
					
					
					
					
					
					
					
							<?php }

							$sno = 1;
							 if(isset($_GET["year"]) && isset($_GET["index"]))
							{$year=$_GET["year"];
								$index=$_GET["index"];
								//$query = "SELECT * FROM `article` WHERE document_type='Conference Paper' and year='$year' and (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index')";
								$query = "select * from article where uid in(SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Conference Paper' and article.year='$year' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
								
								
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]))
							{ 
						      $index=$_GET["index"];
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Conference Paper' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or web='$index' or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
								
							}
							else
							{$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where article.document_type='Conference Paper' and author.department='$dept')";
							
							}
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>0)
							{
							?>
					  <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h1>Conference </h1>

                            </div>
								<?php
							
							if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{
							echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&SCOPUS=SCOPUS&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK3")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&SCI=SCI&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK3")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&WEB=WEB&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK3")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&WEB=WEB&D='.$dept1.'\',document.getElementById("BOOK3")) ;</script>';
							}else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&SCOPUS=SCOPUS&D='.$dept1.'\',document.getElementById("BOOK3")) ;</script>';
							}else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&SCI=SCI&D='.$dept1.'\',document.getElementById("BOOK3")) ;</script>';
							}
							else 
							{echo '<div id=\'BOOK3\' ></div><script>loadDoc(\'article_cite.php?CONFERENCE=CONFERENCE&D='.$dept1.'\',document.getElementById("BOOK3")) ;</script>';
							}
							?>  </div>
                    </div>
					<?php }?>
					<?php
							$sno = 1;
							 if(isset($_GET["year"]) && isset($_GET["index"]))
							{ $year=$_GET["year"];
								$index=$_GET["index"];
								//$query = "SELECT * FROM `article` WHERE year='$year' and (document_type='Editorial'or document_type='Letter' or document_type='Review')  and (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index')";
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where (article.document_type='Editorial' or article.document_type='Letter' or article.document_type='Erratum'or article.document_type='Retracted' )and article.year='$year' and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";		
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]))
							{ 
						      $index=$_GET["index"];
								$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where (article.document_type='Editorial' or article.document_type='Letter' or article.document_type='Erratum'or article.document_type='Retracted' ) and  (`index scopus`='$index' or `index SCI`='$index'or `index esci`='$index'or web='$index' or `index ugc`='$index'or `index other`='$index') and author.department='$dept')";
								
							}
							else
							{$query = "select * from article where uid in (SELECT DISTINCT(author.uid) FROM `article` INNER JOIN author ON article.uid=author.uid where  (article.document_type='Editorial' or article.document_type='Letter' or article.document_type='Erratum'or article.document_type='Retracted' ) and author.department='$dept')";
							
							}
							
							
							$result = mysqli_query($connect, $query);
							$rowcount=mysqli_num_rows($result);
							if($rowcount>=1)
							{
							?>
						<div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h1>Editorial/ Letter/ Review/ Poster Presentation/ Invited Lectures </h1>

                            </div>
							<?php
							
							if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{
							echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&SCOPUS=SCOPUS&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK4")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&SCI=SCI&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK4")) ;</script>';
							}
							else if(isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&WEB=WEB&D='.$dept1.'&'.$_GET["year"]."=".$_GET["year"].'\',document.getElementById("BOOK4")) ;</script>';
							}
							else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='WEB')
							{echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&WEB=WEB&D='.$dept1.'\',document.getElementById("BOOK4")) ;</script>';
							}else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCI')
							{echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&SCI=SCI&D='.$dept1.'\',document.getElementById("BOOK4")) ;</script>';
							}else if(!isset($_GET["year"]) && isset($_GET["index"]) &&$_GET["index"]=='SCOPUS')
							{echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&SCOPUS=SCOPUS&D='.$dept1.'\',document.getElementById("BOOK4")) ;</script>';
							}
							else
							{echo '<div id=\'BOOK4\' ></div><script>loadDoc(\'article_cite.php?OTHER=OTHER&D='.$dept1.'\',document.getElementById("BOOK4")) ;</script>';
							}
							?>
                        </div>
                    
                    
                </div>
							<?php } ?>
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