
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
                    <div class="card-body">		<?php




							$debug = (isset($_GET["debug"]) ? true : false);
							error_reporting(0);
							function doi_url($doi)
							{
							  return "http://dx.doi.org/" . $doi;
							  //return "http://data.crossref.org/" . $doi;
							}

							function get_curl($url) 
							{ 
							  $curl = curl_init(); 
							  $header[0] = "Accept: application/rdf+xml;q=0.5,"; 
							  $header[0] .= "application/vnd.citationstyles.csl+json;q=1.0"; 
							  $proxy = '172.17.101.14:8080';
							  $proxyauth = 'muj\punitg:Dec@2018';
							  curl_setopt($curl, CURLOPT_URL, $url); 
							  curl_setopt($curl, CURLOPT_PROXY, $proxy);
							  curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxyauth);
							  curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)'); 
							  curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
							  curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com'); 
							  curl_setopt($curl, CURLOPT_AUTOREFERER, true); 
							  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
							  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
							  curl_setopt($curl, CURLOPT_TIMEOUT, 10); 
							  
							  
							  $json = curl_exec($curl); 
							  curl_close($curl); 
							  return $json; 
							}

							function get_json_array($json)
							{
							  return json_decode($json, true);
							}

							function show_json($json, $debug=false) {
							  if ($debug) {
								echo "<p>" . $json . "</p>";
							  }
							}

							function show_json_array($json_array, $debug=false) {
							  if ($debug) {
								echo "<pre class='json_array'>";
								print_r($json_array);
								echo "</pre>";
							  }
							}		

                        
?>

<?php 

$title		=($_GET["title"] != "" ? $_GET["title"] : "");
$journal	=($_GET["journal"] != "" ? $_GET["journal"] : "");
$year		=($_GET["year"] != "" ? $_GET["year"] : "");
$volume		=($_GET["volume"] != "" ? $_GET["volume"] : "");
$pages		=($_GET["pages"] != "" ? $_GET["pages"] : "");
$doi		=($_GET["doi"] != "" ? $_GET["doi"] : "");
$url		=($_GET["url"] != "" ? $_GET["url"] : "");
$affiliation=($_GET["affiliation"] != "" ? $_GET["affiliation"] : "");
$abstract	=($_GET["Abstract"] != "" ? $_GET["Abstract"] : "");
$publisher	=($_GET["publisher"] != "" ? $_GET["Abstract"] : "");
$document_type=($_GET["type"] != "" ? $_GET["type"] : "");
$isbn		=($_GET["ISSN"] != "" ? $_GET["ISSN"] : "");
$issn		=($_GET["ISBN"] != "" ? $_GET["ISBN"] : "");
$scopus		=($_GET["SCOPUS"] != "" ? $_GET["SCOPUS"] : "");
$sci		=($_GET["SCI"] != "" ? $_GET["SCI"] : "");
$esci		=($_GET["ESCI"] != "" ? $_GET["ESCI"] : "");
$ugc		=($_GET["UGC"] != "" ? $_GET["UGC"] : "");


$doi_url      = doi_url($doi);
$json         = get_curl($doi_url);
$json_array   = get_json_array($json);
$author_array = $json_array["author"];						
	foreach ($author_array as $author)
						  {$family = $author["family"];
							  
							$given = ($author["given"] ? $author["given"] : "");
							$given = str_replace(".", "", $given);
							$x = explode(" ", $given);
							$given = "";
							foreach ($x as $initial)
							{
							  $given .= $initial[0];
							}
							$given = (strlen($given)>0 ? " " . $given : "");
							$authors[] = $family . $given;
							  
						  }
				  



$query = "SELECT * FROM articlec where title='$title'";
$query1 = "SELECT * FROM article where title='$title'";
$result = mysqli_query($connect, $query);
$result1 = mysqli_query($connect, $query1);
$rowcount=mysqli_num_rows($result);
$rowcount1=mysqli_num_rows($result1);
$uid=rand(10,10000000000).'NA'.date("Y-m-d h:i:s");
if(($rowcount>=1 )|| ($rowcount1>=1))
{
	echo $title." already exists <br>";
}else{
	mysqli_autocommit($connect,FALSE);	

	//echo $uid;
$sql = "INSERT INTO `articlec` (`author`, `title`, `journal`, `year`,`volume`, `pages`, `doi`, `url`, `affiliation`, `abstract`, `keyword`, `correspondence_address1`, `publisher`, `issn`,`isbn`, `language`, `abbrev_source_title`, `document_type`, `source`,`index scopus`, `index SCI`, `index esci`, `index ugc`, `date`,`uid`) 
VALUES ('', '$title', '$journal ', '$year', '$volume','$pages','$doi', '$url', '$affiliation', '$abstract', '', '', '$publisher', '$issn', '$isbn', '', '', '$document_type','','$scopus','$sci','$esci','$ugc',now(),'$uid')";
$a2=mysqli_query($connect,$sql);

$a1=true;
							if ($a2) {
								$c=0;
								
								foreach($authors as $author)
								{		$c=$c+1;
								
								 if($a1&$a2)
								    {
									//echo $author."-";
									$sql = "INSERT INTO `authorc` (`author`, `doi`, `department`,`date`,`ord`,`uid`) VALUES ('$author', '$doi', '',now(),'$c','$uid');";
									$a1=mysqli_query($connect,$sql);
									}else{break;}
							}
							}else
							{echo "error t1";}
									if($a1&$a2 )
									{mysqli_commit($connect);
									 echo "Transaction Completed";
									 }
									else
									{	mysqli_rollback($connect);		
										echo "Transaction Failed";								
									}	
}
$connect->close();?>
</div>
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