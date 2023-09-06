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
    <title>Ela - Bootstrap Admin Dashboard Template</title>
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
					<?php

						$doi = (isset($_GET["doi"]) && $_GET["doi"] != "" ? $_GET["doi"] : "10.1037/0022-3514.65.6.1190");
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

						function get_ama_citation($json_array, $doi, $doi_url)
						{
						  $title        = $json_array["title"];
						  $author_array = $json_array["author"];
						  $jtitle       = $json_array["container-title"];
						  $pages        = $json_array["page"];
						  
						  if(isset($json_array["volume"]))
						  $volume       = $json_array["volume"];
						  
						  if(isset($json_array["issue"]))
						  $issue        = $json_array["issue"];
						  
						  if(isset($json_array["ISSN"]))
						  $issn_array   = $json_array["ISSN"];
						  
						  if(isset($json_array["ISBN"]))
						  $isbn_array   = $json_array["ISBN"];

						  $url          = $json_array["URL"];
						  $year         = $json_array["issued"]["date-parts"][0][0];

						  $citation  = "";
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
						  $author_count = count($authors);
						  if ($author_count <= 6)
						  {
							if (trim($authors[$author_count-1]) != "et al") { 
							  $citation .= implode(", ", $authors) . ". ";
							} else {
							  for($i=0; $i<3; $i++) {
								$author_list[] = $authors[$i];
							  }
							  $author_list[] = "et al";
							  $citation .= implode(", ", $author_list) . ". ";
							}
						  } else {
							$current_author = 0;
							foreach($authors as $author)
							{
							  if ($current_author < 3)
							  {
								$author_list[] = $author;
								$current_author++;
							  }
							}
							$author_list[] = "et al";
							$citation .= implode(", ", $author_list) . ". ";
						  }
						  $citation .= trim(str_replace(".", "", $title)) . ". ";
						  $citation .= trim(str_replace(".", "", $jtitle)) . ". ";
						  $citation .= $year;
						  $citation .= ($volume ? ";" . $volume : "");
						  $citation .= ($issue ? "(" . $issue . ")" : "");
						  $citation .= ($pages ? ":" . $pages . ". " : ". ");
						  $citation .= ($doi ? "doi:&nbsp;<a href='" . $doi_url . "'>" . $doi . "</a>" : "");
						  
						  
						  
						  return $citation;
						}

						function insert($json_array, $doi, $doi_url)
						{
						  $title        = $json_array["title"];
						  $author_array = $json_array["author"];
						  $jtitle       = $json_array["container-title"];
						  $pages        = $json_array["page"];
						  $volume       = $json_array["volume"];
						  $issue        = $json_array["issue"];
						  $issn   		= $json_array["ISSN"];
						  $isbn  		= $json_array["ISBN"];
						  $url          = $json_array["URL"];
						  $year         = $json_array["issued"]["date-parts"][0][0];

						  $citation  = "";
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
						  $author_count = count($authors);
						  if ($author_count <= 6)
						  {
							if (trim($authors[$author_count-1]) != "et al") { 
							  $citation .= implode(", ", $authors) . ". ";
							} else {
							  for($i=0; $i<3; $i++) {
								$author_list[] = $authors[$i];
							  }
							  $author_list[] = "et al";
							  $citation .= implode(", ", $author_list) . ". ";
							}
						  } else {
							$current_author = 0;
							foreach($authors as $author)
							{
							  if ($current_author < 3)
							  {
								$author_list[] = $author;
								$current_author++;
							  }
							}
							$author_list[] = "et al";
							$citation .= implode(", ", $author_list) . ". ";
						  }
						  
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
						  if($issn=='')
						{$issn='NA';
						}
						if($isbn=='')
						{$isbn='NA';
						}
						$title= str_replace("'"," ",$title);
						   $sql = "INSERT INTO `articlec` (`author`, `title`, `journal`, `year`,`volume`, `pages`, `doi`, `url`, `affiliation`, `abstract`, `keyword`, `correspondence_address1`, `publisher`, `issn`,`isbn`, `language`, `abbrev_source_title`, `document_type`, `source`) 
							VALUES ('', '$title', '$jtitle ', '$year', '$volume','$pages','$doi', '', '', '', '', '', '', '$issn', '$isbn', '', '', '', '')";

							if ($conn->query($sql) === TRUE) 
							{
								echo "New record created successfully";
								foreach($authors as $author)
								{
								 
								//echo $author."-";
								$sql = "INSERT INTO `author` (`author`, `doi`, `department`) VALUES ('$author', '$doi', '');";
								if ($conn->query($sql) === TRUE) {
									echo "New record created successfully";
								} else {
									echo "Error: " . $sql . "<br>" . $conn->error;
								}}
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
								
								
								
								
						  
						  
						}

						$doi_url      = doi_url($doi);
						$json         = get_curl($doi_url);
						$json_array   = get_json_array($json);

						$ama_citation     = get_ama_citation($json_array, $doi, $doi_url);

						if(isset($_GET['insert']))
						{
							
							if($_GET['insert']=='yes')
							{
								
								insert($json_array, $doi, $doi_url);
							}
						}

						?>

						


						<center>
						<form method="get" action="">
						
						<div class="input-group input-group-rounded">
                        <input type="text" placeholder="Search Round" class="form-control" name="doi" value="<?php echo $doi; ?>"  >
                        <span class="input-group-btn"><button class="btn btn-primary btn-group-right" type="submit" value="Search DOI">
						<i class="ti-search"></i></button></span>
                        </div>

						
						<input type="checkbox" name="debug" <?php if (isset($_GET["debug"])) echo " checked"; ?>>debug
						</form>
						</center>


						<h2>AMA Citation Format</h2>
						<ol >
						  <li><?php echo $ama_citation . "\n"; ?></li>
						</ol>
						<form action = "<?php $_PHP_SELF ?>" method = "GET" align=center>
						<div class="input-group input-group-rounded">								
								<input type="hidden" value=yes name="insert">
								  <input type="hidden" value="<?php echo $doi;?>" name="doi">
								  <select name="type" class="form-control input-rounded">
									<option value="Conference">Conference</option>
									<option value="journal">journal</option>
									<option value="chapter">chapter</option>
									<option value="book">book</option>
								  </select>
								  <select name="index" class="form-control input-rounded">
									<option value="SCOPUS">SCOPUS</option>
									<option value="SCI">SCI</option>
									<option value="UGC">UGC</option>
									<option value="OTHER">OTHER</option>
								  </select>
								  <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5" value="Insert">
						</div>		  
						</form>




						<?php show_json_array($json_array, $debug); ?>

						
							
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