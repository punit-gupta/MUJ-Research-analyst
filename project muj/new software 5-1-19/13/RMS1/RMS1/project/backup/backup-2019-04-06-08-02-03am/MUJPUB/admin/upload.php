
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


// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
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
 
 mysqli_autocommit($connect,FALSE);
 $a1=true;
 $new=0;
$replica=0;
 foreach ( $entries as $entry ) 
 {
if($a1)
{	
$title='';
$journal='';
$year='';
$volume='';
$pages='';
$doi='';
$url='';
$affiliation='';
$abstract='';
$publisher='';
$document_type='';
$isbn='';
$isbn='';
$publisher='';
$scopus=$_GET['SCOPUS'];
$sci=$_GET['SCI'];
$esci=$_GET['ESCI'];
$ugc=$_GET['UGC'];
$date='';
$cite='';
$uid='';
$authorss='';
		if(isset($entry["title"]))
		$title = $entry["title"]; 
	    $journal = $entry["journal"]; 
		$authorss = $entry["author"]; 
		$type1 = $entry["document_type"]; 
		$authorss=str_replace("'","\'",$authorss);
		$title=str_replace("'","\'",$title);		
		$year	 	= (isset($entry["year"] )? $entry["year"] : ""); 

$query = "SELECT * FROM article where title='$title'";
$result = mysqli_query($connect, $query);
$rowcount=mysqli_num_rows($result);
if($rowcount>=1)
{ $row1 = mysqli_fetch_array($result);
	echo " <b>already exists</b>".$title." <br>";
	if($sci=="SCI")
	{$sql = "update article set `index SCI`='SCI' where uid='$row1[27]';";
		$a5=mysqli_query($connect,$sql);
	}
	if($esci=="ESCI")
	{$sql = "update article set `index ESCI`='ESCI'  where uid='$row1[27]';";
		$a5=mysqli_query($connect,$sql);
	}
	$replica = $replica +1;
}
else{  
		$journal	=(isset($entry["journal"])? $entry["journal"] : ""); 
		$journal	=str_replace("'","\'",$journal);	
		$year	 	= (isset($entry["year"] )? $entry["year"] : ""); 
		
		$volume  	=(isset($entry["volume"] )? $entry["volume"] : "");  
		
		$pages   	=(isset($entry["pages"]) ? $entry["pages"] : ""); 
		
		$doi 	 	= (isset($entry["doi"] )? $entry["doi"] : ""); 
		
		$url 	 	= (isset($entry["url"] ) ? $entry["url"] : ""); 
		
		$affiliation =(isset($entry["affiliation"] )? $entry["affiliation"] : "");  
		$affiliation =str_replace("'","\'",$affiliation);
		
		$abstract   =(isset($entry["abstract"] )? $entry["abstract"] : ""); 
		$abstract	=str_replace("'","\'",$abstract);	
		
		$publisher  =(isset($entry["publisher"] ) ? $entry["publisher"] : "");  
		$publisher	=str_replace("'","\'",$publisher);
		
		$issn 		=(isset($entry["issn"]) ? $entry["issn"] : ""); 
		
		$isbn 		= (isset($entry["isbn"] )? $entry["isbn"] : ""); 
		
		$document_type =(isset($entry["document_type"] )? $entry["document_type"] : "");   
	    $cite=(isset($entry["note"] )? $entry["note"] : ""); 
		$cite=str_replace("cited By ","",$cite);
		$date=date("Y-m-d h:i:s");
		$uid=rand().'NA'.date("Y-m-d h:i:s");
		echo $uid;




if($uid!='')
{
$sql = "INSERT INTO `article` (`author`, `title`, `journal`, `year`,`volume`, `pages`, `doi`, `url`, `affiliation`, `abstract`, `keyword`, `correspondence_address1`, `publisher`, `issn`,`isbn`, `language`, `abbrev_source_title`, `document_type`, `source`,`index scopus`, `index SCI`, `index esci`, `index ugc`, `date`,`uid`) 
VALUES ('$authorss', '$title', '$journal ', '$year', '$volume','$pages','$doi', '', '$affiliation', '$abstract', '', '', '$publisher', '$issn', '$isbn', '', '', '$document_type','','$scopus','$sci','$esci','$ugc','$date','$uid')";

$a1=mysqli_query($connect,$sql);
$cite=$entry["note"];

$cite=str_replace("cited By ","",$cite);
$a1=mysqli_query($connect,"INSERT INTO `cite`(`uid`, `cite`) VALUES ('$uid','$cite')");
if ($a1) {
  echo "<b>New</b>".$title." <br>";
  $sno=$sno+1;
  
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
	$a1=false;
	break;
	
}

	
	
$creator = new PARSECREATORS();
 	$authors = $creator->parse($entry["author"]);
	$author_full_names = array();
	$i=0;
	foreach ($authors as $author) {
		if($a1)
		{$author_full_name = implode(' ', $author);
		$author_full_name =str_replace("'","\'",$author_full_name);	
		$i++;
		$sql = "INSERT INTO `author` (`author`, `doi`, `department`,`date`,`ord`,`uid`) VALUES ('$author_full_name', '$doi', '','$date','$i','$uid');";
		$a1=mysqli_query($connect,$sql);
		
		$sql = "INSERT INTO `cite` (`cite`,`uid`) VALUES ('$cite','$uid');";
		$a5=mysqli_query($connect,$sql);
		
		if ($a1&$a5) {
			echo "New author added";
		} else {
			echo "Error: " . $sql . "<br>" . $connect->error;
			$a1=false;
		}
		
		$author_full_names[] = $author_full_name;
		}
		else
		{$a1=false;
		break;}
	}
	$author_full_names = array_map('trim', $author_full_names);
	$author_list = implode(', ', $author_full_names);
	print($author_list); ?>

<?php  ?>
	<br>---------------------
		</br>
	
	
<?php }
else
{ $a1=false;	
  break;
}
}

 }
}
									if($a1 )
									{mysqli_commit($connect);
									 echo "Transaction Completed";
																		}
									else
									{	mysqli_rollback($connect);		
										echo "Transaction Failed";								
									}	 
echo "Total new added: ".$sno."<br>";

$connect->close();?>
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


